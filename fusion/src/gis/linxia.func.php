<?php
function linxia($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("临夏市" , "/gis/linxia" , true);
        
    $smarty->setTitle("临夏市");
    $smarty->displayMother("gis/linxia.tpl");
}
?>