<?php
function QCTableXSsearch($notice = null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$date = $_POST["date"];
	$workId = $_POST["workID"];
	
	/*
	$plan = new Plan;
	$sql = "select * from `plan` WHERE  operate_time LIKE '{$date}%' AND work_id = $workId ";
        $planArray = $plan->getArray($sql,true);
	*/
	
	$task = new Task;
	$sql = "select * from `task` WHERE  operate_time LIKE '{$date}%' AND operate_work_id = $workId ";
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
	
	///////////////////////////////////////////////////////////////////////////////////Excel部分
        $fileName = .$date.' '.$Class->name.'.xls';
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
	$objActiveSheet->mergeCells('E1:G1');//合并单元格
	$objActiveSheet->mergeCells('H1:I1');
	$objActiveSheet->setCellValue('E1', '成品油销售台帐');
	$objActiveSheet->getColumnDimension('E')->setWidth(25);
	$objStyleTitle = $objActiveSheet->getStyle('E1');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(18);
	$objFontTitle->setBold(true);
	$objAlignTitle = $objStyleTitle->getAlignment();   
	$objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->setCellValue('H1', $date);

	//条目名称
	$objActiveSheet->setCellValue('A3', '车牌号');
	$objActiveSheet->setCellValue('B3', '任务数');
	$objActiveSheet->setCellValue('C3', '行驶证号');
	$objActiveSheet->setCellValue('D3', '提单号');
	$objActiveSheet->setCellValue('E3', '客户名称');
	$objActiveSheet->setCellValue('F3', '油品');
	$objActiveSheet->setCellValue('G3', '计划单价(元)');
	$objActiveSheet->setCellValue('H3', '计划净重(吨)');
	$objActiveSheet->setCellValue('I3', '罐号');
	$objActiveSheet->setCellValue('J3', '备注');
	$objActiveSheet->setCellValue('K3', '操作员');
	$objActiveSheet->setCellValue('L3', '分配时间');
	
	// 设置单元格样式（居中、宽度）
	$objStyle = $objActiveSheet->getStyle('A3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$objStyle = $objActiveSheet->getStyle('B3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objStyle = $objActiveSheet->getStyle('C3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objActiveSheet->getColumnDimension('C')->setWidth(25);
	
	$objStyle = $objActiveSheet->getStyle('D3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('D')->setWidth(15);

	$objStyle = $objActiveSheet->getStyle('E3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objActiveSheet->getColumnDimension('E')->setWidth(25);
	
	$objStyle = $objActiveSheet->getStyle('F3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('F')->setWidth(20);

	$objStyle = $objActiveSheet->getStyle('G3');
	$objAlign = $objStyle->getAlignment();
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('G')->setWidth(15);

	$objStyle = $objActiveSheet->getStyle('H3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('H')->setWidth(15);

	$objStyle = $objActiveSheet->getStyle('I3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$objStyle = $objActiveSheet->getStyle('J3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('J')->setWidth(20);
	
	$objStyle = $objActiveSheet->getStyle('K3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('K')->setWidth(20);
	
	$objStyle = $objActiveSheet->getStyle('L3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('L')->setWidth(25);
        
	$cols = array('A','B','C','D','E','F','G','H','I','J','K','L');
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
			
			$plan->getByID($m->planId);
			
			$user->getByID($m->operatorId);
			
			$customer->getByID($m->customerId);
			$oilModel->getByID($m->oilModelId);
			$oilType->getByID($oilModel->oilTypeId);
			
			
			$objActiveSheet->setCellValue("A{$i}", ' '.$plan->truckNumber);
		        $objActiveSheet->setCellValue("B{$i}", ' '.$plan->cardCount);
		        $objActiveSheet->setCellValue("C{$i}", ' '.$plan->drivingNumber);
			
			
			$objActiveSheet->setCellValue("D{$i}", ' '.$m->planKey);
			$objActiveSheet->setCellValue("E{$i}", ' '.$customer->name);
			
			$objActiveSheet->setCellValue("F{$i}", ' '.$oilType->oilType.$oilModel->oilModel);
			$objActiveSheet->setCellValue("G{$i}", ' '.$m->unitPrice);
			$objActiveSheet->setCellValue("H{$i}", ' '.$m->planWeight);
			$objActiveSheet->setCellValue("I{$i}", ' '.$m->potNumber);
			$objActiveSheet->setCellValue("J{$i}", ' '.$m->cardRemarks);
			
			$objActiveSheet->setCellValue("K{$i}", ' '.$user->name);
		        $objActiveSheet->setCellValue("L{$i}", ' '.$m->operateTime);
			
			
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
			
			///////////////////////////////////////////////////////油品统计计算
			for($g = 0 ; ;$g++)
			{
				if($oilTypeArray[$g] == null)
				{
					$oilTypeArray[$g]=$oilType->oilType;
					$oilModelArray[$g]=$oilModel->oilModel;
					$oilWeightArray[$g] = $m->planWeight;
					$oilMoneyArray[$g] = ($m->unitPrice)*($m->planWeight);
					break;
				}
				if( ($oilTypeArray[$g]) == ($oilType->oilType) && ($oilModelArray[$g]) == ($oilModel->oilModel))
				{
					$oilWeightArray[$g] += $m->planWeight;
					$oilMoneyArray[$g] += ($m->unitPrice)*($m->planWeight);
					break;
				}
			}
		        ++$i;
		}
		
		//++$num;
	
	}
	////////////////////////////////////////////////油品统计
	++$i;
	$objActiveSheet->mergeCells("D{$i}:F{$i}");
	$objActiveSheet->setCellValue("D{$i}", '总计');
	$objActiveSheet->getColumnDimension('D')->setWidth(25);
	$objStyleTitle = $objActiveSheet->getStyle("D{$i}");
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(18);
	$objFontTitle->setBold(true);
	$objAlignTitle = $objStyleTitle->getAlignment();   
	$objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   

        ++$i;
	
	$objActiveSheet->setCellValue("D{$i}", '油品');
	$objActiveSheet->setCellValue("E{$i}", '净重');
	$objActiveSheet->setCellValue("F{$i}", '金额总结');
	for($j=3;$j<6;++$j)
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
	
	for( $b = 0 ; $oilTypeArray[$b] != null ; $b++ )
	    {
		$objActiveSheet->setCellValue("D{$i}", ' '.$oilTypeArray[$b].$oilModelArray[$b]);
		$objActiveSheet->setCellValue("E{$i}", ' '.$oilWeightArray[$b]);
		$objActiveSheet->setCellValue("F{$i}", ' '.$oilMoneyArray[$b]);
		
		for($j=3;$j<6;++$j)
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
	
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save($absRoot);
	
	spl_autoload_register(__autoload);


	
	
	$crumb = Crumb::getCrumb();
	$crumb->popAllLatitude();
	$crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("查看门卡分配报表" , "/report/agreementManagement" , true);
	
	$smarty->assign("hasFiles",$hasFiles);
	$smarty->assign("downloadFile",$downloadFile);
	$smarty->assign("fileName",$fileName);
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
        $smarty->assign('date',$date);
	$smarty->assign('defArray',$taskArray);
	
	$smarty->setTitle('查看销售大厅报表');
	$smarty->displayMother('TABLE/QCTableXS.tpl');
}
?>