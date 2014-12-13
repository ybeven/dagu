<?php
function showPrivilege($roleId , $notice=null){
	global $smarty;
	needLogin();
	
	$session = Session::start();
	$curUser = $session->curUser;
	

    $role = new Role;
    if(($roleId = intval($roleId)) <= 0){
        http302('/system/manageRole/'.urlencode('角色ID无效'));
		return;
    }
    $role = $role->getSingle('id' , $roleId);
    if($role->id <= 0){
        http302('/system/manageRole/'.urlencode('角色ID无效'));
		return;
    }
	$accController = new AccessController();
	
	$actionDump = $accController->dumpAction();
	if(!is_array($actionDump))
		$actionDump = array();
	$aclDump = $accController->dumpAcl($role);
	if(!is_array($aclDump))
		$aclDump = array();
	$actionArray = array();
	$actionAcl = array();
	foreach($actionDump as $key => $value){
		array_push($actionArray , $key);
		if(!array_key_exists($key ,$aclDump))
			array_push($actionAcl , 2);
		else
			array_push($actionAcl , $aclDump[$key]);
	}
	notice($notice);
	
	$crumb = Crumb::getCrumb();
	$crumb->popAllLatitude();
	$crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("角色管理" , "/system/manageRole" , false);
	$crumb->visitNewPage("角色授权" , "/system/showPrivilege" , true);
	
	$approvals = array("禁止" , "允许" , "未定义");
	$smarty->assign("role" , $role);
	$smarty->assign("actionArray" , $actionArray);
	$smarty->assign("approvals" , $approvals);
	$smarty->assign("actionAcl" , $actionAcl);
	$smarty->setTitle("角色授权");
	$smarty->displayMother("system/showPrivilege.tpl");
}
?>