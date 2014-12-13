<?php
class StringValidator extends TypeValidator {
	public function validate(&$value, $pattern) {
		if(is_string($value)) {
			if(empty($pattern)) {
				return true;
			} else {
				return preg_match($pattern, $value)?true:false;
			}
		} else {
			return false;
		}
	}
	public function compile(&$value, $validation) {
		throw new Exception('NotImplement');
	}
}
?>