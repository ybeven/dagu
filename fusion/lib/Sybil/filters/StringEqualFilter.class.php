<?php
class StringEqualFilter extends DataFilter {
	private $sqlElement = '';
	/**
	 * 字符串等值过滤器
	 * @param string $str
	 */
	public function __construct($field, $str){
		if( is_string($str)){
			$this->sqlElement = '`'.$field.'`=\''.mysql_escape_string($str).'\'';
		} else {
			throw new ArgumentException('str');
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