<?php
function AddTrainInfo($detailApplyId,$notice=null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
        $curUser = $session->curUser;
       

$smarty->addScriptDef(<<<SCRIPTDEF
<script type="text/javascript" src="/js/addSort.js"></script>
SCRIPTDEF
    );
$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("车号单" , "" , true);

$detailApply = new DetailApply;
$sql_1 = "select * from `detail_apply` WHERE id = '{$detailApplyId}'";
$detailApplyArray = $detailApply->getArray($sql_1,true);
$oilModelId = $detailApply->oilModelId;
$mainApplyId = $detailApply->mainApplyId;
$smarty->assign("mainApplyId",$mainApplyId);

$oilModel = new OilModel;
$sql_2 = "select * from `oil_model` WHERE id = '{$oilModelId}'";
$oilModelArray = $oilModel->getArray($sql_2,true);
$oilTypeId = $oilModel->oilTypeId;
$oilType = new OilType;
$sql_3 = "select * from `oil_type` WHERE id = '{$oilTypeId}'";
$oilTypeArray = $oilType->getArray($sql_3,true);

$smarty->assign('trainNumber',$detailApply->trainNumber);
$smarty->assign('station',$detailApply->station);
$smarty->assign('oilModel',$oilModel->oilModel);
$smarty->assign('oilType',$oilType->oilType);
$smarty->assign('detailApplyId',$detailApplyId);



$trainNumberArray = array();
for($i = 0;$i < $detailApply->trainNumber;++$i)
{
	array_push($trainNumberArray , $i);
}
$train = new Train;
$sql_4 = "select * from `train` WHERE detail_apply_id = '{$detailApplyId}'";
$traindetail = $train->getArray($sql_4,true);
$smarty->assign("trainNumberArray",$trainNumberArray);
$smarty->assign("train",$traindetail);

$smarty->setTitle('车号单');
$smarty->displaymother('HC/AddTrainInfo.tpl');
}
?>
