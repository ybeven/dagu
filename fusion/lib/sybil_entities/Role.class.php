<?php
/**
 * @property int $id
 * @property string $name
 */
class Role extends DataEntity implements AccessControllable {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'role',
			'columns' => array(
				'id' => 'id',
				'name' => 'name',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'name' => '',
	);
	public function getAclName(){
		return "acl_role";
	}
	public function getUniqueId(){
		return $this->id;
	}
	public function getInheritedAccesses(){
		return null;
	}
}
