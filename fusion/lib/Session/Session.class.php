<?php
/**
 * @property User $curUser Get the user logged in currently. false if no login
 * @property int  $curUserId Get the curUser's id. READONLY
 */
final class Session {
	private $cache = null;
	private $sessionId = null;
	private $session = array();
	private static $ins = null;
	public static function &start() {
		global $CFG;
		if(!self::$ins instanceof Session) {
			$cacheTypeClass = new ReflectionClass($CFG['Session']['cacheType']);
			$cacheInitParams = is_array($CFG['Session']['cacheInitParams'])?$CFG['Session']['cacheInitParams']:array();
			$cache = $cacheTypeClass->newInstanceArgs($cacheInitParams);
			self::$ins = new Session($cache);
		}
		return self::$ins;
	}
	private function __construct(&$cache) {
		if(!$cache instanceof KeyValueCache) {
			throw new InvalidArgumentException('$cache should be an instance of KeyValueCache');
		}
		$this->cache = $cache;
		if(strlen($_COOKIE['SESSID']) == 16) {
			$this->sessionId = $_COOKIE['SESSID'];
		} else {
			$this->sessionId = $this->generateSessionId();
			setcookie('SESSID', $this->sessionId, 0, '/');
		}
		$this->session = $this->cache->get($this->sessionId);
		if(!is_array($this->session)) {
			$this->session = array();
		}
	}
	public function __destruct() {
		$this->cache->set($this->sessionId, $this->session, 7200);
	}
	public function __set($name, $value) {
		$setter = '__set_'.$name;
		if(method_exists($this, $setter)) {
			$this->$setter($value);
		} else {
			$this->session[$name] = $value;
		}
	}
	public function __get($name) {
		$getter = '__get_'.$name;
		if(method_exists($this, $getter)) {
			return $this->$getter();
		} else {
			return $this->session[$name];
		}
	}
	public function __unset($name) {
		$unsetter = '__unset_'.$name;
		if(method_exists($this, $unsetter)) {
			$this->$unsetter();
		} else {
			unset($this->session[$name]);
		}
	}
	/**
	 * Set $curUser as logged in User.
	 * @param User $curUser The user whoes password has been verified.
	 * @return boolean true on success or false on error
	 */
	public function login($curUser) {
		if($curUser instanceof User && $curUser->id > 0) {
			$this->curUser = $curUser;
			$this->session['curUserId'] = $curUser->id;
			return true;
		} else {
			return false;
		}
	}
	public function logout() {
		$this->curUser = null;
		unset($this->session['curUserId']);
	}
	private $curUser = null;
	private function __get_curUser() {
		if($curUser instanceof User) {
			return $this->curUser;
		} else if(intval($this->session['curUserId']) > 0) {
			$this->curUser = new User;
			$this->curUser->getById($this->session['curUserId']);
			if($this->curUser->id > 0) {
				return $this->curUser;
			} else {
				$this->curUser = null;
				return false;
			}
		} else {
			return false;
		}
	}
	protected function __unset_curUserId() {
		throw new PermissionDeniedException('curUserId is READONLY');
	}
	protected function __set_curUserId($value){
		throw new PermissionDeniedException('curUserId is READONLY');
	}
	
	protected function generateSessionId() {
		return substr(md5(microtime().rand(0,32767)), 4, 16);
	}
}
?>