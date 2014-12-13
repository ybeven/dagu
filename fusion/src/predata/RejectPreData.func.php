<?php
function RejectPreData($mineid,$notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;

	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//拒绝申报信息
	$minedata = new Mine;
	$minedata->getByID($mineid);
	$minedata->predataTag = "未通过";
	$minedata->update();
	//删除规划信息
	//删除所有原有53
	$data35 =  new Data35;
	$sql_2 = "select * from `data35` WHERE mine_id = $mineid";
	$dArray = $data35->getArray($sql_2,true);
	foreach($dArray as $d)
	{
		$data35->remove($d->id, false);
	}
	$basedata =  new Basedata;
	$sql_2 = "select * from `basedata` WHERE mine_id = $mineid";
	$dArray = $basedata->getArray($sql_2,true);
	foreach($dArray as $d)
	{
		$data35->remove($d->id, false);
		
	}
	//
	$zuobiao = new OreZuobiao;
    $sql_zuobiao = "select * from `oreZuobiao` WHERE mine_id = $mineid";
    $dArray = $zuobiao->getArray($sql_zuobiao,true);
    foreach ($dArray as $key) {
       	$zuobiao->remove($key->id, false);
    }
    //
    $ore =  new Ore;
	$sql_2 = "select * from `ore` WHERE mine_id = $mineid";
	$oArray = $ore->getArray($sql_2,true);
	foreach($oArray as $o)
	{
		$ore->remove($o->id, false);
	}
	//
	$ore35 =  new Ore35;
	$sql_2 = "select * from `ore35` WHERE mine_id = $mineid";
	$o35Array = $data35->getArray($sql_2,true);
	foreach($o35Array as $o35)
	{
		$ore35->remove($o35->id, false);
	}
	//删除原有矿种选矿回收率及53
	$orexkhs =  new OreXkhs35;
	$sql_2 = "select * from `ore_xkhs35` WHERE mine_id = $mineid";
	$oxkArray = $orexkhs->getArray($sql_2,true);
	foreach($oxkArray as $o)
	{
		$orexkhs->remove($o->id, false);
	}

		//删除原有矿种开采回采率及53
	$orekchc =  new OreKchc35;
	$sql_2 = "select * from `ore_kchc35` WHERE mine_id = $mineid";
	$okcArray = $orekchc->getArray($sql_2,true);
	foreach($okcArray as $o)
	{
		$orekchc->remove($o->id, false);
	}

	//删除原有矿种综合利用率及53
	$orezhly =  new OreZhly35;
	$sql_2 = "select * from `ore_zhly35` WHERE mine_id = $mineid";
	$ozhArray = $orezhly->getArray($sql_2,true);
	foreach($ozhArray as $o)
	{
		$orezhly->remove($o->id, false);
	}

	http302('/predata/ListPreData/'.urlencode('未通过！'));  
}
?>