<?php
/**
 * @property int $id
 * @property string $name
 */
class Role extends DataEntity {
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
}
?>