<?php
/**
 * ArgumentException
 * @version 0.1 04/04/2009
 * @author GuangXiN <rek@rek.me>
*/
class ArgumentException extends Exception {
	/**
	 * @param string $arg
	 */
	public function __construct($arg) {
		parent::__construct("Invalid argument $arg");
	}
}
?>