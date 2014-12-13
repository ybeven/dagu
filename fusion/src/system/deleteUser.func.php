<?php
function deleteUser($userId) {
	needLogin();
	$session = Session::start();

		$user = new User;
		$user->getById($userId);
		if($user->id >0) {
			$user->remove($userId, false);
			
		} 
	http302('/system/manageUser/'.urlencode('删除成功！'));  
}
?>