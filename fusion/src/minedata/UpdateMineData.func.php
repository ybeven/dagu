<?php		
function UpdateMineData($mineid,$notice=null){
	global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	$curUser = $session->curUser;

	//删除所有原有53
	$data35 =  new Data35;
	$sql_2 = "select * from `data35` WHERE mine_id = $mineid";
	$dArray = $data35->getArray($sql_2,true);
	foreach($dArray as $d)
	{
		$data35->remove($d->id, false);
	}
	$data35 =  new Data35;
	$sql_2 = "select * from `data35` WHERE mine_id = $mineid";
	$dArray = $data35->getArray($sql_2,true);
	foreach($dArray as $d)
	{
		$data35->remove($d->id, false);
		
	}
	//找到基本规划信息id
	$basedata0 = new Basedata;
	$sql_basedata="select * from basedata WHERE mine_id = $mineid";
	$cArray = $basedata0->getArray($sql_basedata,true);
	foreach($cArray as $c)
	{
		$basedataid=$c->id;
	}
	//保存基本规划信息
	$basedata = new Basedata;
	$basedata->getByID($basedataid);
	$basedata->basedataBgname = $_POST[basedataBgname];                  //πÊªÆ±®∏Ê√˚≥∆
	$basedata->basedataLimit = $_POST[basedataLimit];                    //πÊªÆ∆⁄œﬁ 
	$basedata->basedataOrgan = $_POST[basedataOrgan];                    //◊È÷Øµ•Œª
	$basedata->basedataEstablish = $_POST[basedataEstablish];            //±‡÷∆µ•Œª
	$basedata->basedataBgdate = $_POST[basedataBgdate];                  //±®∏Ê≥ˆæﬂ»’∆⁄
	$basedata->basedataMinename = $_POST[basedataMinename];              //øÛ…Ω√˚≥∆
	$basedata->basedataBuildtime = $_POST[basedataBuildtime];            //øÛ…Ω≥…¡¢ ±º‰
	$basedata->basedataCompanyname = $_POST[basedataCompanyname];        //∆Û“µ√˚≥∆
	$basedata->basedataEnterpriseproperty = $_POST[basedataEnterpriseproperty];//∆Û“µ–‘÷ 
	$basedata->basedataOwedname = $_POST[basedataOwedname];              //À˘ Ù∆Û“µ√˚≥∆
	$basedata->basedataDivisionsSheng = $_POST[basedataDivisionsSheng];
	$basedata->basedataDivisionsShi = $_POST[basedataDivisionsShi];
	$basedata->basedataDivisionsXian = $_POST[basedataDivisionsXian];
	$basedata->basedataDivisionsZhen = $_POST[basedataDivisionsZhen];
	$basedata->basedataDivisions = $_POST[basedataDivisions];            //øÛ…Ω––’˛«¯ªÆ
	//$basedata->basedataAreaLongitude = $_POST[basedataAreaLongitude];  //πÊªÆ∑∂Œß æ≠∂»
	//$basedata->basedataAreaLatitude = $_POST[basedataAreaLatitude];    //Œ≥∂»
	$basedata->basedataArea = $_POST[basedataArea];                      //øÛ…Ω√Êª˝
	$basedata->basedataAuthority = $_POST[basedataAuthority];            //øÛ“µ»®¿‡–Õ
	//$basedata->basedataAuthDig = $_POST[basedataAuthDig];              //≤…øÛ»®
	//$basedata->basedataAuthFind = $_POST[basedataAuthFind];            //ÃΩøÛ»®
	$basedata->basedataAuthArea = $_POST[basedataAuthArea];            //ªÆ∂®øÛ«¯∑∂Œß
	$basedata->basedataAuthHeight = $_POST[basedataAuthHeight];        //≤…øÛ±Í∏ﬂ
	$basedata->basedataAuthNum = $_POST[basedataAuthNum];              //øÛ“µ»®÷§∫≈
	$basedata->basedataAuthAddress = $_POST[basedataAuthAddress];      //µ•Œªµÿ÷∑
	$basedata->basedataAuthDeadline = $_POST[basedataAuthDeadline];    //”––ß∆⁄œﬁ
	$basedata->basedataAuthGetime = $_POST[basedataAuthGetime];        //basedata_auth_getime
	$basedata->basedataAuthOrgan = $_POST[basedataAuthOrgan];          //∑¢÷§ª˙πÿ
	$basedata->basedataPointLongitude = $_POST[basedataPointLongitude];//øÛ«¯µÿ¿Ì◊¯±Í æ≠∂»
	$basedata->basedataPointLatitude = $_POST[basedataPointLatitude];  //Œ≥∂»
	$basedata->basedataDigtype = $_POST[basedataDigtype];                //øÛ…Ωø™≤…∑Ω Ω
	$basedata->basedataDigreturnrate = $_POST[basedataDigreturnrate];    //øÛ…Ωø™≤…ªÿ≤…¬ 
	$basedata->basedataMinertype = $_POST[basedataMinertype];            //øÛ…ΩøÛ¥≤¿‡–Õ
	//$basedata->basedataResourcesTotal = $_POST[basedataResourcesTotal];//øÛ…Ω◊ ‘¥¥¢¡ø
	$basedata->basedataResourcesHave = $_POST[basedataResourcesHave];  //±£”–¥¢¡ø
	$basedata->basedataResourcesAvailable = $_POST[basedataResourcesAvailable];      //ø…≤…¥¢¡ø
	$basedata->basedataLevel = $_POST[basedataLevel];                   //¥¢¡øº∂±
	$basedata->basedataMinescale = $_POST[basedataMinescale];           //¥¢¡øπÊƒ£
	$basedata->basedataProduceScale = $_POST[basedataProduceScale];   // µº …˙≤˙πÊƒ£
	$basedata->basedataProduceDig = $_POST[basedataProduceDig];       //ø™≤…πÊƒ£
	$basedata->basedataProduceFactory = $_POST[basedataProduceFactory];//—°øÛ≥ßπÊƒ£
	$basedata->basedataCoaltype = $_POST[basedataCoaltype];              //√∫÷÷
	$basedata->basedataSepa = $_POST[basedataSepa];                      //—°øÛ∑Ω∑®
	$basedata->basedataSepareturnrate = $_POST[basedataSepareturnrate];  //øÛ…Ω—°øÛªÿ ’¬ 
	$basedata->basedataPlan = $_POST[basedataPlan];                      //≤˙∆∑∑Ω∞∏
	//$basedata->basedataPlanMetal = $_POST[basedataPlanMetal];          //Ω Ù¿‡
	$basedata->basedataPlanMetalYuan = $_POST[basedataPlanMetalYuan];//‘≠øÛ
	$basedata->basedataPlanMetalJing = $_POST[basedataPlanMetalJing];//æ´øÛ
	$basedata->basedataPlanMetalChan = $_POST[basedataPlanMetalChan];//≤˙∆∑
	//$basedata->basedataPlanEnergy = $_POST[basedataPlanEnergy];        //ƒ‹‘¥¿‡
	$basedata->basedataPlanEnergyYuan = $_POST[basedataPlanEnergyYuan];//‘≠øÛ
	$basedata->basedataPlanEnergyJing = $_POST[basedataPlanEnergyJing];//æ´øÛ
	$basedata->basedataPlanEnergyShen = $_POST[basedataPlanEnergyShen];//…Óº”π§
	//$basedata->basedataPlanNot = $_POST[basedataPlanNot];                //∑«Ω Ù¿‡
	$basedata->basedataPlanNotYuan = $_POST[basedataPlanNotYuan];      //‘≠øÛ
	$basedata->basedataPlanNotJing = $_POST[basedataPlanNotJing];      //æ´øÛ
	$basedata->basedataPlanNotShen = $_POST[basedataPlanNotShen];      //…Óº”π§
	$basedata->basedataValue = $_POST[basedataValue];                      //øÛ…Ω∆Û“µ◊‹≤˙÷µ
	$basedata->basedataFee = $_POST[basedataFee];                          //øÛ…Ω∆Û“µ¿˚À∞
	$basedata->basedataProfit = $_POST[basedataProfit];                  //øÛ…Ω∆Û“µ¿˚»Û
	$basedata->basedataWorker = $_POST[basedataWorker];                    //øÛ…Ω∆Û“µ»À ˝
	$basedata->basedataReward = $_POST[basedataReward];                    //∆Û“µ»Ÿ”˛
	$basedata->basedataJiqizhi = $_POST[basedataJiqizhi];
	$basedata->basedataProduceDigUnit = $_POST[basedataProduceDigUnit];
	$basedata->basedataProduceFactoryUnit = $_POST[basedataProduceFactoryUnit];
	$basedata->basedataSepaCixuan = $_POST[basedataSepaCixuan];                    //∆Û“µ»Ÿ”˛
	$basedata->basedataSepaZhongxuan = $_POST[basedataSepaZhongxuan];
	$basedata->basedataSepaFuxuan = $_POST[basedataSepaFuxuan];
	$basedata->basedataSepaDianxuan = $_POST[basedataSepaDianxuan];
	$basedata->basedataGreenlvl = $_POST[basedataGreenlvl];  //绿色矿山级别
	$basedata->basedataYuanHua = $_POST[basedataYuanHua];
	$basedata->basedataWeiHua = $_POST[basedataWeiHua];
	$basedata->update();
	

	//基本信息53
	$basedata35 = new Data35;
	$basedata35->mineId=$mineid;
	$basedata35->data35name="basedataDigreturnrate";
	$basedata35->data35P1=$_POST[basedataDigreturnrate_bef1];
	$basedata35->data35P2=$_POST[basedataDigreturnrate_bef2];
	$basedata35->data35P3=$_POST[basedataDigreturnrate_bef3];
	$basedata35->data35Aj1=$_POST[basedataDigreturnrate_pre1];
	$basedata35->data35Aj2=$_POST[basedataDigreturnrate_pre2];
	$basedata35->data35Aj3=$_POST[basedataDigreturnrate_pre3];
	$basedata35->data35Aj4=$_POST[basedataDigreturnrate_pre4];
	$basedata35->data35Aj5=$_POST[basedataDigreturnrate_pre5];
	$basedata35->data35As1=$_POST[basedataDigreturnrate_pre1real];
	$basedata35->data35As2=$_POST[basedataDigreturnrate_pre2real];
	$basedata35->data35As3=$_POST[basedataDigreturnrate_pre3real];
	$basedata35->data35As4=$_POST[basedataDigreturnrate_pre4real];
	$basedata35->data35As5=$_POST[basedataDigreturnrate_pre5real];
	$basedata35->add();
	
//删除除定位gis地图经度纬度
    $zuobiao = new OreZuobiao;
    $sql_zuobiao = "select * from `oreZuobiao` WHERE mine_id = $mineid";
    $dArray = $zuobiao->getArray($sql_zuobiao,true);
    foreach ($dArray as $key) {
       	$zuobiao->remove($key->id, false);
    }
//保存除定位gis地图经纬度
    $flagZB=count($_POST[basedataZuobiaoJing]);
    for($i=0;$i<$flagZB;$i++){
    $minezuobiao = new OreZuobiao;
  	$minezuobiao->mineId=$mineid;
  	$minezuobiao->jingdu=$_POST[basedataZuobiaoJing][$i];
  	$minezuobiao->weidu=$_POST[basedataZuobiaoWei][$i];
  	$minezuobiao->add();
    }
    
/*	$basedata35 = new Data35;
	$basedata35->mineId=$mineid;
	$basedata35->data35name="basedataResourcesTotal";
	$basedata35->data35P1=$_POST[basedataResourcesTotal_bef1];
	$basedata35->data35P2=$_POST[basedataResourcesTotal_bef2];
	$basedata35->data35P3=$_POST[basedataResourcesTotal_bef3];
	$basedata35->data35Aj1=$_POST[basedataResourcesTotal_pre1];
	$basedata35->data35Aj2=$_POST[basedataResourcesTotal_pre2];
	$basedata35->data35Aj3=$_POST[basedataResourcesTotal_pre3];
	$basedata35->data35Aj4=$_POST[basedataResourcesTotal_pre4];
	$basedata35->data35Aj5=$_POST[basedataResourcesTotal_pre5];
	$basedata35->data35As1=$_POST[basedataResourcesTotal_pre1real];
	$basedata35->data35As2=$_POST[basedataResourcesTotal_pre2real];
	$basedata35->data35As3=$_POST[basedataResourcesTotal_pre3real];
	$basedata35->data35As4=$_POST[basedataResourcesTotal_pre4real];
	$basedata35->data35As5=$_POST[basedataResourcesTotal_pre5real];
	$basedata35->add();
	
	$basedata35 = new Data35;
	$basedata35->mineId=$mineid;
	$basedata35->data35name="basedataResourcesHave";
	$basedata35->data35P1=$_POST[basedataResourcesHave_bef1];
	$basedata35->data35P2=$_POST[basedataResourcesHave_bef2];
	$basedata35->data35P3=$_POST[basedataResourcesHave_bef3];
	$basedata35->data35Aj1=$_POST[basedataResourcesHave_pre1];
	$basedata35->data35Aj2=$_POST[basedataResourcesHave_pre2];
	$basedata35->data35Aj3=$_POST[basedataResourcesHave_pre3];
	$basedata35->data35Aj4=$_POST[basedataResourcesHave_pre4];
	$basedata35->data35Aj5=$_POST[basedataResourcesHave_pre5];
	$basedata35->data35As1=$_POST[basedataResourcesHave_pre1real];
	$basedata35->data35As2=$_POST[basedataResourcesHave_pre2real];
	$basedata35->data35As3=$_POST[basedataResourcesHave_pre3real];
	$basedata35->data35As4=$_POST[basedataResourcesHave_pre4real];
	$basedata35->data35As5=$_POST[basedataResourcesHave_pre5real];
	$basedata35->add();
*/	
	
	$basedata35 = new Data35;
	$basedata35->mineId=$mineid;
	$basedata35->data35name="basedataProduceScale";
	$basedata35->data35P1=$_POST[basedataProduceScale_bef1];
	$basedata35->data35P2=$_POST[basedataProduceScale_bef2];
	$basedata35->data35P3=$_POST[basedataProduceScale_bef3];
	$basedata35->data35Aj1=$_POST[basedataProduceScale_pre1];
	$basedata35->data35Aj2=$_POST[basedataProduceScale_pre2];
	$basedata35->data35Aj3=$_POST[basedataProduceScale_pre3];
	$basedata35->data35Aj4=$_POST[basedataProduceScale_pre4];
	$basedata35->data35Aj5=$_POST[basedataProduceScale_pre5];
	$basedata35->data35As1=$_POST[basedataProduceScale_pre1real];
	$basedata35->data35As2=$_POST[basedataProduceScale_pre2real];
	$basedata35->data35As3=$_POST[basedataProduceScale_pre3real];
	$basedata35->data35As4=$_POST[basedataProduceScale_pre4real];
	$basedata35->data35As5=$_POST[basedataProduceScale_pre5real];
	$basedata35->add();
	
	$basedata35 = new Data35;
	$basedata35->mineId=$mineid;
	$basedata35->data35name="basedataSepareturnrate";
	$basedata35->data35P1=$_POST[basedataSepareturnrate_bef1];
	$basedata35->data35P2=$_POST[basedataSepareturnrate_bef2];
	$basedata35->data35P3=$_POST[basedataSepareturnrate_bef3];
	$basedata35->data35Aj1=$_POST[basedataSepareturnrate_pre1];
	$basedata35->data35Aj2=$_POST[basedataSepareturnrate_pre2];
	$basedata35->data35Aj3=$_POST[basedataSepareturnrate_pre3];
	$basedata35->data35Aj4=$_POST[basedataSepareturnrate_pre4];
	$basedata35->data35Aj5=$_POST[basedataSepareturnrate_pre5];
	$basedata35->data35As1=$_POST[basedataSepareturnrate_pre1real];
	$basedata35->data35As2=$_POST[basedataSepareturnrate_pre2real];
	$basedata35->data35As3=$_POST[basedataSepareturnrate_pre3real];
	$basedata35->data35As4=$_POST[basedataSepareturnrate_pre4real];
	$basedata35->data35As5=$_POST[basedataSepareturnrate_pre5real];
	$basedata35->add();
	
	$basedata35 = new Data35;
	$basedata35->mineId=$mineid;
	$basedata35->data35name="basedataValue";
	$basedata35->data35P1=$_POST[basedataValue_bef1];
	$basedata35->data35P2=$_POST[basedataValue_bef2];
	$basedata35->data35P3=$_POST[basedataValue_bef3];
	$basedata35->data35Aj1=$_POST[basedataValue_pre1];
	$basedata35->data35Aj2=$_POST[basedataValue_pre2];
	$basedata35->data35Aj3=$_POST[basedataValue_pre3];
	$basedata35->data35Aj4=$_POST[basedataValue_pre4];
	$basedata35->data35Aj5=$_POST[basedataValue_pre5];
	$basedata35->data35As1=$_POST[basedataValue_pre1real];
	$basedata35->data35As2=$_POST[basedataValue_pre2real];
	$basedata35->data35As3=$_POST[basedataValue_pre3real];
	$basedata35->data35As4=$_POST[basedataValue_pre4real];
	$basedata35->data35As5=$_POST[basedataValue_pre5real];
	$basedata35->add();
	
	$basedata35 = new Data35;
	$basedata35->mineId=$mineid;
	$basedata35->data35name="basedataFee";
	$basedata35->data35P1=$_POST[basedataFee_bef1];
	$basedata35->data35P2=$_POST[basedataFee_bef2];
	$basedata35->data35P3=$_POST[basedataFee_bef3];
	$basedata35->data35Aj1=$_POST[basedataFee_pre1];
	$basedata35->data35Aj2=$_POST[basedataFee_pre2];
	$basedata35->data35Aj3=$_POST[basedataFee_pre3];
	$basedata35->data35Aj4=$_POST[basedataFee_pre4];
	$basedata35->data35Aj5=$_POST[basedataFee_pre5];
	$basedata35->data35As1=$_POST[basedataFee_pre1real];
	$basedata35->data35As2=$_POST[basedataFee_pre2real];
	$basedata35->data35As3=$_POST[basedataFee_pre3real];
	$basedata35->data35As4=$_POST[basedataFee_pre4real];
	$basedata35->data35As5=$_POST[basedataFee_pre5real];
	$basedata35->add();
	


	$basedata35 = new Data35;
	$basedata35->mineId=$mineid;
	$basedata35->data35name="basedataProfit";
	$basedata35->data35P1=$_POST[basedataProfit_bef1];
	$basedata35->data35P2=$_POST[basedataProfit_bef2];
	$basedata35->data35P3=$_POST[basedataProfit_bef3];
	$basedata35->data35Aj1=$_POST[basedataProfit_pre1];
	$basedata35->data35Aj2=$_POST[basedataProfit_pre2];
	$basedata35->data35Aj3=$_POST[basedataProfit_pre3];
	$basedata35->data35Aj4=$_POST[basedataProfit_pre4];
	$basedata35->data35Aj5=$_POST[basedataProfit_pre5];
	$basedata35->data35As1=$_POST[basedataProfit_pre1real];
	$basedata35->data35As2=$_POST[basedataProfit_pre2real];
	$basedata35->data35As3=$_POST[basedataProfit_pre3real];
	$basedata35->data35As4=$_POST[basedataProfit_pre4real];
	$basedata35->data35As5=$_POST[basedataProfit_pre5real];
	$basedata35->add();
	
//
	


	//找到依法办矿信息id
	$legal0 = new Legal;
	$sql_legal="select id from `legal` WHERE mine_id = $mineid";
	$cArray = $legal0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$legalid=$c->id;
	}
	
	
	 //依法办矿
    $legal=new Legal;
	$legal->getByID($legalid);
$legal->legal1Num=$_POST[legal1Num];
    $legal->legal1Deadline=$_POST[legal1Deadline];
    $legal->legal1Ischeck=$_POST[legal1Ischeck];
    $legal->legal1Comm=$_POST[legal1Comm];
    $legal->legal2Num=$_POST[legal2Num];
    $legal->legal2Deadline=$_POST[legal2Deadline];
    $legal->legal2Ischeck=$_POST[legal2Ischeck];
    $legal->legal2Comm=$_POST[legal2Comm];
    $legal->legal3Num=$_POST[legal3Num];
    $legal->legal3Deadline=$_POST[legal3Deadline];
    $legal->legal3Ischeck=$_POST[legal3Ischeck];
    $legal->legal3Comm=$_POST[legal3Comm];
    $legal->legal4Num=$_POST[legal4Num];
    $legal->legal4Deadline=$_POST[legal4Deadline];
    $legal->legal4Ischeck=$_POST[legal4Ischeck];
    $legal->legal4Comm=$_POST[legal4Comm];
    $legal->legal5Num=$_POST[legal5Num];
    $legal->legal5Deadline=$_POST[legal5Deadline];
    $legal->legal5Ischeck=$_POST[legal5Ischeck];
    $legal->legal5Comm=$_POST[legal5Comm];
    $legal->legal6Num=$_POST[legal6Num];
    $legal->legal6Deadline=$_POST[legal6Deadline];
    $legal->legal6Ischeck=$_POST[legal6Ischeck];
    $legal->legal6Comm=$_POST[legal6Comm];
    $legal->legal7Num=$_POST[legal7Num];
    $legal->legal7Deadline=$_POST[legal7Deadline];
    $legal->legal7Ischeck=$_POST[legal7Ischeck];
    $legal->legal7Comm=$_POST[legal7Comm];
    $legal->legal8Num=$_POST[legal8Num];
    $legal->legal8Deadline=$_POST[legal8Deadline];
    $legal->legal8Ischeck=$_POST[legal8Ischeck];
    $legal->legal8Comm=$_POST[legal8Comm];
    $legal->legal10Num=$_POST[legal10Num];
    $legal->legal10Deadline=$_POST[legal10Deadline];
    $legal->legal10Ischeck=$_POST[legal10Ischeck];
    $legal->legal10Comm=$_POST[legal10Comm];
    $legal->legal11Num=$_POST[legal11Num];
    $legal->legal11Deadline=$_POST[legal11Deadline];
    $legal->legal11Ischeck=$_POST[legal11Ischeck];
    $legal->legal11Comm=$_POST[legal11Comm];
    $legal->legal12Num=$_POST[legal12Num];
    $legal->legal12Deadline=$_POST[legal12Deadline];
    $legal->legal12Ischeck=$_POST[legal12Ischeck];
    $legal->legal12Comm=$_POST[legal12Comm];
    $legal->legal13Num=$_POST[legal13Num];
    $legal->legal13Deadline=$_POST[legal13Deadline];
    $legal->legal13Ischeck=$_POST[legal13Ischeck];
    $legal->legal13Comm=$_POST[legal13Comm];
    $legal->legal14Num=$_POST[legal14Num];
    $legal->legal14Deadline=$_POST[legal14Deadline];
    $legal->legal14Ischeck=$_POST[legal14Ischeck];
    $legal->legal14Comm=$_POST[legal14Comm];
    $legal->legal15Num=$_POST[legal15Num];
    $legal->legal15Deadline=$_POST[legal15Deadline];
    $legal->legal15Ischeck=$_POST[legal15Ischeck];
    $legal->legal15Comm=$_POST[legal15Comm];
    $legal->legalSafeIshave=$_POST[legalSafeIshave];
    $legal->legalSafeName=$_POST[legalSafeName];
    $legal->legalSafeOrgan=$_POST[legalSafeOrgan];
    $legal->legalSafeTime=$_POST[legalSafeTime];
    $legal->legalSafeDeadline=$_POST[legalSafeDeadline];
    $legal->legalSafeDeadlinend=$_POST[legalSafeDeadlinend];
    $legal->legalWaterIshave=$_POST[legalWaterIshave];
    $legal->legalWaterName=$_POST[legalWaterName];
    $legal->legalWaterOrgan=$_POST[legalWaterOrgan];
    $legal->legalWaterTime=$_POST[legalWaterTime];
    $legal->legalWaterDeadline=$_POST[legalWaterDeadline];
    $legal->legalWaterDeadlinend=$_POST[legalWaterDeadlinend];
    $legal->legalLandIshave=$_POST[legalLandIshave];
    $legal->legalLandName=$_POST[legalLandName];
    $legal->legalLandOrgan=$_POST[legalLandOrgan];
    $legal->legalLandTime=$_POST[legalLandTime];
    $legal->legalLandDeadline=$_POST[legalLandDeadline];
    $legal->legalLandDeadlinend=$_POST[legalLandDeadlinend];
    $legal->legalFee=$_POST[legalFee];
    $legal->legalFeeRecom=$_POST[legalFeeRecom];
    $legal->legalFeeOver=$_POST[legalFeeOver];
    $legal->legalFeeResource=$_POST[legalFeeResource];
    $legal->legalFeeValueadd=$_POST[legalFeeValueadd];
    $legal->legalFeeCompany=$_POST[legalFeeCompany];
    $legal->legalFeeTopay=$_POST[legalFeeTopay];
    $legal->legalFeeNotpay=$_POST[legalFeeNotpay];
    $legal->legalFeeEnsure=$_POST[legalFeeEnsure];
    $legal->legalFeeEnvironment=$_POST[legalFeeEnvironment];
    $legal->legalFeeLand=$_POST[legalFeeLand];
    $legal->legalAccident=$_POST[legalAccident];
    $legal->legalAccidentIshave=$_POST[legalAccidentIshave];
    $legal->legalAccidentPlace=$_POST[legalAccidentPlace];
    $legal->legalAccidentTime=$_POST[legalAccidentTime];
    $legal->legalAccidentDeal=$_POST[legalAccidentDeal];
    $legal->legalPollute=$_POST[legalPollute];
    $legal->legalPolluteIshave=$_POST[legalPolluteIshave];
    $legal->legalPollutePlace=$_POST[legalPollutePlace];
    $legal->legalPolluteTime=$_POST[legalPolluteTime];
    $legal->legalPolluteDeal=$_POST[legalPolluteDeal];
    $legal->legalPunish=$_POST[legalPunish];
    $legal->legalPunishIshave=$_POST[legalPunishIshave];
    $legal->legalPunishReson=$_POST[legalPunishReson];
    $legal->legalPunishTime=$_POST[legalPunishTime];
    $legal->legalPunishPerson=$_POST[legalPunishPerson];
    $legal->legalIsaccplan=$_POST[legalIsaccplan];
    $legal->legalHaveplan=$_POST[legalHaveplan];
    $legal->legalSecure=$_POST[legalSecure];
    $legal->legalSecureMonitor=$_POST[legalSecureMonitor];
    $legal->legalSecurePerson=$_POST[legalSecurePerson];
    $legal->legalSecureEmergency=$_POST[legalSecureEmergency];
    $legal->legalSecureWind=$_POST[legalSecureWind];
    $legal->legalSecureWater=$_POST[legalSecureWater];
    $legal->legalSecureCommunicate=$_POST[legalSecureCommunicate];
    $legal->legalPriceTopay=$_POST[legalPriceTopay];
    $legal->legalPricePayed=$_POST[legalPricePayed];
    $legal->legalPriceNopay=$_POST[legalPriceNopay];
    $legal->legalPriceTime=$_POST[legalPriceTime];
    $legal->legal1Deadlinend=$_POST[legal1Deadlinend];
    $legal->legal2Deadlinend=$_POST[legal2Deadlinend];
    $legal->legal3Deadlinend=$_POST[legal3Deadlinend];
    $legal->legal4Deadlinend=$_POST[legal4Deadlinend];
    $legal->legal5Deadlinend=$_POST[legal5Deadlinend];
    $legal->legal6Deadlinend=$_POST[legal6Deadlinend];
    $legal->legal7Deadlinend=$_POST[legal7Deadlinend];
    $legal->legal8Deadlinend=$_POST[legal8Deadlinend];
    $legal->legal10Deadlinend=$_POST[legal10Deadlinend];
    $legal->legal11Deadlinend=$_POST[legal11Deadlinend];
    $legal->legal12Deadlinend=$_POST[legal12Deadlinend];
    $legal->legal13Deadlinend=$_POST[legal13Deadlinend];
    $legal->legal14Deadlinend=$_POST[legal14Deadlinend];
    $legal->legal15Deadlinend=$_POST[legal15Deadlinend];
    $legal->legal16Num=$_POST[legal16Num];
    $legal->legal16Deadline=$_POST[legal16Deadline];
    $legal->legal16Ischeck=$_POST[legal16Ischeck];
    $legal->legal16Comm=$_POST[legal16Comm];
    $legal->legal16Deadlinend=$_POST[legal16Deadlinend];
    $legal->legalSafeNum=$_POST[legalSafeNum];
    $legal->legalWaterNum=$_POST[legalWaterNum];
    $legal->legalLandNum=$_POST[legalLandNum];
    $legal->legalHuanjingpifu=$_POST[legalHuanjingpifu];
    $legal->legalHuanjingpifuName=$_POST[legalHuanjingpifuName];
    $legal->legalHuanjingpifuNum=$_POST[legalHuanjingpifuNum];
    $legal->legalHuanjingpifuOrgan=$_POST[legalHuanjingpifuOrgan];
    $legal->legalHuanjingpifuDeadline=$_POST[legalHuanjingpifuDeadline];
    $legal->legalHuanjingpifuDeadlinend=$_POST[legalHuanjingpifuDeadlinend];
    $legal->legalHuanjingpifuTime=$_POST[legalHuanjingpifuTime];
    $legal->legalDizhipifu=$_POST[legalDizhipifu];
    $legal->legalDizhipifuName=$_POST[legalDizhipifuName];
    $legal->legalDizhipifuNum=$_POST[legalDizhipifuNum];
    $legal->legalDizhipifuOrgan=$_POST[legalDizhipifuOrgan];
    $legal->legalDizhipifuDeadline=$_POST[legalDizhipifuDeadline];
    $legal->legalDizhipifuDeadlinend=$_POST[legalDizhipifuDeadlinend];
    $legal->legalDizhipifuTime=$_POST[legalDizhipifuTime];
    $legal->legalZaihaipifu=$_POST[legalZaihaipifu];
    $legal->legalZaihaipifuName=$_POST[legalZaihaipifuName];
    $legal->legalZaihaipifuNum=$_POST[legalZaihaipifuNum];
    $legal->legalZaihaipifuOrgan=$_POST[legalZaihaipifuOrgan];
    $legal->legalZaihaipifuDeadline=$_POST[legalZaihaipifuDeadline];
    $legal->legalZaihaipifuDeadlinend=$_POST[legalZaihaipifuDeadlinend];
    $legal->legalZaihaipifuTime=$_POST[legalZaihaipifuTime];
    $legal->update();	
	
	//找到规范管理信息id
	$standard0 = new Standard;
	$sql_legal="select id from `standard` WHERE mine_id = $mineid";
	$cArray = $standard0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$standardid=$c->id;
	}
	
	//规范管理
    $standard=new Standard;
	$standard->getByID($standardid);
	$standard->standardManage=$_POST[standardManage];                  
	$standard->standardGrow=$_POST[standardGrow];  
	$standard->standardGrowIsgreen=$_POST[standardGrowIsgreen];
	$standard->standardGrowChange=$_POST[standardGrowChange];                  
	$standard->standardGrowTime=$_POST[standardGrowTime];  
	$standard->standardGrowComment=$_POST[standardGrowComment];
	$standard->standardIsConv=$_POST[standardIsConv];                  
	$standard->standardIsDuty=$_POST[standardIsDuty];  
	$standard->standardIsSafecom=$_POST[standardIsSafecom];
	$standard->standardIsSafesite=$_POST[standardIsSafesite];                  
	$standard->standardIsSafecontrol=$_POST[standardIsSafecontrol];  
	$standard->standardIsSafeacid=$_POST[standardIsSafeacid];
	$standard->standardIsSafeoper=$_POST[standardIsSafeoper];                  
	$standard->standardIsDutyok=$_POST[standardIsDutyok];  
	$standard->standardIsCard=$_POST[standardIsCard];
	$standard->standardIsFile=$_POST[standardIsFile];                  
	$standard->standardIsLegalman=$_POST[standardIsLegalman];  
	$standard->standardOther=$_POST[standardOther];
    $standard->standardWorker=$_POST[standardWorker];
    $standard->standardWorkerCount=$_POST[standardWorkerCount]; 
    $standard->standardWorkerCost=$_POST[standardWorkerCost]; 
    $standard->standardIso4001=$_POST[standardIso4001];
    $standard->standardIso4001Organ=$_POST[standardIso4001Organ];
    $standard->standardIso4001Time=$_POST[standardIso4001Time]; 
    $standard->standardIso4001Deadline=$_POST[standardIso4001Deadline]; 
    $standard->standardIso9001=$_POST[standardIso9001]; 
    $standard->standardIso9001Organ=$_POST[standardIso9001Organ];
    $standard->standardIso9001Time=$_POST[standardIso9001Time]; 
    $standard->standardIso9001Deadline=$_POST[standardIso9001Deadline];         
	$standard->update();
	//规范管理53
	$standard35 = new Data35;
	$standard35->mineId=$mineid;
	$standard35->data35name="standardWorkerCount";
	$standard35->data35P1=$_POST[standardWorkerCount_bef1];
	$standard35->data35P2=$_POST[standardWorkerCount_bef2];
	$standard35->data35P3=$_POST[standardWorkerCount_bef3];
	$standard35->data35Aj1=$_POST[standardWorkerCount_pre1];
	$standard35->data35Aj2=$_POST[standardWorkerCount_pre2];
	$standard35->data35Aj3=$_POST[standardWorkerCount_pre3];
	$standard35->data35Aj4=$_POST[standardWorkerCount_pre4];
	$standard35->data35Aj5=$_POST[standardWorkerCount_pre5];
	$standard35->data35As1=$_POST[standardWorkerCount_pre1real];
	$standard35->data35As2=$_POST[standardWorkerCount_pre2real];
	$standard35->data35As3=$_POST[standardWorkerCount_pre3real];
	$standard35->data35As4=$_POST[standardWorkerCount_pre4real];
	$standard35->data35As5=$_POST[standardWorkerCount_pre5real];
	$standard35->add();
	
	
	$standard35 = new Data35;
	$standard35->mineId=$mineid;
	$standard35->data35name="standardWorkerCost";
	$standard35->data35P1=$_POST[standardWorkerCost_bef1];
	$standard35->data35P2=$_POST[standardWorkerCost_bef2];
	$standard35->data35P3=$_POST[standardWorkerCost_bef3];
	$standard35->data35Aj1=$_POST[standardWorkerCost_pre1];
	$standard35->data35Aj2=$_POST[standardWorkerCost_pre2];
	$standard35->data35Aj3=$_POST[standardWorkerCost_pre3];
	$standard35->data35Aj4=$_POST[standardWorkerCost_pre4];
	$standard35->data35Aj5=$_POST[standardWorkerCost_pre5];
	$standard35->data35As1=$_POST[standardWorkerCost_pre1real];
	$standard35->data35As2=$_POST[standardWorkerCost_pre2real];
	$standard35->data35As3=$_POST[standardWorkerCost_pre3real];
	$standard35->data35As4=$_POST[standardWorkerCost_pre4real];
	$standard35->data35As5=$_POST[standardWorkerCost_pre5real];
	$standard35->add();
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

	$flag=count($_POST[oretype]);

	// //var_dump($flag);
	// 主煤
	$mm = 0;
	//主非煤
	$ff = 0;
	// 伴生
	$bb = 0; 
	for($i=0;$i<$flag;$i++)
	{
		$oredata[$i] = new Ore;
		$oredata[$i]->oretype=$_POST[oretype][$i];
		if( $_POST[oreNametype][$i]=="煤矿" )
		{
			$oredata[$i]->oreNametype="能源矿产";
			$oredata[$i]->orename="煤矿";
			$oredata[$i]->oremei=$_POST[orename][$i];
		}
		else
		{
		$oredata[$i]->oreNametype=$_POST[oreNametype][$i];
		$oredata[$i]->orename=$_POST[orename][$i];
		}
		// $oredata[$i]->orepinweiYuan=$_POST[orepinweiYuan][$i];
		// $oredata[$i]->orehuishou=$_POST[orehuishou][$i];
		// $oredata[$i]->orechanlv=$_POST[orechanlv][$i];
		// $oredata[$i]->orezufenYuan=$_POST[orezufenYuan][$i];
		// $oredata[$i]->orepinweiJing=$_POST[orepinweiJing][$i];
		// $oredata[$i]->orezufenJing=$_POST[orezufenJing][$i];
		$oredata[$i]->mineId=$mineid;
		// $oredata[$i]->oreGoback=$_POST[oreGoback][$i];
		// $oredata[$i]->oreGobackDig=$_POST[oreGobackDig][$i];
		// $oredata[$i]->oreGobackUse=$_POST[oreGobackUse][$i];
		
		$oredata[$i]->oreLevelh111 = $_POST[oreLevelh111][$i];
		$oredata[$i]->oreLevelh121122 = $_POST[oreLevelh121122][$i];
		$oredata[$i]->oreLevelh111b = $_POST[oreLevelh111b][$i];
		$oredata[$i]->oreLevelh121b = $_POST[oreLevelh121b][$i];
		$oredata[$i]->oreLevelh122b = $_POST[oreLevelh122b][$i];
		$oredata[$i]->oreLevelh2m111 = $_POST[oreLevelh2m111][$i];
		$oredata[$i]->oreLevelh2m21 = $_POST[oreLevelh2m21][$i];
		$oredata[$i]->oreLevelh2m22 = $_POST[oreLevelh2m22][$i];
		$oredata[$i]->oreLevelh2s11 = $_POST[oreLevelh2s11][$i];
		$oredata[$i]->oreLevelh2s21 = $_POST[oreLevelh2s21][$i];
		$oredata[$i]->oreLevelh2s22 = $_POST[oreLevelh2s22][$i];
		$oredata[$i]->oreLevelh331 = $_POST[oreLevelh331][$i];
		$oredata[$i]->oreLevelh332 = $_POST[oreLevelh332][$i];
		$oredata[$i]->oreLevelh333 = $_POST[oreLevelh333][$i];
		$oredata[$i]->oreLevelh334 = $_POST[oreLevelh334][$i];
		$oredata[$i]->oreLevela111 = $_POST[oreLevela111][$i];
		$oredata[$i]->oreLevela121122 = $_POST[oreLevela121122][$i];
		$oredata[$i]->oreLevela111b = $_POST[oreLevela111b][$i];
		$oredata[$i]->oreLevela121b = $_POST[oreLevela121b][$i];
		$oredata[$i]->oreLevela122b = $_POST[oreLevela122b][$i];
		$oredata[$i]->oreLevela2m11 = $_POST[oreLevela2m11][$i];
		$oredata[$i]->oreLevela2m21 = $_POST[oreLevela2m21][$i];
		$oredata[$i]->oreLevela2m22 = $_POST[oreLevela2m22][$i];
		$oredata[$i]->oreLevela2s11 = $_POST[oreLevela2s11][$i];
		$oredata[$i]->oreLevela2s21 = $_POST[oreLevela2s21][$i];
		$oredata[$i]->oreLevela2s22 = $_POST[oreLevela2s22][$i];
		$oredata[$i]->oreLevela331 = $_POST[oreLevela331][$i];
		$oredata[$i]->oreLevela332 = $_POST[oreLevela332][$i];
		$oredata[$i]->oreLevela333 = $_POST[oreLevela333][$i];
		$oredata[$i]->oreLevela334 = $_POST[oreLevela334][$i];
		$oredata[$i]->oreLevela = $_POST[oreLevela][$i];
		$oredata[$i]->oreLevelaType = $_POST[oreLevelaType][$i];
		$oredata[$i]->oreLevelaUnit = $_POST[oreLevelaUnit][$i];
		$oredata[$i]->oreLevelh = $_POST[oreLevelh][$i];
		$oredata[$i]->oreLevelhType = $_POST[oreLevelhType][$i];
		$oredata[$i]->oreLevelhUnit = $_POST[oreLevelhUnit][$i];
		//$oredata[$i]->add();
		
		if($_POST[oretype][$i]=="主矿种")
		{
			if($oredata[$i]->orename != "煤矿")
			{
				//其他矿种开采回采率
				$oredata[$i]->kaicaihuicai = $_POST[kaicaihuicai][$ff];
				$oredata[$i]->kaicaihuicai1qiansj = $_POST[kaicaihuicai1qiansj][$ff];
				$oredata[$i]->kaicaihuicai2qiansj = $_POST[kaicaihuicai2qiansj][$ff];
				$oredata[$i]->kaicaihuicai3qiansj = $_POST[kaicaihuicai3qiansj][$ff];
				$oredata[$i]->kaicaihuicai1housj = $_POST[kaicaihuicai1housj][$ff];
				$oredata[$i]->kaicaihuicai2housj = $_POST[kaicaihuicai2housj][$ff];
				$oredata[$i]->kaicaihuicai3housj = $_POST[kaicaihuicai3housj][$ff];
				$oredata[$i]->kaicaihuicai4housj = $_POST[kaicaihuicai4housj][$ff];
				$oredata[$i]->kaicaihuicai5housj = $_POST[kaicaihuicai5housj][$ff];
				$oredata[$i]->kaicaihuicai1houjh = $_POST[kaicaihuicai1houjh][$ff];
				$oredata[$i]->kaicaihuicai2houjh = $_POST[kaicaihuicai2houjh][$ff];
				$oredata[$i]->kaicaihuicai3houjh = $_POST[kaicaihuicai3houjh][$ff];
				$oredata[$i]->kaicaihuicai4houjh = $_POST[kaicaihuicai4houjh][$ff];
				$oredata[$i]->kaicaihuicai5houjh = $_POST[kaicaihuicai5houjh][$ff];
				//选矿回收率
				$oredata[$i]->xkhs = $_POST[xkhs][$ff];
				$oredata[$i]->xkhs1qiansj = $_POST[xkhs1qiansj][$ff];
				$oredata[$i]->xkhs2qiansj = $_POST[xkhs2qiansj][$ff];
				$oredata[$i]->xkhs3qiansj = $_POST[xkhs3qiansj][$ff];
				$oredata[$i]->xkhs1housj = $_POST[xkhs1housj][$ff];
				$oredata[$i]->xkhs2housj = $_POST[xkhs2housj][$ff];
				$oredata[$i]->xkhs3housj = $_POST[xkhs3housj][$ff];
				$oredata[$i]->xkhs4housj = $_POST[xkhs4housj][$ff];
				$oredata[$i]->xkhs5housj = $_POST[xkhs5housj][$ff];
				$oredata[$i]->xkhs1houjh = $_POST[xkhs1houjh][$ff];
				$oredata[$i]->xkhs2houjh = $_POST[xkhs2houjh][$ff];
				$oredata[$i]->xkhs3houjh = $_POST[xkhs3houjh][$ff];
				$oredata[$i]->xkhs4houjh = $_POST[xkhs4houjh][$ff];
				$oredata[$i]->xkhs5houjh = $_POST[xkhs5houjh][$ff];
				//采选综合回收率
				$oredata[$i]->caixuanzh = $_POST[caixuanzh][$ff];
				$oredata[$i]->caixuanzh1qiansj = $_POST[caixuanzh1qiansj][$ff];
				$oredata[$i]->caixuanzh2qiansj = $_POST[caixuanzh2qiansj][$ff];
				$oredata[$i]->caixuanzh3qiansj = $_POST[caixuanzh3qiansj][$ff];
				$oredata[$i]->caixuanzh1housj = $_POST[caixuanzh1housj][$ff];
				$oredata[$i]->caixuanzh2housj = $_POST[caixuanzh2housj][$ff];
				$oredata[$i]->caixuanzh3housj = $_POST[caixuanzh3housj][$ff];
				$oredata[$i]->caixuanzh4housj = $_POST[caixuanzh4housj][$ff];
				$oredata[$i]->caixuanzh5housj = $_POST[caixuanzh5housj][$ff];
				$oredata[$i]->caixuanzh1houjh = $_POST[caixuanzh1houjh][$ff];
				$oredata[$i]->caixuanzh2houjh = $_POST[caixuanzh2houjh][$ff];
				$oredata[$i]->caixuanzh3houjh = $_POST[caixuanzh3houjh][$ff];
				$oredata[$i]->caixuanzh4houjh = $_POST[caixuanzh4houjh][$ff];
				$oredata[$i]->caixuanzh5houjh = $_POST[caixuanzh5houjh][$ff];
				//综合利用率
				$oredata[$i]->zhly = $_POST[zhly][$ff];
				$oredata[$i]->zhly1qiansj = $_POST[zhly1qiansj][$ff];
				$oredata[$i]->zhly2qiansj = $_POST[zhly2qiansj][$ff];
				$oredata[$i]->zhly3qiansj = $_POST[zhly3qiansj][$ff];
				$oredata[$i]->zhly1housj = $_POST[zhly1housj][$ff];
				$oredata[$i]->zhly2housj = $_POST[zhly2housj][$ff];
				$oredata[$i]->zhly3housj = $_POST[zhly3housj][$ff];
				$oredata[$i]->zhly4housj = $_POST[zhly4housj][$ff];
				$oredata[$i]->zhly5housj = $_POST[zhly5housj][$ff];
				$oredata[$i]->zhly1houjh = $_POST[zhly1houjh][$ff];
				$oredata[$i]->zhly2houjh = $_POST[zhly2houjh][$ff];
				$oredata[$i]->zhly3houjh = $_POST[zhly3houjh][$ff];
				$oredata[$i]->zhly4houjh = $_POST[zhly4houjh][$ff];
				$oredata[$i]->zhly5houjh = $_POST[zhly5houjh][$ff];
				//矿产资源综合利用率
				$oredata[$i]->kczyzhly = $_POST[kczyzhly][$ff];
				$oredata[$i]->kczyzhly1qiansj = $_POST[kczyzhly1qiansj][$ff];
				$oredata[$i]->kczyzhly2qiansj = $_POST[kczyzhly2qiansj][$ff];
				$oredata[$i]->kczyzhly3qiansj = $_POST[kczyzhly3qiansj][$ff];
				$oredata[$i]->kczyzhly1housj = $_POST[kczyzhly1housj][$ff];
				$oredata[$i]->kczyzhly2housj = $_POST[kczyzhly2housj][$ff];
				$oredata[$i]->kczyzhly3housj = $_POST[kczyzhly3housj][$ff];
				$oredata[$i]->kczyzhly4housj = $_POST[kczyzhly4housj][$ff];
				$oredata[$i]->kczyzhly5housj = $_POST[kczyzhly5housj][$ff];
				$oredata[$i]->kczyzhly1houjh = $_POST[kczyzhly1houjh][$ff];
				$oredata[$i]->kczyzhly2houjh = $_POST[kczyzhly2houjh][$ff];
				$oredata[$i]->kczyzhly3houjh = $_POST[kczyzhly3houjh][$ff];
				$oredata[$i]->kczyzhly4houjh = $_POST[kczyzhly4houjh][$ff];
				$oredata[$i]->kczyzhly5houjh = $_POST[kczyzhly5houjh][$ff];
				//矿产资源总回收率
				$oredata[$i]->kczyzongzhly = $_POST[kczyzongzhly][$ff];
				$oredata[$i]->kczyzongzhly1qiansj = $_POST[kczyzongzhly1qiansj][$ff];
				$oredata[$i]->kczyzongzhly2qiansj = $_POST[kczyzongzhly2qiansj][$ff];
				$oredata[$i]->kczyzongzhly3qiansj = $_POST[kczyzongzhly3qiansj][$ff];
				$oredata[$i]->kczyzongzhly1housj = $_POST[kczyzongzhly1housj][$ff];
				$oredata[$i]->kczyzongzhly2housj = $_POST[kczyzongzhly2housj][$ff];
				$oredata[$i]->kczyzongzhly3housj = $_POST[kczyzongzhly3housj][$ff];
				$oredata[$i]->kczyzongzhly4housj = $_POST[kczyzongzhly4housj][$ff];
				$oredata[$i]->kczyzongzhly5housj = $_POST[kczyzongzhly5housj][$ff];
				$oredata[$i]->kczyzongzhly1houjh = $_POST[kczyzongzhly1houjh][$ff];
				$oredata[$i]->kczyzongzhly2houjh = $_POST[kczyzongzhly2houjh][$ff];
				$oredata[$i]->kczyzongzhly3houjh = $_POST[kczyzongzhly3houjh][$ff];
				$oredata[$i]->kczyzongzhly4houjh = $_POST[kczyzongzhly4houjh][$ff];
				$oredata[$i]->kczyzongzhly5houjh = $_POST[kczyzongzhly5houjh][$ff];
				//冶炼回收率
				$oredata[$i]->ylhs = $_POST[ylhs][$ff];
				$oredata[$i]->ylhs1qiansj = $_POST[ylhs1qiansj][$ff];
				$oredata[$i]->ylhs2qiansj = $_POST[ylhs2qiansj][$ff];
				$oredata[$i]->ylhs3qiansj = $_POST[ylhs3qiansj][$ff];
				$oredata[$i]->ylhs1housj = $_POST[ylhs1housj][$ff];
				$oredata[$i]->ylhs2housj = $_POST[ylhs2housj][$ff];
				$oredata[$i]->ylhs3housj = $_POST[ylhs3housj][$ff];
				$oredata[$i]->ylhs4housj = $_POST[ylhs4housj][$ff];
				$oredata[$i]->ylhs5housj = $_POST[ylhs5housj][$ff];
				$oredata[$i]->ylhs1houjh = $_POST[ylhs1houjh][$ff];
				$oredata[$i]->ylhs2houjh = $_POST[ylhs2houjh][$ff];
				$oredata[$i]->ylhs3houjh = $_POST[ylhs3houjh][$ff];
				$oredata[$i]->ylhs4houjh = $_POST[ylhs4houjh][$ff];
				$oredata[$i]->ylhs5houjh = $_POST[ylhs5houjh][$ff];
				//共伴生矿资源综合利用率
				$oredata[$i]->gongbansheng = $_POST[gongbansheng][$ff];
				$oredata[$i]->gongbansheng1qiansj = $_POST[gongbansheng1qiansj][$ff];
				$oredata[$i]->gongbansheng2qiansj = $_POST[gongbansheng2qiansj][$ff];
				$oredata[$i]->gongbansheng3qiansj = $_POST[gongbansheng3qiansj][$ff];
				$oredata[$i]->gongbansheng1housj = $_POST[gongbansheng1housj][$ff];
				$oredata[$i]->gongbansheng2housj = $_POST[gongbansheng2housj][$ff];
				$oredata[$i]->gongbansheng3housj = $_POST[gongbansheng3housj][$ff];
				$oredata[$i]->gongbansheng4housj = $_POST[gongbansheng4housj][$ff];
				$oredata[$i]->gongbansheng5housj = $_POST[gongbansheng5housj][$ff];
				$oredata[$i]->gongbansheng1houjh = $_POST[gongbansheng1houjh][$ff];
				$oredata[$i]->gongbansheng2houjh = $_POST[gongbansheng2houjh][$ff];
				$oredata[$i]->gongbansheng3houjh = $_POST[gongbansheng3houjh][$ff];
				$oredata[$i]->gongbansheng4houjh = $_POST[gongbansheng4houjh][$ff];
				$oredata[$i]->gongbansheng5houjh = $_POST[gongbansheng5houjh][$ff];
				//矿井水综合利用率
				$oredata[$i]->jingshui = $_POST[jingshui][$ff];
				$oredata[$i]->jingshui1qiansj = $_POST[jingshui1qiansj][$ff];
				$oredata[$i]->jingshui2qiansj = $_POST[jingshui2qiansj][$ff];
				$oredata[$i]->jingshui3qiansj = $_POST[jingshui3qiansj][$ff];
				$oredata[$i]->jingshui1housj = $_POST[jingshui1housj][$ff];
				$oredata[$i]->jingshui2housj = $_POST[jingshui2housj][$ff];
				$oredata[$i]->jingshui3housj = $_POST[jingshui3housj][$ff];
				$oredata[$i]->jingshui4housj = $_POST[jingshui4housj][$ff];
				$oredata[$i]->jingshui5housj = $_POST[jingshui5housj][$ff];
				$oredata[$i]->jingshui1houjh = $_POST[jingshui1houjh][$ff];
				$oredata[$i]->jingshui2houjh = $_POST[jingshui2houjh][$ff];
				$oredata[$i]->jingshui3houjh = $_POST[jingshui3houjh][$ff];
				$oredata[$i]->jingshui4houjh = $_POST[jingshui4houjh][$ff];
				$oredata[$i]->jingshui5houjh = $_POST[jingshui5houjh][$ff];
				//尾矿综合利用率
				$oredata[$i]->weikuang = $_POST[weikuang][$ff];
				$oredata[$i]->weikuang1qiansj = $_POST[weikuang1qiansj][$ff];
				$oredata[$i]->weikuang2qiansj = $_POST[weikuang2qiansj][$ff];
				$oredata[$i]->weikuang3qiansj = $_POST[weikuang3qiansj][$ff];
				$oredata[$i]->weikuang1housj = $_POST[weikuang1housj][$ff];
				$oredata[$i]->weikuang2housj = $_POST[weikuang2housj][$ff];
				$oredata[$i]->weikuang3housj = $_POST[weikuang3housj][$ff];
				$oredata[$i]->weikuang4housj = $_POST[weikuang4housj][$ff];
				$oredata[$i]->weikuang5housj = $_POST[weikuang5housj][$ff];
				$oredata[$i]->weikuang1houjh = $_POST[weikuang1houjh][$ff];
				$oredata[$i]->weikuang2houjh = $_POST[weikuang2houjh][$ff];
				$oredata[$i]->weikuang3houjh = $_POST[weikuang3houjh][$ff];
				$oredata[$i]->weikuang4houjh = $_POST[weikuang4houjh][$ff];
				$oredata[$i]->weikuang5houjh = $_POST[weikuang5houjh][$ff];
				//废气综合利用率
				$oredata[$i]->feiqi = $_POST[feiqi][$ff];
				$oredata[$i]->feiqi1qiansj = $_POST[feiqi1qiansj][$ff];
				$oredata[$i]->feiqi2qiansj = $_POST[feiqi2qiansj][$ff];
				$oredata[$i]->feiqi3qiansj = $_POST[feiqi3qiansj][$ff];
				$oredata[$i]->feiqi1housj = $_POST[feiqi1housj][$ff];
				$oredata[$i]->feiqi2housj = $_POST[feiqi2housj][$ff];
				$oredata[$i]->feiqi3housj = $_POST[feiqi3housj][$ff];
				$oredata[$i]->feiqi4housj = $_POST[feiqi4housj][$ff];
				$oredata[$i]->feiqi5housj = $_POST[feiqi5housj][$ff];
				$oredata[$i]->feiqi1houjh = $_POST[feiqi1houjh][$ff];
				$oredata[$i]->feiqi2houjh = $_POST[feiqi2houjh][$ff];
				$oredata[$i]->feiqi3houjh = $_POST[feiqi3houjh][$ff];
				$oredata[$i]->feiqi4houjh = $_POST[feiqi4houjh][$ff];
				$oredata[$i]->feiqi5houjh = $_POST[feiqi5houjh][$ff];
				//废渣综合利用率
				$oredata[$i]->feizha = $_POST[feizha][$ff];
				$oredata[$i]->feizha1qiansj = $_POST[feizha1qiansj][$ff];
				$oredata[$i]->feizha2qiansj = $_POST[feizha2qiansj][$ff];
				$oredata[$i]->feizha3qiansj = $_POST[feizha3qiansj][$ff];
				$oredata[$i]->feizha1housj = $_POST[feizha1housj][$ff];
				$oredata[$i]->feizha2housj = $_POST[feizha2housj][$ff];
				$oredata[$i]->feizha3housj = $_POST[feizha3housj][$ff];
				$oredata[$i]->feizha4housj = $_POST[feizha4housj][$ff];
				$oredata[$i]->feizha5housj = $_POST[feizha5housj][$ff];
				$oredata[$i]->feizha1houjh = $_POST[feizha1houjh][$ff];
				$oredata[$i]->feizha2houjh = $_POST[feizha2houjh][$ff];
				$oredata[$i]->feizha3houjh = $_POST[feizha3houjh][$ff];
				$oredata[$i]->feizha4houjh = $_POST[feizha4houjh][$ff];
				$oredata[$i]->feizha5houjh = $_POST[feizha5houjh][$ff];
				//贫化率
				$oredata[$i]->pinhua = $_POST[pinhua][$ff];
				$oredata[$i]->pinhua1qiansj = $_POST[pinhua1qiansj][$ff];
				$oredata[$i]->pinhua2qiansj = $_POST[pinhua2qiansj][$ff];
				$oredata[$i]->pinhua3qiansj = $_POST[pinhua3qiansj][$ff];
				$oredata[$i]->pinhua1housj = $_POST[pinhua1housj][$ff];
				$oredata[$i]->pinhua2housj = $_POST[pinhua2housj][$ff];
				$oredata[$i]->pinhua3housj = $_POST[pinhua3housj][$ff];
				$oredata[$i]->pinhua4housj = $_POST[pinhua4housj][$ff];
				$oredata[$i]->pinhua5housj = $_POST[pinhua5housj][$ff];
				$oredata[$i]->pinhua1houjh = $_POST[pinhua1houjh][$ff];
				$oredata[$i]->pinhua2houjh = $_POST[pinhua2houjh][$ff];
				$oredata[$i]->pinhua3houjh = $_POST[pinhua3houjh][$ff];
				$oredata[$i]->pinhua4houjh = $_POST[pinhua4houjh][$ff];
				$oredata[$i]->pinhua5houjh = $_POST[pinhua5houjh][$ff];
				//产率
				$oredata[$i]->chanlv = $_POST[chanlv][$ff];
				$oredata[$i]->chanlv1qiansj = $_POST[chanlv1qiansj][$ff];
				$oredata[$i]->chanlv2qiansj = $_POST[chanlv2qiansj][$ff];
				$oredata[$i]->chanlv3qiansj = $_POST[chanlv3qiansj][$ff];
				$oredata[$i]->chanlv1housj = $_POST[chanlv1housj][$ff];
				$oredata[$i]->chanlv2housj = $_POST[chanlv2housj][$ff];
				$oredata[$i]->chanlv3housj = $_POST[chanlv3housj][$ff];
				$oredata[$i]->chanlv4housj = $_POST[chanlv4housj][$ff];
				$oredata[$i]->chanlv5housj = $_POST[chanlv5housj][$ff];
				$oredata[$i]->chanlv1houjh = $_POST[chanlv1houjh][$ff];
				$oredata[$i]->chanlv2houjh = $_POST[chanlv2houjh][$ff];
				$oredata[$i]->chanlv3houjh = $_POST[chanlv3houjh][$ff];
				$oredata[$i]->chanlv4houjh = $_POST[chanlv4houjh][$ff];
				$oredata[$i]->chanlv5houjh = $_POST[chanlv5houjh][$ff];
				$ff++;
			}
			else if($oredata[$i]->orename == "煤矿")
			{
				//主矿种煤的采区回采
				$oredata[$i]->meiCqhc = $_POST[meiCqhc][$mm];
				$oredata[$i]->meiCqhc1qiansj = $_POST[meiCqhc1qiansj][$mm];
				$oredata[$i]->meiCqhc2qiansj = $_POST[meiCqhc2qiansj][$mm];
				$oredata[$i]->meiCqhc3qiansj = $_POST[meiCqhc3qiansj][$mm];
				$oredata[$i]->meiCqhc1housj = $_POST[meiCqhc1housj][$mm];
				$oredata[$i]->meiCqhc2housj = $_POST[meiCqhc2housj][$mm];
				$oredata[$i]->meiCqhc3housj = $_POST[meiCqhc3housj][$mm];
				$oredata[$i]->meiCqhc4housj = $_POST[meiCqhc4housj][$mm];
				$oredata[$i]->meiCqhc5housj = $_POST[meiCqhc5housj][$mm];
				$oredata[$i]->meiCqhc1houjh = $_POST[meiCqhc1houjh][$mm];
				$oredata[$i]->meiCqhc2houjh = $_POST[meiCqhc2houjh][$mm];
				$oredata[$i]->meiCqhc3houjh = $_POST[meiCqhc3houjh][$mm];
				$oredata[$i]->meiCqhc4houjh = $_POST[meiCqhc4houjh][$mm];
				$oredata[$i]->meiCqhc5houjh = $_POST[meiCqhc5houjh][$mm];
				//煤的原煤入选率
				$oredata[$i]->meiYmrx = $_POST[meiYmrx][$mm];
				$oredata[$i]->meiYmrx1qiansj = $_POST[meiYmrx1qiansj][$mm];
				$oredata[$i]->meiYmrx2qiansj = $_POST[meiYmrx2qiansj][$mm];
				$oredata[$i]->meiYmrx3qiansj = $_POST[meiYmrx3qiansj][$mm];
				$oredata[$i]->meiYmrx1housj = $_POST[meiYmrx1housj][$mm];
				$oredata[$i]->meiYmrx2housj = $_POST[meiYmrx2housj][$mm];
				$oredata[$i]->meiYmrx3housj = $_POST[meiYmrx3housj][$mm];
				$oredata[$i]->meiYmrx4housj = $_POST[meiYmrx4housj][$mm];
				$oredata[$i]->meiYmrx5housj = $_POST[meiYmrx5housj][$mm];
				$oredata[$i]->meiYmrx1houjh = $_POST[meiYmrx1houjh][$mm];
				$oredata[$i]->meiYmrx2houjh = $_POST[meiYmrx2houjh][$mm];
				$oredata[$i]->meiYmrx3houjh = $_POST[meiYmrx3houjh][$mm];
				$oredata[$i]->meiYmrx4houjh = $_POST[meiYmrx4houjh][$mm];
				$oredata[$i]->meiYmrx5houjh = $_POST[meiYmrx5houjh][$mm];
				//煤矸石与共伴生资源综合利用率
				$oredata[$i]->meiMgsgbs = $_POST[meiMgsgbs][$mm];
				$oredata[$i]->meiMgsgbs1qiansj = $_POST[meiMgsgbs1qiansj][$mm];
				$oredata[$i]->meiMgsgbs2qiansj = $_POST[meiMgsgbs2qiansj][$mm];
				$oredata[$i]->meiMgsgbs3qiansj = $_POST[meiMgsgbs3qiansj][$mm];
				$oredata[$i]->meiMgsgbs1housj = $_POST[meiMgsgbs1housj][$mm];
				$oredata[$i]->meiMgsgbs2housj = $_POST[meiMgsgbs2housj][$mm];
				$oredata[$i]->meiMgsgbs3housj = $_POST[meiMgsgbs3housj][$mm];
				$oredata[$i]->meiMgsgbs4housj = $_POST[meiMgsgbs4housj][$mm];
				$oredata[$i]->meiMgsgbs5housj = $_POST[meiMgsgbs5housj][$mm];
				$oredata[$i]->meiMgsgbs1houjh = $_POST[meiMgsgbs1houjh][$mm];
				$oredata[$i]->meiMgsgbs2houjh = $_POST[meiMgsgbs2houjh][$mm];
				$oredata[$i]->meiMgsgbs3houjh = $_POST[meiMgsgbs3houjh][$mm];
				$oredata[$i]->meiMgsgbs4houjh = $_POST[meiMgsgbs4houjh][$mm];
				$oredata[$i]->meiMgsgbs5houjh = $_POST[meiMgsgbs5houjh][$mm];
				//矿井水综合利用率
				$oredata[$i]->meiKjs = $_POST[meiKjs][$mm];
				$oredata[$i]->meiKjs1qiansj = $_POST[meiKjs1qiansj][$mm];
				$oredata[$i]->meiKjs2qiansj = $_POST[meiKjs2qiansj][$mm];
				$oredata[$i]->meiKjs3qiansj = $_POST[meiKjs3qiansj][$mm];
				$oredata[$i]->meiKjs1housj = $_POST[meiKjs1housj][$mm];
				$oredata[$i]->meiKjs2housj = $_POST[meiKjs2housj][$mm];
				$oredata[$i]->meiKjs3housj = $_POST[meiKjs3housj][$mm];
				$oredata[$i]->meiKjs4housj = $_POST[meiKjs4housj][$mm];
				$oredata[$i]->meiKjs5housj = $_POST[meiKjs5housj][$mm];
				$oredata[$i]->meiKjs1houjh = $_POST[meiKjs1houjh][$mm];
				$oredata[$i]->meiKjs2houjh = $_POST[meiKjs2houjh][$mm];
				$oredata[$i]->meiKjs3houjh = $_POST[meiKjs3houjh][$mm];
				$oredata[$i]->meiKjs4houjh = $_POST[meiKjs4houjh][$mm];
				$oredata[$i]->meiKjs5houjh = $_POST[meiKjs5houjh][$mm];
				//煤矸石综合利用率
				$oredata[$i]->meiMgszhly = $_POST[meiMgszhly][$mm];
				$oredata[$i]->meiMgszhly1qiansj = $_POST[meiMgszhly1qiansj][$mm];
				$oredata[$i]->meiMgszhly2qiansj = $_POST[meiMgszhly2qiansj][$mm];
				$oredata[$i]->meiMgszhly3qiansj = $_POST[meiMgszhly3qiansj][$mm];
				$oredata[$i]->meiMgszhly1housj = $_POST[meiMgszhly1housj][$mm];
				$oredata[$i]->meiMgszhly2housj = $_POST[meiMgszhly2housj][$mm];
				$oredata[$i]->meiMgszhly3housj = $_POST[meiMgszhly3housj][$mm];
				$oredata[$i]->meiMgszhly4housj = $_POST[meiMgszhly4housj][$mm];
				$oredata[$i]->meiMgszhly5housj = $_POST[meiMgszhly5housj][$mm];
				$oredata[$i]->meiMgszhly1houjh = $_POST[meiMgszhly1houjh][$mm];
				$oredata[$i]->meiMgszhly2houjh = $_POST[meiMgszhly2houjh][$mm];
				$oredata[$i]->meiMgszhly3houjh = $_POST[meiMgszhly3houjh][$mm];
				$oredata[$i]->meiMgszhly4houjh = $_POST[meiMgszhly4houjh][$mm];
				$oredata[$i]->meiMgszhly5houjh = $_POST[meiMgszhly5houjh][$mm];
				$mm++;
			}
		}
		else
		{
			//共伴生矿种:选矿回收率
			$oredata[$i]->gbsXkhs = $_POST[gbsXkhs][$bb];
			$oredata[$i]->gbsXkhs1qiansj = $_POST[gbsXkhs1qiansj][$bb];
			$oredata[$i]->gbsXkhs2qiansj = $_POST[gbsXkhs2qiansj][$bb];
			$oredata[$i]->gbsXkhs3qiansj = $_POST[gbsXkhs3qiansj][$bb];
			$oredata[$i]->gbsXkhs1housj = $_POST[gbsXkhs1housj][$bb];
			$oredata[$i]->gbsXkhs2housj = $_POST[gbsXkhs2housj][$bb];
			$oredata[$i]->gbsXkhs3housj = $_POST[gbsXkhs3housj][$bb];
			$oredata[$i]->gbsXkhs4housj = $_POST[gbsXkhs4housj][$bb];
			$oredata[$i]->gbsXkhs5housj = $_POST[gbsXkhs5housj][$bb];
			$oredata[$i]->gbsXkhs1houjh = $_POST[gbsXkhs1houjh][$bb];
			$oredata[$i]->gbsXkhs2houjh = $_POST[gbsXkhs2houjh][$bb];
			$oredata[$i]->gbsXkhs3houjh = $_POST[gbsXkhs3houjh][$bb];
			$oredata[$i]->gbsXkhs4houjh = $_POST[gbsXkhs4houjh][$bb];
			$oredata[$i]->gbsXkhs5houjh = $_POST[gbsXkhs5houjh][$bb];
			//冶炼回收率
			$oredata[$i]->gbsYlhs = $_POST[gbsYlhs][$bb];
			$oredata[$i]->gbsYlhs1qiansj = $_POST[gbsYlhs1qiansj][$bb];
			$oredata[$i]->gbsYlhs2qiansj = $_POST[gbsYlhs2qiansj][$bb];
			$oredata[$i]->gbsYlhs3qiansj = $_POST[gbsYlhs3qiansj][$bb];
			$oredata[$i]->gbsYlhs1housj = $_POST[gbsYlhs1housj][$bb];
			$oredata[$i]->gbsYlhs2housj = $_POST[gbsYlhs2housj][$bb];
			$oredata[$i]->gbsYlhs3housj = $_POST[gbsYlhs3housj][$bb];
			$oredata[$i]->gbsYlhs4housj = $_POST[gbsYlhs4housj][$bb];
			$oredata[$i]->gbsYlhs5housj = $_POST[gbsYlhs5housj][$bb];
			$oredata[$i]->gbsYlhs1houjh = $_POST[gbsYlhs1houjh][$bb];
			$oredata[$i]->gbsYlhs2houjh = $_POST[gbsYlhs2houjh][$bb];
			$oredata[$i]->gbsYlhs3houjh = $_POST[gbsYlhs3houjh][$bb];
			$oredata[$i]->gbsYlhs4houjh = $_POST[gbsYlhs4houjh][$bb];
			$oredata[$i]->gbsYlhs5houjh = $_POST[gbsYlhs5houjh][$bb];
			$bb++;
		}

		//加到数据库中
		$oredata[$i]->add();

		// $oredata35[$i] = new Ore35;
		// $oredata35[$i]->mineId=$mineid;
		// $oredata35[$i]->oreId=$oredata[$i]->id;
		// $oredata35[$i]->data35name="orehuishou";
		// $oredata35[$i]->data35P1=$_POST[orehuishou_bef1][$i];
		// $oredata35[$i]->data35P2=$_POST[orehuishou_bef2][$i];
		// $oredata35[$i]->data35P3=$_POST[orehuishou_bef3][$i];
		// $oredata35[$i]->data35Aj1=$_POST[orehuishou_pre1][$i];
		// $oredata35[$i]->data35Aj2=$_POST[orehuishou_pre2][$i];
		// $oredata35[$i]->data35Aj3=$_POST[orehuishou_pre3][$i];
		// $oredata35[$i]->data35Aj4=$_POST[orehuishou_pre4][$i];
		// $oredata35[$i]->data35Aj5=$_POST[orehuishou_pre5][$i];
		// $oredata35[$i]->data35As1=$_POST[orehuishou_pre1real][$i];
		// $oredata35[$i]->data35As2=$_POST[orehuishou_pre2real][$i];
		// $oredata35[$i]->data35As3=$_POST[orehuishou_pre3real][$i];
		// $oredata35[$i]->data35As4=$_POST[orehuishou_pre4real][$i];
		// $oredata35[$i]->data35As5=$_POST[orehuishou_pre5real][$i];
		// $oredata35[$i]->add();
		
		// $oredata35[$i] = new Ore35;
		// $oredata35[$i]->mineId=$mineid;
		// $oredata35[$i]->oreId=$oredata[$i]->id;
		// $oredata35[$i]->data35name="ore_goback";
		// $oredata35[$i]->data35P1=$_POST[oreGoback_bef1][$i];
		// $oredata35[$i]->data35P2=$_POST[oreGoback_bef2][$i];
		// $oredata35[$i]->data35P3=$_POST[oreGoback_bef3][$i];
		// $oredata35[$i]->data35Aj1=$_POST[oreGoback_pre1][$i];
		// $oredata35[$i]->data35Aj2=$_POST[oreGoback_pre2][$i];
		// $oredata35[$i]->data35Aj3=$_POST[oreGoback_pre3][$i];
		// $oredata35[$i]->data35Aj4=$_POST[oreGoback_pre4][$i];
		// $oredata35[$i]->data35Aj5=$_POST[oreGoback_pre5][$i];
		// $oredata35[$i]->data35As1=$_POST[oreGoback_pre1real][$i];
		// $oredata35[$i]->data35As2=$_POST[oreGoback_pre2real][$i];
		// $oredata35[$i]->data35As3=$_POST[oreGoback_pre3real][$i];
		// $oredata35[$i]->data35As4=$_POST[oreGoback_pre4real][$i];
		// $oredata35[$i]->data35As5=$_POST[oreGoback_pre5real][$i];
		// $oredata35[$i]->add();
		
		//更新选矿回收率及53
		$flage=count($_POST[orexuankuanghuishouvalue][$i]);

		//var_dump($flage);

		//print_r($_POST['orexuankuanghuishouvalue']);

		for ($j=0; $j <$flage ; $j++) { 
			$xkhslv = new OreXkhs35;
			$xkhsstand=new OrestandardXkhs;

			$orexuankuanghuishou1 = $_POST['orexuankuanghuishou1'][$i][$j];
			$orexuankuanghuishou2 = $_POST['orexuankuanghuishou2'][$i][$j];
			$orexuankuanghuishou3 = $_POST['orexuankuanghuishou3'][$i][$j];
			
			$orexuankuanghuishou4 = $_POST['orexuankuanghuishou4'][$i][$j];
			// var_dump($orexuankuanghuishou1);
			// var_dump($orexuankuanghuishou2);
			// var_dump($orexuankuanghuishou3);
			$xkhsstandsql="select * from `orestandard_xkhs` where subclass1 = '$orexuankuanghuishou1' AND subclass2 = '$orexuankuanghuishou2' AND subclass3 = '$orexuankuanghuishou3' AND subclass4 = '$orexuankuanghuishou4'";
			 // var_dump($xkhsstandsql);
		    $xkhsstandArray = $xkhsstand->getArray($xkhsstandsql,true);
		    if(count($xkhsstandArray) == 0)
		    {
		    	echo '选矿回收率标准值不存在';
		    	die();
		    }
		    // var_dump($xkhsstandArray);
		    // echo '$_POST[orexuankuanghuishou2][$i][$j]:'.$_POST[orexuankuanghuishou2][$i][$j].' 1- '.$_POST[orexuankuanghuishou1][$i][$j].' 3- '.$_POST[orexuankuanghuishou3][$i][$j];

			$xkhslv->value = $_POST[orexuankuanghuishouvalue][$i][$j];
			// $xkhslv->orepinweiYuan = $_POST[orepinweiYuan][$i][$j];
			// $xkhslv->orechanlv = $_POST[orechanlv][$i][$j];
			// $xkhslv->orezufenYuan = $_POST[orezufenYuan][$i][$j];
			// $xkhslv->orepinweiJing = $_POST[orepinweiJing][$i][$j];
			// $xkhslv->orezufenJing = $_POST[orezufenJing][$i][$j];
			// $xkhslv->data35P1 = $_POST[orehuishou_bef3][$i][$j];
			// $xkhslv->data35P2 = $_POST[orehuishou_bef2][$i][$j];
			// $xkhslv->data35P3 = $_POST[orehuishou_bef1][$i][$j];
			// $xkhslv->data35Aj1 = $_POST[orehuishou_pre1][$i][$j];
			// $xkhslv->data35Aj2 = $_POST[orehuishou_pre1real][$i][$j];
			// $xkhslv->data35Aj3 = $_POST[orehuishou_pre2][$i][$j];
			// $xkhslv->data35Aj4 = $_POST[orehuishou_pre2real][$i][$j];
			// $xkhslv->data35Aj5 = $_POST[orehuishou_pre3][$i][$j];
			// $xkhslv->data35As1 = $_POST[orehuishou_pre3real][$i][$j];
			// $xkhslv->data35As2 = $_POST[orehuishou_pre4][$i][$j];
			// $xkhslv->data35As3 = $_POST[orehuishou_pre4real][$i][$j];
			// $xkhslv->data35As4 = $_POST[orehuishou_pre5][$i][$j];
			// $xkhslv->data35As5 = $_POST[orehuishou_pre5real][$i][$j];
			$xkhslv->mineId = $mineid;
			$xkhslv->oreId = $oredata[$i]->id; 
			$xkhslv->standardId = $xkhsstandArray[0]->id; 
			$xkhslv->add();
		}

		//更新开采回采率及53
		$flaged=count($_POST[orekaicaihuicaivalue][$i]);

		// $p=0;
		
		// while ($_POST[orekaicaihuicaivalue][$i][$p] != null ) {
		// 	$p++;
		// 	$flaged=$p;
		// }
	
		for ($x=0; $x <$flaged ; $x++) { 
			$kchclv = new OreKchc35;
			$kchcstand=new OrestandardKchc;

			$orekaicaihuicai1 = $_POST['orekaicaihuicai1'][$i][$x];
			$orekaicaihuicai2 = $_POST['orekaicaihuicai2'][$i][$x];
			$orekaicaihuicai3 = $_POST['orekaicaihuicai3'][$i][$x];

			$kchcstandsql="select * from `orestandard_kchc` where subclass1 = '$orekaicaihuicai1' AND subclass2 = '$orekaicaihuicai2' AND subclass3 = '$orekaicaihuicai3'";
			//var_dump($kchcstandsql);
		    $kchcstandArray = $kchcstand->getArray($kchcstandsql,true);
		    if(count($kchcstandArray) == 0)
		    {
		    	echo '开采回采率标准值不存在';
		    	die();
		    }
			$kchclv->value = $_POST[orekaicaihuicaivalue][$i][$x];
			// $kchclv->oreGobackDig = $_POST[orekaicaihuicaichu][$i][$x];
			// $kchclv->oreGobackUse = $_POST[orekaicaihuicaiyong][$i][$x];
			// $kchclv->data35P1 = $_POST[oreGoback_bef3][$i][$x];
			// $kchclv->data35P2 = $_POST[oreGoback_bef2][$i][$x];
			// $kchclv->data35P3 = $_POST[oreGoback_bef1][$i][$x];
			// $kchclv->data35Aj1 = $_POST[oreGoback_pre1][$i][$x];
			// $kchclv->data35Aj2 = $_POST[oreGoback_pre1real][$i][$x];
			// $kchclv->data35Aj3 = $_POST[oreGoback_pre2][$i][$x];
			// $kchclv->data35Aj4 = $_POST[oreGoback_pre2real][$i][$x];
			// $kchclv->data35Aj5 = $_POST[oreGoback_pre3][$i][$x];
			// $kchclv->data35As1 = $_POST[oreGoback_pre3real][$i][$x];
			// $kchclv->data35As2 = $_POST[oreGoback_pre4][$i][$x];
			// $kchclv->data35As3 = $_POST[oreGoback_pre4real][$i][$x];
			// $kchclv->data35As4 = $_POST[oreGoback_pre5][$i][$x];
			// $kchclv->data35As5 = $_POST[oreGoback_pre5real][$i][$x];
			$kchclv->mineId = $mineid;
			$kchclv->oreId = $oredata[$i]->id; 
			$kchclv->standardId = $kchcstandArray[0]->id; 
			$kchclv->add();
		}

		//更新综合利用率及53
		$flagede=count($_POST[complexUserate][$i]);
		for ($y=0; $y <$flagede ; $y++) { 
			$zhlylv = new OreZhly35;
			$zhlystand=new OrestandardZhly;

			$orezhlylv1 = $_POST['orezhly1'][$i][$y];
			$orezhlylv2 = $_POST['orezhly2'][$i][$y];
			$orezhlylv3 = $_POST['orezhly3'][$i][$y];

			$zhlystandsql="select * from `orestandard_zhly` where subclass1 = '$orezhlylv1' AND subclass2 = '$orezhlylv2' AND subclass3 = '$orezhlylv3'";
			////var_dump($zhlystandsql);
		    $zhlystandArray = $zhlystand->getArray($zhlystandsql,true);
		    if(count($zhlystandArray) == 0)
		    {
		    	echo '综合回收率标准值不存在';
		    	die();
		    }
			$zhlylv->value = $_POST[complexUserate][$i][$y];
			// $zhlylv->complexUserateUsequality = $_POST[complexUserateUsequality][$i][$y];
			// $zhlylv->complexUserateSavequality = $_POST[complexUserateSavequality][$i][$y];
			// $zhlylv->complexUserateGoback = $_POST[complexUserateGoback][$i][$y];
			// $zhlylv->complexUserateFindback = $_POST[complexUserateFindback][$i][$y];
			// $zhlylv->complexUserateTaste = $_POST[complexUserateTaste][$i][$y];
			// $zhlylv->data35P1 = $_POST[complexUserate_bef3][$i][$y];
			// $zhlylv->data35P2 = $_POST[complexUserate_bef2][$i][$y];
			// $zhlylv->data35P3 = $_POST[complexUserate_bef1][$i][$y];
			// $zhlylv->data35Aj1 = $_POST[complexUserate_pre1][$i][$y];
			// $zhlylv->data35Aj2 = $_POST[complexUserate_pre1real][$i][$y];
			// $zhlylv->data35Aj3 = $_POST[complexUserate_pre2][$i][$y];
			// $zhlylv->data35Aj4 = $_POST[complexUserate_pre2real][$i][$y];
			// $zhlylv->data35Aj5 = $_POST[complexUserate_pre3][$i][$y];
			// $zhlylv->data35As1 = $_POST[complexUserate_pre3real][$i][$y];
			// $zhlylv->data35As2 = $_POST[complexUserate_pre4][$i][$y];
			// $zhlylv->data35As3 = $_POST[complexUserate_pre4real][$i][$y];
			// $zhlylv->data35As4 = $_POST[complexUserate_pre5][$i][$y];
			// $zhlylv->data35As5 = $_POST[complexUserate_pre5real][$i][$y];
			$zhlylv->mineId = $mineid;
			$zhlylv->oreId = $oredata[$i]->id; 
			$zhlylv->standardId = $zhlystandArray[0]->id; 
			$zhlylv->add();
		}
	}

	//更新矿种信息

	//echo $_POST[orepinweiYuan][0][0];
	//exit();
	//$flag=count($_POST[orename]);
	//$flage=count($_POST[]);



	//找到综合利用信息id
// 	$complex0 = new Complex;
// 	$sql_legal="select id from `complex` WHERE mine_id = $mineid";
// 	$cArray = $complex0->getArray($sql_legal,true);
// 	foreach($cArray as $c)
// 	{
// 		$complexid=$c->id;
// 	}
// 	//综合利用
//     $complex=new Complex;
// 	$complex->getById($complexid);
// 	//$complex->complexGoback=$_POST[complexGoback];    //开采回采率跟着矿种走
//     //$complex->complexGobackDig=$_POST[complexGobackDig];
//     //$complex->complexGobackUse=$_POST[complexGobackUse];
// //    $complex->complexFindbackMain=$_POST[complex_findback_main];
// //    $complex->complexFindbackAsso=$_POST[complex_findback_asso];
// //    $complex->complexFindbackOretaste=$_POST[complex_findback_oretaste];
// //    $complex->complexFindbackContaste=$_POST[complex_findback_contaste];
// //    $complex->complexFindbackRate=$_POST[complex_findback_rate];
// //    $complex->complexFindbackOreuse=$_POST[complex_findback_oreuse];
// //    $complex->complexFindbackConuse=$_POST[complex_findback_conuse];
//     $complex->complexAllback=$_POST[complexAllback];
//     $complex->complexAllbackGo=$_POST[complexAllbackGo];
//     $complex->complexAllbackFind=$_POST[complexAllbackFind];
//     $complex->complexDilut=$_POST[complexDilut];
//     $complex->complexDilutAmount=$_POST[complexDilutAmount];
//     $complex->complexDilutDownamont=$_POST[complexDilutDownamont];
//     $complex->complexDilutOretaste=$_POST[complexDilutOretaste];
//     $complex->complexDilutDowntaste=$_POST[complexDilutDowntaste];
//     $complex->complexDilutUseless=$_POST[complexDilutUseless];
//     $complex->complexProrate=$_POST[complexProrate];
//     $complex->complexProrateProquality=$_POST[complexProrateProquality];
//     $complex->complexProrateOrequality=$_POST[complexProrateOrequality];
//     $complex->complexUserate=$_POST[complexUserate];
//     $complex->complexUserateUsequality=$_POST[complexUserateUsequality];
//     $complex->complexUserateSavequality=$_POST[complexUserateSavequality];
//     $complex->complexUserateGoback=$_POST[complexUserateGoback];
//     $complex->complexUserateFindback=$_POST[complexUserateFindback];
//     $complex->complexUserateTaste=$_POST[complexUserateTaste];
//     $complex->complexEfficiency=$_POST[complexEfficiency];
//     $complex->complexEfficiencyAll=$_POST[complexEfficiencyAll];
//     $complex->complexEfficiencyUsequality=$_POST[complexEfficiencyUsequality];
//     $complex->complexEfficiencyAdjust=$_POST[complexEfficiencyAdjust];
//     $complex->complexEfficiencyPastprice=$_POST[complexEfficiencyPastprice];
//     $complex->complexEfficiencyNowprice=$_POST[complexEfficiencyNowprice];
//     $complex->complexRecover=$_POST[complexRecover];
//     $complex->complexRecoverGoback=$_POST[complexRecoverGoback];
//     $complex->complexRecoverFindback=$_POST[complexRecoverFindback];
//     $complex->complexRecoverFireback=$_POST[complexRecoverFireback];
//     $complex->complexCoalBack=$_POST[complexCoalBack];
//     $complex->complexCoalIn=$_POST[complexCoalIn];
//     $complex->complexCoalAll=$_POST[complexCoalAll];
//     $complex->update();
	//综合利用53
	/* $complex35 = new Data35;
	$complex35->mineId=$mineid;
	$complex35->data35name="complexGoback";
	$complex35->data35P1=$_POST[complexGoback_bef1];
	$complex35->data35P2=$_POST[complexGoback_bef2];
	$complex35->data35P3=$_POST[complexGoback_bef3];
	$complex35->data35Aj1=$_POST[complexGoback_pre1];
	$complex35->data35Aj2=$_POST[complexGoback_pre2];
	$complex35->data35Aj3=$_POST[complexGoback_pre3];
	$complex35->data35Aj4=$_POST[complexGoback_pre4];
	$complex35->data35Aj5=$_POST[complexGoback_pre5];
	$complex35->data35As1=$_POST[complexGoback_pre1real];
	$complex35->data35As2=$_POST[complexGoback_pre2real];
	$complex35->data35As3=$_POST[complexGoback_pre3real];
	$complex35->data35As4=$_POST[complexGoback_pre4real];
	$complex35->data35As5=$_POST[complexGoback_pre5real];
	$complex35->add(); */
	
	
	
	// $complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexAllback";
	// $complex35->data35P1=$_POST[complexAllback_bef1];
	// $complex35->data35P2=$_POST[complexAllback_bef2];
	// $complex35->data35P3=$_POST[complexAllback_bef3];
	// $complex35->data35Aj1=$_POST[complexAllback_pre1];
	// $complex35->data35Aj2=$_POST[complexAllback_pre2];
	// $complex35->data35Aj3=$_POST[complexAllback_pre3];
	// $complex35->data35Aj4=$_POST[complexAllback_pre4];
	// $complex35->data35Aj5=$_POST[complexAllback_pre5];
	// $complex35->data35As1=$_POST[complexAllback_pre1real];
	// $complex35->data35As2=$_POST[complexAllback_pre2real];
	// $complex35->data35As3=$_POST[complexAllback_pre3real];
	// $complex35->data35As4=$_POST[complexAllback_pre4real];
	// $complex35->data35As5=$_POST[complexAllback_pre5real];
	// $complex35->add();
	
		
	
	// 	$complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexDilut";
	// $complex35->data35P1=$_POST[complexDilut_bef1];
	// $complex35->data35P2=$_POST[complexDilut_bef2];
	// $complex35->data35P3=$_POST[complexDilut_bef3];
	// $complex35->data35Aj1=$_POST[complexDilut_pre1];
	// $complex35->data35Aj2=$_POST[complexDilut_pre2];
	// $complex35->data35Aj3=$_POST[complexDilut_pre3];
	// $complex35->data35Aj4=$_POST[complexDilut_pre4];
	// $complex35->data35Aj5=$_POST[complexDilut_pre5];
	// $complex35->data35As1=$_POST[complexDilut_pre1real];
	// $complex35->data35As2=$_POST[complexDilut_pre2real];
	// $complex35->data35As3=$_POST[complexDilut_pre3real];
	// $complex35->data35As4=$_POST[complexDilut_pre4real];
	// $complex35->data35As5=$_POST[complexDilut_pre5real];
	// $complex35->add();
	
	
	// 	$complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexProrate";
	// $complex35->data35P1=$_POST[complexProrate_bef1];
	// $complex35->data35P2=$_POST[complexProrate_bef2];
	// $complex35->data35P3=$_POST[complexProrate_bef3];
	// $complex35->data35Aj1=$_POST[complexProrate_pre1];
	// $complex35->data35Aj2=$_POST[complexProrate_pre2];
	// $complex35->data35Aj3=$_POST[complexProrate_pre3];
	// $complex35->data35Aj4=$_POST[complexProrate_pre4];
	// $complex35->data35Aj5=$_POST[complexProrate_pre5];
	// $complex35->data35As1=$_POST[complexProrate_pre1real];
	// $complex35->data35As2=$_POST[complexProrate_pre2real];
	// $complex35->data35As3=$_POST[complexProrate_pre3real];
	// $complex35->data35As4=$_POST[complexProrate_pre4real];
	// $complex35->data35As5=$_POST[complexProrate_pre5real];
	// $complex35->add();
	
		
	
	// 	$complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexUserate";
	// $complex35->data35P1=$_POST[complexUserate_bef1];
	// $complex35->data35P2=$_POST[complexUserate_bef2];
	// $complex35->data35P3=$_POST[complexUserate_bef3];
	// $complex35->data35Aj1=$_POST[complexUserate_pre1];
	// $complex35->data35Aj2=$_POST[complexUserate_pre2];
	// $complex35->data35Aj3=$_POST[complexUserate_pre3];
	// $complex35->data35Aj4=$_POST[complexUserate_pre4];
	// $complex35->data35Aj5=$_POST[complexUserate_pre5];
	// $complex35->data35As1=$_POST[complexUserate_pre1real];
	// $complex35->data35As2=$_POST[complexUserate_pre2real];
	// $complex35->data35As3=$_POST[complexUserate_pre3real];
	// $complex35->data35As4=$_POST[complexUserate_pre4real];
	// $complex35->data35As5=$_POST[complexUserate_pre5real];
	// $complex35->add();
	
	// 	$complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexEfficiency";
	// $complex35->data35P1=$_POST[complexEfficiency_bef1];
	// $complex35->data35P2=$_POST[complexEfficiency_bef2];
	// $complex35->data35P3=$_POST[complexEfficiency_bef3];
	// $complex35->data35Aj1=$_POST[complexEfficiency_pre1];
	// $complex35->data35Aj2=$_POST[complexEfficiency_pre2];
	// $complex35->data35Aj3=$_POST[complexEfficiency_pre3];
	// $complex35->data35Aj4=$_POST[complexEfficiency_pre4];
	// $complex35->data35Aj5=$_POST[complexEfficiency_pre5];
	// $complex35->data35As1=$_POST[complexEfficiency_pre1real];
	// $complex35->data35As2=$_POST[complexEfficiency_pre2real];
	// $complex35->data35As3=$_POST[complexEfficiency_pre3real];
	// $complex35->data35As4=$_POST[complexEfficiency_pre4real];
	// $complex35->data35As5=$_POST[complexEfficiency_pre5real];
	// $complex35->add();
	
	// $complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexRecover";
	// $complex35->data35P1=$_POST[complexRecover_bef1];
	// $complex35->data35P2=$_POST[complexRecover_bef2];
	// $complex35->data35P3=$_POST[complexRecover_bef3];
	// $complex35->data35Aj1=$_POST[complexRecover_pre1];
	// $complex35->data35Aj2=$_POST[complexRecover_pre2];
	// $complex35->data35Aj3=$_POST[complexRecover_pre3];
	// $complex35->data35Aj4=$_POST[complexRecover_pre4];
	// $complex35->data35Aj5=$_POST[complexRecover_pre5];
	// $complex35->data35As1=$_POST[complexRecover_pre1real];
	// $complex35->data35As2=$_POST[complexRecover_pre2real];
	// $complex35->data35As3=$_POST[complexRecover_pre3real];
	// $complex35->data35As4=$_POST[complexRecover_pre4real];
	// $complex35->data35As5=$_POST[complexRecover_pre5real];
	// $complex35->add();
	
	// 	$complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexCoalBack";
	// $complex35->data35P1=$_POST[complexCoalBack_bef1];
	// $complex35->data35P2=$_POST[complexCoalBack_bef2];
	// $complex35->data35P3=$_POST[complexCoalBack_bef3];
	// $complex35->data35Aj1=$_POST[complexCoalBack_pre1];
	// $complex35->data35Aj2=$_POST[complexCoalBack_pre2];
	// $complex35->data35Aj3=$_POST[complexCoalBack_pre3];
	// $complex35->data35Aj4=$_POST[complexCoalBack_pre4];
	// $complex35->data35Aj5=$_POST[complexCoalBack_pre5];
	// $complex35->data35As1=$_POST[complexCoalBack_pre1real];
	// $complex35->data35As2=$_POST[complexCoalBack_pre2real];
	// $complex35->data35As3=$_POST[complexCoalBack_pre3real];
	// $complex35->data35As4=$_POST[complexCoalBack_pre4real];
	// $complex35->data35As5=$_POST[complexCoalBack_pre5real];
	// $complex35->add();

	// 	$complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexCoalIn";
	// $complex35->data35P1=$_POST[complexCoalBack_bef1];
	// $complex35->data35P2=$_POST[complexCoalBack_bef2];
	// $complex35->data35P3=$_POST[complexCoalBack_bef3];
	// $complex35->data35Aj1=$_POST[complexCoalBack_pre1];
	// $complex35->data35Aj2=$_POST[complexCoalBack_pre2];
	// $complex35->data35Aj3=$_POST[complexCoalBack_pre3];
	// $complex35->data35Aj4=$_POST[complexCoalBack_pre4];
	// $complex35->data35Aj5=$_POST[complexCoalBack_pre5];
	// $complex35->data35As1=$_POST[complexCoalBack_pre1real];
	// $complex35->data35As2=$_POST[complexCoalBack_pre2real];
	// $complex35->data35As3=$_POST[complexCoalBack_pre3real];
	// $complex35->data35As4=$_POST[complexCoalBack_pre4real];
	// $complex35->data35As5=$_POST[complexCoalBack_pre5real];
	// $complex35->add();
	
	// 	$complex35 = new Data35;
	// $complex35->mineId=$mineid;
	// $complex35->data35name="complexCoalAll";
	// $complex35->data35P1=$_POST[complexCoalAll_bef1];
	// $complex35->data35P2=$_POST[complexCoalAll_bef2];
	// $complex35->data35P3=$_POST[complexCoalAll_bef3];
	// $complex35->data35Aj1=$_POST[complexCoalAll_pre1];
	// $complex35->data35Aj2=$_POST[complexCoalAll_pre2];
	// $complex35->data35Aj3=$_POST[complexCoalAll_pre3];
	// $complex35->data35Aj4=$_POST[complexCoalAll_pre4];
	// $complex35->data35Aj5=$_POST[complexCoalAll_pre5];
	// $complex35->data35As1=$_POST[complexCoalAll_pre1real];
	// $complex35->data35As2=$_POST[complexCoalAll_pre2real];
	// $complex35->data35As3=$_POST[complexCoalAll_pre3real];
	// $complex35->data35As4=$_POST[complexCoalAll_pre4real];
	// $complex35->data35As5=$_POST[complexCoalAll_pre5real];
	// $complex35->add();

	
	//找到科技创新信息id
	$science0 = new Science;
	$sql_legal="select id from `science` WHERE mine_id = $mineid";
	$cArray = $science0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$scienceid=$c->id;
	}
	//保存科技创新信息
	$science=new Science;
	$science->getById($scienceid);
	$science->scienceRate = $_POST[scienceRate];                           //科技创新投入占矿山企业总产值比重
	$science->scienceRateScimoney = $_POST[scienceRateScimoney];         //科技投入资金
	$science->scienceRateAllmoney = $_POST[scienceRateAllmoney];         //总投资
	$science->scienceRateIsone = $_POST[scienceRateIsone];               //比重是否小于1
	$science->sciencePatentCreat = $_POST[sciencePatentCreat];           //发明专利数量
	$science->sciencePatentNewuse = $_POST[sciencePatentNewuse];         //实用新型专利数量
	$science->scienceManrateLow = $_POST[scienceManrateLow];             //初级职称人员及比重
	$science->scienceManrateMid = $_POST[scienceManrateMid];             //中级职称人员及比重
	$science->scienceManrateHigh = $_POST[scienceManrateHigh];           //高级职称人员及比重
	//$science->scienceManrateAll = $_POST[scienceManrateAll];             //总职工人数
	$science->update();
	//科技创新53
	$science35 = new Data35;
	$science35->mineId=$mineid;
	$science35->data35name="scienceRate";
	$science35->data35P1=$_POST[scienceRate_bef1];
	$science35->data35P2=$_POST[scienceRate_bef2];
	$science35->data35P3=$_POST[scienceRate_bef3];
	$science35->data35Aj1=$_POST[scienceRate_pre1];
	$science35->data35Aj2=$_POST[scienceRate_pre2];
	$science35->data35Aj3=$_POST[scienceRate_pre3];
	$science35->data35Aj4=$_POST[scienceRate_pre4];
	$science35->data35Aj5=$_POST[scienceRate_pre5];
	$science35->data35As1=$_POST[scienceRate_pre1real];
	$science35->data35As2=$_POST[scienceRate_pre2real];
	$science35->data35As3=$_POST[scienceRate_pre3real];
	$science35->data35As4=$_POST[scienceRate_pre4real];
	$science35->data35As5=$_POST[scienceRate_pre5real];
	$science35->add();
	
	//找到节能减排信息id
	$energy0 = new Energy;
	$sql_legal="select id from `energy` WHERE mine_id = $mineid";
	$cArray = $energy0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$energyid=$c->id;
	}
	//保存节能减排信息
	$energy=new Energy;
	$energy->getById($energyid);
	$energy->energyElect=$_POST[energyElect];                               //µ•Œªπ§“µ◊‹≤˙÷µµÁ∫ƒ
	$energy->energyElectUse=$_POST[energyElectUse];                       //ƒÍπ§“µ”√µÁ◊‹¡ø
	$energy->energyElectProduct=$_POST[energyElectProduct];               //ƒÍπ§“µ◊‹≤˙÷µ
	$energy->energyWater=$_POST[energyWater];                               //µ•Œªπ§“µ◊‹≤˙÷µÀÆ∫ƒ
	$energy->energyWaterUse=$_POST[energyWaterUse];                       //ƒÍπ§“µ»°ÀÆ◊‹¡ø
	$energy->energyWaterProduct=$_POST[energyWaterProduct];               //ƒÍπ§“µ◊‹≤˙÷µ
	$energy->energyEnergy=$_POST[energyEnergy];                             //µ•ŒªÕÚ‘™π§“µ◊‹≤˙÷µƒ‹∫ƒ
	$energy->energyEnergyUse=$_POST[energyEnergyUse];                     //ƒÍπ§“µƒ‹‘¥œ˚∑—¡ø
	$energy->energyEnergyProduct=$_POST[energyEnergyProduct];             //ƒÍπ§“µ◊‹≤˙÷µ
	$energy->energyWaste=$_POST[energyWaste];                               //øÛ…Ω—°øÛ∑œÀÆ÷ÿ∏¥¿˚”√¬ 
	$energy->energyWasteUse=$_POST[energyWasteUse];                       //÷ÿ∏¥¿˚”√∑œÀÆ¡ø
	$energy->energyWasteNew=$_POST[energyWasteNew];                       //…˙≤˙÷–»°”√µƒ–¬ÀÆ¡ø
	$energy->energyRubbish=$_POST[energyRubbish];                           //øÛ…ΩπÃÃÂ∑œ∆˙ŒÔ◊€∫œ¿˚”√¬ 
	$energy->energyRubbishUse=$_POST[energyRubbishUse];                   //µ±ƒÍ◊€∫œ¿˚”√πÃÃÂ∑œ∆˙ŒÔ◊‹¡ø
	$energy->energyRubbishProduct=$_POST[energyRubbishProduct];           //µ±ƒÍπÃÃÂ∑œ∆˙ŒÔ≤˙…˙¡ø
	$energy->energyRubbishAll=$_POST[energyRubbishAll];                   //Õ˘ƒÍ÷¸¥Ê¡ø◊‹∫Õ
	$energy->energySo2=$_POST[energySo2];                                   //µ•Œªπ§“µ◊‹≤˙÷µSO2≈≈∑≈¡ø
	$energy->energySo2Product=$_POST[energySo2Product];                   //ƒÍ∂»øÛ«¯π§“µSO2≈≈∑≈¡ø
	$energy->energySo2Target=$_POST[energySo2Target];                     //ƒÍ∂»øÛ«¯π§“µ◊‹≤˙÷µ÷∏±Í
	$energy->update();
	//节能减排53
		$energy35 = new Data35;
	$energy35->mineId=$mineid;
	$energy35->data35name="energyElect";
	$energy35->data35P1=$_POST[energyElect_bef1];
	$energy35->data35P2=$_POST[energyElect_bef2];
	$energy35->data35P3=$_POST[energyElect_bef3];
	$energy35->data35Aj1=$_POST[energyElect_pre1];
	$energy35->data35Aj2=$_POST[energyElect_pre2];
	$energy35->data35Aj3=$_POST[energyElect_pre3];
	$energy35->data35Aj4=$_POST[energyElect_pre4];
	$energy35->data35Aj5=$_POST[energyElect_pre5];
	$energy35->data35As1=$_POST[energyElect_pre1real];
	$energy35->data35As2=$_POST[energyElect_pre2real];
	$energy35->data35As3=$_POST[energyElect_pre3real];
	$energy35->data35As4=$_POST[energyElect_pre4real];
	$energy35->data35As5=$_POST[energyElect_pre5real];
	$energy35->add();
	
		$energy35 = new Data35;
	$energy35->mineId=$mineid;
	$energy35->data35name="energyWater";
	$energy35->data35P1=$_POST[energyWater_bef1];
	$energy35->data35P2=$_POST[energyWater_bef2];
	$energy35->data35P3=$_POST[energyWater_bef3];
	$energy35->data35Aj1=$_POST[energyWater_pre1];
	$energy35->data35Aj2=$_POST[energyWater_pre2];
	$energy35->data35Aj3=$_POST[energyWater_pre3];
	$energy35->data35Aj4=$_POST[energyWater_pre4];
	$energy35->data35Aj5=$_POST[energyWater_pre5];
	$energy35->data35As1=$_POST[energyWater_pre1real];
	$energy35->data35As2=$_POST[energyWater_pre2real];
	$energy35->data35As3=$_POST[energyWater_pre3real];
	$energy35->data35As4=$_POST[energyWater_pre4real];
	$energy35->data35As5=$_POST[energyWater_pre5real];
	$energy35->add();
	
	
	
		$energy35 = new Data35;
	$energy35->mineId=$mineid;
	$energy35->data35name="energyEnergy";
	$energy35->data35P1=$_POST[energyEnergy_bef1];
	$energy35->data35P2=$_POST[energyEnergy_bef2];
	$energy35->data35P3=$_POST[energyEnergy_bef3];
	$energy35->data35Aj1=$_POST[energyEnergy_pre1];
	$energy35->data35Aj2=$_POST[energyEnergy_pre2];
	$energy35->data35Aj3=$_POST[energyEnergy_pre3];
	$energy35->data35Aj4=$_POST[energyEnergy_pre4];
	$energy35->data35Aj5=$_POST[energyEnergy_pre5];
	$energy35->data35As1=$_POST[energyEnergy_pre1real];
	$energy35->data35As2=$_POST[energyEnergy_pre2real];
	$energy35->data35As3=$_POST[energyEnergy_pre3real];
	$energy35->data35As4=$_POST[energyEnergy_pre4real];
	$energy35->data35As5=$_POST[energyEnergy_pre5real];
	$energy35->add();
	
	
	
		$energy35 = new Data35;
	$energy35->mineId=$mineid;
	$energy35->data35name="energyWaste";
	$energy35->data35P1=$_POST[energyWaste_bef1];
	$energy35->data35P2=$_POST[energyWaste_bef2];
	$energy35->data35P3=$_POST[energyWaste_bef3];
	$energy35->data35Aj1=$_POST[energyWaste_pre1];
	$energy35->data35Aj2=$_POST[energyWaste_pre2];
	$energy35->data35Aj3=$_POST[energyWaste_pre3];
	$energy35->data35Aj4=$_POST[energyWaste_pre4];
	$energy35->data35Aj5=$_POST[energyWaste_pre5];
	$energy35->data35As1=$_POST[energyWaste_pre1real];
	$energy35->data35As2=$_POST[energyWaste_pre2real];
	$energy35->data35As3=$_POST[energyWaste_pre3real];
	$energy35->data35As4=$_POST[energyWaste_pre4real];
	$energy35->data35As5=$_POST[energyWaste_pre5real];
	$energy35->add();
	
		$energy35 = new Data35;
	$energy35->mineId=$mineid;
	$energy35->data35name="energyRubbish";
	$energy35->data35P1=$_POST[energyRubbish_bef1];
	$energy35->data35P2=$_POST[energyRubbish_bef2];
	$energy35->data35P3=$_POST[energyRubbish_bef3];
	$energy35->data35Aj1=$_POST[energyRubbish_pre1];
	$energy35->data35Aj2=$_POST[energyRubbish_pre2];
	$energy35->data35Aj3=$_POST[energyRubbish_pre3];
	$energy35->data35Aj4=$_POST[energyRubbish_pre4];
	$energy35->data35Aj5=$_POST[energyRubbish_pre5];
	$energy35->data35As1=$_POST[energyRubbish_pre1real];
	$energy35->data35As2=$_POST[energyRubbish_pre2real];
	$energy35->data35As3=$_POST[energyRubbish_pre3real];
	$energy35->data35As4=$_POST[energyRubbish_pre4real];
	$energy35->data35As5=$_POST[energyRubbish_pre5real];
	$energy35->add();
	
		$energy35 = new Data35;
	$energy35->mineId=$mineid;
	$energy35->data35name="energySo2";
	$energy35->data35P1=$_POST[energySo2_bef1];
	$energy35->data35P2=$_POST[energySo2_bef2];
	$energy35->data35P3=$_POST[energySo2_bef3];
	$energy35->data35Aj1=$_POST[energySo2_pre1];
	$energy35->data35Aj2=$_POST[energySo2_pre2];
	$energy35->data35Aj3=$_POST[energySo2_pre3];
	$energy35->data35Aj4=$_POST[energySo2_pre4];
	$energy35->data35Aj5=$_POST[energySo2_pre5];
	$energy35->data35As1=$_POST[energySo2_pre1real];
	$energy35->data35As2=$_POST[energySo2_pre2real];
	$energy35->data35As3=$_POST[energySo2_pre3real];
	$energy35->data35As4=$_POST[energySo2_pre4real];
	$energy35->data35As5=$_POST[energySo2_pre5real];
	$energy35->add();
	//找到环境保护信息id
	$environment0 = new Environment;
	$sql_legal="select id from `environment` WHERE mine_id = $mineid";
	$cArray = $environment0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$environmentid=$c->id;
	}
	//环境保护信息
	$environment=new Environment;
	$environment->getById($environmentid);
	$environment->environmentRate=$_POST[environmentRate];                  //绿化覆盖率
	$environment->environmentRateGreen=$_POST[environmentRateGreen];      //矿区内全部绿化种植垂直投影面积
	$environment->environmentRateArea=$_POST[environmentRateArea];        //矿区面积
	$environment->environmentIsThree=$_POST[environmentIsThree];          //是否执行环境保护“三同时”制度
	$environment->environmentIsDisaster=$_POST[environmentIsDisaster];//三年内有无发生重大地质灾害
	$environment->environmentIsAir=$_POST[environmentIsAir];              //矿区大气环境质量是否达到“环境空气质量标准”二级以上
	$environment->environmentIsWater=$_POST[environmentIsWater];          //是否达到《地表水环境质量标准》
	$environment->environmentIsSound=$_POST[environmentIsSound];          //是否达到《工业企业厂界噪声标准》
	$environment->update();
	//环境保护53
	$environment35 = new Data35;
	$environment35->mineId=$mineid;
	$environment35->data35name="environmentRate";
	$environment35->data35P1=$_POST[environmentRate_bef1];
	$environment35->data35P2=$_POST[environmentRate_bef2];
	$environment35->data35P3=$_POST[environmentRate_bef3];
	$environment35->data35Aj1=$_POST[environmentRate_pre1];
	$environment35->data35Aj2=$_POST[environmentRate_pre2];
	$environment35->data35Aj3=$_POST[environmentRate_pre3];
	$environment35->data35Aj4=$_POST[environmentRate_pre4];
	$environment35->data35Aj5=$_POST[environmentRate_pre5];
	$environment35->data35As1=$_POST[environmentRate_pre1real];
	$environment35->data35As2=$_POST[environmentRate_pre2real];
	$environment35->data35As3=$_POST[environmentRate_pre3real];
	$environment35->data35As4=$_POST[environmentRate_pre4real];
	$environment35->data35As5=$_POST[environmentRate_pre5real];
	$environment35->add();
	
	//找到土地复垦信息id
	$reclamation0 = new Reclamation;
	$sql_legal="select id from `reclamation` WHERE mine_id = $mineid";
	$cArray = $reclamation0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$reclamationid=$c->id;
	}
	//土地复垦信息
    $reclamation=new Reclamation;
	$reclamation->getById($reclamationid);
	$reclamation->reclamationRate=$_POST[reclamationRate];                  //土地复垦率
	$reclamation->reclamationRateHave=$_POST[reclamationRateHave];        //已复垦土地面积
	$reclamation->reclamationRateCan=$_POST[reclamationRateCan];          //可复垦土地面积
	$reclamation->reclamationMoney=$_POST[reclamationMoney];                //土地复垦每亩经济效益
	$reclamation->reclamationPrice=$_POST[reclamationPrice];                //土地复垦每亩平均投资
	$reclamation->update();

	//土地复垦53
	$reclamation35 = new Data35;
	$reclamation35->mineId=$mineid;
	$reclamation35->data35name="reclamationRate";
	$reclamation35->data35P1=$_POST[reclamationRate_bef1];
	$reclamation35->data35P2=$_POST[reclamationRate_bef2];
	$reclamation35->data35P3=$_POST[reclamationRate_bef3];
	$reclamation35->data35Aj1=$_POST[reclamationRate_pre1];
	$reclamation35->data35Aj2=$_POST[reclamationRate_pre2];
	$reclamation35->data35Aj3=$_POST[reclamationRate_pre3];
	$reclamation35->data35Aj4=$_POST[reclamationRate_pre4];
	$reclamation35->data35Aj5=$_POST[reclamationRate_pre5];
	$reclamation35->data35As1=$_POST[reclamationRate_pre1real];
	$reclamation35->data35As2=$_POST[reclamationRate_pre2real];
	$reclamation35->data35As3=$_POST[reclamationRate_pre3real];
	$reclamation35->data35As4=$_POST[reclamationRate_pre4real];
	$reclamation35->data35As5=$_POST[reclamationRate_pre5real];
	$reclamation35->add();
	
	$reclamation35 = new Data35;
	$reclamation35->mineId=$mineid;
	$reclamation35->data35name="reclamationMoney";
	$reclamation35->data35P1=$_POST[reclamationMoney_bef1];
	$reclamation35->data35P2=$_POST[reclamationMoney_bef2];
	$reclamation35->data35P3=$_POST[reclamationMoney_bef3];
	$reclamation35->data35Aj1=$_POST[reclamationMoney_pre1];
	$reclamation35->data35Aj2=$_POST[reclamationMoney_pre2];
	$reclamation35->data35Aj3=$_POST[reclamationMoney_pre3];
	$reclamation35->data35Aj4=$_POST[reclamationMoney_pre4];
	$reclamation35->data35Aj5=$_POST[reclamationMoney_pre5];
	$reclamation35->data35As1=$_POST[reclamationMoney_pre1real];
	$reclamation35->data35As2=$_POST[reclamationMoney_pre2real];
	$reclamation35->data35As3=$_POST[reclamationMoney_pre3real];
	$reclamation35->data35As4=$_POST[reclamationMoney_pre4real];
	$reclamation35->data35As5=$_POST[reclamationMoney_pre5real];
	$reclamation35->add();
	
	$reclamation35 = new Data35;
	$reclamation35->mineId=$mineid;
	$reclamation35->data35name="reclamationPrice";
	$reclamation35->data35P1=$_POST[reclamationPrice_bef1];
	$reclamation35->data35P2=$_POST[reclamationPrice_bef2];
	$reclamation35->data35P3=$_POST[reclamationPrice_bef3];
	$reclamation35->data35Aj1=$_POST[reclamationPrice_pre1];
	$reclamation35->data35Aj2=$_POST[reclamationPrice_pre2];
	$reclamation35->data35Aj3=$_POST[reclamationPrice_pre3];
	$reclamation35->data35Aj4=$_POST[reclamationPrice_pre4];
	$reclamation35->data35Aj5=$_POST[reclamationPrice_pre5];
	$reclamation35->data35As1=$_POST[reclamationPrice_pre1real];
	$reclamation35->data35As2=$_POST[reclamationPrice_pre2real];
	$reclamation35->data35As3=$_POST[reclamationPrice_pre3real];
	$reclamation35->data35As4=$_POST[reclamationPrice_pre4real];
	$reclamation35->data35As5=$_POST[reclamationPrice_pre5real];
	$reclamation35->add();
	//找到社区和谐信息id
	$community0 = new Community;
	$sql_legal="select id from `community` WHERE mine_id = $mineid";
	$cArray = $community0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$communityid=$c->id;
	}
	//社区和谐信息
	$community=new Community;
	$community->getById($communityid);
	$community->communityDonate=$_POST[communityDonate];                    //π´π≤æË‘˘
	$community->communityDonateBase=$_POST[communityDonateBase];          //ª˘¥°…Ë ©
	$community->communityDonateStudy=$_POST[communityDonateStudy];        //ΩÃ”˝
	$community->communityDonateChannel=$_POST[communityDonateChannel];    //«˛µ¿–ﬁΩ®
	$community->communityDonateRoad=$_POST[communityDonateRoad];          //¬∑√ÊÕÿøÌ”≤ªØ
	$community->communityDonateComment=$_POST[communityDonateComment];    //±∏◊¢
	$community->communityManrate=$_POST[communityManrate];                  //µÿ«¯»∫÷⁄æÕ“µ’ºøÛ…Ω÷∞π§»À
	$community->communityTacitFarm=$_POST[communityTacitFarm];            //÷ß≈©
	$community->communityTacitTeach=$_POST[communityTacitTeach];          //÷ßΩÃ
	$community->communityTacitDefeat=$_POST[communityTacitDefeat];        //øπ‘÷
	$community->communityTacitHelp=$_POST[communityTacitHelp];            //Í‚‘÷
	$community->communityTacitComment=$_POST[communityTacitComment];      //±∏◊¢
	$community->communityWelfare=$_POST[communityWelfare];                  //÷∞π§∏£¿˚
	$community->update();
	//找到企业文化信息id
	$culture0 = new Culture;
	$sql_legal="select id from `culture` WHERE mine_id = $mineid";
	$cArray = $culture0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$cultureid=$c->id;
	}
	//企业文化信息
	$culture=new Culture;
	$culture->getById($cultureid);
	$culture->cultureAim=$_POST[cultureAim];                                //∆Û“µ◊⁄÷º
	$culture->cultureIdea=$_POST[cultureIdea];                              //æ≠”™¿ÌƒÓ
	$culture->cultureBelief=$_POST[cultureBelief];                          //∆Û“µ–≈Ãı
	$culture->cultureRecogImage=$_POST[cultureRecogImage];

	$culture->cultureOrgan = $_POST[cultureOrgan];		//∆Û“µ ∂±œµÕ≥Õº∆¨  
	$culture->cultureOrganMusic=$_POST[cultureOrganMusic];                //∆Û“µ÷Æ∏Ë
	$culture->cultureOrganMusicLrc=$_POST[cultureOrganMusicLrc];        //∏Ë¥ 
	$culture->cultureOrganMusicFile=$_POST[cultureOrganMusicFile];      //“Ù∆µ
	$culture->cultureOrganActive=$_POST[cultureOrganActive]; //ŒƒÃÂªÓ∂Ø¥Œ ˝
	$culture->cultureOrganPaper=$_POST[cultureOrganPaper];                //∆Û“µƒ⁄≤øøØŒÔªÚ±®÷Ω
	$culture->cultureVideo=$_POST[cultureVideo];                            //∆Û“µ–˚¥´ ”∆µ
	$culture->cultureOther=$_POST[cultureOther];                            //∆‰À˚
	$culture->update();
	//更新重点工程
	$project0 = new Project;
	$sql_project="select * from `project` WHERE mine_id = $mineid";
	$pArray = $project0->getArray($sql_project,true);
	foreach($pArray as $p)
	{
		$project0->remove($p->id, false);
	}
	$flag=count($_POST[projectNum]);
	for($i=0;$i<$flag;$i++)
	{
		//
		$projectdata[$i] = new Project;
		$projectdata[$i]->projectNum=$_POST[projectNum][$i];
		$projectdata[$i]->projectName=$_POST[projectName][$i];
		$projectdata[$i]->projectDetail=$_POST[projectDetail][$i];
		$projectdata[$i]->projectlWorktime=$_POST[projectlWorktime][$i];
		$projectdata[$i]->projectCost=$_POST[projectCost][$i];
		$projectdata[$i]->projectMoney=$_POST[projectMoney][$i];
		$projectdata[$i]->projectOrgan=$_POST[projectOrgan][$i];
		$projectdata[$i]->projectEffect=$_POST[projectEffect][$i];
		$projectdata[$i]->projectType=$_POST[projectType][$i];
		$projectdata[$i]->projectStarttime=$_POST[projectStarttime][$i];
		$projectdata[$i]->projectFinish1=$_POST[projectFinish1][$i];
		$projectdata[$i]->projectFinish2=$_POST[projectFinish2][$i];
		$projectdata[$i]->projectFinish3=$_POST[projectFinish3][$i];
		$projectdata[$i]->projectFinish4=$_POST[projectFinish4][$i];
		$projectdata[$i]->projectFinish5=$_POST[projectFinish5][$i];
		$projectdata[$i]->mineId=$mineid;
		$projectdata[$i]->add();
	}
	//找到审核意见信息id
	$audit0 = new Audit;
	$sql_legal="select * from `audit` WHERE mine_id = $mineid";
	$cArray = $audit0->getArray($sql_legal,true);
	foreach($cArray as $c)
	{
		$auditid=$c->id;
	}
	
	//审核意见信息
    $audit = new Audit;
	$audit->getById($auditid);
	$audit->auditNation=$_POST[auditNation];                                //国土资源部审核意见
	$audit->auditNationTime=$_POST[auditNationTime];                      //审核时间
	$audit->auditPlace=$_POST[auditPlace];                                 //省级国土资源主管部门审核意见
	$audit->auditPlaceTime=$_POST[auditPlaceTime];                       //审核时间
	$audit->auditIndustry=$_POST[auditIndustry];                           //行业协会审核意见
	$audit->auditIndustryTime=$_POST[auditIndustryTime];                 //审核时间
	$audit->auditShi=$_POST[auditShi];                           //––“µ–≠ª·…Û∫À“‚º˚
	$audit->auditShiTime=$_POST[auditShiTime];
	$audit->auditXian=$_POST[auditXian];                           //––“µ–≠ª·…Û∫À“‚º˚
	$audit->auditXianTime=$_POST[auditXianTime]; 

	
	$audit->update();
	
	//保存专家及专家意见
	$expert =  new Expert;
	$sql_2 = "select * from `expert` WHERE mine_id = $mineid AND isshenbao = 0";
	$iArray = $expert->getArray($sql_2,true);
	foreach($iArray as $i)
	{
		$expert->remove($i->id, false);
	}
	$flag=count($_POST[expertName]);
	for($i=0;$i<$flag;$i++)
	{
		//
		$expertdata[$i] = new Expert;
		$expertdata[$i]->expertName=$_POST[expertName][$i];
		$expertdata[$i]->expertSex=$_POST[expertSex][$i];
		$expertdata[$i]->expertAge=$_POST[expertAge][$i];
		$expertdata[$i]->expertCompany=$_POST[expertCompany][$i];
		$expertdata[$i]->expertTitles=$_POST[expertTitles][$i];
		$expertdata[$i]->expertWork=$_POST[expertWork][$i];
		$expertdata[$i]->expertSubject=$_POST[expertSubject][$i];
		$expertdata[$i]->expertCellphone=$_POST[expertCellphone][$i];
		$expertdata[$i]->expertLandhone=$_POST[expertLandhone][$i];
		$expertdata[$i]->expertEmail=$_POST[expertEmail][$i];
		$expertdata[$i]->expertFax=$_POST[expertFax][$i];
		$expertdata[$i]->expertAddress=$_POST[expertAddress][$i];
		$expertdata[$i]->expertIdea=$_POST[expertIdea][$i];
		$expertdata[$i]->expertTime=$_POST[expertTime][$i];
		$expertdata[$i]->isshenbao=0;
		$expertdata[$i]->mineId=$mineid;
		$expertdata[$i]->add();
	}
		

http302('/minedata/ListMineDetails/'.$mineid.'/'.urlencode('保存成功！')); 
}
?>