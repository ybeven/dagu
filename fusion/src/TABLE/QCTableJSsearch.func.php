<?php
function QCTableJSsearch($notice = null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$date2 = $_POST["date"];
	$workId = $_POST["workID"];
	
	$date = 0;
	if($workId == 1)
	{
		
		$date = date("Y-m-d",strtotime("+1 day",strtotime("$date2")));
	}
	else
	{
		$date = $date2;
	}
	
	$task = new Task;
	$sql = "select * from `task` WHERE  final_operate_time LIKE '{$date}%' AND final_work_id = '{$workId}' ";
        $taskArray = $task->getArray($sql,true);
	
	
	$MClass = new WorkTime;
        $sql = "select * from `work_time`";
        $workID = $MClass->getArray($sql,true);
	$smarty->assign('work',$workID);
	
	$Class = new WorkTime;
        $sql = "select * from `work_time` WHERE id = $workId ";
        $work= $Class->getArray($sql,true);
	$smarty->assign('workId',$Class);
	
	$user = new User;
	$customer = new Customer;
	$oilModel = new OilModel;
	$oilType = new OilType;
	
	$plan = new Plan;
	
	$oilModelArray = array();
	$oilTypeArray = array();
	$oilWeightArray = array();
	$oilMoneyArray = array();
	$h = 0;
	$banci = $work[0]->id;
	
	///////////////////////////////////////////////////////////////////////////////////Excel部分
        $fileName = ''.$date2.'_'.$banci.'.xls';
	$downloadFile = '/uploadImages/'.$fileName;
	$absRoot = WEBROOT.$downloadFile;
	if (file_exists($absRoot))
		unlink($absRoot);
	$hasFiles = false;
	if($count>0)
	$hasFiles = true;
		 
	//写excel文件
	require_once WEBROOT.'/uploadImages/PHPExcel/Classes/PHPExcel.php';
	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
	$objPHPExcel->setActiveSheetIndex(0);
	$objActiveSheet = $objPHPExcel->getActiveSheet();
	$objActiveSheet->setTitle('成品油销售台帐');
	//标题
	$objActiveSheet->mergeCells('A1:H1');//合并单元格
	
	$objActiveSheet->setCellValue('A1', '成品油销售台帐');
	$objActiveSheet->getColumnDimension('A')->setWidth(25);
	$objStyleTitle = $objActiveSheet->getStyle('A1');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(26);
	$objFontTitle->setBold(true);
	$objAlignTitle = $objStyleTitle->getAlignment();   
	$objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$objActiveSheet->mergeCells('E2:G2');//合并单元格
	
	$objActiveSheet->setCellValue('E2', ' '.$date.'  '.$workID[0]->name);
	$objActiveSheet->getColumnDimension('E')->setWidth(25);
	$objStyleTitle = $objActiveSheet->getStyle('E2');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	$objAlignTitle = $objStyleTitle->getAlignment();   
	$objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$objActiveSheet->mergeCells('A2:D2');//合并单元格
	$objActiveSheet->setCellValue('A2', '实际交款：');
	$objActiveSheet->getColumnDimension('A')->setWidth(25);
	$objStyleTitle = $objActiveSheet->getStyle('A2');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	$objAlignTitle = $objStyleTitle->getAlignment();   
	$objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
       
	//条目名称
	$objActiveSheet->setCellValue('A3', '客户名称');
	$objStyleTitle = $objActiveSheet->getStyle('A3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	$objActiveSheet->setCellValue('B3', '油品');
	
	$objStyleTitle = $objActiveSheet->getStyle('B3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('C3', '净重');
	
	$objStyleTitle = $objActiveSheet->getStyle('C3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('D3', '单价');
	
	$objStyleTitle = $objActiveSheet->getStyle('D3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('E3', '金额');
	
	$objStyleTitle = $objActiveSheet->getStyle('E3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('F3', '备注');
	
	$objStyleTitle = $objActiveSheet->getStyle('F3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('G3', '其他');//付款方式
	
	$objStyleTitle = $objActiveSheet->getStyle('G3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	
	
	
	
	
	// 设置单元格样式（居中、宽度）

	
	$objStyle = $objActiveSheet->getStyle('A3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('A')->setWidth(20);

	$objStyle = $objActiveSheet->getStyle('B3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('B')->setWidth(20);

	$objStyle = $objActiveSheet->getStyle('C3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('C')->setWidth(30);
	

	$objStyle = $objActiveSheet->getStyle('D3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('D')->setWidth(15);

	$objStyle = $objActiveSheet->getStyle('E3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('E')->setWidth(15);
	

	$objStyle = $objActiveSheet->getStyle('F3');
	$objAlign = $objStyle->getAlignment();
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objActiveSheet->getColumnDimension('F')->setWidth(20);

	$objStyle = $objActiveSheet->getStyle('G3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('G')->setWidth(15);


	$cols = array('A','B','C','D','E','F','G');
	$colsNum = count($cols);
	for($j=0;$j<$colsNum;++$j)
	{
		$objActiveSheet->getStyle("{$cols[$j]}")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objStyle = $objActiveSheet->getStyle("{$cols[$j]}3");
		$objBorder = $objStyle->getBorders();
		$objBorder->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objBorder->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objBorder->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objBorder->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	}
	$i = 4;
	//$num = 1;
	$n = 10;
        if($taskArray != null)
	{
		  
		 
				
				
					
				foreach($taskArray as $m)
		                {
			                $customer->getByID($m->customerId);
			                $oilModel->getByID($m->oilModelId);
			                $oilType->getByID($oilModel->oilTypeId);
			                $user->getByID($m->finalOperatorId);
			                
					$objActiveSheet->setCellValue("A{$i}", ' '.$customer->name);
			                $objActiveSheet->setCellValue("B{$i}", ' '.$oilModel->oilModel.$oilType->oilType);
					$objActiveSheet->setCellValue("C{$i}", ' '.$m->realWeight);//磅重
					$objActiveSheet->setCellValue("D{$i}", ' '.$m->unitPrice);//单价
					$money = ($m->realWeight)*($m->unitPrice);
					$objActiveSheet->setCellValue("E{$i}", ' '.$money);//总价
					$objActiveSheet->setCellValue("F{$i}", ' '.$m->cardRemarks);//备注
					$objActiveSheet->setCellValue("G{$i}", ' '.$m->payType);//付款方式
			               
			    
					
			              
					
			                for($j=0;$j<$colsNum;++$j)
		                        {
			                        $objStyle = $objActiveSheet->getStyle("{$cols[$j]}{$i}");
			                        $objBorder = $objStyle->getBorders();
			                        $objBorder->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			                        $objBorder->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			                        $objBorder->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			                        $objBorder->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
			                        $objAlign = $objStyle->getAlignment();   
			                        $objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		                        }
		                 ++$i;
		                }
                                 
				
	                        $objActiveSheet->mergeCells("A{$i}:G{$i}");//合并单元格
	                        $objActiveSheet->setCellValue("A{$i}", '本期收入合计：');
	
	                        $objFontTitle = $objStyleTitle->getFont();
	                        $objFontTitle->setSize(18);
	                        $objFontTitle->setBold(true);
	                        $objAlignTitle = $objStyleTitle->getAlignment();   
	                        $objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				
		//++$num;
	
	}
	++$i;
				 $objActiveSheet->mergeCells("A{$i}:D{$i}");//合并单元格
	                        $objActiveSheet->setCellValue("A{$i}", '实际交款：');
	
	                        $objFontTitle = $objStyleTitle->getFont();
	                        $objFontTitle->setSize(18);
	                        $objFontTitle->setBold(true);
	                        $objAlignTitle = $objStyleTitle->getAlignment();   
	                        $objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				
				 $objActiveSheet->mergeCells("E{$i}:G{$i}");//合并单元格
	                        $objActiveSheet->setCellValue("E{$i}", '交班人：');
	
	                        $objFontTitle = $objStyleTitle->getFont();
	                        $objFontTitle->setSize(18);
	                        $objFontTitle->setBold(true);
	                        $objAlignTitle = $objStyleTitle->getAlignment();   
	                        $objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$i++;
				 $objActiveSheet->mergeCells("E{$i}:G{$i}");//合并单元格
	                        $objActiveSheet->setCellValue("E{$i}", '接班人：');
	
	                        $objFontTitle = $objStyleTitle->getFont();
	                        $objFontTitle->setSize(18);
	                        $objFontTitle->setBold(true);
	                        $objAlignTitle = $objStyleTitle->getAlignment();   
	                        $objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				
				$i++;
				 $objActiveSheet->mergeCells("E{$i}:G{$i}");//合并单元格
	                        $objActiveSheet->setCellValue("E{$i}", '审核：');
	
	                        $objFontTitle = $objStyleTitle->getFont();
	                        $objFontTitle->setSize(18);
	                        $objFontTitle->setBold(true);
	                        $objAlignTitle = $objStyleTitle->getAlignment();   
	                        $objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	
	////////////////////////////////////////////////油品统计
	
	
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save($absRoot);
	
	spl_autoload_register(__autoload);

	
	$crumb = Crumb::getCrumb();
	$crumb->popAllLatitude();
	$crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("查看结算报表" , "" , true);
	
	$smarty->assign("hasFiles",$hasFiles);
	$smarty->assign("downloadFile",$downloadFile);
	$smarty->assign("fileName",$fileName);
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
        $smarty->assign('date',$date2);
	$smarty->assign('defArray',$taskArray);
	
	$smarty->setTitle('查看结算中心报表');
	$smarty->displayMother('TABLE/QCTableJS.tpl');
	
}
?>