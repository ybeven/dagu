<?php		
function DeleteFile($mineid,$notice=null){
	global $smarty;
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
	$curUser = $session->curUser;
	//标志位设置为0
	$data = new File;
	$sql_2 = "select * from file WHERE id = $mineid";
	
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	$sql_3 = "select mine_id from file WHERE id = $mineid";
	$file_id = mysql_query($sql_3,$db) or die(mysql_error());
	
	for($i=0;$m=mysql_fetch_array($file_id);$i++)
	{	
		$fileflag = $m['mine_id'];
	}
	$dArray = $data->getArray($sql_2,true);
	foreach($dArray as $d)
	{
		$data->remove($d->id, false);
		unlink("/image/文件名");
	}
	http302('/predata/AddFile/'.$fileflag.'/'.urlencode('删除成功！'));
	}
?>