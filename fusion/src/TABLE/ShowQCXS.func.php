<?php
function ShowQCXS($mrid,$notice=null){
global $smarty;
	needLogin();
        $session=Session::start();
	/*
	$ac = new AccessController;
	if(!$ac->can('查看销售计划', $session->curUser)) {
		http302('/ZB/ListTruckPlanZB/'.urlencode('您无权查看销售计划'));
		return;
	}
	*/
	
        $logger = new CategoryLogger('log_definition');
       
        $devDef = new Task;
        $devDef-> getByID($mrid);
        
	$plan = new Plan;
        $plan-> getByID($devDef->planId);
        
        $crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("查看门卡分配" , "" , true);

	$smarty->assign('plan',$plan);
        $smarty->assign('task',$devDef);
	$smarty->setTitle('查看门卡分配');
        $smarty->displaymother('TABLE/ShowQCXS.tpl');
}

?>
