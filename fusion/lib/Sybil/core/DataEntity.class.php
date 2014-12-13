<?php
/**
 * DataEntity
 * @author GuangXiN <rek@rek.me>
 * @property array $properties
 * @ver 3.0 Sybil 5/31/2010
 * @ver 3.1 Sybil 6/14/2010 add getter for convert enum
 * @version 3.2 Sybil 6/14/2010 Adds error code for all PDOException throwing
 * @version 3.3 Sybil 9/2/2010 Constructor allowed 1 parameter $id, call getById auto
 * @version 3.4 Sybil 9/2/2010 method count will always return integer now
 * @version 3.4.1 Sybil 09/27/2010 remove methodExist cache for PHP5.2.4
 * @version 3.5 Sybil 11/17/2010 removed deprecated 'call_user_method'
 */
class DataEntity implements ArrayAccess {
	protected static $propSpec = array();
	protected $modifiedProps = array();
	protected $properties = array('id'=>0);
	protected $staticName = null;

	public $realTime = false;
	public $debugMode = DataEntity::OFF;

	/**
	 * Debug Info Consts
	 */
	const OFF      = 0x0;
	const ERROR    = 0x1;
	const SQL      = 0x2;
	const PDOINFO  = 0x4;
	const PROPERTY = 0x8;
	const ALL      = 0xF;

	public function __construct($id=0) {
		global $CFG;
		// init static cache
		$staticName = get_class($this);
		eval('$propSpec = &'.$staticName.'::$propSpec;');
		$CFG['Sybil']['staticCache'][$staticName]['propSpec'] = &$propSpec;

		$this->staticName = &$staticName;
		/// End static cache
		$id = intval($id);
		if($id > 0) {
			$this->getById($id);
		}

		if(isset($this->properties['datetime']) && $this->properties['datetime'] == 0)
			$this->properties['datetime'] = time();
	}
	public function createFromSqlResult($result) {
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
		$this->properties = array();
		if(empty($result))
			throw new ArgumentException('$result');
		foreach($result as $index => $value) {
			if(($prop = array_search($index, $propSpec['master']['columns']))!== false) {
				$this->properties[$prop] = $value;
				continue;
			}
			if(!isset($propSpec['slave'])) continue;
			foreach($propSpec['slave'] as $s) {
				if(($prop = array_search($index, $s['columns']))!== false) {
					$this->properties[$prop] = $value;
					break;
				}
			}
		}
	}

	public function __get_properties() {
		return $this->properties;
	}
	public function isModified($name) {
		return isset($this->properties[$name])&&$this->modifiedProps[$name];
	}

	public function __get($name) {
		global $CFG;
		$getter = '__get_'.$name;
		if(method_exists($this, $getter)) {
			if(($this->debugMode&DataEntity::PROPERTY)>0) {
				echo "Calling getter for {$name}\n";
			}
			return $this->$getter();
		} else {
			if(array_key_exists($name, $this->properties)) {
				if(($this->debugMode&DataEntity::PROPERTY)>0) {
					echo "$name hit! internal value is {$this->properties[$name]}\n";
				}
				$internalValue = &$this->properties[$name];
				//Inline method autoConvert
				$cvtEnum = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec']['convertEnum'][$name];
				if(is_array($cvtEnum)) {
					if(isset($cvtEnum[$internalValue])) {
						$autoConvertResult = $cvtEnum[$internalValue];
					} else {
						$autoConvertResult = $cvtEnum[0];
					}
				} else {
					$autoConvertResult = $internalValue;
				}
				//End autoConvert
				return $autoConvertResult;
			} else {
				if(($this->debugMode&DataEntity::PROPERTY)>0) {
					echo "$name missed! Tring lazyload\n";
				}
				return $this->lazyLoad($name);
			}
		}
	}
	public function __set($name, $value) {
		global $CFG;
		$setter = '__set_'.$name;
		if(method_exists($this, $setter)) {
			if(($this->debugMode&DataEntity::PROPERTY)>0) {
				echo "Calling setter for $name\n";
			}
			$this->$setter($value);
		} else {
			//Inline method autoConvert()
			$cvtEnum = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec']['convertEnum'][$name];
			if(is_array($cvtEnum)) {
				if(is_int($value) || ctype_digit($value)) {
					if(array_key_exists($value, $cvtEnum)) {
						$autoConvertResult = $value;
					} else {
						$autoConvertResult = 0;
					}
				} else {
					if(($i = array_search($value, $cvtEnum)) === false) {
						$autoConvertResult = 0;
					} else {
						$autoConvertResult = $i;
					}
				}
			} else {
				$autoConvertResult = $value;
			}
			//End autoConvert
			$value = $autoConvertResult;
			if(($this->debugMode&DataEntity::PROPERTY)>0) {
				echo "Internal value of $name is $value\n";
			}
			if($value !== $this->properties[$name]) {
				$this->properties[$name] = $value;
				$this->modifiedProps[$name] = true;
				if(($this->debugMode&DataEntity::PROPERTY)>0) {
					echo "New value of $name saved\n";
				}
			}
		}
	}
	public function __toString() {
		return $this->staticName.'-'.$this->properties['id'];
	}

	/**
	 * @param bool $slave
	 * @return PDO
	 */
	protected function initMasterPDO($slave=false) {
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
		if($slave && (isset($propSpec['master']['sPDO']) || isset($CFG['Sybil']['sPDO']['dsn']))) { //丛库读取模式
			$rand = mt_rand();
			if(isset($propSpec['master']['sPDO']['dsn'])) {
				$sPDOCount = count($propSpec['master']['sPDO']);
				$sPDONum = $rand%$sPDOCount;
				$dsn = $propSpec['master']['sPDO'][$sPDONum]['dsn'];
				$user = $propSpec['master']['sPDO'][$sPDONum]['user'];
				$password = $propSpec['master']['sPDO'][$sPDONum]['password'];
				$init = $propSpec['master']['sPDO'][$sPDONum]['init'];
			} else {
				$sPDOCount = count($CFG['Sybil']['sPDO']);
				$sPDONum = $rand%$sPDOCount;
				$dsn = $CFG['Sybil']['sPDO'][$sPDONum]['dsn'];
				$user = $CFG['Sybil']['sPDO'][$sPDONum]['user'];
				$password = $CFG['Sybil']['sPDO'][$sPDONum]['password'];
				$init = $CFG['Sybil']['sPDO'][$sPDONum]['init'];
			}
			if(($this->debugMode&DataEntity::PDOINFO)>0) {
				echo "Using sPDO $sPDONum/$sPDOCount: dsn=$dsn user=$user password=$password\n";
			}
			if($propSpec['master']['sPDO'][$sPDONum]['pdo'] instanceof PDO)
				$pdo = $propSpec['master']['sPDO'][$sPDONum]['pdo'];
			else {
				$pdo = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => $init));
				$propSpec['master']['sPDO'][$sPDONum]['pdo'] = $pdo;
			}
		} else { //实时主库读取模式
			if($propSpec['master']['PDO']['pdo'] instanceof PDO) {
				return $propSpec['master']['PDO']['pdo'];
			}
			if(isset($propSpec['master']['PDO']['dsn'])) {
				$dsn      = $propSpec['master']['PDO']['dsn'];
				$user     = $propSpec['master']['PDO']['user'];
				$password = $propSpec['master']['PDO']['password'];
				$init     = $propSpec['master']['PDO']['init'];
			} else {
				$dsn      = $CFG['Sybil']['PDO']['dsn'];
				$user     = $CFG['Sybil']['PDO']['user'];
				$password = $CFG['Sybil']['PDO']['password'];
				$init     = $CFG['Sybil']['PDO']['init'];
			}
			if(($this->debugMode&DataEntity::PDOINFO)>0) {
				echo "Using PDO: dsn=$dsn user=$user password=$password\n";
			}
			$pdo = new PDO($dsn, $user, $password, array(
						   PDO::MYSQL_ATTR_INIT_COMMAND => $init));
			$propSpec['master']['PDO']['pdo'] = $pdo;
		}
		return $pdo;
	}
	protected function initSlavePDO($tableName) {
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
		if(!$this->realTime && isset($propSpec['slave'][$tableName]['sPDO']['dsn'])) {
			$rand = mt_rand();
			$sPDOCount = count($propSpec['slave'][$tableName]['sPDO']);
			$sPDONum = $rand%$sPDOCount;
			if($propSpec['slave'][$tableName]['sPDO'][$sPDONum]['pdo'] instanceof PDO)
				return $pdo = $propSpec['slave'][$tableName]['sPDO'][$sPDONum]['pdo'];
			$dsn = $propSpec['slave'][$tableName]['sPDO'][$sPDONum]['dsn'];
			$user = $propSpec['slave'][$tableName]['sPDO'][$sPDONum]['user'];
			$password = $propSpec['slave'][$tableName]['sPDO'][$sPDONum]['password'];
			$init = $propSpec['slave'][$tableName]['sPDO'][$sPDONum]['init'];
			if(($this->debugMode&DataEntity::PDOINFO)>0) {
				echo "Using sPDO $sPDONum/$sPDOCount for $tableName: dsn=$dsn user=$user password=$password\n";
			}
			$pdo = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => $init));
			$propSpec['slave'][$tableName]['sPDO'][$sPDONum]['pdo'] = $pdo;
		} else {
			if($propSpec['slave'][$tableName]['PDO']['pdo'] instanceof PDO) {
				return $propSpec['slave'][$tableName]['PDO']['pdo'];
			}
			try {
				$dsn      = $propSpec['slave'][$tableName]['PDO']['dsn'];
				$user     = $propSpec['slave'][$tableName]['PDO']['user'];
				$password = $propSpec['slave'][$tableName]['PDO']['password'];
				$init     = $propSpec['slave'][$tableName]['PDO']['init'];
				$pdo = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => $init));
				if(($this->debugMode&DataEntity::PDOINFO)>0) {
					echo "Using PDO for $tableName: dsn=$dsn user=$user password=$password\n";
				}
			} catch (PDOException $ex) {
				$pdo = $this->initMasterPDO(!$this->realTime);
			}
			$propSpec['slave'][$tableName]['PDO']['pdo'] = $pdo;
		}
		return $pdo;
	}
	/**
	 * autoConvert
	 * @param string $name
	 * @param mixed  $value
	 * @return mixed
	 */
	private function autoConvert($name) {
		global $CFG;
		$cvtEnum = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec']['convertEnum'][$name];
		if(func_num_args() == 1) {
			if(is_array($cvtEnum)) {
				if(array_key_exists($this->properties[$name], $cvtEnum)) {
					return $cvtEnum[$this->properties[$name]];
				} else {
					return $cvtEnum[0];
				}
			} else {
				return $this->properties[$name];
			}
		} else if(func_num_args() == 2) {
			$value = func_get_arg(1);
			if(is_array($cvtEnum)) {
				if(is_int($value) || ctype_digit($value)) {
					if(array_key_exists($value, $cvtEnum)) {
						return $value;
					} else {
						return 0;
					}
				} else {
					if(($i = array_search($value, $cvtEnum)) === false) {
						return 0;
					} else {
						return $i;
					}
				}
			} else {
				return $value;
			}
		}
	}
	private function lazyLoad($name) {
		if(intval($this->properties['id']) != 0) {
			global $CFG;
			$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
			if(!isset($propSpec['slave'])) return;
			foreach($propSpec['slave'] as $slaveTable) {
				if(array_key_exists($name, $slaveTable['columns'])) {
					$this->lazyLoadTable($slaveTable['tableName']);
					return $this->autoConvert($name);
				}
			}
		}
		return null;
	}
	private function lazyLoadTable($tableName) {
		if(($this->debugMode&DataEntity::PROPERTY)>0) {
			echo "Lazyload table $tableName\n";
		}
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
		$pdo = $this->initSlavePDO($tableName);
		$pr = $pdo->query("SELECT * FROM `$tableName` WHERE `id`={$this->id} LIMIT 1");
		$r = $pr->fetch(PDO::FETCH_ASSOC);
		if($r === false) return;
		foreach($r as $index => $value) {
			$key = array_search($index, $propSpec['slave'][$tableName]['columns']);
			if($key === false) continue;
			if(isset($this->properties[$key])) continue;
			$this->properties[$key] = $value;
		}
	}

	/**
	 * 将当前对象持久化到数据库中
	 * add()
	 */
	
	public function add() {
		if($this->id != 0) {
			throw new PermissionDeniedException('The object has already persisted to database');
		}
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];

		// create master record SQL
		$columns='';
		$values='';
		$first = true;
		foreach($propSpec['master']['columns'] as $prop => $col) {
			if($prop == 'id') continue;
			if($first) {
				$first = false;
			} else {
				$columns .= ', ';
				$values  .= ', ';
			}
			$columns .= '`'.$col.'`';
			if($this->properties[$prop]!==null) {
				$values .= "'".mysql_escape_string($this->properties[$prop])."'";
			} else {
				$values .= 'NULL';
			}
		}
		$sql = "INSERT INTO `{$propSpec['master']['tableName']}` ({$columns}) VALUES ({$values});\r\n";
		if(($this->debugMode&DataEntity::SQL)>0) {
			echo "$sql\n";
		}
		// exec master record SQL and get id
		$pdo = $this->initMasterPDO();
		$pr = $pdo->query($sql);
		if($pr === false) {
			if(($this->debugMode&DataEntity::ERROR)>0) {
				var_dump($pdo->errorCode());
				var_dump($pdo->errorInfo());
			}
			$info = $pdo->errorInfo();
			throw new PDOException($info[2], $info[1]);
		}
		$this->properties['id'] = intval($pdo->lastInsertId());

		// create slave records and insert them
		if(!is_array($propSpec[slave])) {
			$this->modifiedProps = array();
			return;
		}
		foreach($propSpec[slave] as $slave) {
			$first = true;
			$columns='';
			$values='';
			$sql = '';
			foreach($slave['columns'] as $prop => $col) {
				if($first) {
					$first = false;
				} else {
					$columns .= ', ';
					$values  .= ', ';
				}
				$columns .= '`'.$col.'`';
				if($this->properties[$prop]!==null) {
					$values .= "'{$this->properties[$prop]}'";
				} else {
					$values .= 'NULL';
				}
			}
			$sql = "INSERT INTO `{$slave['tableName']}` (`id`, {$columns}) VALUES ('{$this->id}', {$values});\r\n";
			if(($this->debugMode&DataEntity::SQL)>0) {
				echo "$sql\n";
			}
			$pdo = $this->initSlavePDO($slave['tableName']);
			$pr = $pdo->query($sql);
			if($pr === false) {
				if(($this->debugMode&DataEntity::ERROR)>0) {
					var_dump($pdo->errorCode());
					var_dump($pdo->errorInfo());
				}
				$info = $pdo->errorInfo();
				throw new PDOException($info[2], $info[1]);
			}
		}
		$this->modifiedProps = array();
	}
	
	/**
	 * 将当前对象的变更同步到数据库
	 * update()
	 */
	public function update() {
		if($this->id == 0) {
			throw new PermissionDeniedException('Cannot update an object without id');
		}
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
		//update master table
		$columns = '';
		$first = true;
		foreach($propSpec['master']['columns'] as $prop => $col) {
			if($this->modifiedProps[$prop]) {
				if($first) {
					$first = false;
				} else {
					$columns .= ', ';
				}
				if($this->properties[$prop] !== null) {
					$columns .= "`{$col}`='".mysql_escape_string($this->properties[$prop])."'";
				} else {
					$columns .= "`{$col}`=NULL";
				}
			}
		}
		if($columns != '') {
			$sql = "UPDATE `{$propSpec['master']['tableName']}` SET {$columns} WHERE `id`={$this->id}";
			if(($this->debugMode&DataEntity::SQL)>0) {
				echo "$sql\n";
			}
			$pdo = $this->initMasterPDO();
			$pr = $pdo->exec($sql);
			if($pr === false) {
				if(($this->debugMode&DataEntity::ERROR)>0) {
					var_dump($pdo->errorCode());
					var_dump($pdo->errorInfo());
				}
				$info = $pdo->errorInfo();
				throw new PDOException($info[2], $info[1]);
			}
		}
		// update slave tables
		if(!is_array($propSpec[slave])) {
			$this->modifiedProps = array();
			return;
		}
		foreach($propSpec['slave'] as $slave) {
			$columns = '';
			$first = true;
			foreach($slave['columns'] as $prop => $col) {
				if($this->modifiedProps[$prop]) {
					if($first) {
						$first = false;
					} else {
						$columns .= ', ';
					}
					if($this->properties[$prop] !== null) {
						$columns .= "`{$col}`='{$this->properties[$prop]}'";
					} else {
						$columns .= "`{$col}`=NULL";
					}
				}
			}
			if($columns != '') {
				$sql = "UPDATE `{$slave['tableName']}` SET {$columns} WHERE `id`='{$this->id}';";
				$pdo = $this->initSlavePDO($slave['tableName']);
				$pr = $pdo->exec($sql);
				if($pr === false) {
					if(($this->debugMode&DataEntity::ERROR)>0) {
						var_dump($pdo->errorCode());
						var_dump($pdo->errorInfo());
					}
					$info = $pdo->errorInfo();
					throw new PDOException($info[2], $info[1]);
				}
			}
		}
		$this->modifiedProps = array();
	}
	/**
	 * Get the entity object by an unique key
	 * @param string $uniqueKey
	 * @param mixed  $keyValue
	 * @param bool $realTime
	 * @return DataEntity
	 */
	public function getSingle($uniqueKey, $keyValue, $realTime=false) {
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
		$pdo = $this->initMasterPDO(!$realTime);
		$this->realTime = $realTime;
		$sql = "SELECT * FROM `{$propSpec['master']['tableName']}` WHERE `{$uniqueKey}`='{$keyValue}' LIMIT 1;";
		if(($this->debugMode&DataEntity::SQL)>0) {
			echo "$sql\n";
		}
		$pr = $pdo->query($sql);
		if($pr === false) {
			if(($this->debugMode&DataEntity::ERROR)>0) {
				var_dump($pdo->errorCode());
				var_dump($pdo->errorInfo());
			}
			$info = $pdo->errorInfo();
			throw new PDOException($info[2], $info[1]);
		}
		$result = $pr->fetch(PDO::FETCH_ASSOC);
		if(!empty($result)) {
			$this->createFromSqlResult($result);
			return $this;
		} else {
			return null;
		}
	}
	/**
	 * Get an entity object by id
	 * @param uint $id
	 * @param bool $realTime
	 * @return DataEntity
	 */
	public function getById($id, $realTime=false) {
		if(!is_int($id) && !ctype_digit($id) || $id == 0) {
			throw new ArgumentException('$id');
		}
		return $this->getSingle('id', $id);
	}
	/**
	 * 从数据库取出符合条件的实体数组
	 * @param DataFilter $arg
	 * @param string $arg
	 * @param bool $realTime
	 * @return array(DataEntity)
	 */
	public function getArray($arg=null, $realTime=false) {
		if($arg instanceof DataFilter || is_null($arg)) {
			global $CFG;
			$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];

			$condition = $arg instanceof DataFilter? $arg->getSQL():'';
			if(is_string($propSpec['searchView'])) {
				$sql = "SELECT * FROM `{$propSpec['searchView']}` WHERE `deleted`='0' {$condition}";
			} else {
				$sql = "SELECT * FROM `{$propSpec['master']['tableName']}` WHERE `deleted`='0' {$condition}";
			}
		} else if(is_string($arg)) {
			$sql = $arg;
		} else {
			throw new ArgumentException('$arg must be a DataFilter or SQL query');
		}
		if(($this->debugMode&DataEntity::SQL)>0) {
			echo "$sql\n";
		}
		$pdo = $this->initMasterPDO(!$realTime);
		$pr = $pdo->query($sql);
		if($pr !== false) {
			if($pr->rowCount() == 1) {
				$this->createFromSqlResult($pr->fetch(PDO::FETCH_ASSOC));
				return array($this);
			} else {
				$entitys = array();
				while($r = $pr->fetch(PDO::FETCH_ASSOC)){
					$entity = clone $this;
					$entity->createFromSqlResult($r);
					array_push($entitys, $entity);
				}
				return $entitys;
			}
		} else {
			if(($this->debugMode&DataEntity::ERROR)>0) {
				var_dump($pdo->errorCode());
				var_dump($pdo->errorInfo());
			}
			$info = $pdo->errorInfo();
			throw new PDOException($info[2], $info[1]);
		}
	}
	/**
	 * 删除一个实体对象
	 * @param uint $id
	 * @param bool $justMark=true
	 */
	public function remove($id, $justMark=true) {
		if(!is_int($id) && !ctype_digit($id) || $id == 0) {
			throw new ArgumentException('$id');
		}
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
		if($justMark) {
			$sql = "UPDATE `{$propSpec['master']['tableName']}` SET `deleted`='1' WHERE `id`='{$id}';";
		} else {
			if(is_array($propSpec['slave'])) {
				$slaveTables = implode(array_keys($propSpec['slave']), '`, `');
			}
			if($slaveTables!='') {
				$slaveTables = ', `'.$slaveTables.'`';
			}
			$sql = "DELETE FROM `{$propSpec['master']['tableName']}`{$slaveTables} WHERE `id`='{$id}';";
		}
		if(($this->debugMode&DataEntity::SQL)>0) {
			echo "$sql\n";
		}
		$pdo = $this->initMasterPDO();
		$pr = $pdo->query($sql);
		if($pr !== false) {
			return true;
		} else {
			if(($this->debugMode&DataEntity::ERROR)>0) {
				var_dump($pdo->errorCode());
				var_dump($pdo->errorInfo());
			}
			$info = $pdo->errorInfo();
			throw new PDOException($info[2], $info[1]);
		}
	}
	public function count($arg=null, $realTime=false) {
		global $CFG;
		$propSpec = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec'];
		if($arg instanceof DataFilter) {
			if(is_string($propSpec['searchView'])) {
				$sql = "SELECT COUNT(*) FROM `{$propSpec['searchView']}` WHERE `deleted`='0' ".$arg->getSQL();
			} else {
				$sql = "SELECT COUNT(*) FROM `{$propSpec['master']['tableName']}` WHERE `deleted`='0' ".$arg->getSQL();
			}
		} else if(is_string($arg)) {
			$sql = $arg;
		} else {
			$sql = "SELECT COUNT(*) FROM `{$propSpec['master']['tableName']}` WHERE `deleted`='0'";
		}
		if(($this->debugMode&DataEntity::SQL)>0) {
			echo "$sql\n";
		}
		$pdo = $this->initMasterPDO(!$realTime);
		$pr = $pdo->query($sql);
		if($pr !== false) {
			$r = $pr->fetch(PDO::FETCH_NUM);
			return intval($r[0]);
		} else {
			if(($this->debugMode&DataEntity::ERROR)>0) {
				var_dump($pdo->errorCode());
				var_dump($pdo->errorInfo());
			}
			$info = $pdo->errorInfo();
			throw new PDOException($info[2], $info[1]);
		}
	}
	/**
	 * Execute an SQL statement and return the result as an assoced-array
	 * This method use the MasterPDO to access database, if slave tables
	 * are not in the DB to which the MasterPDO point, this method will not
	 * work.
	 * WARNING: THIS METHOD SHOULD ONLY BE USED IN NECESSARY CASE.
	 * @param string  $sql SQL to execute
	 * @param bool    $readSlave use slave DB server to accelerate reading
	 * @return assoced-array if executed a select statement. FALSE on failed.
	 */
	public function exec($sql, $readSlave=false) {
		$pdo = $this->initMasterPDO($readSlave);
		if(($this->debugMode&DataEntity::SQL)>0) {
			echo $sql;
		}
		$result = $pdo->query($sql);
		if($result instanceof PDOStatement) {
			return $result->fetchAll(PDO::FETCH_ASSOC);
		} else if($result === false){
			if(($this->debugMode&DataEntity::ERROR)>0) {
				var_dump($pdo->errorCode());
				var_dump($pdo->errorInfo());
			}
			$info = $pdo->errorInfo();
			throw new PDOException($info[2], $info[1]);
		}
		return $result;
	}
	/**
	 * methods in ArrayAccess
	 */
	public function offsetExists($offset) {
		return method_exists($this, '__get_'.$offset) || array_key_exists($offset, $this->properties);
	}
	public function offsetGet ($name) {
		//inline method __get()
		global $CFG;
		$getter = '__get_'.$name;
		if(method_exists($this, $getter)) {
			if(($this->debugMode&DataEntity::PROPERTY)>0) {
				echo "Calling getter for {$name}\n";
			}
			return $this->$getter();
		} else {
			if(array_key_exists($name, $this->properties)) {
				if(($this->debugMode&DataEntity::PROPERTY)>0) {
					echo "$name hit! internal value is {$this->properties[$name]}\n";
				}
				$internalValue = &$this->properties[$name];
				//Inline method autoConvert
				$cvtEnum = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec']['convertEnum'][$name];
				if(is_array($cvtEnum)) {
					if(isset($cvtEnum[$internalValue])) {
						$autoConvertResult = $cvtEnum[$internalValue];
					} else {
						$autoConvertResult = $cvtEnum[0];
					}
				} else {
					$autoConvertResult = $internalValue;
				}
				//End autoConvert
				return $autoConvertResult;
			} else {
				if(($this->debugMode&DataEntity::PROPERTY)>0) {
					echo "$name missed! Tring lazyload\n";
				}
				return $this->lazyLoad($name);
			}
		}
		/// end of __get
	}
	public function offsetSet($name, $value){
		// inline method __set()
		global $CFG;
		$setter = '__set_'.$name;
		if(method_exists($this, $setter)) {
			if(($this->debugMode&DataEntity::PROPERTY)>0) {
				echo "Calling setter for $name\n";
			}
			$this->$setter($value);
		} else {
			//Inline method autoConvert()
			$cvtEnum = &$CFG['Sybil']['staticCache'][$this->staticName]['propSpec']['convertEnum'][$name];
			if(is_array($cvtEnum)) {
				if(is_int($value) || ctype_digit($value)) {
					if(array_key_exists($value, $cvtEnum)) {
						$autoConvertResult = $value;
					} else {
						$autoConvertResult = 0;
					}
				} else {
					if(($i = array_search($value, $cvtEnum)) === false) {
						$autoConvertResult = 0;
					} else {
						$autoConvertResult = $i;
					}
				}
			} else {
				$autoConvertResult = $value;
			}
			//End autoConvert
			$value = $autoConvertResult;
			if(($this->debugMode&DataEntity::PROPERTY)>0) {
				echo "Internal value of $name is $value\n";
			}
			if($value !== $this->properties[$name]) {
				$this->properties[$name] = $value;
				$this->modifiedProps[$name] = true;
				if(($this->debugMode&DataEntity::PROPERTY)>0) {
					echo "New value of $name saved\n";
				}
			}
		}
		///end of __set
	}
	public function offsetUnset($offset) {
		if(method_exists($this, '__get_'.$offset)||method_exists($this, '__set_'.$offset)) {
			throw new PermissionDeniedException('Getter or Setter cannot be unset.');
		}
		unset($this->properties[$offset]);
	}
	public function __sleep() {
		return array('properties');
	}
	public function toReadArray() {
		$methods = get_class_methods($this);
		$getterProp = array();
		foreach($methods as $method) {
			if(preg_match('/^__get_([a-zA-Z0-9_]+)$/', $method, $pts) && $pts[1]!='properties') {
				$getterProp[$pts[1]] = $this->$method();
			}
		}
		return array_merge($getterProp, $this->properties);
	}
	public function __get_convertEnum() {
		global $CFG;
		return $CFG['Sybil']['staticCache'][$this->staticName]['propSpec']['convertEnum'];
	}
}
?>
