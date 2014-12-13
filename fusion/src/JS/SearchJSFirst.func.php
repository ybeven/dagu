<?php
function SearchJSFirst($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	

        
	$planDate = date('Y-m-d');
	
	$trucknumber = $_POST["trucknumber"];
	$state = $_POST["state"];
	if($state == "1")
	{
		$state = "";
	}
	else if($state == "2")
	{
		$state = "正在执行";
	}
	else
	{
		$state = "已完成";
	}
	
	$plan = new Plan;
	$sql = "select * from `plan` WHERE truck_number LIKE '%{$trucknumber}%' AND  operate_time LIKE '{$planDate}%' AND state LIKE '%{$state}%' ";
	$planArray = $plan->getArray($sql,true);
	$taskArray = array();
	$i = 0;
	foreach($planArray as $k)
	{
		$task = new Task;
		$sql = "select * from `task` WHERE plan_id = {$k->id} AND state <> '未执行' ";
	        $task2 = $task->getArray($sql,true);
		$taskArray[$i][0] = $k->truckNumber;
		$taskArray[$i][1] = $task2;
		$i ++ ;
	}
	$smarty->assign('taskArray',$taskArray);
	
	$smarty->assign('trucknumber',$trucknumber);
	
        
	
	
	$smarty->setTitle('结算列表');
	$smarty->displayMother('JS/ListJS.tpl');
}
?>