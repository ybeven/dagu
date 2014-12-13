<?php
/**
 * @property int $id
 * @property string $name
 * @property int $def
 */
class Action extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'action',
			'columns' => array(
				'id' => 'id',
				'name' => 'name',
				'def' => 'def',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'name' => '',
		'def' => 0,
	);
}
?>