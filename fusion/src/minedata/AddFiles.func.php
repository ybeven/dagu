<?php
function AddFiles($mineid,$notice=null){
global $smarty;
	needLogin();
    $session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	
	$ac = new AccessController;
	if(!$ac->can("修改、审核申报项目" , $session->curUser)){
		// $QuanXian = array();
		$QuanXian = "1";
		$smarty->assign('QuanXian',$QuanXian);
		//return;
	}
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	  $sql = "select file_name,file_size,file_type,id,file_data,type from file where file.mine_id=$mineid";

    $mArray = mysql_query($sql,$db) or die(mysql_error());
	$MArray = array();

	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
		$MArray[$i][0] = $m['file_name'];
	    $MArray[$i][1] = $m['file_size'];
		$MArray[$i][2] = $m['file_type'];
		$MArray[$i][3] = $m['id'];
		$MArray[$i][4] = mb_convert_encoding($m['file_data'],"utf8","auto");
		$MArray[$i][5] = $m['type'];
	}
	
	$smarty->assign('MArray',$MArray);
            
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("添加规划文件" , "/minedata/AddMineData/$mineid" , false);
    $crumb->visitNewPage("添加文件" , "/minedata/AddFiles" , true);
	
    $smarty->setTitle('导入规划文件');
	$smarty->assign('mineid',$mineid);
    $smarty->displaymother('minedata/AddFiles.tpl');
}
?>
