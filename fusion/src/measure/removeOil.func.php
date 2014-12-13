<?php
function removeOil($roleId) {
	needLogin();
	$session = Session::start();
	

        $task = new Task;
	$sql = "select * from `task` WHERE oil_model_id  = $roleId";
	$oil = $task->getArray($sql,true);
	if($oil !=  null )
	{
		http302('/measure/manageOil/auto/'.urlencode('在用油品,无法删除！'));
		return;

	}
	
		$role = new OilModel;
		$role->getById($roleId);
		
			$type = new OilType;
			$type->getById($role->oilTypeId);
			$role->remove($roleId, false);
			$type->remove($role->oilTypeId,false);
			
			
			
			
			
	http302('/measure/manageOil/auto/'.urlencode('删除成功！'));
}
?>