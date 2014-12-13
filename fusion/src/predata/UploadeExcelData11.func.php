<?php
	
function UploadeExcelData11($pici,$notice=null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	$basedata = new Basedata;
	
	$data = new File;
	// $data->mineId=$mineid;
	
/********Excel update to data********/
	define('UPLOAD_DIR', $_SERVER["DOCUMENT_ROOT"].'/uploadDir/');
	
	
	require_once("../webroot/PHPExcel/Classes/PHPExcel.php");
	if($_POST['leadExcel'] == "true")
	{
		/*get Excel name*/
		$fileName = $_FILES['inputExcel']['name'];
		$tmp_name = $_FILES['inputExcel']['tmp_name'];
		$uploadFile = UPLOAD_DIR.$fileName;

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
		/*load Excel*/
		$PHPExcel = $PHPReader->load($uploadFile);
		/*get sheet sum*/
		$SheetCount = $PHPExcel->getSheetCount();
		/*get declaredata*/
		$currentSheet = array();

		$Count = 0;
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
		// echo $SheetCount;
		$allColumn = $currentSheet[$Count]->getHighestColumn();//列
		// echo $allColumn;
		/*get row sum*/
		$allRow = $currentSheet[$Count]->getHighestRow(); //行
		// echo $allRow;
		$declaredata = array();
		$numberColumn = 'A';
		$currentColumn = 'C';
		$tmp = 0;
		
		for($currentRow = 6;$currentRow<=$allRow;$currentRow++)
		{			
			//numberColumn作为数字下标
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();//the value of sheet.1 Acurrentrow 
			//$address0 = 'A'.$currentRow;
			$address1 = 'A'.$currentRow;
			$address2 = 'B'.$currentRow;
			$address3 = 'C'.$currentRow;
			$address4 = 'D'.$currentRow;
			$address5 = 'E'.$currentRow;
			$address6 = 'F'.$currentRow;
			$address7 = 'G'.$currentRow;
			$address8 = 'H'.$currentRow;
			$address9 = 'I'.$currentRow;
			$address10 = 'J'.$currentRow;
			$address11 = 'K'.$currentRow;
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			if ($numberValue == 1) $new_dir = $value;
			//the value will insert into databases
			$declaredata[$tmp]['0'] = $pici;//pici
			$declaredata[$tmp]['1'] = $currentSheet[$Count]->getCell($address1)->getValue();//peixunjigou
			$declaredata[$tmp]['2'] = $currentSheet[$Count]->getCell($address2)->getValue();//zhunkaozhenghao
			$declaredata[$tmp]['3'] = $currentSheet[$Count]->getCell($address3)->getValue();//zuoweihao
			$declaredata[$tmp]['4'] = $currentSheet[$Count]->getCell($address4)->getValue();//xingming
			$declaredata[$tmp]['5'] = $currentSheet[$Count]->getCell($address5)->getValue();//xingbie
			$declaredata[$tmp]['6'] = $currentSheet[$Count]->getCell($address6)->getValue();//kaoshikemu
			$declaredata[$tmp]['7'] = $currentSheet[$Count]->getCell($address7)->getValue();//shenfenzhenghao
			$declaredata[$tmp]['8'] = $currentSheet[$Count]->getCell($address8)->getValue();//kaoshichangci
			$declaredata[$tmp]['9'] = $currentSheet[$Count]->getCell($address9)->getValue();//kaochang
			$declaredata[$tmp]['10'] = $currentSheet[$Count]->getCell($address10)->getValue();//fenshu
			$declaredata[$tmp]['11'] = $currentSheet[$Count]->getCell($address11)->getValue();//leitong
			$declaredata[$tmp]['12'] = 11;
			$tmp=$tmp+1;
		}
		// print_r($declaredata);
	}
	
	
		
	@unlink ($uploadFile);
	
	spl_autoload_register(__autoload);

	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("杨凌考点成绩导入" , "/predata/AddPreData11" , true);	    
    $smarty->setTitle('成绩导入');
	// exit();
	// var_dump($declaredata);
	$smarty->assign('declaredata',$declaredata);
	$smarty->assign('tmp',$tmp);
	// $smarty->assign('fileId',$fileId);
	$smarty->displaymother('predata/ListExcelDetailsYangling.tpl');
}
?>