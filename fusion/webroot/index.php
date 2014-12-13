<?php
header('Cache-control: private, must-revalidate');
define('WEBROOT', dirname(__FILE__));
define('SRCROOT', dirname(WEBROOT).'/src');
define('LIBROOT', dirname(WEBROOT).'/lib');
define('TPLROOT', dirname(WEBROOT).'/tpl');
define('TMPROOT', dirname(WEBROOT).'/tmp');

date_default_timezone_set('Asia/Shanghai');
ini_set('default_charset', 'utf-8');
set_include_path(
	get_include_path().';'
	.LIBROOT."/Sybil/core;".LIBROOT."/Sybil/core/Exception;".LIBROOT."/Sybil/filters;".LIBROOT."/Sybil/utilities;"
	.LIBROOT."/Smarty;".LIBROOT."/Raccoon;".LIBROOT."/sybil_entities;"
	.LIBROOT."/Session;".LIBROOT."/Crumb;".LIBROOT.'/Kensho'
);
error_reporting(E_ALL^(E_USER_NOTICE|E_NOTICE));
function __autoload($className) {
	include_once($className.'.class.php');
}
include_once(SRCROOT.'/common.inc.php');
$CFG['Sybil']['PDO'] = array(
        'dsn'      =>'mysql:host=127.0.0.1;port=3306;dbname=greenmine;',
        'user'     =>'root',
        'password' =>'abc',
        'init'     =>'SET NAMES UTF8;'
);
$CFG['Sybil']['LogPDO'] = array(
        'dsn'      =>'mysql:host=127.0.0.1;port=3306;dbname=dagu_log;',
        'user'     =>'root',
        'password' =>'abc',
        'init'     =>'SET NAMES UTF8;'
);
$CFG['FCache']['path'] = TMPROOT.'/session';
$CFG['Session']['cacheType'] = 'FCache';
$CFG['Session']['cacheInitParams'] = array(
	'path' => $CFG['FCache']['path'],
);
$CFG['AccessController']['PDO'] = $CFG['Sybil']['PDO'];

define('MYSQL_DUPLICATE_KEY', 1062);
define('MYSQL_FOREIGN_KEY_RESTRICT', 1451);
define('MYSQL_FOREIGN_KEY_CONSTRAINT', 1452);

define('ITEMS_PER_PAGE', 15);

$smarty = new DaguSmarty;
$smarty->template_dir = TPLROOT;
$smarty->cache_dir = TMPROOT.'/cache';
$smarty->compile_dir = TMPROOT.'/compile';
array_push($smarty->plugins_dir, LIBROOT.'/smarty_plugins');

$path = $_SERVER["REQUEST_URI"];
list($null, $module, $function, $param) = explode('/', $path, 4);
if(empty($module)) {
	$module = "default";
}
if(empty($function)) {
	$function = "index";
}


$actArr = array("start" => 4,
				"default" => 3,
                                "predata" => 0,
                                "minedata" => 1,
                                "expert" => 2,
				"gragh" =>5,
				"gis" =>4,
				"system" => 6
				
);
$ses = $actArr[$module];

$smarty->assign('act',$ses);

$functionFile = SRCROOT."/{$module}/{$function}.func.php";
if(is_file($functionFile)) {
	include_once($functionFile);
}

if(is_null($param)) {
	$params = array();
} else {
	$params = explode('/', $param);
}
$smarty->assign('__module', $module);
$smarty->assign('__page', $function);
try {
	$ref = new ReflectionFunction($function);
	$ref->invokeArgs($params);
} catch (ReflectionException $ex) {
	echo $ex->getMessage();
	echo "<br />";
	echo $_SERVER['REQUEST_URI'];
	var_dump($_GET);
	var_dump($_POST);
}/* catch (Exception $ex) {
	echo $ex->getMessage();
}*/
?>