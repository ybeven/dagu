<?php
function saveRole(){
    $session = Session::start();
	if(!empty($_POST)) {
		$session->roleInfo = $_POST;
	}
	$savedPostData = $session->roleInfo;
	needLogin();
	
	

	$postDef = <<<POSTDEF
	name:string(/^.+$/)
POSTDEF;
	$v = new ArrayValidator;
	$v->validate($savedPostData, $postDef);
	$missing = necessary('name', $savedPostData);

	if($missing) {
		if($missing == 'name') {
			http302('/system/manageRole/auto/'.urlencode("请输入角色名称"));
		}
		return;
	} else {
        $role = new Role;
		$role->name = $savedPostData['name'];
		try {
			$role->add();
			unset($session->positionInfo);
			$curUser = $session->curUser;
			$logger = new CategoryLogger('log_role');
			$logger->log("用户{$curUser->name}(id:{$curUser->id})于".date('Y年m月d日H:i:s')."添加了新角色{$role->name}(id:{$role->id})");
			http302('/system/manageRole/auto/'.urlencode("角色添加成功"));
		} catch(PDOException $ex) {
			if($ex->getCode() == MYSQL_DUPLICATE_KEY) { // duplicate key
				http302('/system/manageRole/auto'.urlencode("{$role->name}已经存在"));
			} else {
				throw $ex;
			}
		}
	}
}