﻿
<?php
function Searchthreepersent($orename=null,$lvtype=null,$notice = null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	//查询部分
	$MClass = new Oretype;
    $sql = "select name from `oretype` where `type`='能源矿产'";
    $nyore = $MClass->getArray($sql,true);
	$sql = "select name from `oretype` where `type`='金属矿产'";
	$jsore = $MClass->getArray($sql,true);
	$sql = "select name from `oretype` where `type`='非金属矿产'";
	$fjsore = $MClass->getArray($sql,true);
	$sql = "select name from `oretype` where `type`='煤种'";
	$meiore = $MClass->getArray($sql,true);
	$smarty->assign('nyore',$nyore);
	$smarty->assign('jsore',$jsore);   
	$smarty->assign('fjsore',$fjsore);
	$smarty->assign('meiore',$meiore);
	if($_POST['orename']!=null)
	{
	$orename=$_POST['orename'];
	$lvtype=$_POST["lvtype"];
	}
	else
	{
	$orename = urldecode($orename);
	$lvtype = urldecode($lvtype);
	}	
	if($lvtype=="开采回采率") { $biaotoubiao="orestandardname_kchc";   $neirongbiao = "orestandard_kchc"; $smarty->assign('lvtype',$lvtype);$smarty->assign('orename',$orename); }
	if($lvtype=="选矿回收率") { $biaotoubiao="orestandardname_xkhs";   $neirongbiao = "orestandard_xkhs"; $smarty->assign('lvtype',$lvtype);$smarty->assign('orename',$orename); }
	if($lvtype=="综合利用率") { $biaotoubiao="orestandardname_zhly";  $neirongbiao = "orestandard_zhly"; $smarty->assign('lvtype',$lvtype);$smarty->assign('orename',$orename); }

	$sql = "SELECT kuangzhong,subclass_name1,subclass_name2,subclass_name3,subclass_name4,subclass_name5,subclass_name6
			 FROM `{$biaotoubiao}` WHERE kuangzhong = '{$orename}' ";
    $mArray = mysql_query($sql,$db) or die(mysql_error());	
	$biaotouArray=mysql_fetch_row($mArray);

	$smarty->assign('biaotouArray',$biaotouArray);
	
	$sql1 = "SELECT id,subclass1,subclass2,subclass3,subclass4,subclass5,subclass6,standardvalues
			 FROM `{$neirongbiao}` WHERE kuangzhong = '{$orename}' ";
    $mArray = mysql_query($sql1,$db) or die(mysql_error());
	$neirongArray = array();
	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
	
		$neirongArray[$i][0] = $m['id'];
	    $neirongArray[$i][1] = $m['subclass1'];
		$neirongArray[$i][2] = $m['subclass2'];
		$neirongArray[$i][3] = $m['subclass3'];
		$neirongArray[$i][4] = $m['subclass4'];
		$neirongArray[$i][5] = $m['subclass5'];
		$neirongArray[$i][6] = $m['subclass6'];
		$neirongArray[$i][7] = $m['standardvalues'];
	}
	$smarty->assign('neirongArray',$neirongArray);
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("三率标准" , "/system/List" , true);	
	$smarty->setTitle('三率标准');
	$smarty->displayMother('system/List.tpl');
}
?>