<?php
function FirstReadCardJS($mrid,$notice=null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	
    $cardId = $mrid;

     if($cardId==null)
                {
?>		     
                     <script>alert('请刷卡!');history.back(-1);</script>;
<?php
                     return;
	         }
                 elseif($cardId==0)
                {
?>		     
                     <script>alert('读卡器连接错误!');history.back(-1);</script>;
<?php
                     return;
	         }
               elseif($cardId==-1)
                {
?>		     
                     <script>alert('读卡器初始化错误!');history.back(-1);</script>;
<?php
                     return;
	         }
                elseif($cardId==-2)
                {
?>		     
                     <script>alert('请重新放卡!');history.back(-1);</script>;
<?php
                      return;
	         }
    
    $sharedTruck = new SharedTruck;
    $sql = "select * from `shared_truck` WHERE card_id = $cardId ";
    $truck =$sharedTruck->getArray($sql,true);
    if(count($truck)<=0)
    {
        ?>		     
                <script>alert('无此卡信息!');history.back(-1);</script>;
        <?php
     }    
    
    $task = new Task;
    $task->getByID($truck[0]->taskId);
    
    $plan = new Plan;
    $plan->getByID($task->planId);

$money=($task->unitPrice) * ($task->planWeight);
$smarty->assign('money',$money);
$smarty->assign('task',$task);
$smarty->assign('plan',$plan);
$smarty->assign('cardId',$cardId);

$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("预交费管理" , "/JS/FirstCostJS" , true);

$smarty->setTitle('预交费管理');
$smarty->displaymother('JS/FirstCostJS.tpl');
}
?>