<?php
/**
 * @property int $accessibility
 * @property int $actionId
 * @property int $visitorId
 * @property Action $action
 * @property Visitor $visitor
 */
class AclUser extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'acl_user',
			'columns' => array(
				'accessibility' => 'accessibility',
				'actionId' => 'action_id',
				'visitorId' => 'visitor_id',
			)
		),
	);
	protected $properties = array(
		'accessibility' => 1,
		'actionId' => null,
		'visitorId' => null,
	);
	protected function __get_action() {
		if(!$this->properties['action'] instanceof Action) {
			$action = new Action;
			$action->getById($this->properties['actionId']);
			if($action->id>0) $this->properties['action'] = &$action;
		}
		return $this->properties['action'];
	}
	protected function __get_visitor() {
		if(!$this->properties['visitor'] instanceof Visitor) {
			$visitor = new Visitor;
			$visitor->getById($this->properties['visitorId']);
			if($visitor->id>0) $this->properties['visitor'] = &$visitor;
		}
		return $this->properties['visitor'];
	}
}
?>