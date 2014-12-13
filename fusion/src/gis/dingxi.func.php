<?php
function dingxi($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("定西市" , "/gis/dingxi" , true);
        
    $smarty->setTitle("定西市");
    $smarty->displayMother("gis/dingxi.tpl");
}
?>