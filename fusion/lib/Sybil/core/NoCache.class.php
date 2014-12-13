<?php
/**
 * NoCache class
 * @version 0.1 05/27/2009
 * @author GuangXiN <rek@rek.me>
*/
class NoCache extends KeyValueCache {
	function get($key, $callback=null, $state=null, $timeout=null) {
		if(!is_null($callback))
			return call_user_func_array($callback, $state);
		else
			return;
	}
	function set($key, $value, $timeout=null) {
		return true;
	}
	function del($key=null) {
		return true;
	}
}
?>