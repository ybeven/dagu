<?php
function ListSearchXS($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	/*
	mysql_connect("localhost","root","abc");
	mysql_select_db('dagu');
	$id = 3;
	$cardId = 21212;
	$truck = 88888;
	$oil="汽油";
	$state = "测试";
	$sql = "INSERT INTO ceshi (id,cardId,truck,oil,state) VALUES ('".$id."','".$cardId."','".$truck."','".$oil."','".$state."')";
	mysql_query($sql);
	*/
       // $sql = "DELETE  From ceshi WHERE id = 10";
	//mysql_query($sql);
	 //       $ceshi = new Ceshi;
	//	$sql = "select * from `ceshi`";
	//	$ceshi2 = $ceshi->getArray($sql,true);
	//	$i = 1;
	//	foreach($ceshi2 as $k)
	//	{
	//		$sql =  "UPDATE ceshi set id = '{$i}' WHERE cardId = '{$k->cardId}'";
	//		mysql_query($sql);
	//		$i++;
	//	}
		
			
			
		
		
	
	
	$trucknumber = $_POST["trucknumber"];
	 $planDate = $_POST["date1"];
	$plan = new Plan;
	$sql = "select * from `plan` WHERE truck_number LIKE '%{$trucknumber}%' AND  operate_time LIKE '{$planDate}%' ";
	
	$planArray = $plan->getArray($sql,true);
	
	$smarty->assign('defArray',$planArray);
	$smarty->assign('date1',$planDate);
	
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
	$smarty->displayMother('XS/ListTruckPlanXS.tpl');
	
}
?>