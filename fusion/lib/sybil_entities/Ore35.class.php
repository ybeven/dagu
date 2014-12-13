<?php
/**
 * @property int $id
 * @property int $mineId
 * @property int $oreId
 * @property string $data35name
 * @property int $data35P1
 * @property int $data35P2
 * @property int $data35P3
 * @property int $data35Aj1
 * @property int $data35Aj2
 * @property int $data35Aj3
 * @property int $data35Aj4
 * @property int $data35Aj5
 * @property int $data35As1
 * @property int $data35As2
 * @property int $data35As3
 * @property int $data35As4
 * @property int $data35As5
 * @property Mine $mine
 * @property Ore $ore
 */
class Ore35 extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'ore35',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'oreId' => 'ore_id',
				'data35name' => 'data35name',
				'data35P1' => 'data35_p1',
				'data35P2' => 'data35_p2',
				'data35P3' => 'data35_p3',
				'data35Aj1' => 'data35_aj1',
				'data35Aj2' => 'data35_aj2',
				'data35Aj3' => 'data35_aj3',
				'data35Aj4' => 'data35_aj4',
				'data35Aj5' => 'data35_aj5',
				'data35As1' => 'data35_as1',
				'data35As2' => 'data35_as2',
				'data35As3' => 'data35_as3',
				'data35As4' => 'data35_as4',
				'data35As5' => 'data35_as5',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'oreId' => null,
		'data35name' => null,
		'data35P1' => null,
		'data35P2' => null,
		'data35P3' => null,
		'data35Aj1' => null,
		'data35Aj2' => null,
		'data35Aj3' => null,
		'data35Aj4' => null,
		'data35Aj5' => null,
		'data35As1' => null,
		'data35As2' => null,
		'data35As3' => null,
		'data35As4' => null,
		'data35As5' => null,
	);
	protected function __get_mine() {
		if(!$this->properties['mine'] instanceof Mine) {
			$mine = new Mine;
			$mine->getById($this->properties['mineId']);
			if($mine->id>0) $this->properties['mine'] = &$mine;
		}
		return $this->properties['mine'];
	}
	protected function __get_ore() {
		if(!$this->properties['ore'] instanceof Ore) {
			$ore = new Ore;
			$ore->getById($this->properties['oreId']);
			if($ore->id>0) $this->properties['ore'] = &$ore;
		}
		return $this->properties['ore'];
	}
}
?>