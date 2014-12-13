<?php
class ArrayValidator extends TypeValidator {
	private $definition = array();
	private $failList = array();

	public function getFailList() {
		return $this->failList;
	}
	public function compile(&$array, $validation) {
		throw new Exception("Not implement");
	}
	public function validate(&$array, $validation) {
		// Analyze the validation string
		$definition = trim($validation);
		if(empty($definition)) {
			return is_array($array);
		}
		while(strlen($definition) > 0) {
			$key = $this->parseIdentifier($definition);
			$this->parseSeparator($definition);
			$datatype = $this->parseIdentifier($definition);
			$validation = $this->parseValidation($definition);
			$this->parseSeparator($definition);
			$this->definition[$key] = array(
				'datatype' => $datatype,
				'validation' => $validation
			);
		}

		// Do the validation for each member of the array
		$success = true;
		foreach($array as $k => $v) {
			if(isset($this->definition[$k])) {
				$d = $this->definition[$k];
				$validator = $this->getTypeValidator($d['datatype']);
				if($validator instanceof TypeValidator) {
					if(! $validator->validate($v, $d['validation'])) {
						unset($array[$k]);
						$success = false;
						$this->failList[$k] = $v;
						trigger_error("$k has been removed since validation failed.", E_USER_NOTICE);
					}
				} else {
					throw new ValidatorNotDefinedException("Validator for datatype {$d['datatype']} hasn't been declared!");
				}
			} else {
				unset($array[$k]);
				$success = false;
				trigger_error("$k has been removed since validation not specified.", E_USER_NOTICE);
				$this->failList[$k] = $v;
			}
		}
		return $success;
	}
	private function parseIdentifier(&$str) {
		if(preg_match('/^(\s*[_\w][_\w\d]*)/', $str, $match) === false) {
			throw new ParseFailedException("Error ocurred on parsing identifier nearby $str");
		}
		$str = substr($str, strlen($match[1]));
		return ltrim($match[1]);
	}
	private function parseValidation(&$str) {
		$length = strlen($str);
		$start = 0; $end = 0;
		$cnt = 0; $started = false;
		for($i = 0; $i < $length; $i++) {
			if(strpos(" \r\n\t", $str[$i]) !== false) {
				continue;
			} else if($str[$i] == '(') {
				if(++$cnt == 1) {
					$start = $i;
					$started = true;
				}
			} else if($str[$i] == ')') {
				if(--$cnt == 0) {
					$end = $i + 1;
					break;
				}
			} else if($str[$i] == ',') {
				if($started)
					continue;
				else
					break;
			} else if(!$started) {
				throw new ParseFailedException("Error ocurred on parsing validation nearby $str");
			}
		}
		//start and end includes the () $validation do not need this
		if($end > $start) {
			$validation = substr($str, $start + 1, $end - $start - 2);
			$str = substr($str, $end);
		}
		if($validation === false || $validation === "") {
			$validation = null;
		}
		return $validation;
	}
	private function parseSeparator(&$str) {
		if(preg_match('/^(\s*[:,])/', $str, $match) === false) {
			throw new ParseFailedException("Error ocurred on parsing separator nearby $str");
		}
		$str = substr($str, strlen($match[1]));
		return ltrim($match[1]);
	}
	public function getDefinition() {
		return $this->definition;
	}
}
?>