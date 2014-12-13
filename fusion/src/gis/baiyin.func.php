<?php
function baiyin($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("白银市" , "/gis/baiyin" , true);
        
    $smarty->setTitle("白银市");
    $smarty->displayMother("gis/baiyin.tpl");
}
?>