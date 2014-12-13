<?php
function saveUser(){
	//state stand for the post purpose
	$session = Session::start();
	if(!empty($_POST)) {
		$session->userInfo = $_POST;
	}
	needLogin();
	$savedUserInfo = $session->userInfo;
	
	$ac = new AccessController;
	switch($savedUserInfo['state']){
		case "addUser":
			
				performAdd($savedUserInfo , $session);	
			
			break;
		case "updateUser":
			
				performUpdate($savedUserInfo , $session);	
			
			break;
		case "changePwd":
			performChangePwd($savedUserInfo , $session);
			break;
	}
	
	
}

/**
 * perform the action of add
 * @param userInfo to be saved into the database $savedUserInfo
 * @param reference to the sessin handle $session
 */
function performAdd($savedUserInfo , &$session){
	//check whether all the items of the form have been filled
	$postArray = array(
					   "name" => "用户名",
					   "roleId" => "角色"
					   );
		
	if(!checkNecessary($postArray , $savedUserInfo , $item)){
		http302("/system/manageUserq/auto/".urlencode($item."未填写，请仔细检查"));
		return;
	}
	
	$postDef = <<<POSTDEF
			   name:string, roleId:integer, state:string
POSTDEF;
	//check the format of each form item
	if(!checkFormat($savedUserInfo , $postDef , $item)){
		http302("/system/manageUserq/auto/".urlencode($postArray[$item]."格式不正确，请仔细检查"));
		return;
	}
	
	$user = new User;
	foreach($postArray as $key =>$value){
		$user->$key = $savedUserInfo[$key];
	}
	$user->password = md5('1234');
	try{
		$user->add();
		unset($session->userInfo);
		$curUser = $session->curUser;
		$logger = new CategoryLogger("log_user");
		$logger->log("用户{$curUser->name}(id:{$curUser->id})于".date("Y年m月n日H:i:s")."添加了用户{$user->name}(id:{$user->id})");
		http302("/system/manageUserq/auto/".urlencode("用户添加成功"));
		return;
	}
	catch(PDOException $ex){
		if($ex->getCode() == MYSQL_DUPLICATE_KEY){ //duplicate key
			http302("/system/manageUserq/auto/".urlencode($savedUserInfo['name']."已经存在！"));
			return;
		}
		else
			throw $ex;
	}
}

/**
 * perform the action of update
 * @param userInfo to be saved into the database $savedUserInfo
 * @param reference to the session $session
 */
function performUpdate($savedUserInfo , $session){
	$postArray = array(
			"name" => "用户名",
			"roleId" => "角色"							   
			);
	if(!checkNecessary($postArray , $savedUserInfo , $item)){
		http302("/system/manageUserq/auto/".urlencode($item."未填写，请仔细检查"));
		return;
	}
	
	$postDef = <<<POSTDEF
		id:integer, name:string, roleId:integer, state:string
POSTDEF;
	//check the format of each form item
	if(!checkFormat($savedUserInfo , $postDef , $item)){
		http302("/system/manageUserq/auto/".urlencode($postArray[$item]."格式不正确，请仔细检查"));
		return;
	}
	
	$user = new User;
	$user = $user->getById($savedUserInfo['id']);
	if (!$user) {
		http302("/system/manageUserq/");
		return;
	}
	foreach($postArray as $key => $value){
		if($user->$key != $savedUserInfo[$key])
			$user->$key = $savedUserInfo[$key];
	}
	try{
		$user->update();
		unset($session->userInfo);
		$curUser = $session->curUser;
		$logger = new CategoryLogger("log_user");
		$logger->log("用户{$curUser->name}(id:{$curUser->id})于".date("Y年m月n日H:i:s")."修改了用户{$user->name}(id:{$user->id})的信息");
		http302("/system/manageUserq/auto/".urlencode("用户信息更新成功"));
		return;
	}
	catch(PDOException $ex){
		throw $ex;	
	}		
}

/**
 * perform the action to change password
 * @param userInfo to be saved into the database $savedUserInfo
 * @param reference to the session $session
 */
function performChangePwd($savedUserInfo , $session){
	//check whether all the items of the form have been filled
	$postArray = array(
					   "oldPassword" => "原密码",
					   "password" => "新密码",
					   "confirm" => "密码确认"
					   );
	if(!checkNecessary($postArray , $savedUserInfo , $item)){
		http302("/system/changePwd/".urlencode($item."未填写，请仔细检查"));
		return;
	}
	
	$postDef = <<<POSTDEF
			oldPassword:string, password:string, confirm:string, state:string
POSTDEF;
	//check the format of each form item
	if(!checkFormat($savedUserInfo , $postDef , $item)){
		http302("/system/changePwd/".urlencode($postArray[$item]."格式不正确，请仔细检查"));
		return;
	}
	
	//check whether the password and the confirm are the same
	if(!checkPwdConfirm($savedUserInfo)){
		http302("/system/changePwd/".urlencode("密码和密码确认不符"));
		return;
	}
	
	$user = $session->curUser;
	if($user->password != md5($savedUserInfo['oldPassword'])){
		http302("/system/changePwd/".urlencode("原密码输入有误"));
		return;
	}
	$user->password = md5($savedUserInfo['password']);
	try{
		$user->update();
		unset($session->userInfo);
		$curUser = $session->curUser;
		$logger = new CategoryLogger("log_user");
		$logger->log("用户{$curUser->name}(id:{$curUser->id})于".date("Y年m月n日H:i:s")."更改了用户密码");
		http302("/system/changePwd/".urlencode("密码修改成功"));
		return;
	}
	catch(PDOException $ex){
		throw $ex;
	}
}	

/**
 *check whether password and confirm are the same
 *@param array $post
 *@return boolean true on password and confirm are the same
 */
function checkPwdConfirm($post){
	if($post['password'] == $post['confirm'])
		return true;
	else
		return false;
}
?>