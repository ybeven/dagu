<?php
/**
 * EnumException
 * @version 0.1 04/04/2009
 * @author GuangXiN <rek@rek.me>
*/
class EnumException extends Exception {
	public function __construct($value, $enum) {
		parent::__construct("$value is not an element of the Enum $enum");
	}
}
?>