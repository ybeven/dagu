<?php
function ListPreData($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	
	$ac = new AccessController;
	if(!$ac->can("申报信息管理" , $session->curUser)){
		?>		     
                     <script>alert('您无权管理申报项目!');history.back(-1);</script>;
                 <?php

                     return;
	}
	if(!$ac->can("查看申报项目" , $session->curUser)){
		// $QuanXian = array();
		http302("/start/index/".urlencode('您无权查看申报项目'));
		return;
	}
	if(!$ac->can("修改、审核申报项目" , $session->curUser)){
		// $QuanXian = array();
		$QuanXian1 = "1";
		$smarty->assign('QuanXian1',$QuanXian1);
		//return;
	}
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	$sql="SELECT mine.id as id,mine.mine_name as mineName, mine.enterprise_name as enterpriseName, mine.enterpriseproperty
	      as enterpriseProperty,mine.predataTag as predataTag,mine.minescale as mineScale,expert.expert_name as experName, expert.expert_time as expertTime
			  FROM  mine,expert 
			  where mine.id = expert.mine_id and expert.isshenbao = 1 ORDER BY mine.id";
	
	$MArray = array();
	$mArray = mysql_query($sql,$db) or die(mysql_error());
	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
		$MArray[$i][0] = $m['mineName'];
	    $MArray[$i][1] = $m['enterpriseName'];
		$MArray[$i][2] = $m['enterpriseProperty'];
		$MArray[$i][3] = $m['mineScale'];
		$MArray[$i][4] = $m['experName'];
		$MArray[$i][5] = $m['expertTime'];
		$MArray[$i][8] = $m['predataTag'];
		$MArray[$i][6] = $m['id'];
		$MArray[$i][7] = $i;
	}
	//$i = 0;
	//foreach($mArray as $m)
	//{
		//$contactman = new Contactman;
		//$sql_2="select * FROM `contactman` where mine_id = '{$m->id}'";
		//$cArray = $contactman->getArray($sql_2,true);	
			
		//$MArray[$i][0] .= $m->mineName;
	    //$MArray[$i][1] .= $m->enterpriseName;
		//$MArray[$i][2] .= $m->enterpriseproperty;
		//$MArray[$i][3] .= $m->minescale;
		//foreach($cArray as $c)
		//{
			//$MArray[$i][4] .= $c->contactmanName;
			//$MArray[$i][5] .= $c->contactmanCellphone;
		//}
		//$MArray[$i][6] .= $m->id;
		//$i++;
	//}
	
	$smarty->assign('MArray',$MArray);
	
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("查看申报信息" , "/predata/ListPreData" , true);
		
	$smarty->setTitle('查看申报信息');
	$smarty->displayMother('predata/ListPreData.tpl');
}
?>