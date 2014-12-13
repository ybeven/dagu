<?php
function doLogin($jumpTo=null) {
	if(empty($jumpTo)) $jumpTo = '%2Fstart';
    if(($_POST['username'] == "") || ($_POST['password'] == "")){
       http302('/system/login/'.urlencode('用户名或密码不能为空').urlencode($jumpTo));
		return;
    }
    
	$postDef = <<<POSTDEF
username:string, password:string
POSTDEF;
	$v = new ArrayValidator();
	$v->validate($_POST, $postDef);
	$failedList = $v->getFailList();
	if(!empty($failedList)) {
		http302('/system/login/'.urlencode('用户名／密码格式错误').urlencode($jumpTo));
		return;
	}
	$session = Session::start();
	$user = new User;
	$user->getSingle('name', $_POST['username']);
	if($user->id <= 0) {
		http302('/system/login/'.urlencode('用户名不存在').urlencode($jumpTo));
		return;
	}
	if($user->password != $_POST['password']) {
		http302('/system/login/'.urlencode('密码错误').urlencode($jumpTo));
		return;
	}
	$logger = new CategoryLogger('log_login');
	if(!$user->isActive) {
		http302('/system/login/'.urlencode('此用户已冻结').'/'.$jumpTo);
		$logger->log("已冻结用户{$user->name}(id:{$user->id})于".date('Y年m月d日H:i:s')."试图登录系统");
		return;
	}
	$session->login($user);
	$logger->log("{$user->name}(id:{$user->id})于".date('Y年m月d日H:i:s').'登录了系统');
	http302(urldecode($jumpTo));

}
?>