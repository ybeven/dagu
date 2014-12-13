<?php
function ShowTruckPlanZB($mrid,$notice=null){
global $smarty;
	needLogin();
        $session=Session::start();
	notice($notice);	
	
        $devDef = new Plan;
        $devDef-> getByID($mrid);
        
	$task = new Task;
	$sql = "select * from `task` WHERE plan_id = $mrid";
        $sort = $task->getArray($sql,true);
        
        //油品列表
        $MClass = new OilType;
        $sql = "select * from `oil_type`";
        $sortID = $MClass->getArray($sql,true);
        $CClass = new OilModel;
        $sql = "select * from `oil_model`";
        $childID = $CClass->getArray($sql,true);
        $smarty->assign('sortID',$sortID);
        $smarty->assign('childID',$childID);
	
	
	
	
	
		
		$smarty->assign('sign',$sign);
	
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("查看销售计划" , "/ZB/AddTructPlanZB/'.$mrid.'/" , true);
 
	//$smarty->assign('model',$modelId->oilModel);
        //$smarty->assign('type',$typeId->oilType);
	$smarty->assign('task',$sort);
        $smarty->assign('plan',$devDef);
	
	
	
	$smarty->setTitle('查看销售计划');
        $smarty->displaymother('ZB/ShowTruckPlanZB.tpl');
	
}

?>
