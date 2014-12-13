<?php
function QCShoudongAll($mrid,$notice=null){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	$task = new Task;
        $task->getByID($mrid);
	
	$plan = new Plan;
	$plan->getByID($task->planId);
	
       
	
	$weight1=$task->finalWeight - $task->emptyWeight;
	
	$weight3 = ($weight1) - ($task->flowWeight);
        if($weight3>0)
        {
            $weight2 = $weight3;
        }
        else
        {
            $weight2 = -($weight3);
        }
	
	
	$smarty->assign('weight1',$weight1);
	$smarty->assign('weight2',$weight2);
	
	
	
	
	$smarty->assign('task',$task);
	$smarty->assign('plan',$plan);
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("汽车计划详情" , "" , true);

	
	$smarty->setTitle('汽车计划详情');
	$smarty->displayMother('QC/QCShoudongAll.tpl');
	
}
?>