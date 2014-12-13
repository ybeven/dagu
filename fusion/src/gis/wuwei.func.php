<?php
function wuwei($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("武威市" , "/gis/wuwei" , true);
        
    $smarty->setTitle("武威市");
    $smarty->displayMother("gis/wuwei.tpl");
}
?>