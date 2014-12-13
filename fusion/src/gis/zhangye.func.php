<?php
function zhangye($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
	$crumb->visitNewPage("主页" , "/start" , false);
	$crumb->visitNewPage("各城区地图" , "/gis/citygis" , false);
    $crumb->visitNewPage("张掖市" , "/gis/zhangye" , true);
        
    $smarty->setTitle("张掖市");
    $smarty->displayMother("gis/zhangye.tpl");
}
?>