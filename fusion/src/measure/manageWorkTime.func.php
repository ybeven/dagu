<?php
function manageWorkTime($notice=null){
    global $smarty;
	$session = Session::start();
	if($notice!="auto")notice($notice);
	needLogin();
	
	$curUser = $session->curUser;
	
	$ac = new AccessController;
	if(!$ac->can("系统管理" , $curUser)){
		 ?>		     
                     <script>alert('您无权管理班次!');history.back(-1);</script>;
                 <?php
                      return;
	}
	
    $time1 = new WorkTime;
    $sql1 = "select * from `work_time` WHERE name = '晚班' ";	
    $worktime1 = $time1->getArray($sql1,true);
    $time2 = new WorkTime;
    $sql2 = "select * from `work_time` WHERE name = '早班' ";	
    $worktime2 = $time2->getArray($sql2,true);
    $time3 = new WorkTime;
    $sql3 = "select * from `work_time` WHERE name = '中班' ";	
    $worktime3 = $time3->getArray($sql3,true);
	
    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("管理班次" , "/measure/manageRole" , true);
    
    $smarty->assign('time1', $time1);
    $smarty->assign('time2', $time2);
    $smarty->assign('time3', $time3);
    
    $smarty->setTitle('管理班次');
    $smarty->displayMother('measure/WorkTime.tpl');
}
?>