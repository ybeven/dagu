<?php
/**
 * @property int $id
 * @property string $kuangzhong
 * @property string $subclassName1
 * @property string $subclassName2
 * @property string $subclassName3
 * @property string $subclassName4
 * @property string $subclassName5
 * @property string $subclassName6
 */
class OrestandardnameXkhs extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'orestandardname_kchc',
			'columns' => array(
				'id' => 'id',
				'kuangzhong' => 'kuangzhong',
				'subclassName1' => 'subclass_name1',
				'subclassName2' => 'subclass_name2',
				'subclassName3' => 'subclass_name3',
				'subclassName4' => 'subclass_name4',
				'subclassName5' => 'subclass_name5',
				'subclassName6' => 'subclass_name6',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'kuangzhong' => null,
		'subclassName1' => null,
		'subclassName2' => null,
		'subclassName3' => null,
		'subclassName4' => null,
		'subclassName5' => null,
		'subclassName6' => null,
	);
}
?>