<?php
/**
 * @property int $id
 * @property string $name
 * @property string $contactPerson
 * @property string $contact
 * @property string $type
 */
class Customer extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'customer',
			'columns' => array(
				'id' => 'id',
				'name' => 'name',
				'contactPerson' => 'contact_person',
				'contact' => 'contact',
				'type' => 'type',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'name' => null,
		'contactPerson' => null,
		'contact' => null,
		'type' => null,
	);
}
?>