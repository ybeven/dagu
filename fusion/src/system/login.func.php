<?php
function login($notice=null, $jumpTo=null) {
	global $smarty;
	notice($notice);
	
	$smarty->assign('jumpTo', $jumpTo);
	$smarty->display('system/login.tpl');
}
?>