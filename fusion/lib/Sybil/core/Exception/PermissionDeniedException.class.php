<?php
/**
 * EnumException
 * @version 0.1 05/07/2009
 * @author GuangXiN <rek@rek.me>
*/
class PermissionDeniedException extends Exception {
	public function __construct($msg='') {
		parent::__construct("Permission denied!".$msg);
	}
}
?>