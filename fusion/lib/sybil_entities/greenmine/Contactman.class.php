<?php
/**
 * @property int $id
 * @property int $mineId
 * @property string $contactmanCellphone
 * @property string $contactmanLandphone
 * @property string $contactmanFax
 * @property string $contactmanEmail
 * @property string $contactmanName
 * @property Mine $mine
 */
class Contactman extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'contactman',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'contactmanCellphone' => 'contactman_cellphone',
				'contactmanLandphone' => 'contactman_landphone',
				'contactmanFax' => 'contactman_fax',
				'contactmanEmail' => 'contactman_email',
				'contactmanName' => 'contactman_name',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'contactmanCellphone' => null,
		'contactmanLandphone' => null,
		'contactmanFax' => null,
		'contactmanEmail' => null,
		'contactmanName' => null,
	);
	protected function __get_mine() {
		if(!$this->properties['mine'] instanceof Mine) {
			$mine = new Mine;
			$mine->getById($this->properties['mineId']);
			if($mine->id>0) $this->properties['mine'] = &$mine;
		}
		return $this->properties['mine'];
	}
}
?>