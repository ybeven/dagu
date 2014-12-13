<?php	
	/*function unitMath($unit)
	{
		$i = 1;
		if($unit == "年")$i = 365;
		else if($unit == "月")$i=30;
		return $i;
	}*/
	function SaveTrainInfo($detailApplyId,$notice=null)
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
                $card2 = new SharedTrain;
                $sql = "select * from `shared_train` WHERE detail_apply_id = '{$detailApplyId}'";
                $cardID = $card2->getArray($sql,true);
                if(count($cardID)==1)
               {
                    
				if($card2->state>1)
                         {
?>		     
                     <script>alert('计划已经执行,无法修改!');history.back(-1);</script>;
<?php
                    return;
                         }
                }

		$detailApply = new DetailApply;
		$detailApply->getByID($detailApplyId);
		
		$mainApply = new MainApply;
		$mainApply->getByID($detailApply->mainApplyId);
		$mainApply->state=2;
		$mainApply->update();
		$planid = $mainApply->id;
		$train = new Train;
                $sql_4 = "select * from `train` WHERE detail_apply_id = '{$detailApplyId}'";
                $traindetail = $train->getArray($sql_4,true);
		
		foreach($traindetail as $d)
		{
				$train->remove($d->id, false);
		}
		
		for($i=0;$i<$detailApply->trainNumber;$i++)
		{
			$trainArray[$i] = new Train;
			$trainArray[$i]->trainsign = $_POST["trainsign"][$i];
			$trainArray[$i]->potType = $_POST["potType"][$i];
			$trainArray[$i]->load = $_POST["load"][$i];
			$trainArray[$i]->planWeight = $_POST["planWeight"][$i];
			$trainArray[$i]->platform = $_POST["platform"][$i];
			$trainArray[$i]->detailApplyId = $detailApplyId;
			$trainArray[$i]->add();
		}
		//$logger ->log("{$curUser->name}(id:{$curUser->id})于".date('Y年m月d日H:i:s',time())."添加了设备定义信息(id:{$devDef->id})");
		//http302('/HC/ListTrainMainApply/'.urlencode('添加车号单成功！'));
		http302('/HC/ListTrainInfo/'.$planid.'/'.urlencode('修改车号单成功！'));
	}
?>