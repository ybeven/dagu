<?php
	
function UploadFiles($notice=null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	$basedata = new Basedata;

	if($_FILES['file']['error']>0)
	{
		echo "Error:".$_FILES['file']['error']."</br>";
	}
	else
	{
		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
 	    echo "Type: " . $_FILES["file"]["type"] . "<br />";
  		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  		echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br />";
		$fileName = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];
		if(!is_dir("upload"))//如果不存在upload文件则创建它
  		{
      		mkdir("upload");
      	}
		move_uploaded_file($tmp_name, "upload/" . $_FILES["file"]["name"]);
		echo "Stored in: " . "upload/" . $_FILES["file"]["name"];

/*
	spl_autoload_register(__autoload);
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("添加申报信息" , "/minedata/AddPreData" , true);	    
    $smarty->setTitle('导入申报文件');
//	exit();
	$smarty->assign('declaredata',$declaredata);
	$smarty->assign('oresdata_type',$oresdata_type);
	$smarty->assign('oresdata_name',$oresdata_name);
	$smarty->assign('oresdata_class',$oresdata_class);
	$smarty->assign('Mining_methodsdata',$Mining_methodsdata);
	$smarty->displaymother('minedata/ListExcelMineDetails.tpl');*/
	}
}
?>