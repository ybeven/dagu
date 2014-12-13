<?php		
//function unitMath($unit){
//	$i = 1;
//	if($unit == "年")$i = 365;
//	else if($unit == "月")$i=30;
//	return $i;
//}
function SavePreData($cityId=null,$notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;

	//验证车牌号是否填写
	//if($_POST[trucknumber]=='')
	//	{
	//	   http302("/ZB/AddTruckPlanZB/".urlencode("车牌号未填写，请仔细检查"));
	//	   return;
	//	}
	//else{
	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//保存基本信息和评审信息
	// $minedata = new Mine;
	
	
	// $minedata->mineName = $_POST[mineName];
	// if(empty($_POST["mineName"]))
	// {

 //     echo "<script>alert('您无权添加申报信息!');history.back(-1);</script>;";
	//  return;
	// }
	// $shanxi = new Shanxijianshe;
	$flag=count($_POST[pici]);
	for($i=0;$i<$flag;$i++)
	{
		//添加到数据库
		// $expertdata[$i] = new Expert;
		$shanxi[$i] = new Shanxijianshe;
		$shanxi[$i]->pici=$_POST[pici][$i];
		$shanxi[$i]->jigou=$_POST[jigou][$i];
		$shanxi[$i]->examcardnum=$_POST[zhunkaozheng][$i];
		$shanxi[$i]->roomsite=$_POST[zuoweihao][$i];
		$shanxi[$i]->name=$_POST[xingming][$i];
		$shanxi[$i]->sexual=$_POST[xingbie][$i];
		$shanxi[$i]->course=$_POST[kaoshikemu][$i];
		$shanxi[$i]->idcard=$_POST[shenfenzhenghao][$i];
		$shanxi[$i]->examchangci=$_POST[kaoshichangci][$i];
		$shanxi[$i]->examroom=$_POST[kaochang][$i];
		$shanxi[$i]->examscore=$_POST[fenshu][$i];
		$shanxi[$i]->leitong=$_POST[leitong][$i];
		$shanxi[$i]->latestscore=$_POST[fenshu][$i]-$_POST[leitong][$i];
		if ($cityId!=null) {
			$shanxi[$i]->kaodian=$cityId;
		}
		$shanxi[$i]->add();
	}





	// $minedata->enterpriseName = $_POST[enterpriseName];
	// $minedata->enterpriseproperty = $_POST[enterpriseproperty];
	// $minedata->minescale = $_POST[minescale];
	// $minedata->address = $_POST[address];
	// $minedata->mailcode = $_POST[mailcode];
	// $minedata->auditopinion1 = $_POST[auditopinion1];
	// $minedata->auditopinion2 = $_POST[auditopinion2];
	// $minedata->auditopinion3 = $_POST[auditopinion3];
	// $minedata->audittime1 = $_POST[audittime1];
	// $minedata->audittime2 = $_POST[audittime2];
	// $minedata->audittime3 = $_POST[audittime3];
	// $minedata->environmentrecovery = $_POST[environmentrecovery];
	// $minedata->landreclamation = $_POST[landreclamation];
	// $minedata->mineName = $_POST[mineName];
	// $minedata->audittype = $_POST[audittype];
	// $minedata->audittypeMX1 = $_POST[yijian1];
	// $minedata->audittypeMX2 = $_POST[yijian2];
	// $minedata->audittypeMX3 = $_POST[yijian3];
	// $minedata->time = $_POST[time];
	// $minedata->diliweizhi = $_POST[diliweizhi];
	// $minedata->shijiquhua = $_POST[shijiquhua];
	// $minedata->xianjiquhua = $_POST[xianjiquhua];
	// $minedata->kuangqumianji = $_POST[kuangqumianji];
	// $minedata->zhigongshu = $_POST[zhigongshu];
	// $minedata->youxiaoqixian = $_POST[youxiaoqixian];
	// $minedata->orenametype = $_POST[orenametype];
	// $minedata->orename = $_POST[orename];
	// $minedata->fangshi = $_POST[fangshi];
	// $minedata->ziyuanchuliang = $_POST[ziyuanchuliang];
	// $minedata->gongyishebei = $_POST[gongyishebei];
	// $minedata->zongheliyong = $_POST[zongheliyong];
	// $minedata->youchangchuzhi = $_POST[youchangchuzhi];
	// $minedata->predataTag = "待审核";
	// $minedata->minedataTag = "待审核";
	// $minedata->add();
	// $urlid=$minedata->id;
	//将矿山id写入附件管理中对应的Excel文件数据表中的矿山标识
	// if( $fileId!=null )
	// {
	// $data = new File;
	// $data->getByID($fileId);
	// $data->mineId = $minedata->id;
	// $data->update();
	// }
	//保存联系人
	// $contactmandata = new Contactman;
	// $contactmandata->mineId = $minedata->id;
	// $contactmandata->contactmanCellphone = $_POST[contactmanCellphone];
	// $contactmandata->contactmanLandphone = $_POST[contactmanLandphone];
	// $contactmandata->contactmanFax = $_POST[contactmanFax];
	// $contactmandata->contactmanEmail = $_POST[contactmanEmail];
	// $contactmandata->contactmanName = $_POST[contactmanName];
	// $contactmandata->add();
	//保存专家及专家意见
	// $flag=count($_POST[expertName]);
	// for($i=0;$i<$flag;$i++)
	// {
	// 	//专家信息&意见
	// 	$expertdata[$i] = new Expert;
	// 	$expertdata[$i]->expertName=$_POST[expertName][$i];
	// 	$expertdata[$i]->expertSex=$_POST[expertSex][$i];
	// 	$expertdata[$i]->expertAge=$_POST[expertAge][$i];
	// 	$expertdata[$i]->expertCompany=$_POST[expertCompany][$i];
	// 	$expertdata[$i]->expertTitles=$_POST[expertTitles][$i];
	// 	$expertdata[$i]->expertWork=$_POST[expertWork][$i];
	// 	$expertdata[$i]->expertSubject=$_POST[expertSubject][$i];
	// 	$expertdata[$i]->expertCellphone=$_POST[expertCellphone][$i];
	// 	$expertdata[$i]->expertLandhone=$_POST[expertLandhone][$i];
	// 	$expertdata[$i]->expertEmail=$_POST[expertEmail][$i];
	// 	$expertdata[$i]->expertFax=$_POST[expertFax][$i];
	// 	$expertdata[$i]->expertAddress=$_POST[expertAddress][$i];
	// 	$expertdata[$i]->expertIdea=$_POST[mineExpertIdeaContent][$i];
	// 	$expertdata[$i]->expertTime=$_POST[mineExpertIdeaTime][$i];
	// 	$expertdata[$i]->isshenbao=1;
	// 	$expertdata[$i]->mineId=$minedata->id;
	// 	$expertdata[$i]->add();
	// }
	//验证输入为空
	// validate1($_POST[mineName],$minedata->id);
	// validate1($_POST[enterpriseName],$minedata->id);
	// validate1($_POST[enterpriseproperty],$minedata->id);
	// validate1($_POST[minescale],$minedata->id);
	// validate1($_POST[address],$minedata->id);
	// validate1($_POST[mailcode],$minedata->id);
	//以前的注释 下
	//validate1($_POST[auditopinion1],$minedata->id);
	//validate1($_POST[auditopinion2],$minedata->id);
	//validate1($_POST[auditopinion3],$minedata->id);
	//以前的注释 上

	// validate1($_POST[audittime1],$minedata->id);
	// validate1($_POST[audittime2],$minedata->id);
	// validate1($_POST[audittime3],$minedata->id);
	// validate1($_POST[environmentrecovery],$minedata->id);
	// validate1($_POST[landreclamation],$minedata->id);
	// validate1($_POST[audittype],$minedata->id);
	// validate1($_POST[time],$minedata->id);
	// validate1($_POST[diliweizhi],$minedata->id);
	// validate1($_POST[kuangqumianji],$minedata->id);
	// validate1($_POST[zhigongshu],$minedata->id);
	// validate1($_POST[youxiaoqixian],$minedata->id);
	// validate1($_POST[orenametype],$minedata->id);
	// validate1($_POST[orename],$minedata->id);
	// validate1($_POST[fangshi],$minedata->id);
	// validate1($_POST[ziyuanchuliang],$minedata->id);
	// validate1($_POST[gongyishebei],$minedata->id);
	// validate1($_POST[zongheliyong],$minedata->id);
	// validate1($_POST[youchangchuzhi],$minedata->id);
	//联系人
	// validate1($_POST[contactmanCellphone],$minedata->id);
	// validate1($_POST[contactmanLandphone],$minedata->id);
	// validate1($_POST[contactmanFax],$minedata->id);
	// validate1($_POST[contactmanEmail],$minedata->id);
	// validate1($_POST[contactmanName],$minedata->id);
	//专家信息
	// $flag=count($_POST[expertName]);
	// for($i=0;$i<$flag;$i++)
	// {
 //        validate1($_POST[expertName][$i],$minedata->id);
	// 	validate1($_POST[expertSex][$i],$minedata->id);
	// 	validate1($_POST[expertAge][$i],$minedata->id);
	// 	validate1($_POST[expertCompany][$i],$minedata->id);
	// 	validate1($_POST[expertTitles][$i],$minedata->id);
	// 	validate1($_POST[expertWork][$i],$minedata->id);
	// 	validate1($_POST[expertSubject][$i],$minedata->id);
	// 	validate1($_POST[expertCellphone][$i],$minedata->id);
	// 	validate1($_POST[expertLandhone][$i],$minedata->id);
	// 	validate1($_POST[expertEmail][$i],$minedata->id);
	// 	validate1($_POST[expertFax][$i],$minedata->id);
	// 	validate1($_POST[expertAddress][$i],$minedata->id);
	// 	validate1($_POST[mineExpertIdeaContent][$i],$minedata->id);
	// 	validate1($_POST[mineExpertIdeaTime][$i],$minedata->id);
	// }
	
	
	//exit("1111");
	if ($cityId==1) {
		http302('/predata/AddPreData1/'.urlencode('成功！'));
	}
	else if ($cityId==2) {
		http302('/predata/AddPreData2/'.urlencode('成功！'));
	}
	else if ($cityId==3) {
		http302('/predata/AddPreData3/'.urlencode('成功！'));
	}
	else if ($cityId==4) {
		http302('/predata/AddPreData4/'.urlencode('成功！'));
	}
	else if ($cityId==5) {
		http302('/predata/AddPreData6/'.urlencode('成功！'));
	}
	else if ($cityId==7) {
		http302('/predata/AddPreData7/'.urlencode('成功！'));
	}
	else if ($cityId==8) {
		http302('/predata/AddPreData8/'.urlencode('成功！'));
	}
	else if ($cityId==9) {
		http302('/predata/AddPreData9/'.urlencode('成功！'));
	}
	else if ($cityId==10) {
		http302('/predata/AddPreData10/'.urlencode('成功！'));
	}
	else if ($cityId==11) {
		http302('/predata/AddPreData11/'.urlencode('成功！'));
	}
	else {
		http302('/predata/AddPreData/'.urlencode('成功！'));
	}

	
	//http302('/predata/AddFile/'.$urlid.'/'.urlencode('添加成功！'));  
}
?>