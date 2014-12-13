<?php
/**
 * @property int $id
 * @property int $mineId
 * @property string $jingdu
 * @property string $weidu
 * @property Mine $mine
 */
class OreZuobiao extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'oreZuobiao',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'jingdu' => 'jingdu',
				'weidu' => 'weidu',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'jingdu' => null,
		'weidu' => null,
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