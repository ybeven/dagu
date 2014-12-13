<?php
function QCShoudongSaveOver($mrid){
        global $smarty;
	needLogin();
        $session=Session::start();
	
	
	$curUser = $session->curUser;
	$taskDate = date('Y-m-d H:i:s');
	$taskTime = date('H:i:s');
	
	$task = new Task;
        $task->getByID($mrid);
	
	$task->state = "已完成";
	$task->update();
	
        $sharedId = $task->cardId;
	$sharetruck = new SharedTruck;
	$sql = "select * from `shared_truck` WHERE card_id='{$sharedId}'";
	$truck = $sharetruck->getArray($sql,true);
	if($truck != null)
	{
	     foreach($truck as $k)
	    {
		$k->remove(intval($k->id),false);
	    }
	    
	    mysql_connect("localhost","root","abc");
	        mysql_select_db('dagu');
		
		$sql = "DELETE  From ceshi WHERE cardId = '".$sharedId."'";
			mysql_query($sql);
			mysql_close();
		$ceshi = new Ceshi;
		        $sql44 = "select * from `ceshi`";
		        $ceshi2 = $ceshi->getArray($sql44,true);
		        $i = 1;
		        foreach( $ceshi2 as $m )
		        {
				mysql_connect("localhost","root","abc");
	                        mysql_select_db('dagu');
			        $sql =  "UPDATE ceshi set id = '".$i."' WHERE cardId = '".$m->cardId."'";
			        mysql_query($sql);
				mysql_close();
			        $i++;
		        }
			$d = $i-2;
			mysql_connect("localhost","root","abc");
	                mysql_select_db('dagu');
			$sql3 = "UPDATE ceshi set cardId = '".$d."' WHERE id = 1";
			mysql_query($sql3);
			mysql_close();
	}
	
	
	 
	$plan = new Plan;
	$plan ->getByID($task->planId);
	$id = $plan->id;
	$task2 = new Task;
	$sql =  "select * from `task` WHERE plan_id ='{$id}'";
	 $task3 = $task2->getArray($sql,true);
	 $sign = 1;
	foreach($task3 as $k)
	{
		if($k->state != "已完成")
		{
			$sign = 0;
		}
	}
	 if($sign == 1 && count($task3) > 0)
	{
		$plan->state="已完成";
	}
	$plan->update();
	
	$weight1=$task->finalWeight - $task->emptyWeight;
	$weight3 = ($weight1) - ($task->flowWeight);
        if($weight3>0)
        {
            $weight2 = $weight3;
        }
        else
        {
            $weight2 = -($weight3);
        }
	
	$smarty->assign('weight1',$weight1);
	$smarty->assign('weight2',$weight2);
	
	$task3 = new Task;
        $task3->getByID($mrid);
	$plan3 = new Plan;
	$plan3 ->getByID($task3->planId);
	
	$smarty->assign('task',$task3);
	$smarty->assign('plan',$plan3);
	
	http302('/QC/QCShoudongListOver/'.urlencode("结束成功"));
	
	
    
}
?>
