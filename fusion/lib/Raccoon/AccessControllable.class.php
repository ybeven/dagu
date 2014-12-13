<?php
/**
 * Interface AccessControllable is used by AccessController
 * to unique identify the class to be controlled and gets the
 * inherited classes
 */
interface AccessControllable {
	/**
	 * Get the name of the access control list
	 * @return string
	 */
	function getAclName();
	/**
	 * Get the unique id number of the object
	 * @return int;
	 */
	function getUniqueId();
	/**
	 * Get the access controllable objects from which inherit accessibilities
	 * @return array(AccessControllable) or null if no inherited collections
	 */
	function getInheritedAccesses();
}
?>