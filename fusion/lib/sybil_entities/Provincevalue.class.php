<?php
/**
 * @property int $mineAll
 * @property int $greenmineall
 * @property mixed $environment
 * @property mixed $land
 * @property mixed $landrate
 * @property int $id
 */
class Provincevalue extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'provincevalue',
			'columns' => array(
				'mineAll' => 'mineAll',
				'greenmineall' => 'greenmineall',
				'environment' => 'environment',
				'land' => 'land',
				'landrate' => 'landrate',
				'id' => 'id',
			)
		),
	);
	protected $properties = array(
		'mineAll' => 0,
		'greenmineall' => 0,
		'environment' => 0,
		'land' => 0,
		'landrate' => 0,
		'id' => 0,
	);
}
?>