<?php
class FloatValidator extends NumberValidator {
	public function validate(&$value, $validation) {
		if(!preg_match('/^\d*\.?\d+$/', $value)) {
			return false;
		}
		$value = floatval($value);
		return $this->validationMatch($value, $validation);
	}
	public function compile(&$value, $validation) {
		
	}
	protected function parseNumber(&$validation) {
		if(preg_match('/^\s*(\d*\.?\d+)(.*)/', $validation, $matches)) {
			$validation = $matches[2];
			return $matches[1];
		} else {
			return false;
		}
	}
}
?>