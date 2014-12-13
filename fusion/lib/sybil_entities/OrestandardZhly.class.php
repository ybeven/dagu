<?php
/**
 * @property int $id
 * @property string $kuangzhong
 * @property string $subclass1
 * @property string $subclass2
 * @property string $subclass3
 * @property string $subclass4
 * @property string $subclass5
 * @property string $subclass6
 * @property float $standardvalues
 */
class OrestandardZhly extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'orestandard_zhly',
			'columns' => array(
				'id' => 'id',
				'kuangzhong' => 'kuangzhong',
				'subclass1' => 'subclass1',
				'subclass2' => 'subclass2',
				'subclass3' => 'subclass3',
				'subclass4' => 'subclass4',
				'subclass5' => 'subclass5',
				'subclass6' => 'subclass6',
				'standardvalues' => 'standardvalues',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'kuangzhong' => null,
		'subclass1' => null,
		'subclass2' => null,
		'subclass3' => null,
		'subclass4' => null,
		'subclass5' => null,
		'subclass6' => null,
		'standardvalues' => null,
	);
}
?>