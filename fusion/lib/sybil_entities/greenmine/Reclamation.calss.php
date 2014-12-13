<?php
/**
 * @property int $id
 * @property int $mineId
 * @property int $reclamationRate
 * @property int $reclamationRateHave
 * @property int $reclamationRateCan
 * @property int $reclamationMoney
 * @property int $reclamationPrice
 * @property Mine $mine
 */
class Reclamation extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'reclamation',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'reclamationRate' => 'reclamation_rate',
				'reclamationRateHave' => 'reclamation_rate_have',
				'reclamationRateCan' => 'reclamation_rate_can',
				'reclamationMoney' => 'reclamation_money',
				'reclamationPrice' => 'reclamation_price',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'reclamationRate' => null,
		'reclamationRateHave' => null,
		'reclamationRateCan' => null,
		'reclamationMoney' => null,
		'reclamationPrice' => null,
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