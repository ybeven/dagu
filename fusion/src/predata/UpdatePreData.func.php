<?php		
function UpdatePreData($id,$notice=null){
	needLogin();
	//session_cache_limiter('private'); 
	$session=Session::start();
	$curUser = $session->curUser;
	$logger = new CategoryLogger('log_definition');
    $curUser = $session->curUser;
	//保存基本信息和评审信息
    // $shanxi = new Shanxijianshe;
    // $flag=count($_POST[expertName]);
    $shanxijianshe =  new Shanxijianshe;
    $flag=count($_POST[picisearch]);
    // print_r($flag);
	for($i=0;$i<$flag;$i++)
	{

		$shanxijianshe->remove($_POST[id][$i], false);
	}    
	// sleep(3);
	for($i=0;$i<$flag;$i++) 
	{
		# code...
	

	    	$shanxi[$i] = new Shanxijianshe;
	    	// $shanxi[$i]->id=$_POST[id][$i];
	    	$shanxi[$i]->pici=$_POST[picisearch][$i];
	    	$shanxi[$i]->jigou=$_POST[peixunjigou][$i];
			$shanxi[$i]->examcardnum=$_POST[zhunkaozhenghao][$i];
			$shanxi[$i]->roomsite=$_POST[zuoweihao][$i];
			$shanxi[$i]->name=$_POST[xingming][$i];
			$shanxi[$i]->sexual=$_POST[xingbie][$i];
			$shanxi[$i]->course=$_POST[kaoshikemu][$i];
			$shanxi[$i]->idcard=$_POST[shenfenzhenghao][$i];
			$shanxi[$i]->examchangci=$_POST[kaoshichangci][$i];
			$shanxi[$i]->examroom=$_POST[kaochang][$i];
			$shanxi[$i]->examscore=$_POST[juanmianchengji][$i];
			$shanxi[$i]->leitong=$_POST[leitong][$i];
			$shanxi[$i]->latestscore=$_POST[zuizhongdefen][$i];
			$shanxi[$i]->kaodian=$_POST[kaodiansearch][$i];
			$shanxi[$i]->add();
        
		
	}
    echo "<script type='text/javascript'>alert('修改成功');</script>";
	http302('/start/');  
}
?>