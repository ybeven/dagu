<?php
$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT basedata.mine_id as id,basedata.basedata_minename as mineName, basedata.basedata_point_longitude as x ,
	          basedata.basedata_point_latitude as y ,basedata.basedata_owedname as enterpriseName ,basedata_enterpriseproperty as  enterpriseproperty,basedata.basedata_produce_dig as produce_dig 
			  FROM  basedata";
    $result = mysql_query($sql);
    $xmlstr="<List>"; 
	$num=1;
    while(list($id,$minename,$x,$y,$enterprisename,$enterpriseproperty,$produce_dig) = mysql_fetch_row($result))
	{
	$xx=($x-99.8)*92.1;$yy=($y-32.314)*124;
	if( $_GET["xmax"]>$xx && $_GET["xmin"]<$xx && $_GET["ymax"]>$yy && $_GET["ymin"]<$yy )
	{
	$xmlstr.="<ListItem>";
	$xmlstr.="<num>".$num."</num>";

	$xmlstr.="<id>http://localhost/minedata/ListMineDetails/".$id."</id>";
	$xmlstr.="<name>".$minename."</name>";
/* 	$xmlstr.="<xpos>".$x."</xpos>";
	$xmlstr.="<ypos>".$y."</ypos>"; */
	
	$xmlstr.="<enterpriseName>".$enterprisename."</enterpriseName>";
	$xmlstr.="<enterpriseproperty>".$enterpriseproperty."</enterpriseproperty>";
	$xmlstr.="<produce_dig>".$produce_dig."</produce_dig>";
	$xmlstr.="<look>查看详情</look>";
    $xmlstr.="</ListItem>";
	}
	$num++;
}
$xmlstr.="</List>";
echo $xmlstr;
?>