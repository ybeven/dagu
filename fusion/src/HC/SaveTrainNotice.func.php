<?php	
	/*function unitMath($unit)
	{
		$i = 1;
		if($unit == "年")$i = 365;
		else if($unit == "月")$i=30;
		return $i;
	}*/
	function SaveTrainNotice($mainApplyId,$notice=null)
	{
		needLogin();
		$session=Session::start();
                $mainApply = new MainApply;
		$mainApply->getByID($mainApplyId);

                $detailapply= new DetailApply();
                $sql =  "select * from `detail_apply` WHERE main_apply_id='{$mainApply->id}'";
	        $detailapply2= $detailapply->getArray($sql,true);
                foreach($detailapply2 as $k)
	        {
               $card2 = new SharedTrain;
                $sql = "select * from `shared_train` WHERE detail_apply_id = '{$k->id}'";
                $cardID = $card2->getArray($sql,true);
                if(count($cardID)==1)
               {
                    
				if($card2->state>1)
                         {
?>		     
                     <script>alert('计划已经执行,无法重新配卡!');history.back(-1);</script>;
<?php
                    return;
                         }
                }
	        }
                
		
		$mainApply = new MainApply;
		$mainApply->getByID($mainApplyId);
		$mainApply->company = $_POST["company"];
		$mainApply->noticeTime = $_POST["noticeTime"];
		$mainApply->qualityrequire = $_POST["qualityrequire"];
		$mainApply->mainTrainsign = $_POST["trainsign"];
		$mainApply->noticeAnnt = $_POST["noticeAnnt"];
		$mainApply->trainAnnt = $_POST["trainAnnt"];
                $mainApply->mainTrainsign = $_POST["trainsign"];
		
		$mainApply->update();
		//$logger ->log("{$curUser->name}(id:{$curUser->id})于".date('Y年m月d日H:i:s',time())."添加了设备定义信息(id:{$devDef->id})");
		http302('/HC/ListTrainNotice/'.urlencode('添加装车通知单成功！'));
	}
?>