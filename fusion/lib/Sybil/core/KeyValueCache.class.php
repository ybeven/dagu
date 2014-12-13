<?php
abstract class KeyValueCache {
	abstract public function get($key, $callback=null, $state=null, $timeout=null);
	abstract public function set($key, $value, $timeout=null);
	abstract public function del($key=null); // delete all if $key is null
}
?>