<?php	
	/*function unitMath($unit)
	{
		$i = 1;
		if($unit == "年")$i = 365;
		else if($unit == "月")$i=30;
		return $i;
	}*/
	function UpdateTrainPlan($mainApplyId,$notice=null)
	{
		needLogin();
		$session=Session::start();
		
		$mainApply = new MainApply;
		$mainApply->getByID($mainApplyId);

		if($mainApply->state!=1)
		{
			//http302('/HC/ListTrainDetailApply/'.$mainApplyId.'/'.urlencode('计划已经开始执行，无法修改'));
			http302('/HC/ListTrainDetailApply/'.$mainApplyId.'/'.urlencode('计划已经开始执行，无法修改！'));
		                 return;	
		}
		$mainApply->mainplanId=$_POST["RecordId"];
		$mainApply->applyTime=$_POST["applyTime"];
		$mainApply->applyAnnt=$_POST["applyAnnt"];
		$mainApply->salesvicemanager=$_POST["salesvicemanager"];
		$mainApply->salesmanager=$_POST["salesmanager"];
		$mainApply->energymanager=$_POST["energymanager"];
		$mainApply->update();
		
		
		$detailApply = new DetailApply;
		$sql_2="select * FROM `detail_apply` WHERE main_apply_id ='{$mainApplyId}'";
		$dArray = $detailApply->getArray($sql_2,true);
		$flag=count($dArray);
		
		foreach($dArray as $d)
		{
				$detailApply->remove($d->id, false);
		}
		
		
		for($i=0;$i<$flag;$i++)
		{
			$detailApplyArray[$i] = new DetailApply;
			$detailApplyArray[$i]->company = $_POST["company"][$i];
			$detailApplyArray[$i]->oilModelId = $_POST["childID"][$i];
			$detailApplyArray[$i]->weight = $_POST["weight"][$i];
			$detailApplyArray[$i]->trainNumber = $_POST[train_number][$i];
			$detailApplyArray[$i]->station = $_POST["station"][$i];
			$detailApplyArray[$i]->specialline = $_POST["specialline"][$i];
			$detailApplyArray[$i]->consignee = $_POST["consignee"][$i];
			$detailApplyArray[$i]->remarks = $_POST["remarks"][$i];
			$detailApplyArray[$i]->mainApplyId = $mainApply->id;
			$detailApplyArray[$i]->add();
		}
		
		http302('/HC/ListTrainDetailApply/'.$mainApplyId.'/'.urlencode('修改请车单成功！'));
	}
?>