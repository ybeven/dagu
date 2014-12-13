<?php
/**
 * @property int $id
 * @property int $mineId
 * @property int $energyElect
 * @property int $energyElectUse
 * @property int $energyElectProduct
 * @property int $energyWater
 * @property int $energyWaterUse
 * @property int $energyWaterProduct
 * @property int $energyEnergy
 * @property int $energyEnergyUse
 * @property int $energyEnergyProduct
 * @property int $energyWaste
 * @property int $energyWasteUse
 * @property int $energyWasteNew
 * @property int $energyRubbish
 * @property int $energyRubbishUse
 * @property int $energyRubbishProduct
 * @property int $energyRubbishAll
 * @property int $energySo2
 * @property int $energySo2Product
 * @property int $energySo2Target
 * @property Mine $mine
 */
class Energy extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'energy',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'energyElect' => 'energy_elect',
				'energyElectUse' => 'energy_elect_use',
				'energyElectProduct' => 'energy_elect_product',
				'energyWater' => 'energy_water',
				'energyWaterUse' => 'energy_water_use',
				'energyWaterProduct' => 'energy_water_product',
				'energyEnergy' => 'energy_energy',
				'energyEnergyUse' => 'energy_energy_use',
				'energyEnergyProduct' => 'energy_energy_product',
				'energyWaste' => 'energy_waste',
				'energyWasteUse' => 'energy_waste_use',
				'energyWasteNew' => 'energy_waste_new',
				'energyRubbish' => 'energy_rubbish',
				'energyRubbishUse' => 'energy_rubbish_use',
				'energyRubbishProduct' => 'energy_rubbish_product',
				'energyRubbishAll' => 'energy_rubbish_all',
				'energySo2' => 'energy_so2',
				'energySo2Product' => 'energy_so2_product',
				'energySo2Target' => 'energy_so2_target',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'energyElect' => null,
		'energyElectUse' => null,
		'energyElectProduct' => null,
		'energyWater' => null,
		'energyWaterUse' => null,
		'energyWaterProduct' => null,
		'energyEnergy' => null,
		'energyEnergyUse' => null,
		'energyEnergyProduct' => null,
		'energyWaste' => null,
		'energyWasteUse' => null,
		'energyWasteNew' => null,
		'energyRubbish' => null,
		'energyRubbishUse' => null,
		'energyRubbishProduct' => null,
		'energyRubbishAll' => null,
		'energySo2' => null,
		'energySo2Product' => null,
		'energySo2Target' => null,
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