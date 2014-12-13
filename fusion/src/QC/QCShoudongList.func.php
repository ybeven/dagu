<?php
function QCShoudongList($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	$ac = new AccessController;
	if(!$ac->can("系统管理" , $session->curUser)){
		?>		     
                     <script>alert('您无权手动执行计划!');history.back(-1);</script>;
                 <?php
                     return;
	}
	
	
        
	$planDate = date('Y-m-d');
	$plan = new Plan;
	$sql = "select * from `plan` WHERE  operate_time LIKE '{$planDate}%'  ";
	$planArray = $plan->getArray($sql,true);
	$taskArray = array();
	$i = 0;
	foreach($planArray as $k)
	{
		$task = new Task;
		$sql = "select * from `task` WHERE plan_id = {$k->id}  ";
	        $task2 = $task->getArray($sql,true);
		$taskArray[$i][0] = $k->truckNumber;
		$taskArray[$i][1] = $task2;
		$i ++ ;
	}
	$smarty->assign('taskArray',$taskArray);
	
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("手动执行任务" , "" , true);

	
	$smarty->setTitle('手动执行任务');
	$smarty->displayMother('QC/QCShoudongList.tpl');
}
?>