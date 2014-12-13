<?php
/**
 * @property int $id
 * @property string $name
 * @property string $password
 * @property int $roleId
 * @property int $isActive
 * @property Role $role
 */
class User extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'user',
			'columns' => array(
				'id' => 'id',
				'name' => 'name',
				'password' => 'password',
				'roleId' => 'role_id',
				'isActive' => 'is_active',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'name' => '',
		'password' => '',
		'roleId' => null,
		'isActive' => 1,
	);
	protected function __get_role() {
		if(!$this->properties['role'] instanceof Role) {
			$role = new Role;
			$role->getById($this->properties['roleId']);
			if($role->id>0) $this->properties['role'] = &$role;
		}
		return $this->properties['role'];
	}
}
?>