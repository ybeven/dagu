<?php
class FCache extends KeyValueCache {
	private $path;
	public function __construct($path=null) {
		global $CFG;
		if(empty($path)) {
			$this->path = $CFG['FCache']['path'];
		} else {
			$this->path = $path;
		}
	}
	public function get($key, $callback=null, $state=null, $timeout=null) {
		$result = $this->fetch($key, $success);
		if($success) {
			return $result;
		} else if(is_callable($callback)){
			$result = call_user_func_array($callback, $state);
			$this->store($key, $result, $timeout);
			return $result;
		} else {
			return false;
		}
	}
	public function set($key, $value, $timeout=null) {
		$this->store($key, $value, $timeout);
	}
	public function del($key=null) {
		if(is_null($key)) {
			$this->clear();
		} else {
			$this->remove($key);
		}
	}
	private function fetch($key, &$success) {
		$file = $this->path.'/'.hash('md4', $key);
		if(is_file($file)) {
			$fp = fopen($file, "r");
			$str = stream_get_contents($fp);
			$var = unserialize($str);
			if($var['expire'] == 0) {
				$success = true;
				return $var['value'];
			} else if(time() < $var['expire']) {
				$success = true;
				return $var['value'];
			} else {
				$success = false;
				return false;
			}
		} else {
			$success = false;
			return false;
		}
	}
	private function store($key, $value, $timeout) {
		$file = $this->path.'/'.hash('md4', $key);
		$expire = $timeout == 0?0:time()+$timeout;
		$str = serialize(array(
			'expire'=>$expire,
			'value'=>$value
		));
		$fp = fopen($file, "w");
		fwrite($fp, $str);
		fclose($fp);
	}
	private function remove($key) {
		$file = $this->path.'/'.hash('md4', $key);
		if(is_file($file)) {
			unlink($file);
		}
	}
	private function clear() {
		$files = scandir($this->path);
		foreach($files as $file) {
			if(is_file($file)) {
				unlink($file);
			}
		}
	}
	public function cleanExpired() {
		echo "Initializing...\n";
		$files = scandir($this->path);
		$now = time();
		echo "Now the timestamp is {$now}\n";
		foreach($files as $file) {
			$file = $this->path.'/'.$file;
			if(!is_file($file)) continue;
			echo "Loading file {$file}...";
			$fp = @fopen($file, 'r');
			$str = @stream_get_contents($fp);
			echo $str===false?"Failed\n":"OK\n";
			@fclose($fp);
			$var = unserialize($str);
			if($var === false){
				echo "Unable to unserialize content...Deleted\n";
				unlink($file);
			} else if($var['expire'] <= $now) {
				echo "Expired...Deleted\n";
				unlink($file);
			} else {
				list($d, $r) = $this->div($var['expire'] - $now, 86400);
				list($h, $r) = $this->div($r, 3600);
				list($m, $s) = $this->div($r, 60);
				echo "Will expire in {$d} days {$h} hours {$m} minutes {$s} seconds\n";
			}
		}
	}
	private function div($a, $b) {
		$q = $a/$b>0?floor($a/$b):ceil($a/$b);
		$r = $a%$b;
		return array($q, $r);
	}
}
?>