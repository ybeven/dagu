<?php
function ChooseMineData($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	
	$ac = new AccessController;
	if(!$ac->can("规划信息管理" , $session->curUser)){
		?>		     
                     <script>alert('您无权查看规划信息!');history.back(-1);</script>;
                 <?php
                     return;
	}
	if (!$ac->can("添加规划项目" , $session->curUser)){
                     	http302("/start/index/".urlencode('您无权添加规划项目'));
                     	return;
    }
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	$sql="SELECT mine.id as id,mine.mine_name as mineName, mine.enterprise_name as enterpriseName, mine.enterpriseproperty
	      as enterpriseProperty,mine.predataTag as predataTag,mine.minedataTag as minedataTag,mine.minescale as mineScale,expert.expert_name as experName, expert.expert_time as expertTime
			  FROM  mine,expert 
			  where mine.id = expert.mine_id and expert.isshenbao = 1 and mine.guihua=0 order by mine.id";
	
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
		$MArray[$i][8] = $m['minedataTag'];
		$MArray[$i][9] = $m['predataTag'];
		$MArray[$i][6] = $m['id'];
	}
	
	$smarty->assign('MArray',$MArray);
	
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("添加规划信息" , "/minedata/ChooseMineData" , true);
		
	$smarty->setTitle('添加规划信息');
	$smarty->displayMother('minedata/ChooseMineData.tpl');
}
?>