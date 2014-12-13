<?php
function removeRole($roleId) {
	needLogin();
	$session = Session::start();
	
    if(($roleId = intval($roleId)) <= 0){
        http302('/system/manageRole/auto/'.urlencode('角色ID无效'));
		return;
    }
	if(empty($roleId)) {
		http302('/system/manageRole/auto/'.urlencode('角色ID无效'));
		return;
	}
	try {
		$role = new Role;
		$role->getById($roleId);
		if($role->id >0) {
			$role->remove($roleId, false);
			$session = Session::start();
			$curUser = $session->curUser;
			$logger = new CategoryLogger('log_role');
			$logger->log("用户{$curUser->name}(id:{$curUser->id})于".date('Y年m月d日H:i:s')."删除了角色{$role->name}(id:{$role->id})");
			http302('/system/manageRole/auto/'.urlencode($role->name.'已经成功删除'));
		} else {
			http302('/system/manageRole/auto/'.urlencode('要删除的角色已经不存在'));
		}
	} catch(PDOException $ex) {
		if($ex->getCode() == MYSQL_FOREIGN_KEY_RESTRICT) { //foreign key restrict
			http302('/system/manageRole/auto/'.urlencode('有用户担任此角色，请先到用户管理页面重新指定角色'));
		} else {
			throw $ex;
		}
	}
}
?>