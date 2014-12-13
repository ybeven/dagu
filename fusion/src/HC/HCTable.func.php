<?php
function HCTable($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	

      $planDate = date('Y-m-d');
	
	$dArray = null;
	$smarty->assign('mainApplyArray',$dArray);
	$smarty->assign('date',$planDate);
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("火车综合查询" , "" , true);

	
	$smarty->setTitle('计划结算报表');
	$smarty->displayMother('HC/HCTable.tpl');
}
?>