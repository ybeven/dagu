<?php	
	/*function unitMath($unit)
	{
		$i = 1;
		if($unit == "��")$i = 365;
		else if($unit == "��")$i=30;
		return $i;
	}*/
	function SaveTrainDetails($detailApplyId,$notice=null)
	{
		needLogin();
		$session=Session::start();
		$train = new Train;
		$sql="select * FROM `train` WHERE detail_apply_id = '{$detailApplyId}'";
		$tArray = $train->getArray($sql,true);
		$flag=count($tArray);
		
		
		for($i=0;$i<$flag;$i++)
		{
			$train = new Train;
			$train->getByID($tArray[$i]->id);
			$train->trainType = $_POST[traintype][$i];
			$train->position = $_POST[position][$i];
			$train->volumeSign = $_POST[volumeSign][$i];
			$train->volumeNumber = $_POST[volumeNumber][$i];
			$train->oilHeight = $_POST[oilHeight][$i];
			$train->waterHeight = $_POST[waterHeight][$i];
			$train->temperature = $_POST[temperature][$i];
			$train->tryTemperature = $_POST[tryTemperature][$i];
			$train->watchDensity = $_POST[watchDensity][$i];
			$train->standardDensity = $_POST[standardDensity][$i];
			$train->trueVolume = $_POST[trueVolume][$i];
			$train->manMeasure = $_POST[manMeasure][$i];
			$train->sign = $_POST[sign][$i];
			$train->potNumber = $_POST[potNumber][$i];
			$train->update();
		}
		$detailApply = new DetailApply;
		$detailApply->getByID($detailApplyId);
		$detailApply->sendCompany = $_POST["sendCompany"];
		$detailApply->sendStation = $_POST["sendStation"];
		$detailApply->measurekey = $_POST["measurekey"];
		$detailApply->measureman = $_POST["measureman"];
		
		$detailApply->calculateman = $_POST["calculateman"];
		$man=$_POST["responsibleman"];
		$detailApply->responsibleman = $man;
		
		$sharedtrain = new SharedTrain;
	        $sql =  "select * from `shared_train` WHERE detail_apply_id='{$detailApplyId}'";
	        $sharedtrain2 = $sharedtrain->getArray($sql,true);
		if($detailApply->responsibleman != null && $sharedtrain2[0]->state == 6 )
		{
			$detailApply->state = 3;
		}
		
		$detailApply->update();
		$plan = new MainApply;
	        $plan->getByID($detailApply->mainApplyId);
		$plan->mainplanId = $_POST["RecordId"];
	
	        $id = $plan->id;
	
	        $task = new DetailApply;
	        $sql =  "select * from `detail_apply` WHERE main_apply_id='{$id}'";
	        $task2 = $task->getArray($sql,true);
		
		
	        $sign = 1;
	        foreach($task2 as $k)
	        {
		        if($k->state <= 2)
		        {
			        $sign = 0;
		        }
	        }
	        if($sign == 1 && count($task2) > 0)
	        {
		        $plan->state=3;
	        }
	        $plan->update();
		
		
		
		
		$mainApply = new MainApply;
		$mainApply->getByID($detailApply->mainApplyId);
		$planid = $mainApply->id;

		//$logger ->log("{$curUser->name}(id:{$curUser->id})��".date('Y��m��d��H:i:s',time())."������豸������Ϣ(id:{$devDef->id})");
		http302('/HC/ListTrainDetail/'.$planid.'/'.urlencode('�޸ļ����ɹ���'));
		
		
	}
?>