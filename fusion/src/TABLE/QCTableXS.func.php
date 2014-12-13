<?php
function QCTableXS($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	$ac = new AccessController;
	if(!$ac->can("管理门卡" , $session->curUser)){
		?>		     
                     <script>alert('您无权管理门卡分配报表!');history.back(-1);</script>;
                 <?php
                     return;
	}
	
	
	
        $planDate = date('Y-m-d');
        $MClass = new WorkTime;
        $sql = "select * from `work_time`";
        $workID = $MClass->getArray($sql,true);
	$smarty->assign('work',$workID);
	$smarty->assign('workId',$workID[0]);
	$smarty->assign('date',$planDate);
	
	$dArray = null;
	$smarty->assign('defArray',$dArray);
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("门卡分配报表" , "" , true);

	
	$smarty->setTitle('门卡分配报表');
	$smarty->displayMother('TABLE/QCTableXS.tpl');
}
?>