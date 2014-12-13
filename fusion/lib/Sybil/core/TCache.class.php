<?php
/**
 * TCache class
 * TCache is a MCache implement without 1MB object cut, use for Tokyo
 * @version 3.0 05/31/2010
 * @author GuangXiN <rek@rek.me>
 */
class TCache extends KeyValueCache {
	private $mc = null;
	private $defTimeout = null;
	public function __construct($servers = null) {
		global $CFG;
		if(is_null($servers)) {
			$servers = $CFG['tokyo']['servers'];
		}
		$this->defTimeout = $CFG['tokyo']['defaultTimeout'];
		$this->mc = new Memcache;
		foreach($servers as $server) {
			$this->mc->addServer($server['host'], $server['port']);
		}
	}
	public function get($key, $callback=null, $state=null, $timeout=null) {
		if(is_null($timeout)) $timeout = $this->defTimeout;
		$value = $this->mc->get($key);
		if($value === false) {
			return $this->getFromCallback($key, $callback, $state);
		} else {
			return unserialize($value);
		}
	}
	private function getFromCallback($key, $callback, $state) {
		if($callback != null) {
			$value = call_user_func_array($callback, $state);
			$this->set($key, $value, $timeout);
			return $value;
		} else {
			return false;
		}
	}
	public function set($key, $value, $timeout=null) {
		if(is_null($timeout)) $timeout = $this->defTimeout;
		$value = serialize($value);
		if(!$this->mc->add($key, $value, 0, $timeout)) {
			return $this->mc->replace($key, $value, 0, $timeout);
		} else {
			return true;
		}
	}
	public function del($key=null) {
		if(is_null($key)) {
			$this->mc->flush();
		} else {
			$this->mc->delete($key);
		}
	}
}
?>