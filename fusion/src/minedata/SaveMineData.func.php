<?php		
function SaveMineData($mineid,$notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//¡À??¡Â??????¡­??¡Â¡Ì????1
	

	$minedata= new Mine;
	$minedata->getByID($mineid);
	$minedata->guihua='1';
	$minedata->update();
	//¡À??????????¡À??¦Ð??????¨C¡Ö????
	$basedata = new Basedata;
	$basedata->mineId=$mineid;
	$basedata->basedataBgname = $_POST[basedataBgname];                  //¦Ð??????¡À??¡Ç??¡Ì??¡Ý??
	$basedata->basedataLimit = $_POST[basedataLimit];                    //¦Ð?????????????? 
	$basedata->basedataOrgan = $_POST[basedataOrgan];                    //????¡Â??????????
	$basedata->basedataEstablish = $_POST[basedataEstablish];            //¡À??¡Â??????????
	$basedata->basedataBgdate = $_POST[basedataBgdate];                  //¡À??¡Ç??¡Ý????????¡¯????
	$basedata->basedataMinename = $_POST[basedataMinename];              //????¡­¦¸¡Ì??¡Ý??
	$basedata->basedataBuildtime = $_POST[basedataBuildtime];            //????¡­¦¸¡Ý¡­??????¡À??¡ë
	$basedata->basedataCompanyname = $_POST[basedataCompanyname];        //????¡°??¡Ì??¡Ý??
	$basedata->basedataEnterpriseproperty = $_POST[basedataEnterpriseproperty];//????¡°??¨C¡®¡Â??
	$basedata->basedataOwedname = $_POST[basedataOwedname];              //????????????¡°??¡Ì??¡Ý??
	$basedata->basedataDivisionsSheng = $_POST[basedataDivisionsSheng];
	$basedata->basedataDivisionsShi = $_POST[basedataDivisionsShi];
	$basedata->basedataDivisionsXian = $_POST[basedataDivisionsXian];
	$basedata->basedataDivisionsZhen = $_POST[basedataDivisionsZhen];
	$basedata->basedataDivisions = $_POST[basedataDivisions];            //????¡­¦¸¨C¨C¡¯??????????
	$basedata->basedataAreaLongitude = $_POST[basedataAreaLongitude];  //¦Ð??????¡Æ?????? ??¡Ù????
	$basedata->basedataAreaLatitude = $_POST[basedataAreaLatitude];    //??¡Ý????
	$basedata->basedataArea = $_POST[basedataArea];                      //????¡­¦¸¡Ì??????
	$basedata->basedataAuthority = $_POST[basedataAuthority];            //????¡°??????????¨C??
	$basedata->basedataAuthDig = $_POST[basedataAuthDig];              //¡Ü¡­????????
	$basedata->basedataAuthFind = $_POST[basedataAuthFind];            //??¦¸????????
	$basedata->basedataAuthArea = $_POST[basedataAuthArea];            //????????????????¡Æ??????
	$basedata->basedataAuthHeight = $_POST[basedataAuthHeight];        //¡Ü¡­????¡À??¡Ç??
	$basedata->basedataAuthNum = $_POST[basedataAuthNum];              //????¡°??????¡Â¡ì¡Ò¡Ö
	$basedata->basedataAuthAddress = $_POST[basedataAuthAddress];      //????????????¡Â¡Æ
	$basedata->basedataAuthDeadline = $_POST[basedataAuthDeadline];    //¡±¨C¨C??????????
	$basedata->basedataAuthGetime = $_POST[basedataAuthGetime];        //basedata_auth_getime
	$basedata->basedataAuthOrgan = $_POST[basedataAuthOrgan];          //¡Æ??¡Â¡ì??¨B¦Ð??
	$basedata->basedataPointLongitude = $_POST[basedataPointLongitude];//????????????????????¡À?? ??¡Ù????
	$basedata->basedataPointLatitude = $_POST[basedataPointLatitude];  //??¡Ý????
	$basedata->basedataDigtype = $_POST[basedataDigtype];                //????¡­¦¸????¡Ü¡­¡Æ¦¸??¦¸
	$basedata->basedataDigreturnrate = $_POST[basedataDigreturnrate];    //????¡­¦¸????¡Ü¡­????¡Ü¡­????
	$basedata->basedataMinertype = $_POST[basedataMinertype];            //????¡­¦¸??????¡Ü????¨C??
	$basedata->basedataResourcesTotal = $_POST[basedataResourcesTotal];//????¡­¦¸????¡®??????????
	$basedata->basedataResourcesHave = $_POST[basedataResourcesHave];  //¡À??¡±¨C????????
	$basedata->basedataResourcesAvailable = $_POST[basedataResourcesAvailable];      //??¡­¡Ü¡­????????
	$basedata->basedataLevel = $_POST[basedataLevel];                   //????????????¡À??
	$basedata->basedataMinescale = $_POST[basedataMinescale];           //????????¦Ð??????
	$basedata->basedataProduceScale = $_POST[basedataProduceScale];   //????????¡­¨B¡Ü¨B¦Ð??????
	$basedata->basedataProduceDig = $_POST[basedataProduceDig];       //????¡Ü¡­¦Ð??????
	$basedata->basedataProduceFactory = $_POST[basedataProduceFactory];//¡ª¡ã????¡Ý??¦Ð??????
	$basedata->basedataCoaltype = $_POST[basedataCoaltype];              //¡Ì¡Ò¡Â¡Â
	$basedata->basedataSepa = $_POST[basedataSepa];                      //¡ª¡ã????¡Æ¦¸¡Æ??
	$basedata->basedataSepareturnrate = $_POST[basedataSepareturnrate];  //????¡­¦¸¡ª¡ã??????????¡¯????
	$basedata->basedataPlan = $_POST[basedataPlan];                      //¡Ü¨B??¡Æ¡Æ¦¸¡Þ¡Ç
	$basedata->basedataPlanMetal = $_POST[basedataPlanMetal];          //¦¸??????????
	$basedata->basedataPlanMetalYuan = $_POST[basedataPlanMetalYuan];//¡®¡Ù????
	$basedata->basedataPlanMetalJing = $_POST[basedataPlanMetalJing];//????????
	$basedata->basedataPlanMetalChan = $_POST[basedataPlanMetalChan];//¡Ü¨B??¡Æ
	$basedata->basedataPlanEnergy = $_POST[basedataPlanEnergy];        //????¡®??????
	$basedata->basedataPlanEnergyYuan = $_POST[basedataPlanEnergyYuan];//¡®¡Ù????
	$basedata->basedataPlanEnergyJing = $_POST[basedataPlanEnergyJing];//????????
	$basedata->basedataPlanEnergyShen = $_POST[basedataPlanEnergyShen];//¡­????¡±¦Ð¡ì
	$basedata->basedataPlanNot = $_POST[basedataPlanNot];                //¡Æ??¦¸??????????
	$basedata->basedataPlanNotYuan = $_POST[basedataPlanNotYuan];      //¡®¡Ù????
	$basedata->basedataPlanNotJing = $_POST[basedataPlanNotJing];      //????????
	$basedata->basedataPlanNotShen = $_POST[basedataPlanNotShen];      //¡­????¡±¦Ð¡ì
	$basedata->basedataValue = $_POST[basedataValue];                      //????¡­¦¸????¡°??????¡Ü¨B¡Â??
	$basedata->basedataFee = $_POST[basedataFee];                          //????¡­¦¸????¡°????????¡Þ
	$basedata->basedataProfit = $_POST[basedataProfit];                  //????¡­¦¸????¡°??????????
	$basedata->basedataWorker = $_POST[basedataWorker];                    //????¡­¦¸????¡°??????????
	$basedata->basedataReward = $_POST[basedataReward];                    //????¡°??????¡±??
	$basedata->basedataJiqizhi = $_POST[basedataJiqizhi];
	$basedata->basedataProduceDigUnit = $_POST[basedataProduceDigUnit];
	$basedata->basedataProduceFactoryUnit = $_POST[basedataProduceFactoryUnit];
	$basedata->basedataSepaCixuan = $_POST[basedataSepaCixuan];                    //????¡°??????¡±??
	$basedata->basedataSepaZhongxuan = $_POST[basedataSepaZhongxuan];
	$basedata->basedataSepaFuxuan = $_POST[basedataSepaFuxuan];
	$basedata->basedataSepaDianxuan = $_POST[basedataSepaDianxuan];
	$basedata->basedataGreenlvl = $_POST[basedataGreenlvl];
	$basedata->basedataYuanHua = $_POST[basedataYuanHua];
	$basedata->basedataWeiHua = $_POST[basedataWeiHua];
	$basedata->add();

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
	
	$basedata35 = new Data35;
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
	
	//删除除定位gis地图经度纬度
    $zuobiao = new OreZuobiao;
    $sql_zuobiao = "select * from `oreZuobiao` WHERE mine_id = $mineid";
    $dArray = $zuobiao->getArray($sql_zuobiao,true);
    foreach ($dArray as $key) {
       	$zuobiao->remove($key->id, false);
    }
	//保存多坐标信息
	$flagZB=count($_POST[basedataZuobiaoJing]);
	echo $flagZB.'<br>';
	var_dump($_POST[basedataZuobiaoJing]);
	for($i=0;$i<$flagZB;$i++){
		$minezuobiao = new OreZuobiao;
		$minezuobiao->mineId=$mineid;
		$minezuobiao->jingdu=$_POST[basedataZuobiaoJing][$i];
		$minezuobiao->weidu=$_POST[basedataZuobiaoWei][$i];
		$minezuobiao->add();
	}

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
	
    //¡°??¡Æ??¡Þ??????
    $legal=new Legal;
	$legal->mineId=$mineid;
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
    $legal->legalWaterIshave=$_POST[legalWaterIshave];
    $legal->legalWaterName=$_POST[legalWaterName];
    $legal->legalWaterOrgan=$_POST[legalWaterOrgan];
    $legal->legalWaterTime=$_POST[legalWaterTime];
    $legal->legalWaterDeadline=$_POST[legalWaterDeadline];
    $legal->legalLandIshave=$_POST[legalLandIshave];
    $legal->legalLandName=$_POST[legalLandName];
    $legal->legalLandOrgan=$_POST[legalLandOrgan];
    $legal->legalLandTime=$_POST[legalLandTime];
    $legal->legalLandDeadline=$_POST[legalLandDeadline];
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
    $legal->add();	
	
    //¦Ð??¡Æ??¦Ð??????
    $standard=new Standard;
	$standard->mineId=$mineid;
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
	$standard->add();	

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
		// print_r($oredata[$i]->orename);
		// print_r($_POST[oretype][$i]);
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
		// echo $i.'<br>';
		// print_r($_POST[kaicaihuicai)
		// print_r($oredata[$i]);
		$oredata[$i]->add();

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
			// var_dump($orexuankuanghuishou1);
			// var_dump($orexuankuanghuishou2);
			// var_dump($orexuankuanghuishou3);
			$xkhsstandsql="select * from `orestandard_xkhs` where subclass1 = '$orexuankuanghuishou1' AND subclass2 = '$orexuankuanghuishou2' AND subclass3 = '$orexuankuanghuishou3'";
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

			$kchclv->mineId = $mineid;
			$kchclv->oreId = $oredata[$i]->id; 
			$kchclv->standardId = $kchcstandArray[0]->id; 
			$kchclv->add();
		}

		//更新综合利用率及53
		$flagede=count($_POST[complexUserate][$i]);
		for ($y=0; $y <$flagede ; $y++) 
		{ 
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

			$zhlylv->mineId = $mineid;
			$zhlylv->oreId = $oredata[$i]->id; 
			$zhlylv->standardId = $zhlystandArray[0]->id; 
			$zhlylv->add();
		}
	}
		
	//¡À??????????????????¨C??¨C¡Ö????
	$science=new Science;
	$science->mineId=$mineid;
	$science->scienceRate = $_POST[scienceRate];                           //????????????¨C??????????¡¯??????¡­¦¸????¡°??????¡Ü¨B¡Â??¡À??¡Â??
	$science->scienceRateScimoney = $_POST[scienceRateScimoney];         //????????????????????¦¸??
	$science->scienceRateAllmoney = $_POST[scienceRateAllmoney];         //????????????
	$science->scienceRateIsone = $_POST[scienceRateIsone];               //¡À??¡Â??????¡Æ??¨C¡ã¡±??1  
	$science->sciencePatentCreat = $_POST[sciencePatentCreat];           //¡Æ??¡Ì??????????????????
	$science->sciencePatentNewuse = $_POST[sciencePatentNewuse];         //????¡±¡Ì¨C??¨C??????????????????
	$science->scienceManrateLow = $_POST[scienceManrateLow];             //¡Ý??????¡Â¡Þ¡Ý??????¡®¡À??¡Þ¡À??¡Â??
	$science->scienceManrateMid = $_POST[scienceManrateMid];             //¡Â¨C????¡Â¡Þ¡Ý??????¡®¡À??¡Þ¡À??¡Â??
	$science->scienceManrateHigh = $_POST[scienceManrateHigh];           //¡Ç??????¡Â¡Þ¡Ý??????¡®¡À??¡Þ¡À??¡Â??
	$science->scienceManrateAll = $_POST[scienceManrateAll];             //????¡Â¡Þ¦Ð¡ì????????
	$science->add();
	
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

	//¡À??????¦¸??????????¡Ö¡Ö¨C¡Ö????
	$energy=new Energy;
	$energy->mineId=$mineid;
	$energy->energyElect=$_POST[energyElect];                               //????????¦Ð¡ì¡°??????¡Ü¨B¡Â??????¡Ò??
	$energy->energyElectUse=$_POST[energyElectUse];                       //????¦Ð¡ì¡°??¡±¡Ì????????????
	$energy->energyElectProduct=$_POST[energyElectProduct];               //????¦Ð¡ì¡°??????¡Ü¨B¡Â??
	$energy->energyWater=$_POST[energyWater];                               //????????¦Ð¡ì¡°??????¡Ü¨B¡Â??????¡Ò??
	$energy->energyWaterUse=$_POST[energyWaterUse];                       //????¦Ð¡ì¡°????¡ã????????????
	$energy->energyWaterProduct=$_POST[energyWaterProduct];               //????¦Ð¡ì¡°??????¡Ü¨B¡Â??
	$energy->energyEnergy=$_POST[energyEnergy];                             //????????????¡®??¦Ð¡ì¡°??????¡Ü¨B¡Â??????¡Ò??
	$energy->energyEnergyUse=$_POST[energyEnergyUse];                     //????¦Ð¡ì¡°??????¡®??????¡Æ¡ª????
	$energy->energyEnergyProduct=$_POST[energyEnergyProduct];             //????¦Ð¡ì¡°??????¡Ü¨B¡Â??
	$energy->energyWaste=$_POST[energyWaste];                               //????¡­¦¸¡ª¡ã????¡Æ??????¡Â??¡Ç??????¡±¡Ì????
	$energy->energyWasteUse=$_POST[energyWasteUse];                       //¡Â??¡Ç??????¡±¡Ì¡Æ??????????
	$energy->energyWasteNew=$_POST[energyWasteNew];                       //¡­¨B¡Ü¨B¡Â¨C??¡ã¡±¡Ì????¨C??????????
	$energy->energyRubbish=$_POST[energyRubbish];                           //????¡­¦¸¦Ð??????¡Æ????¨B??????¢ã¡Ò??????¡±¡Ì????
	$energy->energyRubbishUse=$_POST[energyRubbishUse];                   //??¡À??????¢ã¡Ò??????¡±¡Ì¦Ð??????¡Æ????¨B????????????
	$energy->energyRubbishProduct=$_POST[energyRubbishProduct];           //??¡À????¦Ð??????¡Æ????¨B????¡Ü¨B¡­¨B????
	$energy->energyRubbishAll=$_POST[energyRubbishAll];                   //????????¡Â??????????????¡Ò??
	$energy->energySo2=$_POST[energySo2];                                   //????????¦Ð¡ì¡°??????¡Ü¨B¡Â??SO2¡Ö¡Ö¡Æ¡Ö????
	$energy->energySo2Product=$_POST[energySo2Product];                   //????????????????¦Ð¡ì¡°??SO2¡Ö¡Ö¡Æ¡Ö????
	$energy->energySo2Target=$_POST[energySo2Target];                     //????????????????¦Ð¡ì¡°??????¡Ü¨B¡Â??¡Â¡Ç¡À??
	$energy->add();
	
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
	$energy35->data35Aj5=$_POST[cultureOther];
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
	
	//??¡Æ??¡Ý¡À????¡ì¨C¡Ö????
	$environment=new Environment;
	$environment->mineId=$mineid;
	$environment->environmentRate=$_POST[environmentRate];                  //????????¡Ç¡Ü¡Ç??????
	$environment->environmentRateGreen=$_POST[environmentRateGreen];      //????????????????¡Ü??????????¡Â¡Â¡Â¡Ü??¦Ð¡Â¡À????¡±¡Þ¡Ì??????
	$environment->environmentRateArea=$_POST[environmentRateArea];        //????????¡Ì??????
	$environment->environmentIsThree=$_POST[environmentIsThree];          //????¡Æ??¡Â??¨C¨C??¡Æ??¡Ý¡À????¡ì¡ã¡Þ??????¡§??¡À¡ã¡À¡Â??????
	$environment->environmentIsDisaster=$_POST[environmentIsDisaster];//????????????¡±¨C????¡Æ??¡­¨B¡Â??????????¡Â??¡®¡Â¡Ò??
	$environment->environmentIsAir=$_POST[environmentIsAir];              //??????????????????¡Æ??¡Ý¡Â??????????¡Æ????????¦¸¡ã¡Þ??¡Æ??¡Ý??¡¯????¡Â??????¡À??????¡ã¡À????????¡°¡®¡­??
	$environment->environmentIsWater=$_POST[environmentIsWater];          //????¡Æ????????¦¸¡ã??????¡À????????¡Æ??¡Ý¡Â??????¡À??????¡ã¡Æ
	$environment->environmentIsSound=$_POST[environmentIsSound];          //????¡Æ????????¦¸¡ã??¦Ð¡ì¡°??????¡°??¡Ý??¦¸??¡®??¡­??¡À??????¡ã¡Æ
	$environment->add();
	
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

    //????????¡Ç????¡ª¨C¡Ö????
    $reclamation=new Reclamation;
	$reclamation->mineId=$mineid;
	$reclamation->reclamationRate=$_POST[reclamationRate];                  //????????¡Ç????¡ª????
	$reclamation->reclamationRateHave=$_POST[reclamationRateHave];        //¡°¡ª¡Ç????¡ª????????¡Ì??????
	$reclamation->reclamationRateCan=$_POST[reclamationRateCan];          //??¡­¡Ç????¡ª????????¡Ì??????
	$reclamation->reclamationMoney=$_POST[reclamationMoney];                //????????¡Ç????¡ª¡Ì????????¡Ù??¡Ì¨C??¡°??
	$reclamation->reclamationPrice=$_POST[reclamationPrice];                //????????¡Ç????¡ª¡Ì????????¦¸????????????
	$reclamation->add();
	
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

	//¡­??????¡Ò??¨C¡Ý¨C¡Ö????
	$community=new Community;
	$community->mineId=$mineid;
	$community->communityDonate=$_POST[communityDonate];                    //¦Ð??¦Ð¡Ü????¡®??
	$community->communityDonateBase=$_POST[communityDonateBase];          //??????¡ã¡­??????
	$community->communityDonateStudy=$_POST[communityDonateStudy];        //¦¸??¡±??
	$community->communityDonateChannel=$_POST[communityDonateChannel];    //????????¨C??¦¸??
	$community->communityDonateRoad=$_POST[communityDonateRoad];          //??¡Æ¡Ì??????????¡±¡Ü????
	$community->communityDonateComment=$_POST[communityDonateComment];    //¡À¡Ç????
	$community->communityManrate=$_POST[communityManrate];                  //??????????¡Ò¡Â??????¡°??¡¯??????¡­¦¸¡Â¡Þ¦Ð¡ì????
	$community->communityTacitFarm=$_POST[communityTacitFarm];            //¡Â??¡Ö??
	$community->communityTacitTeach=$_POST[communityTacitTeach];          //¡Â??¦¸??
	$community->communityTacitDefeat=$_POST[communityTacitDefeat];        //??¦Ð¡®¡Â
	$community->communityTacitHelp=$_POST[communityTacitHelp];            //????¡®¡Â
	$community->communityTacitComment=$_POST[communityTacitComment];      //¡À¡Ç????
	$community->communityWelfare=$_POST[communityWelfare];                  //¡Â¡Þ¦Ð¡ì¡Ç??????
	$community->add();

	//????¡°??????????¨C¡Ö????
	$culture=new Culture;
	$culture->mineId=$mineid;
	$culture->cultureAim=$_POST[cultureAim];                                //????¡°??????¡Â??
	$culture->cultureIdea=$_POST[cultureIdea];                              //??¡Ù¡±??????????
	$culture->cultureBelief=$_POST[cultureBelief];                          //????¡°??¨C¡Ö????
	$culture->cultureRecogImage=$_POST[cultureRecogImage];                //????¡°??????¡À????????¡Ý??????¡§  
	$culture->cultureOrganMusic=$_POST[cultureOrganMusic];                //????¡°??¡Â??¡Ç??
	$culture->cultureOrganMusicLrc=$_POST[cultureOrganMusicLrc];        //¡Ç??????
	$culture->cultureOrganMusicFile=$_POST[cultureOrganMusicFile];      //¡°??????
	$culture->cultureOrganActive=$_POST[cultureOrganActive]; //????????????????????????
	$culture->cultureOrganPaper=$_POST[cultureOrganPaper];                //????¡°??????¡Ü??????????????¡À??¡Â¦¸
	$culture->cultureVideo=$_POST[cultureVideo];                            //????¡°??¨C????????¡±????
	$culture->cultureOther=$_POST[cultureOther];                            //??¡ë????
	$culture->add();
	//¡Â??????¦Ð¡ì¡Ý??
	$flag=count($_POST[projectNum]);
	for($i=0;$i<$flag;$i++)
	{
		$projectdata[$i] = new Project;
		$projectdata[$i]->projectNum = $_POST[projectNum][$i];
		$projectdata[$i]->projectName = $_POST[projectName][$i];
		$projectdata[$i]->projectDetail = $_POST[projectDetail][$i];
		$projectdata[$i]->projectlWorktime = $_POST[projectlWorktime][$i];
		$projectdata[$i]->projectCost = $_POST[projectCost][$i];
		$projectdata[$i]->projectMoney = $_POST[projectMoney][$i];
		$projectdata[$i]->projectOrgan = $_POST[projectOrgan][$i];
		$projectdata[$i]->projectEffect = $_POST[projectEffect][$i];
		$projectdata[$i]->projectType = $_POST[projectType][$i];
		$projectdata[$i]->projectStarttime = $_POST[projectStarttime][$i];
		$projectdata[$i]->projectFinish1 = $_POST[projectFinish1][$i];
		$projectdata[$i]->projectFinish2 = $_POST[projectFinish2][$i];
		$projectdata[$i]->projectFinish3 = $_POST[projectFinish3][$i];
		$projectdata[$i]->projectFinish4 = $_POST[projectFinish4][$i];
		$projectdata[$i]->projectFinish5 = $_POST[projectFinish5][$i];
		
		$projectdata[$i]->mineId=$mineid;
		$projectdata[$i]->add();
	}

    //¡­??¡Ò??¡°??????¨C¡Ö????
    $audit = new Audit;
	$audit->mineId=$mineid;
	$audit->auditNation=$_POST[auditNation];                                //¦Ð¨B????????¡®??¡Ü??¡­??¡Ò??¡°??????
	$audit->auditNationTime=$_POST[auditNationTime];                      //¡­??¡Ò????¡À??¡ë
	$audit->auditPlace=$_POST[auditPlace];                                 //??¡ã????¦Ð¨B????????¡®??¡Â??¦Ð??¡Ü??¡Ì¡Ö¡­??¡Ò??¡°??????
	$audit->auditPlaceTime=$_POST[auditPlaceTime];                       //¡­??¡Ò????¡À??¡ë
	$audit->auditIndustry=$_POST[auditIndustry];                           //¨C¨C¡°??¨C¡Ù??¡¤¡­??¡Ò??¡°??????
	$audit->auditIndustryTime=$_POST[auditIndustryTime];                 //¡­??¡Ò????¡À??¡ë
	$audit->auditIndustry=$_POST[auditShi];                           //¨C¨C¡°??¨C¡Ù??¡¤¡­??¡Ò??¡°??????
	$audit->auditIndustryTime=$_POST[auditShiTime];
	$audit->auditIndustry=$_POST[auditXian];                           //¨C¨C¡°??¨C¡Ù??¡¤¡­??¡Ò??¡°??????
	$audit->auditIndustryTime=$_POST[auditXianTime]; 
	$audit->add();

	//¡À????????????¡°??¡Þ??????¡°¡°??????
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
		
	// http302('/minedata/ListMineDetails/'.$mineid).'/'.urlencode('成功！'));  
	http302('/minedata/ListMineDetails/'.$mineid);
}
?>