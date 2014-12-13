<?php
function region($page=0 , $notice=null){
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
//选择多区域后的处理
if($_POST[subpriority]==NULL) $_POST[subpriority]='甘肃全省';
//echo $_POST[subpriority];
$citys=explode("+",$_POST[subpriority]);
$city_number=count($citys);
//echo $city_number;
//print_r($citys);
//if($_POST[subpriority]!=NULL) $subpriority=substr($_POST[subpriority],0,19).'...';;
if($_POST[subpriority]!=NULL) $subpriority=$_POST[subpriority];//mb_substr($_POST[subpriority],0,4,'UTF-8');
//echo $subpriority;



//选择x轴的处理
if($_POST[positionx]==NULL) $_POST[positionx]='时间';
$xs=explode("+",$_POST[positionx]);
$x_number=count($xs);
//echo $x_number;   //有多少个矿种
//print_r($xs);     //矿种函数
if($_POST[positionx]!=NULL) $positionx=$_POST[positionx];//mb_substr($_POST[positionx],0,8,'UTF-8');


//if($_POST[positionx]!="时间"){  //统一选择6个矿种
   //if($x_number!=6) echo "<script>alert('为图表的统一样式，请选择6种矿种！');self.location='/gragh/region';</script>";
//}
if($xs[0]=="时间"&&$x_number!=1){  //统一选择6个矿种
    echo "<script>alert('时间和矿种不能同时选择！');self.location='/gragh/region';</script>";
}

//以行政区划为基准，时间为x轴的统计
$selected0="selected";
if($_POST[basedata_divisions_shi]==0||$_POST[basedata_divisions_shi]==null) {$city='兰州市';$selected0="selected";} else $selected0=NULL;
if($_POST[basedata_divisions_shi]==1) {$city="嘉峪关市";$selected1="selected";} else $selected1=NULL;
if($_POST[basedata_divisions_shi]==2) {$city="金昌市";$selected2="selected";} else $selected2=NULL;
if($_POST[basedata_divisions_shi]==3) {$city="白银市";$selected3="selected";} else $selected3=NULL;
if($_POST[basedata_divisions_shi]==4) {$city="天水市";$selected4="selected";} else $selected4=NULL;
if($_POST[basedata_divisions_shi]==5) {$city="武威市";$selected5="selected";} else $selected5=NULL;
if($_POST[basedata_divisions_shi]==6) {$city="张掖市";$selected6="selected";}  else $selected6=NULL;
if($_POST[basedata_divisions_shi]==7) {$city="酒泉市";$selected7="selected";} else $selected7=NULL;
if($_POST[basedata_divisions_shi]==8) {$city="平凉市";$selected8="selected";} else $selected8=NULL;
if($_POST[basedata_divisions_shi]==9) {$city="庆阳市";$selected9="selected";} else $selected9=NULL;
if($_POST[basedata_divisions_shi]==10) {$city="定西市";$selected10="selected";} else $selected10=NULL;
if($_POST[basedata_divisions_shi]==11) {$city="陇南市";$selected11="selected";} else $selected11=NULL;
if($_POST[basedata_divisions_shi]==12) {$city="临夏自治州";$selected12="selected";} else $selected12=NULL;
if($_POST[basedata_divisions_shi]==13) {$city="甘南自治州";$selected13="selected";} else $selected13=NULL;


//矿种类别铁，铜，金，锰，钛，铝（老办法，已经不用了）
$minerals=array("0"=>"铝矿","1"=>"铁矿","2"=>"铜矿","3"=>"金矿","4"=>"锰矿","5"=>"钛矿","6"=>"煤","7"=>"石油","8"=>"天然气","9"=>"地热","10"=>"铀钍","11"=>"石煤","12"=>"金刚石","13"=>"石墨","14"=>"自然硫","15"=>"硫铁矿","16"=>"水晶","17"=>"刚玉");
$minerali=0;                                                                                                                                                                            
if($_POST[xposition]=="metalmineral") {$minerali=0;$tselected2="selected";} else $tselected2=NULL;
if($_POST[xposition]=="nergymineral") {$minerali=6;$tselected3="selected";} else $tselected3=NULL;
if($_POST[xposition]=="umetalmineral") {$minerali=12;$tselected4="selected";} else $tselected4=NULL;
if($_POST[xposition]=="minerals") {$tselected1="selected";} else $tselected1=NULL;

//矿种类别铁，铜，金，锰，钛，铝（新办法）



/*/下拉x轴为矿种的时候，多出现一个矿种的选择框
if($_POST[xposition]=="minerals")
{
$button='
	<td class="tdhead">矿种选择</td>
	<td>
		<select name="smineral">						  
		<option value="nergymineral">能源矿种</option>						 						  
		<option value="metalmineral">金属矿种</option>
		<option value="umetalmineral">非金属矿种</option>
		</select>
	</td>
	<td>&nbsp;&nbsp;<input type="submit" value="查询" /></td>';
}*/


//大的for循环，找出每一个城市对应的数组值
$dataofCitys=array();
for($eachcity=0;$eachcity<$city_number;$eachcity++){
	$city=$citys[$eachcity];  //这里找出了城市
	



//$sql = "SELECT * FROM `basedata` where basedata_divisions_shi=$city";  //先选出是哪个行政区划
//矿山资源储量ok  不要了
if($_POST[index]==0)
{
	$iselected0="selected";
	$un='吨';
	$indexname="矿山资源储量";
	$index="basedata_resources_total"; //先找出这样的行：是兰州区的，是2011年的，然后一个一个把矿山资源储量加起来。
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if(($_POST[xposition]=="time"||$_POST[xposition]==NULL)&&$x_number==1)  //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT * FROM basedata where basedata_divisions_shi='$city' and basedata_buildtime like '$year%'";
		 
		$result = mysql_query($sql);
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[$index];	
		}
		//echo $datay[$i].$year."<br>";
	}  
   }else $tselected0=NULL;	
   if($_POST[xposition]=="minerals"||$_POST[xposition]=="nergymineral"||$_POST[xposition]=="metalmineral"||$_POST[xposition]=="umetalmineral")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=$minerali;$mineralindex<=5+$minerali;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindex]=0;             //在ore表中的矿种的可采存量：ore_levela    矿石名字：orename
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT * FROM basedata,ore where basedata.basedata_divisions_shi='$city' and ore.orename='$basedata_mineral_main' and ore.mine_id=basedata.mine_id";
			$result = mysql_query($sql);
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row['ore_levela'];	
				$mineralindexin++;
			}	
		} 	
	}else $tselected1=NULL;

}else $iselected0=NULL;


  //矿区面积ok
if($_POST[index]==1||$_POST[index]==NULL)           
{
    $iselected1="selected";
	$un='平方千米';
	$indexname="矿区面积";
	$index="environment_rate_area"; 
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if(($_POST[positionx]=="时间"||$_POST[positionx]==NULL)&&$x_number==1)  //x轴为时间的
	{
		$tselected0="selected";	
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT * FROM basedata,environment where basedata_divisions_shi='$city' and basedata_jiqizhi=$year and basedata.mine_id=environment.mine_id";
		if($city=='甘肃全省') $sql="SELECT * FROM basedata,environment where basedata_jiqizhi=$year and basedata.mine_id=environment.mine_id";
		$result = mysql_query($sql);
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[$index];	
		}
		//echo $datay[$i].$year."<br>";
	}  
   }else $tselected0=NULL;
if($_POST[positionx]!="时间")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=0;$mineralindex<$x_number;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindexin]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT * FROM basedata,environment,ore where basedata_divisions_shi='$city' and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种' and basedata.mine_id=environment.mine_id";
			if($city=='甘肃全省') $sql="SELECT * FROM basedata,environment,ore where ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种' and basedata.mine_id=environment.mine_id";
			$result = mysql_query($sql);
			//echo $mineralindexin;
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row[$index];		
			}	
			$mineralindexin++;
		} 	
		//print_r($datay);
	}else $tselected1=NULL;	
}else $iselected1=NULL;


 //有多少矿山企业ok，这个直接查询本行政区划的就可以,百度面试那个题
if($_POST[index]==2)                         
{
	$iselected2="selected";
	$un='个';
	$indexname="绿色矿山企业数量";
	$index=""; 
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if($_POST[positionx]=="时间"&&$x_number==1)  //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT count(*) as ct FROM basedata where basedata_divisions_shi='$city' and basedata_jiqizhi=$year";
		if($city=='甘肃全省') $sql="SELECT count(*) as ct FROM basedata where basedata_jiqizhi=$year";
		$result = mysql_query($sql);
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[ct];	
		}
		//echo $datay[$i].$year."<br>";
	} 
   }else $tselected0=NULL;
if($_POST[positionx]!="时间")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=0;$mineralindex<$x_number;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindexin]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT count(*) as ct FROM basedata,ore where basedata_divisions_shi='$city' and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			if($city=='甘肃全省') $sql="SELECT count(*) as ct FROM basedata,ore where ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			//echo $sql;
			$result = mysql_query($sql);
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row[ct];	
			}
			$mineralindexin++;
		} 	
	}else $tselected1=NULL;
   
}else $iselected2=NULL;


//工业总产值ok
if($_POST[index]==3)            
{
	$iselected3="selected";
	$un='万元';
	$indexname="工业总产值";
	$index="basedata_value"; 
	$year=date('Y',time());  //现在的年份
	if($_POST[positionx]=="时间"&&$x_number==1)  //x轴为时间的
	{
		$tselected0="selected";
		$year=$year-5;
		for($i=0;$i<=5;$i++,$year++)  //要取五年的值
		{
			$datay[$i]=0;
			$sql="SELECT * FROM basedata where basedata_divisions_shi='$city' and basedata_jiqizhi=$year";
			if($city=='甘肃全省') $sql="SELECT * FROM basedata where basedata_jiqizhi=$year";
			$result = mysql_query($sql);
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$i]=$datay[$i]+$row[$index];	
			}	
		} 
    }else $tselected0=NULL;
    if($_POST[positionx]!="时间")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=0;$mineralindex<$x_number;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindexin]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT * FROM basedata,ore where basedata_divisions_shi='$city' and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			if($city=='甘肃全省') $sql="SELECT * FROM basedata,ore where ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			$result = mysql_query($sql);
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row[$index];	
			}
            $mineralindexin++;			
		} 	
	}else $tselected1=NULL;
}else $iselected3=NULL;



//矿山企业利税ok
if($_POST[index]==4)          
{
	$iselected4="selected";
	$un='万元';
	$indexname="矿山企业利税";
	$index="basedata_fee"; 
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if($_POST[positionx]=="时间"&&$x_number==1)  //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT * FROM basedata where basedata_divisions_shi='$city' and basedata_jiqizhi=$year";
		if($city=='甘肃全省') $sql="SELECT * FROM basedata where basedata_jiqizhi=$year";
		$result = mysql_query($sql);
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[$index];	
		}
		//echo $datay[$i].$year."<br>";
	} 
   }else $tselected0=NULL;
if($_POST[positionx]!="时间")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=0;$mineralindex<$x_number;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindexin]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT * FROM basedata.ore where basedata_divisions_shi='$city' and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			if($city=='甘肃全省') $sql="SELECT * FROM basedata,ore where  ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			$result = mysql_query($sql);
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row[$index];	
			}
            $mineralindexin++;			
		} 	
	}else $tselected1=NULL;
   
}else $iselected4=NULL;

 //生产规模ok  不要了
if($_POST[index]==5)    
{
	$iselected5="selected";
	$un='吨/年';
	$indexname="生产规模";
	$index="basedata_produce_scale";
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if($_POST[xposition]=="time")  //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT * FROM basedata where basedata_divisions_shi='$city' and basedata_buildtime=$year";
		$result = mysql_query($sql);
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[$index];	
		}
		//echo $datay[$i].$year."<br>";
	} 
   }else $tselected0=NULL;	
if($_POST[xposition]=="minerals"||$_POST[xposition]=="nergymineral"||$_POST[xposition]=="metalmineral"||$_POST[xposition]=="umetalmineral")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		for($mineralindex=$minerali;$mineralindex<=5+$minerali;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindex]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT * FROM basedata where basedata_divisions_shi='$city' and basedata_mineral_main='$basedata_mineral_main'";
			$result = mysql_query($sql);
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindex]=$datay[$mineralindex]+$row[$index];	
			}	
		} 	
	}else $tselected1=NULL;
}else $iselected5=NULL;


//单位工业总产值能耗ok  一个在energy里面，一个在basedata里面,energy_energy是这个，要用到两个表的连接，虚啊
//可以写一个sql语句，兰州市，2012年，平均单位工业总产值能耗。
if($_POST[index]==6)                          
{
	$iselected6="selected";
	$un='t/万元';
	$indexname="单位工业总产值能耗";
	$index="energy_energy";
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if($_POST[positionx]=="时间"&&$x_number==1)  //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT avg(energy_energy) as av FROM basedata,energy where basedata_divisions_shi='$city' and basedata_jiqizhi=$year and energy.mine_id=basedata.mine_id";
		if($city=='甘肃全省') $sql="SELECT avg(energy_energy) as av FROM basedata,energy where basedata_jiqizhi=$year and energy.mine_id=basedata.mine_id";
		$result = mysql_query($sql);
		$j=0;
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[av];	
			$j++;
		}
		$datay[$i]=$datay[$i]/$j;
	} 
   }else $tselected0=NULL;
  if($_POST[positionx]!="时间")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=0;$mineralindex<$x_number;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindexin]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT avg(energy_energy) as av FROM basedata,energy,ore where basedata_divisions_shi='$city' and energy.mine_id=basedata.mine_id and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			if($city=='甘肃全省') $sql="SELECT avg(energy_energy) as av FROM basedata,energy,ore where energy.mine_id=basedata.mine_id and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			$result = mysql_query($sql);
			$j=0;
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row[av];	
				$j++;
			}
            $datay[$mineralindexin]=$datay[$mineralindexin]/$j;	
            $mineralindexin++;			
		} 	
	}else $tselected1=NULL;    
   
}else $iselected6=NULL;

//矿山复垦面积ok 在reclamation里面reclamation_rate_have
if($_POST[index]==7)                        
{
	 $iselected7="selected";
	 $un='平方千米';
	 $indexname="矿山复垦面积";
	 $index="reclamation_rate_have";
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if($_POST[positionx]=="时间"&&$x_number==1)   //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT sum(reclamation_rate_have) as av FROM basedata,reclamation where basedata_divisions_shi='$city' and basedata_jiqizhi=$year and reclamation.mine_id=basedata.mine_id";
		if($city=='甘肃全省') $sql="SELECT sum(reclamation_rate_have) as av FROM basedata,reclamation where basedata_jiqizhi=$year and reclamation.mine_id=basedata.mine_id";
		$result = mysql_query($sql);
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[av];	
		}
		//echo $datay[$i].$year."<br>";
	} 
   }else $tselected0=NULL;
 if($_POST[positionx]!="时间")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=0;$mineralindex<$x_number;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindexin]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT sum(reclamation_rate_have) as av FROM basedata,reclamation,ore where basedata_divisions_shi='$city' and reclamation.mine_id=basedata.mine_id and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			if($city=='甘肃全省') $sql="SELECT sum(reclamation_rate_have) as av FROM basedata,reclamation,ore where reclamation.mine_id=basedata.mine_id and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			$result = mysql_query($sql);
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row[av];	
			}
            $mineralindexin++;			
		} 	
	}else $tselected1=NULL;  
   
}else $iselected7=NULL;

  //矿区绿化率  在environment  不要了
if($_POST[index]==8)                         
{
	 $iselected8="selected";
	 $un='%';
	 $indexname="矿区绿化率";
	 $index="";
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if($_POST[xposition]=="time")  //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT avg(environment_rate_green) as av FROM basedata,environment where basedata_divisions_shi='$city' and basedata_buildtime=$year and environment.mine_id=basedata.mine_id";
		$result = mysql_query($sql);
		$j=0;
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[av];	
			$j++;
		}
		$datay[$i]=$datay[$i]/$j;
		//echo $datay[$i].$year."<br>";
	} 
}else $tselected0=NULL;
 if($_POST[xposition]=="minerals"||$_POST[xposition]=="nergymineral"||$_POST[xposition]=="metalmineral"||$_POST[xposition]=="umetalmineral")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		for($mineralindex=$minerali;$mineralindex<=5+$minerali;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindex]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT avg(environment_rate_green) as av FROM basedata,environment where basedata_divisions_shi='$city' and environment.mine_id=basedata.mine_id and basedata_mineral_main='$basedata_mineral_main'";
			$result = mysql_query($sql);
			$j=0;
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindex]=$datay[$mineralindex]+$row[av];	
				$j++;
			}	
			$datay[$mineralindex]=$datay[$mineralindex]/$j;
		} 	
	}else $tselected1=NULL;  

}else $iselected8=NULL;

//创新投入资金  在science里面  字段science_rate
if($_POST[index]==9)                        
{
	 $iselected9="selected";
	 $un='万元';
	 $indexname="创新投入资金";
	 $index="science_rate_scimoney";
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if($_POST[positionx]=="时间"&&$x_number==1)  //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT sum(science_rate_scimoney) as av FROM basedata,science where basedata_divisions_shi='$city' and basedata_jiqizhi=$year and science.mine_id=basedata.mine_id";
		if($city=='甘肃全省') $sql="SELECT sum(science_rate_scimoney) as av FROM basedata,science where basedata_jiqizhi=$year and science.mine_id=basedata.mine_id";
     	//echo $sql;
		$result = mysql_query($sql);
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[av];	
		}
		//echo $datay[$i].$year."<br>";
	} 
}else $tselected0=NULL;
 if($_POST[positionx]!="时间")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=0;$mineralindex<$x_number;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindexin]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			$sql="SELECT sum(science_rate_scimoney) as av FROM basedata,science,ore where basedata_divisions_shi='$city' and science.mine_id=basedata.mine_id and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			if($city=='甘肃全省') $sql="SELECT sum(science_rate_scimoney) as av FROM basedata,science,ore where science.mine_id=basedata.mine_id and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			$result = mysql_query($sql);
			$j=0;
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row[av];	
				$j++;
			}	
			//$datay[$mineralindexin]=$datay[$mineralindexin]/$j;
			$mineralindexin++;
		} 	
	}else $tselected1=NULL;  

}else $iselected9=NULL;

 //重点工程总投资  在ore里面  有ore_goback，orehuishou  （不在这里，在这个表里面ore_zhly35）
if($_POST[index]==10)                          
{
	 $iselected10="selected";
	 $un='万元';
	 $indexname="重点工程总投资";
	 $index="project_Cost";
	$year=date('Y',time());  //现在的年份
    $year=$year-5;
	if($_POST[positionx]=="时间"&&$x_number==1)  //x轴为时间的
	{
		$tselected0="selected";
	for($i=0;$i<=5;$i++,$year++)  //要取五年的值
	{
		$datay[$i]=0;
		$sql="SELECT sum(project_Cost) as av FROM basedata,project where basedata_divisions_shi='$city' and basedata_jiqizhi=$year and project.mine_id=basedata.mine_id";
		if($city=='甘肃全省') $sql="SELECT sum(project_Cost) as av FROM basedata,project where basedata_jiqizhi=$year and project.mine_id=basedata.mine_id";

		$result = mysql_query($sql);
		while($row=mysql_fetch_assoc($result))  //把每一年的加起来
		{
			$datay[$i]=$datay[$i]+$row[av];	
		}
		//echo $datay[$i].$year."<br>";
	} 
}else $tselected0=NULL;	
 if($_POST[positionx]!="时间")	//x轴为矿山类型的
	{                             //兰州市先做一个，工业总产值的柱状图，条件是金属矿种的。
		$tselected1="selected";
		$mineralindexin=0;
		for($mineralindex=0;$mineralindex<$x_number;$mineralindex++)  //铁，铜，金，锰，钛，铝的值,把每一种矿的对应值加起来。
		{
			//echo $mineralindex;
			$datay[$mineralindexin]=0;
			$basedata_mineral_main=$xs[$mineralindex];
			
			$sql="SELECT sum(project_Cost) as av FROM basedata,project,ore where basedata_divisions_shi='$city' and project.mine_id=basedata.mine_id and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			if($city=='甘肃全省') $sql="SELECT sum(project_Cost) as av FROM basedata,project,ore where project.mine_id=basedata.mine_id and ore.orename='$basedata_mineral_main' and basedata.mine_id=ore.mine_id and ore.oretype='主矿种'";
			$result = mysql_query($sql);
			$j=0;
			while($row=mysql_fetch_assoc($result))  //把每一年的加起来
			{
				$datay[$mineralindexin]=$datay[$mineralindexin]+$row[av];	
				$j++;
			}	
			//$datay[$mineralindexin]=$datay[$mineralindexin]/$j;
			$mineralindexin++;
		} 	
	}else $tselected1=NULL;  
}else $iselected10=NULL;


//每一次产生的$datay值，放入到二维数组中来。
$dataofCitys[$eachcity]=$datay;
//var_dump($datay);

} //大的for循环结束

//var_dump($dataofCitys);
//var_dump($dataofCitys['0']);

//柱状图
if($_POST[chart]=='histogram'||$_POST[chart]==NULL){
$charselect1="selected";
include 'jpgraph/jpgraph.php';
include 'jpgraph/jpgraph_bar.php';
$graph=new Graph(740,480,"auto");
$graph->SetScale("textlin"); 
$graph->yaxis->scale->SetGrace(20);  
$graph->SetShadow();
$graph->img->SetMargin(60,40,50,40);

/*
$bplot=new BarPlot($datay);   //动态变化
$bplot->SetFillColor('orange');
$bplot->value->Show();
$bplot->value->SetFormat('%d');
$graph->Add($bplot);  //动态变化
*/

//aqua、black、blue、fuchsia、gray、green、lime、maroon、navy、olive、purple、red、silver、teal、white、yellow。
$setcolor=array('orange','royalblue','plum','silver','maroon','gray','fuchsia','blue','red','teal','yellow','olive','aqua','purple','navy');
for($i=0;$i<$city_number;$i++){
    //$datay=$dataofCitys[$i];
	if(($_POST[positionx]=="时间"||$_POST[positionx]==NULL)&&$x_number==1) {
	for($j=0;$j<6;$j++){
		$datay[$j]=$dataofCitys[$i][$j];
	}}
	else{
	for($j=0;$j<$x_number;$j++){
		$datay[$j]=$dataofCitys[$i][$j];
	}
	}
	//var_dump($datay);
	$bplot=array('bplot0','bplot1','bplot2','bplot3','bplot4','bplot5','bplot6','bplot7','bplot8','bplot9','bplot10','bplot11','bplot12','bplot13');
	$$bplot[$i]=new BarPlot($datay);
	//print_r($datay);
	$$bplot[$i]->SetFillColor($setcolor[$i]);
	$$bplot[$i]->value->Show();
	$$bplot[$i]->value->SetFormat('%d');
	//$graph->Add($bplot[$i]);  //动态变化
	//echo $citys[$i];
	$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL,13);
	//$tuli=array('规划值','实际值');
	$$bplot[$i]->SetLegend($citys[$i]);
}

//$tuli=array('规划值','实际值'); //$citys[$eachcity];
//$bplot->SetLegend($citys[$i]);
//$bplot2->SetLegend($tuli[1]);
//$gbarplot=new GroupBarPlot(array($bplot,$bplot2));
//echo $city_number;
if($city_number==1)  $gbarplot=new AccBarPlot(array($$bplot[0]));
if($city_number==2) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1]));}
if($city_number==3) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2]));}
if($city_number==4) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3]));}
if($city_number==5) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4]));}
if($city_number==6) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5]));}
if($city_number==7) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6]));}
if($city_number==8) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7]));}
if($city_number==9) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8]));}
if($city_number==10) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9]));}
if($city_number==11) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9],$$bplot[10]));}
if($city_number==12) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9],$$bplot[10],$$bplot[11]));}
if($city_number==13) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9],$$bplot[10],$$bplot[11],$$bplot[12]));}
if($city_number==14) {$gbarplot=new AccBarPlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9],$$bplot[10],$$bplot[11],$$bplot[12],$$bplot[13]));}

//$accbar = new AccBarPlot(array($bar1,$bar2,$bar3,$bar4,$bar5,$bar6,$bar7,$bar8,$bar9,$bar10));
//$graph->Add($accbar);
//$graph->stroke();


$gbarplot->SetWidth(0.6);
$graph->Add($gbarplot);

$graph->SetMarginColor('lightblue');
$indexname1="统计柱状图"; 
$graph->title->Set($indexname1);
$year=date('Y',time());  //现在的年份
if($_POST[positionx]=="时间"||$_POST[positionx]==NULL) {$x=array($year-5,$year-4,$year-3,$year-2,$year-1,$year);}
//else {$x=array($minerals[$minerali],$minerals[$minerali+1],$minerals[$minerali+2],$minerals[$minerali+3],$minerals[$minerali+4],$minerals[$minerali+5]);}
else $x=$xs;
//print_r($x);
//$graph->xaxis->title->Set("年份");
if($_POST[xposition]=="time") $graph->xaxis->title->Set('(单位:年)');   //标题
$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD,13); //标题字体 大小
$graph->xaxis->title->SetColor('black');//颜色
$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD,10);//X轴刻度字体 大小
$graph->xaxis->SetColor('black');//X轴刻度颜色
$graph->xaxis->SetLabelAngle(0);//设置X轴的显示值的角度;
$un1="单位:".$un;
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
}else $charselect1=NULL;



//折线图
if($_POST[chart]=='linechart')
{
if($city_number>1) echo "<script>alert('折线图只能选择一个行政区划!');self.location='/gragh/region';</script>";
$charselect2="selected";
include 'jpgraph/jpgraph.php';
include 'jpgraph/jpgraph_line.php';
$graph = new Graph(700,460,"auto");    //创建画布
$graph->img->SetMargin(50,40,30,40); //设置统计图所在画布的位置，左边距50、右边距40、上边距30、下边距40，单位为像素
$graph->img->SetAntiAliasing();     //设置折线的平滑状态
$graph->SetScale("textlin");     //设置刻度样式        $graph->SetShadow();      //创建画布阴影
$indexname1="统计折线图"; 
$graph->title->Set($indexname1);     
$graph->title->SetFont(FF_SIMSUN,FS_BOLD); //设置标题字体
 $graph->SetMarginColor("lightblue");    //设置画布的背景颜色为淡蓝色
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD); //设置Y轴标题的字体
$graph->xaxis->SetPos("min");
$graph->yaxis->HideZeroLabel();
$un1="单位:".$un;
$graph->yaxis->title->Set($un1);
 $graph->ygrid->SetFill(true,'#EFEFEF@0.5','#BBCCFF@0.5');
 $year=date('Y',time());  //现在的年份
if($_POST[positionx]=="时间"||$_POST[positionx]==NULL) {$x=array($year-5,$year-4,$year-3,$year-2,$year-1,$year);}
else $x=$xs;
//else {$x=array($minerals[$minerali],$minerals[$minerali+1],$minerals[$minerali+2],$minerals[$minerali+3],$minerals[$minerali+4],$minerals[$minerali+5]);}
//$graph->xaxis->title->Set("年份");
 $graph->xaxis->SetTickLabels($x);     //设置X轴
 $graph->xaxis->SetFont(FF_SIMSUN);     //设置X坐标轴的字体
 //if($_POST[xposition]=="time") $graph->xaxis->title->Set('(单位:年)');   //标题
 $graph->yscale->SetGrace(20);  


 
 
 //aqua、black、blue、fuchsia、gray、green、lime、maroon、navy、olive、purple、red、silver、teal、white、yellow。
$setcolor=array('orange','royalblue','plum','silver','maroon','gray','fuchsia','blue','red','teal','yellow','olive','aqua','purple','navy');
for($i=0;$i<$city_number;$i++){
    //$datay=$dataofCitys[$i];

		if(($_POST[positionx]=="时间"||$_POST[positionx]==NULL)&&$x_number==1) {
	for($j=0;$j<6;$j++){
		$datay[$j]=$dataofCitys[$i][$j];
	}}
	else{
	for($j=0;$j<$x_number;$j++){
		$datay[$j]=$dataofCitys[$i][$j];
	}
	}
	//var_dump($datay);
	$bplot=array('bplot0','bplot1','bplot2','bplot3','bplot4','bplot5','bplot6','bplot7','bplot8','bplot9','bplot10','bplot11','bplot12','bplot13');
	$$bplot[$i]=new LinePlot($datay);
	$$bplot[$i]->mark->SetType(MARK_FILLEDCIRCLE);    //设置数据坐标点为圆形标记
	$$bplot[$i]->mark->SetFillColor($setcolor[$i]);
	$$bplot[$i]->mark->SetWidth(4);      //设置圆形标记的直径为4像素
	$$bplot[$i]->SetColor($setcolor[$i]);      //设置折形颜色为蓝色
	$$bplot[$i]->SetCenter();
	$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL,13);
	$$bplot[$i]->SetLegend($citys[$i]);
	 
	//$$bplot[$i]->value->Show();
	//$$bplot[$i]->value->SetFormat('%d');
	//$graph->Add($bplot[$i]);  //动态变化
	//echo $citys[$i];
	//$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL,13);
	//$tuli=array('规划值','实际值');
	//$$bplot[$i]->SetLegend($citys[$i]);
}

//$tuli=array('规划值','实际值'); //$citys[$eachcity];
//$bplot->SetLegend($citys[$i]);
//$bplot2->SetLegend($tuli[1]);
//$gbarplot=new GroupBarPlot(array($bplot,$bplot2));
//echo $city_number;AccBarPlot
if($city_number==1)  $gbarplot=new AccLinePlot(array($$bplot[0]));
if($city_number==2) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1]));}
if($city_number==3) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2]));}
if($city_number==4) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3]));}
if($city_number==5) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4]));}
if($city_number==6) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5]));}
if($city_number==7) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6]));}
if($city_number==8) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7]));}
if($city_number==9) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8]));}
if($city_number==10) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9]));}
if($city_number==11) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9],$$bplot[10]));}
if($city_number==12) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9],$$bplot[10],$$bplot[11]));}
if($city_number==13) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9],$$bplot[10],$$bplot[11],$$bplot[12]));}
if($city_number==14) {$gbarplot=new AccLinePlot(array($$bplot[0],$$bplot[1],$$bplot[2],$$bplot[3],$$bplot[4],$$bplot[5],$$bplot[6],$$bplot[7],$$bplot[8],$$bplot[9],$$bplot[10],$$bplot[11],$$bplot[12],$$bplot[13]));}

 


 
 //$p1 = new LinePlot($datay);     //创建折线图对象
  //$p1->mark->SetType(MARK_FILLEDCIRCLE);    //设置数据坐标点为圆形标记
  //$p1->mark->SetFillColor("red");     //设置填充的颜色
  //$p1->mark->SetWidth(4);      //设置圆形标记的直径为4像素
  //$p1->SetColor("blue");      //设置折形颜色为蓝色
  //$p1->SetCenter();      //在X轴的各坐标点中心位置绘制折线
 $graph->Add($gbarplot);      //在统计图上绘制折线
 
 
 
 
 define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);
   $graph->Stroke(BASE_PATH.'/graph1.png');
  $picture='/graph1.png';
}else $charselect2=NULL;



//饼状图
if($_POST[chart]=='piechart')
{
$all=0;
for($iso=0;$iso<=5;$iso++){ if($datay[$iso]!=0){$all=1;break;};}
if($all==0) echo "<script>alert('您要查询的数据位为不能生产饼状图!');self.location='/gragh/region';</script>";
if($city_number>1) echo "<script>alert('饼状图只能选择一个行政区划!');self.location='/gragh/region';</script>";
$charselect3="selected";
include_once ("jpgraph/jpgraph.php");
include_once ("jpgraph/jpgraph_pie.php");
include_once ("jpgraph/jpgraph_pie3d.php");    //引用3D饼图PiePlot3D对象所在的类文件
$graph = new PieGraph(700,460,'auto');     //创建画布
$graph->SetShadow();       //设置画布阴影
$graph->title->Set("统计饼状图");
//if($_POST[index]==1) $graph->title->Set("绿色矿山矿区面积统计");

$graph->title->SetFont(FF_SIMSUN,FS_BOLD);    //设置标题字体
$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL);    //设置图例字体
$p1 = new PiePlot3D($datay);      //创建3D饼形图对象
$year=date('Y',time());  //现在的年份
if($_POST[positionx]=="时间"||$_POST[positionx]==NULL) {$x=array($year-5,$year-4,$year-3,$year-2,$year-1,$year);}
else $x=$xs;
//else {$x=array($minerals[$minerali],$minerals[$minerali+1],$minerals[$minerali+2],$minerals[$minerali+3],$minerals[$minerali+4],$minerals[$minerali+5]);}


$p1->SetLegends($x);
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
}else $charselect3=NULL;






    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("数据统计" , "/system/managerUser" , true);
	//把多选的行政区划传递过去
	
	$smarty->assign('subpriority', $subpriority);
	$smarty->assign('positionx', $positionx);
	
    //行政区划下拉框的记录显示状态
	$smarty->assign('selected0', $selected0);
	$smarty->assign('selected1', $selected1);
	$smarty->assign('selected2', $selected2);
	$smarty->assign('selected3', $selected3);
	$smarty->assign('selected4', $selected4);
	$smarty->assign('selected5', $selected5);
	$smarty->assign('selected6', $selected6);
	$smarty->assign('selected7', $selected7);
	$smarty->assign('selected8', $selected8);
	$smarty->assign('selected9', $selected9);
	$smarty->assign('selected10', $selected10);
	$smarty->assign('selected11', $selected11);
	$smarty->assign('selected12', $selected12);
	$smarty->assign('selected13', $selected13);
	
	//统计指标下拉框的记录显示状态
	$smarty->assign('iselected0', $iselected0);
	$smarty->assign('iselected1', $iselected1);
	$smarty->assign('iselected2', $iselected2);
	$smarty->assign('iselected3', $iselected3);
	$smarty->assign('iselected4', $iselected4);
	$smarty->assign('iselected5', $iselected5);
	$smarty->assign('iselected6', $iselected6);
	$smarty->assign('iselected7', $iselected7);
	$smarty->assign('iselected8', $iselected8);
	$smarty->assign('iselected9', $iselected9);
	$smarty->assign('iselected10', $iselected10);
    
	//传递矿种过去。。。$minerals[$minerali]
	$smarty->assign('m0', $xs[0]);
	$smarty->assign('m1', $xs[1]);
	$smarty->assign('m2', $xs[2]);
	$smarty->assign('m3', $xs[3]);
	$smarty->assign('m4', $xs[4]);
	$smarty->assign('m5', $xs[5]);
   
    //x轴坐标的下拉显示状态
	$smarty->assign('tselected0', $tselected0);
	$smarty->assign('tselected1', $tselected1);
	$smarty->assign('tselected2', $tselected2);
	$smarty->assign('tselected3', $tselected3);
	$smarty->assign('tselected4', $tselected4);
	
	
	//多城市的时候，不显示table
	$disapearTable=0;
	if($city_number==1&&($_POST[positionx]=="时间"||$_POST[positionx]==NULL)&&$x_number==1) $disapearTable=1;
	$smarty->assign('disapearTable', $disapearTable);
	
	
	//图形类型的记录
	$smarty->assign('charselect1', $charselect1);
	$smarty->assign('charselect2', $charselect2);
	$smarty->assign('charselect3', $charselect3);
	
	
	
	$smarty->assign('button', $button);
    $smarty->assign('roleSelect' , $roleSelect);
    $smarty->assign('roleArray' , $roleArray);
    $smarty->assign('user', $user);
    $smarty->assign('userArr', $userArr);
	
	if($_POST[subpriority]==NULL) $subpriority='兰州市';
	else $subpriority=$_POST[subpriority];
	$smarty->assign('city', $subpriority);
	
	$smarty->assign('indexname', $indexname);
	$smarty->assign('un', $un);
	$smarty->assign('datay', $datay);
	$smarty->assign('title', $title);
	$smarty->assign('year', $year);
	$smarty->assign('minerals', $minerals);
	$smarty->assign('minerali', $minerali);
    $smarty->assign('picture', $picture);
    $smarty->setTitle('数据统计');
    $smarty->displayMother('gragh/region.tpl');
}
?>
