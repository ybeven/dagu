<?php
class IntEqualFilter extends DataFilter {
	private $sqlElement = '';
	/**
	 * 整数等值过滤器
	 * @param int $int
	 */
	public function __construct($field, $int){
		if(is_int($int) || ctype_digit($int)){
			$this->sqlElement = '`'.$field.'`=\''.$int.'\'';
		} else {
			throw new ArgumentException('$int');
		}
	}
	public function getLevel() {
		return 6;
	}
	protected function getSqlElement() {
		return $this->sqlElement;
	}
	protected function getSeparator() {
		return ' AND ';
	}
}
?>