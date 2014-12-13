<?php
/**
 * @property int $id
 * @property int $state
 * @property string $company
 * @property int $oilModelId
 * @property float $weight
 * @property int $trainNumber
 * @property string $station
 * @property string $specialline
 * @property string $consignee
 * @property string $remarks
 * @property int $mainApplyId
 * @property int $operatorId
 * @property string $operateTime
 * @property string $sendCompany
 * @property string $sendStation
 * @property string $measurekey
 * @property string $measureman
 * @property string $calculateman
 * @property string $responsibleman
 * @property string $tabletime
 * @property int $checkerId
 * @property string $checkTime
 * @property OilModel $oilModel
 * @property MainApply $mainApply
 * @property Operator $operator
 * @property Checker $checker
 */
class DetailApply extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'detail_apply',
			'columns' => array(
				'id' => 'id',
				'state' => 'state',
				'company' => 'company',
				'oilModelId' => 'oil_model_id',
				'weight' => 'weight',
				'trainNumber' => 'train_number',
				'station' => 'station',
				'specialline' => 'specialline',
				'consignee' => 'consignee',
				'remarks' => 'remarks',
				'mainApplyId' => 'main_apply_id',
				'operatorId' => 'operator_id',
				'operateTime' => 'operate_time',
				'sendCompany' => 'send_company',
				'sendStation' => 'send_station',
				'measurekey' => 'measurekey',
				'measureman' => 'measureman',
				'calculateman' => 'calculateman',
				'responsibleman' => 'responsibleman',
				'tabletime' => 'tabletime',
				'checkerId' => 'checker_id',
				'checkTime' => 'check_time',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'state' => null,
		'company' => null,
		'oilModelId' => null,
		'weight' => null,
		'trainNumber' => null,
		'station' => null,
		'specialline' => null,
		'consignee' => null,
		'remarks' => null,
		'mainApplyId' => null,
		'operatorId' => null,
		'operateTime' => null,
		'sendCompany' => null,
		'sendStation' => null,
		'measurekey' => null,
		'measureman' => null,
		'calculateman' => null,
		'responsibleman' => null,
		'tabletime' => null,
		'checkerId' => null,
		'checkTime' => null,
	);
	
	protected function __get_oilModel() {
		if(!$this->properties['oilModel'] instanceof OilModel) {
			$oilModel = new OilModel;
			$oilModel->getById($this->properties['oilModelId']);
			if($oilModel->id>0) $this->properties['oilModel'] = &$oilModel;
		}
		return $this->properties['oilModel'];
	}
	protected function __get_mainApply() {
		if(!$this->properties['mainApply'] instanceof MainApply) {
			$mainApply = new MainApply;
			$mainApply->getById($this->properties['mainApplyId']);
			if($mainApply->id>0) $this->properties['mainApply'] = &$mainApply;
		}
		return $this->properties['mainApply'];
	}
	protected function __get_operator() {
		if(!$this->properties['operator'] instanceof User) {
			$operator = new User;
			$operator->getById($this->properties['operatorId']);
			if($operator->id>0) $this->properties['operator'] = &$operator;
		}
		return $this->properties['operator'];
	}
	protected function __get_checker() {
		if(!$this->properties['checker'] instanceof User) {
			$checker = new User;
			$checker->getById($this->properties['checkerId']);
			if($checker->id>0) $this->properties['checker'] = &$checker;
		}
		return $this->properties['checker'];
	}
}
?>