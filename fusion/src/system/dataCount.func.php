<?php		
function dataCount($notice=null){
	global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	if($notice!="auto")notice($notice);

$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
		mysql_select_db('greenmine',$db) or die(mysql_error($db));
		mysql_query("SET NAMES 'utf8'");
	//保存基本信息和评审信息
	$ttt = new Basedata;
	$minedata = new Provincevalue;
	$sql_1 = "select * from `provincevalue`";
	$mArray = $minedata->getArray($sql_1,true);
	$smarty->assign('mArray',$mArray);

	$minedata1 = new Provincevaluecity;
	$sql_5 = "select * from `provincevaluecity`";
	$mArray1 = $minedata1->getArray($sql_5,true);
	$smarty->assign('mArray1',$mArray1);

	$minedata2 = new Provincevaluecity;
	$sql_6 = "select * from `provincevaluecity`";
	$mArray2 = $minedata2->getArray($sql_6,true);
	foreach ($mArray2 as $r)
	{
		$cityname=$r->cityname;
		$sqlx="select count(*) from `basedata` where basedata_divisions_shi like '".$cityname."'";
		$hhh = mysql_query($sqlx,$db) or die("SQL语句执行失败"); 
		
		$m=mysql_fetch_array($hhh);
		$r[4]=$m[0];
	}
	//print_r($mArray2);
	$smarty->assign('r',$mArray2);
	

	
	$sql_2 = "select count(*) from `basedata`";
	$total = mysql_query($sql_2,$db) or die(mysql_error());
	$m=mysql_fetch_array($total);
	$totalnumber = $m[0];
	$smarty->assign('totalnumber',$totalnumber);

	$sql_3 = "select round(avg(environment_rate),2) from `environment`";
	$total1 = mysql_query($sql_3,$db) or die(mysql_error());
	$m1=mysql_fetch_array($total1);
	$environment = $m1[0];
	$smarty->assign('environment',$environment);

	$sql_4 = "select round(avg(reclamation_rate),2) from `reclamation`";
	$total2 = mysql_query($sql_4,$db) or die(mysql_error());
	$m2=mysql_fetch_array($total2);
	$landrate = $m2[0];
	$smarty->assign('landrate',$landrate);
/*	//保存联系人
	$contactmandata = new Contactman;
	$sql_2 = "select * from `contactman` WHERE mine_id = $mineid";
	$cArray = $contactmandata->getArray($sql_2,true);
	$smarty->assign('cArray',$cArray);
	//保存专家及专家意见
	$expertdata = new Expert;
	$sql_3 = "select * from `expert` WHERE mine_id = $mineid AND isshenbao = 1";
	$iArray = $expertdata->getArray($sql_3,true);
	$EArray = array();
	$j = 0;
	foreach($iArray as $i)
	{
		$EArray[$j][0] .= $i->expertName;
		$EArray[$j][1] .= $i->expertSex==0?'男':'女';
		$EArray[$j][2] .= $i->expertAge;
		$EArray[$j][3] .= $i->expertCompany;
		$EArray[$j][4] .= $i->expertTitles;
		$EArray[$j][5] .= $i->expertWork;
		$EArray[$j][6] .= $i->expertSubject;
		$EArray[$j][7] .= $i->expertCellphone;
		$EArray[$j][8] .= $i->expertLandhone;
		$EArray[$j][9] .= $i->expertEmail;
		$EArray[$j][10] .= $i->expertFax;
		$EArray[$j][11] .= $i->expertAddress;
		$EArray[$j][12] .= $i->expertIdea;
		$EArray[$j][13] .= $i->expertTime;
		$j++;
	}
	$smarty->assign('mineid',$mineid);
	$smarty->assign('EArray',$EArray);

*/


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


	$Mclass1 = new Oretype;
	$sql_6 = "select * from `oretype`";
	$mArray3 = $Mclass1->getArray($sql_6,true);
	foreach ($mArray3 as $r1)
	{
		$orename=$r1->name;
		$sqlx="select count(*) from `ore` where orename like '".$orename."' and ore_nametype like '能源矿产'";
		$hhh = mysql_query($sqlx,$db) or die("SQL语句执行失败"); 
		
		$m=mysql_fetch_array($hhh);
		$r1[50]=$m[0];
	}
	//print_r($mArray2);
	$smarty->assign('nyore2',$mArray3);

	$Mclass2 = new Oretype;
	$sql_6 = "select * from `oretype`";
	$mArray4 = $Mclass2->getArray($sql_6,true);
	foreach ($mArray4 as $r2)
	{
		$orename=$r2->name;
		$sqlx="select count(*) from `ore` where orename like '".$orename."' and ore_nametype like '金属矿产'";
		$hhh = mysql_query($sqlx,$db) or die("SQL语句执行失败"); 
		
		$m=mysql_fetch_array($hhh);
		$r2[50]=$m[0];
	}
	//print_r($mArray2);
	$smarty->assign('jsore2',$mArray4);

	$Mclass3 = new Oretype;
	$sql_6 = "select * from `oretype`";
	$mArray5 = $Mclass3->getArray($sql_6,true);
	foreach ($mArray5 as $r3)
	{
		$orename=$r3->name;
		$sqlx="select count(*) from `ore` where orename like '".$orename."' and ore_nametype like '非金属矿产'";
		$hhh = mysql_query($sqlx,$db) or die("SQL语句执行失败"); 
		
		$m=mysql_fetch_array($hhh);
		$r3[50]=$m[0];
	}
	//print_r($mArray2);
	$smarty->assign('fjsore2',$mArray5);

	$Mclass4 = new Oretype;
	$sql_6 = "select * from `oretype`";
	$mArray6 = $Mclass4->getArray($sql_6,true);
	foreach ($mArray6 as $r4)
	{
		$orename=$r4->name;
		$sqlx="select count(*) from `ore` where orename like '".$orename."' and ore_nametype like '煤种'";
		$hhh = mysql_query($sqlx,$db) or die("SQL语句执行失败"); 
		
		$m=mysql_fetch_array($hhh);
		$r4[50]=$m[0];
	}
	//print_r($mArray2);
	$smarty->assign('meiore2',$mArray6);




	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("基本数据统计" , "/system/dataCount" , true);
	
    $smarty->setTitle('基本数据统计');
    $smarty->displayMother('system/dataCount.tpl');
}
?>