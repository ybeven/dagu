<?php		
function DownloadAllFile($mineid,$notice=null){
	global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	if($notice!="auto")notice($notice);
	
	if(!isset($mineid) or $mineid=="") die("error:mineid none");  //定位记录,读出 
	$conn=mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');   
    mysql_select_db('greenmine',$conn) or die(mysql_error($conn));
	mysql_query("SET NAMES 'utf8'");
	$sql="select file_name,file_size,file_type,id,type from file where file.mine_id=$mineid";
	$mArray = mysql_query($sql,$conn) or die(mysql_error());
	$MArray = array();
	//$type = array();
	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
		
		$MArray[$i][0] = $m['file_name'];
	    $MArray[$i][1] = $m['file_size'];
		$MArray[$i][2] = $m['file_type'];
		$MArray[$i][3] = $m['id'];
		$MArray[$i][4] = mb_convert_encoding($m['file_data'],"utf8","auto");
		$MArray[$i][5] = $m['type'];
		//$type = $m['type'];
	}
$zip = new ZipArchive(); 
$filename = $mineid.'.zip';
    if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {  
        exit('无法打开文件，或者文件创建失败');  
    }  
 $sql1=  "select * from file where mine_id=$mineid AND (file_type = 8 or file_type = 9 or file_type = 10 or file_type = 50)";  
 
$result=  mysql_query($sql1);  
if(!$result) die("error:mysql query");  
$num=mysql_num_rows($result);  
if($num<1) die("error:no this recorder");  
for($i=0; $i<$num; $i++){
	$data=mysql_result($result,$i,"file_data");  //文件存储路径
	$type=mysql_result($result,$i,"file_type");  
	$name=mysql_result($result,$i,"file_name"); 
	//mysql_close($conn);  
	$file_name=mb_convert_encoding($name,"GBK","auto");

	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
	$filePath = $file_dir;
	$fileName = $file_name;
	//$attachfile = $attachmentDir . $val['filepath'];    //获取原始文件路径
	$zip->addFile($filePath, basename($fileName));
	// , basename($fileName)
}

//  $sql1=  "select * from file where mine_id=$mineid AND file_type = 9";  
// $result=  mysql_query($sql1);  
// if(!$result) die("error:mysql query");  
// $num=mysql_num_rows($result);  
// if($num<1) die("error:no this recorder");  
// for($i=0; $i<$num; $i++){
// 	$data=mysql_result($result,$i,"file_data");  //文件存储路径
// 	$type=mysql_result($result,$i,"file_type");  
// 	$name=mysql_result($result,$i,"file_name"); 
// 	//mysql_close($conn);  
// 	$file_name=$name;
// 	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
// 	$filePath = $file_dir;
// 	$fileName = $file_name;
// 	//$attachfile = $attachmentDir . $val['filepath'];    //获取原始文件路径
// 	$zip->addFile($filePath, basename($fileName));
// 	// , basename($fileName)
// }
$zip->close();

// Header("Content-type:application/octet-stream ");
// Header("Accept-Ranges:bytes ");
// Header("Accept-Length:   " . filesize($filePath));
// Header("Content-Disposition:   attachment;   filename= " . $filename);  

//$flength = filesize($filename)+(1024-filesize($filename)%1024);
header("Cache-Control: public");   
header("Content-Description: File Transfer");   
header('Content-disposition: attachment; filename='.basename($filename)); //文件名  
header("Content-Type: application/zip"); //zip格式的  
header("Content-Transfer-Encoding: binary");    //告诉浏览器，这是二进制文件   
header('Accep-Length: '. filesize($filename));    //告诉浏览器，文件大小  
@readfile($filename);
@unlink($filename);

// $flength = filesize($filename)+(1024-filesize($filename)%1024);//文件大小  
//         header('Content-Description: File Transfer');  
//         header('Content-Type: application/octet-stream');  
//         header('Content-Disposition: attachment; filename=' . basename($filename));  
//         header('Content-Transfer-Encoding: binary');  
//         header('Expires: 0');  
//         header('Cache-Control: must-revalidate, post-check=0, pre-check=0');  
//         header('Pragma: public');  
//         header('Content-Length: ' . filesize($flength));  
//         @ readfile($filename);//下载打包压缩文件  
//         @ unlink($filename);//删除压缩的文件
        exit; 






        // header("Cache-Control: public");   
// header("Content-Description: File Transfer");   
// header('Content-disposition: attachment; filename='.basename($filename)); //文件名  
// header("Content-Type: application/zip"); //zip格式的  
// header("Content-Transfer-Encoding: binary");    //告诉浏览器，这是二进制文件   
// header('Content-Length: '. filesize($filename));    //告诉浏览器，文件大小  
// @readfile($filename);

	// 	$file_name=$name;
// 	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
// 	// if   (!file_exists($file_dir))   {   //检查文件是否存在  
//  // 			 echo   "文件找不到";  
//  //  			exit;    
//  //  	}   else   {  
// 	$filePath = $file_dir;//此处给出你下载的文件在服务器的什么地方   
//     $fileName = $file_name;   
//     //此处给出你下载的文件名   
//     $file = fopen($filePath, "rb"); //   打开文件
// Header("Content-type:application/octet-stream ");
// Header("Accept-Ranges:bytes ");
// Header("Accept-Length:   " . filesize($filePath));
// Header("Content-Disposition:   attachment;   filename= " . $fileName);   
       
//     //   输出文件内容   
//     echo fread($file, filesize($filePath));   
//     fclose($file);  

// $filename = $mineid.'.zip'; //最终生成的文件名（含路径）  
// if(!file_exists($filename)){  
//     //重新生成文件  
//     $zip = new ZipArchive();//使用本类，linux需开启zlib，windows需取消php_zip.dll前的注释  
//     if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {  
//         exit('无法打开文件，或者文件创建失败');  
//     }  


//     foreach( $datalist as $val){  
//         $attachfile = $attachmentDir . $val['filepath'];    //获取原始文件路径  
//         if(file_exists($attachfile)){  
//             $zip->addFile( $attachfile , basename($attachfile));//第二个参数是放在压缩包中的文件名称，如果文件可能会有重复，就需要注意一下  
//         }  
//     }  
//     $zip->close();//关闭  
// }  
// if( !file_exists($filename)){  
//     exit("无法找到文件"); //即使创建，仍有可能失败。。。。  
// }  
// header("Cache-Control: public");   
// header("Content-Description: File Transfer");   
// header('Content-disposition: attachment; filename='.basename($filename)); //文件名  
// header("Content-Type: application/zip"); //zip格式的  
// header("Content-Transfer-Encoding: binary");    //告诉浏览器，这是二进制文件   
// header('Content-Length: '. filesize($filename));    //告诉浏览器，文件大小  
// @readfile($filename);



// //矿山所在省级国土资源主管部门审核意见  下载
//      $sql=  "select * from file where mine_id=$mineid AND file_type = 9";  
// 	$result=  mysql_query($sql);  
// 	if(!$result) die("error:mysql query");  
// 	$num=mysql_num_rows($result);  
// 	if($num<1) die("error:no this recorder");  
// 	$data=mysql_result($result,0,"file_data");  //文件存储路径
// 	$type=mysql_result($result,0,"file_type");  
// 	$name=mysql_result($result,0,"file_name"); 
// 	//mysql_close($conn);  

// 	$file_name=$name;
// 	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
// 	// if   (!file_exists($file_dir))   {   //检查文件是否存在  
//  // 			 echo   "文件找不到";  
//  //  			exit;    
//  //  	}   else   {  
// 	$filePath = $file_dir;//此处给出你下载的文件在服务器的什么地方   
//     $fileName = $file_name;   
//     //此处给出你下载的文件名   
//     $file = fopen($filePath, "rb"); //   打开文件
// Header("Content-type:application/octet-stream ");
// Header("Accept-Ranges:bytes ");
// Header("Accept-Length:   " . filesize($filePath));
// Header("Content-Disposition:   attachment;   filename= " . $fileName);   
       
//     //   输出文件内容   
//     echo fread($file, filesize($filePath));   
//     fclose($file);  

































//打包压缩所有附件
	// $filename = UPLOADPATH.$mineid.'.zip'; 
	// if(strpos($type,',') !== false){  
 //            $arr = explode(',',$type);  //将类型字符拆分成数组  
 //            $dataList = array();  
 //            foreach($arr as $k => $v ){  
 //                $data = $this->getFilesByObjId($mineid, $v);  
 //                $dataList = array_merge($dataList, $data);  //合并附件数组信息  
 //            }  
 //        }else {  
 //            $dataList = $this->getFilesByObjId($mineid, $type);  
 //        } 
        //     foreach( $datalist as $val){  
//         $attachfile = $attachmentDir . $val['filepath'];    //获取原始文件路径  
//         if(file_exists($attachfile)){  
//             $zip->addFile( $attachfile , basename($attachfile));//第二个参数是放在压缩包中的文件名称，如果文件可能会有重复，就需要注意一下  
//         }  
//     }  
//     $zip->close();//关闭  
// } 

        // $zip = new ZipArchive(); 
        // if ($zip->open($filename, ZIPARCHIVE :: OVERWRITE) !== TRUE){  
        //     exit("<script>alert('下载的文件不存在');history.back();</script>");  
        // }  
        // foreach ($dataList as $val) {  
  
        //         $attachfile = UPLOADPATH .$val['serviceType'] . '/' . $val['newName']; //获取原始文件路径  
  
        //         if (file_exists($attachfile)) {  
        //             $zip->addFile($attachfile, basename($val['originalName'])); //第二个参数是放在压缩包中的文件名称  
        //         }else {  
        //             echo "<script>alert('下载的文件不存在');history.back();</script>";  
        //         }  
        // }  
        //  $zip->close(); 
        //  if (!file_exists($filename)) {  
        //     exit("<script>alert('下载的文件不存在');history.back();</script>");//即使创建，仍有可能失败。。。。  
        // }  
        // $flength = filesize($filename)+(1024-filesize($filename)%1024);//文件大小  
        // header('Content-Description: File Transfer');  
        // header('Content-Type: application/octet-stream');  
        // header('Content-Disposition: attachment; filename=' . basename($filename));  
        // header('Content-Transfer-Encoding: binary');  
        // header('Expires: 0');  
        // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');  
        // header('Pragma: public');  
        // header('Content-Length: ' . filesize($flength));  
        // @ readfile($filename);//下载打包压缩文件  
        // @ unlink($filename);//删除压缩的文件
        // exit; 



// 	//矿山所在地市（县）级国土资源主管部门审核意见  下载
//     $sql1=  "select * from file where mine_id=$mineid AND file_type = 8";  
// 	$result=  mysql_query($sql1);  
// 	if(!$result) die("error:mysql query");  
// 	$num=mysql_num_rows($result);  
// 	for($i=0; $i<$num; $i++){
// 	//if($num<1) die("error:no this recorder");  
// 	$data=mysql_result($result,0,"file_data");  //文件存储路径
// 	$type=mysql_result($result,0,"file_type");  
// 	$name=mysql_result($result,0,"file_name"); 
// 	//mysql_close($conn);  

// 	$file_name=$name;
// 	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
// 	// if   (!file_exists($file_dir))   {   //检查文件是否存在  
//  // 			 echo   "文件找不到";  
//  //  			exit;    
//  //  	}   else   {  
// 	$filePath = $file_dir;//此处给出你下载的文件在服务器的什么地方   
//     $fileName = $file_name;   
//     //此处给出你下载的文件名   
//       }
// $file = fopen($filePath, "rb"); //   打开文件
// Header("Content-type:application/octet-stream ");
// Header("Accept-Ranges:bytes ");
// Header("Accept-Length:   " . filesize($filePath));
// Header("Content-Disposition:   attachment;   filename= " . $fileName);   
       
//     //   输出文件内容   
//     echo fread($file, filesize($filePath));   
//     fclose($file);



// //矿山所在省级国土资源主管部门审核意见  下载
//      $sql=  "select * from file where mine_id=$mineid AND file_type = 9";  
// 	$result=  mysql_query($sql);  
// 	if(!$result) die("error:mysql query");  
// 	$num=mysql_num_rows($result);  
// 	if($num<1) die("error:no this recorder");  
// 	$data=mysql_result($result,0,"file_data");  //文件存储路径
// 	$type=mysql_result($result,0,"file_type");  
// 	$name=mysql_result($result,0,"file_name"); 
// 	//mysql_close($conn);  

// 	$file_name=$name;
// 	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
// 	// if   (!file_exists($file_dir))   {   //检查文件是否存在  
//  // 			 echo   "文件找不到";  
//  //  			exit;    
//  //  	}   else   {  
// 	$filePath = $file_dir;//此处给出你下载的文件在服务器的什么地方   
//     $fileName = $file_name;   
//     //此处给出你下载的文件名   
//     $file = fopen($filePath, "rb"); //   打开文件
// Header("Content-type:application/octet-stream ");
// Header("Accept-Ranges:bytes ");
// Header("Accept-Length:   " . filesize($filePath));
// Header("Content-Disposition:   attachment;   filename= " . $fileName);   
       
//     //   输出文件内容   
//     echo fread($file, filesize($filePath));   
//     fclose($file);  

// //国土资源部审核（备案）意见  下载
// 	$sql=  "select * from file where mine_id=$mineid AND file_type = 10";  
// 	$result=  mysql_query($sql);  
// 	if(!$result) die("error:mysql query");  
// 	$num=mysql_num_rows($result);  
// 	if($num<1) die("error:no this recorder");  
// 	$data=mysql_result($result,0,"file_data");  //文件存储路径
// 	$type=mysql_result($result,0,"file_type");  
// 	$name=mysql_result($result,0,"file_name"); 
// 	//mysql_close($conn);  

// 	$file_name=$name;
// 	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
// 	// if   (!file_exists($file_dir))   {   //检查文件是否存在  
//  // 			 echo   "文件找不到";  
//  //  			exit;    
//  //  	}   else   {  
// 	$filePath = $file_dir;//此处给出你下载的文件在服务器的什么地方   
//     $fileName = $file_name;   
//     //此处给出你下载的文件名   
//     $file = fopen($filePath, "rb"); //   打开文件
// Header("Content-type:application/octet-stream ");
// Header("Accept-Ranges:bytes ");
// Header("Accept-Length:   " . filesize($filePath));
// Header("Content-Disposition:   attachment;   filename= " . $fileName);   
       
//     //   输出文件内容   
//     echo fread($file, filesize($filePath));   
//     fclose($file);  
// //其他附件 下载
//     $sql=  "select * from file where mine_id=$mineid AND file_type = 50";  
// 	$result=  mysql_query($sql);  
// 	if(!$result) die("error:mysql query");  
// 	$num=mysql_num_rows($result);  
// 	if($num<1) die("error:no this recorder");  
// 	$data=mysql_result($result,0,"file_data");  //文件存储路径
// 	$type=mysql_result($result,0,"file_type");  
// 	$name=mysql_result($result,0,"file_name"); 
// 	//mysql_close($conn);  

// 	$file_name=$name;
// 	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
// 	// if   (!file_exists($file_dir))   {   //检查文件是否存在  
//  // 			 echo   "文件找不到";  
//  //  			exit;    
//  //  	}   else   {  
// 	$filePath = $file_dir;//此处给出你下载的文件在服务器的什么地方   
//     $fileName = $file_name;   
//     //此处给出你下载的文件名   
//     $file = fopen($filePath, "rb"); //   打开文件
// Header("Content-type:application/octet-stream ");
// Header("Accept-Ranges:bytes ");
// Header("Accept-Length:   " . filesize($filePath));
// Header("Content-Disposition:   attachment;   filename= " . $fileName);   
       
//     //   输出文件内容   
//     echo fread($file, filesize($filePath));   
//     fclose($file);  

//     exit;   
  // }
}
?>