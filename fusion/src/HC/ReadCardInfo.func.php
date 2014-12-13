<?php
function ReadCardInfo($detailApplyId,$notice=null){
/*global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	
     //   $ac = new AccessController;
	//if(!$ac->can("管理销售计划" , $session->curUser)){
	//	http302("/start/index/".urlencode('您无权添加销售计划'));
	//	return;
   //     }
	//$payMileageArray = array();
	//
	for($i = 1;$i <= PAYRECORDNUM;++$i)
		array_push($payMileageArray , $i);
$smarty->addScriptDef(<<<SCRIPTDEF
<script type="text/javascript" src="/js/addSort.js"></script>
SCRIPTDEF
    );


$detailApply = new DetailApply;
$detailApply->getByID($detailApplyId);

$mainId = $detailApply->mainApplyId;

$mainplan = new MainApply;
$mainplan->getByID($mainId);

$detailtrain = new Train;
$sql = "select * from `train` WHERE detail_apply_id = '{$detailApplyId}'";
$train = $detailtrain->getArray($sql,true);

$card = new SharedTrain;
$sql = "select * from `shared_train` WHERE detail_apply_id = '{$detailApplyId}'";
$cardID = $card->getArray($sql,true);	

$smarty->assign("detailapply",$detailApply);
$smarty->assign("train",$train);
$smarty->assign("card",$cardID);
$smarty->assign("mainApplyId",$mainplan->id);

$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("添加销售计划" , "/JS/FirstCostJS" , true);



$smarty->setTitle('预缴费');
$smarty->displaymother('HC/WriteCardInfo.tpl');
 */
}

?>