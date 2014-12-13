<?php
function mineRatio($page=0 , $notice=null){
    global $smarty;
	needLogin();
	$session = Session::start();
	
	
	
	$page = intval($page);
	if($page == 0){
		$page = isset($session->curUserPage)?$session->curUserPage:1;
	}
	$session->curUserPage = $page;
	
    $user = new User;
	$count = $user->count("SELECT COUNT(*) FROM `user`");
    $compager = compager($page, $count, ITEMS_PER_PAGE);
    $smarty->assign('compager', $compager);
	//$userArr = $user->getArray("SELECT * FROM `user` ORDER BY `id` ASC LIMIT {$compager['itemStart']}, {$compager['itemLimit']}");
	$userArr = $user->getArray("SELECT * FROM `user` ORDER BY `id` ASC ");
	notice($notice);
	
    $role = new Role;
    $roleArray = $role->getArray("SELECT * FROM `role` ORDER BY `id` ASC");
    foreach ($roleArray as $item) {
	$roleSelect[$item['id']] = $item['name'];
    }
    $ac = new AccessController;
	if(!$ac->can("数据统计管理" , $session->curUser)){
		?>		     
                     <script>alert('您无权进行数据统计管理!');history.back(-1);</script>;
                 <?php
                     return;
        }
//连接数据库查询数据显示部分。
$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
mysql_select_db('greenmine',$db) or die(mysql_error($db));
//使用utf-8编码;
mysql_query("set names 'utf8'"); 
//查询
//$sql = "SELECT * FROM `basedata` where basedata_resources_total='234'";


//默认情况
$selected0="selected";
$sql="select count(*) from basedata";
$showright="绿色矿山";

//统计类型对应的sql语句
if($_POST[ratio]=="0") {
	$selected0="selected";
	$sql="select count(*) from basedata";
	$showright="绿色矿山";
} else $selected0=NULL;
if($_POST[ratio]=="1") {
	$selected1="selected";
	$sql="select count(*) from basedata where basedata_greenlvl='国家级'";
} else $selected1=NULL;
if($_POST[ratio]=="2") {
	$selected2="selected";
	$sql="select count(*) from basedata where basedata_greenlvl='国家级'";
	$showright="国家绿色级矿山";
} else $selected2=NULL;
if($_POST[ratio]=="3") {
	$selected3="selected";
	$sql="select count(*) from basedata where basedata_greenlvl='省级'";
	$showright="省级绿色矿山";
} else $selected3=NULL;
if($_POST[ratio]=="4") {
	$selected4="selected";
	$sql="select count(*) from basedata where basedata_greenlvl='市（州）级'";
	$showright="市（州）绿色级矿山";
} else $selected4=NULL;
if($_POST[ratio]=="5") {
	$selected5="selected";
	$sql="select count(*) from basedata where basedata_greenlvl='县级'";
	$showright="县级绿色矿山";
} else $selected5=NULL;




$result = mysql_query($sql);
$row=mysql_fetch_row($result);
//echo $row[0];

//从数据库表provincevalue中取出全省矿山数量
$sql_mineAll="select mineAll from provincevalue ";
$result_mineAll= mysql_query($sql_mineAll);
$row_mineAll=mysql_fetch_row($result_mineAll);
//echo $row_mineAll[0];


//饼状图

$datay[0]=$row[0];
$datay[1]=$row_mineAll[0];
$datay[1]=$other=$datay[1]-$datay[0];
include_once ("jpgraph/jpgraph.php");
include_once ("jpgraph/jpgraph_pie.php");
include_once ("jpgraph/jpgraph_pie3d.php");    //引用3D饼图PiePlot3D对象所在的类文件
$graph = new PieGraph(700,460,'auto');     //创建画布
$graph->SetShadow();       //设置画布阴影
$graph->title->Set("全省矿山统计");


$graph->title->SetFont(FF_SIMSUN,FS_BOLD);    //设置标题字体
$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL);    //设置图例字体
$p1 = new PiePlot3D($datay);      //创建3D饼形图对象
$p1->SetLegends(array($showright."一共".$datay[0]."座","非".$showright."一共".$other."座"));
$p1->SetSliceColors(array('#00DB00','#FF5809'));
$targ=array("pie3d_csimex1.php?v=1","pie3d_csimex1.php?v=2","pie3d_csimex1.php?v=3",
    "pie3d_csimex1.php?v=4","pie3d_csimex1.php?v=5","pie3d_csimex1.php?v=6");
$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$p1->SetCSIMTargets($targ,$alts);

$p1->SetCenter(0.4,0.5);      //设置饼形图所在画布的位置
$graph->Add($p1);       //将3D饼图形添加到图像中
 //输出图像到浏览器
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);
$graph->Stroke(BASE_PATH.'/graph1.png');  
$picture='/graph1.png';








    //记录显示矿山状态
	$smarty->assign('mineName', $mineName);

	
	//统计指标下拉框的记录显示状态
	$smarty->assign('selected0', $selected0);
	$smarty->assign('selected1', $selected1);
	$smarty->assign('selected2', $selected2);
	$smarty->assign('selected3', $selected3);
	$smarty->assign('selected4', $selected4);
	$smarty->assign('selected5', $selected5);
	$smarty->assign('selected6', $selected6);
	$smarty->assign('selected7', $selected7);
    
	//传递矿种过去。。。$minerals[$minerali]
	$smarty->assign('m0', $minerals[$minerali]);
	$smarty->assign('m1', $minerals[$minerali+1]);
	$smarty->assign('m2', $minerals[$minerali+2]);
	$smarty->assign('m3', $minerals[$minerali+3]);
	$smarty->assign('m4', $minerals[$minerali+4]);
	$smarty->assign('m5', $minerals[$minerali+5]);
   
    ////类别下拉框记录 
	$smarty->assign('tselected1', $tselected1);
	$smarty->assign('tselected2', $tselected2);
	$smarty->assign('tselected3', $tselected3);
	$smarty->assign('tselected4', $tselected4);
	
	
	$smarty->assign('button', $button);
    $smarty->assign('roleSelect' , $roleSelect);
    $smarty->assign('roleArray' , $roleArray);
    $smarty->assign('user', $user);
    $smarty->assign('userArr', $userArr);
	$smarty->assign('index', $index);
	
	$smarty->assign('indexname', $indexname);
	$smarty->assign('un', $un);
	$smarty->assign('datay', $datay);
	$smarty->assign('title', $title);
	$smarty->assign('year', $year);
	$smarty->assign('minerals', $minerals);
	$smarty->assign('minerali', $minerali);
    $smarty->assign('title', $title);
	$smarty->assign('picture', $picture);
    $smarty->setTitle('数据统计');
    $smarty->displayMother('gragh/mineRatio.tpl');
}














?>






