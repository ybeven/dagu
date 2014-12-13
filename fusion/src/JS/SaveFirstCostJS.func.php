<?php
function SaveFirstCostJS($mrid){
global $smarty;
	needLogin();
        $session=Session::start();
	$curUser = $session->curUser;
	$taskDate = date('Y-m-d H:i:s');
	if($mrid == null)
	{
	        ?>		     
                <script>alert('请先读卡信息!');history.back(-1);</script>;
                <?php
	   return;
	}

    if($_POST[firstpay] == '')
    {
        ?>		     
                <script>alert('请输入付款金额!');history.back(-1);</script>;
        <?php
	   return;
    }
    else
    {
	if($sharetruck->cardState<=2)
	{
		$sharetruck->cardState=2;
		
                $task = new Task;
                $task->getByID($mrid);
                $task->advancePay=$_POST[firstpay];
	        $task->advanceTime = $taskDate;
	        $task->advanceOperatorId = $curUser->id;
                $task->update();
	
	        $sharedId = $task->cardId;
	
	        $sharetruck = new SharedTruck;
	        $sql = "select * from `shared_truck` WHERE card_id='{$sharedId}'";
	        $truck = $sharetruck->getArray($sql,true);
		$sharetruck->cardState=2;
		$sharetruck->update();
		
		$state = 2;
		$ceshi = new Ceshi;
		$sql = "select * from `ceshi` WHERE cardId='{$sharedId}'";
		$ceshi2 = $ceshi->getArray($sql,true);
		$ceshi->state = $state;
		$ceshi->update();
		/*
		mysql_connect("localhost","root","abc");
	        mysql_select_db('dagu');
		$state = "预缴费";
		$sql = "UPDATE ceshi set state = '".$state."' WHERE cardId = '".$sharedId ."'";
			mysql_query($sql);
			mysql_close();
		*/
	       ?>		     
                <script>alert('缴费成功!');history.back(-1);</script>;
        <?php
	   return;
	}
	else
	{
	         ?>		     
                <script>alert('请不要重复缴费!');history.back(-1);</script>;
        <?php
	   return;
	}
	
  
    }
    
}
?>