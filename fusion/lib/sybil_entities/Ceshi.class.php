<?php
/**
 * @property int $id
 * @property string $name
 * @property mixed $startTime
 * @property mixed $overTime
 */
class Ceshi extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'ceshi',
			'columns' => array(
				'id' => 'id',
				'cardId' => 'cardId',
				'truck' => 'truck',
				'oil' => 'oil',
				'state' => 'state',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'cardId' => 0,
		'truck' => 0,
		'oil' => 0,
		'state' => 0,
		
	);
}
?>