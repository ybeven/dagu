<?php
function ListMineData($notice=null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);

	$ac = new AccessController;
	if(!$ac->can("查看规划项目" , $session->curUser)){
		// $QuanXian = array();
		http302("/start/index/".urlencode('您无权查看规划项目'));
		return;
	}
	if(!$ac->can("修改、审核规划项目" , $session->curUser)){
		// $QuanXian = array();
		$QuanXian = "1";
		$smarty->assign('QuanXian',$QuanXian);
		//return;
	}
		
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	$sql="SELECT mine.id as id,mine.mine_name as mineName, mine.enterprise_name as enterpriseName, mine.enterpriseproperty
	      as enterpriseProperty,mine.minescale as mineScale, audit.audit_nation_time as auditNationTime
			  FROM  mine,audit 
			  where mine.id = audit.mine_id ORDER BY mine.id";
	
	$MArray = array();
	$mArray = mysql_query($sql,$db) or die(mysql_error());
	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
		$MArray[$i][0] = $m['mineName'];
	    $MArray[$i][1] = $m['enterpriseName'];
		$MArray[$i][2] = $m['enterpriseProperty'];
		$MArray[$i][3] = $m['mineScale'];
		// $MArray[$i][4] = $m['experName'];
		$MArray[$i][5] = $m['auditNationTime'];
		$MArray[$i][6] = $m['id'];
		$MArray[$i][7] = $i;
	}
	$smarty->assign('MArray',$MArray);
	

	
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("查看规划信息" , "/minedata/ListMineData" , true);
		
	$smarty->setTitle('查询规划信息');
	$smarty->displayMother('minedata/ListMineData.tpl');
}
?>