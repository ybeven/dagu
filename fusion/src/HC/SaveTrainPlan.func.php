<?php	
	/*function unitMath($unit)
	{
		$i = 1;
		if($unit == "��")$i = 365;
		else if($unit == "��")$i=30;
		return $i;
	}*/
	function SaveTrainPlan($notice=null)
	{
		needLogin();
		$session=Session::start();
		//if(empty($_POST["childID"]))
		//{
			//http302('/ZB/AddTructPlanZB/'.urlencode('��ѡ����ȷ����Ʒ�ͺţ�'));
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
		//$logger ->log("{$curUser->name}(id:{$curUser->id})��".date('Y��m��d��H:i:s',time())."������豸������Ϣ(id:{$devDef->id})");
		http302('/HC/ListTrainMainApply/'.urlencode('����복���ɹ���'));
	}
?>