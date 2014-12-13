<?php
function QCShoudongListOver($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	$ac = new AccessController;
	if(!$ac->can("系统管理" , $session->curUser)){
		?>		     
                     <script>alert('您无权手动结束任务!');history.back(-1);</script>;
                 <?php
                     return;
	}
	
	
        
	$planDate = date('Y-m-d');
	$plan = new Plan;
	$sql = "select * from `plan` WHERE  operate_time LIKE '{$planDate}%' AND state <> '已完成' ";
	$planArray = $plan->getArray($sql,true);
	$taskArray = array();
	$i = 0;
	foreach($planArray as $k)
	{
		$task = new Task;
		$sql = "select * from `task` WHERE plan_id = {$k->id} AND state <> '已完成' ";
	        $task2 = $task->getArray($sql,true);
		$taskArray[$i][0] = $k->truckNumber;
		$taskArray[$i][1] = $task2;
		$i ++ ;
	}
	$smarty->assign('taskArray',$taskArray);
	$smarty->assign('plandate',$planDate);
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("手动结束任务" , "" , true);

	
	$smarty->setTitle('手动结束任务');
	$smarty->displayMother('QC/QCShoudongListOver.tpl');
}
?>