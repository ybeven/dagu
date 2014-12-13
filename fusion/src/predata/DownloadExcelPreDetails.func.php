<?php		
function DownloadExcelPreDetails($mineid,$notice=null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	$minedata = new Mine;
	$contactmandata = new Contactman;
	$expertdata = new Expert;
/*********Include PHPExcel*********************/
	require_once("../webroot/PHPExcel/Classes/PHPExcel.php");
	
	$sql_1 = "select * from `mine` WHERE id = $mineid";
	$mArray = $minedata->getArray($sql_1,true);

	$sql_2 = "select * from `contactman` WHERE mine_id = $mineid";
	$cArray = $contactmandata->getArray($sql_2,true);

	$sql_3 = "select * from `expert` WHERE mine_id = $mineid AND isshenbao = 1";
	$iArray = $expertdata->getArray($sql_3,true);
	$EArray = array();
	$j = 0;
	foreach($iArray as $i)
	{
		$EArray[$j][0] .= $i->expertName;
		$EArray[$j][1] .= $i->expertSex;
		$EArray[$j][2] .= $i->expertAge;
		$EArray[$j][3] .= $i->expertCompany;
		$EArray[$j][4] .= $i->expertTitles;
		$EArray[$j][5] .= $i->expertWork;
		$EArray[$j][6] .= $i->expertSubject;
		$EArray[$j][7] .= $i->expertCellphone;
		$EArray[$j][8] .= $i->expertLandhone;
		$EArray[$j][9] .= $i->expertEmail;
		$EArray[$j][10] .= $i->expertFax;
		$EArray[$j][11] .= $i->expertAddress;
		$EArray[$j][12] .= $i->expertIdea;
		$EArray[$j][13] .= $i->expertTime;
		$j++;
	}
/************Create new PHPExcel object***************/
	$objPHPExcel = new PHPExcel();
/************Set document properties******************/
	$objPHPExcel->getProperties()->setCreator("Gansu Province Land and Resources Management and the Office")
								 ->setLastModifiedBy("Gansu Province Land and Resources Management and the Office")
								 ->setTitle("Declaration Form");
/************Define variables****************/
	$objActSheet = $objPHPExcel->getActiveSheet();
	$borders_style =  array( 'borders' => array( 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'wrap'=>true));
	$style_obj = new PHPExcel_Style();
	$style_obj->applyFromArray($borders_style); 
/************Set First Sheet*****************/
	//添加两个封面
	$objPHPExcel->setActiveSheetIndex(0);
	$objActSheet = $objPHPExcel->getActiveSheet();
	
	$objActSheet->setTitle('封面1');
	$objActSheet->mergeCells('A3:I5');
	$objActSheet->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getStyle('A3')->getFont()->setSize(22);
	$objActSheet->setCellValue('A3',$mArray[0]->mineName.' 国家级绿色矿山建设申报' );
	$objActSheet->getStyle('B36')->getFont()->setSize(16);
	$objActSheet->getStyle('B38')->getFont()->setSize(16);
	$objActSheet->setCellValue('B36', '委托单位:');
	$objActSheet->setCellValue('B38', '编制单位:');


/************Add Title Data******************/	
	$objPHPExcel->createSheet();
	$objPHPExcel->setActiveSheetIndex(1);
	$objActSheet = $objPHPExcel->getActiveSheet();
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D19");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->mergeCells('A2:D2');
	$objActSheet->mergeCells('B3:D3');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	// $objActSheet->getStyle('A11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
	// $objActSheet->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objActSheet->getStyle('A13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_GENERAL);
	$objActSheet->getColumnDimension('A')->setWidth(20);
	$objActSheet->getColumnDimension('B')->setWidth(25);
	$objActSheet->getColumnDimension('C')->setWidth(20);
	$objActSheet->getColumnDimension('D')->setWidth(25);
	$objActSheet->getRowDimension('1')->setRowHeight(30);

	$objActSheet->getRowDimension('11')->setRowHeight(45);
	$objActSheet->getRowDimension('12')->setRowHeight(45);
	$objActSheet->getRowDimension('13')->setRowHeight(45);
	$objActSheet->getRowDimension('14')->setRowHeight(45);
	$objActSheet->getRowDimension('15')->setRowHeight(45);
	//$objActSheet->getRowDimension('16')->setRowHeight(45);
	$objActSheet->getRowDimension('19')->setRowHeight(45);	
	$objActSheet->mergeCells('B11:D11');
	$objActSheet->mergeCells('B12:D12');
	$objActSheet->mergeCells('B13:D13');
	$objActSheet->mergeCells('B14:D14');
	$objActSheet->mergeCells('B15:D15');
	//$objActSheet->mergeCells('B16:D16');
	$objActSheet->mergeCells('B19:D19');
//	$objActSheet->getStyle('A16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
//	$objActSheet->getStyle('A16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
//	
/************Add Title Data*******************/
	$objActSheet->setCellValue('A1','申报信息表');
	$objActSheet->setCellValue('A2','基本信息 ');
	$objActSheet->setCellValue('A3','申报矿山名称');
	$objActSheet->setCellValue('A4','所属企业名称');
	$objActSheet->setCellValue('C4','开采方式');
	$objActSheet->setCellValue('A5','企业性质');
	$objActSheet->setCellValue('C5','成立时间');
	//余博添加的
	$objActSheet->setCellValue('A6','市级行政区划');
	$objActSheet->setCellValue('c6','县级行政区划');
	//
	$objActSheet->setCellValue('A7','乡镇行政区划');
	$objActSheet->setCellValue('C7','矿区面积');
	$objActSheet->setCellValue('A8','矿山职工数');
	$objActSheet->setCellValue('C8','采矿许可证有效期限');
	$objActSheet->setCellValue('A9','矿种类别');
	$objActSheet->setCellValue('C9','开采矿种');
	$objActSheet->setCellValue('A10','保有资源储量');
	$objActSheet->setCellValue('C10','开采规模(吨/年)');
	//
	$objActSheet->setCellValue('A11','采选工艺设备');
	$objActSheet->setCellValue('A12','综合利用情况');
	$objActSheet->setCellValue('A13','矿业权有偿处置情况');
	$objActSheet->setCellValue('A14','矿山地质环境恢复治理情况');
	$objActSheet->setCellValue('A15','土地复垦情况');
	$objActSheet->setCellValue('A16','联系人姓名');
	$objActSheet->setCellValue('C16','电子邮件');
	$objActSheet->setCellValue('A17','固定电话');
	$objActSheet->setCellValue('C17','传真');
	$objActSheet->setCellValue('A18','手机');
	$objActSheet->setCellValue('C18','邮编');
	$objActSheet->setCellValue('A19','通讯地址');
/************Add Base Data*******************/
	$objActSheet->setCellValue('B3',$mArray[0]->mineName);
	$objActSheet->setCellValue('B4',$mArray[0]->enterpriseName);
	$objActSheet->setCellValue('D4',$mArray[0]->fangshi);
	$objActSheet->setCellValue('B5',$mArray[0]->enterpriseproperty);
	$objActSheet->setCellValue('D5',$mArray[0]->time);
	//余博添加的
	$objActSheet->setCellValue('B6',$mArray[0]->shijiquhua);
	$objActSheet->setCellValue('D6',$mArray[0]->xianjiquhua);
	//
	$objActSheet->setCellValue('B7',$mArray[0]->diliweizhi);
	$objActSheet->setCellValue('D7',$mArray[0]->kuangqumianji);
	$objActSheet->setCellValue('B8',$mArray[0]->zhigongshu);
	$objActSheet->setCellValue('D8',$mArray[0]->youxiaoqixian);
	$objActSheet->setCellValue('B9',$mArray[0]->orenametype);
	$objActSheet->setCellValue('D9',$mArray[0]->orename);
	$objActSheet->setCellValue('B10',$mArray[0]->ziyuanchuliang);
	$objActSheet->setCellValue('D10',$mArray[0]->minescale);
	$objActSheet->setCellValue('B11',$mArray[0]->gongyishebei);
	$objActSheet->setCellValue('B12',$mArray[0]->zongheliyong);
	$objActSheet->setCellValue('B13',$mArray[0]->youchangchuzhi);
	$objActSheet->setCellValue('B14',$mArray[0]->environmentrecovery);
	$objActSheet->setCellValue('B15',$mArray[0]->landreclamation);
	$objActSheet->setCellValue('B16',$cArray[0]->contactmanName);
	$objActSheet->setCellValue('D16',$cArray[0]->contactmanEmail);
	$objActSheet->setCellValue('B17',$cArray[0]->contactmanLandphone);
	$objActSheet->setCellValue('D17',$cArray[0]->contactmanFax);
	$objActSheet->setCellValue('B18',$cArray[0]->contactmanCellphone);
	$objActSheet->setCellValue('D18',$mArray[0]->mailcode);
	$objActSheet->setCellValue('B19',$mArray[0]->address);
/************Set Name of Sheet***************/
	$objActSheet->setTitle('基本信息');
/************Set Second Sheet*****************/
	$objPHPExcel->createSheet();
/************Define variables****************/
	$objPHPExcel->setActiveSheetIndex(2);
	$objActSheet = $objPHPExcel->getActiveSheet();
	$column_data = 0;
	$column = 0;
	$all_num = 9*$j+1;
	$cell = 0;
	$cell_data = 0;
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D".$all_num);
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->getColumnDimension('A')->setWidth(20);
	$objActSheet->getColumnDimension('B')->setWidth(25);
	$objActSheet->getColumnDimension('C')->setWidth(20);
	$objActSheet->getColumnDimension('D')->setWidth(25);
		
	for($num=0;$num<$j;$num++)
	{	
		$cell = $cell_data+2;
		$objActSheet->mergeCells('A'.$cell.':D'.$cell);
		$cell = $cell_data+9;
		$objActSheet->mergeCells('B'.$cell.':D'.$cell);		
		$objActSheet->getRowDimension($cell)->setRowHeight(60);
		$cell_data = $cell_data+9;
	}
/************Set Expert Title*****************/	
	$objActSheet->setCellValue('A1','专家信息表');
/*************Set Excel Form*****************/
//	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
//	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
/************Add Expert Data*****************/
	for($num=0;$num<$j;$num++)
	{
		$column = $column_data+2;
		$objActSheet->setCellValue('A'.$column,'专家信息 ');
		$column = $column_data+3;
		$objActSheet->setCellValue('A'.$column,'姓名');
		$objActSheet->setCellValue('C'.$column,'性别');
		$objActSheet->setCellValue('B'.$column,$EArray[$num][0]);
		if ($EArray[$num][1]=='0') {
			$objActSheet->setCellValue('D'.$column,'男');
		}
		else{$objActSheet->setCellValue('D'.$column,'女');}
		//$objActSheet->setCellValue('D'.$column,$EArray[$num][1]);
		$column = $column_data+4;
		$objActSheet->setCellValue('A'.$column,'年龄');
		$objActSheet->setCellValue('C'.$column,'单位');
		$objActSheet->setCellValue('B'.$column,$EArray[$num][2]);
		$objActSheet->setCellValue('D'.$column,$EArray[$num][3]);
		$column = $column_data+5;
		$objActSheet->setCellValue('A'.$column,'职称');
		$objActSheet->setCellValue('C'.$column,'职务');
		$objActSheet->setCellValue('B'.$column,$EArray[$num][4]);
		$objActSheet->setCellValue('D'.$column,$EArray[$num][5]);
		$column = $column_data+6;
		$objActSheet->setCellValue('A'.$column,'专业');
		$objActSheet->setCellValue('C'.$column,'手机');
		$objActSheet->setCellValue('B'.$column,$EArray[$num][6]);
		$objActSheet->setCellValue('D'.$column,$EArray[$num][7]);
		$column = $column_data+7;
		$objActSheet->setCellValue('A'.$column,'固话');
		$objActSheet->setCellValue('C'.$column,'邮箱');
		$objActSheet->setCellValue('B'.$column,$EArray[$num][8]);
		$objActSheet->setCellValue('D'.$column,$EArray[$num][9]);
		$column = $column_data+8;
		$objActSheet->setCellValue('A'.$column,'传真');
		$objActSheet->setCellValue('C'.$column,'地址');
		$objActSheet->setCellValue('B'.$column,$EArray[$num][10]);
		$objActSheet->setCellValue('D'.$column,$EArray[$num][11]);
		$column = $column_data+9;
		$objActSheet->setCellValue('A'.$column,'专家意见');
		$objActSheet->setCellValue('B'.$column,$EArray[$num][12]);
		$column = $column_data+10;
		$objActSheet->setCellValue('A'.$column,'时间');
		$objActSheet->setCellValue('B'.$column,$EArray[$num][13]);
		$column_data = $column_data+9;
	}
/************Set Name of Sheet***************/
	$objActSheet->setTitle('专家信息');
/************Set Third Sheet*****************/
	$objPHPExcel->createSheet();
/************Define variables****************/
	$objPHPExcel->setActiveSheetIndex(3);
	$objActSheet = $objPHPExcel->getActiveSheet();
/*************Set Excel Form*****************/
	$objActSheet->setSharedStyle($style_obj,"A1:D8");
	$objActSheet->mergeCells('A1:D1');
	$objActSheet->getStyle('A1')->getFont()->setSize(22);
	$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objActSheet->getColumnDimension('A')->setWidth(20);
	$objActSheet->getColumnDimension('B')->setWidth(25);
	$objActSheet->getColumnDimension('C')->setWidth(20);
	$objActSheet->getColumnDimension('D')->setWidth(25);
	$objActSheet->getRowDimension('1')->setRowHeight(30);
	$objActSheet->getRowDimension('3')->setRowHeight(45);
	$objActSheet->getRowDimension('5')->setRowHeight(45);
	$objActSheet->getRowDimension('7')->setRowHeight(45);
	$objActSheet->mergeCells('B2:D2');
	$objActSheet->mergeCells('B3:D3');
	$objActSheet->mergeCells('B4:D4');
	$objActSheet->mergeCells('B5:D5');
	$objActSheet->mergeCells('B6:D6');
	$objActSheet->mergeCells('B7:D7');
	$objActSheet->mergeCells('B8:D8');
/************Set Report Title*****************/
	$objActSheet->setCellValue('A1','审核意见表');
/************Add Title Data*******************/
	$objActSheet->setCellValue('A2','企业申报类型');
	if ($mArray[0]->audittype == '非中央所属的矿山企业') {
			$objActSheet->setCellValue('A3','国土资源部审核（备案）意见');
			$objActSheet->setCellValue('A5','矿山所在地市（县）级国土资源主管部门审核意见');
			$objActSheet->setCellValue('A7','矿山所在地省级国土资源主管部门审核意见');
		}	
	if ($mArray[0]->audittype == '归口中央企业的审核意见') {
			$objActSheet->setCellValue('A3','国土资源部审核（备案）意见');
			$objActSheet->setCellValue('A5','矿山所在地省级国土资源主管部门审核意见');
			$objActSheet->setCellValue('A7','归口中央企业的审核意见');
		}	
	if ($mArray[0]->audittype == '行业协会推荐的矿山企业') {
			$objActSheet->setCellValue('A3','国土资源部审核（备案）意见');
			$objActSheet->setCellValue('A5','矿山所在地省级国土资源主管部门审核意见');
			$objActSheet->setCellValue('A7','行业协会的审核意见');
		}	
	$objActSheet->setCellValue('A4','意见审核(备案)时间');		
	$objActSheet->setCellValue('A6','审核时间');	
	$objActSheet->setCellValue('A8','审核时间');
/************Add Report Data*****************/
	$objActSheet->setCellValue('B2',$mArray[0]->audittype);	
	$objActSheet->setCellValue('B3',$mArray[0]->audittypeMX1);	
	$objActSheet->setCellValue('B4',$mArray[0]->audittime1);	
	$objActSheet->setCellValue('B5',$mArray[0]->audittypeMX2);	
	$objActSheet->setCellValue('B6',$mArray[0]->audittime2);	
	$objActSheet->setCellValue('B7',$mArray[0]->audittypeMX3);	
	$objActSheet->setCellValue('B8',$mArray[0]->audittime3);
/************Set Name of Sheet***************/
	$objActSheet->setTitle('审核意见');

	$objPHPExcel->setActiveSheetIndex(0);

/************Redirect output to a client’s web browser (Excel2007)***********/
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename='.mb_convert_encoding("申报信息表.xls","UTF-8","auto"));
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}
?>