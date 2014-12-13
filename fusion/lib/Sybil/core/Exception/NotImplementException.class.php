<?php
/**
 * @author guangxin
 * @copyright 07/16/2008
 */

class NotImplementException extends Exception {
	public function __construct($message='') {
		parent::__construct($message, E_USER_ERROR);
	}
}

?>