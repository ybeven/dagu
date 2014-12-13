<?php
function DeleteTruckPlanZB($mrid){
global $smarty;
	needLogin();
        $session=Session::start();
	 $plan = new Plan;
        $plan-> getByID($mrid);
	$task2 = new Task;
		$sql = "select * from `task` WHERE plan_id = {$plan->id}  AND state <> '已完成' ";
	        $task3 = $task2->getArray($sql,true);
		$sign = 0 ;
		foreach($task3 as $k)
	        {
			
			$sharedTruck = new SharedTruck;
                        $sql = "select * from `shared_truck` WHERE task_id = {$k->id} ";
                        $truck =$sharedTruck->getArray($sql,true);
			
			if(count($truck)<=0 || $sharedTruck->cardState <3 )
			{
				
			}
			else if( $sharedTruck->cardState <5 )
			{
				$sign = 1;
				
				break;
			}
			else
			{
				$sign = 2;
				http302('/ZB/ListTruckPlanZB/'.urlencode("请执行完流程,无法删除"));
				break;
			}
			
			
	        }
		if($sign != 2)
		{
		$devDef = new Plan;
        $devDef-> getByID($mrid);
       
	$task = new Task;
	$sql = "select * from `task` WHERE plan_id = $mrid";
        $sort = $task->getArray($sql,true);
        foreach($sort as $k)
	    {
		$sharedTruck = new SharedTruck;
                $sql = "select * from `shared_truck` WHERE task_id = {$k->id} ";
		
                $truck =$sharedTruck->getArray($sql,true);
		
		if(count($truck)>0)
		{
			
			mysql_connect("localhost","root","abc");
	                mysql_select_db('dagu');
		
		        $sql33 = "DELETE  From ceshi WHERE cardId = '" . $sharedTruck->cardId . "'";
			mysql_query($sql33);
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
			
			
			
			$sharedTruck->remove(intval($sharedTruck->id),false);
		}
		
		$k->remove(intval($k->id),false);
	    }
            
        $devDef->remove(intval($devDef->id),false);
	
	if($sign == 0)
	{
		
	
       
        
        
	//$smarty->setTitle('查看销售计划');
        //$smarty->displaymother('ZB/ListTruckPlanZB.tpl');
        http302('/ZB/ListTruckPlanZB/'.urlencode("删除成功"));
	}
	else if( $sign == 1 )
	{
	http302('/ZB/ListTruckPlanZB/'.urlencode("删除成功,请到汽车操作站删除卡数据！"));
	}
		}
}

?>
