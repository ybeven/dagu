<?php
	
function UploadeExcelData($notice=null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	$basedata = new Basedata;
	$ShanxiTemp = new ShanxijiansheTemp;
	$Shanxi = new Shanxijianshe;
	$data = new File;
	$pici = $_POST[picinumber];
	$peopletag = $_POST[tag];
	// print_r($pici.'&&&'.$peopletag);
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
		//得到系统的年月  
        $tmp_date=date("Ym");  
        //切割出年份  
        $tmp_year=substr($tmp_date,0,4);
        $currentRow = 1;
        $numberAddress = $numberColumn.$currentRow;
		$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
		$tmp_pici = explode($tmp_year,$numberValue);




		for($currentRow = 2;$currentRow<=$allRow;$currentRow++)
		{			
			//numberColumn作为数字下标
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();//the value of sheet.1 Acurrentrow 
			//$address0 = 'A'.$currentRow;
			$address1 = 'A'.$currentRow;
			$address2 = 'B'.$currentRow;
			// $address3 = 'C'.$currentRow;
			// $address4 = 'D'.$currentRow;
			// $address5 = 'E'.$currentRow;
			// $address6 = 'F'.$currentRow;
			// $address7 = 'G'.$currentRow;
			// $address8 = 'H'.$currentRow;
			// $address9 = 'I'.$currentRow;
			// $address10 = 'J'.$currentRow;
			// $address11 = 'K'.$currentRow;
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			if ($numberValue == 1) $new_dir = $value;
			//the value will insert into databases
			$declaredata[$tmp]['0'] = $pici;//pici
			$declaredata[$tmp]['0'] = $peopletag;
			$declaredata[$tmp]['2'] = $currentSheet[$Count]->getCell($address1)->getValue();//peixunjigou
			$idcard = $declaredata[$tmp]['2'];
			$declaredata[$tmp]['3'] = $currentSheet[$Count]->getCell($address2)->getValue();//zhunkaozhenghao
			$course = $declaredata[$tmp]['3'];
			$sql = "select * from shanxijianshe where pici=$pici and idcard='$idcard' and course='$course'";
			// print_r('sql:'.$sql);
			$dataTemp = $Shanxi->getArray($sql,true);
			foreach($dataTemp as $i)
			{
				// print_r('&jigou:'.$i->jigou);
				$ShanxiTemp->pici=$pici;
		        $ShanxiTemp->renyuanpici=$peopletag;
		        $ShanxiTemp->jigou .= $i->jigou;
		        $ShanxiTemp->examcardnum .= $i->examcardnum;
		        $ShanxiTemp->roomsite .= $i->roomsite;
		        $ShanxiTemp->name .= $i->name;
		        $ShanxiTemp->sexual .= $i->sexual;
		        $ShanxiTemp->course .= $i->course;
		        $ShanxiTemp->idcard .= $i->idcard;
		        $ShanxiTemp->examchangci .= $i->examchangci;
		        $ShanxiTemp->examroom .= $i->examroom;
		        $ShanxiTemp->examscore .= $i->examscore;
		        $ShanxiTemp->leitong .= $i->leitong;
		        $ShanxiTemp->latestscore .= $i->latestscore;
		        $ShanxiTemp->kaodian .= $i->kaodian;
		    // $ShanxiTemp->alterexamscore=$dataTemp[fenshu];
		    // $ShanxiTemp->alterlatestscore=$dataTemp[leitong];
		    // $ShanxiTemp->tag=$dataTemp[fenshu][$i]-$dataTemp[leitong][$i];
		        $ShanxiTemp->add();
			}
			// print_r($dataTemp->jigou);
			
			$tmp=$tmp+1;
		}
		// print_r($declaredata);
	}
	
		
	@unlink ($uploadFile);
	
	spl_autoload_register(__autoload);

	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("需要修改成绩-按照身份证号及考试科目" , "/alterdata/AddAlterData" , true);	    
    $smarty->setTitle('成绩导入');
	// exit();
	// var_dump($declaredata);
	$smarty->assign('declaredata',$declaredata);
	$smarty->assign('tmp',$tmp);
	// $smarty->assign('fileId',$fileId);
	$smarty->displaymother('alterdata/AddAlterData.tpl');
}
?>