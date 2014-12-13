<?php
function QCShowList($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	
	
	
	$planDate = date('Y-m-d');
	$task = new Task;
	$sql = "select * from `task` WHERE plan_id in (select id from plan where plan.operate_time LIKE '{$planDate}%' OR plan.operate_time LIKE '{$planDate}%') ";
        $taskArray = $task->getArray($sql,true);
	
        
	$smarty->assign('date1',$planDate);
	$smarty->assign('date2',$planDate);
	
	$MClass = new OilType;
            $sql = "select * from `oil_type`";
            $sortID = $MClass->getArray($sql,true);
	    
            $CClass = new OilModel;
            $sql = "select * from `oil_model`";
            $childID = $CClass->getArray($sql,true);
	    
            $smarty->assign('sortID',$sortID);
            $smarty->assign('childID',$childID);
	
	$smarty->assign('taskArray',$taskArray);
	
	
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
        $fileName = 'ALL '.$date.'.xls';
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
	$objActiveSheet->setTitle('结算中心报表');
	//标题
	$objActiveSheet->mergeCells('E1:G1');//合并单元格
	$objActiveSheet->mergeCells('H1:I1');
	$objActiveSheet->setCellValue('E1', '结算中心报表');
	$objActiveSheet->getColumnDimension('E')->setWidth(25);
	$objStyleTitle = $objActiveSheet->getStyle('E1');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(18);
	$objFontTitle->setBold(true);
	$objAlignTitle = $objStyleTitle->getAlignment();   
	$objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->setCellValue('H1', $date);

	//条目名称
	$objActiveSheet->setCellValue('A3', '提单号');
	$objActiveSheet->setCellValue('B3', '客户名称');
	$objActiveSheet->setCellValue('C3', '油品');
	$objActiveSheet->setCellValue('D3', '单价');
	$objActiveSheet->setCellValue('E3', '皮重');
	$objActiveSheet->setCellValue('F3', '毛重');
	$objActiveSheet->setCellValue('G3', '磅重');
	$objActiveSheet->setCellValue('H3', '质量流量计');
	$objActiveSheet->setCellValue('I3', '批控仪计数');
	$objActiveSheet->setCellValue('J3', '计算方式');
	$objActiveSheet->setCellValue('K3', '总金额');
	$objActiveSheet->setCellValue('L3', '付款方式');
	$objActiveSheet->setCellValue('M3', '预付款');
	$objActiveSheet->setCellValue('N3', '操作员');
	$objActiveSheet->setCellValue('O3', '结算时间');
	
	
	
	
	// 设置单元格样式（居中、宽度）
	$objStyle = $objActiveSheet->getStyle('A3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$objStyle = $objActiveSheet->getStyle('B3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('B')->setWidth(15);

	$objStyle = $objActiveSheet->getStyle('C3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objStyle = $objActiveSheet->getStyle('D3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	

	$objStyle = $objActiveSheet->getStyle('E3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objStyle = $objActiveSheet->getStyle('F3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	

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
	$objActiveSheet->getColumnDimension('I')->setWidth(15);
	
	$objStyle = $objActiveSheet->getStyle('J3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('J')->setWidth(20);
	
	$objStyle = $objActiveSheet->getStyle('K3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$objStyle = $objActiveSheet->getStyle('L3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$objStyle = $objActiveSheet->getStyle('M3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$objStyle = $objActiveSheet->getStyle('N3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('N')->setWidth(20);
	
	$objStyle = $objActiveSheet->getStyle('O3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('O')->setWidth(20);
        
	$cols = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O');
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
			//$user->getByID($m->finalOperatorId);
			
			$objActiveSheet->setCellValue("A{$i}", ' '.$m->planKey);
			$objActiveSheet->setCellValue("B{$i}", ' '.$customer->name);
			$objActiveSheet->setCellValue("C{$i}", ' '.$oilType->oilType.$oilModel->oilModel);
			$objActiveSheet->setCellValue("D{$i}", ' '.$m->unitPrice);//单价
			$objActiveSheet->setCellValue("E{$i}", ' '.$m->emptyWeight);
			$objActiveSheet->setCellValue("F{$i}", ' '.$m->finalWeight);
			$objActiveSheet->setCellValue("G{$i}", ' '.$m->realWeight);//磅重
			$objActiveSheet->setCellValue("H{$i}", ' '.$m->flowWeight);//质量流量计
			$objActiveSheet->setCellValue("I{$i}", ' '.$m->kgRecord);//批控仪
			$objActiveSheet->setCellValue("J{$i}", ' '.$m->calculateMethod);//计算方式
			$objActiveSheet->setCellValue("K{$i}", ' '.(($m->unitPrice)*($m->realWeight)));//总金额
			$objActiveSheet->setCellValue("L{$i}", ' '.$m->payType);//付款方式
			$objActiveSheet->setCellValue("M{$i}", ' '.$m->advancePay);//预付款
			//$objActiveSheet->setCellValue("N{$i}", ' '.$user->name);//操作员
			$objActiveSheet->setCellValue("O{$i}", ' '.$m->finalOperateTime);//操作时间
			
			
			
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
					$oilWeightArray[$g] = $m->realWeight;
					$oilMoneyArray[$g] = ($m->unitPrice)*($m->realWeight);
					break;
				}
				if( ($oilTypeArray[$g]) == ($oilType->oilType) && ($oilModelArray[$g]) == ($oilModel->oilModel))
				{
					$oilWeightArray[$g] += $m->realWeight;
					$oilMoneyArray[$g] += ($m->unitPrice)*($m->realWeight);
					break;
				}
			}
			
		        ++$i;
			
		}
		
		//++$num;
	
	}
	
	////////////////////////////////////////////////油品统计
	++$i;
	
	$objActiveSheet->setCellValue("E{$i}", '总计');
	$objActiveSheet->getColumnDimension('E')->setWidth(25);
	$objStyleTitle = $objActiveSheet->getStyle("E{$i}");
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
	$crumb->visitNewPage("查看结算报表" , "" , true);
	
	$smarty->assign("hasFiles",$hasFiles);
	$smarty->assign("downloadFile",$downloadFile);
	$smarty->assign("fileName",$fileName);
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	
	
	
       $crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("汽车销售查询" , "" , true);

	
	$smarty->setTitle('汽车销售查询');
	$smarty->displayMother('QC/QCShowList.tpl');
			
}
?>