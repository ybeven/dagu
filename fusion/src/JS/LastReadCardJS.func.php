<?php
function LastReadCardJS($mrid){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
    $cardId=$mrid;
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

    $money=($task->unitPrice) * ($task->planWeight);//计划金额

    
    $weight1 = ($truck[0]->finalWeight)-($truck[0]->emptyWeight);
    
    
    
    $sign = new MeasureDifference;
    $sign->getByID(1);
    $smarty->assign('sign',$sign);
    if($truck[0]->calculateMethod == 2)
    {
	$money1 = ($weight1)*($task->unitPrice);//车重实际金额
	$defmoney1 = ($money1)-($task->advancePay);
	$calculate = "重车-空车";
    }
    else
    {
	$money1 = ($truck[0]->flowWeight)*($task->unitPrice);//质量流量计金额
	$defmoney1 = ($money1)-($task->advancePay);
	$calculate = "质量流量计";
    }
  
    
$smarty->assign('money',$money);
$smarty->assign('task',$task);
$smarty->assign('plan',$plan);
$smarty->assign('shared',$truck[0]);
$smarty->assign('calculate',$calculate);

$smarty->assign('weight1',$weight1);
$smarty->assign('weight2',$weight2);
$smarty->assign('money1',$money1);

$smarty->assign('notice',$notice);
$smarty->assign('cardId',$cardId);

//差额
$smarty->assign('defmoney1',$defmoney1);

$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("结算管理" , "/JS/LastCostJS" , true);

$smarty->setTitle('结算管理');
$smarty->displaymother('JS/LastCostJS.tpl');
}
?>