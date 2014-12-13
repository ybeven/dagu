<?php
/**
 * @property int $id
 * @property int $mineId
 * @property string $legal1Num
 * @property string $legal1Deadline
 * @property string $legal1Ischeck
 * @property string $legal1Comm
 * @property string $legal2Num
 * @property string $legal2Deadline
 * @property string $legal2Ischeck
 * @property string $legal2Comm
 * @property string $legal3Num
 * @property string $legal3Deadline
 * @property string $legal3Ischeck
 * @property string $legal3Comm
 * @property string $legal4Num
 * @property string $legal4Deadline
 * @property string $legal4Ischeck
 * @property string $legal4Comm
 * @property string $legal5Num
 * @property string $legal5Deadline
 * @property string $legal5Ischeck
 * @property string $legal5Comm
 * @property string $legal6Num
 * @property string $legal6Deadline
 * @property string $legal6Ischeck
 * @property string $legal6Comm
 * @property string $legal7Num
 * @property string $legal7Deadline
 * @property string $legal7Ischeck
 * @property string $legal7Comm
 * @property string $legal8Num
 * @property string $legal8Deadline
 * @property string $legal8Ischeck
 * @property string $legal8Comm
 * @property string $legal9Num
 * @property string $legal9Time
 * @property string $legal9Comm
 * @property string $legal10Num
 * @property string $legal10Deadline
 * @property string $legal10Ischeck
 * @property string $legal10Comm
 * @property string $legal11Num
 * @property string $legal11Deadline
 * @property string $legal11Ischeck
 * @property string $legal11Comm
 * @property string $legal12Num
 * @property string $legal12Deadline
 * @property string $legal12Ischeck
 * @property string $legal12Comm
 * @property string $legal13Num
 * @property string $legal13Deadline
 * @property string $legal13Ischeck
 * @property string $legal13Comm
 * @property string $legal14Num
 * @property string $legal14Deadline
 * @property string $legal14Ischeck
 * @property string $legal14Comm
 * @property string $legal15Num
 * @property string $legal15Deadline
 * @property string $legal15Ischeck
 * @property string $legal15Comm
 * @property int $legalSafeIshave
 * @property string $legalSafeName
 * @property string $legalSafeOrgan
 * @property string $legalSafeTime
 * @property string $legalSafeDeadline
 * @property int $legalWaterIshave
 * @property string $legalWaterName
 * @property string $legalWaterOrgan
 * @property string $legalWaterTime
 * @property string $legalWaterDeadline
 * @property int $legalLandIshave
 * @property string $legalLandName
 * @property string $legalLandOrgan
 * @property string $legalLandTime
 * @property string $legalLandDeadline
 * @property int $legalFeeRecom
 * @property int $legalFeeOver
 * @property int $legalFeeResource
 * @property int $legalFeeValueadd
 * @property int $legalFeeCompany
 * @property int $legalFeeTopay
 * @property int $legalFeeNotpay
 * @property int $legalFeeEnsure
 * @property int $legalFeeEnvironment
 * @property int $legalFeeLand
 * @property int $legalAccidentIshave
 * @property string $legalAccidentPlace
 * @property string $legalAccidentTime
 * @property string $legalAccidentDeal
 * @property int $legalPolluteIshave
 * @property string $legalPollutePlace
 * @property string $legalPolluteTime
 * @property string $legalPolluteDeal
 * @property int $legalPunishIshave
 * @property string $legalPunishReson
 * @property string $legalPunishTime
 * @property string $legalPunishPerson
 * @property int $legalIsaccplan
 * @property int $legalHaveplan
 * @property int $legalSecure
 * @property int $legalSecureMonitor
 * @property int $legalSecurePerson
 * @property int $legalSecureEmergency
 * @property int $legalSecureWind
 * @property int $legalSecureWater
 * @property int $legalSecureCommunicate
 * @property int $legalPriceTopay
 * @property int $legalPricePayed
 * @property int $legalPriceNopay
 * @property string $legalPriceTime
 * @property Mine $mine
 */
class Legal extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'legal',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'legal1Num' => 'legal_1_num',
				'legal1Deadline' => 'legal_1_deadline',
				'legal1Ischeck' => 'legal_1_ischeck',
				'legal1Comm' => 'legal_1_comm',
				'legal2Num' => 'legal_2_num',
				'legal2Deadline' => 'legal_2_deadline',
				'legal2Ischeck' => 'legal_2_ischeck',
				'legal2Comm' => 'legal_2_comm',
				'legal3Num' => 'legal_3_num',
				'legal3Deadline' => 'legal_3_deadline',
				'legal3Ischeck' => 'legal_3_ischeck',
				'legal3Comm' => 'legal_3_comm',
				'legal4Num' => 'legal_4_num',
				'legal4Deadline' => 'legal_4_deadline',
				'legal4Ischeck' => 'legal_4_ischeck',
				'legal4Comm' => 'legal_4_comm',
				'legal5Num' => 'legal_5_num',
				'legal5Deadline' => 'legal_5_deadline',
				'legal5Ischeck' => 'legal_5_ischeck',
				'legal5Comm' => 'legal_5_comm',
				'legal6Num' => 'legal_6_num',
				'legal6Deadline' => 'legal_6_deadline',
				'legal6Ischeck' => 'legal_6_ischeck',
				'legal6Comm' => 'legal_6_comm',
				'legal7Num' => 'legal_7_num',
				'legal7Deadline' => 'legal_7_deadline',
				'legal7Ischeck' => 'legal_7_ischeck',
				'legal7Comm' => 'legal_7_comm',
				'legal8Num' => 'legal_8_num',
				'legal8Deadline' => 'legal_8_deadline',
				'legal8Ischeck' => 'legal_8_ischeck',
				'legal8Comm' => 'legal_8_comm',
				'legal9Num' => 'legal_9_num',
				'legal9Time' => 'legal_9_time',
				'legal9Comm' => 'legal_9_comm',
				'legal10Num' => 'legal_10_num',
				'legal10Deadline' => 'legal_10_deadline',
				'legal10Ischeck' => 'legal_10_ischeck',
				'legal10Comm' => 'legal_10_comm',
				'legal11Num' => 'legal_11_num',
				'legal11Deadline' => 'legal_11_deadline',
				'legal11Ischeck' => 'legal_11_ischeck',
				'legal11Comm' => 'legal_11_comm',
				'legal12Num' => 'legal_12_num',
				'legal12Deadline' => 'legal_12_deadline',
				'legal12Ischeck' => 'legal_12_ischeck',
				'legal12Comm' => 'legal_12_comm',
				'legal13Num' => 'legal_13_num',
				'legal13Deadline' => 'legal_13_deadline',
				'legal13Ischeck' => 'legal_13_ischeck',
				'legal13Comm' => 'legal_13_comm',
				'legal14Num' => 'legal_14_num',
				'legal14Deadline' => 'legal_14_deadline',
				'legal14Ischeck' => 'legal_14_ischeck',
				'legal14Comm' => 'legal_14_comm',
				'legal15Num' => 'legal_15_num',
				'legal15Deadline' => 'legal_15_deadline',
				'legal15Ischeck' => 'legal_15_ischeck',
				'legal15Comm' => 'legal_15_comm',
				'legalSafeIshave' => 'legal_safe_ishave',
				'legalSafeName' => 'legal_safe_name',
				'legalSafeOrgan' => 'legal_safe_organ',
				'legalSafeTime' => 'legal_safe_time',
				'legalSafeDeadline' => 'legal_safe_deadline',
				'legalWaterIshave' => 'legal_water_ishave',
				'legalWaterName' => 'legal_water_name',
				'legalWaterOrgan' => 'legal_water_organ',
				'legalWaterTime' => 'legal_water_time',
				'legalWaterDeadline' => 'legal_water_deadline',
				'legalLandIshave' => 'legal_land_ishave',
				'legalLandName' => 'legal_land_name',
				'legalLandOrgan' => 'legal_land_organ',
				'legalLandTime' => 'legal_land_time',
				'legalLandDeadline' => 'legal_land_deadline',
				'legalFeeRecom' => 'legal_fee_recom',
				'legalFeeOver' => 'legal_fee_over',
				'legalFeeResource' => 'legal_fee_resource',
				'legalFeeValueadd' => 'legal_fee_valueadd',
				'legalFeeCompany' => 'legal_fee_company',
				'legalFeeTopay' => 'legal_fee_topay',
				'legalFeeNotpay' => 'legal_fee_notpay',
				'legalFeeEnsure' => 'legal_fee_ensure',
				'legalFeeEnvironment' => 'legal_fee_environment',
				'legalFeeLand' => 'legal_fee_land',
				'legalAccidentIshave' => 'legal_accident_ishave',
				'legalAccidentPlace' => 'legal_accident_place',
				'legalAccidentTime' => 'legal_accident_time',
				'legalAccidentDeal' => 'legal_accident_deal',
				'legalPolluteIshave' => 'legal_pollute_ishave',
				'legalPollutePlace' => 'legal_pollute_place',
				'legalPolluteTime' => 'legal_pollute_time',
				'legalPolluteDeal' => 'legal_pollute_deal',
				'legalPunishIshave' => 'legal_punish_ishave',
				'legalPunishReson' => 'legal_punish_reson',
				'legalPunishTime' => 'legal_punish_time',
				'legalPunishPerson' => 'legal_punish_person',
				'legalIsaccplan' => 'legal_isaccplan',
				'legalHaveplan' => 'legal_haveplan',
				'legalSecure' => 'legal_secure',
				'legalSecureMonitor' => 'legal_secure_monitor',
				'legalSecurePerson' => 'legal_secure_person',
				'legalSecureEmergency' => 'legal_secure_emergency',
				'legalSecureWind' => 'legal_secure_wind',
				'legalSecureWater' => 'legal_secure_water',
				'legalSecureCommunicate' => 'legal_secure_communicate',
				'legalPriceTopay' => 'legal_price_topay',
				'legalPricePayed' => 'legal_price_payed',
				'legalPriceNopay' => 'legal_price_nopay',
				'legalPriceTime' => 'legal_price_time',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'legal1Num' => null,
		'legal1Deadline' => null,
		'legal1Ischeck' => null,
		'legal1Comm' => null,
		'legal2Num' => null,
		'legal2Deadline' => null,
		'legal2Ischeck' => null,
		'legal2Comm' => null,
		'legal3Num' => null,
		'legal3Deadline' => null,
		'legal3Ischeck' => null,
		'legal3Comm' => null,
		'legal4Num' => null,
		'legal4Deadline' => null,
		'legal4Ischeck' => null,
		'legal4Comm' => null,
		'legal5Num' => null,
		'legal5Deadline' => null,
		'legal5Ischeck' => null,
		'legal5Comm' => null,
		'legal6Num' => null,
		'legal6Deadline' => null,
		'legal6Ischeck' => null,
		'legal6Comm' => null,
		'legal7Num' => null,
		'legal7Deadline' => null,
		'legal7Ischeck' => null,
		'legal7Comm' => null,
		'legal8Num' => null,
		'legal8Deadline' => null,
		'legal8Ischeck' => null,
		'legal8Comm' => null,
		'legal9Num' => null,
		'legal9Time' => null,
		'legal9Comm' => null,
		'legal10Num' => null,
		'legal10Deadline' => null,
		'legal10Ischeck' => null,
		'legal10Comm' => null,
		'legal11Num' => null,
		'legal11Deadline' => null,
		'legal11Ischeck' => null,
		'legal11Comm' => null,
		'legal12Num' => null,
		'legal12Deadline' => null,
		'legal12Ischeck' => null,
		'legal12Comm' => null,
		'legal13Num' => null,
		'legal13Deadline' => null,
		'legal13Ischeck' => null,
		'legal13Comm' => null,
		'legal14Num' => null,
		'legal14Deadline' => null,
		'legal14Ischeck' => null,
		'legal14Comm' => null,
		'legal15Num' => null,
		'legal15Deadline' => null,
		'legal15Ischeck' => null,
		'legal15Comm' => null,
		'legalSafeIshave' => null,
		'legalSafeName' => null,
		'legalSafeOrgan' => null,
		'legalSafeTime' => null,
		'legalSafeDeadline' => null,
		'legalWaterIshave' => null,
		'legalWaterName' => null,
		'legalWaterOrgan' => null,
		'legalWaterTime' => null,
		'legalWaterDeadline' => null,
		'legalLandIshave' => null,
		'legalLandName' => null,
		'legalLandOrgan' => null,
		'legalLandTime' => null,
		'legalLandDeadline' => null,
		'legalFeeRecom' => null,
		'legalFeeOver' => null,
		'legalFeeResource' => null,
		'legalFeeValueadd' => null,
		'legalFeeCompany' => null,
		'legalFeeTopay' => null,
		'legalFeeNotpay' => null,
		'legalFeeEnsure' => null,
		'legalFeeEnvironment' => null,
		'legalFeeLand' => null,
		'legalAccidentIshave' => null,
		'legalAccidentPlace' => null,
		'legalAccidentTime' => null,
		'legalAccidentDeal' => null,
		'legalPolluteIshave' => null,
		'legalPollutePlace' => null,
		'legalPolluteTime' => null,
		'legalPolluteDeal' => null,
		'legalPunishIshave' => null,
		'legalPunishReson' => null,
		'legalPunishTime' => null,
		'legalPunishPerson' => null,
		'legalIsaccplan' => null,
		'legalHaveplan' => null,
		'legalSecure' => null,
		'legalSecureMonitor' => null,
		'legalSecurePerson' => null,
		'legalSecureEmergency' => null,
		'legalSecureWind' => null,
		'legalSecureWater' => null,
		'legalSecureCommunicate' => null,
		'legalPriceTopay' => null,
		'legalPricePayed' => null,
		'legalPriceNopay' => null,
		'legalPriceTime' => null,
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