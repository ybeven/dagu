<?php	
	
	function SaveCardInfo($detailApplyId,$notice=null)
	{
		needLogin();
		$session=Session::start();
		
		
		$detailApply = new DetailApply;
                $detailApply->getByID($detailApplyId);
                $cardId=$_POST[num];
		
		
		if($cardId==null)
                {
                ?>		     
                     <script>alert('请先刷卡!');history.back(-1);</script>;
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
		
		$sharedtruck_1 = new SharedTrain;
		$sql = "select * from `shared_train` WHERE card_id = $cardId ";
		$sharedtruck_2 = $sharedtruck_1->getArray($sql,true);
		if(count($sharedtruck_2)>=1)
		{
		    ?>		     
                     <script>alert('此卡已被使用，无法重新分配!');history.back(-1);</script>;
                 <?php
                      return;
		}
                $mainId = $detailApply->mainApplyId;
		
                $detailtrain = new Train;
                $sql = "select * from `train` WHERE detail_apply_id = '{$detailApplyId}'";
                $train = $detailtrain->getArray($sql,true);
		
		$card2 = new SharedTrain;
                $sql = "select * from `shared_train` WHERE detail_apply_id = '{$detailApplyId}'";
                $cardID2 = $card2->getArray($sql,true);
		
		
		if(count($cardID2)<=0)
		{
			foreach($train as $d)
		        {
				$card = new SharedTrain;
				$card->cardId = $cardId;
				$card->state = 1;
				$card->detailApplyId = $detailApplyId;
				$card->trainNumber = $d->trainsign;
				$card->oilModelId = $detailApply->oilType->oilType.$detailApply->oilModel->oilModel;
				$card->planWeight = $d->planWeight;
				$card->platform = $d->platform;
				$card->position = $d->position;
				$card->add();
		        }
		}
		else
		{
			foreach($cardID2 as $d)
		        {
				$card2->remove($d->id, false);
		        }
			foreach($train as $d)
		        {
				$card = new SharedTrain;
				$card->cardId = $cardId;

				$card->state = 1;
				$card->detailApplyId = $detailApplyId;
				$card->trainNumber = $d->trainsign;
				$card->oilModelId =  $detailApply->oilType->oilType.$detailApply->oilModel->oilModel;
				$card->planWeight = $d->planWeight;
				$card->platform = $d->platform;
				$card->position = $d->position;
				$card->add();
		        }
		}
		

               	
		
		$mainApply = new MainApply;
		$mainApply->getByID($detailApply->mainApplyId);
		$planid = $mainApply->id;

		//$logger ->log("{$curUser->name}(id:{$curUser->id})于".date('Y年m月d日H:i:s',time())."添加了设备定义信息(id:{$devDef->id})");
		http302('/HC/ListTrainDetailApply/'.$mainId.'/'.urlencode('分配卡成功！'));
		
		
	}
?>