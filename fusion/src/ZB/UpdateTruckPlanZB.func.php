<?php
function UpdateTruckPlanZB($mrid){
global $smarty;
	needLogin();
        $session=Session::start();
	 $plan = new Plan;
        $plan-> getByID($mrid);
	$task2 = new Task;
		$sql = "select * from `task` WHERE plan_id = {$plan->id}  AND state <> '已完成' ";
	        $task3 = $task2->getArray($sql,true);
		$sign = 0 ;
		foreach($task3 as $k)
	        {
			
			$sharedTruck = new SharedTruck;
                        $sql = "select * from `shared_truck` WHERE task_id = {$k->id} ";
                        $truck =$sharedTruck->getArray($sql,true);
			
			if(count($truck)<=0 )
			{
				
			}
			else if($sharedTruck->cardState <3)
			{
				$sign = 1;
				http302('/ZB/ShowTruckPlanZB/'.$mrid.'/'.urlencode("请删除任务并重新建立新任务"));
				return;
			}
			
			else if($sharedTruck->cardState>=3 && $sharedTruck->cardState < 5)
				{
					$sign = 1;
					http302('/ZB/ListTruckPlanZB/'.urlencode("请执行完流程或删除该计划并到汽车操作站删除该卡数据，然后重新建立新任务"));
					break;
				}
				
			else
			{
				$sign = 1;
					http302('/ZB/ListTruckPlanZB/'.urlencode("请执行完流程,无法修改"));
					break;
			}
			
	        }
	if($sign == 0)
	{
		
	
	
	//验证车牌号是否填写
  
    if($_POST[trucknumber]=='')
	{
	   //http302('/ZB/AddtruckPlanZB/'.urlencode('请输入车牌号！'));
	   ?>		     
                     <script>alert('请输入车牌号!');history.back(-1);</script>;
                 <?php
	   return;
	}
    else
    {   	
	
	 $flag=count($_POST[customer]);
	
	
        $devDef = new Plan;
        $devDef-> getByID($mrid);
	$task = new Task;
	$sql = "select * from `task` WHERE plan_id = $mrid";
        $sort = $task->getArray($sql,true);
        foreach($sort as $k)
	    {
		$k->remove(intval($k->id),false);
	    }
           
       
//生成计划
/*
$devDef = new Plan;
$devDef->truckNumber=$_POST[trucknumber];
$devDef->cardCount=$flag;
$devDef->update();
*/

       for($i=0;$i<$flag;$i++)
       {
	//存入任务
	    $detailplan[$i] = new Task;
            $detailplan[$i]->planId=$devDef->id;
            $detailplan[$i]->planKey=$_POST[plankey][$i];
	    $detailplan[$i]->payType=$_POST[paystyle][$i];
	
	$name = $_POST[customer][$i];
	$contect = $_POST[contect][$i];
	$contectway = $_POST[contectway][$i];
	$customerstyle = $_POST[customerstyle][$i];
	$newcustomer = new Customer;
	$sql = "select * from `customer` WHERE name ='{$name}' AND contact_person='{$contect}' AND contact='{$contectway}' AND type='{$customerstyle}'";
	$customer = $newcustomer->getArray($sql,true);
	if( count($customer)<=0)
	{
		//存入客户名
	    if($name=='')
	    {
	        $name = "未知";
	    }
	    $CClass[$i] = new Customer;
	    $CClass[$i]->name=$name;
	    $CClass[$i]->contactPerson=$_POST[contect][$i];
            $CClass[$i]->contact=$_POST[contectway][$i];
            $CClass[$i]->type=$_POST[customerstyle][$i];
	    $CClass[$i]->add();
	    $detailplan[$i]->customerId=$CClass[$i]->id;
	}
	else
	{
		$detailplan[$i]->customerId=$customer[0]->id;
	}
	
        
            
            $detailplan[$i]->oilModelId=$_POST[childID][$i];
            $detailplan[$i]->unitPrice=$_POST[price][$i];
            $detailplan[$i]->planWeight=$_POST[weight][$i];
            $detailplan[$i]->add();
	
  }
        
	//$smarty->setTitle('查看销售计划');
        //$smarty->displaymother('ZB/ListTruckPlanZB.tpl');
        http302('/ZB/ShowTruckPlanZB/'.$mrid.'/'.urlencode("修改成功"));
    }
 }
}

?>
