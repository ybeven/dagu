<?
function AddTrainPlan($notice=null)
{
	global $smarty;
	notice($notice);
	needLogin();
    $session=Session::start();
    $curUser = $session->curUser;
   
	$planDate = date('Y-m-d');
    $smarty->assign('date',$planDate);
	$smarty->addCssDef(<<<CSSDEF
<link rel="stylesheet" type="text/css" href="/flex/history/history.css" />
CSSDEF
	);
	$smarty->addScriptDef(<<<SCRIPTDEF
		<script type="text/javascript" src="/js/addSort.js"></script>
		<script type="text/javascript" src="/flex/history/history.js"></script>  
        <script type="text/javascript" src="/flex/swfobject.js"></script>
SCRIPTDEF
	);
	$crumb = Crumb::getCrumb();
	$crumb->popAllLatitude();
	$crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("gis地图管理" , "/HC/AddTrainPlan" , true);

	/* $MClass = new OilType;
	$sql = "select * from `oil_type`";
	$sortID = $MClass->getArray($sql,true);
	$CClass = new OilModel;
	$sql = "select * from `oil_model`";
	$childID = $CClass->getArray($sql,true); */
	$smarty->assign('sortID',$sortID);
	$smarty->assign('childID',$childID);
	
	$MainapplyId = date("YmdHis",time());

	$smarty->assign('MainapplyId',$MainapplyId);

	$smarty->setTitle('gis地图管理');
	//$smarty->assign("payMileageArray",$payMileageArray);
	$smarty->displaymother('HC/AddTrainPlan.tpl');
}
?>

