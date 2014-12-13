<?php 

//设置自动宽度

function setAutoWidth($sheet)
{
    $AToN = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    for($i=0; $i<21;$i++)
    {
        $sheet->getColumnDimension($AToN[$i])->setWidth(14);
        //设置背景
        $sheet->getStyle($AToN[$i].'2')->getFill()->setFillType(PhpExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_YELLOW);
    }
}

/***********************
* 到处标准值表为Excel
*直接从数据库中读出来写到Excel
*没有输入参数
***********************/
function DownloadTP()
{
    //prepare work
    global $smarty;
    needLogin();
    $session = Session::start();
    $curUser = $session->curUser;
    $kchc = new OrestandardKchc;
    $xkhs = new OrestandardXkhs;
    $zhly = new OrestandardZhly;

    $tempNames = new OrestandardnameKchc;
    
	//从数据库中取出标准值
	//kcjc:开采回采
	//xkhs:选矿回收
	//zhly:综合利用
	$kchcName = "select * from `orestandardname_kchc`";
	$kchcData = "select * from `orestandard_kchc` ";
	$xkhsName = "select * from `orestandardname_xkhs`";
	$xkhsData = "select * from `orestandard_xkhs`";
	$zhlyName = "select * from `orestandardname_zhly`";
	$zhlyData = "select * from `orestandard_zhly`";

	$kchcNames = array();
	$xkhsNames = array();
	$zhlyNames = array();
	//缓存名称表
	$temp = $tempNames->getArray($kchcName, true);
	//使用索引数组保存各子类名字
	foreach ($temp as $key => $value) {
		$kchcNames[$value->kuangzhong] = $value;
	}
	$tempNames = new OrestandardnameXkhs;
	$temp = $tempNames->getArray($xkhsName, true);
	foreach ($temp as $key => $value) {
		$xkhsNames[$value->kuangzhong] = $value;
	}
	$tempNames = new OrestandardnameZhly;
	$temp = $tempNames->getArray($zhlyName, true);
	foreach ($temp as $key => $value) {
		$zhlyNames[$value->kuangzhong] = $value;
	}
	//销毁临时数组
	$tempNames = null;
	$temp = null;

	//取得各标准值
	$kchcArray = $kchc->getArray($kchcData, true);
	$xkhsArray = $xkhs->getArray($xkhsData, true);
	$zhlyArray = $zhly->getArray($zhlyData, true);

	//获取数据条数用于循环
	$kchcCnt = count($kchcArray);
	$xkhsCnt = count($xkhsArray);
	$zhlyCnt = count($zhlyArray);

	require_once('../webroot/PHPExcel/Classes/PHPExcel.php');
	//create a new PhpExcel
	$objPHPExcel = new PHPExcel();
	//ser properties
	$objPHPExcel->getProperties()->setCreator("Gansu Province Land and Resources Management and the Office")
								 ->setLastModifiedBy("Gansu Province Land and Resources Management and the Office")
								 ->setTitle("Declaration Form");
	// $objActSheet = $objPHPExcel->getActiveSheet();
	$borders_style =  array( 'borders' => array( 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'wrap'=>true));
	$style_obj = new PHPExcel_Style();
	$style_obj->applyFromArray($borders_style); 
	///循环写入Excel
	$sheetNames = array();
	$sheetIndex = 0;

    /*******************************
    *开采回采率
    *********************************/
	//行索引，从第二行开始写数据
    //每个sheet有一个索引，用title做索引数组
	$cellIndexs = array();

	for($index=0; $index < $kchcCnt; $index++)
	{
		//是否已存在该sheet,不存在则创建新的sheet，否则使用已存在的sheetIndex
		if($sheetNames[$kchcArray[$index]->kuangzhong] === null)
		{
			if($index != 0 ) $objPHPExcel->createSheet();
			$sheetNames[$kchcArray[$index]->kuangzhong] = $sheetIndex;
			$objPHPExcel->setActiveSheetIndex($sheetIndex);
            $objActSheet =$objPHPExcel->getActiveSheet();
			//设置标题
			$objActSheet->setTitle($kchcArray[$index]->kuangzhong);
            //设置索引数组
            $cellIndexs[$kchcArray[$index]->kuangzhong] = 2;
    		//设施sheet样式
            $objActSheet->setSharedStyle($style_obj,"A1:U26");

            //设置自动宽度
            setAutoWidth($objActSheet);

            $sheetIndex++;
        }else 
        {
            $objPHPExcel->setActiveSheetIndex($sheetNames[$kchcArray[$index]->kuangzhong]);
            $objActSheet =$objPHPExcel->getActiveSheet();
        }
        
		//7列分一组，第一组
		$objActSheet->mergeCells('A1:G1');

		$objActSheet->getStyle('A1')->getFont()->setSize(16);
		$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objActSheet->getRowDimension('1')->setRowHeight(25);
        $objActSheet->getRowDimension('2')->setRowHeight(20);

        //取sheet 的cellindex
        $cellIndex = $cellIndexs[$kchcArray[$index]->kuangzhong];

		//添加数据
		$objActSheet->setCellValue('A1',$kchcArray[$index]->kuangzhong.'开采回采率');
		//设置列标题
		if($cellIndex==2)
		{
			$kuangzhong = $kchcArray[$index]->kuangzhong;
			$objActSheet->setCellValue('A2',$kchcNames[$kuangzhong]->subclassName1);
			$objActSheet->setCellValue('B2',$kchcNames[$kuangzhong]->subclassName2);
			$objActSheet->setCellValue('C2',$kchcNames[$kuangzhong]->subclassName3);
			$objActSheet->setCellValue('D2',$kchcNames[$kuangzhong]->subclassName4);
			$objActSheet->setCellValue('E2',$kchcNames[$kuangzhong]->subclassName5);
			$objActSheet->setCellValue('F2',$kchcNames[$kuangzhong]->subclassName6);
            $objActSheet->setCellValue('G2','值');
			$cellIndex++;
		}
        //写入一行
       $objActSheet->setCellValue('A'.$cellIndex,$kchcArray[$index]->subclass1);
       $objActSheet->setCellValue('B'.$cellIndex,$kchcArray[$index]->subclass2);
       $objActSheet->setCellValue('C'.$cellIndex,$kchcArray[$index]->subclass3);
       $objActSheet->setCellValue('D'.$cellIndex,$kchcArray[$index]->subclass4);
       $objActSheet->setCellValue('E'.$cellIndex,$kchcArray[$index]->subclass5);
       $objActSheet->setCellValue('F'.$cellIndex,$kchcArray[$index]->subclass6);
       $objActSheet->setCellValue('G'.$cellIndex,$kchcArray[$index]->standardvalues);

       //写回cellindexs
       $cellIndexs[$kchcArray[$index]->kuangzhong] = $cellIndex+1;
	}

    /*******************************
    *选矿回收率
    *********************************/
    //行索引，从第二行开始写数据
    //每个sheet有一个索引，用title做索引数组
    $cellIndexs = null;
    $cellIndexs = array();

    for($index=0; $index < $xkhsCnt; $index++)
    {
        //是否已存在该sheet,不存在则创建新的sheet，否则使用已存在的sheetIndex
        if($sheetNames[$xkhsArray[$index]->kuangzhong] === null)
        {
            $objPHPExcel->createSheet();
            $sheetNames[$xkhsArray[$index]->kuangzhong] = $sheetIndex;
            $objPHPExcel->setActiveSheetIndex($sheetIndex);
            $objActSheet =$objPHPExcel->getActiveSheet();
            //设置标题
            $objActSheet->setTitle($xkhsArray[$index]->kuangzhong);
            //设施sheet样式
            $objActSheet->setSharedStyle($style_obj,"A1:U26");
            //设置自动宽度
            setAutoWidth($objActSheet);

            $sheetIndex++;
        }else 
        {
            $objPHPExcel->setActiveSheetIndex($sheetNames[$xkhsArray[$index]->kuangzhong]);
            $objActSheet =$objPHPExcel->getActiveSheet();
        }

        //7列分一组，第二组
        $objActSheet->mergeCells('H1:N1');
        $objActSheet->getStyle('H1')->getFont()->setSize(16);
        $objActSheet->getRowDimension('1')->setRowHeight(25);
        $objActSheet->getRowDimension('2')->setRowHeight(20);
        $objActSheet->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        //设置索引数组
        if($cellIndexs[$xkhsArray[$index]->kuangzhong] === null) 
        {
            $cellIndexs[$xkhsArray[$index]->kuangzhong] = 2;
        }

        //取sheet 的cellindex
        $cellIndex = $cellIndexs[$xkhsArray[$index]->kuangzhong];
        //添加数据
        $objActSheet->setCellValue('H1',$xkhsArray[$index]->kuangzhong.'选矿回收率');
        //设置列标题
        if($cellIndex==2)
        {
            $kuangzhong = $xkhsArray[$index]->kuangzhong;
            $objActSheet->setCellValue('H2',$xkhsNames[$kuangzhong]->subclassName1);
            $objActSheet->setCellValue('I2',$xkhsNames[$kuangzhong]->subclassName2);
            $objActSheet->setCellValue('J2',$xkhsNames[$kuangzhong]->subclassName3);
            $objActSheet->setCellValue('K2',$xkhsNames[$kuangzhong]->subclassName4);
            $objActSheet->setCellValue('L2',$xkhsNames[$kuangzhong]->subclassName5);
            $objActSheet->setCellValue('M2',$xkhsNames[$kuangzhong]->subclassName6);
            $objActSheet->setCellValue('N2','值');
            $cellIndex++;
        }
        //写入一行
       $objActSheet->setCellValue('H'.$cellIndex,$xkhsArray[$index]->subclass1);
       $objActSheet->setCellValue('I'.$cellIndex,$xkhsArray[$index]->subclass2);
       $objActSheet->setCellValue('J'.$cellIndex,$xkhsArray[$index]->subclass3);
       $objActSheet->setCellValue('K'.$cellIndex,$xkhsArray[$index]->subclass4);
       $objActSheet->setCellValue('L'.$cellIndex,$xkhsArray[$index]->subclass5);
       $objActSheet->setCellValue('M'.$cellIndex,$xkhsArray[$index]->subclass6);
       $objActSheet->setCellValue('N'.$cellIndex,$xkhsArray[$index]->standardvalues);
       //写回cellindexs
       $cellIndexs[$xkhsArray[$index]->kuangzhong] = $cellIndex+1;
    }

    /*******************************
    *写综合利用率
    *********************************/
    //行索引，从第二行开始写数据
    //每个sheet有一个索引，用title做索引数组
    $cellIndexs = null;
    $cellIndexs = array();

    for($index=0; $index < $zhlyCnt; $index++)
    {
        //是否已存在该sheet,不存在则创建新的sheet，否则使用已存在的sheetIndex
        if($sheetNames[$zhlyArray[$index]->kuangzhong] === null)
        {
            $objPHPExcel->createSheet();
            $sheetNames[$zhlyArray[$index]->kuangzhong] = $sheetIndex;
            $objPHPExcel->setActiveSheetIndex($sheetIndex);
            $objActSheet =$objPHPExcel->getActiveSheet();
            //设置标题
            $objActSheet->setTitle($zhlyArray[$index]->kuangzhong);
            //设施sheet样式
            $objActSheet->setSharedStyle($style_obj,"A1:U26");
            //设置自动宽度
            setAutoWidth($objActSheet);

            $sheetIndex++;
        }else 
        {
            //已生成sheet，直接使用
            $objPHPExcel->setActiveSheetIndex($sheetNames[$zhlyArray[$index]->kuangzhong]);
            $objActSheet =$objPHPExcel->getActiveSheet();
        }

        //设置索引数组
        if($cellIndexs[$zhlyArray[$index]->kuangzhong] === null) 
        {
            $cellIndexs[$zhlyArray[$index]->kuangzhong] = 2;
        }

        //取sheet 的cellindex
        $cellIndex = $cellIndexs[$zhlyArray[$index]->kuangzhong];
        //7列分一组，第三组
        $objActSheet->mergeCells('O1:U1');

        $objActSheet->getStyle('O1')->getFont()->setSize(16);
        $objActSheet->getStyle('O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        //添加数据
        $objActSheet->setCellValue('O1',$zhlyArray[$index]->kuangzhong.'综合利用率');
        //在第二行设置列标题
        if($cellIndex==2)
        {
            $kuangzhong = $zhlyArray[$index]->kuangzhong;
            $objActSheet->setCellValue('O2',$zhlyNames[$kuangzhong]->subclassName1);
            $objActSheet->setCellValue('P2',$zhlyNames[$kuangzhong]->subclassName2);
            $objActSheet->setCellValue('Q2',$zhlyNames[$kuangzhong]->subclassName3);
            $objActSheet->setCellValue('R2',$zhlyNames[$kuangzhong]->subclassName4);
            $objActSheet->setCellValue('S2',$zhlyNames[$kuangzhong]->subclassName5);
            $objActSheet->setCellValue('T2',$zhlyNames[$kuangzhong]->subclassName6);
            $objActSheet->setCellValue('U2','值');
            $cellIndex++;
        }
        //写入一行
       $objActSheet->setCellValue('O'.$cellIndex,$zhlyArray[$index]->subclass1);
       $objActSheet->setCellValue('P'.$cellIndex,$zhlyArray[$index]->subclass2);
       $objActSheet->setCellValue('Q'.$cellIndex,$zhlyArray[$index]->subclass3);
       $objActSheet->setCellValue('R'.$cellIndex,$zhlyArray[$index]->subclass4);
       $objActSheet->setCellValue('S'.$cellIndex,$zhlyArray[$index]->subclass5);
       $objActSheet->setCellValue('T'.$cellIndex,$zhlyArray[$index]->subclass6);
       $objActSheet->setCellValue('U'.$cellIndex,$zhlyArray[$index]->standardvalues);
       //写回cellindexs
       $cellIndexs[$zhlyArray[$index]->kuangzhong] = $cellIndex+1;
    }

	// 输出文件
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename='.mb_convert_encoding("三率基本维护.xls","GBK","auto"));
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}
 ?>