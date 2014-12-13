<?php
function ListSearchZB($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);

        $date = $_POST["date1"];
	$trucknumber = $_POST["trucknumber"];
	$state = $_POST["state"];
	if($state == "1")
	{
		$state = "";
	}
	else if($state == "2")
	{
		$state = "未执行";
	}
	else if($state == "3")
	{
		$state = "正在执行";
	}
	else
	{
		$state = "已完成";
	}
	
	
	$plan = new Plan;
	$sql = "select * from `plan` WHERE truck_number LIKE '%{$trucknumber}%' AND  operate_time LIKE '{$date}%' AND state LIKE '%{$state}%' ";
	
	$planArray = $plan->getArray($sql,true);
	
	$smarty->assign('defArray',$planArray);
	$smarty->assign('date1',$date);
	
	    $MClass = new OilType;
            $sql = "select * from `oil_type`";
            $sortID = $MClass->getArray($sql,true);
	    
            $CClass = new OilModel;
            $sql = "select * from `oil_model`";
            $childID = $CClass->getArray($sql,true);
	    
            $smarty->assign('sortID',$sortID);
            $smarty->assign('childID',$childID);
        
	 $smarty->assign('trucknumber',$trucknumber);
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("汽车计划" , "" , true);

	
	$smarty->setTitle('汽车总计划');
	$smarty->displayMother('ZB/ListTruckPlanZB.tpl');
}
?>