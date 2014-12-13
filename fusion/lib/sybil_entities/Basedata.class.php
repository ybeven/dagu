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
 * @property float $basedataDigreturnrate
 * @property string $basedataMinertype
 * @property int $basedataResourcesTotal
 * @property int $basedataResourcesHave
 * @property int $basedataResourcesAvailable
 * @property string $basedataLevel
 * @property string $basedataMinescale
 * @property mixed $basedataProduceScale
 * @property mixed $basedataProduceDig
 * @property mixed $basedataProduceFactory
 * @property string $basedataTaste
 * @property string $basedataTasteMain
 * @property string $basedataTasteAsso
 * @property string $basedataCoaltype
 * @property string $basedataSepa
 * @property float $basedataSepareturnrate
 * @property float $basedataValue
 * @property mixed $basedataFee
 * @property mixed $basedataProfit
 * @property int $basedataWorker
 * @property string $basedataReward
 * @property string $basedataPlan
 * @property string $basedataPlanMetal
 * @property string $basedataPlanMetalYuan
 * @property string $basedataPlanMetalJing
 * @property string $basedataPlanMetalChan
 * @property string $basedataPlanEnergy
 * @property string $basedataPlanEnergyYuan
 * @property string $basedataPlanEnergyJing
 * @property string $basedataPlanEnergyShen
 * @property string $basedataPlanNot
 * @property string $basedataPlanNotYuan
 * @property string $basedataPlanNotJing
 * @property string $basedataPlanNotShen
 * @property string $basedataDivisionsSheng
 * @property string $basedataDivisionsShi
 * @property string $basedataDivisionsXian
 * @property string $basedataDivisionsZhen
 * @property int $basedataJiqizhi
 * @property int $basedataLevelh111
 * @property int $basedataLevelh121122
 * @property int $basedataLevelh111b
 * @property int $basedataLevelh121b
 * @property int $basedataLevelh122b
 * @property int $basedataLevelh2m111
 * @property int $basedataLevelh2m21
 * @property int $basedataLevelh2m22
 * @property int $basedataLevelh2s11
 * @property int $basedataLevelh2s21
 * @property int $basedataLevelh2s22
 * @property int $basedataLevelh331
 * @property int $basedataLevelh332
 * @property int $basedataLevelh333
 * @property int $basedataLevelh334
 * @property int $basedataLevela111
 * @property int $basedataLevel121122
 * @property int $basedataLevel111b
 * @property int $basedataLevel121b
 * @property int $basedataLevel122b
 * @property int $basedataLevel2m11
 * @property int $basedataLevel2m21
 * @property int $basedataLevel2m22
 * @property int $basedataLevel2s11
 * @property int $basedataLevel2s21
 * @property int $basedataLevel2s22
 * @property int $basedataLevel331
 * @property int $basedataLevel332
 * @property int $basedataLevel333
 * @property int $basedataLevel334
 * @property string $basedataProduceDigUnit
 * @property string $basedataProduceFactoryUnit
 * @property int $basedataSepaCixuan
 * @property int $basedataSepaZhongxuan
 * @property int $basedataSepaFuxuan
 * @property int $basedataSepaDianxuan
 * @property string $basedataGreenlvl
 * @property string $basedataYuanHua
 * @property string $basedataWeiHua
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
				'basedataPlan' => 'basedata_plan',
				'basedataPlanMetal' => 'basedata_plan_metal',
				'basedataPlanMetalYuan' => 'basedata_plan_metal_yuan',
				'basedataPlanMetalJing' => 'basedata_plan_metal_jing',
				'basedataPlanMetalChan' => 'basedata_plan_metal_chan',
				'basedataPlanEnergy' => 'basedata_plan_energy',
				'basedataPlanEnergyYuan' => 'basedata_plan_energy_yuan',
				'basedataPlanEnergyJing' => 'basedata_plan_energy_jing',
				'basedataPlanEnergyShen' => 'basedata_plan_energy_shen',
				'basedataPlanNot' => 'basedata_plan_not',
				'basedataPlanNotYuan' => 'basedata_plan_not_yuan',
				'basedataPlanNotJing' => 'basedata_plan_not_jing',
				'basedataPlanNotShen' => 'basedata_plan_not_shen',
				'basedataDivisionsSheng' => 'basedata_divisions_sheng',
				'basedataDivisionsShi' => 'basedata_divisions_shi',
				'basedataDivisionsXian' => 'basedata_divisions_xian',
				'basedataDivisionsZhen' => 'basedata_divisions_zhen',
				'basedataJiqizhi' => 'basedata_jiqizhi',
				'basedataLevelh111' => 'basedata_levelh_111',
				'basedataLevelh121122' => 'basedata_levelh_121122',
				'basedataLevelh111b' => 'basedata_levelh_111b',
				'basedataLevelh121b' => 'basedata_levelh_121b',
				'basedataLevelh122b' => 'basedata_levelh_122b',
				'basedataLevelh2m111' => 'basedata_levelh_2m111',
				'basedataLevelh2m21' => 'basedata_levelh_2m21',
				'basedataLevelh2m22' => 'basedata_levelh_2m22',
				'basedataLevelh2s11' => 'basedata_levelh_2s11',
				'basedataLevelh2s21' => 'basedata_levelh_2s21',
				'basedataLevelh2s22' => 'basedata_levelh_2s22',
				'basedataLevelh331' => 'basedata_levelh_331',
				'basedataLevelh332' => 'basedata_levelh_332',
				'basedataLevelh333' => 'basedata_levelh_333',
				'basedataLevelh334' => 'basedata_levelh_334',
				'basedataLevela111' => 'basedata_levela_111',
				'basedataLevel121122' => 'basedata_level_121122',
				'basedataLevel111b' => 'basedata_level_111b',
				'basedataLevel121b' => 'basedata_level_121b',
				'basedataLevel122b' => 'basedata_level_122b',
				'basedataLevel2m11' => 'basedata_level_2m11',
				'basedataLevel2m21' => 'basedata_level_2m21',
				'basedataLevel2m22' => 'basedata_level_2m22',
				'basedataLevel2s11' => 'basedata_level_2s11',
				'basedataLevel2s21' => 'basedata_level_2s21',
				'basedataLevel2s22' => 'basedata_level_2s22',
				'basedataLevel331' => 'basedata_level_331',
				'basedataLevel332' => 'basedata_level_332',
				'basedataLevel333' => 'basedata_level_333',
				'basedataLevel334' => 'basedata_level_334',
				'basedataProduceDigUnit' => 'basedata_produce_dig_unit',
				'basedataProduceFactoryUnit' => 'basedata_produce_factory_unit',
				'basedataSepaCixuan' => 'basedata_sepa_cixuan',
				'basedataSepaZhongxuan' => 'basedata_sepa_zhongxuan',
				'basedataSepaFuxuan' => 'basedata_sepa_fuxuan',
				'basedataSepaDianxuan' => 'basedata_sepa_dianxuan',
				'basedataGreenlvl' => 'basedata_greenlvl',
				'basedataYuanHua' => 'basedata_yuan_hua',
				'basedataWeiHua' => 'basedata_wei_hua',
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
		'basedataPlan' => null,
		'basedataPlanMetal' => null,
		'basedataPlanMetalYuan' => null,
		'basedataPlanMetalJing' => null,
		'basedataPlanMetalChan' => null,
		'basedataPlanEnergy' => null,
		'basedataPlanEnergyYuan' => null,
		'basedataPlanEnergyJing' => null,
		'basedataPlanEnergyShen' => null,
		'basedataPlanNot' => null,
		'basedataPlanNotYuan' => null,
		'basedataPlanNotJing' => null,
		'basedataPlanNotShen' => null,
		'basedataDivisionsSheng' => null,
		'basedataDivisionsShi' => null,
		'basedataDivisionsXian' => null,
		'basedataDivisionsZhen' => null,
		'basedataJiqizhi' => null,
		'basedataLevelh111' => null,
		'basedataLevelh121122' => null,
		'basedataLevelh111b' => null,
		'basedataLevelh121b' => null,
		'basedataLevelh122b' => null,
		'basedataLevelh2m111' => null,
		'basedataLevelh2m21' => null,
		'basedataLevelh2m22' => null,
		'basedataLevelh2s11' => null,
		'basedataLevelh2s21' => null,
		'basedataLevelh2s22' => null,
		'basedataLevelh331' => null,
		'basedataLevelh332' => null,
		'basedataLevelh333' => null,
		'basedataLevelh334' => null,
		'basedataLevela111' => null,
		'basedataLevel121122' => null,
		'basedataLevel111b' => null,
		'basedataLevel121b' => null,
		'basedataLevel122b' => null,
		'basedataLevel2m11' => null,
		'basedataLevel2m21' => null,
		'basedataLevel2m22' => null,
		'basedataLevel2s11' => null,
		'basedataLevel2s21' => null,
		'basedataLevel2s22' => null,
		'basedataLevel331' => null,
		'basedataLevel332' => null,
		'basedataLevel333' => null,
		'basedataLevel334' => null,
		'basedataProduceDigUnit' => null,
		'basedataProduceFactoryUnit' => null,
		'basedataSepaCixuan' => null,
		'basedataSepaZhongxuan' => null,
		'basedataSepaFuxuan' => null,
		'basedataSepaDianxuan' => null,
		'basedataGreenlvl' => null,
		'basedataYuanHua' => null,
		'basedataWeiHua' => null,
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