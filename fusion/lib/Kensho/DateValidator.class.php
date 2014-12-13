<?php
class DateValidator extends TypeValidator {
	public function validate(&$value, $format) {
		if(empty($format)) {
			$format = 'Y-m-d';
		}
		$parsedDate = date_parse($value);
		if($parsedDate['error_count']+$parsedDate['warning_count'] > 0) {
			return false;
		} else {
			return true;
		}
	}
	public function compile(&$value, $validation) {
	}
}
?>