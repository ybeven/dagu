<?php
function AddCardXS($mrid){
global $smarty;
	needLogin();
        $session=Session::start();
	$curUser = $session->curUser;
	$taskDate = date('Y-m-d H:i:s');
	$taskTime = date('H:i:s');
	$time = new WorkTime;
        $sql = "select * from `work_time` WHERE  start_time <= '{$taskTime}%' AND over_time > '{$taskTime}%' ";
        $plantime = $time->getArray($sql,true);
	
	
	
        $task = new Task;
        $task-> getByID($mrid);
	
	$plan = new Plan;
        $plan -> getByID($task->planId);
	
      
               
                $task = new Task;
                $task-> getByID($mrid);
	        $plan = new Plan;
                $plan -> getByID($task->planId);
		
		$cardId = $_POST[num2];
		
		if($cardId==0)
                {
                ?>		     
                     <script>alert('请刷卡!');history.back(-1);</script>;
                 <?php
                     return;
	         }
                 elseif($cardId==0)
                {
                ?>		     
                     <script>alert('读卡器连接错误!');history.back(-1);</script>;
                <?php
                     return;
	         }
               elseif($cardId==-1)
                {
                ?>		     
                     <script>alert('读卡器初始化错误!');history.back(-1);</script>;
                <?php
                     return;
	         }
                elseif($cardId==-2)
                {
                 ?>		     
                     <script>alert('请重新放卡!');history.back(-1);</script>;
                 <?php
                      return;
	        }
		
		$sharedtruck_1 = new SharedTruck;
		$sql = "select * from `shared_truck` WHERE card_id = $cardId ";
		$sharedtruck_2 = $sharedtruck_1->getArray($sql,true);
		if(count($sharedtruck_2)==1)
		{
		    ?>		     
                     <script>alert('此卡已被使用，无法重新分配!');history.back(-1);</script>;
                 <?php
                      return;
		}
		
		
		
		
	        //更改计划状态
                $plan->state="正在执行";
                $plan->update();
                $sharedtruck2 = new SharedTruck;
		$sql = "select * from `shared_truck` WHERE task_id = $mrid ";
		$sharedtruck3 = $sharedtruck2->getArray($sql,true);
		
		
			
		if(count($sharedtruck3)<=0)
		{
			$sharedtruck = new SharedTruck;
                        $sharedtruck->truckNumber=$plan->truckNumber;
                        $sharedtruck->cardCount=$plan->cardCount;
                        $sharedtruck->oilModel=$task->oilType->oilType.$task->oilModel->oilModel;
                        $sharedtruck->cardState=1;
			$sharedtruck->emptyTime=$taskDate;
			$sharedtruck->finalTime=$taskDate;
			$planWeight = $task->planWeight;
			if($planWeight==null)
			{
				$planWeight = 0;
			}
			$sharedtruck->planWeight=$planWeight;
		        $sharedtruck->taskId = $mrid;
			$potNumber = $_POST[potnumber];
			if($potNumber == null)
			{
				$potNumber = 0 ;
			}
                        $sharedtruck->potNumber=$potNumber;
		        $sharedtruck->cardId = $cardId;
                        $sharedtruck->add();
			
			$sharedtruck12 = new SharedTruck;
		        $sql11 = "select * from `shared_truck` WHERE card_state < 7";
		        $sharedtruck13 = $sharedtruck12->getArray($sql11,true);
			$id = count($sharedtruck13)+1;
			$number = count($sharedtruck13);
			$truck = $plan->truckNumber;
			$oil = $task->oilType->oilType.$task->oilModel->oilModel;
			$state = 1;
			
			
			mysql_connect("localhost","root","abc");
	                mysql_select_db('dagu');
			$sql2 = "INSERT INTO ceshi (id) VALUES ('".$id."')";
			mysql_query($sql2);
			mysql_close();
			
			mysql_connect("localhost","root","abc");
	                mysql_select_db('dagu');
			$sql3 = "UPDATE ceshi set cardId = '".$number."' WHERE id = 1";
			mysql_query($sql3);
			mysql_close();
			
			$ceshi = new Ceshi;
			$ceshi -> getByID($id);
			$ceshi->cardId = $cardId;
			$ceshi->truck = $truck;
			$ceshi->oil = $oil;
			$ceshi->state = $state;
			$ceshi->update();
			
			
			//$sql = "UPDATE ceshi set cardId = '"+$number+"' WHERE id = 1";
			//mysql_query($sql1);
			// mysql_close();
		}
		else
		{
			$sharedtruck2->truckNumber=$plan->truckNumber;
                        $sharedtruck2->cardCount=$plan->cardCount;
                        $sharedtruck->oilModel=$task->oilType->oilType.$task->oilModel->oilModel;
                        $sharedtruck2->cardState=1;
			if($planWeight==null)
			{
				$planWeight = 0;
			}
			$sharedtruck2->planWeight=$planWeight;
                        $potNumber = $_POST[potnumber];
			if($potNumber == null)
			{
				$potNumber = 0 ;
			}
                        $sharedtruck->potNumber=$potNumber;
		        $sharedtruck2->cardId = $cardId;
			$sharedtruck2->update();
			
	
		}
               
        
               
                $task->potNumber=$_POST[potnumber];
		$task->cardRemarks=$_POST[remarks];
		$task->operatorId=$curUser->id;
		$task->operateTime=$taskDate;
		$task->operateWorkId = $time->id;
		$task->state = "正在执行";
		$task->cardId = $cardId;
                $task->update();
		
		
		
		
	         http302('/XS/ShowTruckPlanXS/'.$plan->id.'/'.urlencode("分配成功"));
		
}
?>