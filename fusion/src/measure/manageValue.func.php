<?php
function manageValue($notice = null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	
        $ac = new AccessController;
	if(!$ac->can("系统管理" , $session->curUser)){
		http302("/start/index/".urlencode('您无权管理阀值'));
		return;
        }
	$payMileageArray = array();
	
    
        $crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("阈值管理" , "/measure/manageValue" , true);

        $measure = new MeasureDifference;
        $measure->getByID('1');

        $smarty->assign('measure',$measure);
        $smarty->setTitle('阈值管理');
        $smarty->displaymother('measure/manageValue.tpl');
}
?>