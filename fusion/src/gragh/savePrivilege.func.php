<?php
function savePrivilege(){
	$session = Session::start();
	if(!empty($_POST)) {
		$session->privilegeInfo = $_POST;
	}
	$savedPrivilegeInfo = $session->privilegeInfo;
	needLogin();
	if(!isset($savedPrivilegeInfo['approval'])){
		http302("/system/showPrivilege/".$savedPrivilegeInfo['roleId']."/".urlencode("参数丢失！"));
	}
	
	$role = new Role;
    $role = $role->getSingle('id' , intval($savedPrivilegeInfo['roleId']));
    if($role->id <= 0){
        http302('/system/showPrivilege/'.$savedPrivilegeInfo['roleId']."/".urlencode('角色ID无效'));
		return;
    }
	$accController = new AccessController;
	
	$actionDump = $accController->dumpAction();
	if(!is_array($actionDump))
		$actionDump = array();
	$actionArray = array();
	foreach($actionDump as $key => $value)
		array_push($actionArray , $key);
	try{
		$curUser = $session->curUser;
		$logger = new CategoryLogger("log_privilege");
		foreach($savedPrivilegeInfo['approval'] as $key => $value){
			if($value == 0){
				$accController->forbid($actionArray[$key] , $role);				
			}
			else if($value == 1){
				$accController->permit($actionArray[$key] , $role);
			}
			else if($value == 2){
				$accController->revoke($actionArray[$key] , $role);
			}
		}
		unset($session->privilegeInfo);
		$logger->log("用户{$curUser->name}(id:{$curUser->id})于".date("Y年m月n日H:i:s")."变更角色{$role->name}(id:{$role->id})的操作权限");
		http302("/system/showPrivilege/".$savedPrivilegeInfo['roleId']."/".urlencode("授权操作成功"));
	}
	catch(Exception $e){
		throw $e;
	}
}
?>