<?php
function ExpertInfo($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	$ac = new AccessController;
	if(!$ac->can("专家信息管理" , $session->curUser)){
		?>		     
                     <script>alert('您无权进行专家信息管理!');history.back(-1);</script>;
                 <?php
                     return;
        }
	
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	$sql="SELECT mine.id as id,expert.expert_name as expertName, expert.expert_sex as expertSex, expert.expert_age
	      as expertAge,expert.expert_company as expertCompany,expert.expert_titles as experTitles, expert.expert_work as expertWork,
		  expert.expert_subject as expertSubject,expert.isshenbao as Flag,mine.mine_name as mineName
			  FROM  mine,expert 
			  where mine.id = expert.mine_id";
	
	$MArray = array();
	$mArray = mysql_query($sql,$db) or die(mysql_error());
	// for($i=0;$m=mysql_fetch_array($mArray);$i++)
	// {	
	// 	$MArray[$i][0] = $m['expertName'];
	//     $MArray[$i][1] = $m['expertSex'];
	// 	$MArray[$i][2] = $m['expertAge'];
	// 	$MArray[$i][3] = $m['expertCompany'];
	// 	$MArray[$i][4] = $m['experTitles'];
	// 	$MArray[$i][5] = $m['expertWork'];
	// 	$MArray[$i][6] = $m['expertSubject'];
	// 	$MArray[$i][7] = $m['mineName'];
	// 	$MArray[$i][8] = $m['Flag'];
	// 	$MArray[$i][9] = $m['id'];
	// }
	
	// $smarty->assign('MArray',$MArray);
	
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("专家信息" , "/expert/ExpertInfo" , true);
		
	$smarty->setTitle('专家信息');
	$smarty->displayMother('expert/ExpertInfo.tpl');
}
?>