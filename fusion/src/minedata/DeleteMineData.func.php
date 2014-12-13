<?php		
function DeleteMineData($mineid,$notice=null){
	global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	$curUser = $session->curUser;
	//标志位设置为0
	$minedata= new Mine;
	$minedata->getByID($mineid);
	$minedata->guihua='0';
	$minedata->minedataTag = "未通过";
	$minedata->update();
	//删除所有原有53
	$data35 =  new Data35;
	$sql_2 = "select * from data35 WHERE mine_id = $mineid";
	$dArray = $data35->getArray($sql_2,true);
	foreach($dArray as $d)
	{
		$data35->remove($d->id, false);
	}
	//删除基本规划信息
	$basedata0 = new Basedata;
	$sql_basedata="select * from basedata WHERE mine_id = $mineid";
	$cArray = $basedata0->getArray($sql_basedata,true);
	foreach($cArray as $c)
	{
		$basedata0->remove($c->id, false);
	}
	
	//删除依法办矿信息
	$legal0 = new Legal;
	$sql_legal="select id from `legal` WHERE mine_id = $mineid";
	$cArray = $legal0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$legal0->remove($c->id, false);
	}	
	
	//删除规范管理信息
	$standard0 = new Standard;
	$sql_legal="select id from `standard` WHERE mine_id = $mineid";
	$cArray = $standard0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$standard0->remove($c->id, false);
	}
	
	//删除原有矿种及矿种53
	$ore =  new Ore;
	$sql_2 = "select * from `ore` WHERE mine_id = $mineid";
	$oArray = $ore->getArray($sql_2,true);
	foreach($oArray as $o)
	{
		$ore->remove($o->id, false);
	}
	$ore35 =  new Ore35;
	$sql_2 = "select * from `ore35` WHERE mine_id = $mineid";
	$o35Array = $data35->getArray($sql_2,true);
	foreach($o35Array as $o35)
	{
		$data35->remove($o35->id, false);
	}

	//删除综合利用信息
	$complex0 = new Complex;
	$sql_legal="select id from `complex` WHERE mine_id = $mineid";
	$cArray = $complex0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$complex0->remove($c->id, false);
	}
	
	//删除科技创新信息
	$science0 = new Science;
	$sql_legal="select id from `science` WHERE mine_id = $mineid";
	$cArray = $science0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$science0->remove($c->id, false);
	}

	//删除节能减排信息
	$energy0 = new Energy;
	$sql_legal="select id from `energy` WHERE mine_id = $mineid";
	$cArray = $energy0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$science0->remove($c->id, false);
	}
	
	//删除环境保护信息
	$environment0 = new Environment;
	$sql_legal="select id from `environment` WHERE mine_id = $mineid";
	$cArray = $environment0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$environment0->remove($c->id, false);
	}
	
	//删除土地复垦信息
	$reclamation0 = new Reclamation;
	$sql_legal="select id from `reclamation` WHERE mine_id = $mineid";
	$cArray = $reclamation0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$reclamation0->remove($c->id, false);
	}
	
	//删除社区和谐信息
	$community0 = new Community;
	$sql_legal="select id from `community` WHERE mine_id = $mineid";
	$cArray = $community0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$community0->remove($c->id, false);
	}

	//删除企业文化信息
	$culture0 = new Culture;
	$sql_legal="select id from `culture` WHERE mine_id = $mineid";
	$cArray = $culture0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$culture0->remove($c->id, false);
	}
	
	//删除重点工程
	$project0 = new Project;
	$sql_project="select * from `project` WHERE mine_id = $mineid";
	$pArray = $project0->getArray($sql_project,true);
	foreach($pArray as $p)
	{
		$project0->remove($p->id, false);
	}
	
	//删除审核意见信息
	$audit0 = new Audit;
	$sql_legal="select * from `audit` WHERE mine_id = $mineid";
	$cArray = $audit0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$audit0->remove($c->id, false);
	}
	
	//删除专家及专家意见
	$expert =  new Expert;
	$sql_2 = "select * from `expert` WHERE mine_id = $mineid AND isshenbao = 0";
	$iArray = $expert->getArray($sql_2,true);
	foreach($iArray as $i)
	{
		$expert->remove($i->id, false);
	}
	
	http302('/minedata/ListMineData/'.urlencode('未通过审核！'));
	}
?>