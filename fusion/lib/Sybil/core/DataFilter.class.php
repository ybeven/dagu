<?php
/**
 * DataFilter
 * @author GuangXiN <rek@rek.me>
 * @ver 2.0 Sybil 05/07/2009
 * v2.1 06/23/2009 fixed separator spelling error in compound.
 * v2.2 fixed getSQL missing separator when no compound is called problem
 * @version 2.2 Sybil 07/20/2009
 */
abstract class DataFilter {
	protected $leftFilter = null;
	protected $rightFilter = null;
	public $___seprator;
	public function compound($dataFilter, $seprator=null) {
		if(is_null($seprator)) {
			$seprator = $dataFilter->getSeparator();
		}
		if($dataFilter->getLevel() > $this->getLevel()) {
			if($this->leftFilter === null) {
				$dataFilter->___seprator = $seprator;
				$this->leftFilter = $dataFilter;
			} else {
				$this->leftFilter->compound($dataFilter, $seprator);
			}
		} else {
			if($this->rightFilter === null) {
				$dataFilter->___seprator = $seprator;
				$this->rightFilter = $dataFilter;
			} else {
				$this->rightFilter->compound($dataFilter, $seprator);
			}
		}
	}
	public function getSQL() {
		$result = '';
		if($this->leftFilter !== null) {
			$result .= $this->leftFilter->getSQL();
		}
		$result .= empty($this->___seprator)?$this->getSeparator():$this->___seprator;
		$result .= $this->getSqlElement();
		if($this->rightFilter !== null) {
			$result .= $this->rightFilter->getSQL();
		}
		return $result;
	}
	public abstract function getLevel();
	protected abstract function getSqlElement();
	protected function getSeparator() {
		return ' ';
	}
	public function __clone() {
		if(!is_null($this->leftFilter)) {
			$this->leftFilter = clone $this->leftFilter;
		}
		if(!is_null($this->rightFilter)) {
			$this->rightFilter = clone $this->rightFilter;
		}
	}
}
?>