<?php
function SearchMineData_noguihua($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	
	$mineName=$_POST["mineName"];
	if($mineName != null){ 
      $a = " and mine.mine_name like '%$mineName%'";}
	  
	$enterpriseName=$_POST["enterpriseName"];
	if($enterpriseName != null){ 
      $b = " and mine.enterprise_name like '%$enterpriseName%'";} 
	  
	$expertName=$_POST["expertName"];
	if($expertName != null){ 
      $c = " and expert.expert_name like '%$expertName%'";}
	  
	$expertTime=$_POST["expertTime"];
	if($expertTime != null){ 
      $d = " and expert.expert_time = '$expertTime'";}
	  
	  $e = " and expert.isshenbao = 1 ";
	  $f = " ORDER BY mine.id";
	  $sql = "SELECT mine.id as id,mine.mine_name as mineName, mine.enterprise_name as enterpriseName, 
	          mine.enterpriseproperty as enterpriseProperty, mine.minescale as mineScale,
			  expert.expert_name as experName, expert.expert_time as expertTime
			  FROM  mine,expert 
			  where mine.id = expert.mine_id  and mine.guihua = 0 ";
	  $sql .=$a; 
	  $sql .=$b; 
	  $sql .=$c; 
	  $sql .=$d; 
	  $sql .=$e; 
	  $sql .=$f; 
	 $mArray = mysql_query($sql,$db) or die(mysql_error());
	$MArray = array();
	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
		$MArray[$i][0] = $m['mineName'];
	    $MArray[$i][1] = $m['enterpriseName'];
		$MArray[$i][2] = $m['enterpriseProperty'];
		$MArray[$i][3] = $m['mineScale'];
		$MArray[$i][4] = $m['experName'];
		$MArray[$i][5] = $m['expertTime'];
		$MArray[$i][6] = $m['id'];
	}
	$smarty->assign('MArray',$MArray);
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("查看申报信息" , "minedata/SearchMineData_noguihua" , true);
	$smarty->setTitle('查看申报信息');
	$smarty->displayMother('minedata/SearchMineData_noguihua.tpl');
}
?>