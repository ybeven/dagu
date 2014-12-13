<?php
function citygis($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("" , "/start" , false);
    $crumb->visitNewPage("各市区地图" , "/gis/citygis" , true);
        
    $smarty->setTitle("各市区地图");
    $smarty->displayMother("gis/citygis.tpl");
}
?>