<?php
function ListTruckPlanXS($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	$ac = new AccessController;
	if(!$ac->can("管理门卡" , $session->curUser)){
		?>		     
                     <script>alert('您无权分配门卡！');history.back(-1);</script>;
                 <?php
                     return;
	}
	
	
$smarty->addCssDef(<<<CSSDEF
<link rel="stylesheet" type="text/css" href="/css/superTables.css" />
CSSDEF
	);
$smarty->addScriptDef(<<<SCRIPTDEF
<script language="javascript" type="text/javascript" src="/js/jQueryPlugins/jquery.datepick.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jQueryPlugins/jquery.datepick-zh-CN.js"></script>
<script language="javascript" type="text/javascript" src="/js/superTables.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.superTable.js"></script>
SCRIPTDEF
	
    );
	
	
	 $planDate = date('Y-m-d');
	$devDef = new Plan;
	$sql="SELECT * FROM `plan` WHERE state <>'已完成' AND plan.operate_time LIKE '{$planDate}%' ";
	$dArray = $devDef ->getArray($sql,true);

	$smarty->assign('defArray',$dArray);
	
	$smarty->assign('sign',0);
	$smarty->assign('date1',$planDate);
	
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("门卡管理" , "" , true);

     
	$smarty->setTitle('门卡管理');
	$smarty->displayMother('XS/ListTruckPlanXS.tpl');
}
?>