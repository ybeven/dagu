<?php
function SaveDriveNumberXS($mrid){
global $smarty;
	needLogin();
        $session=Session::start();
	
	
	
        $logger = new CategoryLogger('log_definition');
        //$task = new Task;
        //$task-> getByID($mrid);
	$plan = new Plan;
        $plan -> getByID($mrid);        
        $plan->drivingNumber=$_POST[drivenumber];
        $plan->update();
        
        
        /*
        $sql = "select * from `oil_model` WHERE id = $sort->oilModelId";
        $model=$modelId->getArray($sql,true);
        /*
        $typeId = new OilType;
        $sql = "select * from `oil_type` WHERE id = $model->oilTypeId";
        $type=$modelId->getArray($sql,true);
	*/
	//$smarty->setTitle('查看销售计划');
        //$smarty->displaymother('/ShowTruckPlanXS/{$mrid}');
        http302('/XS/ShowTruckPlanXS/'.$mrid.'/'.urlencode('行驶证号保存成功'));
}
?>