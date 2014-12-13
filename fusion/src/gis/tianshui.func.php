<?php
function tianshui($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("天水市" , "/gis/tianshui" , true);
        
    $smarty->setTitle("天水市");
    $smarty->displayMother("gis/tianshui.tpl");
}
?>