<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {crumb} function plugin
 *
 * Type:     function<br>
 * Name:     crumb<br>
 * Purpose:  layout the crumb
 * @author ceven <likailin1986@gmail.com>
 * 
 * @param array parameters
 * @param Smarty
 * @return string|null
 */
function smarty_function_crumb($params, &$smarty) {
    $crumb = Crumb::getCrumb();
    echo $crumb->loadCrumbs();
}