<?php
function PassPreData($mineid,$notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;

	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//删除基本信息和评审信息
	$minedata = new Mine;
	$minedata->getByID($mineid);
	$minedata->predataTag = "通过";
	$minedata->update();
	http302('/predata/ListPreData/'.urlencode('通过！'));  
}
?>