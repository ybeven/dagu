<?php
function ShowQCJS($mrid,$notice=null){
global $smarty;
	needLogin();
        $session=Session::start();
	
        $devDef = new Task;
        $devDef-> getByID($mrid);
        
	$plan = new Plan;
        $plan-> getByID($devDef->planId);
        
        
        $weight1 = ($devDef->finalWeight)-($devDef->emptyWeight);
    
        $weight3 = ($weight1) - ($devDef->flowWeight);
        if($weight3>0)
        {
            $weight2 = $weight3;
        }
        else
        {
            $weight2 = -($weight3);
        }
        $money = ($devDef->advancePay)-($devDef->money);
        
        
        
        $crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("查看结算信息" , "" , true);
        
	$smarty->assign('plan',$plan);
        $smarty->assign('task',$devDef);
	$smarty->assign('weight1',$weight1);
        $smarty->assign('weight2',$weight2);
        $smarty->assign('money',$money);
	$smarty->setTitle('查看结算信息');
        $smarty->displaymother('TABLE/ShowQCJS.tpl');
}

?>
