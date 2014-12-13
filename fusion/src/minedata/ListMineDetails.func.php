<?php		
function ListMineDetails($mineid,$notice=null){
	global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	if($notice!="auto")notice($notice);

	$ac = new AccessController;
	if(!$ac->can("修改、审核规划项目" , $session->curUser)){
		// $QuanXian = array();
		$QuanXian = "1";
		$smarty->assign('QuanXian',$QuanXian);
		//return;
	}
	if(!$ac->can("添加规划项目" , $session->curUser)){
		// $QuanXian = array();
		$QuanXian1 = "1";
		$smarty->assign('QuanXian1',$QuanXian1);
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

	$mine = new mine;
	$sql_mine = "select * from `mine` WHERE id = $mineid";
	$mineArray = $mine->getArray($sql_mine,true);
	$smarty->assign('mineArray',$mineArray);

	//保存基本规划信息
	$basedata = new Basedata;
	$sql_basedata = "select * from `basedata` WHERE mine_id = $mineid";
	$basedataArray = $basedata->getArray($sql_basedata,true);
	$smarty->assign('basedataArray',$basedataArray);

	$basedata35Array = array();
	$basedata35 = new Data35;
	$sql_basedata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'basedataDigreturnrate'";
	$bArray = $basedata35->getArray($sql_basedata35,true);
	foreach($bArray as $b){
		$basedata35Array[0][0].=$b->data35P3;
		$basedata35Array[0][1].=$b->data35P2;
		$basedata35Array[0][2].=$b->data35P1;
		$basedata35Array[0][3].=$b->data35Aj1;
		$basedata35Array[0][4].=$b->data35As1;
		$basedata35Array[0][5].=$b->data35Aj2;
		$basedata35Array[0][6].=$b->data35As2;
		$basedata35Array[0][7].=$b->data35Aj3;
		$basedata35Array[0][8].=$b->data35As3;
		$basedata35Array[0][9].=$b->data35Aj4;
		$basedata35Array[0][10].=$b->data35As4;
		$basedata35Array[0][11].=$b->data35Aj5;
		$basedata35Array[0][12].=$b->data35As5;
	}
	
	$basedata35 = new Data35;
	$sql_basedata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'basedataProduceScale'";
		$bArray = $basedata35->getArray($sql_basedata35,true);
	foreach($bArray as $b){
		$basedata35Array[2][0].=$b->data35P3;
		$basedata35Array[2][1].=$b->data35P2;
		$basedata35Array[2][2].=$b->data35P1;
		$basedata35Array[2][3].=$b->data35Aj1;
		$basedata35Array[2][4].=$b->data35As1;
		$basedata35Array[2][5].=$b->data35Aj2;
		$basedata35Array[2][6].=$b->data35As2;
		$basedata35Array[2][7].=$b->data35Aj3;
		$basedata35Array[2][8].=$b->data35As3;
		$basedata35Array[2][9].=$b->data35Aj4;
		$basedata35Array[2][10].=$b->data35As4;
		$basedata35Array[2][11].=$b->data35Aj5;
		$basedata35Array[2][12].=$b->data35As5;
	}
	
	$basedata35 = new Data35;
	$sql_basedata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'basedataSepareturnrate'";
		$bArray = $basedata35->getArray($sql_basedata35,true);
	foreach($bArray as $b){
		$basedata35Array[1][0].=$b->data35P3;
		$basedata35Array[1][1].=$b->data35P2;
		$basedata35Array[1][2].=$b->data35P1;
		$basedata35Array[1][3].=$b->data35Aj1;
		$basedata35Array[1][4].=$b->data35As1;
		$basedata35Array[1][5].=$b->data35Aj2;
		$basedata35Array[1][6].=$b->data35As2;
		$basedata35Array[1][7].=$b->data35Aj3;
		$basedata35Array[1][8].=$b->data35As3;
		$basedata35Array[1][9].=$b->data35Aj4;
		$basedata35Array[1][10].=$b->data35As4;
		$basedata35Array[1][11].=$b->data35Aj5;
		$basedata35Array[1][12].=$b->data35As5;
	}
	
	$basedata35 = new Data35;
	$sql_basedata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'basedataValue'";
		$bArray = $basedata35->getArray($sql_basedata35,true);
	foreach($bArray as $b){
		$basedata35Array[3][0].=$b->data35P3;
		$basedata35Array[3][1].=$b->data35P2;
		$basedata35Array[3][2].=$b->data35P1;
		$basedata35Array[3][3].=$b->data35Aj1;
		$basedata35Array[3][4].=$b->data35As1;
		$basedata35Array[3][5].=$b->data35Aj2;
		$basedata35Array[3][6].=$b->data35As2;
		$basedata35Array[3][7].=$b->data35Aj3;
		$basedata35Array[3][8].=$b->data35As3;
		$basedata35Array[3][9].=$b->data35Aj4;
		$basedata35Array[3][10].=$b->data35As4;
		$basedata35Array[3][11].=$b->data35Aj5;
		$basedata35Array[3][12].=$b->data35As5;
	}
	
	$basedata35 = new Data35;
	$sql_basedata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'basedataFee'";
		$bArray = $basedata35->getArray($sql_basedata35,true);
	foreach($bArray as $b){
		$basedata35Array[4][0].=$b->data35P3;
		$basedata35Array[4][1].=$b->data35P2;
		$basedata35Array[4][2].=$b->data35P1;
		$basedata35Array[4][3].=$b->data35Aj1;
		$basedata35Array[4][4].=$b->data35As1;
		$basedata35Array[4][5].=$b->data35Aj2;
		$basedata35Array[4][6].=$b->data35As2;
		$basedata35Array[4][7].=$b->data35Aj3;
		$basedata35Array[4][8].=$b->data35As3;
		$basedata35Array[4][9].=$b->data35Aj4;
		$basedata35Array[4][10].=$b->data35As4;
		$basedata35Array[4][11].=$b->data35Aj5;
		$basedata35Array[4][12].=$b->data35As5;
	}
	
	$basedata35 = new Data35;
	$sql_basedata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'basedataProfit'";
	$bArray = $basedata35->getArray($sql_basedata35,true);
	foreach($bArray as $b){
		$basedata35Array[5][0].=$b->data35P3;
		$basedata35Array[5][1].=$b->data35P2;
		$basedata35Array[5][2].=$b->data35P1;
		$basedata35Array[5][3].=$b->data35Aj1;
		$basedata35Array[5][4].=$b->data35As1;
		$basedata35Array[5][5].=$b->data35Aj2;
		$basedata35Array[5][6].=$b->data35As2;
		$basedata35Array[5][7].=$b->data35Aj3;
		$basedata35Array[5][8].=$b->data35As3;
		$basedata35Array[5][9].=$b->data35Aj4;
		$basedata35Array[5][10].=$b->data35As4;
		$basedata35Array[5][11].=$b->data35Aj5;
		$basedata35Array[5][12].=$b->data35As5;
	}
	$smarty->assign('basedata35Array',$basedata35Array);	
	
    //依法办矿
	$legaldata=new Legal;
	$sql_legaldata = "select * from `legal` WHERE mine_id = $mineid";
	$legaldataArray = $legaldata->getArray($sql_legaldata,true);
	$legal1Ischeck=$legaldataArray[0]->legal1Ischeck;
	$smarty->assign('legaldataArray',$legaldataArray);	
	$smarty->assign('legal1Ischeck',$legal1Ischeck);	
	
    //规范管理
    
	$standarddata=new Standard;
	$sql_standarddata = "select * from `standard` WHERE mine_id = $mineid";
	$standarddataArray = $standarddata->getArray($sql_standarddata,true);
	$smarty->assign('standarddataArray',$standarddataArray);
	
	$standarddata35Array = array();
	$standarddata35 = new Data35;
	$sql_standarddata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'standardWorkerCount'";
	$stArray = $standarddata35->getArray($sql_standarddata35,true);
	foreach($stArray as $st){
		$standarddata35Array[0][0].=$st->data35P3;
		$standarddata35Array[0][1].=$st->data35P2;
		$standarddata35Array[0][2].=$st->data35P1;
		$standarddata35Array[0][3].=$st->data35Aj1;
		$standarddata35Array[0][4].=$st->data35As1;
		$standarddata35Array[0][5].=$st->data35Aj2;
		$standarddata35Array[0][6].=$st->data35As2;
		$standarddata35Array[0][7].=$st->data35Aj3;
		$standarddata35Array[0][8].=$st->data35As3;
		$standarddata35Array[0][9].=$st->data35Aj4;
		$standarddata35Array[0][10].=$st->data35As4;
		$standarddata35Array[0][11].=$st->data35Aj5;
		$standarddata35Array[0][12].=$st->data35As5;
	}
	
	$standarddata35 = new Data35;
	$sql_standarddata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'standardWorkerCost'";
	$stArray = $standarddata35->getArray($sql_standarddata35,true);
	foreach($stArray as $st){
		$standarddata35Array[1][0].=$st->data35P3;
		$standarddata35Array[1][1].=$st->data35P2;
		$standarddata35Array[1][2].=$st->data35P1;
		$standarddata35Array[1][3].=$st->data35Aj1;
		$standarddata35Array[1][4].=$st->data35As1;
		$standarddata35Array[1][5].=$st->data35Aj2;
		$standarddata35Array[1][6].=$st->data35As2;
		$standarddata35Array[1][7].=$st->data35Aj3;
		$standarddata35Array[1][8].=$st->data35As3;
		$standarddata35Array[1][9].=$st->data35Aj4;
		$standarddata35Array[1][10].=$st->data35As4;
		$standarddata35Array[1][11].=$st->data35Aj5;
		$standarddata35Array[1][12].=$st->data35As5;
	}
	$smarty->assign('standarddata35Array',$standarddata35Array);
	
	//矿种信息
	//开采回采率信息
	$kchc=new OreKchc35;
	$sql_kchc="select * from `ore_kchc35` where mine_id = $mineid";
	$kchcArray = $kchc->getArray($sql_kchc,true);//把开采回采率表中属于这个矿山的记录全部取出
	$kchcdataArray = array();
	$j=0;
	foreach($kchcArray as $k)//用循环将开采回采率标准值表中的分类数据分别取出并赋值到对应的开采回采率表记录中
	{
		$kchcstand=new OrestandardKchc;
		$kchcstandsql="select * from `orestandard_kchc` where id = '{$k->standardId}'";
		$kchcstandArray = $kchcstand->getArray($kchcstandsql,true);
		
		// $kchcstandname=new OrestandardnameKchc;
		// $kchcstandnamesql="select * from `orestandardname_kchc` where kuangzhong = '{$kchcstandArray[0]->kuangzhong}'";
		// $kchcstandnameArray = $kchcstandname->getArray($kchcstandnamesql,true);

		// //从子类一到子类六的名字
		// $kchcdataArray[$j][101]= $kchcstandnameArray[0]->subclassName1;
		// $kchcdataArray[$j][102]= $kchcstandnameArray[0]->subclassName2;
		// $kchcdataArray[$j][103]= $kchcstandnameArray[0]->subclassName3;
		// $kchcdataArray[$j][104]= $kchcstandnameArray[0]->subclassName4;
		// $kchcdataArray[$j][105]= $kchcstandnameArray[0]->subclassName5;
		// $kchcdataArray[$j][106]= $kchcstandnameArray[0]->subclassName6;//
		
		$kchcdataArray[$j][0]= $k->oreId;
		$kchcdataArray[$j][1]= $kchcstandArray[0]->subclass1;
		$kchcdataArray[$j][2]= $kchcstandArray[0]->subclass2;
		$kchcdataArray[$j][3]= $kchcstandArray[0]->subclass3;
		$kchcdataArray[$j][4]= $kchcstandArray[0]->subclass4;
		$kchcdataArray[$j][5]= $kchcstandArray[0]->subclass5;
		$kchcdataArray[$j][6]= $kchcstandArray[0]->subclass6;
		$kchcdataArray[$j][23]= $kchcstandArray[0]->standardvalues;
		$kchcdataArray[$j][7]= $k->value;
		$kchcdataArray[$j][8]= $k->oreGobackDig;
		$kchcdataArray[$j][9]= $k->oreGobackUse;
		$kchcdataArray[$j][10]= $k->data35P3;
		$kchcdataArray[$j][11]= $k->data35P2;
		$kchcdataArray[$j][12]= $k->data35P1;
		$kchcdataArray[$j][13]= $k->data35Aj1;
		$kchcdataArray[$j][14]= $k->data35Aj2;
		$kchcdataArray[$j][15]= $k->data35Aj3;
		$kchcdataArray[$j][16]= $k->data35Aj4;
		$kchcdataArray[$j][17]= $k->data35Aj5;
		$kchcdataArray[$j][18]= $k->data35As1;
		$kchcdataArray[$j][19]= $k->data35As2;
		$kchcdataArray[$j][20]= $k->data35As3;
		$kchcdataArray[$j][21]= $k->data35As4;
		$kchcdataArray[$j][22]= $k->data35As5;
		
		
		$kchcdataArray[$j][30]=$k->id;
		$j++;
	}
	$whatiskc= Array();
	for($kk=0;$kk<$j;$kk++)
	{
		$whatiskc[$kk]=$kk;
		}
	$smarty->assign('whatiskc',$whatiskc);
	$smarty->assign('kchcdataArray',$kchcdataArray);	
	$smarty->assign('flag_k',$j);
	

	//选矿回收率率信息
	$xkhs=new OreXkhs35;
	$sql_xkhs="select * from `ore_xkhs35` where mine_id = $mineid";
	$xkhsArray = $xkhs->getArray($sql_xkhs,true);
	$xkhsdataArray = array();
	$j=0;
	foreach($xkhsArray as $l)
	{
		$xkhsstand=new OrestandardXkhs;
		$xkhsstandsql="select * from `orestandard_xkhs` where id = '{$l->standardId}'";
		$xkhsstandArray = $xkhsstand->getArray($xkhsstandsql,true);
		
		// $xkhsstandname=new OrestandardnameXkhs;
		// $xkhsstandnamesql="select * from `orestandardname_xkhs` where kuangzhong = '{$xkhsstandArray[0]->kuangzhong}'";
		// $xkhsstandnameArray = $xkhsstandname->getArray($xkhsstandnamesql,true);

		// //从子类一到子类六的名字
		// $xkhsdataArray[$j][101]= $xkhsstandnameArray[0]->subclassName1;
		// $xkhsdataArray[$j][102]= $xkhsstandnameArray[0]->subclassName2;
		// $xkhsdataArray[$j][103]= $xkhsstandnameArray[0]->subclassName3;
		// $xkhsdataArray[$j][104]= $xkhsstandnameArray[0]->subclassName4;
		// $xkhsdataArray[$j][105]= $xkhsstandnameArray[0]->subclassName5;
		// $xkhsdataArray[$j][106]= $xkhsstandnameArray[0]->subclassName6;//

		$xkhsdataArray[$j][0]= $l->oreId;
		$xkhsdataArray[$j][1]= $xkhsstandArray[0]->subclass1;
		$xkhsdataArray[$j][2]= $xkhsstandArray[0]->subclass2;
		$xkhsdataArray[$j][3]= $xkhsstandArray[0]->subclass3;
		$xkhsdataArray[$j][4]= $xkhsstandArray[0]->subclass4;
		$xkhsdataArray[$j][5]= $xkhsstandArray[0]->subclass5;
		$xkhsdataArray[$j][6]= $xkhsstandArray[0]->subclass6;
		$xkhsdataArray[$j][23]= $xkhsstandArray[0]->standardvalues;
		$xkhsdataArray[$j][7]= $l->value;
		$xkhsdataArray[$j][8]= $l->orepinweiYuan;
		$xkhsdataArray[$j][9]= $l->orechanlv;
		$xkhsdataArray[$j][25]= $l->orezufenYuan;
		$xkhsdataArray[$j][26]= $l->orepinweiJing;
		$xkhsdataArray[$j][27]= $l->orezufenJing;
		$xkhsdataArray[$j][10]= $l->data35P3;
		$xkhsdataArray[$j][11]= $l->data35P2;
		$xkhsdataArray[$j][12]= $l->data35P1;
		$xkhsdataArray[$j][13]= $l->data35Aj1;
		$xkhsdataArray[$j][14]= $l->data35Aj2;
		$xkhsdataArray[$j][15]= $l->data35Aj3;
		$xkhsdataArray[$j][16]= $l->data35Aj4;
		$xkhsdataArray[$j][17]= $l->data35Aj5;
		$xkhsdataArray[$j][18]= $l->data35As1;
		$xkhsdataArray[$j][19]= $l->data35As2;
		$xkhsdataArray[$j][20]= $l->data35As3;
		$xkhsdataArray[$j][21]= $l->data35As4;
		$xkhsdataArray[$j][22]= $l->data35As5;
		
		
		$xkhsdataArray[$j][30]=$l->id;
		$j++;
	}
	$whatisxk= Array();
	for($ll=0;$ll<$j;$ll++)
	{
		$whatisxk[$ll]=$ll;
		}
	$smarty->assign('whatisxk',$whatisxk);
	$smarty->assign('xkhsdataArray',$xkhsdataArray);
	$smarty->assign('flag_l',$j);
	//综合利用率信息
	$zhly=new OreZhly35;
	$sql_zhly="select * from `ore_zhly35` where mine_id = $mineid";
	$zhlyArray = $zhly->getArray($sql_zhly,true);
	$zhlydataArray = array();
	$j=0;
	foreach($zhlyArray as $y)
	{
		$zhlystand = new OrestandardZhly;
		$sql_zhlystand = "select * from orestandard_zhly where id='{$y->standardId}'";
		$zhlystandArray = $zhlystand->getArray($sql_zhlystand,true);

		// $zhlystandname=new OrestandardnameZhly;
		// $zhlystandnamesql="select * from `orestandardname_zhly` where kuangzhong = '{$zhlystandArray[0]->kuangzhong}'";
		// $zhlystandnameArray = $zhlystandname->getArray($zhlystandnamesql,true);

		// //从子类一到子类六的名字
		// $zhlydataArray[$j][101]= $zhlystandnameArray[0]->subclassName1;
		// $zhlydataArray[$j][102]= $zhlystandnameArray[0]->subclassName2;
		// $zhlydataArray[$j][103]= $zhlystandnameArray[0]->subclassName3;
		// $zhlydataArray[$j][104]= $zhlystandnameArray[0]->subclassName4;
		// $zhlydataArray[$j][105]= $zhlystandnameArray[0]->subclassName5;
		// $zhlydataArray[$j][106]= $zhlystandnameArray[0]->subclassName6;//
		
		$zhlydataArray[$j][0]= $y->oreId;
		$zhlydataArray[$j][1]= $zhlystandArray[0]->subclass1;
		$zhlydataArray[$j][2]= $zhlystandArray[0]->subclass2;
		$zhlydataArray[$j][3]= $zhlystandArray[0]->subclass3;
		$zhlydataArray[$j][4]= $zhlystandArray[0]->subclass4;
		$zhlydataArray[$j][5]= $zhlystandArray[0]->subclass5;
		$zhlydataArray[$j][6]= $zhlystandArray[0]->subclass6;
		$zhlydataArray[$j][23]= $zhlystandArray[0]->standardvalues;
		$zhlydataArray[$j][7]= $y->value;
		$zhlydataArray[$j][8]= $y->complexUserateUsequality;
		$zhlydataArray[$j][9]= $y->complexUserateSavequality;
		$zhlydataArray[$j][25]= $y->complexUserateGoback;
		$zhlydataArray[$j][26]= $y->complexUserateFindback;
		$zhlydataArray[$j][27]= $y->complexUserateTaste;
		$zhlydataArray[$j][10]= $y->data35P1;
		$zhlydataArray[$j][11]= $y->data35P2;
		$zhlydataArray[$j][12]= $y->data35P3;
		$zhlydataArray[$j][13]= $y->data35Aj3;
		$zhlydataArray[$j][14]= $y->data35Aj2;
		$zhlydataArray[$j][15]= $y->data35Aj1;
		$zhlydataArray[$j][16]= $y->data35Aj4;
		$zhlydataArray[$j][17]= $y->data35Aj5;
		$zhlydataArray[$j][18]= $y->data35As1;
		$zhlydataArray[$j][19]= $y->data35As2;
		$zhlydataArray[$j][20]= $y->data35As3;
		$zhlydataArray[$j][21]= $y->data35As4;
		$zhlydataArray[$j][22]= $y->data35As5;
		
		
		$zhlydataArray[$j][30]=$y->id;
		$j++;
	}
	$whatiszh= Array();
	for($yy=0;$yy<$j;$yy++)
	{
		$whatiszh[$yy]=$yy;
		}
	$smarty->assign('whatiszh',$whatiszh);
	$smarty->assign('zhlydataArray',$zhlydataArray);	
	$smarty->assign('flag_y',$j);
	
	//坐标信息
	$zuobiao=new OreZuobiao;
	$sql_zuobiao = "select * from `oreZuobiao` WHERE mine_id = $mineid";
	$zuobiaoArray = $zuobiao->getArray($sql_zuobiao,true);
	$minezuobiaoArray = array();
	$j=0;
	foreach ($zuobiaoArray as $key) {
		$minezuobiaoArray[$j][0].=$key->jingdu;
		$minezuobiaoArray[$j][1].=$key->weidu;
		$j++;
	}
	$smarty->assign('minezuobiaoArray',$minezuobiaoArray);
	//矿种其他信息
	$oredata=new Ore;
	$sql_oredata = "select * from `ore` WHERE mine_id = $mineid";
	$oredataArray = $oredata->getArray($sql_oredata,true);
	$oredataand35Array = array();
	$j = 0;
	foreach($oredataArray as $o)
	{
		$oredataand35Array[$j][100].=$o->id;
		$oredataand35Array[$j][0].=$o->orename;
		// $oredataand35Array[$j][200].=$o->orename;
		// $oredataand35Array[$j][201].=$o->orename;


		$kchcstandname=new OrestandardnameKchc;
		$kchcstandnamesql="select * from `orestandardname_kchc` where kuangzhong = '{$o->orename}'";
		$kchcstandnameArray = $kchcstandname->getArray($kchcstandnamesql,true);

		//从子类一到子类六的名字
		$oredataand35Array[$j][101]= $kchcstandnameArray[0]->subclassName1;
		$oredataand35Array[$j][102]= $kchcstandnameArray[0]->subclassName2;
		$oredataand35Array[$j][103]= $kchcstandnameArray[0]->subclassName3;
		$oredataand35Array[$j][104]= $kchcstandnameArray[0]->subclassName4;
		$oredataand35Array[$j][105]= $kchcstandnameArray[0]->subclassName5;
		$oredataand35Array[$j][106]= $kchcstandnameArray[0]->subclassName6;//

		$xkhsstandname=new OrestandardnameXkhs;
		$xkhsstandnamesql="select * from `orestandardname_xkhs` where kuangzhong = '{$o->orename}'";
		$xkhsstandnameArray = $xkhsstandname->getArray($xkhsstandnamesql,true);

		//从子类一到子类六的名字
		$oredataand35Array[$j][107]= $xkhsstandnameArray[0]->subclassName1;
		$oredataand35Array[$j][108]= $xkhsstandnameArray[0]->subclassName2;
		$oredataand35Array[$j][109]= $xkhsstandnameArray[0]->subclassName3;
		$oredataand35Array[$j][110]= $xkhsstandnameArray[0]->subclassName4;
		$oredataand35Array[$j][111]= $xkhsstandnameArray[0]->subclassName5;
		$oredataand35Array[$j][112]= $xkhsstandnameArray[0]->subclassName6;//

		$zhlystandname=new OrestandardnameZhly;
		$zhlystandnamesql="select * from `orestandardname_zhly` where kuangzhong = '{$o->orename}'";
		$zhlystandnameArray = $zhlystandname->getArray($zhlystandnamesql,true);

		//从子类一到子类六的名字
		$oredataand35Array[$j][113]= $zhlystandnameArray[0]->subclassName1;
		$oredataand35Array[$j][114]= $zhlystandnameArray[0]->subclassName2;
		$oredataand35Array[$j][115]= $zhlystandnameArray[0]->subclassName3;
		$oredataand35Array[$j][116]= $zhlystandnameArray[0]->subclassName4;
		$oredataand35Array[$j][117]= $zhlystandnameArray[0]->subclassName5;
		$oredataand35Array[$j][118]= $zhlystandnameArray[0]->subclassName6;//


		$oredataand35Array[$j][1].=$o->oretype;
/*  		$oredataand35Array[$j][2].=$o->orehuishou;
		$oredataand35Array[$j][3].=$o->orepinweiYuan;
		$oredataand35Array[$j][4].=$o->orepinweiJing;
		$oredataand35Array[$j][5].=$o->orechanlv;
		$oredataand35Array[$j][6].=$o->orezufenJing;
		$oredataand35Array[$j][7].=$o->orezufenYuan;
		 */
		$oredataand35Array[$j][21].=$o->oreNametype;
		$oredataand35Array[$j][22].=$j;
/* 		$oredataand35Array[$j][23].=$o->oreGoback;
		$oredataand35Array[$j][24].=$o->oreGobackDig;
		$oredataand35Array[$j][25].=$o->oreGobackUse; */
		
		//添加矿种详情
		//保有储量是oreleveleh--->39
		//可采储量是orelevela--->40
		$oredataand35Array[$j][35].=$o->oreLevelh;
		$oredataand35Array[$j][38].=$o->oreLevela;
		$oredataand35Array[$j][34].=$o->oreLevelhType;
		$oredataand35Array[$j][36].=$o->oreLevelhUnit;
		$oredataand35Array[$j][37].=$o->oreLevelaType;
		$oredataand35Array[$j][39].=$o->oreLevelaUnit;



		$oredataand35Array[$j][41].=$o->oreLevelh111;
		$oredataand35Array[$j][42].=$o->oreLevelh121122;
		$oredataand35Array[$j][43].=$o->oreLevelh111b;
		$oredataand35Array[$j][44].=$o->oreLevelh121b;
		$oredataand35Array[$j][45].=$o->oreLevelh122b;
		$oredataand35Array[$j][46].=$o->oreLevelh2m111;
		$oredataand35Array[$j][47].=$o->oreLevelh2m21;
		$oredataand35Array[$j][48].=$o->oreLevelh2m22;
		$oredataand35Array[$j][49].=$o->oreLevelh2s11;
		$oredataand35Array[$j][50].=$o->oreLevelh2s21;
		$oredataand35Array[$j][51].=$o->oreLevelh2s22;
		$oredataand35Array[$j][52].=$o->oreLevelh331;
		$oredataand35Array[$j][53].=$o->oreLevelh332;
		$oredataand35Array[$j][54].=$o->oreLevelh333;
		$oredataand35Array[$j][55].=$o->oreLevelh334;

		$oredataand35Array[$j][56].=$o->oreLevela111;
		$oredataand35Array[$j][57].=$o->oreLevela121122;
		$oredataand35Array[$j][58].=$o->oreLevela111b;
		$oredataand35Array[$j][59].=$o->oreLevela121b;
		$oredataand35Array[$j][60].=$o->oreLevela122b;
		$oredataand35Array[$j][61].=$o->oreLevela2m11;
		$oredataand35Array[$j][62].=$o->oreLevela2m21;
		$oredataand35Array[$j][63].=$o->oreLevela2m22;
		$oredataand35Array[$j][64].=$o->oreLevela2s11;
		$oredataand35Array[$j][65].=$o->oreLevela2s21;
		$oredataand35Array[$j][66].=$o->oreLevela2s22;
		$oredataand35Array[$j][67].=$o->oreLevela331;
		$oredataand35Array[$j][68].=$o->oreLevela332;
		$oredataand35Array[$j][69].=$o->oreLevela333;	
		$oredataand35Array[$j][70].=$o->oreLevela334;
		
		$oredataand35Array[$j][71].=$o->oremei; //煤种
//主矿种：开采回采率 煤的采区回采率也用这个 

		$oredataand35Array[$j][119].=$o->kaicaihuicai;
		$oredataand35Array[$j][120].=$o->kaicaihuicai3qiansj;
		$oredataand35Array[$j][121].=$o->kaicaihuicai2qiansj;
		$oredataand35Array[$j][122].=$o->kaicaihuicai1qiansj;
		$oredataand35Array[$j][123].=$o->kaicaihuicai1housj;
		$oredataand35Array[$j][124].=$o->kaicaihuicai2housj;
		$oredataand35Array[$j][125].=$o->kaicaihuicai3housj;
		$oredataand35Array[$j][126].=$o->kaicaihuicai4housj;
		$oredataand35Array[$j][127].=$o->kaicaihuicai5housj;
		$oredataand35Array[$j][128].=$o->kaicaihuicai1houjh;
		$oredataand35Array[$j][129].=$o->kaicaihuicai2houjh;
		$oredataand35Array[$j][130].=$o->kaicaihuicai3houjh;
		$oredataand35Array[$j][131].=$o->kaicaihuicai4houjh;
        $oredataand35Array[$j][132].=$o->kaicaihuicai5houjh;
 
//主矿种: 选矿回收率 煤的原煤入选率也用这个 
        $oredataand35Array[$j][133].=$o->xkhs;
		$oredataand35Array[$j][134].=$o->xkhs3qiansj;
		$oredataand35Array[$j][135].=$o->xkhs2qiansj;
		$oredataand35Array[$j][136].=$o->xkhs1qiansj;
		$oredataand35Array[$j][137].=$o->xkhs1housj;
		$oredataand35Array[$j][138].=$o->xkhs2housj;
		$oredataand35Array[$j][139].=$o->xkhs3housj;
		$oredataand35Array[$j][140].=$o->xkhs4housj;
		$oredataand35Array[$j][141].=$o->xkhs5housj;
		$oredataand35Array[$j][142].=$o->xkhs1houjh;
		$oredataand35Array[$j][143].=$o->xkhs2houjh;
		$oredataand35Array[$j][144].=$o->xkhs3houjh;
		$oredataand35Array[$j][145].=$o->xkhs4houjh;
        $oredataand35Array[$j][146].=$o->xkhs5houjh;
//采选综合率
        $oredataand35Array[$j][147].=$o->caixuanzh;
		$oredataand35Array[$j][148].=$o->caixuanzh3qiansj;
		$oredataand35Array[$j][149].=$o->caixuanzh2qiansj;
		$oredataand35Array[$j][150].=$o->caixuanzh1qiansj;
		$oredataand35Array[$j][151].=$o->caixuanzh1housj;
		$oredataand35Array[$j][152].=$o->caixuanzh2housj;
		$oredataand35Array[$j][153].=$o->caixuanzh3housj;
		$oredataand35Array[$j][154].=$o->caixuanzh4housj;
		$oredataand35Array[$j][155].=$o->caixuanzh5housj;
		$oredataand35Array[$j][156].=$o->caixuanzh1houjh;
		$oredataand35Array[$j][157].=$o->caixuanzh2houjh;
		$oredataand35Array[$j][158].=$o->caixuanzh3houjh;
		$oredataand35Array[$j][159].=$o->caixuanzh4houjh;
        $oredataand35Array[$j][160].=$o->caixuanzh5houjh;
//综合利用率
        $oredataand35Array[$j][161].=$o->zhly;
		$oredataand35Array[$j][162].=$o->zhly3qiansj;
		$oredataand35Array[$j][163].=$o->zhly2qiansj;
		$oredataand35Array[$j][164].=$o->zhly1qiansj;
		$oredataand35Array[$j][165].=$o->zhly1housj;
		$oredataand35Array[$j][166].=$o->zhly2housj;
		$oredataand35Array[$j][167].=$o->zhly3housj;
		$oredataand35Array[$j][168].=$o->zhly4housj;
		$oredataand35Array[$j][169].=$o->zhly5housj;
		$oredataand35Array[$j][170].=$o->zhly1houjh;
		$oredataand35Array[$j][171].=$o->zhly2houjh;
		$oredataand35Array[$j][172].=$o->zhly3houjh;
		$oredataand35Array[$j][173].=$o->zhly4houjh;
        $oredataand35Array[$j][174].=$o->zhly5houjh;
//矿产资源综合利用率
        $oredataand35Array[$j][175].=$o->kczyzhly;
		$oredataand35Array[$j][176].=$o->kczyzhly3qiansj;
		$oredataand35Array[$j][177].=$o->kczyzhly2qiansj;
		$oredataand35Array[$j][178].=$o->kczyzhly1qiansj;
		$oredataand35Array[$j][179].=$o->kczyzhly1housj;
		$oredataand35Array[$j][180].=$o->kczyzhly2housj;
		$oredataand35Array[$j][181].=$o->kczyzhly3housj;
		$oredataand35Array[$j][182].=$o->kczyzhly4housj;
		$oredataand35Array[$j][183].=$o->kczyzhly5housj;
		$oredataand35Array[$j][184].=$o->kczyzhly1houjh;
		$oredataand35Array[$j][185].=$o->kczyzhly2houjh;
		$oredataand35Array[$j][186].=$o->kczyzhly3houjh;
		$oredataand35Array[$j][187].=$o->kczyzhly4houjh;
        $oredataand35Array[$j][188].=$o->kczyzhly5houjh;
//矿产资源总回收率
        $oredataand35Array[$j][189].=$o->kczyzongzhly;
		$oredataand35Array[$j][190].=$o->kczyzongzhly3qiansj;
		$oredataand35Array[$j][191].=$o->kczyzongzhly2qiansj;
		$oredataand35Array[$j][192].=$o->kczyzongzhly1qiansj;
		$oredataand35Array[$j][193].=$o->kczyzongzhly1housj;
		$oredataand35Array[$j][194].=$o->kczyzongzhly2housj;
		$oredataand35Array[$j][195].=$o->kczyzongzhly3housj;
		$oredataand35Array[$j][196].=$o->kczyzongzhly4housj;
		$oredataand35Array[$j][197].=$o->kczyzongzhly5housj;
		$oredataand35Array[$j][198].=$o->kczyzongzhly1houjh;
		$oredataand35Array[$j][199].=$o->kczyzongzhly2houjh;
		$oredataand35Array[$j][200].=$o->kczyzongzhly3houjh;
		$oredataand35Array[$j][201].=$o->kczyzongzhly4houjh;
        $oredataand35Array[$j][202].=$o->kczyzongzhly5houjh;
//冶炼回收率
        $oredataand35Array[$j][203].=$o->ylhs;
		$oredataand35Array[$j][204].=$o->ylhs3qiansj;
		$oredataand35Array[$j][205].=$o->ylhs2qiansj;
		$oredataand35Array[$j][206].=$o->ylhs1qiansj;
		$oredataand35Array[$j][207].=$o->ylhs1housj;
		$oredataand35Array[$j][208].=$o->ylhs2housj;
		$oredataand35Array[$j][209].=$o->ylhs3housj;
		$oredataand35Array[$j][210].=$o->ylhs4housj;
		$oredataand35Array[$j][211].=$o->ylhs5housj;
		$oredataand35Array[$j][212].=$o->ylhs1houjh;
		$oredataand35Array[$j][213].=$o->ylhs2houjh;
		$oredataand35Array[$j][214].=$o->ylhs3houjh;
		$oredataand35Array[$j][215].=$o->ylhs4houjh;
        $oredataand35Array[$j][216].=$o->ylhs5houjh;
//共伴生矿资源综合利用率
        $oredataand35Array[$j][217].=$o->gongbansheng;
		$oredataand35Array[$j][218].=$o->gongbansheng3qiansj;
		$oredataand35Array[$j][219].=$o->gongbansheng2qiansj;
		$oredataand35Array[$j][220].=$o->gongbansheng1qiansj;
		$oredataand35Array[$j][221].=$o->gongbansheng1housj;
		$oredataand35Array[$j][222].=$o->gongbansheng2housj;
		$oredataand35Array[$j][223].=$o->gongbansheng3housj;
		$oredataand35Array[$j][224].=$o->gongbansheng4housj;
		$oredataand35Array[$j][225].=$o->gongbansheng5housj;
		$oredataand35Array[$j][226].=$o->gongbansheng1houjh;
		$oredataand35Array[$j][227].=$o->gongbansheng2houjh;
		$oredataand35Array[$j][228].=$o->gongbansheng3houjh;
		$oredataand35Array[$j][229].=$o->gongbansheng4houjh;
        $oredataand35Array[$j][230].=$o->gongbansheng5houjh;
//矿井水综合利用率
        $oredataand35Array[$j][231].=$o->jingshui;
		$oredataand35Array[$j][232].=$o->jingshui3qiansj;
		$oredataand35Array[$j][233].=$o->jingshui2qiansj;
		$oredataand35Array[$j][234].=$o->jingshui1qiansj;
		$oredataand35Array[$j][235].=$o->jingshui1housj;
		$oredataand35Array[$j][236].=$o->jingshui2housj;
		$oredataand35Array[$j][237].=$o->jingshui3housj;
		$oredataand35Array[$j][238].=$o->jingshui4housj;
		$oredataand35Array[$j][239].=$o->jingshui5housj;
		$oredataand35Array[$j][240].=$o->jingshui1houjh;
		$oredataand35Array[$j][241].=$o->jingshui2houjh;
		$oredataand35Array[$j][242].=$o->jingshui3houjh;
		$oredataand35Array[$j][243].=$o->jingshui4houjh;
        $oredataand35Array[$j][244].=$o->jingshui5houjh;
//尾矿综合利用率
        $oredataand35Array[$j][245].=$o->weikuang;
		$oredataand35Array[$j][246].=$o->weikuang3qiansj;
		$oredataand35Array[$j][247].=$o->weikuang2qiansj;
		$oredataand35Array[$j][248].=$o->weikuang1qiansj;
		$oredataand35Array[$j][249].=$o->weikuang1housj;
		$oredataand35Array[$j][250].=$o->weikuang2housj;
		$oredataand35Array[$j][251].=$o->weikuang3housj;
		$oredataand35Array[$j][252].=$o->weikuang4housj;
		$oredataand35Array[$j][253].=$o->weikuang5housj;
		$oredataand35Array[$j][254].=$o->weikuang1houjh;
		$oredataand35Array[$j][255].=$o->weikuang2houjh;
		$oredataand35Array[$j][256].=$o->weikuang3houjh;
		$oredataand35Array[$j][257].=$o->weikuang4houjh;
        $oredataand35Array[$j][258].=$o->weikuang5houjh;
//废气综合利用率
        $oredataand35Array[$j][259].=$o->feiqi;
		$oredataand35Array[$j][260].=$o->feiqi3qiansj;
		$oredataand35Array[$j][261].=$o->feiqi2qiansj;
		$oredataand35Array[$j][262].=$o->feiqi1qiansj;
		$oredataand35Array[$j][263].=$o->feiqi1housj;
		$oredataand35Array[$j][264].=$o->feiqi2housj;
		$oredataand35Array[$j][265].=$o->feiqi3housj;
		$oredataand35Array[$j][266].=$o->feiqi4housj;
		$oredataand35Array[$j][267].=$o->feiqi5housj;
		$oredataand35Array[$j][268].=$o->feiqi1houjh;
		$oredataand35Array[$j][269].=$o->feiqi2houjh;
		$oredataand35Array[$j][270].=$o->feiqi3houjh;
		$oredataand35Array[$j][271].=$o->feiqi4houjh;
        $oredataand35Array[$j][272].=$o->feiqi5houjh;
//废渣综合利用率
        $oredataand35Array[$j][273].=$o->feizha;
		$oredataand35Array[$j][274].=$o->feizha3qiansj;
		$oredataand35Array[$j][275].=$o->feizha2qiansj;
		$oredataand35Array[$j][276].=$o->feizha1qiansj;
		$oredataand35Array[$j][277].=$o->feizha1housj;
		$oredataand35Array[$j][278].=$o->feizha2housj;
		$oredataand35Array[$j][279].=$o->feizha3housj;
		$oredataand35Array[$j][280].=$o->feizha4housj;
		$oredataand35Array[$j][281].=$o->feizha5housj;
		$oredataand35Array[$j][282].=$o->feizha1houjh;
		$oredataand35Array[$j][283].=$o->feizha2houjh;
		$oredataand35Array[$j][284].=$o->feizha3houjh;
		$oredataand35Array[$j][285].=$o->feizha4houjh;
        $oredataand35Array[$j][286].=$o->feizha5houjh;
//贫化率
        $oredataand35Array[$j][287].=$o->pinhua;
		$oredataand35Array[$j][288].=$o->pinhua3qiansj;
		$oredataand35Array[$j][289].=$o->pinhua2qiansj;
		$oredataand35Array[$j][290].=$o->pinhua1qiansj;
		$oredataand35Array[$j][291].=$o->pinhua1housj;
		$oredataand35Array[$j][292].=$o->pinhua2housj;
		$oredataand35Array[$j][293].=$o->pinhua3housj;
		$oredataand35Array[$j][294].=$o->pinhua4housj;
		$oredataand35Array[$j][295].=$o->pinhua5housj;
		$oredataand35Array[$j][296].=$o->pinhua1houjh;
		$oredataand35Array[$j][297].=$o->pinhua2houjh;
		$oredataand35Array[$j][298].=$o->pinhua3houjh;
		$oredataand35Array[$j][299].=$o->pinhua4houjh;
        $oredataand35Array[$j][300].=$o->pinhua5houjh;
//产率
        $oredataand35Array[$j][301].=$o->chanlv;
		$oredataand35Array[$j][302].=$o->chanlv3qiansj;
		$oredataand35Array[$j][303].=$o->chanlv2qiansj;
		$oredataand35Array[$j][304].=$o->chanlv1qiansj;
		$oredataand35Array[$j][305].=$o->chanlv1housj;
		$oredataand35Array[$j][306].=$o->chanlv2housj;
		$oredataand35Array[$j][307].=$o->chanlv3housj;
		$oredataand35Array[$j][308].=$o->chanlv4housj;
		$oredataand35Array[$j][309].=$o->chanlv5housj;
		$oredataand35Array[$j][310].=$o->chanlv1houjh;
		$oredataand35Array[$j][311].=$o->chanlv2houjh;
		$oredataand35Array[$j][312].=$o->chanlv3houjh;
		$oredataand35Array[$j][313].=$o->chanlv4houjh;
        $oredataand35Array[$j][314].=$o->chanlv5houjh;
//主矿种煤的采区回采率
        $oredataand35Array[$j][315].=$o->meiCqhc;
		$oredataand35Array[$j][316].=$o->meiCqhc3qiansj;
		$oredataand35Array[$j][317].=$o->meiCqhc2qiansj;
		$oredataand35Array[$j][318].=$o->meiCqhc1qiansj;
		$oredataand35Array[$j][319].=$o->meiCqhc1housj;
		$oredataand35Array[$j][320].=$o->meiCqhc2housj;
		$oredataand35Array[$j][321].=$o->meiCqhc3housj;
		$oredataand35Array[$j][322].=$o->meiCqhc4housj;
		$oredataand35Array[$j][323].=$o->meiCqhc5housj;
		$oredataand35Array[$j][324].=$o->meiCqhc1houjh;
		$oredataand35Array[$j][325].=$o->meiCqhc2houjh;
		$oredataand35Array[$j][326].=$o->meiCqhc3houjh;
		$oredataand35Array[$j][327].=$o->meiCqhc4houjh;
        $oredataand35Array[$j][328].=$o->meiCqhc5houjh;
//主矿种原煤入选率
        $oredataand35Array[$j][329].=$o->meiYmrx;
		$oredataand35Array[$j][330].=$o->meiYmrx3qiansj;
		$oredataand35Array[$j][331].=$o->meiYmrx2qiansj;
		$oredataand35Array[$j][332].=$o->meiYmrx1qiansj;
		$oredataand35Array[$j][333].=$o->meiYmrx1housj;
		$oredataand35Array[$j][334].=$o->meiYmrx2housj;
		$oredataand35Array[$j][335].=$o->meiYmrx3housj;
		$oredataand35Array[$j][336].=$o->meiYmrx4housj;
		$oredataand35Array[$j][337].=$o->meiYmrx5housj;
		$oredataand35Array[$j][338].=$o->meiYmrx1houjh;
		$oredataand35Array[$j][339].=$o->meiYmrx2houjh;
		$oredataand35Array[$j][340].=$o->meiYmrx3houjh;
		$oredataand35Array[$j][341].=$o->meiYmrx4houjh;
        $oredataand35Array[$j][342].=$o->meiYmrx5houjh;
//主矿种煤矸石与共伴生资源综合利用率
        $oredataand35Array[$j][343].=$o->meiMgsgbs;
		$oredataand35Array[$j][344].=$o->meiMgsgbs3qiansj;
		$oredataand35Array[$j][345].=$o->meiMgsgbs2qiansj;
		$oredataand35Array[$j][346].=$o->meiMgsgbs1qiansj;
		$oredataand35Array[$j][347].=$o->meiMgsgbs1housj;
		$oredataand35Array[$j][348].=$o->meiMgsgbs2housj;
		$oredataand35Array[$j][349].=$o->meiMgsgbs3housj;
		$oredataand35Array[$j][350].=$o->meiMgsgbs4housj;
		$oredataand35Array[$j][351].=$o->meiMgsgbs5housj;
		$oredataand35Array[$j][352].=$o->meiMgsgbs1houjh;
		$oredataand35Array[$j][353].=$o->meiMgsgbs2houjh;
		$oredataand35Array[$j][354].=$o->meiMgsgbs3houjh;
		$oredataand35Array[$j][355].=$o->meiMgsgbs4houjh;
        $oredataand35Array[$j][356].=$o->meiMgsgbs5houjh;
//主矿种矿井水综合利用率
        $oredataand35Array[$j][357].=$o->meiKjs;
		$oredataand35Array[$j][358].=$o->meiKjs3qiansj;
		$oredataand35Array[$j][359].=$o->meiKjs2qiansj;
		$oredataand35Array[$j][360].=$o->meiKjs1qiansj;
		$oredataand35Array[$j][361].=$o->meiKjs1housj;
		$oredataand35Array[$j][362].=$o->meiKjs2housj;
		$oredataand35Array[$j][363].=$o->meiKjs3housj;
		$oredataand35Array[$j][364].=$o->meiKjs4housj;
		$oredataand35Array[$j][365].=$o->meiKjs5housj;
		$oredataand35Array[$j][366].=$o->meiKjs1houjh;
		$oredataand35Array[$j][367].=$o->meiKjs2houjh;
		$oredataand35Array[$j][368].=$o->meiKjs3houjh;
		$oredataand35Array[$j][369].=$o->meiKjs4houjh;
        $oredataand35Array[$j][370].=$o->meiKjs5houjh;
//主矿种煤矸石综合利用率
        $oredataand35Array[$j][371].=$o->meiMgszhly;
		$oredataand35Array[$j][372].=$o->meiMgszhly3qiansj;
		$oredataand35Array[$j][373].=$o->meiMgszhly2qiansj;
		$oredataand35Array[$j][374].=$o->meiMgszhly1qiansj;
		$oredataand35Array[$j][375].=$o->meiMgszhly1housj;
		$oredataand35Array[$j][376].=$o->meiMgszhly2housj;
		$oredataand35Array[$j][377].=$o->meiMgszhly3housj;
		$oredataand35Array[$j][378].=$o->meiMgszhly4housj;
		$oredataand35Array[$j][379].=$o->meiMgszhly5housj;
		$oredataand35Array[$j][380].=$o->meiMgszhly1houjh;
		$oredataand35Array[$j][381].=$o->meiMgszhly2houjh;
		$oredataand35Array[$j][382].=$o->meiMgszhly3houjh;
		$oredataand35Array[$j][383].=$o->meiMgszhly4houjh;
        $oredataand35Array[$j][384].=$o->meiMgszhly5houjh;
//共伴生矿种选矿回收率
        $oredataand35Array[$j][385].=$o->gbsXkhs;
		$oredataand35Array[$j][386].=$o->gbsXkhs3qiansj;
		$oredataand35Array[$j][387].=$o->gbsXkhs2qiansj;
		$oredataand35Array[$j][388].=$o->gbsXkhs1qiansj;
		$oredataand35Array[$j][389].=$o->gbsXkhs1housj;
		$oredataand35Array[$j][390].=$o->gbsXkhs2housj;
		$oredataand35Array[$j][391].=$o->gbsXkhs3housj;
		$oredataand35Array[$j][392].=$o->gbsXkhs4housj;
		$oredataand35Array[$j][393].=$o->gbsXkhs5housj;
		$oredataand35Array[$j][394].=$o->gbsXkhs1houjh;
		$oredataand35Array[$j][395].=$o->gbsXkhs2houjh;
		$oredataand35Array[$j][396].=$o->gbsXkhs3houjh;
		$oredataand35Array[$j][397].=$o->gbsXkhs4houjh;
        $oredataand35Array[$j][398].=$o->gbsXkhs5houjh;


//共伴生矿种冶炼回收率
        $oredataand35Array[$j][399].=$o->gbsYlhs;
		$oredataand35Array[$j][400].=$o->gbsYlhs3qiansj;
		$oredataand35Array[$j][401].=$o->gbsYlhs2qiansj;
		$oredataand35Array[$j][402].=$o->gbsYlhs1qiansj;
		$oredataand35Array[$j][403].=$o->gbsYlhs1housj;
		$oredataand35Array[$j][404].=$o->gbsYlhs2housj;
		$oredataand35Array[$j][405].=$o->gbsYlhs3housj;
		$oredataand35Array[$j][406].=$o->gbsYlhs4housj;
		$oredataand35Array[$j][407].=$o->gbsYlhs5housj;
		$oredataand35Array[$j][408].=$o->gbsYlhs1houjh;
		$oredataand35Array[$j][409].=$o->gbsYlhs2houjh;
		$oredataand35Array[$j][410].=$o->gbsYlhs3houjh;
		$oredataand35Array[$j][411].=$o->gbsYlhs4houjh;
        $oredataand35Array[$j][412].=$o->gbsYlhs5houjh;

		/* $oredata35 = new Ore35;
		$sql_oredata35 = "select * from `ore35` WHERE mine_id = $mineid and ore_id = '{$o->id}' and data35name = 'orehuishou'";
		$OArray = $oredata35->getArray($sql_oredata35,true);
		foreach($OArray as $oArray){
		$oredataand35Array[$j][8].=$oArray->data35P3;
		$oredataand35Array[$j][9].=$oArray->data35P2;
		$oredataand35Array[$j][10].=$oArray->data35P1;
		$oredataand35Array[$j][11].=$oArray->data35Aj1;
		$oredataand35Array[$j][12].=$oArray->data35As1;
		$oredataand35Array[$j][13].=$oArray->data35Aj2;
		$oredataand35Array[$j][14].=$oArray->data35As2;
		$oredataand35Array[$j][15].=$oArray->data35Aj3;
		$oredataand35Array[$j][16].=$oArray->data35As3;
		$oredataand35Array[$j][17].=$oArray->data35Aj4;
		$oredataand35Array[$j][18].=$oArray->data35As4;
		$oredataand35Array[$j][19].=$oArray->data35Aj5;
		$oredataand35Array[$j][20].=$oArray->data35As5;
		}
		$sql_oredata35 = "select * from `ore35` WHERE mine_id = $mineid and ore_id = '{$o->id}' and data35name = 'ore_goback'";
		$OArray = $oredata35->getArray($sql_oredata35,true);
		foreach($OArray as $oArray){
		$oredataand35Array[$j][26].=$oArray->data35P3;
		$oredataand35Array[$j][27].=$oArray->data35P2;
		$oredataand35Array[$j][28].=$oArray->data35P1;
		$oredataand35Array[$j][29].=$oArray->data35Aj1;
		$oredataand35Array[$j][30].=$oArray->data35As1;
		$oredataand35Array[$j][31].=$oArray->data35Aj2;
		$oredataand35Array[$j][32].=$oArray->data35As2;
		$oredataand35Array[$j][33].=$oArray->data35Aj3;
		$oredataand35Array[$j][34].=$oArray->data35As3;
		$oredataand35Array[$j][35].=$oArray->data35Aj4;
		$oredataand35Array[$j][36].=$oArray->data35As4;
		$oredataand35Array[$j][37].=$oArray->data35Aj5;
		$oredataand35Array[$j][38].=$oArray->data35As5;
		} */
		$j++;	
	}
	$whatis= Array();
	for($mm=0;$mm<$j;$mm++)
	{
		$whatis[$mm]=$mm;
		}
	$smarty->assign('whatis',$whatis);
	$smarty->assign('oredataand35Array',$oredataand35Array);
	$smarty->assign('flag_j',$j);
	

	

    //综合利用
	$complexdata=new Complex;	
	$sql_complexdata = "select * from `complex` WHERE mine_id = $mineid";
	$complexdataArray = $complexdata->getArray($sql_complexdata,true);
	$smarty->assign('complexdataArray',$complexdataArray);
	
	$complex35Array = array();
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexGoback'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[0][0].=$c->data35P3;
		$complex35Array[0][1].=$c->data35P2;
		$complex35Array[0][2].=$c->data35P1;
		$complex35Array[0][3].=$c->data35Aj1;
		$complex35Array[0][4].=$c->data35As1;
		$complex35Array[0][5].=$c->data35Aj2;
		$complex35Array[0][6].=$c->data35As2;
		$complex35Array[0][7].=$c->data35Aj3;
		$complex35Array[0][8].=$c->data35As3;
		$complex35Array[0][9].=$c->data35Aj4;
		$complex35Array[0][10].=$c->data35As4;
		$complex35Array[0][11].=$c->data35Aj5;
		$complex35Array[0][12].=$c->data35As5;
		}
		
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexAllback'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[1][0].=$c->data35P3;
		$complex35Array[1][1].=$c->data35P2;
		$complex35Array[1][2].=$c->data35P1;
		$complex35Array[1][3].=$c->data35Aj1;
		$complex35Array[1][4].=$c->data35As1;
		$complex35Array[1][5].=$c->data35Aj2;
		$complex35Array[1][6].=$c->data35As2;
		$complex35Array[1][7].=$c->data35Aj3;
		$complex35Array[1][8].=$c->data35As3;
		$complex35Array[1][9].=$c->data35Aj4;
		$complex35Array[1][10].=$c->data35As4;
		$complex35Array[1][11].=$c->data35Aj5;
		$complex35Array[1][12].=$c->data35As5;
		}
		
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexDilut'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[2][0].=$c->data35P3;
		$complex35Array[2][1].=$c->data35P2;
		$complex35Array[2][2].=$c->data35P1;
		$complex35Array[2][3].=$c->data35Aj1;
		$complex35Array[2][4].=$c->data35As1;
		$complex35Array[2][5].=$c->data35Aj2;
		$complex35Array[2][6].=$c->data35As2;
		$complex35Array[2][7].=$c->data35Aj3;
		$complex35Array[2][8].=$c->data35As3;
		$complex35Array[2][9].=$c->data35Aj4;
		$complex35Array[2][10].=$c->data35As4;
		$complex35Array[2][11].=$c->data35Aj5;
		$complex35Array[2][12].=$c->data35As5;
		}
		
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexProrate'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[3][0].=$c->data35P3;
		$complex35Array[3][1].=$c->data35P2;
		$complex35Array[3][2].=$c->data35P1;
		$complex35Array[3][3].=$c->data35Aj1;
		$complex35Array[3][4].=$c->data35As1;
		$complex35Array[3][5].=$c->data35Aj2;
		$complex35Array[3][6].=$c->data35As2;
		$complex35Array[3][7].=$c->data35Aj3;
		$complex35Array[3][8].=$c->data35As3;
		$complex35Array[3][9].=$c->data35Aj4;
		$complex35Array[3][10].=$c->data35As4;
		$complex35Array[3][11].=$c->data35Aj5;
		$complex35Array[3][12].=$c->data35As5;
		}
		
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexUserate'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[4][0].=$c->data35P3;
		$complex35Array[4][1].=$c->data35P2;
		$complex35Array[4][2].=$c->data35P1;
		$complex35Array[4][3].=$c->data35Aj1;
		$complex35Array[4][4].=$c->data35As1;
		$complex35Array[4][5].=$c->data35Aj2;
		$complex35Array[4][6].=$c->data35As2;
		$complex35Array[4][7].=$c->data35Aj3;
		$complex35Array[4][8].=$c->data35As3;
		$complex35Array[4][9].=$c->data35Aj4;
		$complex35Array[4][10].=$c->data35As4;
		$complex35Array[4][11].=$c->data35Aj5;
		$complex35Array[4][12].=$c->data35As5;
		}
		
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexRecover'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[5][0].=$c->data35P3;
		$complex35Array[5][1].=$c->data35P2;
		$complex35Array[5][2].=$c->data35P1;
		$complex35Array[5][3].=$c->data35Aj1;
		$complex35Array[5][4].=$c->data35As1;
		$complex35Array[5][5].=$c->data35Aj2;
		$complex35Array[5][6].=$c->data35As2;
		$complex35Array[5][7].=$c->data35Aj3;
		$complex35Array[5][8].=$c->data35As3;
		$complex35Array[5][9].=$c->data35Aj4;
		$complex35Array[5][10].=$c->data35As4;
		$complex35Array[5][11].=$c->data35Aj5;
		$complex35Array[5][12].=$c->data35As5;
		}
		
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexEfficiency'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[6][0].=$c->data35P3;
		$complex35Array[6][1].=$c->data35P2;
		$complex35Array[6][2].=$c->data35P1;
		$complex35Array[6][3].=$c->data35Aj1;
		$complex35Array[6][4].=$c->data35As1;
		$complex35Array[6][5].=$c->data35Aj2;
		$complex35Array[6][6].=$c->data35As2;
		$complex35Array[6][7].=$c->data35Aj3;
		$complex35Array[6][8].=$c->data35As3;
		$complex35Array[6][9].=$c->data35Aj4;
		$complex35Array[6][10].=$c->data35As4;
		$complex35Array[6][11].=$c->data35Aj5;
		$complex35Array[6][12].=$c->data35As5;
		}
		
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexCoalBack'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[7][0].=$c->data35P3;
		$complex35Array[7][1].=$c->data35P2;
		$complex35Array[7][2].=$c->data35P1;
		$complex35Array[7][3].=$c->data35Aj1;
		$complex35Array[7][4].=$c->data35As1;
		$complex35Array[7][5].=$c->data35Aj2;
		$complex35Array[7][6].=$c->data35As2;
		$complex35Array[7][7].=$c->data35Aj3;
		$complex35Array[7][8].=$c->data35As3;
		$complex35Array[7][9].=$c->data35Aj4;
		$complex35Array[7][10].=$c->data35As4;
		$complex35Array[7][11].=$c->data35Aj5;
		$complex35Array[7][12].=$c->data35As5;
		}
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexCoalIn'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[8][0].=$c->data35P3;
		$complex35Array[8][1].=$c->data35P2;
		$complex35Array[8][2].=$c->data35P1;
		$complex35Array[8][3].=$c->data35Aj1;
		$complex35Array[8][4].=$c->data35As1;
		$complex35Array[8][5].=$c->data35Aj2;
		$complex35Array[8][6].=$c->data35As2;
		$complex35Array[8][7].=$c->data35Aj3;
		$complex35Array[8][8].=$c->data35As3;
		$complex35Array[8][9].=$c->data35Aj4;
		$complex35Array[8][10].=$c->data35As4;
		$complex35Array[8][11].=$c->data35Aj5;
		$complex35Array[8][12].=$c->data35As5;
		}
		$complex35 = new Data35;
		$sql_complex35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'complexCoalAll'";
		$cArray = $complex35->getArray($sql_complex35,true);
		foreach($cArray as $c){
		$complex35Array[9][0].=$c->data35P3;
		$complex35Array[9][1].=$c->data35P2;
		$complex35Array[9][2].=$c->data35P1;
		$complex35Array[9][3].=$c->data35Aj1;
		$complex35Array[9][4].=$c->data35As1;
		$complex35Array[9][5].=$c->data35Aj2;
		$complex35Array[9][6].=$c->data35As2;
		$complex35Array[9][7].=$c->data35Aj3;
		$complex35Array[9][8].=$c->data35As3;
		$complex35Array[9][9].=$c->data35Aj4;
		$complex35Array[9][10].=$c->data35As4;
		$complex35Array[9][11].=$c->data35Aj5;
		$complex35Array[9][12].=$c->data35As5;
		}
	$smarty->assign('complex35Array',$complex35Array);
	
	//保存科技创新信息
	$sciencedata=new Science;
	$sql_sciencedata = "select * from `science` WHERE mine_id = $mineid";
	$sciencedataArray = $sciencedata->getArray($sql_sciencedata,true);
	$smarty->assign('sciencedataArray',$sciencedataArray);
	
		$science35Array = array();
		$science35 = new Data35;
		$sql_science35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'scienceRate'";
		$sArray = $science35->getArray($sql_science35,true);
		foreach($sArray as $s){
		$science35Array[0][0].=$s->data35P3;
		$science35Array[0][1].=$s->data35P2;
		$science35Array[0][2].=$s->data35P1;
		$science35Array[0][3].=$s->data35Aj1;
		$science35Array[0][4].=$s->data35As1;
		$science35Array[0][5].=$s->data35Aj2;
		$science35Array[0][6].=$s->data35As2;
		$science35Array[0][7].=$s->data35Aj3;
		$science35Array[0][8].=$s->data35As3;
		$science35Array[0][9].=$s->data35Aj4;
		$science35Array[0][10].=$s->data35As4;
		$science35Array[0][11].=$s->data35Aj5;
		$science35Array[0][12].=$s->data35As5;
		}
	$smarty->assign('science35Array',$science35Array);
	

	//保存节能减排信息
	$energydata=new Energy;
	$sql_energydata = "select * from `energy` WHERE mine_id = $mineid";
	$energydataArray = $energydata->getArray($sql_energydata,true);
	$smarty->assign('energydataArray',$energydataArray);
	
	$energy35Array = array();
		$energy35 = new Data35;
		$sql_energy35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'energyElect'";
		$eArray = $energy35->getArray($sql_energy35,true);
		foreach($eArray as $e){
		$energy35Array[0][0].=$e->data35P3;
		$energy35Array[0][1].=$e->data35P2;
		$energy35Array[0][2].=$e->data35P1;
		$energy35Array[0][3].=$e->data35Aj1;
		$energy35Array[0][4].=$e->data35As1;
		$energy35Array[0][5].=$e->data35Aj2;
		$energy35Array[0][6].=$e->data35As2;
		$energy35Array[0][7].=$e->data35Aj3;
		$energy35Array[0][8].=$e->data35As3;
		$energy35Array[0][9].=$e->data35Aj4;
		$energy35Array[0][10].=$e->data35As4;
		$energy35Array[0][11].=$e->data35Aj5;
		$energy35Array[0][12].=$e->data35As5;
		}
	
		$energy35 = new Data35;
		$sql_energy35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'energyWater'";
		$eArray = $energy35->getArray($sql_energy35,true);
		foreach($eArray as $e){
		$energy35Array[1][0].=$e->data35P3;
		$energy35Array[1][1].=$e->data35P2;
		$energy35Array[1][2].=$e->data35P1;
		$energy35Array[1][3].=$e->data35Aj1;
		$energy35Array[1][4].=$e->data35As1;
		$energy35Array[1][5].=$e->data35Aj2;
		$energy35Array[1][6].=$e->data35As2;
		$energy35Array[1][7].=$e->data35Aj3;
		$energy35Array[1][8].=$e->data35As3;
		$energy35Array[1][9].=$e->data35Aj4;
		$energy35Array[1][10].=$e->data35As4;
		$energy35Array[1][11].=$e->data35Aj5;
		$energy35Array[1][12].=$e->data35As5;
		}
	
		$energy35 = new Data35;
		$sql_energy35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'energyEnergy'";
		$eArray = $energy35->getArray($sql_energy35,true);
		foreach($eArray as $e){
		$energy35Array[2][0].=$e->data35P3;
		$energy35Array[2][1].=$e->data35P2;
		$energy35Array[2][2].=$e->data35P1;
		$energy35Array[2][3].=$e->data35Aj1;
		$energy35Array[2][4].=$e->data35As1;
		$energy35Array[2][5].=$e->data35Aj2;
		$energy35Array[2][6].=$e->data35As2;
		$energy35Array[2][7].=$e->data35Aj3;
		$energy35Array[2][8].=$e->data35As3;
		$energy35Array[2][9].=$e->data35Aj4;
		$energy35Array[2][10].=$e->data35As4;
		$energy35Array[2][11].=$e->data35Aj5;
		$energy35Array[2][12].=$e->data35As5;
		}
	
		$energy35 = new Data35;
		$sql_energy35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'energyWaste'";
		$eArray = $energy35->getArray($sql_energy35,true);
		foreach($eArray as $e){
		$energy35Array[3][0].=$e->data35P3;
		$energy35Array[3][1].=$e->data35P2;
		$energy35Array[3][2].=$e->data35P1;
		$energy35Array[3][3].=$e->data35Aj1;
		$energy35Array[3][4].=$e->data35As1;
		$energy35Array[3][5].=$e->data35Aj2;
		$energy35Array[3][6].=$e->data35As2;
		$energy35Array[3][7].=$e->data35Aj3;
		$energy35Array[3][8].=$e->data35As3;
		$energy35Array[3][9].=$e->data35Aj4;
		$energy35Array[3][10].=$e->data35As4;
		$energy35Array[3][11].=$e->data35Aj5;
		$energy35Array[3][12].=$e->data35As5;
		}
	
		$energy35 = new Data35;
		$sql_energy35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'energyRubbish'";
		$eArray = $energy35->getArray($sql_energy35,true);
		foreach($eArray as $e){
		$energy35Array[4][0].=$e->data35P3;
		$energy35Array[4][1].=$e->data35P2;
		$energy35Array[4][2].=$e->data35P1;
		$energy35Array[4][3].=$e->data35Aj1;
		$energy35Array[4][4].=$e->data35As1;
		$energy35Array[4][5].=$e->data35Aj2;
		$energy35Array[4][6].=$e->data35As2;
		$energy35Array[4][7].=$e->data35Aj3;
		$energy35Array[4][8].=$e->data35As3;
		$energy35Array[4][9].=$e->data35Aj4;
		$energy35Array[4][10].=$e->data35As4;
		$energy35Array[4][11].=$e->data35Aj5;
		$energy35Array[4][12].=$e->data35As5;
		}
	
		$energy35 = new Data35;
		$sql_energy35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'energySo2'";
		$eArray = $energy35->getArray($sql_energy35,true);
		foreach($eArray as $e){
		$energy35Array[5][0].=$e->data35P3;
		$energy35Array[5][1].=$e->data35P2;
		$energy35Array[5][2].=$e->data35P1;
		$energy35Array[5][3].=$e->data35Aj1;
		$energy35Array[5][4].=$e->data35As1;
		$energy35Array[5][5].=$e->data35Aj2;
		$energy35Array[5][6].=$e->data35As2;
		$energy35Array[5][7].=$e->data35Aj3;
		$energy35Array[5][8].=$e->data35As3;
		$energy35Array[5][9].=$e->data35Aj4;
		$energy35Array[5][10].=$e->data35As4;
		$energy35Array[5][11].=$e->data35Aj5;
		$energy35Array[5][12].=$e->data35As5;
		}
	
	$smarty->assign('energy35Array',$energy35Array);
	
	
	//环境保护信息
	$environmentdata=new Environment;
	$sql_environmentdata = "select * from `environment` WHERE mine_id = $mineid";
	$environmentdataArray = $environmentdata->getArray($sql_environmentdata,true);
	$smarty->assign('environmentdataArray',$environmentdataArray);
	
	$environment35Array = array();
		$environment35 = new Data35;
		$sql_environment35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'environmentRate'";
		$enArray = $environment35->getArray($sql_environment35,true);
		foreach($enArray as $en){
		$environment35Array[0][0].=$en->data35P3;
		$environment35Array[0][1].=$en->data35P2;
		$environment35Array[0][2].=$en->data35P1;
		$environment35Array[0][3].=$en->data35Aj1;
		$environment35Array[0][4].=$en->data35As1;
		$environment35Array[0][5].=$en->data35Aj2;
		$environment35Array[0][6].=$en->data35As2;
		$environment35Array[0][7].=$en->data35Aj3;
		$environment35Array[0][8].=$en->data35As3;
		$environment35Array[0][9].=$en->data35Aj4;
		$environment35Array[0][10].=$en->data35As4;
		$environment35Array[0][11].=$en->data35Aj5;
		$environment35Array[0][12].=$en->data35As5;
		}
	$smarty->assign('environment35Array',$environment35Array);	
		

    //土地复垦信息
    	$reclamationdata=new Reclamation;
	$sql_reclamationdata = "select * from `reclamation` WHERE mine_id = $mineid";
	$reclamationdataArray = $reclamationdata->getArray($sql_reclamationdata,true);
	$smarty->assign('reclamationdataArray',$reclamationdataArray);
	
		$reclamation35Array = array();
		$reclamation35 = new Data35;
		$sql_reclamation35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'reclamationRate'";
		$rArray = $reclamation35->getArray($sql_reclamation35,true);
		foreach($rArray as $r){
		$reclamation35Array[0][0].=$r->data35P3;
		$reclamation35Array[0][1].=$r->data35P2;
		$reclamation35Array[0][2].=$r->data35P1;
		$reclamation35Array[0][3].=$r->data35Aj1;
		$reclamation35Array[0][4].=$r->data35As1;
		$reclamation35Array[0][5].=$r->data35Aj2;
		$reclamation35Array[0][6].=$r->data35As2;
		$reclamation35Array[0][7].=$r->data35Aj3;
		$reclamation35Array[0][8].=$r->data35As3;
		$reclamation35Array[0][9].=$r->data35Aj4;
		$reclamation35Array[0][10].=$r->data35As4;
		$reclamation35Array[0][11].=$r->data35Aj5;
		$reclamation35Array[0][12].=$r->data35As5;
		}
		
		$reclamation35 = new Data35;
		$sql_reclamation35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'reclamationMoney'";
		$rArray = $reclamation35->getArray($sql_reclamation35,true);
		foreach($rArray as $r){
		$reclamation35Array[1][0].=$r->data35P3;
		$reclamation35Array[1][1].=$r->data35P2;
		$reclamation35Array[1][2].=$r->data35P1;
		$reclamation35Array[1][3].=$r->data35Aj1;
		$reclamation35Array[1][4].=$r->data35As1;
		$reclamation35Array[1][5].=$r->data35Aj2;
		$reclamation35Array[1][6].=$r->data35As2;
		$reclamation35Array[1][7].=$r->data35Aj3;
		$reclamation35Array[1][8].=$r->data35As3;
		$reclamation35Array[1][9].=$r->data35Aj4;
		$reclamation35Array[1][10].=$r->data35As4;
		$reclamation35Array[1][11].=$r->data35Aj5;
		$reclamation35Array[1][12].=$r->data35As5;
		}
		$reclamation35 = new Data35;
		$sql_reclamation35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'reclamationPrice'";
		$rArray = $reclamation35->getArray($sql_reclamation35,true);
		foreach($rArray as $r){
		$reclamation35Array[2][0].=$r->data35P3;
		$reclamation35Array[2][1].=$r->data35P2;
		$reclamation35Array[2][2].=$r->data35P1;
		$reclamation35Array[2][3].=$r->data35Aj1;
		$reclamation35Array[2][4].=$r->data35As1;
		$reclamation35Array[2][5].=$r->data35Aj2;
		$reclamation35Array[2][6].=$r->data35As2;
		$reclamation35Array[2][7].=$r->data35Aj3;
		$reclamation35Array[2][8].=$r->data35As3;
		$reclamation35Array[2][9].=$r->data35Aj4;
		$reclamation35Array[2][10].=$r->data35As4;
		$reclamation35Array[2][11].=$r->data35Aj5;
		$reclamation35Array[2][12].=$r->data35As5;
		}
	$smarty->assign('reclamation35Array',$reclamation35Array);
	//社区和谐信息
	$communitydata=new Community;
	$sql_communitydata = "select * from `community` WHERE mine_id = $mineid";
	$communitydataArray = $communitydata->getArray($sql_communitydata,true);
	$smarty->assign('communitydataArray',$communitydataArray);
	

	//企业文化信息
	$culturedata=new Culture;
	$sql_culturedata = "select * from `culture` WHERE mine_id = $mineid";
	$culturedataArray = $culturedata->getArray($sql_culturedata,true);
	$smarty->assign('culturedataArray',$culturedataArray);
	
	$projectdata=new Project;
	$sql_projectdata = "select * from `project` WHERE mine_id = $mineid";
	$projectdataArray = $projectdata->getArray($sql_projectdata,true);
	$smarty->assign('projectdataArray',$projectdataArray);
	

    //审核意见信息
    	$auditdata=new Audit;
	$sql_auditdata = "select * from `audit` WHERE mine_id = $mineid";
	$auditdataArray = $auditdata->getArray($sql_auditdata,true);
	$smarty->assign('auditdataArray',$auditdataArray);

	//保存专家及专家意见
	$expertdata=new Expert;
	$sql_expertdata = "select * from `expert` WHERE mine_id = $mineid and isshenbao=0";
	$expertdataArray = $expertdata->getArray($sql_expertdata,true);
	$flag=count($expertdataArray);
	$smarty->assign('flag',$flag);
	$smarty->assign('expertdataArray',$expertdataArray);
	$smarty->assign('mineid',$mineid);
	//矿种类别
	$MClass = new Oretype;
    $sql = "select name from `oretype` where `type`='能源矿产'";
    $nyore = $MClass->getArray($sql,true);
	$sql = "select name from `oretype` where `type`='金属矿产'";
	$jsore = $MClass->getArray($sql,true);
	$sql = "select name from `oretype` where `type`='非金属矿产'";
	$fjsore = $MClass->getArray($sql,true);
	$sql = "select name from `oretype` where `type`='煤种'";
	$meiore = $MClass->getArray($sql,true);
	$smarty->assign('nyore',$nyore);
	$smarty->assign('jsore',$jsore);   
	$smarty->assign('fjsore',$fjsore);
	$smarty->assign('meiore',$meiore);

	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("" , "/start" , false);
	$crumb->visitNewPage("" , "/minedata/ListMineData" , false);
    $crumb->visitNewPage("" , "/minedata/ListMIneDetails" , true);

	$smarty->setTitle('');
    $smarty->displaymother('minedata/ListMineDetails.tpl');
}
?>