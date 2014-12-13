<?php
class AccessController {	
	/**
	 *the pdo object
	 */
	private $pdo = null;
	/**
	 *Construct the object
	 *@param PDO $pdo
	 */	
	public function __construct($pdo=null){
		global $CFG;
		if($pdo instanceof PDO) {
			$this->pdo = $pdo;		
		} else if($CFG['AccessController']['PDO']['instance'] instanceof PDO) {
			$this->pdo = $CFG['AccessController']['PDO']['instance'];
		} else {
			$dsn      = $CFG['AccessController']['PDO']['dsn'];
			$user     = $CFG['AccessController']['PDO']['user'];
			$password = $CFG['AccessController']['PDO']['password'];
			$init     = $CFG['AccessController']['PDO']['init'];
			$this->pdo = new PDO($dsn, $user, $password, array(
						   PDO::MYSQL_ATTR_INIT_COMMAND => $init));
			$CFG['AccessController']['PDO']['instance'] = $this->pdo;
		}
	}

	/**
	 * Permit $who to do $action
	 * @param string $action
	 * @param AccessControllable $who
	 * @return boolean true on successful
	 */
	public function permit($action, $who) {	
		$this->revoke($action, $who);
		$actionId = $this->getActionId($action);
		
		//edit the information to permit $who to do $action
		$table = $who->getAclName();
		$visitor = $who->getUniqueId();
		$sql = "insert into $table (visitor_id , action_id , accessibility) values (:visitor_id , :action_id , 1)";
		
		try{
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':visitor_id' , intval($visitor) , PDO::PARAM_INT);
			$stmt->bindParam(':action_id' , $actionId , PDO::PARAM_INT);
			$state = $stmt->execute();
			//there is an exception when the value of $state is false
			if($state === false){				
				//duplicate entry has already exists in the ACL table				
				if($stmt->errorCode() == "23000"){
					$this->assign($table , $visitor , $actionId , 1);
				}
				//an exception of another type appears
				else{
					$error = $stmt->errorInfo();
					throw new Exception($error[2]);
				}				
			}
		}
		catch(PDOException $e){
			throw new Exception($e->getMessage());
		}
		return true;
	}
	/**
	 * Forbid $who to do $action
	 * @param string $action
	 * @param AccessControllable $who
	 * @return boolean true on successful
	 */
	public function forbid($action, $who) {
		$this->revoke($action, $who);
		$actionId = $this->getActionId($action);
		
		//edit the information to permit $who to do $action
		$table = $who->getAclName();
		$visitor = $who->getUniqueId();
		$sql = "insert into $table (visitor_id , action_id , accessibility) values (:visitor_id , :action_id , 0)";
		
		try{
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':visitor_id' , intval($visitor) , PDO::PARAM_INT);
			$stmt->bindParam(':action_id' , $actionId , PDO::PARAM_INT);
			$state = $stmt->execute();
			//there is an exception when the value of $state is false
			if($state === false){				
				//duplicate entry has already exists in the ACL table				
				if($stmt->errorCode() == "23000"){
					$this->assign($table , $visitor , $actionId , 0);
				}
				//an exception of another type appears
				else{
					$error = $stmt->errorInfo();
					throw new Exception($error[2]);
				}				
			}
		}
		catch(PDOException $e){
			throw new Exception($e->getMessage());
		}
		return true;
	}
	/**
	 * Revoke the privilege to do $action for $who
	 * @param string $action
	 * @param AccessControllable $who
	 * @return boolean true on successful
	 */
	public function revoke($action, $who) {
		$actionId = $this->getActionId($action);
		
		//edit the information to revoke $who to do $action
		$table = $who->getAclName();
		$visitor = $who->getUniqueId();
		$sql = "delete from $table where visitor_id = :visitor_id and action_id = :action_id";
		
		try{
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':visitor_id' , intval($visitor) , PDO::PARAM_INT);
			$stmt->bindParam(':action_id' , $actionId , PDO::PARAM_INT);
			$state = $stmt->execute();
			//there is an exception when the value of $state is false
			if($state === false){
				$error = $stmt->errorInfo();
				throw new Exception($error[2]);					
			}
			
			/////what to do if there is no entry in the database?How to judge the situation?
		}
		catch(PDOException $e){
			throw new Exception($e->getMessage());
		}
		return true;		
	}
	/**
	 * Determin whether $who can do the $action
	 * @param string $action
	 * @param AccessControllable $who
	 * @return boolean true if $who has privilege to do $action
	 */
	public function can($action, $who) {
		if(!$who instanceof AccessControllable) {
			throw new InvalidArgumentException('$who must implements interface AccessControllabe');
		}
		$actionId = $this->getActionId($action);
		$can = $this->trinityCan($actionId, $who);
		if($can == self::UNDEFINED) {
			return $this->getDefault($actionId);
		} else {
			return $can == self::PERMIT;
		}
	}
	/**
	 * @param int $actionId
	 * @return boolean
	 */
	private function getDefault($actionId) {
		$sql = "SELECT def FROM action WHERE id={$actionId}";
		$ps = $this->pdo->query($sql, PDO::FETCH_NUM);
		return array_pop($ps->fetch())>0;
	}
	const PERMIT=1;
	const FORBID=0;
	const UNDEFINED=-1;
	/**
	 * @param int $actionId
	 * @param AccessControllable $who
	 * @return int
	 */
	private function trinityCan($actionId, $who) {
		$table = $who->getAclName();
		$visitorId = $who->getUniqueId();

		$sql = "SELECT accessibility FROM {$table} WHERE visitor_id={$visitorId} AND action_id={$actionId}";
		/** @var PDOStatement */
		$ps = $this->pdo->query($sql);
		if($ps->rowCount() > 0) {
			return array_pop($ps->fetch(PDO::FETCH_NUM));
		} else {
			$inheritedAccesses = $who->getInheritedAccesses();
			if(empty($inheritedAccesses)) {
				return self::UNDEFINED;
			}
			$result = self::UNDEFINED;
			foreach($inheritedAccesses as $entry) {
				$can = $this->trinityCan($actionId, $entry);
				switch($can) {
					case self::UNDEFINED:
						break;
					case self::FORBID:
						return self::FORBID;
					case self::PERMIT:
						$result = self::PERMIT;
				}
			}
			return $result;
		}
	}
	
	/**
	 * Dump the whole Access Control List for $who
	 * @param AccessControllable $who
	 * @return array(action => permission)
	 */
	public function dumpAcl($who) {
		$table = $who->getAclName();
		$visitor_id = intval($who->getUniqueId());
		$sql = "select * from $table where visitor_id = :visitor_id";
		
		try{
			/** @var PDOStatement */
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':visitor_id' , $visitor_id , PDO::PARAM_STR , 20);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		}		
		catch(PDOException $e){			
			throw new Exception($e->getMessage());			
		}
		
		//throw an exception if there is no action based on the name
		if(count($result) == 0)
			return null;
		else{
			$dump = array();
			foreach($result as $acl){
				$actionName = $this->getActionNameById(intval($acl['action_id']));
				$dump[$actionName] = $acl['accessibility'];
			}
			return $dump;
		}
	}
	/**
	 *Dump the whole Action List
	 *@return array(action => permission)
	 */
	public function dumpAction(){		
		$sql = "select * from action";
		
		try{
			/** @var PDOStatement */
			$stmt = $this->pdo->prepare($sql);			
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		}		
		catch(PDOException $e){			
			throw new Exception($e->getMessage());			
		}
		
		//throw an exception if there is no action based on the name
		if(count($result) == 0)
			return null;
		else{
			$dump = array();
			foreach($result as $acl){				
				$dump[$acl['name']] = $acl['def'];
			}
			return $dump;
		}
	}
	/**
	 *get the id of the action
	 *@param string $action
	 *@return int the id of $action
	 */
	private function getActionId($action){
		$sql = "SELECT id FROM action WHERE name=:name";
		/** @var PDOStatement */
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':name' , $action , PDO::PARAM_STR, 255);
		if(!$stmt->execute()) {
			$errorInfo = $stmt->errorInfo();
			throw new PDOException($errorInfo[2]);
		}
		if($stmt->rowCount() == 0)
			throw new InvalidArgumentException("There is no action named '$action'!");
		$resultAct = $stmt->fetch(PDO::FETCH_ASSOC);
		return intval($resultAct['id']);
	}
	/**
	 *get the name of an action by its id
	 *@param int $id
	 *@return string the name of an action
	 */
	private function getActionNameById($id){
		$sql = "select name from action where id = :id";
		
		try{
			/** @var PDOStatement */
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':id' , $id , PDO::PARAM_STR , 20);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);		
		}		
		catch(PDOException $e){			
			throw new Exception($e->getMessage());			
		}
		
		//throw an exception if there is no action based on the name
		if(count($result) == 0)
			throw new Exception("there is no action based on the id $id!");	
		return $result['name'];
	}
	/**
	 *@param string $table
	 *@param int $visitor
	 *@param int $action
	 *@param int flag if the deal is to permit then $falg is 1 else 0 
	 */
	private function assign($table , $visitor , $action , $flag){
		$sql = "update $table set accessibility = :flag where visitor_id = :visitor_id and action_id = :action_id";
		try{
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':flag' , $flag , PDO::PARAM_INT);
			$stmt->bindParam(':visitor_id' , $visitor , PDO::PARAM_INT);
			$stmt->bindParam(':action_id' , $action , PDO::PARAM_INT);
			$state = $stmt->execute();
		}
		catch(PDOException $e){
			throw new Exception($e->getMessage());
		}
		//an exception appears when updating the ACL table
		if($state == false){
			$error = $stmt->errorInfo();
			throw new Exception($error[2]);
		}
	}
}
?>