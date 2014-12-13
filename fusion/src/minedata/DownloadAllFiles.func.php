<?php		
function DownloadAllFiles($mineid,$notice=null){
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
 $sql1=  "select * from file where mine_id=$mineid AND (file_type = 1 or file_type = 2 or file_type = 3 or file_type = 4 or file_type = 5 or file_type = 6 or file_type = 7)";  
 
$result=  mysql_query($sql1);  
if(!$result) die("error:mysql query");  
$num=mysql_num_rows($result);  
if($num<1) die("error:no this recorder");  
for($i=0; $i<$num; $i++){
	$data=mysql_result($result,$i,"file_data");  //文件存储路径
	$type=mysql_result($result,$i,"file_type");  
	$name=mysql_result($result,$i,"file_name"); 
	 
	$file_name=mb_convert_encoding($name,"GBK","auto");

	$file_dir=mb_convert_encoding($data,"GBK","auto");//$data;
	$filePath = $file_dir;
	$fileName = $file_name;
	//$attachfile = $attachmentDir . $val['filepath'];    //获取原始文件路径
	$zip->addFile($filePath, basename($fileName));
	
}


$zip->close();
header("Cache-Control: public");   
header("Content-Description: File Transfer");   
header('Content-disposition: attachment; filename='.basename($filename)); //文件名  
header("Content-Type: application/zip"); //zip格式的  
header("Content-Transfer-Encoding: binary");    //告诉浏览器，这是二进制文件   
header('Accep-Length: '. filesize($filename));    //告诉浏览器，文件大小  
@readfile($filename);
@unlink($filename);

        exit; 



}
?>