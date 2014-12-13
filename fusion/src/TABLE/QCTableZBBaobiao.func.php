<?php
function QCTableZBBaobiao($notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	
	
	
	
	
        $planDate = date('Y-m-d');
       
	$smarty->assign('date',$planDate);
	
	$dArray = null;
	$smarty->assign('defArray',$dArray);
	
	$workId = 1;
	$task = new Task;
	$sql = "select * from `task` WHERE  final_operate_time LIKE '{$planDate}%' ";
        $taskArray = $task->getArray($sql,true);
	
	
	$smarty->assign('defArray',$taskArray);
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
        $fileName = ''.$planDate.'.xls';
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
	
        $objActiveSheet->mergeCells('A2:H2');//合并单元格
	
	$objActiveSheet->setCellValue('A2', ' '.$planDate.'  ');
	$objActiveSheet->getColumnDimension('A')->setWidth(25);
	$objStyleTitle = $objActiveSheet->getStyle('A2');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	$objAlignTitle = $objStyleTitle->getAlignment();   
	$objAlignTitle->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	
	//条目名称
	$objActiveSheet->setCellValue('A3', '品种');
	$objStyleTitle = $objActiveSheet->getStyle('A3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	$objActiveSheet->setCellValue('B3', '品名');
	
	$objStyleTitle = $objActiveSheet->getStyle('B3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('C3', '客户名称');
	
	$objStyleTitle = $objActiveSheet->getStyle('C3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('D3', '吨位');
	
	$objStyleTitle = $objActiveSheet->getStyle('D3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('E3', '单价');
	
	$objStyleTitle = $objActiveSheet->getStyle('E3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('F3', '销售额');
	
	$objStyleTitle = $objActiveSheet->getStyle('F3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('G3', '备注');//付款方式
	
	$objStyleTitle = $objActiveSheet->getStyle('G3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	$objActiveSheet->setCellValue('H3', '操作员');
	
	$objStyleTitle = $objActiveSheet->getStyle('H3');
	$objFontTitle = $objStyleTitle->getFont();
	$objFontTitle->setSize(12);
	$objFontTitle->setBold(true);
	
	
	
	
	
	// 设置单元格样式（居中、宽度）

	
	$objStyle = $objActiveSheet->getStyle('A3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('A')->setWidth(15);

	$objStyle = $objActiveSheet->getStyle('B3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('B')->setWidth(15);

	$objStyle = $objActiveSheet->getStyle('C3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('C')->setWidth(40);
	

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
        $objActiveSheet->getColumnDimension('F')->setWidth(15);

	$objStyle = $objActiveSheet->getStyle('G3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('G')->setWidth(20);

	$objStyle = $objActiveSheet->getStyle('H3');
	$objAlign = $objStyle->getAlignment();   
	$objAlign->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objActiveSheet->getColumnDimension('H')->setWidth(15);
	

	$cols = array('A','B','C','D','E','F','G','H');
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
		  $CClass = new OilModel;
                  $sql = "select * from `oil_model`";
                  $childID = $CClass->getArray($sql,true);
		  if($childID != null)
		  {
			foreach($childID as $n)
		        {
			        $task22 = new Task;
	                        $sql22 = "select * from `task` WHERE  final_operate_time LIKE '{$planDate}%'  AND oil_model_id = '{$n->id}' ";
                                $taskArray22 = $task22->getArray($sql22,true);
				
				if($taskArray22 != null)
				{
					$weight = 0 ;
					$money = 0 ;
				foreach($taskArray22 as $m)
		                {
			                $customer->getByID($m->customerId);
			                $oilModel->getByID($m->oilModelId);
			                $oilType->getByID($oilModel->oilTypeId);
			                $user->getByID($m->finalOperatorId);
			
			                $objActiveSheet->setCellValue("A{$i}", ' '.$oilType->oilType);
			                $objActiveSheet->setCellValue("B{$i}", ' '.$oilModel->oilModel);
			                $objActiveSheet->setCellValue("C{$i}", ' '.$customer->name);
			                $objActiveSheet->setCellValue("D{$i}", ' '.$m->realWeight);//磅重
			                $objActiveSheet->setCellValue("E{$i}", ' '.$m->unitPrice);//单价
			                $objActiveSheet->setCellValue("F{$i}", ' '.(($m->unitPrice)*($m->realWeight)));//总金额
			                $objActiveSheet->setCellValue("G{$i}", ' '.$m->payType);//付款方式
			                $objActiveSheet->setCellValue("H{$i}", ' '.$user->name);//操作员
		                        $weight += $m->realWeight;
					$money += ($m->unitPrice)*($m->realWeight);
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
			
			
		                 ++$i;
		                }
				$objActiveSheet->setCellValue("A{$i}", '小计：');
				$objStyleTitle = $objActiveSheet->getStyle("A{$i}");
	                        $objFontTitle = $objStyleTitle->getFont();
	                        $objFontTitle->setSize(12);
	                        $objFontTitle->setBold(true);
				
				$objActiveSheet->setCellValue("D{$i}", ' '.$weight);
				$objActiveSheet->setCellValue("F{$i}", ' '.$money);
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
				$i++;
				$objActiveSheet->setCellValue("A{$i}", '备注： ');
				$objStyleTitle = $objActiveSheet->getStyle("A{$i}");
	                        $objFontTitle = $objStyleTitle->getFont();
	                        $objFontTitle->setSize(12);
	                        $objFontTitle->setBold(true);
				$objActiveSheet->mergeCells("B{$i}:G{$i}");//合并单元格
				$objActiveSheet->setCellValue("B{$i}", ' '.$oilType->oilType.$oilModel->oilModel.':    '.$weight);
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
				$i++;
				}
				
				
				
				
		        }
		  }
		  
		
		
		//++$num;
	
	}
	
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
	
	
	
	
	$crumb = Crumb::getCrumb();
        $crumb->popAllLatitude();
        $crumb->visitNewPage("首页" , "/start" , false);
        $crumb->visitNewPage("销售报表" , "" , true);

	
	$smarty->setTitle('销售报表');
	$smarty->displayMother('TABLE/QCTableZBBaobiao.tpl');
}
?>