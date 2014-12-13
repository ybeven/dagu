<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录--陕西成绩登入系统</title>
<link rel='stylesheet' href='/css/style.css' type="text/css" />
<script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="/js/md5.js" type="text/javascript"></script>
<script src="/js/login.js" type="text/javascript"></script>
</head>

<body>
<div id='containerL'>
	<div id='login'>
    		<div id='inputbox'>
			<form id="login_form" method="post" action="/system/doLogin/{$jumpTo}">
        		<input name='username' class='username' />
			<input name='password' class='password' type="password" onkeypress="javascript:if(event.keyCode==13) login_click();"/>
			</form>
			<div id="login_notice">{if $notice}{$notice}{/if}</div>
		</div>
		<div id='login-button'>
			<a href="#" onclick="login_click();">
				<img id="login_img" src="/images/Login-button.png" onmouseover="login_animate();" />
				<img id="login_anim" src="/images/Login-button.png"/>
			</a>
		</div>
	</div>
</div>
</body>
</html>
