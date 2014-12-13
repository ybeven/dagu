<?php
function gannan($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("甘南州" , "/gis/gannan" , true);
        
    $smarty->setTitle("甘南州");
    $smarty->displayMother("gis/gannan.tpl");
}
?>