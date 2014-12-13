<?php	
	/*function unitMath($unit)
	{
		$i = 1;
		if($unit == "年")$i = 365;
		else if($unit == "月")$i=30;
		return $i;
	}*/
	function SaveTrainPlan($notice=null)
	{
		needLogin();
		$session=Session::start();
		//if(empty($_POST["childID"]))
		//{
			//http302('/ZB/AddTructPlanZB/'.urlencode('请选择正确的油品型号！'));
			//return;
		//}
		//$logger = new CategoryLogger('log_definition');
		//$curUser = $session->curUser;
		$mainApply = new MainApply;
		$mainApply->applyTime=$_POST["applyTime"];
		$mainApply->applyAnnt=$_POST["applyAnnt"];
		$mainApply->salesvicemanager=$_POST["salesvicemanager"];
		$mainApply->salesmanager=$_POST["salesmanager"];
		$mainApply->energymanager=$_POST["energymanager"];
		$mainApply->state= 1;
		$mainApply->add();
		$flag=count($_POST['company']);
		for($i=0;$i<$flag;$i++)
		{
			$detailApplyArray[$i] = new DetailApply;
			$detailApplyArray[$i]->company = $_POST["company"][$i];
			$detailApplyArray[$i]->oilModelId = $_POST["childID"][$i];
			$detailApplyArray[$i]->weight = $_POST["weight"][$i];
			$detailApplyArray[$i]->trainNumber = $_POST["train_number"][$i];
			$detailApplyArray[$i]->station = $_POST["station"][$i];
			$detailApplyArray[$i]->specialline = $_POST["specialline"][$i];
			$detailApplyArray[$i]->consignee = $_POST["consignee"][$i];
			$detailApplyArray[$i]->remarks = $_POST["remarks"][$i];
			$detailApplyArray[$i]->mainApplyId = $mainApply->id;
			$detailApplyArray[$i]->state =1;
			$detailApplyArray[$i]->add();
		}
		//$logger ->log("{$curUser->name}(id:{$curUser->id})于".date('Y年m月d日H:i:s',time())."添加了设备定义信息(id:{$devDef->id})");
		http302('/HC/ListTrainMainApply/'.urlencode('添加请车单成功！'));
	}
?>