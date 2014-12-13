<?php
/**
 * @param array $params
 * @param Smarty $smarty
 */
function smarty_function_sybil_options($params, &$smarty) {
	$entity = $params['entity'];
	$property = $params['property'];
	if(!$entity instanceof DataEntity) {
		$smarty->_trigger_fatal_error('sybil_option entity must be specified as DataEntity Object');
	}
	if(!is_string($property)) {
		$smarty->_trigger_fatal_error('sybil_options property must be the name string of DataEntity property');
	}
	$disabled = $params['disabled']=='true'?'disabled="disabled"':'';
	$selected = isset($params['selected'])?$params['selected']:$entity->properties[$property];
	if($params['id'] != '') {
		$idStr = " id=\"{$params['id']}\"";
	}
	$cvt = $entity->convertEnum[$property];
	$html = "<select{$idStr} name=\"{$property}\" {$disabled}>\n";
	foreach($cvt as $k=>$v) {
		$selectedHtml = $selected == $k?'selected="selected"':'';
		$html .= "<option {$selectedHtml} value=\"{$k}\">{$v}</option>\n";
	}
	$html .= "</select>";
	return $html;
}
?>