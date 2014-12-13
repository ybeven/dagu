<?php
/**
 * MCache class
 * @version 3.0 05/31/2010
 * @author GuangXiN <rek@rek.me>
*/
class MCache extends KeyValueCache {
	private $mc = null;
	private $defTimeout = null;
	const MEMCACHE_MAXOBJSIZE=1048497;
	public function __construct($servers = null) {
		global $CFG;
		if(is_null($servers)) {
			$servers = $CFG[memcache][servers];
		}
		$this->defTimeout = $CFG[memcache][defaultTimeout];
		$this->mc = new Memcache;
		foreach($servers as $server) {
			$this->mc->addServer($server[host], $server[port]);
		}
	}
	/**
	 * @return mixed
	 */
	public function get($key, $callback=null, $state=null, $timeout=null) {
		if(is_null($timeout)) $timeout = $this->defTimeout;
		$value = $this->mc->get($key);
		if($value === false) {
			return $this->getFromCallback($key, $callback, $state);
		}
		$value = unserialize($value);
		if(is_array($value) && $value['__SAFECACHE__']) {
			unset($value['__SAFECACHE__']);
			$str = '';
			foreach($value as $i => $k) {
				if($s = $this->mc->get($k)){
					$str .= $s;
				} else {
					return $this->getFromCallback($key, $callback, $state);
				}
			}
			return unserialize($str);
		} else {
			return $value;
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
		$size = strlen($value);
		if($size > self::MEMCACHE_MAXOBJSIZE) {
			$slice = floor($size / self::MEMCACHE_MAXOBJSIZE) + ($size%self::MEMCACHE_MAXOBJSIZE>0?1:0);
			$result = true;
			for($i = 0; $i < $slice; $i++) {
				$k[$i] = hash('MD4', $key.$i);
				$s = substr($value, $i*self::MEMCACHE_MAXOBJSIZE, self::MEMCACHE_MAXOBJSIZE);
				$result = $result && $this->safeSet($k[$i], $s, $timeout);
				if(!$result) return false;
			}
			$k['__SAFECACHE__'] = true;
			return $this->safeSet($key, serialize($k), $timeout);
		} else {
			return $this->safeSet($key, $value, $timeout);
		}
	}
	private function safeSet($key, $value, $timeout) {
		if(!$this->mc->add($key, $value, MEMCACHE_COMPRESSED, $timeout)) {
			return $this->mc->replace($key, $value, MEMCACHE_COMPRESSED, $timeout);
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