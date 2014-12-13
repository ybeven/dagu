<?php
function LastCostJS($notice=null){
global $smarty;
	needLogin();
        $session=Session::start();
	 notice($notice);
	
        $ac = new AccessController;
	if(!$ac->can("管理结算" , $session->curUser)){
		?>		     
                     <script>alert('您无权管理结算!');history.back(-1);</script>;
                <?php
                return;
        }
	$payMileageArray = array();
	

$crumb = Crumb::getCrumb();
$crumb->popAllLatitude();
$crumb->visitNewPage("首页" , "/start" , false);
$crumb->visitNewPage("结算管理" , "/JS/LastCostJS" , true);


$smarty->setTitle('结算管理');
$smarty->displaymother('JS/LastCostJS.tpl');
}
?>