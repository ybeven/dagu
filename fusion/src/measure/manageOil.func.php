<?php
function manageOil($page=0 , $notice=null){
    global $smarty;
	needLogin();
	$session = Session::start();
	
	$ac = new AccessController;
	if(!$ac->can("系统管理" , $session->curUser)){
		 ?>		     
                     <script>alert('您无权管理油品!');history.back(-1);</script>;
                 <?php
                      return;
	}
	
	$page = intval($page);
	if($page == 0){
		$page = isset($session->curUserPage)?$session->curUserPage:1;
	}
	$session->curUserPage = $page;
	
    $model = new OilModel;
    $count = $model->count("SELECT COUNT(*) FROM `oil_model`");
    $compager = compager($page, $count, ITEMS_PER_PAGE);
    $smarty->assign('compager', $compager);
	
	$modelArr = $model->getArray("SELECT * FROM `oil_model` ORDER BY `id` ASC ");
	notice($notice);
    
    $crumb = Crumb::getCrumb();
    $crumb->popAllLatitude();
    $crumb->visitNewPage("首页" , "/start" , false);
    $crumb->visitNewPage("油品管理" , "" , true);
    
    $smarty->assign('modelArr', $modelArr);
    $smarty->setTitle('油品管理');
    $smarty->displayMother('measure/manageOil.tpl');
    
}