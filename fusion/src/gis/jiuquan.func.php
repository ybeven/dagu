<?php
function jiuquan($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("酒泉市" , "/gis/jiuquan" , true);
        
    $smarty->setTitle("酒泉市");
    $smarty->displayMother("gis/jiuquan.tpl");
}
?>