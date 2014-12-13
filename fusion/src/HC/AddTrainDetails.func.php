<?php
function AddTrainDetails($detailApplyId,$notice=null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
        
       

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

$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("计量单" , "/HC/AddTrainDetails" , true);

$detailApply = new DetailApply;
$sql_1 = "select * from `detail_apply` WHERE id = '{$detailApplyId}'";
$detailApplyArray = $detailApply->getArray($sql_1,true);
$oilModelId = $detailApply->oilModelId;
$mainApplyId = $detailApply->mainApplyId;
$smarty->assign("mainApplyId",$mainApplyId);

$shared = new SharedTrain;
$sqltrain = "select * from `shared_train` WHERE detail_apply_id = '{$detailApplyId}'";
$sharedtrain = $shared->getArray($sqltrain,true);
if($sharedtrain[0]->state==6)
{
    $detailApply->flowWeight=$sharedtrain[0]->flowWeight;
    $detailApply->update();
}

//油品
$oilModel = new OilModel;
$sql_2 = "select * from `oil_model` WHERE id = '{$oilModelId}'";
$oilModelArray = $oilModel->getArray($sql_2,true);
$oilTypeId = $oilModel->oilTypeId;
$oilType = new OilType;
$sql_3 = "select * from `oil_type` WHERE id = '{$oilTypeId}'";
$oilTypeArray = $oilType->getArray($sql_3,true);

$detailApply = new DetailApply;
$sql_1 = "select * from `detail_apply` WHERE id = '{$detailApplyId}'";
$detailApplyArray = $detailApply->getArray($sql_1,true);

$smarty->assign('detailApply',$detailApply);

$smarty->assign('oilModel',$oilModel->oilModel);
$smarty->assign('oilType',$oilType->oilType);
$smarty->assign('detailApplyId',$detailApplyId);

$train = new Train;
$sql="select * FROM `train` WHERE detail_apply_id = '{$detailApplyId}'";
$trainArray = $train->getArray($sql,true);
$smarty->assign('trainArray',$trainArray);

$smarty->setTitle('计量单');
$smarty->displaymother('HC/AddTrainDetails.tpl');
}
?>
