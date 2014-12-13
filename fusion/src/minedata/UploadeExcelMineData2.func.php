<?php
	
function UploadeExcelMineData2($notice=null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	$basedata = new Basedata;
	
/********Excel update to data********/
	define('UPLOAD_DIR', '../uploadDir/');
	require_once("../webroot/PHPExcel/Classes/PHPExcel.php");
	if($_POST['leadExcel'] == "true")
	{
/********get Excel name**********/
		$fileName = $_FILES['inputExcel']['name'];
		$tmp_name = $_FILES['inputExcel']['tmp_name'];
		$uploadFile = UPLOAD_DIR.$fileName;
/********move Excel to uploadDir*********/
		move_uploaded_file($tmp_name, $uploadFile);
		$PHPExcel = new PHPExcel();		
		$PHPReader = new PHPExcel_Reader_Excel2007();
		/*for all Excel(03/07)*/
		if(!$PHPReader->canRead($uploadFile))
		{						
			$PHPReader = new PHPExcel_Reader_Excel5();	
			if(!$PHPReader->canRead($uploadFile))
			{						
					echo '未发现Excel文件！';
					return;
			}
		}
/********load Excel*********/
		$PHPExcel = $PHPReader->load($uploadFile);
/********get sheet sum********/
		$SheetCount = $PHPExcel->getSheetCount();
/********get declaredata********/
		$currentSheet = array();
//		echo $SheetCount;
?>