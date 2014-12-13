<?php
function QCShoudongSearch($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	

        
	$planDate = date('Y-m-d');
	
	$trucknumber = $_POST["trucknumber"];
	$plan = new Plan;
	$sql = "select * from `plan` WHERE truck_number LIKE '%{$trucknumber}%' AND  operate_time LIKE '{$planDate}%'";
	$planArray = $plan->getArray($sql,true);
	$taskArray = array();
	$i = 0;
	foreach($planArray as $k)
	{
		$task = new Task;
		$sql = "select * from `task` WHERE plan_id = {$k->id} ";
	        $task2 = $task->getArray($sql,true);
		$taskArray[$i][0] = $k->truckNumber;
		$taskArray[$i][1] = $task2;
		$i ++ ;
	}
	$smarty->assign('taskArray',$taskArray);
	
	$smarty->assign('trucknumber',$trucknumber);
	
        
	
	
	$smarty->setTitle('汽车总计划');
	$smarty->displayMother('QC/QCShoudongList.tpl');
}
?>