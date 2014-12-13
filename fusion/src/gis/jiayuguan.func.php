<?php
function jiayuguan($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("嘉峪关市" , "/gis/jiayuguan" , true);
        
    $smarty->setTitle("嘉峪关市");
    $smarty->displayMother("gis/jiayuguan.tpl");
}
?>