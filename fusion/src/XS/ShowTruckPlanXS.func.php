<?php
function ShowTruckPlanXS($mrid = 0,$notice=0){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	
	 $smarty->addScriptDef(<<<SCRIPTDEF
		<link rel="stylesheet" type="text/css" href="/css/superTables.css" />
SCRIPTDEF
            );
$smarty->addScriptDef(<<<SCRIPTDEF

<script language="javascript" type="text/javascript" src="/js/superTables.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.superTable.js"></script>
SCRIPTDEF
	);
	
        if($mrid == 0)
	{
		 $mrid =  $_POST[truckNumber];
	}
       
        $devDef = new Plan;
        $devDef-> getByID($mrid);
	$task = new Task;
	$sql = "select * from `task` WHERE plan_id = $mrid";
        $sort = $task->getArray($sql,true);
	
        $devDef2 = new Plan;
	$sql="SELECT * FROM `plan` WHERE state <>'已完成'";
	$dArray = $devDef2 ->getArray($sql,true);

	$smarty->assign('defArray',$dArray);
	
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("配置门卡" , "" , true);
	
	$smarty->assign('sign',1);
	
	$smarty->assign('task',$sort);
        $smarty->assign('plan',$devDef);
	$smarty->setTitle('配置门卡');
        $smarty->displaymother('XS/ShowTruckPlanXS.tpl');
}
?>