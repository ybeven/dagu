<?php	
	
	function DeleteTrainPlan($mainApplyId)
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
		$sql_1="select * FROM `main_apply` WHERE id ='{$mainApplyId}'";
		$mArray = $mainApply->getArray($sql_1,true);
		$mainApply->remove($mainApplyId, false);
		
		$detailApply = new DetailApply;
		$sql_2="select * FROM `detail_apply` WHERE main_apply_id ='{$mainApplyId}'";
		$dArray = $detailApply->getArray($sql_2,true);
		foreach($dArray as $d)
		{
			$train = new Train;
			$sql_3="select * FROM `train` WHERE detail_apply_id ='{$d->id}'";
			$trainArray = $train->getArray($sql_3,true);
			foreach($trainArray as $t)
			{
				$train->remove($t->id, false);	
			}
			$detailApply->remove($d->id, false);
		}		
		$mainApply->remove($mainApplyId, false);
		//$logger ->log("{$curUser->name}(id:{$curUser->id})于".date('Y年m月d日H:i:s',time())."添加了设备定义信息(id:{$devDef->id})");
		http302('/HC/listTrainMainApply/'.urlencode('删除请车单成功！'));
	}
?>