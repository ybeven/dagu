<?php
/**
 * @param array $params
 * @param Smarty $smarty
 */
function smarty_function_sybil_entity_options($params, &$smarty) {
	$entity = $params['entity'];
	$property = $params['property'];
	if(!$entity instanceof DataEntity) {
		$smarty->_trigger_fatal_error('sybil_option entity must be specified as DataEntity Object');
	}
	if(!is_string($property)) {
		$smarty->_trigger_fatal_error('sybil_options property must be the name string of DataEntity property');
	}
	$disabled = $params['disabled']=='true'?'disabled="disabled"':'';
	$selected = isset($params['selected'])?$params['selected']:$entity->id;
	if($params['id'] != '') {
		$idStr = " id=\"{$params['id']}\"";
	}
	$name = get_class($entity);
	$name[0] = strtolower($name[0]);
	$entities = $entity->getArray(new LimitFilter(0, 200));
	$html = "<select{$idStr} name=\"{$name}\" {$disabled}>\n";
	foreach($entities as $entity) {
		$selectedHtml = $selected == $entity->id?'selected="selected"':'';
		$html .= "<option {$selectedHtml} value=\"{$entity->id}\">{$entity->$property}</option>\n";
	}
	$html .= "</select>";
	return $html;
}
?>