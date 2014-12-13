<?php
function qingyang($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("庆阳市" , "/gis/qingyang" , true);
        
    $smarty->setTitle("庆阳市");
    $smarty->displayMother("gis/qingyang.tpl");
}
?>