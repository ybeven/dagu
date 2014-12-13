<?php
function saveWorkTime($notice=null){
    global $smarty;
	$session = Session::start();
	needLogin();
	if($_POST["overTime1"] < $_POST["startTime1"])
        {
	    ?>		     
                     <script>alert('晚时间修改不正确!');history.back(-1);</script>;
                 <?php
                     return;
        }
	if($_POST["overTime2"] < $_POST["startTime2"])
        {
	    ?>		     
                     <script>alert('早时间修改不正确!');history.back(-1);</script>;
                 <?php
                     return;
        }
	/*
	if($_POST["overTime3"] <= $_POST["startTime3"])
        {
	    http302('/measure/manageWorkTime/'.urlencode("三班时间修改不正确"));
	    return;
        }
	*/
    $time1 = new WorkTime;
    $sql1 = "select * from `work_time` WHERE name = '晚班' ";	
    $worktime1 = $time1->getArray($sql1,true);
    $time2 = new WorkTime;
    $sql2 = "select * from `work_time` WHERE name = '早班' ";	
    $worktime2 = $time2->getArray($sql2,true);
    $time3 = new WorkTime;
    $sql3 = "select * from `work_time` WHERE name = '中班' ";	
    $worktime3 = $time3->getArray($sql3,true);
    
    $time1->startTime = $_POST["startTime1"];
    $time1->overTime = $_POST["overTime1"];
    $time1->update();
     
    $time2->startTime = $_POST["startTime2"];
    $time2->overTime = $_POST["overTime2"];
    $time2->update();
     
    $time3->startTime = $_POST["startTime3"];
    $time3->overTime = $_POST["overTime3"];
    $time3->update();
    
    
    //http302('/system/manageWorkTime/'.urlencode("修改成功"));
    http302('/measure/manageWorkTime/'.urlencode("修改成功"));
}
?>