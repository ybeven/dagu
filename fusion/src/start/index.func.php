<?php
function index($notice=null){
    global $smarty;
    needLogin();
    notice($notice);

    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , true);
        
    $smarty->setTitle("首页");
    $smarty->displayMother("index.tpl");
}
?>