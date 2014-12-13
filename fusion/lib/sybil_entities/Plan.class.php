<?php
/**
 * @property int $id
 * @property string $truckNumber
 * @property string $drivingNumber
 * @property int $cardCount
 * @property string $state
 * @property int $operatorId
 * @property int $workId
 * @property string $operateTime
 * @property string $remarks
 * @property Operator $operator
 * @property Work $work
 */
class Plan extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'plan',
			'columns' => array(
				'id' => 'id',
				'truckNumber' => 'truck_number',
				'drivingNumber' => 'driving_number',
				'cardCount' => 'card_count',
				'state' => 'state',
				'operatorId' => 'operator_id',
				'workId' => 'work_id',
				'operateTime' => 'operate_time',
				'remarks' => 'remarks',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'truckNumber' => null,
		'drivingNumber' => null,
		'cardCount' => null,
		'state' => null,
		'operatorId' => null,
		'workId' => null,
		'operateTime' => null,
		'remarks' => null,
	);
	protected function __get_operator() {
		if(!$this->properties['operator'] instanceof User) {
			$operator = new User;
			$operator->getById($this->properties['operatorId']);
			if($operator->id>0) $this->properties['operator'] = &$operator;
		}
		return $this->properties['operator'];
	}
	protected function __get_work() {
		if(!$this->properties['work'] instanceof WorkTime) {
			$work = new WorkTime;
			$work->getById($this->properties['workId']);
			if($work->id>0) $this->properties['work'] = &$work;
		}
		return $this->properties['work'];
	}
}
?>