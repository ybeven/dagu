<?php
function showLog($page=0, $name=null, $fromDate=null, $toDate = null) {
	global $CFG, $smarty;
	needLogin();
	$session = Session::start();
	

	$fromDateArr = date_parse($fromDate);
	$toDateArr = date_parse($toDate);
	if($fromDateArr['error_count'] + $fromDateArr['warning_count'] > 0) {
		$fromDate = date('Y-m-d H:i:s', time()-604800);// from 7 days ago
	} else {
		$fromDate = "{$fromDateArr['year']}-{$fromDateArr['month']}-{$fromDateArr['day']} 00:00:00";
	}
	if($toDateArr['error_count'] + $toDateArr['warning_count'] > 0) {
		$toDate = date('Y-m-d H:i:s');
	} else {
		$toDate = "{$toDateArr['year']}-{$toDateArr['month']}-{$toDateArr['day']} 23:59:59";
	}

	list($dsn, $user, $pass, $init) = array_values($CFG['Sybil']['LogPDO']);
	$pdo = new PDO($dsn, $user, $pass, array(
					PDO::MYSQL_ATTR_INIT_COMMAND => $init));
	$sql = "SHOW TABLES LIKE 'log_%'";
	/** @var PDOStatement */
	$ps = $pdo->query($sql);
	$logTables = $ps->fetchAll(PDO::FETCH_COLUMN);
	$smarty->assign('logTables', $logTables);
	if(array_search($name, $logTables) === false) {
		$name = 'log_all';
	}
	$smarty->assign('curLogName', $name);

	$sql = "SELECT COUNT(*) FROM `{$name}` WHERE `time` BETWEEN '{$fromDate}' AND '{$toDate}'";
	$ps = $pdo->query($sql);
	$r = $ps->fetch(PDO::FETCH_NUM);
	$itemCount = array_shift($r);
	
	$page = intval($page);
	if($page == 0) {
		$page = 1;
	}
	
	$smarty->addScriptDef(<<<SCRIPTDEF
<script language="javascript" type="text/javascript" src="/js/showLog.js"></script>
SCRIPTDEF
	);
	
	$crumb = Crumb::getCrumb();
	$crumb->popAllLatitude();
	$crumb->visitNewPage("首页" , "/start" , false);
	$crumb->visitNewPage("查看日志" , "/system/showLog" , true);
	
	$compager = compager($page, $itemCount, ITEMS_PER_PAGE);
	$smarty->assign('compager', $compager);
	$linkPostfix = "/{$name}/".strtok($fromDate, ' ').'/'.strtok($toDate, ' ');
	$smarty->assign('linkPostfix', $linkPostfix);

	$sql = "SELECT * FROM `{$name}` WHERE `time` BETWEEN '{$fromDate}' AND '{$toDate}' ORDER BY `time` DESC LIMIT {$compager['itemStart']}, {$compager['itemLimit']}";
	if($ps = $pdo->query($sql)) {

		$smarty->assign('today', date('Y-m-d'));
		$smarty->assign('fromDate', strtok($fromDate, ' '));
		$smarty->assign('toDate', strtok($toDate, ' '));
		
		$logArr = $ps->fetchAll(PDO::FETCH_ASSOC);
		$smarty->assign('logArr', $logArr);
		$smarty->setTitle('查看用户操作日志');
		$smarty->displayMother('system/showLog.tpl');
	} else {
		var_dump($pdo->errorInfo());
	}
}
?>