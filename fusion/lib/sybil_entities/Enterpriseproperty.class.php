<?php
/**
 * @property int $id
 * @property string $enterprisepropertyName
 */
class Enterpriseproperty extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'enterpriseproperty',
			'columns' => array(
				'id' => 'id',
				'enterprisepropertyName' => 'enterpriseproperty_name',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'enterprisepropertyName' => null,
	);
}
?>