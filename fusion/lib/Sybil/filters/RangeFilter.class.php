<?php
class RangeFilter extends DataFilter {
	protected $sqlElement = '';
	private $filterLevel=6;
	/**
	 * @param mixed $rangeStart
	 * @param mixed $rangeEnd
	 * @param string $sqlField
	 * @param int $filterLevel
	 */
	public function __construct($rangeStart, $rangeEnd, $sqlField, $filterLevel=6) {
		$this->sqlElement = "`{$sqlField}` BETWEEN '{$rangeStart}' AND '{$rangeEnd}'";
		$this->filterLevel = $filterLevel;
	}
	public function getLevel() {
		return $this->filterLevel;
	}
	protected function getSqlElement() {
		return $this->sqlElement;
	}
	protected function getSeparator() {
		return ' AND ';
	}
}
?>