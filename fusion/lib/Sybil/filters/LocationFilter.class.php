<?php
class LocationFilter extends DataFilter {
	protected $sqlElement = '';
	private $filterLevel=6;
	/**
	 * @param mixed $rangeStart
	 * @param mixed $rangeEnd
	 * @param string $sqlField
	 * @param int $filterLevel
	 */
	public function __construct($sqlField, $locationCode, $filterLevel=6) {
		if(!is_int($locationCode) && !ctype_digit($locationCode)) {
			throw new ArgumentException('$locationCode should be an integer');
		}
		if($locationCode == 0) {
			$this->sqlElement = "1";
		} else if($locationCode%100 == 0) {
			$locationCode = floor($locationCode/100);
			$this->sqlElement = "`{$sqlField}` BETWEEN '{$locationCode}00' AND '{$locationCode}99'";
		} else {
			$this->sqlElement = "`{$sqlField}`={$locationCode}";
		}
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