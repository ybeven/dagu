<?php
function SearchPreData($tag,$notice = null,$page=0){
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
	
	$pici=$_POST["pici"];
	$kaodian=$_POST["kaodian"];
	$kemu=$_POST["kemu"];
	// print_r($pici);
	// print_r($kaodian);
	if ($pici==null) {
		if ($kaodian==12||$kaodian==null) {
			if ($kemu==null) {
				$sql1 =  "SELECT * FROM shanxijianshe order by latestscore";
			}
			else
				$sql1 =  "SELECT * FROM shanxijianshe where course=$kemu order by latestscore";
		}
		else{
			if ($kemu==null) {
				$sql1 =  "SELECT * FROM shanxijianshe where kaodian=$kaodian order by latestscore";
			}
			else
				$sql1 =  "SELECT * FROM shanxijianshe where kaodian=$kaodian and course=$kemu order by latestscore";			
		}
	}
	if ($pici!=null) {
		if ($kaodian==12||$kaodian==null) {
			if ($kemu==null) {
				$sql1 =  "SELECT * FROM shanxijianshe where pici=$pici order by latestscore";
			}
			else
				$sql1 =  "SELECT * FROM shanxijianshe where pici=$pici and course=$kemu order by latestscore";
		}
		else{
			$sql1 =  "SELECT * FROM shanxijianshe where pici=$pici and course=$kemu and kaodian=$kaodian order by latestscore";
		}
	}


	// if ($pici==null&&$kaodian==null) {
	// 	$sql1 =  "SELECT * FROM shanxijianshe";
	// }
	// if($pici!= null && $kaodian!=null){ 
	// 	if ($kaodian==12) {
	// 		$sql1 =  "SELECT * FROM shanxijianshe where pici=$pici order by latestscore";
	// 	}
	// 	else{
 //      		$sql1 =  "SELECT * FROM shanxijianshe where pici=$pici and kaodian=$kaodian order by latestscore";
 //      	}
 //      		// $a = "pici = $pici";
 //    	}
	// if($pici!=null &&$kaodian==null){ 
 //      		$sql1 =  "SELECT * FROM shanxijianshe where pici=$pici order by latestscore";
 //    	}
 //    if($pici==null &&$kaodian!=null){ 
 //      		$sql1 =  "SELECT * FROM shanxijianshe where kaodian=$kaodian order by latestscore";
 //    	}	
	
	// print_r($sql1);
	

	// $enterpriseName=$_POST["enterpriseName"];
	// if($enterpriseName != null){ 
 //      $b = " and mine.enterprise_name like '%$enterpriseName%'";} 
	  
	// $expertName=$_POST["expertName"];
	// if($expertName != null){ 
 //      $c = " and expert.expert_name like '%$expertName%'";
	//   }
	  
	// $expertTime=$_POST["expertTime"];
	// if($expertTime != null){ 
 //      $d = " and expert.expert_time = '$expertTime'";}
 //      //修改
 //    $shijiquhua = $_POST["shijiquhua"];
 //    if ($shijiquhua != null) {
 //    	$g = " and mine.shijiquhua like '%$shijiquhua%'";
 //    }
	//   $xianjiquhua = $_POST["xianjiquhua"];
 //    if ($xianjiquhua != null) {
 //    	$h = " and mine.xianjiquhua like '%$xianjiquhua%'";
 //    }
 //    $orename = $_POST["orename"];
 //    if ($orename != null) {
 //    	$i = " and mine.orename like '%$orename%'";
 //    }//修改结束
	//   $e = " and expert.isshenbao = 1 ";
	  
	//   $f = " ORDER BY mine.id";
	  
	//   $sql = "SELECT mine.id as id,mine.mine_name as mineName, mine.enterprise_name as enterpriseName, 
	//          mine.enterpriseproperty as enterpriseProperty, mine.minescale as mineScale,mine.shijiquhua as shijiquhua,
	//          mine.xianjiquhua as xianjiquhua,mine.orename as orename,
	// 		  expert.expert_name as experName, expert.expert_time as expertTime
	// 		  FROM  mine,expert 
	// 		  where mine.id = expert.mine_id  ";
	//   $sql .=$g; 
	//   $sql .=$h; 
	//   $sql .=$i; 	  
	//   $sql .=$a; 
	//   $sql .=$b; 
	//   $sql .=$c; 
	//   $sql .=$d; 
	//   $sql .=$e; 
	//   $sql .=$f;
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
    $crumb->visitNewPage("查看成绩" , "predata/SearchPreData" , true);
	$smarty->setTitle('查看成绩');
	$smarty->displayMother('predata/SearchPreData.tpl');
}
?>