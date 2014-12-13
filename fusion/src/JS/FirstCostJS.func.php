<?php
function FirstCostJS($notice=null){
global $smarty;

	needLogin();
        $session=Session::start();
        notice($notice);
	
        $ac = new AccessController;
	if(!$ac->can("管理结算" , $session->curUser)){
		http302("/start/index/".urlencode('您无权管理结算'));
		return;
        }
	$payMileageArray = array();
	
	for($i = 1;$i <= PAYRECORDNUM;++$i)
		array_push($payMileageArray , $i);
$smarty->addScriptDef(<<<SCRIPTDEF
<script type="text/javascript" src="/js/addSort.js"></script>
SCRIPTDEF
    );
$smarty->assign('notice',$notice);

$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("预交费管理" , "/JS/FirstCostJS" , true);



$smarty->setTitle('预交费管理');
$smarty->displaymother('JS/FirstCostJS.tpl');

}
?>