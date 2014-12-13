<?php
function manageUserq($page=0 , $notice=null){
    global $smarty;
	needLogin();
	$session = Session::start();
	
	
	
	$page = intval($page);
	if($page == 0){
		$page = isset($session->curUserPage)?$session->curUserPage:1;
	}
	$session->curUserPage = $page;
	
    $user = new User;
	$count = $user->count("SELECT COUNT(*) FROM `user`");
    $compager = compager($page, $count, ITEMS_PER_PAGE);
    $smarty->assign('compager', $compager);
	//$userArr = $user->getArray("SELECT * FROM `user` ORDER BY `id` ASC LIMIT {$compager['itemStart']}, {$compager['itemLimit']}");
	$userArr = $user->getArray("SELECT * FROM `user` ORDER BY `id` ASC ");
	notice($notice);
	
    $role = new Role;
    $roleArray = $role->getArray("SELECT * FROM `role` ORDER BY `id` ASC");
    foreach ($roleArray as $item) {
	$roleSelect[$item['id']] = $item['name'];
    }
    
    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("用户管理" , "/system/managerUserq" , true);
    
    $smarty->assign('roleSelect' , $roleSelect);
    $smarty->assign('roleArray' , $roleArray);
    $smarty->assign('user', $user);
    $smarty->assign('userArr', $userArr);
    $smarty->setTitle('用户管理');
    $smarty->displayMother('system/manageUserq.tpl');
}
?>