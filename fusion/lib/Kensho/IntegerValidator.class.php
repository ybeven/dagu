<?php
class IntegerValidator extends NumberValidator {
	public function validate(&$value, $validation) {
		if(!ctype_digit($value) && !is_integer($value)) {
			return false;
		}
		$value = intval($value);
		return $this->validationMatch($value, $validation);
	}
	public function compile(&$value, $validation) {
		
	}
	protected function parseNumber(&$validation) {
		if(preg_match('/^\s*(\d+)(.*)/', $validation, $matches)) {
			$validation = $matches[2];
			return $matches[1];
		} else {
			return false;
		}
	}
}
class IntValidator extends IntegerValidator {}
?>