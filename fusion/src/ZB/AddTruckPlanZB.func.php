<?php
function AddTruckPlanZB($notice=null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	$curUser = $session->curUser;
	$ac = new AccessController;
	if(!$ac->can("管理销售计划" , $session->curUser)){
		?>		     
                     <script>alert('您无权添加销售计划!');history.back(-1);</script>;
                 <?php
                     return;
        }
       
            $smarty->addScriptDef(<<<SCRIPTDEF
                
		<link rel="stylesheet" type="text/css" href="/css/superTables.css" />
SCRIPTDEF
            );
$smarty->addScriptDef(<<<SCRIPTDEF

<script language="javascript" type="text/javascript" src="/js/superTables.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.superTable.js"></script>
SCRIPTDEF
	);
            $crumb = Crumb::getCrumb();
            $crumb->popAllLatitude();
            $crumb->visitNewPage("首页" , "/start" , false);
            $crumb->visitNewPage("添加销售计划" , "/ZB/AddTructPlanZB" , true);

            $MClass = new OilType;
            $sql = "select * from `oil_type`";
            $sortID = $MClass->getArray($sql,true);
	    
            $CClass = new OilModel;
            $sql = "select * from `oil_model`";
            $childID = $CClass->getArray($sql,true);
	    
            $smarty->assign('sortID',$sortID);
            $smarty->assign('childID',$childID);
	    
	    $smarty->assign('oilType',$childID[0]->id);

            $mark = 2;
	    $MainapplyId = date("YmdHis",time());
	    $smarty->assign('MainapplyId',$MainapplyId);
	    
            $smarty->assign('mark',$mark);
            $smarty->setTitle('添加销售计划');
            $smarty->assign("payMileageArray",$payMileageArray);
            $smarty->displaymother('ZB/AddTruckPlanZB.tpl');
      
        /*
        $ac = new AccessController;
	if(!$ac->can("管理销售计划" , $session->curUser)){
		http302("/start/index/".urlencode('您无权添加销售计划'));
		return;
        }
        */
        
	

}
?>
