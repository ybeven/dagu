<?php
/**
 * @property int $id
 * @property string $cityname
 * @property int $citymine
 * @property int $citygreenmine
 */
class Provincevaluecity extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'provincevaluecity',
			'columns' => array(
				'id' => 'id',
				'cityname' => 'cityname',
				'citymine' => 'citymine',
				'citygreenmine' => 'citygreenmine',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'cityname' => null,
		'citymine' => 0,
		'citygreenmine' => 0,
	);
}
?>