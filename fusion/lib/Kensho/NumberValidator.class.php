<?php
abstract class NumberValidator extends TypeValidator {
	protected $valueStructure = array();
	protected function validationMatch(&$value, &$validation) {
		$this->analyzeValidation($validation);
		if(empty($this->valueStructure)) {
			return true;
		}
		$matchAll = true;
		foreach($this->valueStructure as $operator => $limitation) {
			if($operator == 'in') {
				$match = array_search($value, $limitation) !== false;
			} else {
				$compareCode = '$match = $value '.$operator.' $limitation;';
				eval($compareCode);
			}
			if(!($matchAll = $matchAll && $match)) {
				return false;
			}
		}
		return true;
	}
	abstract protected function parseNumber(&$validation);

	private function parseDelimiter(&$validation) {
		$validation = ltrim($validation);
		if(($delimiter = $validation[0]) == ',') {
			$validation = substr($validation, 1);
			return ',';
		} else {
			return false;
		}
	}
	private function parseNumberEnum(&$validation) {
		$validation = ltrim($validation);
		$numbers = array();
		if($validation[0] == '(') {
			$validation = substr($validation, 1);
			while($validation[0]!=')') {
				$number = $this->parseNumber($validation);
				if($number !== false) {
					array_push($numbers, $number);
				} else {
					return false;
				}
				$this->parseDelimiter($validation);
			}
			$validation = substr($validation, 1);
		}
		return $numbers;
	}
	private function parseOperator(&$validation) {
		$validation = ltrim($validation);
		if($validation[1] == '=') {
			if(strpos('><=!', $validation[0]) !== false) {
				$operator = substr($validation, 0, 2);
				$validation = substr($validation, 2);
				return $operator;
			} else {
				return false;
			}
		} else if(substr($validation, 0, 2) == 'in') {
			$validation = substr($validation, 2);
			return 'in';
		} else if($validation[0] == '>' || $validation[0] == '<') {
			$operator = $validation[0];
			$validation = substr($validation, 1);
			return $operator;
		} else {
			return false;
		}
	}
	private function analyzeValidation(&$validation) {
		$vStructure = &$this->valueStructure;
		while(strlen(ltrim($validation)) > 0) {
			$operator = $this->parseOperator($validation);
			if($operator === false) {
				throw new ParseFailedException('Syntax error nearby '.$validation);
			} else if($operator == 'in') {
				if(array_key_exists($operator, $vStructure)) {
					throw new ParseFailedException('Duplicated limitation '.$operator);
				}
				$numbers = $this->parseNumberEnum($validation);
				if($numbers === false) {
					throw new ParseFailedException('Empty number enumerator');
				}
				$vStructure[$operator] = $numbers;
			} else {
				if(array_key_exists($operator, $vStructure)) {
					throw new ParseFailedException('Duplicated limitation '.$operator);
				}
				$vStructure[$operator] = $this->parseNumber($validation);
			}
			$delimiter = $this->parseDelimiter($validation);
		}
		return $vStructure;
	}
}
?>