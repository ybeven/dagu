<?php		
function UpdatePreData($mineid,$notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//保存基本信息和评审信息
	$minedata = new Mine;
	$minedata->getByID($mineid);
	$minedata->mineName = $_POST[mineName];
	$minedata->enterpriseName = $_POST[enterpriseName];
	$minedata->enterpriseproperty = $_POST[enterpriseproperty];
	$minedata->minescale = $_POST[minescale];
	$minedata->address = $_POST[address];
	$minedata->mailcode = $_POST[mailcode];
	$minedata->auditopinion1 = $_POST[auditopinion1];
	$minedata->auditopinion2 = $_POST[auditopinion2];
	$minedata->auditopinion3 = $_POST[auditopinion3];
	$minedata->audittime1 = $_POST[audittime1];
	$minedata->audittime2 = $_POST[audittime2];
	$minedata->audittime3 = $_POST[audittime3];
	$minedata->environmentrecovery = $_POST[environmentrecovery];
	$minedata->landreclamation = $_POST[landreclamation];
	$minedata->audittype = $_POST[audittype];
	$minedata->audittypeMX1 = $_POST[yijian1];
	$minedata->audittypeMX2 = $_POST[yijian2];
	$minedata->audittypeMX3 = $_POST[yijian3];
	$minedata->time = $_POST[time];
	$minedata->diliweizhi = $_POST[diliweizhi];
	$minedata->shijiquhua = $_POST[shijiquhua];
	$minedata->xianjiquhua = $_POST[xianjiquhua];	
	$minedata->kuangqumianji = $_POST[kuangqumianji];
	$minedata->zhigongshu = $_POST[zhigongshu];
	$minedata->youxiaoqixian = $_POST[youxiaoqixian];
	$minedata->orenametype = $_POST[orenametype];
	$minedata->orename = $_POST[orename];
	$minedata->fangshi = $_POST[fangshi];
	$minedata->ziyuanchuliang = $_POST[ziyuanchuliang];
	$minedata->gongyishebei = $_POST[gongyishebei];
	$minedata->zongheliyong = $_POST[zongheliyong];
	$minedata->youchangchuzhi = $_POST[youchangchuzhi];
	$minedata->update();
	//保存联系人
	$contactman = new Contactman;
	$sql_1 = "select * from contactman WHERE mine_id = $mineid";
	$cArray = $contactman->getArray($sql_1,true);
	foreach($cArray as $c)
	{
		$contactman->remove($c->id, false);
	}
	$contactmandata = new Contactman;
	$contactmandata->mineId = $minedata->id;
	$contactmandata->contactmanCellphone = $_POST[contactmanCellphone];
	$contactmandata->contactmanLandphone = $_POST[contactmanLandphone];
	$contactmandata->contactmanFax = $_POST[contactmanFax];
	$contactmandata->contactmanEmail = $_POST[contactmanEmail];
	$contactmandata->contactmanName = $_POST[contactmanName];
	$contactmandata->add();
	//保存专家及专家意见
	$expert =  new Expert;
	$sql_2 = "select * from `expert` WHERE mine_id = $mineid AND isshenbao = 1";
	$iArray = $expert->getArray($sql_2,true);
	foreach($iArray as $i)
	{
		$expert->remove($i->id, false);
	}
	$flag=count($_POST[expertName]);
	for($i=0;$i<$flag;$i++)
	{
		//专家信息
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
		$expertdata[$i]->expertIdea=$_POST[mineExpertIdeaContent][$i];
		$expertdata[$i]->expertTime=$_POST[mineExpertIdeaTime][$i];
		$expertdata[$i]->isshenbao=1;
		$expertdata[$i]->mineId=$minedata->id;
		$expertdata[$i]->add();
	}
	//验证输入为空
	// validate1($_POST[mineName],'mineName');
	// validate1($_POST[enterpriseName],'enterpriseName');
	// validate1($_POST[enterpriseproperty],'enterpriseproperty');
	// validate1($_POST[minescale],'minescale');
	// validate1($_POST[address],'address');
	// validate1($_POST[mailcode],'mailcode');
	// //validate1($_POST[auditopinion1],'auditopinion1');
	// //validate1($_POST[auditopinion2],'auditopinion2');
	// //validate1($_POST[auditopinion3],'auditopinion3');
	// validate1($_POST[audittime1],'audittime1');
	// validate1($_POST[audittime2],'audittime2');
	// validate1($_POST[audittime3],'audittime3');
	// validate1($_POST[environmentrecovery],'environmentrecovery');
	// validate1($_POST[landreclamation],'landreclamation');
	// validate1($_POST[audittype],'audittype');
	// validate1($_POST[time],'time');
	// validate1($_POST[diliweizhi],'diliweizhi');
	// validate1($_POST[kuangqumianji],'kuangqumianji');
	// validate1($_POST[zhigongshu],'zhigongshu');
	// validate1($_POST[youxiaoqixian],'youxiaoqixian');
	// validate1($_POST[orenametype],'orenametype');
	// validate1($_POST[orename],'orename');
	// validate1($_POST[fangshi],'fangshi');
	// validate1($_POST[ziyuanchuliang],'ziyuanchuliang');
	// validate1($_POST[gongyishebei],'gongyishebei');
	// validate1($_POST[zongheliyong],'zongheliyong');
	// validate1($_POST[youchangchuzhi],'youchangchuzhi');
	// //联系人
	// validate1($_POST[contactmanCellphone],'contactmanCellphone');
	// validate1($_POST[contactmanLandphone],'contactmanLandphone');
	// validate1($_POST[contactmanFax],'contactmanFax');
	// validate1($_POST[contactmanEmail],'contactmanEmail');
	// validate1($_POST[contactmanName],'contactmanName');
	// //专家信息
	// $flag=count($_POST[expertName]);
	// for($i=0;$i<$flag;$i++)
	// {
 //        validate1($_POST[expertName][$i],'expertName');
	// 	validate1($_POST[expertSex][$i],'expertSex');
	// 	validate1($_POST[expertAge][$i],'expertAge');
	// 	validate1($_POST[expertCompany][$i],'expertCompany');
	// 	validate1($_POST[expertTitles][$i],'expertTitles');
	// 	validate1($_POST[expertWork][$i],'expertWork');
	// 	validate1($_POST[expertSubject][$i],'expertSubject');
	// 	validate1($_POST[expertCellphone][$i],'expertCellphone');
	// 	validate1($_POST[expertLandhone][$i],'expertLandhone');
	// 	validate1($_POST[expertEmail][$i],'expertEmail');
	// 	validate1($_POST[expertFax][$i],'expertFax');
	// 	validate1($_POST[expertAddress][$i],'expertAddress');
	// 	validate1($_POST[mineExpertIdeaContent][$i],'mineExpertIdeaContent');
	// 	validate1($_POST[mineExpertIdeaTime][$i],'mineExpertIdeaTime');
	// }
	http302('/predata/ListPreData/'.urlencode('修改成功！'));  
}
?>