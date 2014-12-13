<?php
/**
 * @property int $id
 * @property float $difference
 */
class MeasureDifference extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'measure_difference',
			'columns' => array(
				'id' => 'id',
				'difference' => 'difference',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'difference' => null,
	);
}
?>