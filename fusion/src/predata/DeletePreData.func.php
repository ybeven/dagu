<?php		
//function unitMath($unit){
//	$i = 1;
//	if($unit == "年")$i = 365;
//	else if($unit == "月")$i=30;
//	return $i;
//}
function DeletePreData($mineid,$notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;

	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//删除基本信息和评审信息
	$minedata = new Mine;
	$minedata->remove($mineid, false);
	//删除联系人
	$contactman = new Contactman;
	$sql_1 = "select * from contactman WHERE mine_id = $mineid";
	$cArray = $contactman->getArray($sql_1,true);
	foreach($cArray as $c)
	{
		$contactman->remove($c->id, false);
	}
	//删除专家及专家意见
	$expert =  new Expert;
	$sql_2 = "select * from `expert` WHERE mine_id = $mineid AND isshenbao = 1";
	$iArray = $expert->getArray($sql_2,true);
	foreach($iArray as $i)
	{
		$expert->remove($i->id, false);
	}
	http302('/predata/ListPreData/'.urlencode('删除成功！'));  
}
?>