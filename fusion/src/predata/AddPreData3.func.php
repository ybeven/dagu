<?php
function AddPreData3($notice=null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	$curUser = $session->curUser;
	$ac = new AccessController;
	if(!$ac->can("申报信息管理" , $session->curUser)){
		?>		     
                   <script>alert('您无权添加申报信息!');history.back(-1);</script>;
        <?php
                    

                      return;	
        }
        if (!$ac->can("添加申报项目" , $session->curUser)){
                     	http302("/start/index/".urlencode('您无权添加申报项目'));
                     	return;
       }
            $smarty->addScriptDef(<<<SCRIPTDEF
                
		<link rel="stylesheet" type="text/css" href="/css/superTables.css" />
SCRIPTDEF
            );
$smarty->addScriptDef(<<<SCRIPTDEF

<script language="javascript" type="text/javascript" src="/js/superTables.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.superTable.js"></script>
SCRIPTDEF
	);
$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	  $sql = "select file_name,file_size,file_type,id,file_data from file where file.mine_id=65";

    $mArray = mysql_query($sql,$db) or die(mysql_error());
	$MArray = array();

	for($i=0;$m=mysql_fetch_array($mArray);$i++)
	{	
		$MArray[$i][0] = $m['file_name'];
	    $MArray[$i][1] = $m['file_size'];
		$MArray[$i][2] = $m['file_type'];
		$MArray[$i][3] = $m['id'];
		$MArray[$i][4] =mb_convert_encoding($m['file_data'],"utf-8","auto");
	}
	
	$smarty->assign('MArray',$MArray);
    $smarty->assign('mineid',$mineid);
//矿种
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


            $crumb = Crumb::getCrumb();
            $crumb->popAllLatitude();
            $crumb->visitNewPage("首页" , "/start" , false);
            $crumb->visitNewPage("导入宝鸡考点成绩" , "/predata/AddPreData3" , true);	    
//            $smarty->assign('mark',$mark);
            $smarty->setTitle('导入成绩');
            $smarty->assign("payMileageArray",$payMileageArray);
            $smarty->displaymother('predata/AddPreData3.tpl');
}
?>
