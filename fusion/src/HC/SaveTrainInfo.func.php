<?php	
	/*function unitMath($unit)
	{
		$i = 1;
		if($unit == "��")$i = 365;
		else if($unit == "��")$i=30;
		return $i;
	}*/
	function SaveTrainInfo($detailApplyId,$notice=null)
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
                $card2 = new SharedTrain;
                $sql = "select * from `shared_train` WHERE detail_apply_id = '{$detailApplyId}'";
                $cardID = $card2->getArray($sql,true);
                if(count($cardID)==1)
               {
                    
				if($card2->state>1)
                         {
?>		     
                     <script>alert('�ƻ��Ѿ�ִ��,�޷��޸�!');history.back(-1);</script>;
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
		//$logger ->log("{$curUser->name}(id:{$curUser->id})��".date('Y��m��d��H:i:s',time())."������豸������Ϣ(id:{$devDef->id})");
		//http302('/HC/ListTrainMainApply/'.urlencode('��ӳ��ŵ��ɹ���'));
		http302('/HC/ListTrainInfo/'.$planid.'/'.urlencode('�޸ĳ��ŵ��ɹ���'));
	}
?>