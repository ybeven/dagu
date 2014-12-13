<?php
function HCTableXD($mainApplyId,$notice=null){
	global $smarty;
notice($notice);
	needLogin();
        $session=Session::start() ;




                $crumb = Crumb::getCrumb();
                $crumb->popAllLatitude();
                $crumb->visitNewPage("首页" , "/start" , false);
                $crumb->visitNewPage("查看请车单" , "/HC/ListTrainDetailApply" , true);

		$mainApply = new MainApply;
		$sql_1="select * FROM `main_apply` where id = '{$mainApplyId}'";
		$mainApplyArray = $mainApply->getArray($sql_1,true);
		$smarty->assign('applyTime',$mainApply->applyTime);
		$smarty->assign('applyAnnt',$mainApply->applyAnnt);
		$smarty->assign('salesvicemanager',$mainApply->salesvicemanager);
		$smarty->assign('salesmanager',$mainApply->salesmanager);
		$smarty->assign('energymanager',$mainApply->energymanager);
		$smarty->assign('mainApplyId',$mainApplyId);
                
                $MClass = new OilType;
	$sql = "select * from `oil_type`";
	$sortID = $MClass->getArray($sql,true);
	$CClass = new OilModel;
	$sql = "select * from `oil_model`";
	$childID = $CClass->getArray($sql,true);
	$smarty->assign('sortID',$sortID);
	$smarty->assign('childID',$childID);

		$detailApply = new DetailApply;
		$sql_2="select * FROM `detail_apply` where main_apply_id = '{$mainApplyId}'";
		$detailApplyArray = $detailApply->getArray($sql_2,true);
		$smarty->assign('detailApplyArray',$detailApplyArray);

$smarty->setTitle('查看请车单');
$smarty->displaymother('HC/HCTableXD.tpl');
}
?>