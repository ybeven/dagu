<?php
/**
 * ACache class
 * for Alternative PHP Cache
 * @version 3.0 05/31/2010
 * @author GuangXiN <rek@rek.me>
 * @version 3.1 add array scope for callback $state
 */
class ACache extends KeyValueCache {
	function get($key, $callback=null, $state=null, $timeout=null) {
		$result = unserialize(apc_fetch($key, $success));
		if($success) {
			return $result;
		} else {
			$result = call_user_func_array($callback, array($state));
			apc_store($key, serialize($result), $timeout);
			return $result;
		}
	}
	function set($key, $value, $timeout=null) {
		return apc_store($key, serialize($value), $timeout);
	}
	function del($key=null) {
		if(is_null($key)) {
			return apc_clear_cache('user') && apc_clear_cache('system');
		} else {
			return apc_delete($key);
		}
	}
}
?>
