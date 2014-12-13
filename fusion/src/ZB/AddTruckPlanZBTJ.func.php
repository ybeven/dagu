<?php
	
		
function unitMath($unit){
	$i = 1;
	if($unit == "年")$i = 365;
	else if($unit == "月")$i=30;
	return $i;
}

function AddTruckPlanZBTJ($notice=null){
needLogin();
//session_cache_limiter('private'); 
$session=Session::start();
$curUser = $session->curUser;
/*
if(empty($_POST["childID"]))
{
http302('/ZB/AddTructPlanZB/'.urlencode('请选择正确的油品型号！'));
return;
}
*/

//验证车牌号是否填写
if($_POST[trucknumber]=='')
	{
	   http302("/ZB/AddTruckPlanZB/".urlencode("车牌号未填写，请仔细检查"));
	   return;
	}
else{
	$logger = new CategoryLogger('log_definition');
        $curUser = $session->curUser;
	 //计算任务数
  $flag=count($_POST[plankey]);
  $planDate = date('Y-m-d H:i:s');
  $planTime = date('H:i:s');
  
  $time = new WorkTime;
  $sql = "select * from `work_time` WHERE  start_time <= '{$planTime}%' AND over_time > '{$planTime}%' ";
  $plantime = $time->getArray($sql,true);
   //生成计划
  $devDef = new Plan;
  $devDef->truckNumber=$_POST[trucknumber];
  $devDef->cardCount=$flag;
  $devDef->operatorId=$curUser->id;
  $devDef->operateTime=$planDate;
  $devDef->state="未执行";
  $devDef->workId=$time->id;
  $devDef->add();

  for($i=0;$i<$flag;$i++)
  {
	//存入任务
	    $detailplan[$i] = new Task;
            $detailplan[$i]->planId=$devDef->id;
	    
	    $plankey = $_POST[plankey][$i];
	    if($plankey=='')
	    {
	        $plankey = "未知";
	    }
            $detailplan[$i]->planKey=$plankey;
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
	
        $price = $_POST[price][$i];
	$weight = $_POST[weight][$i];
	$remarks = $_POST[remarks][$i];
            
	    if($remarks=='')
	    {
	        $remarks = "无";
	    }
            $detailplan[$i]->oilModelId=$_POST[childID][$i];
            $detailplan[$i]->unitPrice=$price;
            $detailplan[$i]->planWeight=$weight;
	    $detailplan[$i]->planRemarks=$remarks;
	    $detailplan[$i]->state = "未执行";
	    
            $detailplan[$i]->add();
	
  }

  $logger ->log("{$curUser->name}(id:{$curUser->id})于".date('Y年m月d日H:i:s',time())."添加了设备定义信息(id:{$devDef->id})");

  http302('/ZB/ListTruckPlanZB/'.urlencode('添加成功！'));  
}

}

?>