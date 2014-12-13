<?php
function pingliang($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("平凉市" , "/gis/pingliang" , true);
        
    $smarty->setTitle("平凉市");
    $smarty->displayMother("gis/pingliang.tpl");
}
?>