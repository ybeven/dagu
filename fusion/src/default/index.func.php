<?php
function index() {	
	$session = Session::start();
	if($session->curUser instanceof User) {
		http302('/start');
	} else {
		http302('/system/login');
	}
}
?>