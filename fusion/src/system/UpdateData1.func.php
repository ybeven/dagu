<?php		
function UpdateData1($notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//保存基本信息和评审信息
	$minedata = new Provincevaluecity;
	if($_POST[cityMine]!='')
	{
	if($_POST[mineral]=='嘉峪关市')
	{
		$id = 1;
	}
	if($_POST[mineral]=='金昌市')
	{
		$id = 2;
	}
	if($_POST[mineral]=='白银市')
	{
		$id = 3;
	}
	if($_POST[mineral]=='天水市')
	{
		$id = 4;
	}
	if($_POST[mineral]=='武威市')
	{
		$id = 5;
	}
	if($_POST[mineral]=='张掖市')
	{
		$id = 6;
	}
	if($_POST[mineral]=='平凉市')
	{
		$id = 7;
	}
	if($_POST[mineral]=='酒泉市')
	{
		$id = 8;
	}
	if($_POST[mineral]=='庆阳市')
	{
		$id = 9;
	}
	if($_POST[mineral]=='定西市')
	{
		$id = 10;
	}
	if($_POST[mineral]=='陇南市')
	{
		$id = 11;
	}
	if($_POST[mineral]=='临夏回族自治州')
	{
		$id = 12;
	}
	if($_POST[mineral]=='甘南藏族自治州')
	{
		$id = 13;
	}
	if($_POST[mineral]=='兰州市')
	{
		$id = 14;
	}
    $minedata->getByID($id);
	$minedata->citymine = $_POST[cityMine];
	$minedata->update();
	}

    if($_POST[cityGreenMine]!='')
	{
	$minedata1 = new Provincevaluecity;
	if($_POST[mineral1]=='嘉峪关市')
	{
		$id = 1;
	}
	if($_POST[mineral1]=='金昌市')
	{
		$id = 2;
	}
	if($_POST[mineral1]=='白银市')
	{
		$id = 3;
	}
	if($_POST[mineral1]=='天水市')
	{
		$id = 4;
	}
	if($_POST[mineral1]=='武威市')
	{
		$id = 5;
	}
	if($_POST[mineral1]=='张掖市')
	{
		$id = 6;
	}
	if($_POST[mineral1]=='平凉市')
	{
		$id = 7;
	}
	if($_POST[mineral1]=='酒泉市')
	{
		$id = 8;
	}
	if($_POST[mineral1]=='庆阳市')
	{
		$id = 9;
	}
	if($_POST[mineral1]=='定西市')
	{
		$id = 10;
	}
	if($_POST[mineral1]=='陇南市')
	{
		$id = 11;
	}
	if($_POST[mineral1]=='临夏回族自治州')
	{
		$id = 12;
	}
	if($_POST[mineral1]=='甘南藏族自治州')
	{
		$id = 13;
	}
	if($_POST[mineral1]=='兰州市')
	{
		$id = 14;
	}
    $minedata1->getByID($id);
	$minedata1->citygreenmine = $_POST[cityGreenMine];
	$minedata1->update();
	}

	http302('/system/dataCount/'.urlencode('修改成功！'));  
}
?>