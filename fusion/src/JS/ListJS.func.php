<?php
function ListJS($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	
	
	
        
	$planDate = date('Y-m-d');
	$plan = new Plan;
	$sql = "select * from `plan` WHERE  operate_time LIKE '{$planDate}%' AND state <> '未执行' ORDER BY operate_time  ";
	$planArray = $plan->getArray($sql,true);
	$taskArray = array();
	$i = 0;
	foreach($planArray as $k)
	{
		$task = new Task;
		$sql = "select * from `task` WHERE plan_id = {$k->id}  AND state <> '未执行' ";
	        $task2 = $task->getArray($sql,true);
		$taskArray[$i][0] = $k->truckNumber;
		$taskArray[$i][1] = $task2;
		$i ++ ;
	}
	$smarty->assign('taskArray',$taskArray);
	
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("结算列表" , "" , true);

	
	$smarty->setTitle('结算列表');
	$smarty->displayMother('JS/ListJS.tpl');
}
?>