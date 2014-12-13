<?php
/**
 * topn widget calls a function defined in params['data_loader']
 * with parameters ($ref, $n, $state)
 * $ref is the data foreign key reference
 * $n is the max number of the list
 * $state is a user defined parameter
 * The return value of the function should be an array like
 * array(array('title'=>'','date'=>'','link'=>''), ...)
 * 
 * @param array $params
 * @param Smarty $smarty
 */
function widget_topn($params, &$smarty) {
	/** @var Structor */
	$structor = $smarty->get_template_vars('structor');
	if(!is_array($params['data']) && empty($params['data_loader'])) {
		$smarty->_trigger_fatal_error('you must provide either data or data_loader function for widget topn');
	}
	$ref = $params['ref'];
	$num = empty($params['num'])?10:$params['num'];
	$data = is_array($params['data'])?$params['data']:call_user_func($params['data_loader'], $ref, $num, null);
	$ul = new SimpleXMLElement('<ul/>');
	$counter = 1;
	foreach($data as $i) {
		if($counter > $num) break;
		$li = $ul->addChild('li');
		$a = $li->addChild('a', "[{$i['date']}] {$i['title']}");
		$a->addAttribute('title', $i['title']);
		$a->addAttribute('href', $i['link']);
		if($params['class']) {
			$li->addAttribute('class', $params['class']);
			$a->addAttribute('class', $params['class']);
		}
		$counter++;
	}
	if($params['class']) $ul->addAttribute('class', $params['class']);
	$xml = $ul->asXML();
	return substr($xml, strpos($xml, "\n")+1);
}


function widget_imageswitcher() {
	
}


function structor_breadcrumb($structor, &$ul, &$class, $no_link_id) {
	if(!$structor->isRoot) {
		structor_breadcrumb($structor->upper, $ul, $class, $no_link_id);
	}
	if($structor->id == $no_link_id) {
		$li = $ul->addChild('li', $structor->name);
	} else {
		$li = $ul->addChild('li');
	}
	if($class) $li->addAttribute('class', $class);
	if($structor->id != $no_link_id) {
		$a = $li->addChild('a', $structor->name);
		$a->addAttribute('href', "/index/{$structor->id}");
		if($class) $a->addAttribute('class', $class);
	}
}
/**
 * @param array $params
 * @param Smarty $smarty
 */
function widget_breadcrumb($params, &$smarty) {
	/** @var Structor */
	$structor = $smarty->get_template_vars('structor');
	$ul = new SimpleXMLElement('<ul/>');
	$no_link_id = 0;
	switch($structor->module) {
		case 'read':
			$subName = '阅读新闻';
			break;
		case 'edit':
			$subName = '编辑新闻';
			break;
		case 'lists':
			$subName = '新闻列表';
			break;
		default:
			$subName = false;
			$no_link_id = $structor->id;
	}
	structor_breadcrumb($structor, $ul, $params['class'], $no_link_id);
	if($subName) {
		$li = $ul->addChild('li', $subName);
		if($params['class']) $li->addAttribute('class', $params['class']);
	}
	if($params['class']) $ul->addAttribute('class', $params['class']);
	$xml = $ul->asXML();
	return substr($xml, strpos($xml, "\n")+1);
}
/**
 * @param array $params
 * @param Smarty $smarty
 */
function widget_rich_text($params, &$smarty) {
	/** @var Structor */
	$structor = $smarty->get_template_vars('structor');
	if(empty($params['text'])) {
		if(empty($params['data_loader'])) {
			$smarty->_trigger_fatal_error('you must provide either the text to show or a data_loader function for the widget rich_text');
		} else {
			$text = call_user_func($params['data_loader'], $params['ref'], $params['state']);
		}
	} else {
		$text = $params['text'];
	}
	return $text;
}
/**
 * @param array $params
 * @param Smarty $smarty
 */
function widget_plain_text($params, &$smarty) {
	/** @var Structor */
	$structor = $smarty->get_template_vars('structor');
	if(empty($params['text'])) {
		if(empty($params['data_loader'])) {
			$smarty->_trigger_fatal_error('you must provide either the text to show or a data_loader function for the widget plain_text');
		} else {
			$text = call_user_func($params['data_loader'], $params['ref'], $params['state']);
		}
	} else {
		$text = $params['text'];
	}
	return htmlentities($text, ENT_QUOTES, ini_get('default_charset'));
}

/**
 * @param array $params
 * @param Smarty $smarty
 */
function smarty_function_widget($params, &$smarty) {
	$type = $params['type'];
	if(function_exists('widget_'.$type)) {
		return call_user_func('widget_'.$type, $params, $smarty);
	} else {
		$smarty->_trigger_fatal_error('no such type of widget:'.$type);
	}
}