<?php		
function DownloadExcelMineDetails($mineid,$notice=null){
	// global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	if($notice!="auto")notice($notice);
	//保存基本规划信息
	$basedata = new Basedata;
	$sql_basedata = "select * from `basedata` WHERE mine_id = $mineid";
	$basedataArray = $basedata->getArray($sql_basedata,true);
	//从basedataArray中取出所需要的值
	$baseDataUse  =array();
	$baseDataUse[0] = $basedataArray[0]->basedataBgname;
	$baseDataUse[1] = $basedataArray[0]->basedataGreenlvl;
	$baseDataUse[2] = $basedataArray[0]->basedataLimit;
	$baseDataUse[3] = $basedataArray[0]->basedataJiqizhi;
	$baseDataUse[4] = $basedataArray[0]->basedataEstablish;
	$baseDataUse[5] = $basedataArray[0]->basedataBgdate;
	$baseDataUse[6] = $basedataArray[0]->basedataMinename;
	$baseDataUse[7] = $basedataArray[0]->basedataBuildtime;
	$baseDataUse[8] = $basedataArray[0]->basedataCompanyname;
	$baseDataUse[9] = $basedataArray[0]->basedataEnterpriseproperty;
	$baseDataUse[10] = $basedataArray[0]->basedataOwedname;
	$baseDataUse[11] = $basedataArray[0]->basedataArea;
	$baseDataUse[12] = $basedataArray[0]->basedataDivisionsShi;
	$baseDataUse[13] = $basedataArray[0]->basedataDivisionsXian;

	$baseDataUse[14] = $basedataArray[0]->basedataReward;
	$baseDataUse[15] = $basedataArray[0]->basedataValue;
	$baseDataUse[16] = $basedataArray[0]->basedataFee;
	$baseDataUse[17] = $basedataArray[0]->basedataProfit;
	$baseDataUse[18] = $basedataArray[0]->basedataWorker;

	$baseDataUse[19] = $basedataArray[0]->basedataAuthority;
	$baseDataUse[20] = $basedataArray[0]->basedataMinescale;
	$baseDataUse[21] = $basedataArray[0]->basedataPointLongitude;
	$baseDataUse[22] = $basedataArray[0]->basedataPointLatitude;

	$baseDataUse[23] = $basedataArray[0]->basedataDigtype;
	$baseDataUse[24] = $basedataArray[0]->basedataDigreturnrate;
	$baseDataUse[25] = $basedataArray[0]->basedataSepareturnrate;
	$baseDataUse[26] = $basedataArray[0]->basedataMinertype;
	$baseDataUse[27] = $basedataArray[0]->basedataSepaCixuan;
	$baseDataUse[28] = $basedataArray[0]->basedataSepaZhongxuan;
	$baseDataUse[29] = $basedataArray[0]->basedataSepaFuxuan;
	$baseDataUse[30] = $basedataArray[0]->basedataSepaDianxuan;
	$baseDataUse[31] = $basedataArray[0]->basedataSepa;
	$baseDataUse[32] = $basedataArray[0]->basedataProduceScale;
	$baseDataUse[33] = $basedataArray[0]->basedataOrgan;
	$baseDataUse[34] = $basedataArray[0]->basedataYuanHua;
	$baseDataUse[35] = $basedataArray[0]->basedataWeiHua;
	// var_dump($basedataArray);
	//取出其他经纬度
	$zuobiao=new OreZuobiao;
	$sql_zuobiao = "select * from `oreZuobiao` WHERE mine_id = $mineid";
	$zuobiaoRst = $zuobiao->getArray($sql_zuobiao,true);
	$zuobiaoArray = array();
	$j=0;
	foreach ($zuobiaoRst as $key)
	{
		$zuobiaoArray[$j][0].=$key->jingdu;
		$zuobiaoArray[$j][1].=$key->weidu;
		$j++;
	}
	
    //依法办矿
	$legaldata=new Legal;
	$sql_legaldata = "select * from `legal` WHERE mine_id = $mineid";
	$legaldataArray = $legaldata->getArray($sql_legaldata,true);
	$legal1Ischeck=$legaldataArray[0]->legal1Ischeck;
	// $smarty->assign('legaldataArray',$legaldataArray);	
	// $smarty->assign('legal1Ischeck',$legal1Ischeck);	
	
    //规范管理
    
	$standarddata=new Standard;
	$sql_standarddata = "select * from `standard` WHERE mine_id = $mineid";
	$standarddataArray = $standarddata->getArray($sql_standarddata,true);
	// $smarty->assign('standarddataArray',$standarddataArray);
	
	$standarddata35Array = array();
	$standarddata35 = new Data35;
	$sql_standarddata35 = "select * from `data35` WHERE mine_id = $mineid and data35name = 'standardWorkerCount'";
	$stArray = $standarddata35->getArray($sql_standarddata35,true);
	foreach($stArray as $st)
	{
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
	
	//矿山基本信息
	$oredata=new Ore;
	$sql_oredata = "select * from `ore` WHERE mine_id = $mineid";
	$oredataArray = $oredata->getArray($sql_oredata,true);
	//保存ore表的内容
	$oredataand35Array = array();
	//第一维为3的二维数组，第二维存放各名字及标准值
	$oreStds = array();
	// $oreStdValue = array();

	$j = 0;
	$oreCnt = count($oredataArray);
	foreach($oredataArray as $o)
	{
		$oredataand35Array[$j][39].=$o->oreLevelh; //保有储量
		$oredataand35Array[$j][40].=$o->oreLevela;
		//折叠中间项
		{
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

			$oredataand35Array[$j][71].=$o->oremei;

			$oredataand35Array[$j][0].=$o->orename;
			$oredataand35Array[$j][1].=$o->oretype;
			$oredataand35Array[$j][2].=$o->orehuishou;
			$oredataand35Array[$j][3].=$o->orepinweiYuan;
			$oredataand35Array[$j][4].=$o->orepinweiJing;
			$oredataand35Array[$j][5].=$o->orechanlv;
			$oredataand35Array[$j][6].=$o->orezufenJing;
			$oredataand35Array[$j][7].=$o->orezufenYuan;
			$oredataand35Array[$j][21].=$o->oreNametype;
			$oredataand35Array[$j][22].=$j;
			$oredataand35Array[$j][23].=$o->oreGoback;
			$oredataand35Array[$j][24].=$o->oreGobackDig;
			$oredataand35Array[$j][25].=$o->oreGobackUse;
			//新的各个率
			$oredataand35Array[$j][80] .= $o->kaicaihuicai;
			$oredataand35Array[$j][81] .= $o->kaicaihuicai3qiansj;
			$oredataand35Array[$j][82] .= $o->kaicaihuicai2qiansj;
			$oredataand35Array[$j][83] .= $o->kaicaihuicai1qiansj;
			$oredataand35Array[$j][84] .= $o->kaicaihuicai1housj;
			$oredataand35Array[$j][85] .= $o->kaicaihuicai2housj;
			$oredataand35Array[$j][86] .= $o->kaicaihuicai3housj;
			$oredataand35Array[$j][87] .= $o->kaicaihuicai4housj;
			$oredataand35Array[$j][88] .= $o->kaicaihuicai5housj;
			$oredataand35Array[$j][89] .= $o->kaicaihuicai1houjh;
			$oredataand35Array[$j][90] .= $o->kaicaihuicai2houjh;
			$oredataand35Array[$j][91] .= $o->kaicaihuicai3houjh;
			$oredataand35Array[$j][92] .= $o->kaicaihuicai4houjh;
			$oredataand35Array[$j][93] .= $o->kaicaihuicai5houjh;
			$oredataand35Array[$j][94] .= $o->xkhs;
			$oredataand35Array[$j][95] .= $o->xkhs3qiansj;
			$oredataand35Array[$j][96] .= $o->xkhs2qiansj;
			$oredataand35Array[$j][97] .= $o->xkhs1qiansj;
			$oredataand35Array[$j][98] .= $o->xkhs1housj;
			$oredataand35Array[$j][99] .= $o->xkhs2housj;
			$oredataand35Array[$j][100] .= $o->xkhs3housj;
			$oredataand35Array[$j][101] .= $o->xkhs4housj;
			$oredataand35Array[$j][102] .= $o->xkhs5housj;
			$oredataand35Array[$j][103] .= $o->xkhs1houjh;
			$oredataand35Array[$j][104] .= $o->xkhs2houjh;
			$oredataand35Array[$j][105] .= $o->xkhs3houjh;
			$oredataand35Array[$j][106] .= $o->xkhs4houjh;
			$oredataand35Array[$j][107] .= $o->xkhs5houjh;
			$oredataand35Array[$j][108] .= $o->caixuanzh;
			$oredataand35Array[$j][109] .= $o->caixuanzh3qiansj;
			$oredataand35Array[$j][110] .= $o->caixuanzh2qiansj;
			$oredataand35Array[$j][111] .= $o->caixuanzh1qiansj;
			$oredataand35Array[$j][112] .= $o->caixuanzh1housj;
			$oredataand35Array[$j][113] .= $o->caixuanzh2housj;
			$oredataand35Array[$j][114] .= $o->caixuanzh3housj;
			$oredataand35Array[$j][115] .= $o->caixuanzh4housj;
			$oredataand35Array[$j][116] .= $o->caixuanzh5housj;
			$oredataand35Array[$j][117] .= $o->caixuanzh1houjh;
			$oredataand35Array[$j][118] .= $o->caixuanzh2houjh;
			$oredataand35Array[$j][119] .= $o->caixuanzh3houjh;
			$oredataand35Array[$j][120] .= $o->caixuanzh4houjh;
			$oredataand35Array[$j][121] .= $o->caixuanzh5houjh;
			$oredataand35Array[$j][122] .= $o->zhly;
			$oredataand35Array[$j][123] .= $o->zhly3qiansj;
			$oredataand35Array[$j][124] .= $o->zhly2qiansj;
			$oredataand35Array[$j][125] .= $o->zhly1qiansj;
			$oredataand35Array[$j][126] .= $o->zhly1housj;
			$oredataand35Array[$j][127] .= $o->zhly2housj;
			$oredataand35Array[$j][128] .= $o->zhly3housj;
			$oredataand35Array[$j][129] .= $o->zhly4housj;
			$oredataand35Array[$j][130] .= $o->zhly5housj;
			$oredataand35Array[$j][131] .= $o->zhly1houjh;
			$oredataand35Array[$j][132] .= $o->zhly2houjh;
			$oredataand35Array[$j][133] .= $o->zhly3houjh;
			$oredataand35Array[$j][134] .= $o->zhly4houjh;
			$oredataand35Array[$j][135] .= $o->zhly5houjh;
			$oredataand35Array[$j][136] .= $o->kczyzhly;
			$oredataand35Array[$j][137] .= $o->kczyzhly3qiansj;
			$oredataand35Array[$j][138] .= $o->kczyzhly2qiansj;
			$oredataand35Array[$j][139] .= $o->kczyzhly1qiansj;
			$oredataand35Array[$j][140] .= $o->kczyzhly1housj;
			$oredataand35Array[$j][141] .= $o->kczyzhly2housj;
			$oredataand35Array[$j][142] .= $o->kczyzhly3housj;
			$oredataand35Array[$j][143] .= $o->kczyzhly4housj;
			$oredataand35Array[$j][144] .= $o->kczyzhly5housj;
			$oredataand35Array[$j][145] .= $o->kczyzhly1houjh;
			$oredataand35Array[$j][146] .= $o->kczyzhly2houjh;
			$oredataand35Array[$j][147] .= $o->kczyzhly3houjh;
			$oredataand35Array[$j][148] .= $o->kczyzhly4houjh;
			$oredataand35Array[$j][149] .= $o->kczyzhly5houjh;
			$oredataand35Array[$j][150] .= $o->kczyzongzhly;
			$oredataand35Array[$j][151] .= $o->kczyzongzhly3qiansj;
			$oredataand35Array[$j][152] .= $o->kczyzongzhly2qiansj;
			$oredataand35Array[$j][153] .= $o->kczyzongzhly1qiansj;
			$oredataand35Array[$j][154] .= $o->kczyzongzhly1housj;
			$oredataand35Array[$j][155] .= $o->kczyzongzhly2housj;
			$oredataand35Array[$j][156] .= $o->kczyzongzhly3housj;
			$oredataand35Array[$j][157] .= $o->kczyzongzhly4housj;
			$oredataand35Array[$j][158] .= $o->kczyzongzhly5housj;
			$oredataand35Array[$j][159] .= $o->kczyzongzhly1houjh;
			$oredataand35Array[$j][160] .= $o->kczyzongzhly2houjh;
			$oredataand35Array[$j][161] .= $o->kczyzongzhly3houjh;
			$oredataand35Array[$j][162] .= $o->kczyzongzhly4houjh;
			$oredataand35Array[$j][163] .= $o->kczyzongzhly5houjh;
			$oredataand35Array[$j][164] .= $o->ylhs;
			$oredataand35Array[$j][165] .= $o->ylhs3qiansj;
			$oredataand35Array[$j][166] .= $o->ylhs2qiansj;
			$oredataand35Array[$j][167] .= $o->ylhs1qiansj;
			$oredataand35Array[$j][168] .= $o->ylhs1housj;
			$oredataand35Array[$j][169] .= $o->ylhs2housj;
			$oredataand35Array[$j][170] .= $o->ylhs3housj;
			$oredataand35Array[$j][171] .= $o->ylhs4housj;
			$oredataand35Array[$j][172] .= $o->ylhs5housj;
			$oredataand35Array[$j][173] .= $o->ylhs1houjh;
			$oredataand35Array[$j][174] .= $o->ylhs2houjh;
			$oredataand35Array[$j][175] .= $o->ylhs3houjh;
			$oredataand35Array[$j][176] .= $o->ylhs4houjh;
			$oredataand35Array[$j][177] .= $o->ylhs5houjh;
			$oredataand35Array[$j][178] .= $o->gongbansheng;
			$oredataand35Array[$j][179] .= $o->gongbansheng3qiansj;
			$oredataand35Array[$j][180] .= $o->gongbansheng2qiansj;
			$oredataand35Array[$j][181] .= $o->gongbansheng1qiansj;
			$oredataand35Array[$j][182] .= $o->gongbansheng1housj;
			$oredataand35Array[$j][183] .= $o->gongbansheng2housj;
			$oredataand35Array[$j][184] .= $o->gongbansheng3housj;
			$oredataand35Array[$j][185] .= $o->gongbansheng4housj;
			$oredataand35Array[$j][186] .= $o->gongbansheng5housj;
			$oredataand35Array[$j][187] .= $o->gongbansheng1houjh;
			$oredataand35Array[$j][188] .= $o->gongbansheng2houjh;
			$oredataand35Array[$j][189] .= $o->gongbansheng3houjh;
			$oredataand35Array[$j][190] .= $o->gongbansheng4houjh;
			$oredataand35Array[$j][191] .= $o->gongbansheng5houjh;
			$oredataand35Array[$j][192] .= $o->jingshui;
			$oredataand35Array[$j][193] .= $o->jingshui3qiansj;
			$oredataand35Array[$j][194] .= $o->jingshui2qiansj;
			$oredataand35Array[$j][195] .= $o->jingshui1qiansj;
			$oredataand35Array[$j][196] .= $o->jingshui1housj;
			$oredataand35Array[$j][197] .= $o->jingshui2housj;
			$oredataand35Array[$j][198] .= $o->jingshui3housj;
			$oredataand35Array[$j][199] .= $o->jingshui4housj;
			$oredataand35Array[$j][200] .= $o->jingshui5housj;
			$oredataand35Array[$j][201] .= $o->jingshui1houjh;
			$oredataand35Array[$j][202] .= $o->jingshui2houjh;
			$oredataand35Array[$j][203] .= $o->jingshui3houjh;
			$oredataand35Array[$j][204] .= $o->jingshui4houjh;
			$oredataand35Array[$j][205] .= $o->jingshui5houjh;
			$oredataand35Array[$j][206] .= $o->weikuang;
			$oredataand35Array[$j][207] .= $o->weikuang3qiansj;
			$oredataand35Array[$j][208] .= $o->weikuang2qiansj;
			$oredataand35Array[$j][209] .= $o->weikuang1qiansj;
			$oredataand35Array[$j][210] .= $o->weikuang1housj;
			$oredataand35Array[$j][211] .= $o->weikuang2housj;
			$oredataand35Array[$j][212] .= $o->weikuang3housj;
			$oredataand35Array[$j][213] .= $o->weikuang4housj;
			$oredataand35Array[$j][214] .= $o->weikuang5housj;
			$oredataand35Array[$j][215] .= $o->weikuang1houjh;
			$oredataand35Array[$j][216] .= $o->weikuang2houjh;
			$oredataand35Array[$j][217] .= $o->weikuang3houjh;
			$oredataand35Array[$j][218] .= $o->weikuang4houjh;
			$oredataand35Array[$j][219] .= $o->weikuang5houjh;
			$oredataand35Array[$j][220] .= $o->feiqi;
			$oredataand35Array[$j][221] .= $o->feiqi3qiansj;
			$oredataand35Array[$j][222] .= $o->feiqi2qiansj;
			$oredataand35Array[$j][223] .= $o->feiqi1qiansj;
			$oredataand35Array[$j][224] .= $o->feiqi1housj;
			$oredataand35Array[$j][225] .= $o->feiqi2housj;
			$oredataand35Array[$j][226] .= $o->feiqi3housj;
			$oredataand35Array[$j][227] .= $o->feiqi4housj;
			$oredataand35Array[$j][228] .= $o->feiqi5housj;
			$oredataand35Array[$j][229] .= $o->feiqi1houjh;
			$oredataand35Array[$j][230] .= $o->feiqi2houjh;
			$oredataand35Array[$j][231] .= $o->feiqi3houjh;
			$oredataand35Array[$j][232] .= $o->feiqi4houjh;
			$oredataand35Array[$j][233] .= $o->feiqi5houjh;
			$oredataand35Array[$j][234] .= $o->feizha;
			$oredataand35Array[$j][235] .= $o->feizha3qiansj;
			$oredataand35Array[$j][236] .= $o->feizha2qiansj;
			$oredataand35Array[$j][237] .= $o->feizha1qiansj;
			$oredataand35Array[$j][238] .= $o->feizha1housj;
			$oredataand35Array[$j][239] .= $o->feizha2housj;
			$oredataand35Array[$j][240] .= $o->feizha3housj;
			$oredataand35Array[$j][241] .= $o->feizha4housj;
			$oredataand35Array[$j][242] .= $o->feizha5housj;
			$oredataand35Array[$j][243] .= $o->feizha1houjh;
			$oredataand35Array[$j][244] .= $o->feizha2houjh;
			$oredataand35Array[$j][245] .= $o->feizha3houjh;
			$oredataand35Array[$j][246] .= $o->feizha4houjh;
			$oredataand35Array[$j][247] .= $o->feizha5houjh;
			$oredataand35Array[$j][248] .= $o->pinhua;
			$oredataand35Array[$j][249] .= $o->pinhua3qiansj;
			$oredataand35Array[$j][250] .= $o->pinhua2qiansj;
			$oredataand35Array[$j][251] .= $o->pinhua1qiansj;
			$oredataand35Array[$j][252] .= $o->pinhua1housj;
			$oredataand35Array[$j][253] .= $o->pinhua2housj;
			$oredataand35Array[$j][254] .= $o->pinhua3housj;
			$oredataand35Array[$j][255] .= $o->pinhua4housj;
			$oredataand35Array[$j][256] .= $o->pinhua5housj;
			$oredataand35Array[$j][257] .= $o->pinhua1houjh;
			$oredataand35Array[$j][258] .= $o->pinhua2houjh;
			$oredataand35Array[$j][259] .= $o->pinhua3houjh;
			$oredataand35Array[$j][260] .= $o->pinhua4houjh;
			$oredataand35Array[$j][261] .= $o->pinhua5houjh;
			$oredataand35Array[$j][262] .= $o->chanlv;
			$oredataand35Array[$j][263] .= $o->chanlv3qiansj;
			$oredataand35Array[$j][264] .= $o->chanlv2qiansj;
			$oredataand35Array[$j][265] .= $o->chanlv1qiansj;
			$oredataand35Array[$j][266] .= $o->chanlv1housj;
			$oredataand35Array[$j][267] .= $o->chanlv2housj;
			$oredataand35Array[$j][268] .= $o->chanlv3housj;
			$oredataand35Array[$j][269] .= $o->chanlv4housj;
			$oredataand35Array[$j][270] .= $o->chanlv5housj;
			$oredataand35Array[$j][271] .= $o->chanlv1houjh;
			$oredataand35Array[$j][272] .= $o->chanlv2houjh;
			$oredataand35Array[$j][273] .= $o->chanlv3houjh;
			$oredataand35Array[$j][274] .= $o->chanlv4houjh;
			$oredataand35Array[$j][275] .= $o->chanlv5houjh;
			$oredataand35Array[$j][276] .= $o->meiCqhc;
			$oredataand35Array[$j][277] .= $o->meiCqhc3qiansj;
			$oredataand35Array[$j][278] .= $o->meiCqhc2qiansj;
			$oredataand35Array[$j][279] .= $o->meiCqhc1qiansj;
			$oredataand35Array[$j][280] .= $o->meiCqhc1housj;
			$oredataand35Array[$j][281] .= $o->meiCqhc2housj;
			$oredataand35Array[$j][282] .= $o->meiCqhc3housj;
			$oredataand35Array[$j][283] .= $o->meiCqhc4housj;
			$oredataand35Array[$j][284] .= $o->meiCqhc5housj;
			$oredataand35Array[$j][285] .= $o->meiCqhc1houjh;
			$oredataand35Array[$j][286] .= $o->meiCqhc2houjh;
			$oredataand35Array[$j][287] .= $o->meiCqhc3houjh;
			$oredataand35Array[$j][288] .= $o->meiCqhc4houjh;
			$oredataand35Array[$j][289] .= $o->meiCqhc5houjh;
			$oredataand35Array[$j][290] .= $o->meiYmrx;
			$oredataand35Array[$j][291] .= $o->meiYmrx3qiansj;
			$oredataand35Array[$j][292] .= $o->meiYmrx2qiansj;
			$oredataand35Array[$j][293] .= $o->meiYmrx1qiansj;
			$oredataand35Array[$j][294] .= $o->meiYmrx1housj;
			$oredataand35Array[$j][295] .= $o->meiYmrx2housj;
			$oredataand35Array[$j][296] .= $o->meiYmrx3housj;
			$oredataand35Array[$j][297] .= $o->meiYmrx4housj;
			$oredataand35Array[$j][298] .= $o->meiYmrx5housj;
			$oredataand35Array[$j][299] .= $o->meiYmrx1houjh;
			$oredataand35Array[$j][300] .= $o->meiYmrx2houjh;
			$oredataand35Array[$j][301] .= $o->meiYmrx3houjh;
			$oredataand35Array[$j][302] .= $o->meiYmrx4houjh;
			$oredataand35Array[$j][303] .= $o->meiYmrx5houjh;
			$oredataand35Array[$j][304] .= $o->meiMgsgbs;
			$oredataand35Array[$j][305] .= $o->meiMgsgbs3qiansj;
			$oredataand35Array[$j][306] .= $o->meiMgsgbs2qiansj;
			$oredataand35Array[$j][307] .= $o->meiMgsgbs1qiansj;
			$oredataand35Array[$j][308] .= $o->meiMgsgbs1housj;
			$oredataand35Array[$j][309] .= $o->meiMgsgbs2housj;
			$oredataand35Array[$j][310] .= $o->meiMgsgbs3housj;
			$oredataand35Array[$j][311] .= $o->meiMgsgbs4housj;
			$oredataand35Array[$j][312] .= $o->meiMgsgbs5housj;
			$oredataand35Array[$j][313] .= $o->meiMgsgbs1houjh;
			$oredataand35Array[$j][314] .= $o->meiMgsgbs2houjh;
			$oredataand35Array[$j][315] .= $o->meiMgsgbs3houjh;
			$oredataand35Array[$j][316] .= $o->meiMgsgbs4houjh;
			$oredataand35Array[$j][317] .= $o->meiMgsgbs5houjh;
			$oredataand35Array[$j][318] .= $o->meiKjs;
			$oredataand35Array[$j][319] .= $o->meiKjs3qiansj;
			$oredataand35Array[$j][320] .= $o->meiKjs2qiansj;
			$oredataand35Array[$j][321] .= $o->meiKjs1qiansj;
			$oredataand35Array[$j][322] .= $o->meiKjs1housj;
			$oredataand35Array[$j][323] .= $o->meiKjs2housj;
			$oredataand35Array[$j][324] .= $o->meiKjs3housj;
			$oredataand35Array[$j][325] .= $o->meiKjs4housj;
			$oredataand35Array[$j][326] .= $o->meiKjs5housj;
			$oredataand35Array[$j][327] .= $o->meiKjs1houjh;
			$oredataand35Array[$j][328] .= $o->meiKjs2houjh;
			$oredataand35Array[$j][329] .= $o->meiKjs3houjh;
			$oredataand35Array[$j][330] .= $o->meiKjs4houjh;
			$oredataand35Array[$j][331] .= $o->meiKjs5houjh;
			$oredataand35Array[$j][332] .= $o->meiMgszhly;
			$oredataand35Array[$j][333] .= $o->meiMgszhly3qiansj;
			$oredataand35Array[$j][334] .= $o->meiMgszhly2qiansj;
			$oredataand35Array[$j][335] .= $o->meiMgszhly1qiansj;
			$oredataand35Array[$j][336] .= $o->meiMgszhly1housj;
			$oredataand35Array[$j][337] .= $o->meiMgszhly2housj;
			$oredataand35Array[$j][338] .= $o->meiMgszhly3housj;
			$oredataand35Array[$j][339] .= $o->meiMgszhly4housj;
			$oredataand35Array[$j][340] .= $o->meiMgszhly5housj;
			$oredataand35Array[$j][341] .= $o->meiMgszhly1houjh;
			$oredataand35Array[$j][342] .= $o->meiMgszhly2houjh;
			$oredataand35Array[$j][343] .= $o->meiMgszhly3houjh;
			$oredataand35Array[$j][344] .= $o->meiMgszhly4houjh;
			$oredataand35Array[$j][345] .= $o->meiMgszhly5houjh;
			$oredataand35Array[$j][346] .= $o->gbsXkhs ;
			$oredataand35Array[$j][347] .= $o->gbsXkhs3qiansj;
			$oredataand35Array[$j][348] .= $o->gbsXkhs2qiansj;
			$oredataand35Array[$j][349] .= $o->gbsXkhs1qiansj;
			$oredataand35Array[$j][350] .= $o->gbsXkhs1housj;
			$oredataand35Array[$j][351] .= $o->gbsXkhs2housj;
			$oredataand35Array[$j][352] .= $o->gbsXkhs3housj;
			$oredataand35Array[$j][353] .= $o->gbsXkhs4housj;
			$oredataand35Array[$j][354] .= $o->gbsXkhs5housj;
			$oredataand35Array[$j][355] .= $o->gbsXkhs1houjh;
			$oredataand35Array[$j][356] .= $o->gbsXkhs2houjh;
			$oredataand35Array[$j][357] .= $o->gbsXkhs3houjh;
			$oredataand35Array[$j][358] .= $o->gbsXkhs4houjh;
			$oredataand35Array[$j][359] .= $o->gbsXkhs5houjh;
			$oredataand35Array[$j][360] .= $o->gbsYlhs ;
			$oredataand35Array[$j][361] .= $o->gbsYlhs3qiansj;
			$oredataand35Array[$j][362] .= $o->gbsYlhs2qiansj;
			$oredataand35Array[$j][363] .= $o->gbsYlhs1qiansj;
			$oredataand35Array[$j][364] .= $o->gbsYlhs1housj;
			$oredataand35Array[$j][365] .= $o->gbsYlhs2housj;
			$oredataand35Array[$j][366] .= $o->gbsYlhs3housj;
			$oredataand35Array[$j][367] .= $o->gbsYlhs4housj;
			$oredataand35Array[$j][368] .= $o->gbsYlhs5housj;
			$oredataand35Array[$j][369] .= $o->gbsYlhs1houjh;
			$oredataand35Array[$j][370] .= $o->gbsYlhs2houjh;
			$oredataand35Array[$j][371] .= $o->gbsYlhs3houjh;
			$oredataand35Array[$j][372] .= $o->gbsYlhs4houjh;
			$oredataand35Array[$j][373] .= $o->gbsYlhs5houjh;
		}
		//取到三率标准值及 5-3
		$sanLvTmp = array();
		$sanLvTmp[0][0] = new OreKchc35;
		$sanLvTmp[0][1] = new OrestandardnameKchc;
		$sanLvTmp[0][2] = new OrestandardKchc;
		$sanLvTmp[1][0] = new OreXkhs35;
		$sanLvTmp[1][1] = new OrestandardnameXkhs;
		$sanLvTmp[1][2] = new OrestandardXkhs;
		$sanLvTmp[2][0] = new OreZhly35;
		$sanLvTmp[2][1] = new OrestandardnameZhly;
		$sanLvTmp[2][2] = new OrestandardZhly;
		$dbName = array();
		$dbName[0] = array('ore_kchc35', 'orestandardname_kchc', 'orestandard_kchc');
		$dbName[1] = array('ore_xkhs35', 'orestandardname_xkhs', 'orestandard_xkhs');
		$dbName[2] = array('ore_zhly35', 'orestandardname_zhly', 'orestandard_zhly');
		$oreId = $o->id;
		// $orename = $o->orename;
		//$db的命名有误，实际代表三个率的循环
		for($db = 0; $db<3; $db++)
		{
			$sqlTmp = "select * from `{$dbName[$db][0]}` WHERE ore_id = '{$oreId}'";
			$sanLvArray = $sanLvTmp[$db][0]->getArray($sqlTmp, true);
			//取下标0，因为只有一个标准值
			$sanLv = $sanLvArray[0];
			$oreStds[$j][$db][0] = $sanLv->value;
			$standardId = $sanLv->standardId;
			//取出标准值项名字
			$sqlTmp = "select * from `{$dbName[$db][1]}` WHERE kuangzhong = '{$o->orename}'";
			// echo $sqlTmp;
			$sanLvArray = $sanLvTmp[$db][1]->getArray($sqlTmp, true);
			$sanLv = $sanLvArray[0];
			$oreStds[$j][$db][1] = $sanLv->subclassName1;
			$oreStds[$j][$db][2] = $sanLv->subclassName2;
			$oreStds[$j][$db][3] = $sanLv->subclassName3;
			$oreStds[$j][$db][4] = $sanLv->subclassName4;
			$oreStds[$j][$db][5] = $sanLv->subclassName5;
			$oreStds[$j][$db][6] = $sanLv->subclassName6;
			//取出标准值
			$sqlTmp = "select * from `{$dbName[$db][2]}` WHERE id = '{$standardId}'";
			// echo $sqlTmp.'<br>';
			$sanLvArray = $sanLvTmp[$db][2]->getArray($sqlTmp, true);
			$sanLv = $sanLvArray[0];
			$oreStds[$j][$db][7] = $sanLv->subclass1;
			$oreStds[$j][$db][8] = $sanLv->subclass2;
			$oreStds[$j][$db][9] = $sanLv->subclass3;
			$oreStds[$j][$db][10] = $sanLv->subclass4;
			$oreStds[$j][$db][11] = $sanLv->subclass5;
			$oreStds[$j][$db][12] = $sanLv->subclass6;
		}
		$j++;
	}
	
	//保存科技创新信息
	$sciencedata=new Science;
	$sql_sciencedata = "select * from `science` WHERE mine_id = $mineid";
	$sciencedataArray = $sciencedata->getArray($sql_sciencedata,true);
	
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
	
	//保存节能减排信息
	$energydata=new Energy;
	$sql_energydata = "select * from `energy` WHERE mine_id = $mineid";
	$energydataArray = $energydata->getArray($sql_energydata,true);
	
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
	
	//环境保护信息
	$environmentdata=new Environment;
	$sql_environmentdata = "select * from `environment` WHERE mine_id = $mineid";
	$environmentdataArray = $environmentdata->getArray($sql_environmentdata,true);
	// $smarty->assign('environmentdataArray',$environmentdataArray);
	
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
		

    //土地复垦信息
    	$reclamationdata=new Reclamation;
	$sql_reclamationdata = "select * from `reclamation` WHERE mine_id = $mineid";
	$reclamationdataArray = $reclamationdata->getArray($sql_reclamationdata,true);

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
	// $smarty->assign('reclamation35Array',$reclamation35Array);
	//社区和谐信息
	$communitydata=new Community;
	$sql_communitydata = "select * from `community` WHERE mine_id = $mineid";
	$communitydataArray = $communitydata->getArray($sql_communitydata,true);
	

	//企业文化信息
	$culturedata=new Culture;
	$sql_culturedata = "select * from `culture` WHERE mine_id = $mineid";
	$culturedataArray = $culturedata->getArray($sql_culturedata,true);
	
	$projectdata=new Project;
	$sql_projectdata = "select * from `project` WHERE mine_id = $mineid";
	$projectdataArray = $projectdata->getArray($sql_projectdata,true);
	

    //审核意见信息
    	$auditdata=new Audit;
	$sql_auditdata = "select * from `audit` WHERE mine_id = $mineid";
	$auditdataArray = $auditdata->getArray($sql_auditdata,true);

	//保存专家及专家意见
	$expertdata=new Expert;
	$sql_expertdata = "select * from `expert` WHERE mine_id = $mineid and isshenbao=0";
	$expertdataArray = $expertdata->getArray($sql_expertdata,true);

	//矿种类别
	$MClass = new Oretype;
    $sql = "select name from `oretype` where `type`='能源矿产'";
    $nyore = $MClass->getArray($sql,true);
	$sql = "select name from `oretype` where `type`='金属矿产'";
	$jsore = $MClass->getArray($sql,true);
	$sql = "select name from `oretype` where `type`='非金属矿产'";
	$fjsore = $MClass->getArray($sql,true);
/*********Excel 导出****************************/
/*********Include PHPExcel*********************/
	require_once("../webroot/PHPExcel/Classes/PHPExcel.php");//引用PHPExcel库
/************Create new PHPExcel object***************/
	$objPHPExcel = new PHPExcel();//新建对象
/************Set document properties*********设立Excel文件的属性基本信息*********/
	$objPHPExcel->getProperties()->setCreator("Gansu Province Land and Resources Management and the Office")
								 ->setLastModifiedBy("Gansu Province Land and Resources Management and the Office")
								 ->setTitle("Plan Form");	
/************Define variables****************/
	$objActSheet = $objPHPExcel->getActiveSheet();
	//创建单元格风格——所有边都画实线
	$borders_style =  array( 'borders' => array( 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'wrap'=>true));
	//创建风格对象
	$style_obj = new PHPExcel_Style();
	//空内容的style
	$borders_style_none =  array( 'borders' => array( 'top' => array('style' => PHPExcel_Style_Border::BORDER_NONE),'left' => array('style' => PHPExcel_Style_Border::BORDER_NONE),'bottom' => array('style' => PHPExcel_Style_Border::BORDER_NONE),'right' => array('style' => PHPExcel_Style_Border::BORDER_NONE)));
	$styleNoBorder = new PHPExcel_Style();

	$style_obj->applyFromArray($borders_style);
	$styleNoBorder->applyFromArray($borders_style_none);

	$clom_data = 0;
	$clom = 0;
	$all = 21 + count($zuobiaoArray) + 18 * $oreCnt;
	$jiqi_1 = $basedataArray[0]->basedataJiqizhi-2;
	$jiqi_2 = $basedataArray[0]->basedataJiqizhi-1;
	$jiqi_3 = $basedataArray[0]->basedataJiqizhi;
	$jiqi_4 = $basedataArray[0]->basedataJiqizhi+1;
	$jiqi_5 = $basedataArray[0]->basedataJiqizhi+2;
	$jiqi_6 = $basedataArray[0]->basedataJiqizhi+3;
	$jiqi_7 = $basedataArray[0]->basedataJiqizhi+4;
	$jiqi_8 = $basedataArray[0]->basedataJiqizhi+5;

	// 添加两页封面
	$objPHPExcel->setActiveSheetIndex(0);
	$objActSheet = $objPHPExcel->getActiveSheet();
	
	$objActSheet->setTitle('封面1');
	$objActSheet->mergeCells('A3:I5');
	$objActSheet->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getStyle('A3')->getFont()->setSize(22);
	$objActSheet->setCellValue('A3',$baseDataUse[0].' 国家级绿色矿山建设规划' );

	$objActSheet->getStyle('B36')->getFont()->setSize(16);
	$objActSheet->getStyle('B38')->getFont()->setSize(16);
	$objActSheet->setCellValue('B36', '委托单位:');
	$objActSheet->setCellValue('D36', $baseDataUse[8]);
	$objActSheet->setCellValue('B38', '编制单位:');
	$objActSheet->setCellValue('D38', $baseDataUse[4]);

	//Set First Sheet*****基本信息************
	$objPHPExcel->createSheet();
	$objPHPExcel->setActiveSheetIndex(1);
	$objActSheet = $objPHPExcel->getActiveSheet();
	$colA = array('A','C');
	$colB = array('B','D');
	//设置各种颜色
	$colorDanlv = 'A4EEA4'; //淡绿色
	$colorShenLv = '98B659'; //深绿色
	$colorLan = '1FE0B2'; //蓝色
/************Set Name of Sheet***************/
	$objActSheet->setTitle('基本信息');
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D".$all);
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(20);
	$objActSheet->getColumnDimension('B')->setWidth(25);
	$objActSheet->getColumnDimension('C')->setWidth(20);
	$objActSheet->getColumnDimension('D')->setWidth(25);
	$objActSheet->getRowDimension('1')->setRowHeight(35);
	$objActSheet->getRowDimension('2')->setRowHeight(20);
	$objActSheet->getRowDimension('3')->setRowHeight(30);
	$objActSheet->getRowDimension('13')->setRowHeight(20);

	$objActSheet->mergeCells('B10:D10');
	$objActSheet->mergeCells('A13:D13');

	$objActSheet->setCellValue('A1','矿山基本信息');
	$objActSheet->setCellValue('A2','矿山企业信息');
	$objActSheet->getStyle('A2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	->getStartColor()->setRGB($colorDanlv);
	//写入label
	$baseLabels = array('规划报告名称','绿色矿山级别','规划期限','规划基期(年份)','编制单位','报告出具日期','矿山名称','矿山成立时间','企业名称','企业性质','所属企业名称','规划范围(平方千米)','市级行政区划','县级行政区划','企业荣誉描述','矿山企业总产值(万元)','矿山企业利税(万元)','矿山企业利润(万元)','矿山企业人数(人)');

	$labels2 = array('矿业权类型','储量规模','经度', '纬度');

	$labels3 = array('矿山开采方式', '矿山开采回采率(%)', '矿山选矿回收率(%)', '矿山矿床类型', '选矿方法', '实际生产规模', '产品方案', '原矿石品位','贫化率');

	//写入到县级行政区划
	//$row 保存行信息
	$row = 3;
	//变量
	$i = 0;
	$k = 0;
	$valueIndex = 0;
	for($i=0; $i<count($baseLabels); )
	{
		if($i == 14)
		{
			//写入企业荣誉
			//写入标签
			$objActSheet->getRowDimension($row)->setRowHeight(35);
			$objActSheet->setCellValue($colA[0].$row, $baseLabels[$i]);
			//设置背景颜色
			$objActSheet->getStyle($colA[0].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorLan);
			//写入值
			$objActSheet->setCellValue($colB[0].$row, $baseDataUse[$valueIndex++]);
			$i++;
			$row++;
			//跳过后面
			continue;
		}
		for($k=0; $k<2 && $i<count($baseLabels); $k++)
		{
			//写入标签
			$objActSheet->setCellValue($colA[$k].$row, $baseLabels[$i]);
			//设置背景颜色
			$objActSheet->getStyle($colA[$k].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorLan);
			//写入值
			$objActSheet->setCellValue($colB[$k].$row, $baseDataUse[$valueIndex++]);
			$i++;
		}
		$row++;
	}

	//写入矿业权信息
	$objActSheet->setCellValue('A'.$row,'矿业权信息');
	$objActSheet->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getStyle($colA[0].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	->getStartColor()->setRGB($colorDanlv);
	$i++;
	$row++;
	for($i=0; $i<count($labels2); )
	{
		for($k=0; $k<2; $k++)
		{
			//写入标签
			$objActSheet->setCellValue($colA[$k].$row, $labels2[$i]);
			//设置背景颜色
			$objActSheet->getStyle($colA[$k].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorLan);
			//写入值
			$objActSheet->setCellValue($colB[$k].$row, $baseDataUse[$valueIndex++]);
			$i++;
		}
		$row++;
	}
	//写入其他的坐标信息
	//$zuobiaoArray
	for($i=0; $i<count($zuobiaoArray); $i++)
	{
		$objActSheet->setCellValue('A'.$row, '经度');
		//设置背景颜色
		$objActSheet->getStyle('A'.$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setRGB($colorLan);
		//写入值
		$objActSheet->setCellValue('B'.$row, $zuobiaoArray[$i][0]);
		$objActSheet->setCellValue('C'.$row, '纬度');
		//设置背景颜色
		$objActSheet->getStyle('C'.$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setRGB($colorLan);
		//写入值
		$objActSheet->setCellValue('D'.$row, $zuobiaoArray[$i][1]);
		//下一行
		$row++;
	}
	//基本信息
	//todo：矿种信息的导出，保有，可采各种值
	//0，1，39，40
	$autoIndex = array();
	$autoIndex[0] = array('矿种名称','矿种类别','保有储量','可采储量','保有储量111级','可采储量111级','保有储量121/122级','可采储量121/122级','保有储量111B级','可采储量111B级','保有储量121B级','可采储量121B级','保有储量122B级','可采储量122B级','保有储量2M11级','可采储量2M11级','保有储量2M21级','可采储量2M21级','保有储量2M22级','可采储量2M22级','保有储量2S11级','可采储量2S11级','保有储量2S21级','可采储量2S21级','保有储量2S22级','可采储量2S22级','保有储量331级','可采储量331级','保有储量332级','可采储量332级','保有储量333级','可采储量333级','保有储量334级','可采储量334级');
	$autoIndex[1] = array(0, 1, 39, 40,41,56,42,57,43,58,44,59,45,60,46,61,47,62,48,63,49,64,50,65,51,66,52,67,53,68,54,69,55,70);
	//写入矿种信息
	for($i=0; $i<$oreCnt; $i++)
	{
		$objActSheet->mergeCells('A'.$row.':D'.$row);
		$objActSheet->setCellValue('A'.$row, '矿种'.$i.': '.$oredataand35Array[$i][0]);
		$objActSheet->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objActSheet->getStyle($colA[0].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setRGB($colorDanlv);
		$row++;

		for($j=0; $j<count($autoIndex[0]); )
		{
			for($k=0; $k<2; $k++)
			{
				//写入标签
				$objActSheet->setCellValue($colA[$k].$row, $autoIndex[0][$j]);
				//设置背景颜色
				$objActSheet->getStyle($colA[$k].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				->getStartColor()->setRGB($colorLan);
				//写入值
				$objActSheet->setCellValue($colB[$k].$row, $oredataand35Array[$i][$autoIndex[1][$j]]);
				$j++;
			}
			$row++;
		}
	}
	
	//写入矿山经营信息
	$objActSheet->mergeCells('A'.$row.':D'.$row);
	$objActSheet->setCellValue('A'.$row, '矿山生产经营信息');
	$objActSheet->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getStyle($colA[0].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	->getStartColor()->setRGB($colorDanlv);
	$row++;
	for($i=0; $i<count($labels3); )
	{
		if($i == 4)
		{
			//写入选矿方式
			//写入标签
			$fangshi = array('磁选','重选','浮选','电选','其他');
			$objActSheet->mergeCells('B'.$row.':D'.$row);
			$objActSheet->setCellValue($colA[0].$row, $labels3[$i]);
			//设置背景颜色
			$objActSheet->getStyle($colA[0].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorLan);
			//写入选矿方式值
			$valueSet = '';
			for($kl=0; $kl<5; $kl++)
			{
				if($baseDataUse[$valueIndex++]==1)
				{
					$valueSet .= $fangshi[$kl].' ';
				}
			}
			$objActSheet->setCellValue($colB[0].$row, $valueSet);
			$i++;
			$row++;
			//跳过后面
			continue;
		}
		for($k=0; $k<2; $k++)
		{
			//写入标签
			$objActSheet->setCellValue($colA[$k].$row, $labels3[$i]);
			//设置背景颜色
			$objActSheet->getStyle($colA[$k].$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorLan);
			//写入值
			$objActSheet->setCellValue($colB[$k].$row, $baseDataUse[$valueIndex++]);
			$i++;
		}
		$row++;
	}

/************Set Second Sheet*****依法办矿************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(2);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('依法办矿');	
/************Define variables****************/

/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D102");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(20);
	$objActSheet->getColumnDimension('B')->setWidth(25);
	$objActSheet->getColumnDimension('C')->setWidth(20);
	$objActSheet->getColumnDimension('D')->setWidth(25);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->mergeCells('A48:D48');
	$objActSheet->mergeCells('A49:D49');
	$objActSheet->mergeCells('A54:D54');
	$objActSheet->mergeCells('A59:D59');
	$objActSheet->mergeCells('A64:D64');
	$objActSheet->mergeCells('A69:D69');
	$objActSheet->mergeCells('A74:D74');
	$objActSheet->mergeCells('A79:D79');
	$objActSheet->mergeCells('A85:D85');
	$objActSheet->mergeCells('A89:D89');
	$objActSheet->mergeCells('A92:D92');
	$objActSheet->mergeCells('A95:D95');
	$objActSheet->mergeCells('A99:D99');
/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','规划信息（依法办矿）');
	$objActSheet->setCellValue('A2','相关证照');
	$objActSheet->getRowDimension('2')->setRowHeight(25);
	$objActSheet->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getStyle('A2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	->getStartColor()->setRGB($colorDanlv);

	$objActSheet->getRowDimension('48')->setRowHeight(25);
	$objActSheet->getStyle('A48')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getStyle('A48')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	->getStartColor()->setRGB($colorDanlv);
	//设置颜色
	for($row2=3; $row2<=102; $row2++)
	{
		if(in_array($row2, array(49, 54,59,64,69,74,79,85,89,95,99) )) 
		{
			$objActSheet->getRowDimension($row2)->setRowHeight(23);
			$objActSheet->getStyle('A'.$row2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objActSheet->getStyle('A'.$row2)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorLan);
		} else if($row2 == 48) 
		{
			continue;
		} else {
			$objActSheet->getStyle('A'.$row2)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorShenLv);
			$objActSheet->getStyle('C'.$row2)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorShenLv);
		}
	}
	
	$objActSheet->setCellValue('A3','证照名称');
	$objActSheet->setCellValue('C3','证号');
	$objActSheet->setCellValue('A4','是否年检');
	$objActSheet->setCellValue('C4','有效期始');
	$objActSheet->setCellValue('A5','有效期止');
	$objActSheet->setCellValue('C5','备注');
	
	$objActSheet->setCellValue('A6','证照名称');
	$objActSheet->setCellValue('C6','证号');
	$objActSheet->setCellValue('A7','是否年检');
	$objActSheet->setCellValue('C7','有效期始');
	$objActSheet->setCellValue('A8','有效期止');
	$objActSheet->setCellValue('C8','备注');
	
	$objActSheet->setCellValue('A9','证照名称');
	$objActSheet->setCellValue('C9','证号');
	$objActSheet->setCellValue('A10','是否年检');
	$objActSheet->setCellValue('C10','有效期始');
	$objActSheet->setCellValue('A11','有效期止');
	$objActSheet->setCellValue('C11','备注');
	
	$objActSheet->setCellValue('A12','证照名称');
	$objActSheet->setCellValue('C12','证号');
	$objActSheet->setCellValue('A13','是否年检');
	$objActSheet->setCellValue('C13','有效期始');
	$objActSheet->setCellValue('A14','有效期止');
	$objActSheet->setCellValue('C14','备注');
	
	$objActSheet->setCellValue('A15','证照名称');
	$objActSheet->setCellValue('C15','证号');
	$objActSheet->setCellValue('A16','是否年检');
	$objActSheet->setCellValue('C16','有效期始');
	$objActSheet->setCellValue('A17','有效期止');
	$objActSheet->setCellValue('C17','备注');
	
	$objActSheet->setCellValue('A18','证照名称');
	$objActSheet->setCellValue('C18','证号');
	$objActSheet->setCellValue('A19','是否年检');
	$objActSheet->setCellValue('C19','有效期始');
	$objActSheet->setCellValue('A20','有效期止');
	$objActSheet->setCellValue('C20','备注');
	
	$objActSheet->setCellValue('A21','证照名称');
	$objActSheet->setCellValue('C21','证号');
	$objActSheet->setCellValue('A22','是否年检');
	$objActSheet->setCellValue('C22','有效期始');
	$objActSheet->setCellValue('A23','有效期止');
	$objActSheet->setCellValue('C23','备注');
	
	$objActSheet->setCellValue('A24','证照名称');
	$objActSheet->setCellValue('C24','证号');
	$objActSheet->setCellValue('A25','是否年检');
	$objActSheet->setCellValue('C25','有效期始');
	$objActSheet->setCellValue('A26','有效期止');
	$objActSheet->setCellValue('C26','备注');
	
	$objActSheet->setCellValue('A27','证照名称');
	$objActSheet->setCellValue('C27','证号');
	$objActSheet->setCellValue('A28','是否年检');
	$objActSheet->setCellValue('C28','有效期始');
	$objActSheet->setCellValue('A29','有效期止');
	$objActSheet->setCellValue('C29','备注');
	
	$objActSheet->setCellValue('A30','证照名称');
	$objActSheet->setCellValue('C30','证号');
	$objActSheet->setCellValue('A31','是否年检');
	$objActSheet->setCellValue('C31','有效期始');
	$objActSheet->setCellValue('A32','有效期止');
	$objActSheet->setCellValue('C32','备注');
	
	$objActSheet->setCellValue('A33','证照名称');
	$objActSheet->setCellValue('C33','证号');
	$objActSheet->setCellValue('A34','是否年检');
	$objActSheet->setCellValue('C34','有效期始');
	$objActSheet->setCellValue('A35','有效期止');
	$objActSheet->setCellValue('C35','备注');
	
	$objActSheet->setCellValue('A36','证照名称');
	$objActSheet->setCellValue('C36','证号');
	$objActSheet->setCellValue('A37','是否年检');
	$objActSheet->setCellValue('C37','有效期始');
	$objActSheet->setCellValue('A38','有效期止');
	$objActSheet->setCellValue('C38','备注');
	
	$objActSheet->setCellValue('A39','证照名称');
	$objActSheet->setCellValue('C39','证号');
	$objActSheet->setCellValue('A40','是否年检');
	$objActSheet->setCellValue('C40','有效期始');
	$objActSheet->setCellValue('A41','有效期止');
	$objActSheet->setCellValue('C41','备注');
	
	$objActSheet->setCellValue('A42','证照名称');
	$objActSheet->setCellValue('C42','证号');
	$objActSheet->setCellValue('A43','是否年检');
	$objActSheet->setCellValue('C43','有效期始');
	$objActSheet->setCellValue('A44','有效期止');
	$objActSheet->setCellValue('C44','备注');
	
	$objActSheet->setCellValue('A45','证照名称');
	$objActSheet->setCellValue('C45','证号');
	$objActSheet->setCellValue('A46','是否年检');
	$objActSheet->setCellValue('C46','有效期始');
	$objActSheet->setCellValue('A47','有效期止');
	$objActSheet->setCellValue('C47','备注');

	$objActSheet->setCellValue('A48','相关批复');
	$objActSheet->setCellValue('A49','《安全评价报告》');
	$objActSheet->setCellValue('A50','文件名');
	$objActSheet->setCellValue('C50','是否批复');
	$objActSheet->setCellValue('A51','批复号');
	$objActSheet->setCellValue('C51','批复单位');
	$objActSheet->setCellValue('A52','批复时间');
	$objActSheet->setCellValue('C52','有效期始');
	$objActSheet->setCellValue('A53','有效期止');
	
	$objActSheet->setCellValue('A54','《水土保持方案》');
	$objActSheet->setCellValue('A55','文件名');
	$objActSheet->setCellValue('C55','是否批复');
	$objActSheet->setCellValue('A56','批复号');
	$objActSheet->setCellValue('C56','批复单位');
	$objActSheet->setCellValue('A57','批复时间');
	$objActSheet->setCellValue('C57','有效期始');
	$objActSheet->setCellValue('A58','有效期止');
	
	$objActSheet->setCellValue('A59','《土地复垦方案》');
	$objActSheet->setCellValue('A60','文件名');
	$objActSheet->setCellValue('C60','是否批复');
	$objActSheet->setCellValue('A61','批复号');
	$objActSheet->setCellValue('C61','批复单位');
	$objActSheet->setCellValue('A62','批复时间');
	$objActSheet->setCellValue('C62','有效期始');
	$objActSheet->setCellValue('A63','有效期止');
	
	$objActSheet->setCellValue('A64','《环境影响评价报告》');
	$objActSheet->setCellValue('A65','文件名');
	$objActSheet->setCellValue('C65','是否批复');
	$objActSheet->setCellValue('A66','批复号');
	$objActSheet->setCellValue('C66','批复单位');
	$objActSheet->setCellValue('A67','批复时间');
	$objActSheet->setCellValue('C67','有效期始');
	$objActSheet->setCellValue('A68','有效期止');
	
	$objActSheet->setCellValue('A69','《矿山地质环境保护与恢复治理方案》');
	$objActSheet->setCellValue('A70','文件名');
	$objActSheet->setCellValue('C70','是否批复');
	$objActSheet->setCellValue('A71','批复号');
	$objActSheet->setCellValue('C71','批复单位');
	$objActSheet->setCellValue('A72','批复时间');
	$objActSheet->setCellValue('C72','有效期始');
	$objActSheet->setCellValue('A73','有效期止');
	
	$objActSheet->setCellValue('A74','《矿山地质灾害评估报告》');
	$objActSheet->setCellValue('A75','文件名');
	$objActSheet->setCellValue('C75','是否批复');
	$objActSheet->setCellValue('A76','批复号');
	$objActSheet->setCellValue('C76','批复单位');
	$objActSheet->setCellValue('A77','批复时间');
	$objActSheet->setCellValue('C77','有效期始');
	$objActSheet->setCellValue('A78','有效期止');
	
	$objActSheet->setCellValue('A79','依法纳税和矿山环境恢复治理保证金缴纳情况');
	$objActSheet->setCellValue('A80','矿产资源补偿费');
	$objActSheet->setCellValue('C80','已缴税金总额');
	$objActSheet->setCellValue('A81','已缴资源税');
	$objActSheet->setCellValue('C81','已缴增值税');
	$objActSheet->setCellValue('A82','已缴企业所得税');
	$objActSheet->setCellValue('C82','应缴税金');
	$objActSheet->setCellValue('A83','欠缴税金');
	$objActSheet->setCellValue('C83','保证金');
	$objActSheet->setCellValue('A84','矿山环境治理保证金');
	$objActSheet->setCellValue('C84','土地复垦保证金');
	
	$objActSheet->setCellValue('A85','矿业权价款缴纳情况');
	$objActSheet->setCellValue('A86','应缴价款额度');
	$objActSheet->setCellValue('C86','已交价款额度');
	$objActSheet->setCellValue('A87','欠缴价款额度');
	$objActSheet->setCellValue('C87','应缴款时间');
	$objActSheet->setCellValue('A88','两年内无安全生产责任事故');
	
	$objActSheet->setCellValue('A89','安全生产责任事故情况');
	$objActSheet->setCellValue('A90','是否有安全事故');
	$objActSheet->setCellValue('C90','事故地点');
	$objActSheet->setCellValue('A91','发生时间');
	$objActSheet->setCellValue('C91','处理情况');
	
	$objActSheet->setCellValue('A92','环境污染事故情况');
	$objActSheet->setCellValue('A93','是否有环境污染事故');
	$objActSheet->setCellValue('C93','事故地点');
	$objActSheet->setCellValue('A94','发生时间');
	$objActSheet->setCellValue('C94','处理情况');
	
	$objActSheet->setCellValue('A95','3年内行政处罚情况');
	$objActSheet->setCellValue('A96','是否受处罚');
	$objActSheet->setCellValue('C96','处罚原因');
	$objActSheet->setCellValue('A97','处罚时间');
	$objActSheet->setCellValue('C97','责任人');
	$objActSheet->setCellValue('A98','是否符合矿产资源规划的要求');
	$objActSheet->setCellValue('C98','是否有通过审查的资源开发利用方案');
	
	$objActSheet->setCellValue('A99','安全设施完备度');
	$objActSheet->setCellValue('A100','是否有监测监控系统');
	$objActSheet->setCellValue('C100','是否有人员定位系统');
	$objActSheet->setCellValue('A101','是否有紧急避灾系统');
	$objActSheet->setCellValue('C101','是否有压风自救系统');
	$objActSheet->setCellValue('A102','是否有供水施救系统');
	$objActSheet->setCellValue('C102','是否有通讯联络系统');
/************Add 依法办矿 Data*******************/
	$objActSheet->setCellValue('B3','《营业执照》');
	$objActSheet->setCellValue('D3',$legaldataArray[0]->legal6Num);
	if ($legaldataArray[0]->legal6Ischeck == '1') $objActSheet->setCellValue('B4','是');
	else $objActSheet->setCellValue('B4','否');
	$objActSheet->setCellValue('D4',$legaldataArray[0]->legal6Deadline);
	$objActSheet->setCellValue('B5',$legaldataArray[0]->legal6Deadlinend);
	$objActSheet->setCellValue('D5',$legaldataArray[0]->legal6Comm);
	
	$objActSheet->setCellValue('B6','《采矿许可证》');
	$objActSheet->setCellValue('D6',$legaldataArray[0]->legal1Num);
	if ($legaldataArray[0]->legal1Ischeck == '1') $objActSheet->setCellValue('B7','是');
	else $objActSheet->setCellValue('B7','否');
	$objActSheet->setCellValue('D7',$legaldataArray[0]->legal1Deadline);
	$objActSheet->setCellValue('B8',$legaldataArray[0]->legal1Deadlinend);
	$objActSheet->setCellValue('D8',$legaldataArray[0]->legal1Comm);
	
	$objActSheet->setCellValue('B9','《矿山生产许可证》');
	$objActSheet->setCellValue('D9',$legaldataArray[0]->legal2Num);
	if ($legaldataArray[0]->legal2Ischeck == '1') $objActSheet->setCellValue('B10','是');
	else $objActSheet->setCellValue('B10','否');
	$objActSheet->setCellValue('D10',$legaldataArray[0]->legal2Deadline);
	$objActSheet->setCellValue('B11',$legaldataArray[0]->legal2Deadlinend);
	$objActSheet->setCellValue('D11',$legaldataArray[0]->legal2Comm);
	
	$objActSheet->setCellValue('B12','《矿山安全生产许可证》');
	$objActSheet->setCellValue('D12',$legaldataArray[0]->legal3Num);
	if ($legaldataArray[0]->legal3Ischeck == '1') $objActSheet->setCellValue('B13','是');
	else $objActSheet->setCellValue('B13','否');
	$objActSheet->setCellValue('D13',$legaldataArray[0]->legal3Deadline);
	$objActSheet->setCellValue('B14',$legaldataArray[0]->legal3Deadlinend);
	$objActSheet->setCellValue('D14',$legaldataArray[0]->legal3Comm);
	
	$objActSheet->setCellValue('B15','《矿长安全生产许可证》');
	$objActSheet->setCellValue('D15',$legaldataArray[0]->legal4Num);
	if ($legaldataArray[0]->legal4Ischeck == '1') $objActSheet->setCellValue('B16','是');
	else $objActSheet->setCellValue('B16','否');
	$objActSheet->setCellValue('D16',$legaldataArray[0]->legal4Deadline);
	$objActSheet->setCellValue('B17',$legaldataArray[0]->legal4Deadlinend);
	$objActSheet->setCellValue('D17',$legaldataArray[0]->legal4Comm);
	
	$objActSheet->setCellValue('B18','《矿长资格证》');
	$objActSheet->setCellValue('D18',$legaldataArray[0]->legal5Num);
	if ($legaldataArray[0]->legal5Ischeck == '1') $objActSheet->setCellValue('B19','是');
	else $objActSheet->setCellValue('B19','否');
	$objActSheet->setCellValue('D19',$legaldataArray[0]->legal5Deadline);
	$objActSheet->setCellValue('B20',$legaldataArray[0]->legal5Deadlinend);
	$objActSheet->setCellValue('D20',$legaldataArray[0]->legal5Comm);
	
	$objActSheet->setCellValue('B21','《民用爆炸物品使用许可证》');
	$objActSheet->setCellValue('D21',$legaldataArray[0]->legal7Num);
	if ($legaldataArray[0]->legal7Ischeck == '1') $objActSheet->setCellValue('B22','是');
	else $objActSheet->setCellValue('B22','否');
	$objActSheet->setCellValue('D22',$legaldataArray[0]->legal7Deadline);
	$objActSheet->setCellValue('B23',$legaldataArray[0]->legal7Deadlinend);
	$objActSheet->setCellValue('D23',$legaldataArray[0]->legal7Comm);
	
	$objActSheet->setCellValue('B24','《爆破物品存储证》');
	$objActSheet->setCellValue('D24',$legaldataArray[0]->legal8Num);
	if ($legaldataArray[0]->legal8Ischeck == '1') $objActSheet->setCellValue('B25','是');
	else $objActSheet->setCellValue('B25','否');
	$objActSheet->setCellValue('D25',$legaldataArray[0]->legal8Deadline);
	$objActSheet->setCellValue('B26',$legaldataArray[0]->legal8Deadlinend);
	$objActSheet->setCellValue('D26',$legaldataArray[0]->legal8Comm);
	
	$objActSheet->setCellValue('B27','《爆破人员安全资格证》');
	$objActSheet->setCellValue('D27',$legaldataArray[0]->legal10Num);
	if ($legaldataArray[0]->legal10Ischeck == '1') $objActSheet->setCellValue('B28','是');
	else $objActSheet->setCellValue('B28','否');
	$objActSheet->setCellValue('D28',$legaldataArray[0]->legal10Deadline);
	$objActSheet->setCellValue('B29',$legaldataArray[0]->legal10Deadlinend);
	$objActSheet->setCellValue('D29',$legaldataArray[0]->legal10Comm);
	
	$objActSheet->setCellValue('B30','《排污许可证》');
	$objActSheet->setCellValue('D30',$legaldataArray[0]->legal11Num);
	if ($legaldataArray[0]->legal11Ischeck == '1') $objActSheet->setCellValue('B31','是');
	else $objActSheet->setCellValue('B31','否');
	$objActSheet->setCellValue('D31',$legaldataArray[0]->legal11Deadline);
	$objActSheet->setCellValue('B32',$legaldataArray[0]->legal11Deadlinend);
	$objActSheet->setCellValue('D32',$legaldataArray[0]->legal11Comm);
	
	$objActSheet->setCellValue('B33','《取水许可证》');
	$objActSheet->setCellValue('D33',$legaldataArray[0]->legal12Num);
	if ($legaldataArray[0]->legal12Ischeck == '1') $objActSheet->setCellValue('B34','是');
	else $objActSheet->setCellValue('B34','否');
	$objActSheet->setCellValue('D34',$legaldataArray[0]->legal12Deadline);
	$objActSheet->setCellValue('B35',$legaldataArray[0]->legal12Deadlinend);
	$objActSheet->setCellValue('D35',$legaldataArray[0]->legal12Comm);
	
	$objActSheet->setCellValue('B36','《税务登记证》');
	$objActSheet->setCellValue('D36',$legaldataArray[0]->legal13Num);
	if ($legaldataArray[0]->legal13Ischeck == '1') $objActSheet->setCellValue('B37','是');
	else $objActSheet->setCellValue('B37','否');
	$objActSheet->setCellValue('D37',$legaldataArray[0]->legal13Deadline);
	$objActSheet->setCellValue('B38',$legaldataArray[0]->legal13Deadlinend);
	$objActSheet->setCellValue('D38',$legaldataArray[0]->legal13Comm);
	
	$objActSheet->setCellValue('B39','《组织机构代码证》');
	$objActSheet->setCellValue('D39',$legaldataArray[0]->legal14Num);
	if ($legaldataArray[0]->legal14Ischeck == '1') $objActSheet->setCellValue('B40','是');
	else $objActSheet->setCellValue('B40','否');
	$objActSheet->setCellValue('D40',$legaldataArray[0]->legal14Deadline);
	$objActSheet->setCellValue('B41',$legaldataArray[0]->legal14Deadlinend);
	$objActSheet->setCellValue('D41',$legaldataArray[0]->legal14Comm);
	
	$objActSheet->setCellValue('B42','《土地使用权证》');
	$objActSheet->setCellValue('D42',$legaldataArray[0]->legal15Num);
	if ($legaldataArray[0]->legal15Ischeck == '1') $objActSheet->setCellValue('B43','是');
	else $objActSheet->setCellValue('B43','否');
	$objActSheet->setCellValue('D43',$legaldataArray[0]->legal15Deadline);
	$objActSheet->setCellValue('B44',$legaldataArray[0]->legal15Deadlinend);
	$objActSheet->setCellValue('D44',$legaldataArray[0]->legal15Comm);
	
	$objActSheet->setCellValue('B45','《黄金生产批准书》');
	$objActSheet->setCellValue('D45',$legaldataArray[0]->legal16Num);
	if ($legaldataArray[0]->legal16Ischeck == '1') $objActSheet->setCellValue('B46','是');
	else $objActSheet->setCellValue('B46','否');
	$objActSheet->setCellValue('D46',$legaldataArray[0]->legal16Deadline);
	$objActSheet->setCellValue('B47',$legaldataArray[0]->legal16Deadlinend);
	$objActSheet->setCellValue('D47',$legaldataArray[0]->legal16Comm);
	
	
	$objActSheet->setCellValue('B50',$legaldataArray[0]->legalSafeName);
	if ($legaldataArray[0]->legalSafeIshave == '1') $objActSheet->setCellValue('D50','是');
	else $objActSheet->setCellValue('D50','是');
	$objActSheet->setCellValue('B51',$legaldataArray[0]->legalSafeNum);
	$objActSheet->setCellValue('D51',$legaldataArray[0]->legalSafeOrgan);
	$objActSheet->setCellValue('B52',$legaldataArray[0]->legalSafeTime);
	$objActSheet->setCellValue('D52',$legaldataArray[0]->legalSafeDeadline);
	$objActSheet->setCellValue('B53',$legaldataArray[0]->legalSafeDeadlinend);
	
	$objActSheet->setCellValue('B55',$legaldataArray[0]->legalWaterName);
	if ($legaldataArray[0]->legalWaterIshave == '1') $objActSheet->setCellValue('D55','是');
	else $objActSheet->setCellValue('D55','是');
	$objActSheet->setCellValue('B56',$legaldataArray[0]->legalWaterNum);
	$objActSheet->setCellValue('D56',$legaldataArray[0]->legalWaterOrgan);
	$objActSheet->setCellValue('B57',$legaldataArray[0]->legalWaterTime);
	$objActSheet->setCellValue('D57',$legaldataArray[0]->legalWaterDeadline);
	$objActSheet->setCellValue('B58',$legaldataArray[0]->legalWaterDeadlinend);
	
	$objActSheet->setCellValue('B60',$legaldataArray[0]->legalLandName);
	if ($legaldataArray[0]->legalLandIshave == '1') $objActSheet->setCellValue('D60','是');
	else $objActSheet->setCellValue('D60','是');
	$objActSheet->setCellValue('B61',$legaldataArray[0]->legalLandNum);
	$objActSheet->setCellValue('D61',$legaldataArray[0]->legalLandOrgan);
	$objActSheet->setCellValue('B62',$legaldataArray[0]->legalLandTime);
	$objActSheet->setCellValue('D62',$legaldataArray[0]->legalLandDeadline);
	$objActSheet->setCellValue('B63',$legaldataArray[0]->legalLandDeadlinend);
	
	$objActSheet->setCellValue('B65',$legaldataArray[0]->legalHuanjingpifuName);
	if ($legaldataArray[0]->legalHuanjingpifu == '1') $objActSheet->setCellValue('D65','是');
	else $objActSheet->setCellValue('D65','是');
	$objActSheet->setCellValue('B66',$legaldataArray[0]->legalHuanjingpifuNum);
	$objActSheet->setCellValue('D66',$legaldataArray[0]->legalHuanjingpifuOrgan);
	$objActSheet->setCellValue('B67',$legaldataArray[0]->legalHuanjingpifuTime);
	$objActSheet->setCellValue('D67',$legaldataArray[0]->legalHuanjingpifuDeadline);
	$objActSheet->setCellValue('B68',$legaldataArray[0]->legalHuanjingpifuDeadlinend);
	
	$objActSheet->setCellValue('B70',$legaldataArray[0]->legalDizhipifuName);
	if ($legaldataArray[0]->legalDizhipifu == '1') $objActSheet->setCellValue('D70','是');
	else $objActSheet->setCellValue('D70','是');
	$objActSheet->setCellValue('B71',$legaldataArray[0]->legalDizhipifuNum);
	$objActSheet->setCellValue('D71',$legaldataArray[0]->legalDizhipifuOrgan);
	$objActSheet->setCellValue('B72',$legaldataArray[0]->legalDizhipifuTime);
	$objActSheet->setCellValue('D72',$legaldataArray[0]->legalDizhipifuDeadline);
	$objActSheet->setCellValue('B73',$legaldataArray[0]->legalDizhipifuDeadlinend);
	
	$objActSheet->setCellValue('B75',$legaldataArray[0]->legalZaihaipifuName);
	if ($legaldataArray[0]->legalZaihaipifu == '1') $objActSheet->setCellValue('D75','是');
	else $objActSheet->setCellValue('D75','是');
	$objActSheet->setCellValue('B76',$legaldataArray[0]->legalZaihaipifuNum);
	$objActSheet->setCellValue('D76',$legaldataArray[0]->legalZaihaipifuOrgan);
	$objActSheet->setCellValue('B77',$legaldataArray[0]->legalZaihaipifuTime);
	$objActSheet->setCellValue('D77',$legaldataArray[0]->legalZaihaipifuDeadline);
	$objActSheet->setCellValue('B78',$legaldataArray[0]->legalZaihaipifuDeadlinend);
	
	$objActSheet->setCellValue('B80',$legaldataArray[0]->legalFeeRecom);
	$objActSheet->setCellValue('D80',$legaldataArray[0]->legalFeeOver);
	$objActSheet->setCellValue('B81',$legaldataArray[0]->legalFeeResource);
	$objActSheet->setCellValue('D81',$legaldataArray[0]->legalFeeValueadd);
	$objActSheet->setCellValue('B82',$legaldataArray[0]->legalFeeCompany);
	$objActSheet->setCellValue('D82',$legaldataArray[0]->legalFeeTopay);
	$objActSheet->setCellValue('B83',$legaldataArray[0]->legalFeeNotpay);
	$objActSheet->setCellValue('D83',$legaldataArray[0]->legalFeeEnsure);
	$objActSheet->setCellValue('B84',$legaldataArray[0]->legalFeeEnvironment);
	$objActSheet->setCellValue('D84',$legaldataArray[0]->legalFeeLand);
	
	$objActSheet->setCellValue('B86',$legaldataArray[0]->legalPriceTopay);
	$objActSheet->setCellValue('D86',$legaldataArray[0]->legalPricePayed);
	$objActSheet->setCellValue('B87',$legaldataArray[0]->legalPriceNopay);
	$objActSheet->setCellValue('D87',$legaldataArray[0]->legalPriceTime);
	$objActSheet->setCellValue('B88',$legaldataArray[0]->legalAccident);
	
	if ($legaldataArray[0]->legalAccidentIshave == '1') $objActSheet->setCellValue('B90','是');
	else $objActSheet->setCellValue('B90','否');
	$objActSheet->setCellValue('D90',$legaldataArray[0]->legalAccidentPlace);
	$objActSheet->setCellValue('B91',$legaldataArray[0]->legalAccidentTime);
	$objActSheet->setCellValue('D91',$legaldataArray[0]->legalAccidentDeal);
	
	if ($legaldataArray[0]->legalPolluteIshave == '1') $objActSheet->setCellValue('B93','是');
	else $objActSheet->setCellValue('B93','否');
	$objActSheet->setCellValue('D93',$legaldataArray[0]->legalPollutePlace);
	$objActSheet->setCellValue('B94',$legaldataArray[0]->legalPolluteTime);
	$objActSheet->setCellValue('D94',$legaldataArray[0]->legalPolluteDeal);
	
	if ($legaldataArray[0]->legalPunishIshave == '1') $objActSheet->setCellValue('B96','是');
	else $objActSheet->setCellValue('B96','否');
	$objActSheet->setCellValue('D96',$legaldataArray[0]->legalPunishReson);
	$objActSheet->setCellValue('B97',$legaldataArray[0]->legalPunishTime);
	$objActSheet->setCellValue('D97',$legaldataArray[0]->legalPunishPerson);
	if ($legaldataArray[0]->legalIsaccplan == '1') $objActSheet->setCellValue('B98','是');
	else $objActSheet->setCellValue('B98','否');
	if ($legaldataArray[0]->legalHaveplan == '1') $objActSheet->setCellValue('D98','是');
	else $objActSheet->setCellValue('D98','否');
	
	if ($legaldataArray[0]->legalSecureMonitor == '1') $objActSheet->setCellValue('B100','是');
	else $objActSheet->setCellValue('B100','否');
	if ($legaldataArray[0]->legalSecurePerson == '1') $objActSheet->setCellValue('D100','是');
	else $objActSheet->setCellValue('D100','否');
	if ($legaldataArray[0]->legalSecureEmergency == '1') $objActSheet->setCellValue('B101','是');
	else $objActSheet->setCellValue('B101','否');
	if ($legaldataArray[0]->legalSecureWind == '1') $objActSheet->setCellValue('D101','是');
	else $objActSheet->setCellValue('D101','否');
	if ($legaldataArray[0]->legalSecureWater == '1') $objActSheet->setCellValue('B102','是');
	else $objActSheet->setCellValue('B102','否');
	if ($legaldataArray[0]->legalSecureCommunicate == '1') $objActSheet->setCellValue('D102','是');
	else $objActSheet->setCellValue('D102','否');


/************Set Third Sheet*****规范管理************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(3);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('规范管理');		
/************Define variables****************/

/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D40");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(20);
	$objActSheet->getColumnDimension('B')->setWidth(25);
	$objActSheet->getColumnDimension('C')->setWidth(20);
	$objActSheet->getColumnDimension('D')->setWidth(25);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->getRowDimension('3')->setRowHeight(45);
	$objActSheet->getRowDimension('5')->setRowHeight(45);
	$objActSheet->getRowDimension('6')->setRowHeight(45);
	$objActSheet->getRowDimension('13')->setRowHeight(45);
	$objActSheet->getRowDimension('15')->setRowHeight(45);
	$objActSheet->mergeCells('B3:D3');
	$objActSheet->mergeCells('B5:D5');
	$objActSheet->mergeCells('B6:D6');
	$objActSheet->mergeCells('A7:D7');
	$objActSheet->mergeCells('B14:D14');
	$objActSheet->mergeCells('A15:D15');
	$objActSheet->mergeCells('B16:D16');
	$objActSheet->mergeCells('A18:D18');
	$objActSheet->mergeCells('A21:D21');
	$objActSheet->mergeCells('A24:D24');
	$objActSheet->mergeCells('A25:D25');
	$objActSheet->mergeCells('A33:D33');
	//设置颜色
	

	// ***********Add Title Data******************
	$objActSheet->setCellValue('A1','规划信息（规范管理）');
	
	$objActSheet->setCellValue('A2','绿色矿山发展制度建设情况');
	
	$objActSheet->setCellValue('A3','整体情况');
	$objActSheet->setCellValue('A4','是否有为绿色矿山修改生产管理制度');
	$objActSheet->setCellValue('C4','修改时间');
	$objActSheet->setCellValue('A5','修改条目');
	$objActSheet->setCellValue('A6','备注');
	
	$objActSheet->setCellValue('A7','规章制度完善情况');
	
	$objActSheet->setCellValue('A8','是否加入《绿色矿业公约》');
	$objActSheet->setCellValue('C8','是否有矿山安全生产责任制');
	$objActSheet->setCellValue('A9','是否有矿山安全生产综合管理制度');
	$objActSheet->setCellValue('C9','是否有矿山安全生产现场管理制度');
	$objActSheet->setCellValue('A10','是否有矿山安全生产监督检查管理制度');
	$objActSheet->setCellValue('C10','是否有矿山安全事故救护及处理制度');
	$objActSheet->setCellValue('A11','是否有矿山安全生产操作规程');
	$objActSheet->setCellValue('C11','是否落实安全生产责任制');
	$objActSheet->setCellValue('A12','安全生产专业人员是否持证上岗');
	$objActSheet->setCellValue('C12','是否有档案管理制度');
	$objActSheet->setCellValue('A13','绿色矿山建设是否实行法定代表人负责制');
	$objActSheet->setCellValue('A14','其他录入项');
	
	$objActSheet->setCellValue('A15','职工技术培训体系');
	
	$objActSheet->setCellValue('A16','整体情况');
	$objActSheet->setCellValue('A17','每年组织培训次数');
	$objActSheet->setCellValue('C17','平均每年培训投入经费');
	
	$objActSheet->setCellValue('A18','IS014001：2004环境管理体系认证');
	$objActSheet->setCellValue('A19','是否认证');
	$objActSheet->setCellValue('C19','认证单位');
	$objActSheet->setCellValue('A20','认证时间');
	$objActSheet->setCellValue('C20','有效期');
	
	$objActSheet->setCellValue('A21','ISO9001：2008质量管理体系认证 ');
	$objActSheet->setCellValue('A22','是否认证');
	$objActSheet->setCellValue('C22','认证单位');
	$objActSheet->setCellValue('A23','认证时间');
	$objActSheet->setCellValue('C23','有效期');
	
	$objActSheet->setCellValue('A24','前三年后五年详细信息');
	
	$objActSheet->setCellValue('A25','每年组织培训次数');
	$objActSheet->setCellValue('A26',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C26',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A27',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A28',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C28',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A29',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C29',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A30',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C30',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A31',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C31',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A32',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C32',$jiqi_8.'年实际值');
	
	$objActSheet->setCellValue('A33','每年培训投入经费');
	$objActSheet->setCellValue('A34',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C34',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A35',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A36',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C36',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A37',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C37',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A38',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C38',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A39',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C39',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A40',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C40',$jiqi_8.'年实际值');
/************Add 规范管理 Data*******************/
	$objActSheet->setCellValue('B3',$standarddataArray[0]->standardGrow);
	if ($standarddataArray[0]->standardGrowIsgreen == '1')	$objActSheet->setCellValue('B4','是');
	else $objActSheet->setCellValue('B4','否');
	$objActSheet->setCellValue('D4',$standarddataArray[0]->standardGrowTime);
	$objActSheet->setCellValue('B5',$standarddataArray[0]->standardGrowChange);
	$objActSheet->setCellValue('B6',$standarddataArray[0]->standardGrowComment);
	
	if ($standarddataArray[0]->standardIsConv == '1') $objActSheet->setCellValue('B8','是');
		else $objActSheet->setCellValue('B8','否');
	if ($standarddataArray[0]->standardIsDuty == '1') $objActSheet->setCellValue('D8','是');
		else $objActSheet->setCellValue('D8','否');
	if ($standarddataArray[0]->standardIsSafecom == '1') $objActSheet->setCellValue('B9','是');
		else $objActSheet->setCellValue('B9','否');
	if ($standarddataArray[0]->standardIsSafesite == '1') $objActSheet->setCellValue('D9','是');
		else $objActSheet->setCellValue('D9','否');
	if ($standarddataArray[0]->standardIsSafecontrol == '1') $objActSheet->setCellValue('B10','是');
		else $objActSheet->setCellValue('B10','否');
	if ($standarddataArray[0]->standardIsSafeacid == '1') $objActSheet->setCellValue('D10','是');
		else $objActSheet->setCellValue('D10','否');
	if ($standarddataArray[0]->standardIsSafeoper == '1') $objActSheet->setCellValue('B11','是');
		else $objActSheet->setCellValue('B11','否');
	if ($standarddataArray[0]->standardIsDutyok == '1') $objActSheet->setCellValue('D11','是');
		else $objActSheet->setCellValue('D11','否');
	if ($standarddataArray[0]->standardIsCard == '1') $objActSheet->setCellValue('B12','是');
		else $objActSheet->setCellValue('B12','否');
	if ($standarddataArray[0]->standardIsFile == '1') $objActSheet->setCellValue('D12','是');
		else $objActSheet->setCellValue('D12','否');
	if ($standarddataArray[0]->standardIsLegalman == '1') $objActSheet->setCellValue('B13','是');
		else $objActSheet->setCellValue('B13','否');
	$objActSheet->setCellValue('B14',$standarddataArray[0]->standardOther);
	
	
	$objActSheet->setCellValue('B16',$standarddataArray[0]->standardWorker);
	$objActSheet->setCellValue('B17',$standarddataArray[0]->standardWorkerCost);

	if ($standarddataArray[0]->standardIso4001 == '1') $objActSheet->setCellValue('B19','是');
		else $objActSheet->setCellValue('B19','否');
	$objActSheet->setCellValue('D19',$standarddataArray[0]->standardIso4001Organ);
	$objActSheet->setCellValue('B20',$standarddataArray[0]->standardIso4001Time);
	$objActSheet->setCellValue('D20',$standarddataArray[0]->standardIso4001Deadline);
	
	if ($standarddataArray[0]->standardIso9001 == '1') $objActSheet->setCellValue('B22','是');
		else $objActSheet->setCellValue('B22','否');
	$objActSheet->setCellValue('D22',$standarddataArray[0]->standardIso9001Organ);
	$objActSheet->setCellValue('B23',$standarddataArray[0]->standardIso9001Time);
	$objActSheet->setCellValue('D23',$standarddataArray[0]->standardIso9001Deadline);
	
	$objActSheet->setCellValue('B26',$standarddata35Array[0][0]);
	$objActSheet->setCellValue('D26',$standarddata35Array[0][1]);
	$objActSheet->setCellValue('B27',$standarddata35Array[0][2]);
	$objActSheet->setCellValue('B28',$standarddata35Array[0][3]);
	$objActSheet->setCellValue('D28',$standarddata35Array[0][4]);
	$objActSheet->setCellValue('B29',$standarddata35Array[0][5]);
	$objActSheet->setCellValue('D29',$standarddata35Array[0][6]);
	$objActSheet->setCellValue('B30',$standarddata35Array[0][7]);
	$objActSheet->setCellValue('D30',$standarddata35Array[0][8]);
	$objActSheet->setCellValue('B31',$standarddata35Array[0][9]);
	$objActSheet->setCellValue('D31',$standarddata35Array[0][10]);
	$objActSheet->setCellValue('B32',$standarddata35Array[0][11]);
	$objActSheet->setCellValue('D32',$standarddata35Array[0][12]);
	
	$objActSheet->setCellValue('B34',$standarddata35Array[1][0]);
	$objActSheet->setCellValue('D34',$standarddata35Array[1][1]);
	$objActSheet->setCellValue('B35',$standarddata35Array[1][2]);
	$objActSheet->setCellValue('B36',$standarddata35Array[1][3]);
	$objActSheet->setCellValue('D36',$standarddata35Array[1][4]);
	$objActSheet->setCellValue('B37',$standarddata35Array[1][5]);
	$objActSheet->setCellValue('D37',$standarddata35Array[1][6]);
	$objActSheet->setCellValue('B38',$standarddata35Array[1][7]);
	$objActSheet->setCellValue('D38',$standarddata35Array[1][8]);
	$objActSheet->setCellValue('B39',$standarddata35Array[1][9]);
	$objActSheet->setCellValue('D39',$standarddata35Array[1][10]);
	$objActSheet->setCellValue('B40',$standarddata35Array[1][11]);
	$objActSheet->setCellValue('D40',$standarddata35Array[1][12]);
	
/************Set 4th Sheet*****综合利用************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(4);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('综合利用');		
/************Define variables****************/
	$all = 1000;
	$col_35 = 29+($j-1)*21+1;
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D".$all);
	$objActSheet->mergeCells('A1:D1');
	// $objActSheet->mergeCells('A2:D2');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	
	$objActSheet->getColumnDimension('A')->setWidth(20);
	$objActSheet->getColumnDimension('B')->setWidth(25);
	$objActSheet->getColumnDimension('C')->setWidth(20);
	$objActSheet->getColumnDimension('D')->setWidth(25);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
//	$objActSheet->mergeCells('A'.$col_35.':D'.$col_35);
//	$col_35++;
//	$objActSheet->mergeCells('A'.$col_35.':D'.$col_35);


	//写入综合利用信息
	$objActSheet->setCellValue('A1','综合利用');
	
	// $objActSheet->setCellValue('A2','各矿种情况');
	$col = 2;

	$meiLv = array('采区回采率', '原煤入选率', '煤矸石与共伴生资源综合利用率', '矿井水综合利用率', '煤矸石综合利用率');
	$meiIndex = 276;
	$zhuLv = array('开采回采率','选矿回收率','采选综合回收率','综合利用率','矿产资源综合利用率','矿产资源总回收率','冶炼回收率','共伴生矿资源综合利用率','矿井水综合利用率','尾矿综合利用率','废气综合利用率','废渣综合利用率','贫化率','产率');
	$zhuIndex = 80;
	$banshengLv = array('选矿回收率', '冶炼回收率');
	$banIndex = 346;

	$label53 = array('-2年实际值','-1年实际值','0年实际值','1年规划值','1年实际值','2年规划值','2年实际值','3年规划值','3年实际值','4年规划值','4年实际值','5年规划值','5年实际值');
	//三率标准值label
	$labelBiao = array('开采回采率/采区回采率', '选矿回收率/原煤入选率', '综合利用率');
	//两个率之间的间隙
	$offset = 14;



	// echo $oreCnt.'<br>';
	// var_dump($oredataand35Array[1]);
	for($i = 0; $i<$oreCnt; $i++)
	{
		$objActSheet->setCellValue($colA[0].$col,'矿种名称');
		$objActSheet->setCellValue($colB[0].$col,$oredataand35Array[$i][0]);
		$objActSheet->setCellValue($colA[1].$col,'矿种类别');
		$objActSheet->setCellValue($colB[1].$col,$oredataand35Array[$i][1]);
		$objActSheet->getRowDimension($col)->setRowHeight(22);

		$objActSheet->getStyle($colA[0].$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setRGB($colorDanlv);
		$objActSheet->getStyle($colB[0].$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setRGB($colorDanlv);
		$objActSheet->getStyle($colA[1].$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setRGB($colorDanlv);
		$objActSheet->getStyle($colB[1].$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setRGB($colorDanlv);
		$col++;
		$lv = array();
		$index = 0;
		//设置矿种的各种率
		if($oredataand35Array[$i][0] == '煤矿' && $oredataand35Array[$i][1] == '主矿种')
		{
			$lv = $meiLv;
			$index = $meiIndex;
		} else if($oredataand35Array[$i][1] == '主矿种' && $oredataand35Array[$i][0] != '煤矿')
		{
			$lv = $zhuLv;
			$index = $zhuIndex;
		} else {
			$lv = $banshengLv;
			$index = $banIndex;
		}
		//写入各种率循环输出
		for($j=0; $j<count($lv); $j += 2)
		{
			$index2 = $index + $offset;
			$j2 = $j+1;
			// var_dump($index);
			//先写入各率总值，再写入5-3
			$objActSheet->setCellValue($colA[0].$col,$lv[$j]);
			$objActSheet->setCellValue($colB[0].$col,$oredataand35Array[$i][$index]);
			$objActSheet->getStyle($colA[0].$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorShenLv);
			$objActSheet->getStyle($colB[0].$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorShenLv);
			$index++;

			if($j2 < count($lv) )
			{
				$objActSheet->setCellValue($colA[1].$col,$lv[$j2]);
				$objActSheet->setCellValue($colB[1].$col,$oredataand35Array[$i][$index2]);

				$objActSheet->getStyle($colA[1].$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
						->getStartColor()->setRGB($colorShenLv);
				$objActSheet->getStyle($colB[1].$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
						->getStartColor()->setRGB($colorShenLv);
				$index2++;
			}
			$col++;
			//写入5-3
			for($k=0; $k<count($label53); $k++)
			{
				$objActSheet->setCellValue($colA[0].$col, $label53[$k]);
				$objActSheet->setCellValue($colB[0].$col, $oredataand35Array[$i][$index]);
				
				$index++;
				if($j2 < count($lv))
				{
					$objActSheet->setCellValue($colA[1].$col, $label53[$k]);
					$objActSheet->setCellValue($colB[1].$col, $oredataand35Array[$i][$index2]);
					
					$index2++;
				}
				$col++;
			}
			//下一批 5-3
			$index += 14;
		}

		//写入三率标准值
		$objActSheet->mergeCells('A'.$col.':D'.$col);
		$objActSheet->setCellValue('A'.$col,'三率标准值维护');
		$objActSheet->getStyle('A'.$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setRGB($colorLan);
		$col++;
		//写入三率标准值
		for($k=0; $k<3; $k++)
		{
			$colL = $colA[$k%2];
			$colV = $colB[$k%2];
			$objActSheet->setCellValue($colL.$col,$labelBiao[$k]);
			$objActSheet->getStyle($colL.$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorShenLv);
			//写入value
			$objActSheet->setCellValue($colV.$col,$oreStds[$i][$k][0]);
			$objActSheet->getStyle($colV.$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setRGB($colorShenLv);
			$col++;
			for($kk=1; $kk<7; $kk++)
			{
				$objActSheet->setCellValue($colL.$col,$oreStds[$i][$k][$kk]);
				$objActSheet->setCellValue($colV.$col,$oreStds[$i][$k][$kk+6]);
				$col++;
			}
			//一行写两列，col回退
			if($k==0) $col -= 7;
		}
	}
	//设置格式
	$objActSheet->setSharedStyle($styleNoBorder,'A'.$col.':'.$objActSheet->getHighestColumn().$all);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);

/************Set 5th Sheet*****科技创新************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(5);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('科技创新');		
/************Define variables****************/
	
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D18");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(20);
	$objActSheet->getColumnDimension('B')->setWidth(25);
	$objActSheet->getColumnDimension('C')->setWidth(20);
	$objActSheet->getColumnDimension('D')->setWidth(25);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->mergeCells('A5:D5');
	$objActSheet->mergeCells('A7:D7');
	$objActSheet->mergeCells('A10:D10');
	$objActSheet->mergeCells('A11:D11');

/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','规划信息（科技创新）');
	
	$objActSheet->setCellValue('A2','科技创新投入情况');

	$objActSheet->setCellValue('A3','科技创新投入占矿山企业总产值比重(%)');
	$objActSheet->setCellValue('C3','科技投入资金(万元)');
	$objActSheet->setCellValue('A4','总投资(万元)');
	$objActSheet->setCellValue('C4','比重是否小于1%');
	
	$objActSheet->setCellValue('A5','专利技术');
	
	$objActSheet->setCellValue('A6','发明专利数量');
	$objActSheet->setCellValue('C6','实用新型专利数量');
	
	$objActSheet->setCellValue('A7','技术人员比重');
	
	$objActSheet->setCellValue('A8','初级职称人员及比重(%)');
	$objActSheet->setCellValue('C8','中级职称人员及比重(%)');
	$objActSheet->setCellValue('A9','高级职称人员及比重(%)');
	$objActSheet->setCellValue('C9','总职工人数');
	
	$objActSheet->setCellValue('A10','前三年后五年详细数据');
	
	$objActSheet->setCellValue('A11','科技创新投入占矿山企业总产值比重(%)');
	
	$objActSheet->setCellValue('A12',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C12',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A13',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A14',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C14',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A15',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C15',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A16',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C16',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A17',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C17',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A18',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C18',$jiqi_8.'年实际值');

/************Add 科技创新 Data*******************/
	$objActSheet->setCellValue('B3',$sciencedataArray[0]->scienceRate);
	$objActSheet->setCellValue('D3',$sciencedataArray[0]->scienceRateScimoney);
	$objActSheet->setCellValue('B4',$sciencedataArray[0]->scienceRateAllmoney);
	$objActSheet->setCellValue('D4',$sciencedataArray[0]->scienceRateIsone);
	
	$objActSheet->setCellValue('B6',$sciencedataArray[0]->sciencePatentCreat);
	$objActSheet->setCellValue('D6',$sciencedataArray[0]->sciencePatentNewuse);
	
	$objActSheet->setCellValue('B8',$sciencedataArray[0]->scienceManrateLow);
	$objActSheet->setCellValue('D8',$sciencedataArray[0]->scienceManrateMid);
	$objActSheet->setCellValue('B9',$sciencedataArray[0]->scienceManrateHigh);
	$objActSheet->setCellValue('D9',$sciencedataArray[0]->scienceManrateAll);
	
	$objActSheet->setCellValue('B12',$science35Array[0][0]);
	$objActSheet->setCellValue('D12',$science35Array[0][1]);
	$objActSheet->setCellValue('B13',$science35Array[0][2]);
	$objActSheet->setCellValue('B14',$science35Array[0][3]);
	$objActSheet->setCellValue('D14',$science35Array[0][4]);
	$objActSheet->setCellValue('B15',$science35Array[0][5]);
	$objActSheet->setCellValue('D15',$science35Array[0][6]);
	$objActSheet->setCellValue('B16',$science35Array[0][7]);
	$objActSheet->setCellValue('D16',$science35Array[0][8]);
	$objActSheet->setCellValue('B17',$science35Array[0][9]);
	$objActSheet->setCellValue('D17',$science35Array[0][10]);
	$objActSheet->setCellValue('B18',$science35Array[0][11]);
	$objActSheet->setCellValue('D18',$science35Array[0][12]);
	
/************Set 6th Sheet*****节能减排************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(6);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('节能减排');		
/************Define variables****************/
	
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D63");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(25);
	$objActSheet->getColumnDimension('B')->setWidth(20);
	$objActSheet->getColumnDimension('C')->setWidth(25);
	$objActSheet->getColumnDimension('D')->setWidth(20);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->mergeCells('A15:D15');
	$objActSheet->mergeCells('A16:D16');
	$objActSheet->mergeCells('A24:D24');
	$objActSheet->mergeCells('A32:D32');
	$objActSheet->mergeCells('A40:D40');
	$objActSheet->mergeCells('A48:D48');
	$objActSheet->mergeCells('A56:D56');
/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','规划信息（节能减排）');
	
	$objActSheet->setCellValue('A2','单位工业总产值电耗(千瓦时/（万元*年）)');
	
	$objActSheet->setCellValue('A3','年工业用电总量(千瓦时)');
	$objActSheet->setCellValue('C3','年工业用电总量(千瓦时)');
	
	$objActSheet->setCellValue('A4','单位工业总产值水耗(立方米/万元)');
	
	$objActSheet->setCellValue('A5','年工业取水总量(立方米)');
	$objActSheet->setCellValue('C5','年工业总产值(万元)');
	
	$objActSheet->setCellValue('A6','单位万元工业总产值能耗(吨/万元)');
	
	$objActSheet->setCellValue('A7','年工业能源消费量(吨)');
	$objActSheet->setCellValue('C7','年工业总产值(万元)');
	
	$objActSheet->setCellValue('A8','矿山选矿废水重复利用率(%)');
	
	$objActSheet->setCellValue('A9','重复利用废水量(立方米)');
	$objActSheet->setCellValue('C9','生产中取用的新水量(立方米)');
	
	$objActSheet->setCellValue('A10','矿山固体废弃物综合利用率(%)');
	
	$objActSheet->setCellValue('A11','当年综合利用固体废弃物总量(吨)');
	$objActSheet->setCellValue('C11','当年固体废弃物产生量(吨)');
	$objActSheet->setCellValue('A12','往年贮存量总和(吨)');
	
	$objActSheet->setCellValue('A13','单位工业总产值SO2排放量(10^4 吨/万元)');
	
	$objActSheet->setCellValue('A14','年度矿区工业SO2排放量(10^4 吨)');
	$objActSheet->setCellValue('C14','年度矿区工业总产值指标(万元)');
	
	$objActSheet->setCellValue('A15','前三年后五年详细数据');
	
	$objActSheet->setCellValue('A16','单位工业总产值电耗(千瓦时/（万元*年）)');
	
	$objActSheet->setCellValue('A17',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C17',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A18',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A19',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C19',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A20',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C20',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A21',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C21',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A22',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C22',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A23',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C23',$jiqi_8.'年实际值');
	
	$objActSheet->setCellValue('A24','单位工业总产值水耗(立方米/万元)');
	
	$objActSheet->setCellValue('A25',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C25',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A26',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A27',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C27',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A28',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C28',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A29',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C29',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A30',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C30',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A31',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C31',$jiqi_8.'年实际值');
	
	$objActSheet->setCellValue('A32','单位万元工业总产值能耗(吨/万元)');
	
	$objActSheet->setCellValue('A33',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C33',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A34',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A35',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C35',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A36',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C36',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A37',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C37',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A38',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C38',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A39',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C39',$jiqi_8.'年实际值');
	
	$objActSheet->setCellValue('A40','矿山选矿废水重复利用率(%)');
	
	$objActSheet->setCellValue('A41',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C41',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A42',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A43',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C43',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A44',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C44',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A45',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C45',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A46',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C46',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A47',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C47',$jiqi_8.'年实际值');
	
	$objActSheet->setCellValue('A48','矿山固体废弃物综合利用率(%)');
	
	$objActSheet->setCellValue('A49',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C49',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A50',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A51',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C51',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A52',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C52',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A53',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C53',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A54',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C54',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A55',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C55',$jiqi_8.'年实际值');
	
	$objActSheet->setCellValue('A56','单位工业总产值SO2排放量(10^4 吨/万元)');

	$objActSheet->setCellValue('A57',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C57',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A58',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A59',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C59',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A60',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C60',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A61',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C61',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A62',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C62',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A63',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C63',$jiqi_8.'年实际值');
/***********Add 节能减排 Data***************************************/

	$objActSheet->setCellValue('B2',$energydataArray[0]->energyElect);
	
	$objActSheet->setCellValue('B3',$energydataArray[0]->energyElectUse);
	$objActSheet->setCellValue('D3',$energydataArray[0]->energyElectProduct);
	
	$objActSheet->setCellValue('B4',$energydataArray[0]->energyWater);
	
	$objActSheet->setCellValue('B5',$energydataArray[0]->energyWaterUse);
	$objActSheet->setCellValue('D5',$energydataArray[0]->energyWaterProduct);
	
	$objActSheet->setCellValue('B6',$energydataArray[0]->energyEnergy);
	
	$objActSheet->setCellValue('B7',$energydataArray[0]->energyEnergyUse);
	$objActSheet->setCellValue('D7',$energydataArray[0]->energyEnergyProduct);
	
	$objActSheet->setCellValue('B8',$energydataArray[0]->energyWaste);
	
	$objActSheet->setCellValue('B9',$energydataArray[0]->energyWasteUse);
	$objActSheet->setCellValue('D9',$energydataArray[0]->energyWasteNew);
	
	$objActSheet->setCellValue('B10',$energydataArray[0]->energyRubbish);
	
	$objActSheet->setCellValue('B11',$energydataArray[0]->energyRubbishUse);
	$objActSheet->setCellValue('D11',$energydataArray[0]->energyRubbishProduct);
	$objActSheet->setCellValue('B12',$energydataArray[0]->energyRubbishAll);
	
	$objActSheet->setCellValue('B13',$energydataArray[0]->energySo2);
	
	$objActSheet->setCellValue('B14',$energydataArray[0]->energySo2Product);
	$objActSheet->setCellValue('D14',$energydataArray[0]->energySo2Target);
	
	$objActSheet->setCellValue('B17',$energy35Array[0][0]);
	$objActSheet->setCellValue('D17',$energy35Array[0][1]);
	$objActSheet->setCellValue('B18',$energy35Array[0][2]);
	$objActSheet->setCellValue('B19',$energy35Array[0][3]);
	$objActSheet->setCellValue('D19',$energy35Array[0][4]);
	$objActSheet->setCellValue('B20',$energy35Array[0][5]);
	$objActSheet->setCellValue('B20',$energy35Array[0][6]);
	$objActSheet->setCellValue('B21',$energy35Array[0][7]);
	$objActSheet->setCellValue('D21',$energy35Array[0][8]);
	$objActSheet->setCellValue('B22',$energy35Array[0][9]);
	$objActSheet->setCellValue('D22',$energy35Array[0][10]);
	$objActSheet->setCellValue('B23',$energy35Array[0][11]);
	$objActSheet->setCellValue('D23',$energy35Array[0][12]);
	
	
	$objActSheet->setCellValue('B25',$energy35Array[1][0]);
	$objActSheet->setCellValue('D25',$energy35Array[1][1]);
	$objActSheet->setCellValue('B26',$energy35Array[1][2]);
	$objActSheet->setCellValue('B27',$energy35Array[1][3]);
	$objActSheet->setCellValue('D27',$energy35Array[1][4]);
	$objActSheet->setCellValue('B28',$energy35Array[1][5]);
	$objActSheet->setCellValue('D28',$energy35Array[1][6]);
	$objActSheet->setCellValue('B29',$energy35Array[1][7]);
	$objActSheet->setCellValue('D29',$energy35Array[1][8]);
	$objActSheet->setCellValue('B30',$energy35Array[1][9]);
	$objActSheet->setCellValue('D30',$energy35Array[1][10]);
	$objActSheet->setCellValue('B31',$energy35Array[1][11]);
	$objActSheet->setCellValue('D31',$energy35Array[1][12]);
	
	
	$objActSheet->setCellValue('B33',$energy35Array[2][0]);
	$objActSheet->setCellValue('D33',$energy35Array[2][1]);
	$objActSheet->setCellValue('B34',$energy35Array[2][2]);
	$objActSheet->setCellValue('B35',$energy35Array[2][3]);
	$objActSheet->setCellValue('D35',$energy35Array[2][4]);
	$objActSheet->setCellValue('B36',$energy35Array[2][5]);
	$objActSheet->setCellValue('D36',$energy35Array[2][6]);
	$objActSheet->setCellValue('B37',$energy35Array[2][7]);
	$objActSheet->setCellValue('D37',$energy35Array[2][8]);
	$objActSheet->setCellValue('B38',$energy35Array[2][9]);
	$objActSheet->setCellValue('D38',$energy35Array[2][10]);
	$objActSheet->setCellValue('B39',$energy35Array[2][11]);
	$objActSheet->setCellValue('D39',$energy35Array[2][12]);
	
	
	$objActSheet->setCellValue('B41',$energy35Array[3][0]);
	$objActSheet->setCellValue('D41',$energy35Array[3][1]);
	$objActSheet->setCellValue('B42',$energy35Array[3][2]);
	$objActSheet->setCellValue('B43',$energy35Array[3][3]);
	$objActSheet->setCellValue('D43',$energy35Array[3][4]);
	$objActSheet->setCellValue('B44',$energy35Array[3][5]);
	$objActSheet->setCellValue('D44',$energy35Array[3][6]);
	$objActSheet->setCellValue('B45',$energy35Array[3][7]);
	$objActSheet->setCellValue('D45',$energy35Array[3][8]);
	$objActSheet->setCellValue('B46',$energy35Array[3][9]);
	$objActSheet->setCellValue('D46',$energy35Array[3][10]);
	$objActSheet->setCellValue('B47',$energy35Array[3][11]);
	$objActSheet->setCellValue('D47',$energy35Array[3][12]);
	
	
	$objActSheet->setCellValue('B49',$energy35Array[4][0]);
	$objActSheet->setCellValue('D49',$energy35Array[4][1]);
	$objActSheet->setCellValue('B50',$energy35Array[4][2]);
	$objActSheet->setCellValue('B51',$energy35Array[4][3]);
	$objActSheet->setCellValue('B51',$energy35Array[4][4]);
	$objActSheet->setCellValue('B52',$energy35Array[4][5]);
	$objActSheet->setCellValue('D52',$energy35Array[4][6]);
	$objActSheet->setCellValue('B53',$energy35Array[4][7]);
	$objActSheet->setCellValue('D53',$energy35Array[4][8]);
	$objActSheet->setCellValue('B54',$energy35Array[4][9]);
	$objActSheet->setCellValue('D54',$energy35Array[4][10]);
	$objActSheet->setCellValue('B55',$energy35Array[4][11]);
	$objActSheet->setCellValue('D55',$energy35Array[4][12]);
	

	$objActSheet->setCellValue('B57',$energy35Array[5][0]);
	$objActSheet->setCellValue('D57',$energy35Array[5][1]);
	$objActSheet->setCellValue('B58',$energy35Array[5][2]);
	$objActSheet->setCellValue('B59',$energy35Array[5][3]);
	$objActSheet->setCellValue('D59',$energy35Array[5][4]);
	$objActSheet->setCellValue('B60',$energy35Array[5][5]);
	$objActSheet->setCellValue('D60',$energy35Array[5][6]);
	$objActSheet->setCellValue('B61',$energy35Array[5][7]);
	$objActSheet->setCellValue('D61',$energy35Array[5][8]);
	$objActSheet->setCellValue('B62',$energy35Array[5][9]);
	$objActSheet->setCellValue('D62',$energy35Array[5][10]);
	$objActSheet->setCellValue('B63',$energy35Array[5][11]);
	$objActSheet->setCellValue('D63',$energy35Array[5][12]);

/************Set 7th Sheet*****环境保护************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(7);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('环境保护');		
/************Define variables****************/
	
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D17");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(25);
	$objActSheet->getColumnDimension('B')->setWidth(20);
	$objActSheet->getColumnDimension('C')->setWidth(25);
	$objActSheet->getColumnDimension('D')->setWidth(20);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->mergeCells('A5:D5');
	$objActSheet->mergeCells('B8:D8');
	$objActSheet->mergeCells('A9:D9');
	$objActSheet->mergeCells('A10:D10');
/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','规划信息（环境保护）');
	
	$objActSheet->setCellValue('A2','绿化情况');
	
	$objActSheet->setCellValue('A3','绿化覆盖率(%)');
	$objActSheet->setCellValue('C3','矿区内全部绿化种植垂直投影面积(平方千米)');
	$objActSheet->setCellValue('A4','矿区面积(平方千米)');
	
	$objActSheet->setCellValue('A5','其他指标');
	
	$objActSheet->setCellValue('A6','是否执行环境保护"三同时"制度');
	$objActSheet->setCellValue('C6','矿区大气环境质量是否达到"环境空气质量标准"二级以上');
	$objActSheet->setCellValue('A7','是否达到《地表水环境质量标准》');
	$objActSheet->setCellValue('C7','是否达到《工业企业厂界噪声标准》');
	$objActSheet->setCellValue('A8','三年内有无发生重大地质灾害');
	
	$objActSheet->setCellValue('A9','前三年后五年详细数据');
	
	$objActSheet->setCellValue('A10','绿化覆盖率(%)');
	
	$objActSheet->setCellValue('A11',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C11',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A12',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A13',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C13',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A14',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C14',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A15',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C15',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A16',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C16',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A17',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C17',$jiqi_8.'年实际值');
/***********Add 环境保护 Data***************************************/

	$objActSheet->setCellValue('B3',$environmentdataArray[0]->environmentRate);
	$objActSheet->setCellValue('D3',$environmentdataArray[0]->environmentRateGreen);
	$objActSheet->setCellValue('B4',$environmentdataArray[0]->environmentRateArea);
	
	if ($environmentdataArray[0]->environmentIsThree == '1') $objActSheet->setCellValue('B6','是');
		else $objActSheet->setCellValue('B6','否');
	if ($environmentdataArray[0]->environmentIsAir == '1') $objActSheet->setCellValue('D6','是');
		else $objActSheet->setCellValue('D6','否');
	if ($environmentdataArray[0]->environmentIsWater == '1') $objActSheet->setCellValue('B7','是');
		else $objActSheet->setCellValue('B7','否');
	if ($environmentdataArray[0]->environmentIsSound == '1') $objActSheet->setCellValue('D7','是');
		else $objActSheet->setCellValue('D7','否');
	$objActSheet->setCellValue('B8',$environmentdataArray[0]->environmentIsDisaster);
	
	$objActSheet->setCellValue('B11',$environment35Array[0][0]);
	$objActSheet->setCellValue('D11',$environment35Array[0][1]);
	$objActSheet->setCellValue('B12',$environment35Array[0][2]);
	$objActSheet->setCellValue('B13',$environment35Array[0][3]);
	$objActSheet->setCellValue('D13',$environment35Array[0][4]);
	$objActSheet->setCellValue('B14',$environment35Array[0][5]);
	$objActSheet->setCellValue('D14',$environment35Array[0][6]);
	$objActSheet->setCellValue('B15',$environment35Array[0][7]);
	$objActSheet->setCellValue('D15',$environment35Array[0][8]);
	$objActSheet->setCellValue('B16',$environment35Array[0][9]);
	$objActSheet->setCellValue('D16',$environment35Array[0][10]);
	$objActSheet->setCellValue('B17',$environment35Array[0][11]);
	$objActSheet->setCellValue('D17',$environment35Array[0][12]);

/************Set 8th Sheet*****土地复垦************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(8);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('土地复垦');		
/************Define variables****************/
	
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D31");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(25);
	$objActSheet->getColumnDimension('B')->setWidth(20);
	$objActSheet->getColumnDimension('C')->setWidth(25);
	$objActSheet->getColumnDimension('D')->setWidth(20);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->mergeCells('A5:D5');
	$objActSheet->mergeCells('A7:D7');
	$objActSheet->mergeCells('A8:D8');
	$objActSheet->mergeCells('A16:D16');
	$objActSheet->mergeCells('A24:D24');
/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','规划信息（土地复垦）');
	
	$objActSheet->setCellValue('A2','土地复垦情况');
	
	$objActSheet->setCellValue('A3','土地复垦率(%)');
	$objActSheet->setCellValue('C3','已复垦土地面积(平方千米)');
	$objActSheet->setCellValue('A4','可复垦土地面积(平方千米)');
	
	$objActSheet->setCellValue('A5','其他');
	
	$objActSheet->setCellValue('A6','土地复垦每亩经济效益(万元)');
	$objActSheet->setCellValue('C6','土地复垦每亩平均投资(万元)');
	
	$objActSheet->setCellValue('A7','前三年后五年详细数据');
	
	$objActSheet->setCellValue('A8','土地复垦率(%)');
	
	$objActSheet->setCellValue('A9',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C9',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A10',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A11',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C11',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A12',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C12',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A13',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C13',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A14',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C14',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A15',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C15',$jiqi_8.'年实际值');
	
	$objActSheet->setCellValue('A16','土地复垦每亩经济效益(万元)');
	
	$objActSheet->setCellValue('A17',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C17',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A18',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A19',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C19',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A20',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C20',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A21',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C21',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A22',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C22',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A23',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C23',$jiqi_8.'年实际值');
	
	$objActSheet->setCellValue('A24','土地复垦每亩平均投资(万元)');
	
	$objActSheet->setCellValue('A25',$jiqi_1.'年实际值');
	$objActSheet->setCellValue('C25',$jiqi_2.'年实际值');
	$objActSheet->setCellValue('A26',$jiqi_3.'年实际值');
	$objActSheet->setCellValue('A27',$jiqi_4.'年规划值');
	$objActSheet->setCellValue('C27',$jiqi_4.'年实际值');
	$objActSheet->setCellValue('A28',$jiqi_5.'年规划值');
	$objActSheet->setCellValue('C28',$jiqi_5.'年实际值');
	$objActSheet->setCellValue('A29',$jiqi_6.'年规划值');
	$objActSheet->setCellValue('C29',$jiqi_6.'年实际值');
	$objActSheet->setCellValue('A30',$jiqi_7.'年规划值');
	$objActSheet->setCellValue('C30',$jiqi_7.'年实际值');
	$objActSheet->setCellValue('A31',$jiqi_8.'年规划值');
	$objActSheet->setCellValue('C31',$jiqi_8.'年实际值');
	
/************Add 土地复垦 Data*******************/

	$objActSheet->setCellValue('B3',$reclamationdataArray[0]->reclamationRate);
	$objActSheet->setCellValue('D3',$reclamationdataArray[0]->reclamationRateHave);
	$objActSheet->setCellValue('B4',$reclamationdataArray[0]->reclamationRateCan);
	
	$objActSheet->setCellValue('B6',$reclamationdataArray[0]->reclamationMoney);
	$objActSheet->setCellValue('D6',$reclamationdataArray[0]->reclamationPrice);
	
	$objActSheet->setCellValue('B9',$reclamation35Array[0][0]);
	$objActSheet->setCellValue('D9',$reclamation35Array[0][1]);
	$objActSheet->setCellValue('B10',$reclamation35Array[0][2]);
	$objActSheet->setCellValue('B11',$reclamation35Array[0][3]);
	$objActSheet->setCellValue('D11',$reclamation35Array[0][4]);
	$objActSheet->setCellValue('B12',$reclamation35Array[0][5]);
	$objActSheet->setCellValue('D12',$reclamation35Array[0][6]);
	$objActSheet->setCellValue('B13',$reclamation35Array[0][7]);
	$objActSheet->setCellValue('D13',$reclamation35Array[0][8]);
	$objActSheet->setCellValue('B14',$reclamation35Array[0][9]);
	$objActSheet->setCellValue('D14',$reclamation35Array[0][10]);
	$objActSheet->setCellValue('B15',$reclamation35Array[0][11]);
	$objActSheet->setCellValue('D15',$reclamation35Array[0][12]);
	
	$objActSheet->setCellValue('B17',$reclamation35Array[1][0]);
	$objActSheet->setCellValue('D17',$reclamation35Array[1][1]);
	$objActSheet->setCellValue('B18',$reclamation35Array[1][2]);
	$objActSheet->setCellValue('B19',$reclamation35Array[1][3]);
	$objActSheet->setCellValue('D19',$reclamation35Array[1][4]);
	$objActSheet->setCellValue('B20',$reclamation35Array[1][5]);
	$objActSheet->setCellValue('D20',$reclamation35Array[1][6]);
	$objActSheet->setCellValue('B21',$reclamation35Array[1][7]);
	$objActSheet->setCellValue('D21',$reclamation35Array[1][8]);
	$objActSheet->setCellValue('B22',$reclamation35Array[1][9]);
	$objActSheet->setCellValue('D22',$reclamation35Array[1][10]);
	$objActSheet->setCellValue('B23',$reclamation35Array[1][11]);
	$objActSheet->setCellValue('D23',$reclamation35Array[1][12]);
	
	$objActSheet->setCellValue('B25',$reclamation35Array[2][0]);
	$objActSheet->setCellValue('D25',$reclamation35Array[2][1]);
	$objActSheet->setCellValue('B26',$reclamation35Array[2][2]);
	$objActSheet->setCellValue('B27',$reclamation35Array[2][3]);
	$objActSheet->setCellValue('D27',$reclamation35Array[2][4]);
	$objActSheet->setCellValue('B28',$reclamation35Array[2][5]);
	$objActSheet->setCellValue('D28',$reclamation35Array[2][6]);
	$objActSheet->setCellValue('B29',$reclamation35Array[2][7]);
	$objActSheet->setCellValue('D29',$reclamation35Array[2][8]);
	$objActSheet->setCellValue('B30',$reclamation35Array[2][9]);
	$objActSheet->setCellValue('D30',$reclamation35Array[2][10]);
	$objActSheet->setCellValue('B31',$reclamation35Array[2][11]);
	$objActSheet->setCellValue('D31',$reclamation35Array[2][12]);

/************Set 9th Sheet*****社区和谐************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(9);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('社区和谐');		
/************Define variables****************/
	
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D14");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(25);
	$objActSheet->getColumnDimension('B')->setWidth(20);
	$objActSheet->getColumnDimension('C')->setWidth(25);
	$objActSheet->getColumnDimension('D')->setWidth(20);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->mergeCells('A6:D6');
	$objActSheet->mergeCells('B7:D7');
	$objActSheet->mergeCells('B8:D8');
	$objActSheet->mergeCells('B9:D9');
	$objActSheet->mergeCells('B10:D10');
	$objActSheet->mergeCells('B11:D11');
	$objActSheet->mergeCells('A12:D12');
	$objActSheet->mergeCells('B14:D14');
/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','规划信息（社区和谐）');
	
	$objActSheet->setCellValue('A2','捐赠情况');
	
	$objActSheet->setCellValue('A3','公共捐赠(万元)');
	$objActSheet->setCellValue('C3','基础设施(万元)');
	$objActSheet->setCellValue('A4','教育(万元)');
	$objActSheet->setCellValue('C4','渠道修建(万元)');
	$objActSheet->setCellValue('A5','路面拓宽硬化(万元)');
	$objActSheet->setCellValue('C5','备注(万元)');
	
	$objActSheet->setCellValue('A6','地区与企业之间的契合度');
	
	$objActSheet->setCellValue('A7','支农');
	
	$objActSheet->setCellValue('A8','支教');
	
	$objActSheet->setCellValue('A9','抗灾');
	
	$objActSheet->setCellValue('A10','赈灾');
	
	$objActSheet->setCellValue('A11','备注');
	
	$objActSheet->setCellValue('A12','职工情况');
	
	$objActSheet->setCellValue('A13','地区群众就业占矿山职工人数比重(%)');
	
	$objActSheet->setCellValue('A14','职工福利');

/************Add 社区和谐 Data*******************/
	
	$objActSheet->setCellValue('B3',$communitydataArray[0]->communityDonate);
	$objActSheet->setCellValue('D3',$communitydataArray[0]->communityDonateBase);
	$objActSheet->setCellValue('B4',$communitydataArray[0]->communityDonateStudy);
	$objActSheet->setCellValue('D4',$communitydataArray[0]->communityDonateChannel);
	$objActSheet->setCellValue('B5',$communitydataArray[0]->communityDonateRoad);
	$objActSheet->setCellValue('D5',$communitydataArray[0]->communityDonateComment);	
	
	$objActSheet->setCellValue('B7',$communitydataArray[0]->communityTacitFarm);
	
	$objActSheet->setCellValue('B8',$communitydataArray[0]->communityTacitTeach);
	
	$objActSheet->setCellValue('B9',$communitydataArray[0]->communityTacitDefeat);
	
	$objActSheet->setCellValue('B10',$communitydataArray[0]->communityTacitHelp);
	
	$objActSheet->setCellValue('B11',$communitydataArray[0]->communityTacitComment);
	
	$objActSheet->setCellValue('B13',$communitydataArray[0]->communityManrate);
	
	$objActSheet->setCellValue('B14',$communitydataArray[0]->communityWelfare);

/************Set 10th Sheet*****企业文化************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(10);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('企业文化');		
/************Define variables****************/
	
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D10");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(25);
	$objActSheet->getColumnDimension('B')->setWidth(20);
	$objActSheet->getColumnDimension('C')->setWidth(25);
	$objActSheet->getColumnDimension('D')->setWidth(20);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->mergeCells('B2:D2');
	$objActSheet->mergeCells('B3:D3');
	$objActSheet->mergeCells('B4:D4');
	$objActSheet->mergeCells('B5:D5');
	$objActSheet->mergeCells('B6:D6');
	$objActSheet->mergeCells('B7:D7');
	$objActSheet->mergeCells('B8:D8');
	$objActSheet->mergeCells('B9:D9');
	$objActSheet->mergeCells('B10:D10');
/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','规划信息（企业文化）');
	
	$objActSheet->setCellValue('A2','企业宗旨');
	$objActSheet->setCellValue('A3','经营理念');
	$objActSheet->setCellValue('A4','企业信条');
	$objActSheet->setCellValue('A5','组织形式');
	$objActSheet->setCellValue('A6','企业之歌');
	$objActSheet->setCellValue('A7','歌词');
	$objActSheet->setCellValue('A8','文体活动次数');
	$objActSheet->setCellValue('A9','企业内部刊物或报纸');
	$objActSheet->setCellValue('A10','其他');
	
/************Add 企业文化 Data*******************/
	
	$objActSheet->setCellValue('B2',$culturedataArray[0]->cultureAim);
	$objActSheet->setCellValue('B3',$culturedataArray[0]->cultureIdea);
	$objActSheet->setCellValue('B4',$culturedataArray[0]->cultureBelief);
	$objActSheet->setCellValue('B5',$culturedataArray[0]->cultureOrgan);
	$objActSheet->setCellValue('B6',$culturedataArray[0]->cultureOrganMusic);
	$objActSheet->setCellValue('B7',$culturedataArray[0]->cultureOrganMusicLrc);
	$objActSheet->setCellValue('B8',$culturedataArray[0]->cultureOrganActive);
	$objActSheet->setCellValue('B9',$culturedataArray[0]->cultureOrganPaper);
	$objActSheet->setCellValue('B10',$culturedataArray[0]->cultureOther);

/************Set 11st Sheet*****重点工程************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(11);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('重点工程');		
/************Define variables****************/
	$woektime_1 = $p->projectlWorktime+1;
	$woektime_2 = $p->projectlWorktime+2;
	$woektime_3 = $p->projectlWorktime+3;
	$woektime_4 = $p->projectlWorktime+4;
	$woektime_5 = $p->projectlWorktime+5;
/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','规划信息（重点工程）');
	$col = 2;
	$count = 0;
	foreach($projectdataArray as $p)
	{
		$objActSheet->setCellValue('A'.$col,'重点工程信息');
		$objActSheet->mergeCells('A'.$col.':D'.$col);
		$col++;
		$objActSheet->setCellValue('A'.$col,'项目编号');
		$objActSheet->setCellValue('C'.$col,'工程名称');
		$col++;
		$objActSheet->setCellValue('A'.$col,'工程类型');
		$col++;
		$objActSheet->setCellValue('A'.$col,'工程内容');
		$objActSheet->mergeCells('B'.$col.':D'.$col);
		$col++;
		$objActSheet->setCellValue('A'.$col,'开始时间');
		$objActSheet->setCellValue('C'.$col,'结束时间');
		$col++;
		$objActSheet->setCellValue('A'.$col,'工程投资(万元)');
		$objActSheet->setCellValue('C'.$col,'资金筹措');
		$col++;
		$objActSheet->setCellValue('A'.$col,'负责部门');
		$col++;
		$objActSheet->setCellValue('A'.$col,'预期效益');
		$col++;
		$objActSheet->setCellValue('A'.$col,$woektime_1.'年完成情况');
		$objActSheet->mergeCells('B'.$col.':D'.$col);
		$col++;
		$objActSheet->setCellValue('A'.$col,$woektime_2.'年完成情况');
		$objActSheet->mergeCells('B'.$col.':D'.$col);
		$col++;
		$objActSheet->setCellValue('A'.$col,$woektime_3.'年完成情况');
		$objActSheet->mergeCells('B'.$col.':D'.$col);
		$col++;
		$objActSheet->setCellValue('A'.$col,$woektime_4.'年完成情况');
		$objActSheet->mergeCells('B'.$col.':D'.$col);
		$col++;
		$objActSheet->setCellValue('A'.$col,$woektime_1.'年完成情况');
		$objActSheet->mergeCells('B'.$col.':D'.$col);
		$col++;
		
		$count = $col-1;
	}
		
/*************Set Excel Form*****************/
	//$objActSheet->setSharedStyle($style_obj,"A1:D10");	
	$objActSheet->setSharedStyle($style_obj,"A1:D".$count);
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(25);
	$objActSheet->getColumnDimension('B')->setWidth(20);
	$objActSheet->getColumnDimension('C')->setWidth(25);
	$objActSheet->getColumnDimension('D')->setWidth(20);
	$objActSheet->getRowDimension('1')->setRowHeight(30);

/************Add 重点工程 Data*******************/
	
	$col = 2;
	foreach($projectdataArray as $p)
	{
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectNum);
		$objActSheet->setCellValue('D'.$col,$p->projectName);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectType);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectDetail);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectlWorktime);
		$objActSheet->setCellValue('D'.$col,$p->projectStarttime);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectCost);
		$objActSheet->setCellValue('D'.$col,$p->projectMoney);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectOrgan);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectEffect);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectFinish1);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectFinish2);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectFinish3);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectFinish4);
		$col++;
		$objActSheet->setCellValue('B'.$col,$p->projectFinish5);
		$col++;
		
	}

/************Set 12st Sheet*****审核意见************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(12);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('审核意见');		
/************Define variables****************/

/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D11");	
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(25);
	$objActSheet->getColumnDimension('B')->setWidth(20);
	$objActSheet->getColumnDimension('C')->setWidth(25);
	$objActSheet->getColumnDimension('D')->setWidth(20);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->mergeCells('A4:D4');
	$objActSheet->mergeCells('A6:D6');
	$objActSheet->mergeCells('A8:D8');
	$objActSheet->mergeCells('A10:D10');

/************Add Title Data*******************/
	
	$objActSheet->setCellValue('A1','规划信息（审核意见）');
	
	$objActSheet->setCellValue('A2','国土资源部审核意见');
	$objActSheet->setCellValue('A3','审核时间');
	
	$objActSheet->setCellValue('A4','省级国土资源主管部门审核意见');
	$objActSheet->setCellValue('A5','审核时间');
	
	$objActSheet->setCellValue('A6','行业协会审核意见');
	$objActSheet->setCellValue('A7','审核时间');
	
	$objActSheet->setCellValue('A8','市级国土资源主管部门审核意见');
	$objActSheet->setCellValue('A9','审核时间');
	
	$objActSheet->setCellValue('A10','县级国土资源主管部门审核意见');
	$objActSheet->setCellValue('A11','审核时间');
	
/************Add 审核意见 Data*******************/
	
	$objActSheet->setCellValue('B2','国土资源部审核意见');
	$objActSheet->setCellValue('B3',$auditdataArray[0]->auditNationTime);
	
	$objActSheet->setCellValue('B4','省级国土资源主管部门审核意见');
	$objActSheet->setCellValue('B5',$auditdataArray[0]->auditPlaceTime);
	
	$objActSheet->setCellValue('B6','行业协会审核意见');
	$objActSheet->setCellValue('B7',$auditdataArray[0]->auditIndustryTime);
	
	$objActSheet->setCellValue('B8','市级国土资源主管部门审核意见');
	$objActSheet->setCellValue('B9','审核时间');
	
	$objActSheet->setCellValue('B10','县级国土资源主管部门审核意见');
	$objActSheet->setCellValue('B11','审核时间');
	
/************Set 13st Sheet*****专家信息************/
	$objPHPExcel->createSheet();
/************Add Title Data******************/	
	$objPHPExcel->setActiveSheetIndex(13);
	$objActSheet = $objPHPExcel->getActiveSheet();
/************Set Name of Sheet***************/
	$objActSheet->setTitle('专家信息');		
/************Define variables****************/

/************Add Title Data***********/
	$objActSheet->setCellValue('A1','规划信息（专家信息）');
	$col = 2;
	foreach ($expertdataArray as $e)
	{
		$objActSheet->setCellValue('A'.$col,'专家信息');
		$objActSheet->mergeCells('A'.$col.':D'.$col);
		$col++;
		
		$objActSheet->setCellValue('A'.$col,'姓名');
		$objActSheet->setCellValue('C'.$col,'性别');
		$col++;
		
		$objActSheet->setCellValue('A'.$col,'年龄');
		$objActSheet->setCellValue('C'.$col,'单位');
		$col++;
		
		$objActSheet->setCellValue('A'.$col,'职称');
		$objActSheet->setCellValue('C'.$col,'职务');
		$col++;
		
		$objActSheet->setCellValue('A'.$col,'专业');
		$objActSheet->setCellValue('C'.$col,'手机');
		$col++;
		
		$objActSheet->setCellValue('A'.$col,'固话');
		$objActSheet->setCellValue('C'.$col,'邮箱');
		$col++;
		
		$objActSheet->setCellValue('A'.$col,'传真');
		$objActSheet->setCellValue('C'.$col,'地址');
		$col++;
		
		$objActSheet->setCellValue('A'.$col,'专家意见');
		$objActSheet->mergeCells('B'.$col.':D'.$col);
		$col++;
		
		$objActSheet->setCellValue('A'.$col,'时间');
		$col++;
		
		$count = $col-1;
	}

/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D".$count);	
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(25);
	$objActSheet->getColumnDimension('B')->setWidth(20);
	$objActSheet->getColumnDimension('C')->setWidth(25);
	$objActSheet->getColumnDimension('D')->setWidth(20);
	$objActSheet->getRowDimension('1')->setRowHeight(30);

/************Add 专家信息 Data***********/
	$col = 2;
	foreach ($expertdataArray as $e)
	{
		$col++;
		
		$objActSheet->setCellValue('B'.$col,$e->expertName);
		$objActSheet->setCellValue('D'.$col,$e->expertSex);
		$col++;
		
		$objActSheet->setCellValue('B'.$col,$e->expertAge);
		$objActSheet->setCellValue('D'.$col,$e->expertCompany);
		$col++;
		
		$objActSheet->setCellValue('B'.$col,$e->expertTitles);
		$objActSheet->setCellValue('D'.$col,$e->expertWork);
		$col++;
		
		$objActSheet->setCellValue('B'.$col,$e->expertSubject);
		$objActSheet->setCellValue('D'.$col,$e->expertCellphone);
		$col++;
		
		$objActSheet->setCellValue('B'.$col,$e->expertLandhone);
		$objActSheet->setCellValue('D'.$col,$e->expertEmail);
		$col++;
		
		$objActSheet->setCellValue('B'.$col,$e->expertFax);
		$objActSheet->setCellValue('D'.$col,$e->expertAddress);
		$col++;
		
		$objActSheet->setCellValue('B'.$col,$e->expertIdea);
		$col++;
		
		$objActSheet->setCellValue('B'.$col,$e->expertTime);
		$col++;
		
	}
	
	
	$objPHPExcel->setActiveSheetIndex(0);
	
/***********output to a client’s web browser (Excel2007)***********/
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename='.mb_convert_encoding($mineid."规划信息表.xls","UTF-8","auto"));
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}
?>