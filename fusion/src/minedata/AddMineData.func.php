<?php
function AddMineData($mineid,$notice=null){
global $smarty;
notice($notice);
	needLogin();
    $session=Session::start();
	$curUser = $session->curUser;
	$ac = new AccessController;
	if(!$ac->can("规划信息管理" , $session->curUser)){
		?>		     
                     <script>alert('您无权添加规划信息!');history.back(-1);</script>;
                 <?php
                     return;
        }
       
            $smarty->addScriptDef(<<<SCRIPTDEF
                
		<link rel="stylesheet" type="text/css" href="/css/superTables.css" />
		<link rel='stylesheet' href='/css/table.css' type="text/css" />
<link rel='stylesheet' href='/css/jquery-ui-1.8.16.custom.css' type="text/css" />
<link rel='stylesheet' href='/css/style.css' type="text/css" />
SCRIPTDEF
            );
$smarty->addScriptDef(<<<SCRIPTDEF
<script language="javascript" type="text/javascript" src="/js/jquery-1.6.2.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/superTables.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/superTables.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.superTable.js"></script>
SCRIPTDEF
	);

	$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	  $sql = "select file_name,file_size,file_type,id from file where file.mine_id=$mineid";

    $mArray = mysql_query($sql,$db) or die(mysql_error());
	$MArray = array();

	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
		$MArray[$i][0] = $m['file_name'];
	    $MArray[$i][1] = $m['file_size'];
		$MArray[$i][2] = $m['file_type'];
		$MArray[$i][3] = $m['id'];
	}
	$smarty->assign('MArray',$MArray);

            $crumb = Crumb::getCrumb();
            $crumb->popAllLatitude();
            $crumb->visitNewPage("首页" , "/start" , false);
            $crumb->visitNewPage("添加规划项目" , "/minedata/AddMineData" , true);
            
            $MClass = new Oretype;
            $sql = "select name from `oretype` where `type`='能源矿产'";
            $nyore = $MClass->getArray($sql,true);
			$sql = "select name from `oretype` where `type`='金属矿产'";
			$jsore = $MClass->getArray($sql,true);
			$sql = "select name from `oretype` where `type`='非金属矿产'";
			$fjsore = $MClass->getArray($sql,true);

			$sql = "select name from `oretype` where `type`='煤种'";
			$meiore = $MClass->getArray($sql,true);
			$smarty->assign('nyore',$nyore);
			$smarty->assign('jsore',$jsore);   
			$smarty->assign('fjsore',$fjsore);
			$smarty->assign('meiore',$meiore);
            
            $mark = 2;
	    $MainapplyId = date("YmdHis",time());
	    $smarty->assign('MainapplyId',$MainapplyId);
		$smarty->assign('mineid',$mineid);
	    
            $smarty->assign('mark',$mark);
            $smarty->setTitle('导入规划文件');
            $smarty->assign("payMileageArray",$payMileageArray);
            $smarty->displaymother('minedata/AddMineData.tpl');
}
?>
