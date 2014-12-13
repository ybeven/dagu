<?php
function ListTruckPlanZB($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	
	$ac = new AccessController;
	if(!$ac->can("管理销售计划" , $session->curUser)){
		?>		     
                     <script>alert('您无权查看销售计划!');history.back(-1);</script>;
                 <?php
                     return;
	}
	

	
        $planDate = date('Y-m-d');
	$devDef = new Plan;
	$sql="SELECT * FROM `plan` WHERE state <>'已完成' OR plan.operate_time LIKE '{$planDate}%'  ";
	//$sql="SELECT * FROM `plan` WHERE state <>'已完成' ";
	$dArray = $devDef ->getArray($sql,true);

	$smarty->assign('defArray',$dArray);
	$smarty->assign('date1',$planDate);
	
	
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("销售计划管理" , "/ZB/ListTructPlanZB" , true);
	
	
	$smarty->setTitle('销售计划管理');
	$smarty->displayMother('ZB/ListTruckPlanZB.tpl');
}
?>