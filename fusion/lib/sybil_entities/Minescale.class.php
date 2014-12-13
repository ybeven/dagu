<?php
/**
 * @property int $id
 * @property string $minescaleName
 */
class Minescale extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'minescale',
			'columns' => array(
				'id' => 'id',
				'minescaleName' => 'minescale_name',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'minescaleName' => null,
	);
}
?>