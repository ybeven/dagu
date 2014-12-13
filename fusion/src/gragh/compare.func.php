<?php
function compare($page=0 , $notice=null){
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
//默认矿山和信息




//类别下拉框记录  
//if($_POST[province]==null) echo 'qiu'; 
//if($_POST[province]==NULL) echo 'jin'; 
//if($_POST[index]==NULL) echo 'han'; 
                                                                                                                                                                        
if($_POST[province]=="基本信息"||$_POST[province]=='') {$tselected2="selected";} else $tselected2=NULL;
if($_POST[province]=="综合利用") {$tselected3="selected";} else $tselected3=NULL;
if($_POST[province]=="节能减排") {$tselected4="selected";} else $tselected4=NULL;
if($_POST[province]=="其他指标") {$tselected1="selected";} else $tselected1=NULL;


//指标下拉的记录
//默认的
$data35="basedataSepareturnrate";$un="%";
if($_POST[index]=="矿山选矿回收率"||$_POST[index]==NULL) {$selected0="selected";$data35="basedataSepareturnrate";$un="%";} else $selected0=NULL;
if($_POST[index]=="矿山开采回采率") {$selected1="selected";$data35="basedataDigreturnrate";$un="%";} else $selected1=NULL;
if($_POST[index]=="实际生产规模") {$selected2="selected";$data35="basedataProduceScale";$un="吨/年";} else $selected2=NULL;
if($_POST[index]=="矿山企业总产值") {$selected3="selected";$data35="basedataValue";$un="万元";} else $selected3=NULL;
if($_POST[index]=="矿山企业利税") {$selected4="selected";$data35="basedataFee";$un="万元";} else $selected4=NULL;
if($_POST[index]=="矿山企业利润") {$selected5="selected";$data35="basedataProfit";$un="万元";} else $selected5=NULL;
if($_POST[index]=="矿产资源总回收率") {$selected6="selected";$data35="complexRecover";$un="%";}  else $selected6=NULL;
if($_POST[index]=="综合利用率") {$selected8="selected";$data35="complexUserate";$un="%";}  else $selected8=NULL;
if($_POST[index]=="开采回采率") {$selected9="selected";$data35="complexUserateGoback";$un="%";}  else $selected9=NULL;
if($_POST[index]=="采选综合回收率") {$selected10="selected";$data35="complexAllback";$un="%";}  else $selected10=NULL;
if($_POST[index]=="贫化率") {$selected11="selected";$data35="complexDilut";$un="%";}  else $selected11=NULL;
if($_POST[index]=="产率") {$selected12="selected";$data35="complexProrate";$un="%";}  else $selected12=NULL;
if($_POST[index]=="矿产资源利用效率") {$selected13="selected";$data35="complexEfficiency";$un="%";}  else $selected13=NULL;
if($_POST[index]=="煤矿采区回采率") {$selected14="selected";$data35="complexCoalBack";$un="%";}  else $selected14=NULL;
if($_POST[index]=="原煤入选率") {$selected15="selected";$data35="complexCoalIn";$un="%";}  else $selected15=NULL;
if($_POST[index]=="煤矸石与共伴生矿产资源综合利用率") {$selected29="selected";$data35="complexCoalAll";$un="%";}  else $selected29=NULL;
if($_POST[index]=="单位工业总产值电耗") {$selected16="selected";$data35="energyElect";$un="千瓦时/（万元*年）";}  else $selected16=NULL;
if($_POST[index]=="单位工业总产值水耗") {$selected17="selected";$data35="energyWater";$un="立方米/万元";}  else $selected17=NULL;
if($_POST[index]=="单位万元工业总产值能耗") {$selected18="selected";$data35="energyEnergy";$un="吨/万元";}  else $selected18=NULL;
if($_POST[index]=="矿山选矿废水重复利用率") {$selected19="selected";$data35="energyWaste";$un="%";}  else $selected19=NULL;
if($_POST[index]=="矿山固体废弃物综合利用率") {$selected20="selected";$data35="energyRubbish";$un="%";}  else $selected20=NULL;
if($_POST[index]=="单位工业总产值SO2排放量") {$selected21="selected";$data35="energySo2";$un="10^4 吨/万元";}  else $selected21=NULL;
if($_POST[index]=="每年组织培训次数") {$selected22="selected";$data35="standardWorkerCount";$un="次数";}  else $selected22=NULL;
if($_POST[index]=="平均每年培训投入经费") {$selected23="selected";$data35="standardWorkerCost";$un="万元";}  else $selected23=NULL;
if($_POST[index]=="科技创新投入占矿山企业总产值比重") {$selected24="selected";$data35="scienceRate";$un="%";}  else $selected24=NULL;
if($_POST[index]=="绿化覆盖率") {$selected25="selected";$data35="environmentRate";$un="%";}  else $selected25=NULL;
if($_POST[index]=="土地复垦率") {$selected26="selected";$data35="reclamationRate";$un="%";}  else $selected26=NULL;
if($_POST[index]=="土地复垦每亩经济效益") {$selected27="selected";$data35="reclamationMoney";$un="万元";}  else $selected27=NULL;
if($_POST[index]=="土地复垦每亩平均投资") {$selected28="selected";$data35="reclamationPrice";$un="万元";}  else $selected28=NULL;

if($_POST[index]==NULL) $index_name='矿山选矿回收率';
else  $index_name=$_POST[index];
if($_POST[mineName]) {$mineName=$_POST[mineName];} else $mineName='窑街煤电集团天祝煤业有限责任公司';;
$title=$_POST[mineName]."    ".$index_name."    规划值与实际值对比";
//
$sql="SELECT * FROM basedata,data35 where basedata.basedata_minename='$mineName' and data35.mine_id=basedata.mine_id AND data35.data35name='$data35'";
echo $sql;
$result = mysql_query($sql);
$row=mysql_fetch_assoc($result);
//echo mysql_num_fields($result);
//var_dump($row);
//for($i=112,$j=0;$i<=121;$i++,$j++)
//{
	//$datay[$j]=$row[$i];
//}
//var_dump($datay);
//得出规划值和实际值
$datay[0]=$row[data35_aj1];
$datay[1]=$row[data35_aj2];
$datay[2]=$row[data35_aj3];
$datay[3]=$row[data35_aj4];
$datay[4]=$row[data35_aj5];
$datay[5]=$row[data35_as1];
$datay[6]=$row[data35_as2];
$datay[7]=$row[data35_as3];
$datay[8]=$row[data35_as4];
$datay[9]=$row[data35_as5];

//查找矿山规划的年份
$year=$row[basedata_jiqizhi];
$year=substr($year,0,4);






//柱状图
$datay1=array($datay[0],$datay[1],$datay[2],$datay[3],$datay[4]);
$datay2=array($datay[5],$datay[6],$datay[7],$datay[8],$datay[9]);
//var_dump($datay1);
//var_dump($datay2);
include 'jpgraph/jpgraph.php';
include 'jpgraph/jpgraph_bar.php';
$graph=new Graph(740,480,"auto");
$graph->SetScale("textlin"); 
$graph->yaxis->scale->SetGrace(20);  
$graph->SetShadow();
$graph->img->SetMargin(60,40,50,40);
$bplot=new BarPlot($datay1);
$bplot2= new BarPlot($datay2);
$bplot2->SetFillColor('green');
$bplot->SetFillColor('red');
$bplot->value->Show();
$bplot2->value->Show();
$bplot->value->SetFormat('%d');
$bplot2->value->SetFormat('%d');
//$graph->legend->Pos(0.02,0.15);
$graph->legend->Pos(0.5,0.0,"center","top");
$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL,13);
$tuli=array('规划值','实际值');
$bplot->SetLegend($tuli[0]);
$bplot2->SetLegend($tuli[1]);
$gbarplot=new GroupBarPlot(array($bplot,$bplot2));
$gbarplot->SetWidth(0.6);
$graph->Add($gbarplot);
$graph->SetMarginColor('lightblue');
//$indexname1="统计柱状图"; 
$graph->title->Set($indexname1);
$x=array($year,$year+1,$year+2,$year+3,$year+4);
$graph->xaxis->title->Set("年份");
if($_POST[xposition]=="time") $graph->xaxis->title->Set('(单位:年)');   //标题
$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD,13); //标题字体 大小
$graph->xaxis->title->SetColor('black');//颜色
$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD,10);//X轴刻度字体 大小
$graph->xaxis->SetColor('black');//X轴刻度颜色
$graph->xaxis->SetLabelAngle(0);//设置X轴的显示值的角度;
$un1="单位:".$un;  //y轴的单位
$graph->yaxis->title->Set($un1);
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD,13); //标题字体 大小
$graph->yaxis->SetFont(FF_SIMSUN,FS_BOLD,10);//标题
$graph->yaxis->SetColor('black');//颜色
$graph->ygrid->SetColor('black@0.9');//X,y交叉表格颜色和透明度 @为程度值
$graph->yaxis->scale->SetGrace(0);//设置Y轴显示值柔韧度(解释有点问题 呵呵 原谅)
$graph->xaxis->SetTickLabels($x);
$graph->title->SetFont(FF_SIMSUN);
$graph->xaxis->SetFont(FF_SIMSUN);
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);
$graph->Stroke(BASE_PATH.'/graph1.png');
$picture='/graph1.png';






    //记录显示矿山状态
	$smarty->assign('mineName', $mineName);

	if($_POST[province]=="基本信息"||$_POST[province]==NULL)
	$filter="	
				<option {$selected2}>实际生产规模</option>
				<option {$selected3}>矿山企业总产值</option>
				<option {$selected4}>矿山企业利税</option>
				<option {$selected5}>矿山企业利润</option>";
	
	if($_POST[province]=="综合利用")  
	$filter="	<option {$selected0}>矿山选矿回收率</option>
				<option {$selected1}>矿山开采回采率</option>";
				
				
	if($_POST[province]=="节能减排")  
	$filter="	<option {$selected16}>单位工业总产值电耗</option>
				<option {$selected17}>单位工业总产值水耗</option>
				<option {$selected18}>单位万元工业总产值能耗</option>
				<option {$selected19}>矿山选矿废水重复利用率</option>
				<option {$selected20}>矿山固体废弃物综合利用率</option>
				<option {$selected21}>单位工业总产值SO2排放量</option>";


	if($_POST[province]=="其他指标")  
	$filter="	<option {$selected22}>每年组织培训次数</option>
				<option {$selected23}>平均每年培训投入经费</option>
				<option {$selected24}>科技创新投入占矿山企业总产值比重</option>
				<option {$selected25}>绿化覆盖率</option>
				<option {$selected26}>土地复垦率</option>
				<option {$selected27}>土地复垦每亩经济效益</option>
				<option {$selected28}>土地复垦每亩平均投资</option>";
				
	//arrayLN2 :["单位工业总产值电耗","单位工业总产值水耗","单位万元工业总产值能耗","矿山选矿废水重复利用率","矿山固体废弃物综合利用率","单位工业总产值SO2排放量"],
	//arrayLN3 :["每年组织培训次数","平均每年培训投入经费","科技创新投入占矿山企业总产值比重","绿化覆盖率","土地复垦率","土地复垦每亩经济效益","土地复垦每亩平均投资"],
	
//["开采回采率","采选综合回收率","贫化率","产率","矿产资源利用效率","煤矿采区回采率","原煤入选率","煤矸石与共伴生矿产资源综合利用率"],	
	
	
	//统计指标下拉框的记录显示状态
	$smarty->assign('filter', $filter);
	
	$smarty->assign('selected0', $selected0);
	$smarty->assign('selected1', $selected1);
	$smarty->assign('selected2', $selected2);
	$smarty->assign('selected3', $selected3);
	$smarty->assign('selected4', $selected4);
	$smarty->assign('selected5', $selected5);
	$smarty->assign('selected6', $selected6);
	$smarty->assign('selected8', $selected8);
    
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
	//echo $tselected4;
	
	
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
    $smarty->displayMother('gragh/compare.tpl');
}














?>






