<?php
/**
 * @property int $id
 * @property int $mineId
 * @property int $scienceRate
 * @property int $scienceRateScimoney
 * @property int $scienceRateAllmoney
 * @property int $scienceRateIsone
 * @property int $sciencePatent
 * @property int $sciencePatentCreat
 * @property int $sciencePatentNewuse
 * @property int $scienceManrate
 * @property int $scienceManrateLow
 * @property int $scienceManrateMid
 * @property int $scienceManrateHigh
 * @property int $scienceManrateAll
 * @property Mine $mine
 */
class Science extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'science',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'scienceRate' => 'science_rate',
				'scienceRateScimoney' => 'science_rate_scimoney',
				'scienceRateAllmoney' => 'science_rate_allmoney',
				'scienceRateIsone' => 'science_rate_isone',
				'sciencePatent' => 'science_patent',
				'sciencePatentCreat' => 'science_patent_creat',
				'sciencePatentNewuse' => 'science_patent_newuse',
				'scienceManrate' => 'science_manrate',
				'scienceManrateLow' => 'science_manrate_low',
				'scienceManrateMid' => 'science_manrate_mid',
				'scienceManrateHigh' => 'science_manrate_high',
				'scienceManrateAll' => 'science_manrate_all',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'scienceRate' => null,
		'scienceRateScimoney' => null,
		'scienceRateAllmoney' => null,
		'scienceRateIsone' => null,
		'sciencePatent' => null,
		'sciencePatentCreat' => null,
		'sciencePatentNewuse' => null,
		'scienceManrate' => null,
		'scienceManrateLow' => null,
		'scienceManrateMid' => null,
		'scienceManrateHigh' => null,
		'scienceManrateAll' => null,
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