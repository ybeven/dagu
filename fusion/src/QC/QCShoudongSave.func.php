<?php
function QCShoudongSave($mrid){
        global $smarty;
	needLogin();
        $session=Session::start();
	
	
	$curUser = $session->curUser;
	$taskDate = date('Y-m-d H:i:s');
	$taskTime = date('H:i:s');
	
        //毛重
	$emptyWeight = $_POST["emptyWeight"];
	$emptyStaff = $_POST["emptyStaff"];
	$emptyTime = $_POST["emptyTime"];
	//皮重
	$finalWeight = $_POST["finalWeight"];
	$finalStaff = $_POST["finalStaff"];
	$finalTime = $_POST["finalTime"];
	
	//流量计
	$flowWeight = $_POST["flowWeight"];
	$kgRecord = $_POST["kgRecord"];
	
	//计算方式选择
	$calculatId = $_POST["calculateMethod"];
	$calculateMethod = "未选择";
	
	 $task = new Task;
        $task->getByID($mrid);
	
	
	if($calculatId == "2")
	{
		$calculateMethod="重车-空车";
		$task->realWeight = $finalWeight - $emptyWeight;
	}
	else if($calculatId == "1")
	{
		$calculateMethod = "质量流量计";
		$task->realWeight = $flowWeight;
	}
	
	$task->money = ($task->unitPrice)*($task->realWeight); 
	
       
	
	$task->emptyWeight = $emptyWeight;
	$task->emptyStaff = $emptyStaff;
	$task->emptyTime = $emptyTime;
	
	$task->finalWeight = $finalWeight;
	$task->finalStaff = $finalStaff;
	$task->finalTime = $finalTime;
	$task->calculateMethod = $calculateMethod;
	$task->flowWeight = $flowWeight;
	$task->kgRecord = $kgRecord;
	$task->update();
	
	
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
	
	$plan = new Plan;
	$plan ->getByID($task->planId);
	$smarty->assign('task',$task);
	$smarty->assign('plan',$plan);
	
	 http302('/QC/QCShoudongAll/'.$mrid.'/'.urlencode("添加成功"));
	
	
    
}
?>
