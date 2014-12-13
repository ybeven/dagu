<?php
function jinchang($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("金昌市" , "/gis/jinchang" , true);
        
    $smarty->setTitle("金昌市");
    $smarty->displayMother("gis/jinchang.tpl");
}
?>