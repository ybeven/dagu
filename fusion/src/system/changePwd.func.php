<?php
function changePwd($notice=null){
    global $smarty;
    needLogin();
    notice($notice);
    $session = Session::start();
    $curUser = $session->curUser;
    
    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("修改密码" , "/system/changePwd" , true);
	
    $smarty->setTitle('修改密码');
    $smarty->displayMother('system/changePwd.tpl');
}