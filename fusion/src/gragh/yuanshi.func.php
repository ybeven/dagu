<?php
function yuanshi($notice=null){
global $smarty;
notice($notice);
	needLogin();
        $session=Session::start();
	$curUser = $session->curUser;
	$ac = new AccessController;
	if(!$ac->can("申报信息管理" , $session->curUser)){
		?>		     
                   <script>alert('您无权添加申报信息!');history.back(-1);</script>;
        <?php
                    

                      return;	
        }
        if (!$ac->can("添加申报项目" , $session->curUser)){
                     	http302("/start/index/".urlencode('您无权添加申报项目'));
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
            $crumb->visitNewPage("原始成绩统计" , "/gragh/yuanshi" , true);	    
//            $smarty->assign('mark',$mark);
            $smarty->setTitle('数据统计管理');
            // $smarty->assign("payMileageArray",$payMileageArray);
            $smarty->displaymother('gragh/yuanshi.tpl');
}
?>
