<?php		
//function unitMath($unit){
//	$i = 1;
//	if($unit == "年")$i = 365;
//	else if($unit == "月")$i=30;
//	return $i;
//}
function ListPreDetails($mineid,$notice=null){
	global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
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
	  $sql = "select file_name,file_size,file_type,id,type from file where file.mine_id=$mineid";

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
	//验证车牌号是否填写
	//if($_POST[trucknumber]=='')
	//	{
	//	   http302("/ZB/AddTruckPlanZB/".urlencode("车牌号未填写，请仔细检查"));
	//	   return;
	//	}
	//else{
	//$logger = new CategoryLogger('log_definition');
    //$curUser = $session->curUser;
	
	//保存基本信息和评审信息
	$minedata = new Mine;
	$sql_1 = "select * from `mine` WHERE id = $mineid";
	$mArray = $minedata->getArray($sql_1,true);
	$smarty->assign('mArray',$mArray);
	//保存联系人
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

	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("查看申报列表" , "/predata/ListPreData" , false);
    $crumb->visitNewPage("查看申报详情" , "/predata/ListPreDetails" , true);
	
	$smarty->setTitle('查看申报详情');
    $smarty->displaymother('predata/ListPreDetails.tpl');

}
?>