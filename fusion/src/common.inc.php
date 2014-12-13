<?php
/**
 * @param string $necessary
 * @param array $array
 * @return string The first missing item from array's key
 */
function necessary($necessary, $array) {
	$n = explode(',', $necessary);
	foreach($n as $v) {
		$v = trim($v);
		if(!empty($v)) {
			if(!array_key_exists($v, $array)) {
				return $v;
			}
		}
	}
	return null;
}
/**
 * @param string $location 302 jump to url
 */
function http302($location) {
	header('HTTP/1.1 302');
	header('location:'.$location);
}

function needLogin() {
	global $smarty;
	$session = Session::start();
	if(!$session->curUser instanceof User) {
		http302('/system/login/请先登录/'.$_SERVER['REQUEST_URI']);
		die();
	}
	$smarty->assign('curUser', $session->curUser);
}

function notice($notice) {
	global $smarty;
	$smarty->assign('notice', htmlentities(urldecode($notice), ENT_QUOTES, 'UTF-8'));
}

/**
 * functions below are added by lkl
 */

/**
*	check whether all the neccessary items have been filled
*	@param array $postArray
*	@param array $post
*	@param string $item
*	@return boolean true on all the nessary items have been filled
*/
function checkNecessary($postArray , $post , &$item){
   foreach($postArray as $key => $value){
	   if(!isset($post[$key]) || $post[$key] == ""){
		   $item = $value;
		   return false;
	   }
   }
   return true;
}

/**
*check the format of each form item
*@param array $post
*@param string $postDef
*@param string $item
*@return boolean true on the validate of each form item is accurate
*/
function checkFormat($post , $postDef , &$item){
   $v = new ArrayValidator();
   $v->validate($post , $postDef);
   $failList = $v->getFailList();
   
   if(!empty($failList)){
	   foreach($failList as $key => $value){
		   $item = $key;
		   return false;	
	   }			
   }
   return true;
}
/**
 * validate $array with $def
 * check whether all items in $necessary are exist as keys in $array
 * @param array $array The array to validate
 * @param string $def The validation for $array
 * @param array $necessary The items which are required
 * @param array $emptyMsg An array keeps human readable empty messages as name => message pairs.
 * @param array $errorMsg An array keeps human readable error messages as name => message pairs.
 * @return array Empty array will be returned if validate result is okay. A name=>message array will be return when validate failed.
 */
function validate(&$array, $def, $necessary, $emptyMsg, $errorMsg) {
	foreach($array as $key => $value) {
		if($value == '') unset($array[$key]);
	}
	$result = array();
	$v = new ArrayValidator;
	$v->validate($array, $def);
	$emptyArr = array_diff_key(array_flip($necessary), $array);
	if(count($emptyArr)) {
		$result = array_intersect_key($emptyMsg, $emptyArr);
	}
	$errorArr = array_intersect_key($errorMsg, $v->getFailList());
	if(count($errorArr)) {
		$result = array_merge($result, $errorArr);
	}
	return $result;
}
/**
 * @param int $page
 * @param int $itemCount
 * @param int $itemsPerPage
 * @return array
 */
function compager(&$page, $itemCount, $itemsPerPage) {
	$maxPage = ceil($itemCount/$itemsPerPage);
	if($page > $maxPage) {
		$page = $maxPage;
	}

	$itemStart = ($page-1)*$itemsPerPage;
	if($itemStart <0) $itemStart =0;
	$itemLimit = ITEMS_PER_PAGE;
	$minPageNo = ($page-5)>0?($page-5):1;
	$maxPageNo = ($page+5)>$maxPage?$maxPage:($page+5);
	$pages = array();
	for($i = $minPageNo; $i <= $maxPageNo; $i++) {
		array_push($pages, $i);
	}
	return array(
		'itemStart'=>$itemStart,
		'itemLimit'=>$itemsPerPage,
		'pages' => $pages,
		'maxPage'=>$maxPage,
		'curPage'=>$page
	);
}
function validate1($input,$mineid,$name)
{
if($input=='')
{
echo $name;
//<script language='javascript'>alert("有必填信息为空！")</script>
http302("/predata/AddFile/".$mineid."/".urlencode("有必填信息为空！"));
die(); 
}
return;
}
// function validate2($input,$mineid)
// {
// if($input=='')
// {

// //http302("/minedata/ListMineData/".urlencode("有必填信息为空！"));
// // http302('/minedata/ListMineDetails/'.$mineid.'/'.urlencode("保存成功！")); 
// 	http302('/minedata/ListMineDetails/'.$mineid.'/'.urlencode('成功！'));
// // echo "有必填信息为空" ;
// // die();
// }
// return;
// }
class DaguSmarty extends Smarty {
	public function displayMother($childTpl, $cacheId=null, $compileId=null) {
		$this->assign('__time',date("Y年m月d日",time()));
		$this->assign('childTpl', $childTpl);
		/*$session = Session::start();
		$user = $session->curUser;
		$this->assign('curUser', $user->name); */  //to be replaced
		$this->display('mother.tpl', $cacheId, $compileId);
	}
	public function setTitle($title) {
		$this->assign('__htmlTitle', $title.'--陕西省教育建设协会');
		$this->assign('__subTitle', $title);		
	}
	private $cssDef = null;
	public function addCssDef($cssDef) {
		$this->cssDef .= $cssDef;
		$this->assign('__css', $this->cssDef);
	}
	private $scriptDef = null;
	public function addScriptDef($scriptDef) {
		$this->scriptDef .= $scriptDef;
		$this->assign('__script', $this->scriptDef);
	}
}

?>