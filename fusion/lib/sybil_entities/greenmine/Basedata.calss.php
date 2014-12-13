<?php
/**
 * @property int $id
 * @property int $mineId
 * @property string $basedataBgname
 * @property string $basedataLimit
 * @property string $basedataOrgan
 * @property string $basedataEstablish
 * @property string $basedataBgdate
 * @property string $basedataBuildtime
 * @property string $basedataMinename
 * @property string $basedataCompanyname
 * @property string $basedataOwedname
 * @property string $basedataEnterpriseproperty
 * @property string $basedataDivisions
 * @property string $basedataAreaLongitude
 * @property string $basedataAreaLatitude
 * @property int $basedataArea
 * @property string $basedataAuthority
 * @property string $basedataAuthDig
 * @property string $basedataAuthFind
 * @property int $basedataAuthArea
 * @property int $basedataAuthHeight
 * @property string $basedataAuthNum
 * @property string $basedataAuthAddress
 * @property string $basedataAuthDeadline
 * @property string $basedataAuthGetime
 * @property string $basedataAuthOrgan
 * @property string $basedataPointLongitude
 * @property string $basedataPointLatitude
 * @property string $basedataMineralMain
 * @property string $basedataMineralAsso
 * @property string $basedataDigtype
 * @property int $basedataDigreturnrate
 * @property string $basedataMinertype
 * @property int $basedataResourcesTotal
 * @property int $basedataResourcesHave
 * @property int $basedataResourcesAvailable
 * @property string $basedataLevel
 * @property string $basedataMinescale
 * @property string $basedataProduceScale
 * @property string $basedataProduceDig
 * @property string $basedataProduceFactory
 * @property string $basedataTaste
 * @property string $basedataTasteMain
 * @property string $basedataTasteAsso
 * @property string $basedataCoaltype
 * @property string $basedataSepa
 * @property int $basedataSepareturnrate
 * @property int $basedataValue
 * @property int $basedataFee
 * @property int $basedataProfit
 * @property int $basedataWorker
 * @property string $basedataReward
 * @property Mine $mine
 */
class Basedata extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'basedata',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'basedataBgname' => 'basedata_bgname',
				'basedataLimit' => 'basedata_limit',
				'basedataOrgan' => 'basedata_organ',
				'basedataEstablish' => 'basedata_establish',
				'basedataBgdate' => 'basedata_bgdate',
				'basedataBuildtime' => 'basedata_buildtime',
				'basedataMinename' => 'basedata_minename',
				'basedataCompanyname' => 'basedata_companyname',
				'basedataOwedname' => 'basedata_owedname',
				'basedataEnterpriseproperty' => 'basedata_enterpriseproperty',
				'basedataDivisions' => 'basedata_divisions',
				'basedataAreaLongitude' => 'basedata_area_longitude',
				'basedataAreaLatitude' => 'basedata_area_latitude',
				'basedataArea' => 'basedata_area',
				'basedataAuthority' => 'basedata_authority',
				'basedataAuthDig' => 'basedata_auth_dig',
				'basedataAuthFind' => 'basedata_auth_find',
				'basedataAuthArea' => 'basedata_auth_area',
				'basedataAuthHeight' => 'basedata_auth_height',
				'basedataAuthNum' => 'basedata_auth_num',
				'basedataAuthAddress' => 'basedata_auth_address',
				'basedataAuthDeadline' => 'basedata_auth_deadline',
				'basedataAuthGetime' => 'basedata_auth_getime',
				'basedataAuthOrgan' => 'basedata_auth_organ',
				'basedataPointLongitude' => 'basedata_point_longitude',
				'basedataPointLatitude' => 'basedata_point_latitude',
				'basedataMineralMain' => 'basedata_mineral_main',
				'basedataMineralAsso' => 'basedata_mineral_asso',
				'basedataDigtype' => 'basedata_digtype',
				'basedataDigreturnrate' => 'basedata_digreturnrate',
				'basedataMinertype' => 'basedata_minertype',
				'basedataResourcesTotal' => 'basedata_resources_total',
				'basedataResourcesHave' => 'basedata_resources_have',
				'basedataResourcesAvailable' => 'basedata_resources_available',
				'basedataLevel' => 'basedata_level',
				'basedataMinescale' => 'basedata_minescale',
				'basedataProduceScale' => 'basedata_produce_scale',
				'basedataProduceDig' => 'basedata_produce_dig',
				'basedataProduceFactory' => 'basedata_produce_factory',
				'basedataTaste' => 'basedata_taste',
				'basedataTasteMain' => 'basedata_taste_main',
				'basedataTasteAsso' => 'basedata_taste_asso',
				'basedataCoaltype' => 'basedata_coaltype',
				'basedataSepa' => 'basedata_sepa',
				'basedataSepareturnrate' => 'basedata_separeturnrate',
				'basedataValue' => 'basedata_value',
				'basedataFee' => 'basedata_fee',
				'basedataProfit' => 'basedata_profit',
				'basedataWorker' => 'basedata_worker',
				'basedataReward' => 'basedata_reward',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'basedataBgname' => null,
		'basedataLimit' => null,
		'basedataOrgan' => null,
		'basedataEstablish' => null,
		'basedataBgdate' => null,
		'basedataBuildtime' => null,
		'basedataMinename' => null,
		'basedataCompanyname' => null,
		'basedataOwedname' => null,
		'basedataEnterpriseproperty' => null,
		'basedataDivisions' => null,
		'basedataAreaLongitude' => null,
		'basedataAreaLatitude' => null,
		'basedataArea' => null,
		'basedataAuthority' => null,
		'basedataAuthDig' => null,
		'basedataAuthFind' => null,
		'basedataAuthArea' => null,
		'basedataAuthHeight' => null,
		'basedataAuthNum' => null,
		'basedataAuthAddress' => null,
		'basedataAuthDeadline' => null,
		'basedataAuthGetime' => null,
		'basedataAuthOrgan' => null,
		'basedataPointLongitude' => null,
		'basedataPointLatitude' => null,
		'basedataMineralMain' => null,
		'basedataMineralAsso' => null,
		'basedataDigtype' => null,
		'basedataDigreturnrate' => null,
		'basedataMinertype' => null,
		'basedataResourcesTotal' => null,
		'basedataResourcesHave' => null,
		'basedataResourcesAvailable' => null,
		'basedataLevel' => null,
		'basedataMinescale' => null,
		'basedataProduceScale' => null,
		'basedataProduceDig' => null,
		'basedataProduceFactory' => null,
		'basedataTaste' => null,
		'basedataTasteMain' => null,
		'basedataTasteAsso' => null,
		'basedataCoaltype' => null,
		'basedataSepa' => null,
		'basedataSepareturnrate' => null,
		'basedataValue' => null,
		'basedataFee' => null,
		'basedataProfit' => null,
		'basedataWorker' => null,
		'basedataReward' => null,
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