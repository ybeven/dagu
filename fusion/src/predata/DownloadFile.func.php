<?php		
function DownloadFile($mineid,$notice=null){
	global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	if($notice!="auto")notice($notice);
	
	$id=$mineid;       
	if(!isset($id) or $id=="") die("error:id none");  //定位记录,读出 
	$conn=mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');   
    mysql_select_db('greenmine',$conn) or die(mysql_error($conn));
	mysql_query("SET NAMES 'utf8'");
    $sql=  "select * from file where id=$id";  
	$result=  mysql_query($sql);  
	if(!$result) die("error:mysql query");  
	$num=mysql_num_rows($result);  
	if($num<1) die("error:no this recorder");  
	$data=mysql_result($result,0,"file_data");  //文件存储路径
	$type=mysql_result($result,0,"file_type");  
	$name=mysql_result($result,0,"file_name"); 
	mysql_close($conn);  

	$file_name=$name;
	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
	if   (!file_exists($file_dir))   {   //检查文件是否存在  
 			 echo   "文件找不到";  
  			exit;    
  	}   else   {  
	$filePath = $file_dir;//此处给出你下载的文件在服务器的什么地方   
    $fileName = $file_name;   
    //此处给出你下载的文件名   
    $file = fopen($filePath, "rb"); //   打开文件
Header("Content-type:application/octet-stream ");
Header("Accept-Ranges:bytes ");
Header("Accept-Length:   " . filesize($filePath));
Header("Content-Disposition:   attachment;   filename= " . $fileName);   
       
    //   输出文件内容   
    echo fread($file, filesize($filePath));   
    fclose($file);   
    exit;   
  }
}
?>