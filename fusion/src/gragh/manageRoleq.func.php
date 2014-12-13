<?php
function manageRoleq($page=0 , $notice=null){
    global $smarty;
	$session = Session::start();
	needLogin();
	$page = intval($page);
	if($page == 0){
		$page = isset($session->curRolePage)?$session->curUserPage:1;
	}
	$session->curRolePage = $page;
	
	$curUser = $session->curUser;
	
	$ac = new AccessController;
	if(!$ac->can("系统管理" , $curUser)){
		 ?>		     
                     <script>alert('您无权管理系统!');history.back(-1);</script>;
                 <?php
                      return;
	}
	
    $role = new Role;
	
    $count = $role->count("SELECT COUNT(*) FROM `role`");
    $compager = compager($page, $count, ITEMS_PER_PAGE);
    $smarty->assign('compager', $compager);
	$roleArr = $role->getArray("SELECT * FROM `role` ORDER BY `id` ASC LIMIT {$compager['itemStart']}, {$compager['itemLimit']}");
	
	notice($notice);
    
     $smarty->addScriptDef(<<<SCRIPTDEF
<script language="javascript" type="text/javascript" src="/js/manageRole.js"></script>
SCRIPTDEF
    );
	
    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("角色管理" , "/system/manageRoleq" , true);
    
    $smarty->assign('role', $role);
    $smarty->assign('roleArr', $roleArr);
    $smarty->setTitle('角色管理');
    $smarty->displayMother('system/manageRoleq.tpl');
}
?>