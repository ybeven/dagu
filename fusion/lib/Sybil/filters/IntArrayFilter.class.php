<?php
class IntArrayFilter extends DataFilter {
	public function getLevel() {
		return 7;
	}
	public function getSqlElement() {
		return $this->sql;
	}
	private $sql;
	public function __construct($field, $array) {
		if(count($array) <= 0 || $array[0] === '') {
			$this->sql = '0';
		} else {
			$sql = "`{$field}` IN (";
			$comma = false;
			foreach($array as $i) {
				if(!ctype_digit($i) && !is_int($i)) {
					if(empty($i)) continue;
					$errMsg = 'Array must be a integer array!'.$i;
					throw new ArgumentException('array', $errMsg);
				}
				if($comma) {
					$sql .= ',';
				} else {
					$comma = true;
				}
				$sql .= "'{$i}'";
			}
			$sql .= ')';
			$this->sql = $sql;
		}
	}
	public function getSeparator() {
		return ' AND ';
	}
}
?>