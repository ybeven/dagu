<?php
function ListTrainInfo($notice=null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	
        
	
$smarty->addScriptDef(<<<SCRIPTDEF
<script type="text/javascript" src="/js/addSort.js"></script>
SCRIPTDEF
    );
$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("填写车号单" , "/HC/ListTrainMainApply" , true);

$mainApply = new MainApply;
$sql_1="select * FROM `main_apply` WHERE state <> 3 order by apply_time desc ";
$mArray = $mainApply->getArray($sql_1,true);

$MArray = array();
$i = 0;
foreach($mArray as $m)
{
	
	
	
	$detailApply = new DetailApply;
	$sql_2="select * FROM `detail_apply` where main_apply_id = '{$m->id}'";
	$dArray = $detailApply->getArray($sql_2,true);
	foreach($dArray as $d)
	{
		
		$MArray[$i][0] .= $m->mainplanId;
	        $MArray[$i][1] .= $m->applyTime;
		$MArray[$i][2] .= $d->company;
		$MArray[$i][3] .= $m->state;
		$MArray[$i][4] .= $d->oilModel->oilType.$d->oilModel->oilModel;
		$MArray[$i][5] .= $d->id;
		$i++;
	}
	
	
}
$smarty->assign('mainApplyArray',$MArray);

$smarty->setTitle('火车销售管理');
$smarty->displaymother('HC/ListTrainInfo.tpl');
}
?>
