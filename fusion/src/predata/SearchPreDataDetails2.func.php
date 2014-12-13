<?php
function SearchPreDataDetails2($tag,$notice = null,$page=0){
	global $smarty;
	needLogin();
	$session=Session::start();
	if($notice!="auto")notice($notice);
	$ac = new AccessController;
	if(!$ac->can("项目信息查询" , $session->curUser)){
		?>		     
                     <script>alert('您无权进行项目信息查询!');history.back(-1);</script>;
                 <?php
                     return;
        }
	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	
	$idcard=$_POST["idcard"];
	$course=$_POST["course"];
	// print_r("skflsafjsf");
	// print_r($examcardnum);
	if ($idcard!=null&&$course!=null) {
		$sql1 =  "SELECT * FROM shanxijianshe where idcard='$idcard' and course='$course'";
		print_r($sql1);
		$mArray = mysql_query($sql1,$db) or die(mysql_error());
	    $MArray = array();
	    $kaodianCN = array('未标记','西安','咸阳','宝鸡','铜川','延安','榆林','商洛','渭南','安康','汉中','杨林' );
	    for($i=0;$m=mysql_fetch_array($mArray);$i++)
	    {	
		$MArray[$i][0] = $m['id'];
	    $MArray[$i][1] = $m['pici'];
		$MArray[$i][2] = $m['jigou'];
		$MArray[$i][3] = $m['examcardnum'];
		$MArray[$i][4] = $m['roomsite'];
		$MArray[$i][5] = $m['name'];
		$MArray[$i][6] = $m['sexual'];
		$MArray[$i][7] = $m['course'];
		$MArray[$i][8] = $m['idcard'];
		$MArray[$i][9] = $m['examchangci'];
		$MArray[$i][10] = $m['examroom'];
		$MArray[$i][11] = $m['examscore'];
		$MArray[$i][12] = $m['leitong'];
		$MArray[$i][13] = $m['latestscore'];
		$MArray[$i][14] = $kaodianCN[$m['kaodian']];
	    }
	}
	// print_r($sql1);
	if ($tag==1) {
		$smarty->assign('tag',$tag);
	}
	else
	{
		$tag = 0;
		$smarty->assign('tag',$tag);
	}
	$smarty->assign('MArray',$MArray);
	$crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("根据身份证号、考试科目号查询" , "predata/SearchPreDataDetails2" , true);
	$smarty->setTitle('查看成绩');
	$smarty->displayMother('predata/SearchPreDataDetails2.tpl');
}
?>