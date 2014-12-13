<?php
function SaveLastCostJS($mrid){
        global $smarty;
	needLogin();
        $session=Session::start();
	if($mrid == null)
	{
	        ?>		     
                <script>alert('请先读卡信息!');history.back(-1);</script>;
                <?php
	   return;
	}
	
	$curUser = $session->curUser;
	$taskDate = date('Y-m-d H:i:s');
	$taskTime = date('H:i:s');
	
        $task = new Task;
        $task->getByID($mrid);
	
	$sharedId = $task->cardId;
	
	$sharetruck = new SharedTruck;
	$sql = "select * from `shared_truck` WHERE card_id='{$sharedId}'";
	$truck = $sharetruck->getArray($sql,true);
	if($sharetruck->cardState==6 ||$sharetruck->cardState==7 )
	{
		$time = new WorkTime;
                $sql = "select * from `work_time` WHERE  start_time <= '{$taskTime}%' AND over_time > '{$taskTime}%' ";
                $tasktime = $time->getArray($sql,true);
                      
		$task->finalOperateTime = $taskDate;
		$task->finalWorkId = $time->id;
	        $task->finalOperatorId = $curUser->id;
	        $task->moneyRemarks = $_POST["remarks"];
	        $task->state = "已完成";
		$task->flowWeight = $sharetruck->flowWeight;
		$task->kgRecord = $sharetruck->kgRecord;
		
		
		$task->finalWeight = $sharetruck->finalWeight;
		$task->finalStaff = $sharetruck->finalStaff;
		$task->finalTime = $sharetruck->finalTime;
		$task->emptyWeight = $sharetruck->emptyWeight;
		$task->emptyStaff = $sharetruck->emptyStaff;
		$task->emptyTime = $sharetruck->emptyTime;
		if($sharetruck->calculateMethod == 2)
		{
			$method = "重车-空车";
			$weight1 = ($truck[0]->finalWeight)-($truck[0]->emptyWeight);
			$task->realWeight = $weight1;
			$task->money = ($weight1)*($task->unitPrice);
			
		}
		if($sharetruck->calculateMethod == 1)
		{
			$method = "质量流量计";
			$task->realWeight=$sharetruck->flowWeight;
			$task->money=($truck[0]->flowWeight)*($task->unitPrice);
			
		}
		$task->money=($task->realWeight)*($task->unitPrice);
		$task->calculateMethod = $method;
	        $task->update();
	
	        $plan = new Plan;
	        $plan->getByID($task->planId);
	
	        $id = $plan->id;
	
	        $task2 = new Task;
	        $sql =  "select * from `task` WHERE plan_id ='{$id}'";
	        $task3 = $task2->getArray($sql,true);
	        $sign = 1;
	        foreach($task3 as $k)
	        {
		        if($k->state != '已完成')
		        {
			        $sign = 0;
		        }
	        }
	        if($sign == 1 && count($task3) > 0)
	        {
		        $plan->state="已完成";
	        }
	        $plan->update();
	
		$sharetruck->cardState=7;
		$sharetruck->update();
		
		mysql_connect("localhost","root","abc");
	        mysql_select_db('dagu');
		
		$sql = "DELETE  From ceshi WHERE cardId = '"+$sharedId +"'";
			mysql_query($sql);
		$ceshi = new Ceshi;
		$sql = "select * from `ceshi`";
		$ceshi2 = $ceshi->getArray($sql,true);
		$i = 1;
		foreach( $ceshi2 as $k )
		{
			$sql =  "UPDATE ceshi set id = '{$i}' WHERE cardId = '{$k->cardId}'";
			mysql_query($sql);
			$i++;
		}
	}
	else
	{
		  ?>		     
                <script>alert('此项任务还未到结算过程!');history.back(-1);</script>;
                <?php
	   return;
	}
	

	
	
	
	$task = new Task;
        $task->getByID($mrid);
	$smarty->assign('task',$task);
	$plan = new Plan;
	$plan->getByID($task->planId);
	$smarty->assign('plan',$plan);
	$method = $_POST[method];
	
	////////////////////////////////////////////////////小写变大写
	$capnum = array("零","壹","贰","叁","肆","伍","陆","柒","捌","玖");
	$capdigit = array("","拾","佰","仟");
	
	$subdata = explode(".",  $task->money);
    $yuan = $subdata[0];
    $yaun_len = strlen($yuan);
	
	if ($yaun_len > 12) {
		return "数字字串整数部分不能大于12位。";
	}

	
	$j = 0;
	$nonzero = 0;
	$cncap = '';
	if ((int)$yuan > 0) {
		for ($i = 0; $i < $yaun_len; $i++) {
			// 确定个位
			if ($i == 0) {
				$cncap .= "元";
			}
	
			//确定万位
		    if ($i == 4) {
				$j = 0;
				$nonzero = 0;
				$cncap = "万" . $cncap;
			}
	
			//确定亿位
		    if ($i == 8) {
				$j = 0;
				$nonzero = 0;
				$cncap= "亿" . $cncap;
			}
			
		    $numb = substr($yuan, -1, 1); // 截取尾数
			$cncap = ($numb) ? $capnum[$numb] . $capdigit[$j] . $cncap : (($nonzero) ? "零" . $cncap : $cncap);
			$nonzero = ($numb) ? 1 : $nonzero;
			$yuan = substr($yuan, 0, strlen($yuan) - 1); //截去尾数
			$j++;
		}
	}
	
	$cncap = preg_replace("/(零)+/", "\\1", $cncap); // 合并连续“零”

	/**
	 * 处理小数部分
	 * 
	 * 处理“00”、“？0”、“0？”、“？？”这四种情形的值
	 */
    if (isset($subdata[1])) {
    	$jiao = substr($subdata[1],0,1);
    	$fen = substr($subdata[1],1,1);
    	$jiao_val = (int)$jiao;
    	$fen_val = (int)$fen;
    	$xs = '';
    	if ($jiao_val == 0 && $fen_val == 0) {
    		$xs = '整';
    	} elseif ($jiao_val > 0 && $fen_val == 0) {
    		$xs = $capnum[$jiao_val] . '角';
    	} elseif ($jiao_val == 0 && $fen_val > 0) {
    		$xs = ((int)$yuan) ? '零' . $capnum[$fen_val] . '分' : $capnum[$fen_val] . '分';
    	} else {
    		$xs = $capnum[$jiao_val] . '角' . $capnum[$fen_val] . '分';
    	}
    }
    
    $cncap .= $xs;    
////////////////////////////////////////////////////////////////////////////////////
	
	
	
	$smarty->assign('daxie',$cncap);
	if($sharetruck->calculateMethod == 2)
        {$smarty->display('ZB/PrintCostJS.tpl');}
	elseif($sharetruck->calculateMethod == 1)
	{$smarty->display('ZB/PrintCostJS2.tpl');}
        
        //http302('/start/index/'.urlencode("缴费成功"));
    
    
}
?>
