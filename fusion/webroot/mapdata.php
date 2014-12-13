<?php

    $output = null;
    $method = $_REQUEST['method'];
    $method = "gansu";
    if($method === "gansu"){
      $output = getMapGansu();
      echo json_encode($output);
      return $output; 
    }
    
    function getMapGansu()
    {
        $link = mysql_connect('127.0.0.1','root','abc');
        if (!$link)
        {
           return -1;
        }
        $res=mysql_select_db('greenmine',$link);
        mysql_query("SET NAMES 'utf8'");
        $sql = "select basedata_point_longitude, basedata_point_latitude from basedata";
        $result = mysql_query($sql,$link);
        if(!$result)
        $tmp = array();
        while($row = mysql_fetch_array($result,MYSQL_NUM))
        {
           $tmp[] = array($row[0],$row[1]);
        }
        mysql_close($link);
        return $tmp;
    }
    

?>
