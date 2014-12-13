<?php		
function UpdateData($notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//保存基本信息和评审信息
	$minedata = new Provincevalue;
	$id = 1;
	$minedata->getByID($id);
	$minedata->mineAll = $_POST[mineAll];
	$minedata->greenmineall = $_POST[greenmineall];
	$minedata->environment = $_POST[environment];
	$minedata->land = $_POST[land];
	$minedata->landrate = $_POST[landrate];
	$minedata->update();
	
	//验证输入为空
	validate1($_POST[mineAll]);
	validate1($_POST[greenmineall]);
	validate1($_POST[environment]);
	validate1($_POST[land]);
	validate1($_POST[landrate]);

	http302('/system/dataCount/'.urlencode('修改成功！'));  
}
?>