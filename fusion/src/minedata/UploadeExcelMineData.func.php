<?php

/**
 * @param $mineid
 * @param null $notice
 * @throws PermissionDeniedException
 */
function UploadeExcelMineData($mineid,$notice=null){
	global $smarty;
	needLogin();
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	$basedata = new Basedata;

//	echo $mineid;
//	echo '<br>';
/********Excel update to data********/
	$data = new File;
	$data->mineId=$mineid;
	
	define('UPLOAD_DIR', $_SERVER["DOCUMENT_ROOT"].'/uploadDir/');
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
/**********************get first sheet**************************/
		$Count = 0;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
//		echo $allRow;
/*********Define variables*********/
		$declaredata = array();
		$oresdata = array();
		$ores = array();
		//存放多的经纬度信息
		$jingWei = array();

		$oresdata_class = array();//主或半生
		$Mining_methodsdata = array();
		$numberColumn='A';
		$currentColumn='C';
		
		$basedata = new Basedata;
		$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
		mysql_select_db('greenmine',$db) or die(mysql_error($db));
		mysql_query("SET NAMES 'utf8'");
		$sql_basedata = "select mine.mine_name as mineName from `mine` WHERE mine.id = $mineid";
		$mArray = mysql_query($sql_basedata,$db) or die(mysql_error());
		$m=mysql_fetch_array($mArray);

		$path_parts = pathinfo($uploadFile);
		$fileType = $path_parts['extension'];//输出文件类型
		
		$new_dir = $m['mineName'];
//		echo $new_dir;
//		echo "<br>";
		$new_uploadFile = UPLOAD_DIR.$new_dir;
//		echo $new_uploadFile;
//		echo "<br>";
		$new_uploadFileNeme = $new_uploadFile.'/'.$new_dir.'规划表.'.$fileType;
//		echo $new_uploadFileNeme;
//		echo "<br>";
		$new_uploadFileNeme_gbk = mb_convert_encoding($new_uploadFileNeme,"GBK","auto");
		$new_uploadFileDir_gbk = mb_convert_encoding($new_uploadFile,"GBK","auto");
//		echo $new_uploadFileNeme_gbk;
//		echo "<br>";
		if (!file_exists($new_uploadFileDir_gbk))
		{
			mkdir($new_uploadFileDir_gbk,0777,true);
		}
		copy($uploadFile, $new_uploadFileNeme_gbk);
		//将文件路径存入数据库
		$name = $new_dir.'规划表.'.$fileType;
		$Type = 10;
		
		$data->fileSize = $new_dir;
		$data->fileType = $Type;
		$data->fileName = $name;
		$data->fileData = $new_uploadFileNeme_gbk;
		$data->type = $fileType;
		$sql = $data->add();
		$oreJingdu = 31;
/*********get one declaredata*********/
		
		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{

			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			if($numberValue == 30) $oreJingdu = $currentRow;
			if($numberValue==32) $currentRow_class = $currentRow;
			if($numberValue==33) $currentRow_orename = $currentRow;
			if($numberValue==34) $currentRow_oretype = $currentRow;
			if($numberValue==37) $currentRow_orebaoyou = $currentRow;
			if($numberValue==38) $currentRow_orekaicai = $currentRow;
			if($numberValue==43) $currentRow_methods = $currentRow;
			if($numberValue==57) $currentRow_35_kaicaihuicailv = $currentRow;			
			if($numberValue==71) $currentRow_35_xuankuanghuishoulv = $currentRow;
			if($numberValue==85) $currentRow_35_shijishengchanguimo = $currentRow;
			if($numberValue==99) $currentRow_35_zongchanzhi = $currentRow;
			if($numberValue==113) $currentRow_35_zonglishui = $currentRow;
			if($numberValue==127) $currentRow_35_qiyelirun = $currentRow;
			//原来的excel数据不完整，没有这段
			if($numberValue==150) $currentRow_xq_baoyou = $currentRow;
			if($numberValue==166) $currentRow_xq_kaicai = $currentRow;
			if($numberValue==9999||$numberValue==10000||$numberValue==10001)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$declaredata[$numberValue] = $value;
			}
			else
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$declaredata[$numberValue] = $value;
			}
		}
/*********get oresdata_type*********/
		$num = 1;
		$ore_num = 0;
		//取得矿种的数量
		while(1)
		{
			$address = $currentColumn.$currentRow_orename;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			if($value=='')
			{
				$num--;
				$ore_num = $num;//取得矿种个数
				break;
			}
			
			$num++;
			$currentColumn++;
		}
		$currentColumn = 'C';
		$num = 0;
		//如果有多的经纬度信息则取出来
		$k = 0;
		while(1)
		{
			$currentColumn++;
			$addr = $currentColumn.$oreJingdu;
			$value = $currentSheet[$Count]->getCell($addr)->getValue();
			if($value != '')
			{
				$jingwei[$k][0] = $value;
				$addr = $currentColumn.($oreJingdu+1);
				$jingwei[$k++][1] =  $currentSheet[$Count]->getCell($addr)->getValue();
			} else {
				break;
			}
		}


		$currentColumn = 'C';

		$baoyouBak = $currentRow_xq_baoyou;
		$kaicaiBak = $currentRow_xq_kaicai;
		//判断每个矿种的矿种类型
		for($k=$ore_num;$k>0;$k--)
		{
			$address = $currentColumn.$currentRow_oretype;
			$value = $currentSheet[$Count]->getCell($address)->getValue();

			// 矿种列别
			$ores[$num][1] = $value;
			// 矿种名称
			$address = $currentColumn.$currentRow_orename;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			$ores[$num][0] = $value;
			// 矿种类型
			$address = $currentColumn.$currentRow_class;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			$ores[$num][21] = $value;

			// 保有储量
			$address = $currentColumn.$currentRow_orebaoyou;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			$ores[$num][39] = $value;
			// 可采储量
			$address = $currentColumn.$currentRow_orekaicai;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			$ores[$num][40] = $value;
			
			$currentRow_xq_baoyou++;
			for($i=41;$i<=55;$i++)
			{
				$address = $currentColumn.$currentRow_xq_baoyou;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$ores[$num][$i] = $value;
				$currentRow_xq_baoyou++;
			}
			$currentRow_xq_kaicai++;
			for($i=56;$i<=70;$i++)
			{
				$address = $currentColumn.$currentRow_xq_kaicai;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$ores[$num][$i] = $value;
				$currentRow_xq_kaicai++;
			}
			$ores[$num][22] = $num;
			$currentColumn++;
			$num++;
			//两个下标
			$currentRow_xq_kaicai = $kaicaiBak;
			$currentRow_xq_baoyou = $baoyouBak;
		}
		

		
/*********get $Mining_methodsdata*********/
		$num = 1;
		for($currentColumn='C';$currentColumn<='G';$currentColumn++)
		{
			$address = $currentColumn.$currentRow_methods;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			$Mining_methodsdata[$num] = $value;
			$num++;
		}
		if ($Mining_methodsdata[1]=='磁选') $Mining_methodsdata[1] = 1;
		if ($Mining_methodsdata[2]=='重选') $Mining_methodsdata[2] = 1;
		if ($Mining_methodsdata[3]=='浮选') $Mining_methodsdata[3] = 1;
		if ($Mining_methodsdata[4]=='电选') $Mining_methodsdata[4] = 1;
/**********get 35_kaicaihuicailv********/
		$currentColumn='C';
		$currentRow_35_kaicaihuicailv++;
		$end = $currentRow_35_kaicaihuicailv+13;
		$num = 0;
		$data_35_kaicaihuicailv = array();
		for ($currentRow = $currentRow_35_kaicaihuicailv; $currentRow<=$end;$currentRow++)
		{
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();	
			$data_35_kaicaihuicailv[$num] = $value;
			$num++;
		}
/**********get 35_xuankuanghuishoulv********/
		$currentColumn='C';
		$currentRow_35_xuankuanghuishoulv++;
		$end = $currentRow_35_xuankuanghuishoulv+13;
		$num = 0;
		$data_35_xuankuanghuishoulv = array();
		for ($currentRow = $currentRow_35_xuankuanghuishoulv; $currentRow<=$end;$currentRow++)
		{
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();	
			$data_35_xuankuanghuishoulv[$num] = $value;
			$num++;
		}
/**********get 35_shijishengchanguimo********/
		$currentColumn='C';
		$currentRow_35_shijishengchanguimo++;
		$end = $currentRow_35_shijishengchanguimo+13;
		$num = 0;
		$data_35_shijishengchanguimo = array();
		for ($currentRow = $currentRow_35_shijishengchanguimo; $currentRow<=$end;$currentRow++)
		{
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();	
			$data_35_shijishengchanguimo[$num] = $value;
			$num++;
		}
/**********get 35_zongchanzhi********/
		$currentColumn='C';
		$currentRow_35_zongchanzhi++;
		$end = $currentRow_35_zongchanzhi+13;
		$num = 0;
		$data_35_zongchanzhi = array();
		for ($currentRow = $currentRow_35_zongchanzhi; $currentRow<=$end;$currentRow++)
		{
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();	
			$data_35_zongchanzhi[$num] = $value;
			$num++;
		}
/**********get 35_zonglishui********/
		$currentColumn='C';
		$currentRow_35_zonglishui++;
		$end = $currentRow_35_zonglishui+13;
		$num = 0;
		$data_35_zonglishui = array();
		for ($currentRow = $currentRow_35_zonglishui; $currentRow<=$end;$currentRow++)
		{
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();	
			$data_35_zonglishui[$num] = $value;
			$num++;
		}
/**********get 35_qiyelirun********/
		$currentColumn='C';
		$currentRow_35_qiyelirun++;
		$end = $currentRow_35_qiyelirun+13;
		$num = 0;
		$data_35_qiyelirun = array();
		for ($currentRow = $currentRow_35_qiyelirun; $currentRow<=$end;$currentRow++)
		{
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();	
			$data_35_qiyelirun[$num] = $value;
			$num++;
		}
/**********************get data of Mining operation in accordance with the law**************************/
		$Count = 2;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
/*********Define variables*********/
		$credentialsData = array();//证件信息
		$documentData = array();//文件信息
		$taxData = array();//纳税信息
		$priceData = array();//价款信息
		$accidentData = array();//事故信息
		$safetyData = array();//安全设备信息
		$numberColumn='A';
		$credentialsNum=1;
		$documentNum=1;
		$taxDataNum=1;
		$priceDataNum=1;
		$accidentDataNum=1;
		$safetyDataNum=1;
/*********get data **********/
		$currentColumn='C';
		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			if ($numberValue==59) continue;//标题部分不读取数据
			if ($numberValue==70) continue;
			if ($numberValue==76) continue;
			if ($numberValue==81) continue;
			if ($numberValue==86) continue;
			if ($numberValue==93) continue;
/************get credentials data***************/
			if ($numberValue<=16)
			{	
				$num = 1;
				for($currentColumn_credentials='C';$currentColumn_credentials<='G';$currentColumn_credentials++)
				{
					$address = $currentColumn_credentials.$currentRow;
					$value = $currentSheet[$Count]->getCell($address)->getValue();				
					$credentialsData[$credentialsNum][$num] = $value;
					$num++;
				}
				$credentialsNum++;
			}
/************get Document approved information**************/
			else if ($numberValue<=58)
			{	
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$documentData[$documentNum] = $value;
				$documentNum++;
			}
/***********get tax information**********************/
			else if($numberValue<=69)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$taxData[$taxDataNum] = $value;
				$taxDataNum++;
			}
/***********get price information**********************/
			else if($numberValue<=75)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$priceData[$priceDataNum] = $value;
				$priceDataNum++; 
			}
/***********get accident information**********************/
			else if($numberValue<=90)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$accidentData[$accidentDataNum] = $value;
				$accidentDataNum++; 
			}
/***********get Safety equipment information**********************/
			else if($numberValue<=99)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$safetyData[$safetyDataNum] = $value;			
				$safetyDataNum++; 
			}			
		}
/***************************get information of Standardized management******************************/
		$Count = 3;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
/*********Define variables*********/
		$Institution_building = array();
		$System_improvement = array();
		$Training_system = array();
		$Number_training = array();
		$Training_funds = array();
		$Environmental_certification = array();
		$Quality_certification = array();
		$I_b_Num = 1;
		$S_i_Num = 1;
		$T_s_Num = 1;
		$N_t_Num = 1;
		$T_f_Num = 1;
		$E_c_Num = 1;
		$Q_c_Num = 1;
/*********get data **********/
		$currentColumn='C';
		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			if ($numberValue==1) continue;
			if ($numberValue==7) continue;
			if ($numberValue==20) continue;
			if ($numberValue==24) continue;
			if ($numberValue==38) continue;
/************get Institution building data***************/
			if ($numberValue<=6)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$Institution_building[$I_b_Num] = $value;
				$I_b_Num++;				
			}
/************get System improvement data***************/
			else if ($numberValue<=19)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$System_improvement[$S_i_Num] = $value;
				$S_i_Num++;				
			}
/************get Training system data***************/
			else if ($numberValue<=23)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$Training_system[$T_s_Num] = $value;
				$T_s_Num++;				
			}
/************get Number of training data***************/
			else if ($numberValue<=37)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$Number_training[$N_t_Num] = $value;
				$N_t_Num++;				
			}	
/************get Training funds data***************/
			else if ($numberValue<=51)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$Training_funds[$T_f_Num] = $value;
				$T_f_Num++;				
			}
/************get Environmental certification data***************/
			else if ($numberValue<=55)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$Environmental_certification[$E_c_Num] = $value;
				$E_c_Num++;				
			}
/************get Quality certification data***************/
			else if ($numberValue<=59)
			{
				$address = $currentColumn.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$Quality_certification[$Q_c_Num] = $value;
				$Q_c_Num++;				
			}			
		}
	//综合利用部分
		$Count = 4;
	// ********get sheet********
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
	/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
				// echo $allColumn;
	/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
	/*********Define variables*********/
		$currentColumn = 'C';
		$ColumnEnds = $ore_num+$currentColumn;
		$oreZonghe = array(); 
		// $c_u_ore;
		// $$complexdataArray;
		// $c_u_ore_xk_35;
		// $c_u_ore_kc_35;
		// $complex35Array;
		//每个矿种对应各种率
		//各种率的5-3在excel格式格式中的行位置信息
		//numberColumn = 'A'
		// $RowsTag=[2,3,4,18,32,46,60,74,88,102,116,130,144,158,172,186,200,214,228,242,249,256];

		// 对每个矿循环
		for($i=0; $i < $ore_num; $i++)
		{
			$oreIndex = $i;
			$oreZonghe[$oreIndex]['_o22'] = $i;
			// echo $currentColumn.'<br>';
			// if($i >= 3) exit();
			for($index=1; $index<=$allRow; $index++)
			{
				$addr = $numberColumn.$index;
				$number = '_'.$currentSheet[$Count]->getCell($addr)->getValue();
				$addr = $currentColumn.$index;
				$oreZonghe[$oreIndex][$number] = $currentSheet[$Count]->getCell($addr)->getValue();
				//取三率指标条件
				if($number == '_270')
				{
					$typeColumn = 'B';
					$valueColumn = 'C';
					//每个矿循环
					for($kk = $i; $kk>0; $kk--)
					{
						$typeColumn++;
						$valueColumn++;
						$typeColumn++;
						$valueColumn++;
					}
					for($ii=$index; $ii<=$index+20; $ii++)
					{
						$addr = $numberColumn.$ii;
						$number = $currentSheet[$Count]->getCell($addr)->getValue();
						$addr = $valueColumn.$ii;
						$oreZonghe[$oreIndex]['_'.$number] = $currentSheet[$Count]->getCell($addr)->getValue();

						$number += 21;
						$number = '_'.$number;
						$addr = $typeColumn.$ii;
						$value = $currentSheet[$Count]->getCell($addr)->getValue();
						$oreZonghe[$oreIndex][$number] = $value;
					}
					break;
				}
			}
			$currentColumn++;
		}

		//科技创新
		$Count = 5;
		//初始化$currentColumn
		$currentColumn = 'C';
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
		$allColumn = $currentSheet[$Count]->getHighestColumn();
		$allRow = $currentSheet[$Count]->getHighestRow(); 
		$invested_proportion = array();
		$invested_proportion_35 = array();
		$patent = array();
		$technical_staff = array();
		$i_p_Num = 1;
		$i_p_35_Num  = 1;
		$p_Num = 1;
		$t_s_Num = 1;

		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			if ($numberValue==5) continue;
			if ($numberValue==19) continue;
			if ($numberValue==22) continue;
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			/*********get invested_proportion **********/
			if ($numberValue<=4)
			{	
				$invested_proportion[$i_p_Num] = $value;
				$i_p_Num++;
			}
			/*********get invested_proportion_35 **********/
			else if ($numberValue<=18)
			{	
				$invested_proportion_35[$i_p_35_Num] = $value;
				$i_p_35_Num++;
			}
			/*********get patent **********/
			else if ($numberValue<=21)
			{	
				$patent[$p_Num] = $value;
				$p_Num++;
			}			
			/*********get technical_staff **********/
			else if ($numberValue<=26)
			{	
				$technical_staff[$t_s_Num] = $value;
				$t_s_Num++;
			}
		}
		
/***************************get information of Energy conservation******************************/
		$Count = 6;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
/*********Define variables*********/
	$power_consumption = array();
	$water_consumption = array();
	$energy_consumption = array();
	$wastewater_use = array();
	$waste_utilization = array();
	$sulfur_emissions = array();
	$power_consumption_35 = array();
	$water_consumption_35 = array();
	$energy_consumption_35 = array();
	$wastewater_use_35 = array();
	$waste_utilization_35 = array();
	$sulfur_emissions_35 = array();
	$p_c_Num = 1;
	$w_c_Num = 1;
	$e_c_Num = 1;
	$ww_u_Num = 1;
	$w_u_Num = 1;
	$s_e_Num = 1;
	$p_c_Num_35 = 1;
	$w_c_Num_35 = 1;
	$e_c_Num_35 = 1;
	$ww_u_Num_35 = 1;
	$w_u_Num_35 = 1;
	$s_e_Num_35 = 1;
/*********get data **********/
		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			if ($numberValue==4) continue;
			if ($numberValue==21) continue;
			if ($numberValue==38) continue;
			if ($numberValue==55) continue;
			if ($numberValue==73) continue;
			if ($numberValue==90) continue;
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			if ($numberValue<=3)
			{
				$power_consumption[$p_c_Num] = $value;
				$p_c_Num++;
			}
			else if ($numberValue<=17)
			{
				$power_consumption_35[$p_c_Num_35] = $value;
				$p_c_Num_35++;			
			}
			else if ($numberValue<=20)
			{
				$water_consumption[$w_c_Num] = $value;
				$w_c_Num++;			
			}
			else if ($numberValue<=34)
			{
				$water_consumption_35[$w_c_Num_35] = $value;
				$w_c_Num_35++;			
			}
			else if ($numberValue<=37)
			{
				$energy_consumption[$e_c_Num] = $value;
				$e_c_Num++;			
			}
			else if ($numberValue<=51)
			{
				$energy_consumption_35[$e_c_Num_35] = $value;
				$e_c_Num_35++;			
			}
			else if ($numberValue<=54)
			{
				$wastewater_use[$ww_u_Num] = $value;
				$ww_u_Num++;			
			}
			else if ($numberValue<=68)
			{
				$wastewater_use_35[$ww_u_Num_35] = $value;
				$ww_u_Num_35++;			
			}
			else if ($numberValue<=72)
			{
				$waste_utilization[$w_u_Num] = $value;
				$w_u_Num++;			
			}
			else if ($numberValue<=86)
			{
				$waste_utilization_35[$w_u_Num_35] = $value;
				$w_u_Num_35++;			
			}
			else if ($numberValue<=89)
			{
				$sulfur_emissions[$s_e_Num] = $value;
				$s_e_Num++;	
			}
			else if ($numberValue<=103)
			{
				$sulfur_emissions_35[$s_e_Num_35] = $value;
				$s_e_Num35++;			
			}
		}
/***************************get information of Environmental Protection******************************/
		$Count = 7;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
/*********Define variables*********/
		$coverage = array();
		$coverage_35 = array(); 
		$standards = array();

		
		$c_Num = 1;
		$c_35_Num = 1;
		$s_Num = 1;
/*********get data **********/
		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			if ($numberValue==4) continue;
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			if ($numberValue<=3)
			{	
				$coverage[$c_Num]=$value;
				$c_Num++;
			}
			else if ($numberValue<=17)
			{	
				$coverage_35[$c_35_Num]=$value;
				$c_35_Num++;
			}
			else if ($numberValue<=22)
			{	
				$standards[$s_Num]=$value;
				$s_Num++;
			}
		}
/***************************get information of Land reclamation******************************/
		$Count = 8;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
/*********Define variables*********/
		$reclamation_rate = array();
		$reclamation_rate_35 = array();
		$income = array();
		$income_35 = array();
		$investment = array();
		$investment_35 = array();
		
		$r_r_Num = 1;
		$r_r_35_Num = 1;
		$i_35_Num = 1;
		$iv_35_Num = 1;
/*********get data **********/
		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			if ($numberValue==4) continue;
			if ($numberValue==19) continue;
			if ($numberValue==34) continue;
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			if($numberValue<=3)
			{
				$reclamation_rate[$r_r_Num] = $value;
				$r_r_Num++;
			}
			else if ($numberValue<=17)
			{
				$reclamation_rate_35[$r_r_35_Num] = $value;
				$r_r_35_Num++;
			}
			else if ($numberValue==18) $income[1] = $value;
			else if ($numberValue<=32)
			{
				$income_35[i_35_Num] = $value;
				$i_35_Num++;
			}
			else if ($numberValue==33) $investment[1] = $value;
			else if ($numberValue<=47)
			{
				$investment_35[$iv_35_Num] = $value;
				$iv_35_Num++;
			}
		}
/***************************get information of Community harmony******************************/
		$Count = 9;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
/*********Define variables*********/
		$donation = array();
		$support = array();
		$employee = array();
		
		$d_Num = 1;
		$s_Num = 1;
		$e_Num = 1;
/*********get data **********/
		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			if ($numberValue==7) continue;
			if ($numberValue==13) continue;
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			if ($numberValue<=6)
			{
				$donation[$d_Num] = $value;
				$d_Num++;
			}
			else if ($numberValue<=12)
			{
				$support[$s_Num] = $value;
				$s_Num++;
			}
			else if ($numberValue<=15)
			{
				$employee[$e_Num] = $value;
				$e_Num++;
			}
		}
/***************************get information of Corporate Culture******************************/
		$Count = 10;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow(); 
/*********Define variables*********/
		$corporate_culture = array();
		
		$c_c_Num = 1;
/*********get data **********/
		for($currentRow = 1;$currentRow<=$allRow;$currentRow++)
		{
			$numberAddress = $numberColumn.$currentRow;
			$numberValue = $currentSheet[$Count]->getCell($numberAddress)->getValue();
			$address = $currentColumn.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
			$corporate_culture[$numberValue] = $value;
			$c_c_Num++;
		}
/***************************get information of Key projects******************************/
		$Count = 11;
/*********get sheet*********/
		$currentSheet[$Count] = $PHPExcel->getSheet($Count);
/*********get column sum*********/
		$allColumn = $currentSheet[$Count]->getHighestColumn();
//			echo $allColumn;
/*********get row sum*********/
		$allRow = $currentSheet[$Count]->getHighestRow();
//		echo $allRow;
/*********Define variables*********/
		$project = array();
		
		$p_Num = 1;
		$flag = 0;
/*********get data **********/
		for($currentRow = 2;$currentRow<=$allRow;$currentRow++)
		{
			$currentColumn_project='A';
			$address = $currentColumn_project.$currentRow;
			$value = $currentSheet[$Count]->getCell($address)->getValue();
//			echo $value;
//			if ($value = '') break;
			$num = 1;
			for($currentColumn_project='A';$currentColumn_project<='O';$currentColumn_project++)
			{
				$address = $currentColumn_project.$currentRow;
				$value = $currentSheet[$Count]->getCell($address)->getValue();
				$project[$p_Num][$num] = $value;
//				echo $value;
				$num++;
			}
			$p_Num++;
//			echo $project[$p_Num];
		}
	}
	@unlink ($uploadFile);
/***********************/	
	spl_autoload_register(__autoload);
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("添加申报信息" , "/minedata/AddPreData" , true);	    
    $smarty->setTitle('导入申报文件');
//	exit();
	$smarty->assign('declaredata',$declaredata);
	$smarty->assign('ores',$ores);
	$smarty->assign('Mining_methodsdata',$Mining_methodsdata);
	$smarty->assign('data_35_kaicaihuicailv',$data_35_kaicaihuicailv);
	$smarty->assign('data_35_xuankuanghuishoulv',$data_35_xuankuanghuishoulv);
	$smarty->assign('data_35_shijishengchanguimo',$data_35_shijishengchanguimo);
	$smarty->assign('data_35_zongchanzhi',$data_35_zongchanzhi);
	$smarty->assign('data_35_zonglishui',$data_35_zonglishui);
	$smarty->assign('data_35_qiyelirun',$data_35_qiyelirun);
	$smarty->assign('data_xq_baoyou',$data_xq_baoyou);
	$smarty->assign('data_xq_kaicai',$data_xq_kaicai);
	$smarty->assign('jingWei', $jingwei);
	
	$smarty->assign('credentialsData',$credentialsData);
	$smarty->assign('documentData',$documentData);
	$smarty->assign('taxData',$taxData);
	$smarty->assign('priceData',$priceData);
	$smarty->assign('accidentData',$accidentData);
	$smarty->assign('safetyData',$safetyData);

	$smarty->assign('Institution_building',$Institution_building);
	$smarty->assign('System_improvement',$System_improvement);
	$smarty->assign('Training_system',$Training_system);
	$smarty->assign('Number_training',$Number_training);
	$smarty->assign('Training_funds',$Training_funds);
	$smarty->assign('Environmental_certification',$Environmental_certification);
	$smarty->assign('Quality_certification',$Quality_certification);
	
	$smarty->assign('invested_proportion',$invested_proportion);
	$smarty->assign('invested_proportion_35',$invested_proportion_35);
	$smarty->assign('patent',$patent);
	$smarty->assign('technical_staff',$technical_staff);
	
	$smarty->assign('power_consumption',$power_consumption);
	$smarty->assign('water_consumption',$water_consumption);
	$smarty->assign('energy_consumption',$energy_consumption);
	$smarty->assign('wastewater_use',$wastewater_use);
	$smarty->assign('waste_utilization',$waste_utilization);
	$smarty->assign('sulfur_emissions',$sulfur_emissions);
	$smarty->assign('power_consumption_35',$power_consumption_35);
	$smarty->assign('water_consumption_35',$water_consumption_35);
	$smarty->assign('energy_consumption_35',$energy_consumption_35);
	$smarty->assign('wastewater_use_35',$wastewater_use_35);
	$smarty->assign('waste_utilization_35',$waste_utilization_35);
	$smarty->assign('sulfur_emissions_35',$sulfur_emissions_35);
	
	$smarty->assign('coverage',$coverage);
	$smarty->assign('coverage_35',$coverage_35);
	$smarty->assign('standards',$standards);
	
	$smarty->assign('reclamation_rate',$reclamation_rate);
	$smarty->assign('reclamation_rate_35',$reclamation_rate_35);
	$smarty->assign('income',$income);
	$smarty->assign('income_35',$income_35);
	$smarty->assign('investment',$investment);
	$smarty->assign('investment_35',$investment_35);
	
	$smarty->assign('donation',$donation);
	$smarty->assign('support',$support);
	$smarty->assign('employee',$employee);
	
	$smarty->assign('corporate_culture',$corporate_culture);
	
	$smarty->assign('project',$project);
	
	$smarty->assign('oredataand35Array', $oreZonghe);
	// $smarty->assign('c_u_ore',$c_u_ore);
	// $smarty->assign('complexdataArray',$complexdataArray);
	// $smarty->assign('c_u_ore_xk_35',$c_u_ore_xk_35);
	// $smarty->assign('c_u_ore_kc_35',$c_u_ore_kc_35);
	// $smarty->assign('complex35Array',$complex35Array);
	
	
	$MainapplyId = date("YmdHis",time());
	$smarty->assign('MainapplyId',$MainapplyId);
	$smarty->assign('mineid',$mineid);
	$smarty->assign('mark',$mark);
    $smarty->setTitle('导入规划文件');
    $smarty->assign("payMileageArray",$payMileageArray);
//	exit();
	$smarty->displaymother('minedata/ListExcelMineDetails.tpl');
}
?>