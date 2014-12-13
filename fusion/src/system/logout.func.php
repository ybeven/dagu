<?php
function logout() {
	$session = Session::start();
	$session->logout();
	http302('/system/login/成功注销');
}
?>