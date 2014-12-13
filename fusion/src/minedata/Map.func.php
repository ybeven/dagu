<?php
function Map($notice=null){
global $smarty;
	needLogin();
    $session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	
	
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("地图" , "/minedata/Map" , true);
	
    $smarty->setTitle('地图');
    $smarty->displaymother('minedata/Map.tpl');
}
?>
