<?php
/**
 * @property int $id
 * @property int $mineId
 * @property int $oreId
 * @property int $standardId
 * @property float $value
 * @property string $orepinweiYuan
 * @property float $orechanlv
 * @property float $orezufenYuan
 * @property string $orepinweiJing
 * @property mixed $orezufenJing
 * @property string $data35name
 * @property float $data35P1
 * @property float $data35P2
 * @property float $data35P3
 * @property float $data35Aj1
 * @property float $data35Aj2
 * @property float $data35Aj3
 * @property float $data35Aj4
 * @property float $data35Aj5
 * @property float $data35As1
 * @property float $data35As2
 * @property float $data35As3
 * @property float $data35As4
 * @property float $data35As5
 * @property Mine $mine
 * @property Ore $ore
 * @property Standard $standard
 */
class OreXkhs35 extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'ore_xkhs35',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'oreId' => 'ore_id',
				'standardId' => 'standard_id',
				'value' => 'value',
				'orepinweiYuan' => 'orepinwei_yuan',
				'orechanlv' => 'orechanlv',
				'orezufenYuan' => 'orezufen_yuan',
				'orepinweiJing' => 'orepinwei_jing',
				'orezufenJing' => 'orezufen_jing',
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
		'standardId' => null,
		'value' => null,
		'orepinweiYuan' => null,
		'orechanlv' => null,
		'orezufenYuan' => null,
		'orepinweiJing' => null,
		'orezufenJing' => null,
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
	protected function __get_standard() {
		if(!$this->properties['standard'] instanceof Standard) {
			$standard = new Standard;
			$standard->getById($this->properties['standardId']);
			if($standard->id>0) $this->properties['standard'] = &$standard;
		}
		return $this->properties['standard'];
	}
}
?>