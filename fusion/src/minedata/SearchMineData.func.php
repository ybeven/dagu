
<?php
function SearchMineData($tag,$notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	$ac = new AccessController;
	if(!$ac->can("项目信息查询" , $session->curUser)){
		?>		     
                     <script>alert('您无权进行项目信息查询!');history.back(-1);</script>;
                 <?php
                     return;
        }
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	//修改
	$basedataDivisionsshi=$_POST["basedataDivisionsshi"];
	if($basedataDivisionsshi != null){ 
    $a = " and basedata.basedata_divisions_shi like '%$basedataDivisionsshi%'";} 

	 $basedataDivisionsxian=$_POST["basedataDivisionsxian"];
	if($basedataDivisionsxian != null){ 
    $z = " and basedata.basedata_divisions_xian like '%$basedataDivisionsxian%'";} //修改结束

	$mineName=$_POST["mineName"];
	if($mineName != null){ 
      $b = " and mine.mine_name like '%$mineName%'";}
	  
	$basedataOwedname=$_POST["basedataOwedname"];
	if($basedataOwedname != null){ 
      $c = " and basedata.basedata_owedname like '%$basedataOwedname%'";}
	  
	$basedataAuthority=$_POST["basedataAuthority"];
	if($basedataAuthority != null){ 
      $d = " and basedata.basedata_authority like '%$basedataAuthority%'";}
	  
	$basedataAuthNum=$_POST["basedataAuthNum"];
	if($basedataAuthNum != null){ 
      $e = " and basedata.basedata_auth_num like '%$basedataAuthNum%'";}
	  
	$basedataMineralMain=$_POST["basedataMineralMain"];
	if($basedataMineralMain != null){ 
      $f = " and basedata.basedata_mineral_main like '%$basedataMineralMain%'";}
	  
	$basedataMineralAsso=$_POST["basedataMineralAsso"];
	if($basedataMineralAsso != null){ 
      $g = " and basedata.basedata_mineral_asso like '%$basedataMineralAsso%'";}
	  
	$basedataDigtype=$_POST["basedataDigtype"];
	if($basedataDigtype != null){ 
      $h = " and basedata.basedata_digtype like '%$basedataDigtype%'";}
	  
	$projectName=$_POST["projectName"];
	if($projectName != null){ 
      $i = " and project.project_name like '%$projectName%'";}
	  
	$expertName=$_POST["expertName"];
	if($expertName != null){ 
      $j = " and expert.expert_name like '%$expertName%'";}
	  
	$expertTime=$_POST["expertTime"];
	if($expertTime != null){ 
      $k = " and expert.expert_time = '$expertTime'";}
	  $l = " and expert.isshenbao = 0 ";
	  $m = " ORDER BY mine.id";
	  $sql = "SELECT mine.id as id,mine.mine_name as mineName, basedata.basedata_divisions_shi as  basedataDivisionsshi,
	          basedata.basedata_divisions_xian as  basedataDivisionsxian,basedata.basedata_owedname as basedataOwedname,basedata.basedata_authority as basedataAuthority,basedata.basedata_auth_num as basedataAuthNum, basedata.basedata_mineral_main as basedataMineralMain,basedata.basedata_mineral_asso as basedataMineralAsso,basedata.basedata_digtype as basedataDigtype,project.project_name as projectName, expert.expert_name as experName, expert.expert_time as expertTime
			      FROM  mine,basedata,project,expert 
			      where basedata.mine_id=expert.mine_id and project.mine_id=basedata.mine_id and mine.id=basedata.mine_id and mine.guihua = 1";
	  $sql .=$a; 
	  $sql .=$z;
	  $sql .=$b; 
	  $sql .=$c; 
	  $sql .=$d; 
	  $sql .=$e; 
	  $sql .=$f; 
	  $sql .=$g; 
	  $sql .=$h; 
	  $sql .=$i; 
	  $sql .=$j; 
	  $sql .=$k; 
	  $sql .=$l;
	  $sql .=$m;

    $mArray = mysql_query($sql,$db) or die(mysql_error());
	$MArray = array();

	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
		$MArray[$i][0] = $m['basedataDivisions']; //没用了
	    $MArray[$i][1] = $m['mineName'];
		$MArray[$i][2] = $m['basedataOwedname'];
		$MArray[$i][3] = $m['basedataAuthority'];
		$MArray[$i][4] = $m['basedataAuthNum'];
		$MArray[$i][5] = $m['basedataMineralMain'];
		$MArray[$i][6] = $m['basedataMineralAsso'];
		$MArray[$i][7] = $m['basedataDigtype'];
		$MArray[$i][8] = $m['projectName'];
		$MArray[$i][9] = $m['experName'];
		$MArray[$i][10] = $m['expertTime'];
		$MArray[$i][11] = $m['id'];
		$MArray[$i][12] = $m['basedataDivisionsshi'];
		$MArray[$i][13] = $m['basedataDivisionsxian'];
	}
	if ($tag==1) {
		$smarty->assign('tag',$tag);
	}
	else
	{
		$tag = 0;
		$smarty->assign('tag',$tag);
	}
	$smarty->assign('MArray',$MArray);
	
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("查询规划信息" , "/minedata/SearchMineData" , true);	
	$smarty->setTitle('查询规划信息');
	$smarty->displayMother('minedata/SearchMineData.tpl');
}
?>