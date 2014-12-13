<?php
function longnan($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("陇南市" , "/gis/longnan" , true);
        
    $smarty->setTitle("陇南市");
    $smarty->displayMother("gis/longnan.tpl");
}
?>