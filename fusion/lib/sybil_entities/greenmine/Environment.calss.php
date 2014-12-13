<?php
/**
 * @property int $id
 * @property int $mineId
 * @property int $environmentRate
 * @property int $environmentRateGreen
 * @property int $environmentRateArea
 * @property string $environmentIsThree
 * @property string $environmentIsDisaster
 * @property string $environmentIsAir
 * @property string $environmentIsWater
 * @property string $environmentIsSound
 * @property Mine $mine
 */
class Environment extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'environment',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'environmentRate' => 'environment_rate',
				'environmentRateGreen' => 'environment_rate_green',
				'environmentRateArea' => 'environment_rate_area',
				'environmentIsThree' => 'environment_is_three',
				'environmentIsDisaster' => 'environment_is_disaster',
				'environmentIsAir' => 'environment_is_air',
				'environmentIsWater' => 'environment_is_water',
				'environmentIsSound' => 'environment_is_sound',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'environmentRate' => null,
		'environmentRateGreen' => null,
		'environmentRateArea' => null,
		'environmentIsThree' => null,
		'environmentIsDisaster' => null,
		'environmentIsAir' => null,
		'environmentIsWater' => null,
		'environmentIsSound' => null,
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