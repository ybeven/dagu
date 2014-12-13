<?php
$db = mysql_connect('127.0.0.1','root','abc') or die('Unable to connect .');
	mysql_select_db('greenmine',$db) or die(mysql_error($db));
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT basedata.mine_id as id,basedata.basedata_minename as mineName, basedata.basedata_point_longitude as x ,
	          basedata.basedata_point_latitude as y ,basedata.basedata_companyname as enterpriseName
			  FROM  basedata";
    $result = mysql_query($sql);
    $xmlstr="<List>"; 

	$num=1;
    while(list($id,$minename,$x,$y,$enterprisename) = mysql_fetch_row($result))
	{
	$xmlstr.="<ListItem>";
	$xmlstr.="<num>".$num."</num>";
	$xmlstr.="<id>http://localhost/minedata/ListMineDetails/".$id."</id>";
	$xmlstr.="<name>".$minename."</name>";
	$xarray=explode(".",$x);	$yarray=explode(".",$y);

	$actx=intval($xarray[0])+(intval($xarray[1])/60)+(intval($xarray[2])/3600);
	$acty=intval($yarray[0])+(intval($yarray[1])/60)+(intval($yarray[2])/3600);

	
	
	
	$xmlstr.="<xpos>".$actx."</xpos>";
	$xmlstr.="<ypos>".$acty."</ypos>";
	$xmlstr.="<enterpriseName>".$enterprisename."</enterpriseName>";
	
    $xmlstr.="</ListItem>";

	$num++;
}
$xmlstr.="</List>";
echo $xmlstr;
?>