<?php
function files1($mineid){
	global $smarty;
	needLogin();
    $session=Session::start();
	$curUser = $session->curUser;
	if($notice!="auto")notice($notice);
	$data = new File;
	$data->mineId=$mineid;
	$flag=0;
		$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
		mysql_select_db('greenmine',$db) or die(mysql_error($db));
		mysql_query("SET NAMES 'utf8'");

		$sql_3 = "select mine_name from mine WHERE id = $mineid";
		$file_id = mysql_query($sql_3,$db) or die(mysql_error());
		for($i=0;$m=mysql_fetch_array($file_id);$i++)
		{	
			$fileflag = $m['mine_name'];
		}
		$dir=mb_convert_encoding($fileflag,"GBK","auto");
		define('UPLOAD_DIR', $_SERVER["DOCUMENT_ROOT"].'/uploadDir/');
		$file_dir=UPLOAD_DIR.$dir;
		if(!file_exists($file_dir))   {   //检查文件是否存在  
 			 mkdir($file_dir,0777,true);    
			 echo '创建成功';
  	}
if ($_FILES["file1"]["error"]==0)
  		{
			$flag=1;
		$upload_name = $_FILES['file1']['name'];
		$fileName = mb_convert_encoding($_FILES['file1']['name'],"GBK","auto");
		$tmp_name = $_FILES['file1']['tmp_name'];
		$uploadFile = UPLOAD_DIR.$dir.'/'.$fileName;
		$uploadPath = UPLOAD_DIR.$fileflag.'/'.$upload_name;
		move_uploaded_file($tmp_name, $uploadFile);
        //设置超时限制时间,缺省时间为 30秒,设置为0时为不限时 
        $time_limit=60;
        set_time_limit($time_limit); // 中     
        //文件格式,名字,大小 
        $type=8; 
        $name=$upload_name;
        $size=$_FILES["file1"]["size"]; 
     
		$data->fileSize = $fileflag;
		$data->fileType = $type;
		$data->fileName = $name;
		$data->fileData = $uploadPath;
		$data->type = $_FILES["file1"]["type"];
		$sql = $data->add();
        set_time_limit(30); //恢复缺省超时设置
		}

		if ($_FILES["file2"]["error"]==0)
  		{
			$flag=1;
		$upload_name = $_FILES['file2']['name'];
		$fileName = mb_convert_encoding($_FILES['file2']['name'],"GBK","auto");
		$tmp_name = $_FILES['file2']['tmp_name'];
		$uploadFile = UPLOAD_DIR.$dir.'/'.$fileName;
		$uploadPath = UPLOAD_DIR.$fileflag.'/'.$upload_name;
		move_uploaded_file($tmp_name, $uploadFile);
        //设置超时限制时间,缺省时间为 30秒,设置为0时为不限时 
        $time_limit=60;
        set_time_limit($time_limit); // 中     
        //文件格式,名字,大小 
        $type=9; 
        $name=$upload_name;
        $size=$_FILES["file2"]["size"]; 
     
		$data->fileSize = $fileflag;
		$data->fileType = $type;
		$data->fileName = $name;
		$data->fileData = $uploadPath;
		$data->type = $_FILES["file2"]["type"];
		$sql = $data->add();
        set_time_limit(30); //恢复缺省超时设置
		}

		if ($_FILES["file3"]["error"]==0)
  		{
			$flag=1;
		$upload_name = $_FILES['file3']['name'];
		$fileName = mb_convert_encoding($_FILES['file3']['name'],"GBK","auto");
		$tmp_name = $_FILES['file3']['tmp_name'];
		$uploadFile = UPLOAD_DIR.$dir.'/'.$fileName;
		$uploadPath = UPLOAD_DIR.$fileflag.'/'.$upload_name;
		move_uploaded_file($tmp_name, $uploadFile);
        //设置超时限制时间,缺省时间为 30秒,设置为0时为不限时 
        $time_limit=60;
        set_time_limit($time_limit); // 中     
        //文件格式,名字,大小 
        $type=10; 
        $name=$upload_name;
        $size=$_FILES["file3"]["size"]; 
     
		$data->fileSize = $fileflag;
		$data->fileType = $type;
		$data->fileName = $name;
		$data->fileData = $uploadPath;
		$data->type = $_FILES["file3"]["type"];
		$sql = $data->add();
        set_time_limit(30); //恢复缺省超时设置
		}

		if ($_FILES["file4"]["error"]==0)
  		{
			$flag=1;
		$upload_name = $_FILES['file4']['name'];
		$fileName = mb_convert_encoding($_FILES['file4']['name'],"GBK","auto");
		$tmp_name = $_FILES['file4']['tmp_name'];
		$uploadFile = UPLOAD_DIR.$dir.'/'.$fileName;
		$uploadPath = UPLOAD_DIR.$fileflag.'/'.$upload_name;
		move_uploaded_file($tmp_name, $uploadFile);
        //设置超时限制时间,缺省时间为 30秒,设置为0时为不限时 
        $time_limit=60;
        set_time_limit($time_limit); // 中     
        //文件格式,名字,大小 
        $type=50; 
        $name=$upload_name;
        $size=$_FILES["file4"]["size"]; 
     
		$data->fileSize = $fileflag;
		$data->fileType = $type;
		$data->fileName = $name;
		$data->fileData = $uploadPath;
		$data->type = $_FILES["file4"]["type"];
		$sql = $data->add();
        set_time_limit(30); //恢复缺省超时设置
		}
		
if($flag==1)
			http302('/predata/AddFile/'.$mineid.'/'.urlencode('添加成功！'));  
		else
			http302('/predata/AddFile/'.$mineid.'/'.urlencode('添加失败！'));

		$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("添加文件" , "/predata/AddFiles" , true);
	
    $smarty->setTitle('导入规划文件');
    $smarty->displaymother('predata/AddFiles.tpl');
}
?>
