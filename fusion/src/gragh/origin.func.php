<?php
function origin($notice=null){
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
            
        $pici = $_POST[picinumber];
        $db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
        mysql_select_db('greenmine',$db) or die(mysql_error($db));
        mysql_query("SET NAMES 'utf8'");
        $sql = "select distinct jigou from shanxijianshe where pici=$pici";

        $mArray = mysql_query($sql,$db) or die(mysql_error());
        $MArray = array();
        $flag = 0;

    for($i=0;$m=mysql_fetch_array($mArray);$i++)
    {   
        $MArray[$i] = $m['jigou'];
        $flag = $i;
    }
    $SMArray = array();
    for($i=0;$i<=$flag;$i++)
    {
        //各个培训机构总人数
        $sql1 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and jigou='$MArray[$i]'";
        // print_r("$sql1");
        //各个培训机构雷同卷人数
        $sql2 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and leitong!=0 and jigou='$MArray[$i]'";
        
        //卷面成绩

        //及格人数
        $sql3 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and examscore>=60 and jigou='$MArray[$i]'";
        //58-59分人数
        $sql4 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and examscore>=58 and examscore<=59 and jigou='$MArray[$i]'";
        //0分人数
        $sql5 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and examscore=0 and jigou='$MArray[$i]'";
        //最终成绩
        $sql6 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and latestscore>=60 and jigou='$MArray[$i]'";
        $sql7 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and latestscore>=58 and latestscore<=59 and jigou='$MArray[$i]'";
        $sql8 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and latestscore=0 and jigou='$MArray[$i]'";
        // for($j=0;$j<8;$j++)
        // {
        //     $msArray = mysql_query($sql)
        // }
        $SMArray[$i][0] = $MArray[$i];
        $msArray = mysql_query($sql1,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray);$j++)
        {   
        $SMArray[$i][1] = $m['sum'];//总人数
        }
        $msArray1 = mysql_query($sql2,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray1);$j++)
        {   
        $SMArray[$i][2] = $m['sum'];//雷同卷人数
        }
        $msArray2 = mysql_query($sql3,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray2);$j++)
        {   
        $SMArray[$i][3] = $m['sum'];//卷面成绩及格人数
        }
        $SMArray[$i][4] = $SMArray[$i][3]/$SMArray[$i][1];//通过率
        $msArray3 = mysql_query($sql4,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray3);$j++)
        {   
        $SMArray[$i][5] = $m['sum'];//58-59分人数
        }
        $msArray4 = mysql_query($sql5,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray4);$j++)
        {   
        $SMArray[$i][6] = $m['sum'];//0分人数
        }
        $msArray5 = mysql_query($sql6,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray5);$j++)
        {   
        $SMArray[$i][7] = $m['sum'];//最终成绩及格人数
        }
        $SMArray[$i][8] = $SMArray[$i][7]/$SMArray[$i][1];//最终成绩通过率
        $msArray6 = mysql_query($sql7,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray6);$j++)
        {   
        $SMArray[$i][9] = $m['sum'];//58-59分人数
        }
        $msArray7 = mysql_query($sql8,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray7);$j++)
        {   
        $SMArray[$i][10] = $m['sum'];//0分人数
        }
    }


//**************************************************************************************
//@auther yubo
//@email ybeven@163.com
//@brief order by kaodian
    //考点分类统计
    $sql = "select distinct kaodian from shanxijianshe where pici=$pici";

        $kdArray = mysql_query($sql,$db) or die(mysql_error());
        $KDArray = array();
        $flag = 0;

    for($i=0;$m=mysql_fetch_array($kdArray);$i++)
    {   
        $KDArray[$i] = $m['kaodian'];
        $flag = $i;
    }
    $KDMArray = array();
    $kaodianCN = array('未标记','西安','咸阳','宝鸡','铜川','延安','榆林','商洛','渭南','安康','汉中','杨林' );
    for($i=0;$i<=$flag;$i++)
    {
        //各个培训机构总人数
        $sql1 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and kaodian=$KDArray[$i]";
        // print_r("$sql1".'\n');
        //各个培训机构雷同卷人数
        $sql2 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and leitong!=0 and kaodian=$KDArray[$i]";
        
        //卷面成绩

        //及格人数
        $sql3 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and examscore>=60 and kaodian=$KDArray[$i]";
        //58-59分人数
        $sql4 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and examscore>=58 and examscore<=59 and kaodian=$KDArray[$i]";
        //0分人数
        $sql5 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and examscore=0 and kaodian=$KDArray[$i]";
        //最终成绩
        $sql6 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and latestscore>=60 and kaodian=$KDArray[$i]";
        $sql7 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and latestscore>=58 and latestscore<=59 and kaodian=$KDArray[$i]";
        $sql8 = "select count(examcardnum) as sum from shanxijianshe where pici=$pici and latestscore=0 and kaodian=$KDArray[$i]";
        // for($j=0;$j<8;$j++)
        // {
        //     $msArray = mysql_query($sql)
        // }
        // $kaodianCN[$m['kaodian']];
        $KDMArray[$i][0] = $kaodianCN[$KDArray[$i]];
        $msArray = mysql_query($sql1,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray);$j++)
        {   
        $KDMArray[$i][1] = $m['sum'];//总人数
        }
        $msArray1 = mysql_query($sql2,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray1);$j++)
        {   
        $KDMArray[$i][2] = $m['sum'];//雷同卷人数
        }
        $msArray2 = mysql_query($sql3,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray2);$j++)
        {   
        $KDMArray[$i][3] = $m['sum'];//卷面成绩及格人数
        }
        $KDMArray[$i][4] = $KDMArray[$i][3]/$KDMArray[$i][1];//通过率
        $msArray3 = mysql_query($sql4,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray3);$j++)
        {   
        $KDMArray[$i][5] = $m['sum'];//58-59分人数
        }
        $msArray4 = mysql_query($sql5,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray4);$j++)
        {   
        $KDMArray[$i][6] = $m['sum'];//0分人数
        }
        $msArray5 = mysql_query($sql6,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray5);$j++)
        {   
        $KDMArray[$i][7] = $m['sum'];//最终成绩及格人数
        }
        $KDMArray[$i][8] = $KDMArray[$i][7]/$KDMArray[$i][1];//最终成绩通过率
        $msArray6 = mysql_query($sql7,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray6);$j++)
        {   
        $KDMArray[$i][9] = $m['sum'];//58-59分人数
        }
        $msArray7 = mysql_query($sql8,$db) or die(mysql_error());
        for($j=0;$m=mysql_fetch_array($msArray7);$j++)
        {   
        $KDMArray[$i][10] = $m['sum'];//0分人数
        }
    }
    
    $smarty->assign('SMArray',$SMArray);
    $smarty->assign('KDMArray',$KDMArray);

            $crumb = Crumb::getCrumb();
            $crumb->popAllLatitude();
            $crumb->visitNewPage("首页" , "/start" , false);
            $crumb->visitNewPage("原始成绩统计" , "/graph/origin" , true);	    
//            $smarty->assign('mark',$mark);
            $smarty->setTitle('原始成绩统计');
            $smarty->assign("payMileageArray",$payMileageArray);
            $smarty->displaymother('gragh/origin.tpl');
}
?>
