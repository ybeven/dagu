<?php
/**
 * FormatException
 * @version 0.1 09/04/2009
 * @author GuangXiN <rek@rek.me>
*/
class FormatException extends Exception {
	public function __construct($msg) {
		parent::__construct("$msg");
	}
}
?>