<?php
function lanzhou($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("兰州市" , "/gis/lanzhou" , true);
        
    $smarty->setTitle("兰州市");
    $smarty->displayMother("gis/lanzhou.tpl");
}
?>