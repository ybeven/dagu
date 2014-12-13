<?php
function saveValue(){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	/*
        $ac = new AccessController;
	if(!$ac->can("管理销售计划" , $session->curUser)){
		http302("/start/index/".urlencode('您无权添加销售计划'));
		return;
        }
	$payMileageArray = array();
	*/

        if($_POST["measure"]=='')
	{
	   http302("/measure/manageValue/".urlencode("阈值未填写，请仔细检查！"));
	   return;
	}
        else{
            $measure = new MeasureDifference;
            $measure->getByID(1);
            $measure->difference = $_POST["measure"];
            $measure->update();
            http302("/measure/manageValue/".urlencode("修改成功！"));
        }



}
?>