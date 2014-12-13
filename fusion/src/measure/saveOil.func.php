<?php
function saveOil(){
    $session = Session::start();
	if(empty($_POST['type'])) {
		http302('/measure/manageOil/'.urlencode("请输入油品类型"));
	}
	if(empty($_POST['model'])) {
		http302('/measure/manageOil/'.urlencode("请输入油品型号"));
	}
	
	needLogin();
	$type = $_POST['type'];
	$model = $_POST['model'];
	$oiltype = new OilType;
	$sql = "select * from `oil_type` WHERE oil_type ='{$type}'";
	$typecount = $oiltype->getArray($sql,true);
	$id = 111;
	if( count($typecount)<=0)
	{
	    $oiltype->oilType = $type;
	    
	    $oiltype->add();
	    $id = $oiltype->id;
	}
	else
	{
	    $id = $oiltype->id;
	}
	
	$oilmodel = new OilModel;
	$sql = "select * from `oil_model` WHERE oil_model ='{$model}' AND oil_type_id = '{$id}'";
	$modelcount = $oilmodel->getArray($sql,true);
	if( count($modelcount)>=1)
	{
	    http302('/measure/manageOil/'.urlencode("油品已存在"));
	}
	else
	{
	    $oilmodel->oilModel=$model;
	    $oilmodel->oilTypeId = $id;
	    $oilmodel->add();
	    http302('/measure/manageOil/'.urlencode("添加成功"));
	}
	
}