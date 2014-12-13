<?php
function HCTablesearch($notice = null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$date = $_POST["date"];
	
	
	$mainApply  = new MainApply;
	$sql_1 = "select * from `main_apply` WHERE  apply_time LIKE '{$date}%' ";
        $mArray = $mainApply->getArray($sql_1,true);
	

        $MArray = array();
        $i = 0;
        foreach($mArray as $m)
        {
	        $MArray[$i][0] .= $m->id;
	        $MArray[$i][1] .= $m->applyTime;
	        $MArray[$i][2] .= $m->applyAnnt;
	
	        $detailApply = new DetailApply;
	        $sql_2="select * FROM `detail_apply` where main_apply_id = '{$m->id}'";
	        $dArray = $detailApply->getArray($sql_2,true);
	        foreach($dArray as $d)
	        {
		        $MArray[$i][3] .= "  {$d->company}  ";
	        }
	        $MArray[$i][4] .= $m->state;
	        $i++;
        }
        $smarty->assign('mainApplyArray',$MArray);
	
	
	

	
	$crumb = Crumb::getCrumb();
	$crumb->popAllLatitude();
	$crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("火车综合查询" , "" , true);
	
	
	
	
	
        $smarty->assign('date',$date);
	$smarty->assign('defArray',$taskArray);
	
	$smarty->setTitle('火车综合查询');
	$smarty->displayMother('HC/HCTable.tpl');
}
?>