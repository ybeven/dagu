<?php
/**
 * @property int $id
 * @property string $name
 * @property string $comment
 * @property string $type
 */
class Oretype extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'oretype',
			'columns' => array(
				'id' => 'id',
				'name' => 'name',
				'comment' => 'comment',
				'type' => 'type',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'name' => null,
		'comment' => null,
		'type' => null,
	);
}
?>