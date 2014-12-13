<?php
function AddTrainNotice($mainApplyId, $notice=null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
         $planDate = date('Y-m-d');
        

$smarty->addScriptDef(<<<SCRIPTDEF
<script type="text/javascript" src="/js/addSort.js"></script>
SCRIPTDEF
    );
$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("装车通知单" , "/HC/AddTrainNotice" , true);

$mainApply = new MainApply;
$detailApply = new DetailApply;
$sql_1="select * FROM `main_apply` WHERE id = '{$mainApplyId}'";
$sql_2="select * FROM `detail_apply` WHERE main_apply_id = '{$mainApplyId}'";
$mArray = $mainApply->getArray($sql_1,true);
$dArray = $detailApply->getArray($sql_2,true);
$smarty->assign('detailApplyArray',$dArray);
$smarty->assign('mainApplyArray',$mArray);

$smarty->assign('date',$planDate);

$smarty->setTitle('装车通知单');
$smarty->displaymother('HC/AddTrainNotice.tpl');
}
?>
