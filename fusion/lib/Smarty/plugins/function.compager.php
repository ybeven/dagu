<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {compager} function plugin
 *
 * Type:     function<br>
 * Name:     compager<br>
 * Purpose:  print out page links
 * @author GuangXiN <rek at rek dot me>
 * 
 * @param array parameters
 * @param Smarty
 * @return string|null
 */
function smarty_function_compager($params, &$smarty) {
	$prefix = $params['linkPrefix'];
	$postfix = isset($params['linkPostfix'])?$params['linkPostfix']:$params['linkSuffix'];
	$curPage = intval($params['info']['curPage']);
	if($curPage < 0) {
		$smarty->trigger_error('compager info array format error');
	}
	$maxPage = intval($params['info']['maxPage']);
	$pages = $params['info']['pages'];

	if($curPage > 1) {
		compager_echo_link($prefix, 1, $postfix, '首页');
		compager_echo_delimiter();
		compager_echo_link($prefix, $curPage-1, $postfix, '上一页');
	} else {
		echo '首页';
		compager_echo_delimiter();
		echo '上一页';
	}
	compager_echo_delimiter();

	if(!empty($pages)) {
		foreach($pages as $page) {
			if($curPage == $page) {
				echo $page;
			} else {
				compager_echo_link($prefix, $page, $postfix, $page);
			}
			compager_echo_delimiter();
		}
	}

	if($curPage < $maxPage) {
		compager_echo_link($prefix, $curPage + 1, $postfix, '下一页');
		compager_echo_delimiter();
		compager_echo_link($prefix, $maxPage, $postfix, '末页');
	} else {
		echo '下一页';
		compager_echo_delimiter();
		echo '末页';
	}
}
function compager_echo_link($prefix, $page, $postfix, $word) {
	echo "<a href=\"{$prefix}{$page}{$postfix}\">{$word}</a>";
}
function compager_echo_delimiter() {
	echo '&nbsp;';
}
?>