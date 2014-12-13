<?php
/**
 * @property int $id
 * @property int $mineId
 * @property string $standardManage
 * @property string $standardGrow
 * @property int $standardGrowIsgreen
 * @property string $standardGrowChange
 * @property string $standardGrowTime
 * @property string $standardGrowComment
 * @property int $standardIsConv
 * @property int $standardIsDuty
 * @property int $standardIsSafecom
 * @property int $standardIsSafesite
 * @property int $standardIsSafecontrol
 * @property int $standardIsSafeacid
 * @property int $standardIsSafeoper
 * @property int $standardIsDutyok
 * @property int $standardIsCard
 * @property int $standardIsFile
 * @property int $standardIsLegalman
 * @property string $standardOther
 * @property string $standardWorker
 * @property int $standardWorkerCount
 * @property int $standardWorkerCost
 * @property int $standardIso4001
 * @property string $standardIso4001Organ
 * @property string $standardIso4001Time
 * @property string $standardIso4001Deadline
 * @property int $standardIso9001
 * @property string $standardIso9001Organ
 * @property string $standardIso9001Time
 * @property string $standardIso9001Deadline
 * @property Mine $mine
 */
class Standard extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'standard',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'standardManage' => 'standard_manage',
				'standardGrow' => 'standard_grow',
				'standardGrowIsgreen' => 'standard_grow_isgreen',
				'standardGrowChange' => 'standard_grow_change',
				'standardGrowTime' => 'standard_grow_time',
				'standardGrowComment' => 'standard_grow_comment',
				'standardIsConv' => 'standard_is_conv',
				'standardIsDuty' => 'standard_is_duty',
				'standardIsSafecom' => 'standard_is_safecom',
				'standardIsSafesite' => 'standard_is_safesite',
				'standardIsSafecontrol' => 'standard_is_safecontrol',
				'standardIsSafeacid' => 'standard_is_safeacid',
				'standardIsSafeoper' => 'standard_is_safeoper',
				'standardIsDutyok' => 'standard_is_dutyok',
				'standardIsCard' => 'standard_is_card',
				'standardIsFile' => 'standard_is_file',
				'standardIsLegalman' => 'standard_is_legalman',
				'standardOther' => 'standard_other',
				'standardWorker' => 'standard_worker',
				'standardWorkerCount' => 'standard_worker_count',
				'standardWorkerCost' => 'standard_worker_cost',
				'standardIso4001' => 'standard_iso4001',
				'standardIso4001Organ' => 'standard_iso4001_organ',
				'standardIso4001Time' => 'standard_iso4001_time',
				'standardIso4001Deadline' => 'standard_iso4001_deadline',
				'standardIso9001' => 'standard_iso9001',
				'standardIso9001Organ' => 'standard_iso9001_organ',
				'standardIso9001Time' => 'standard_iso9001_time',
				'standardIso9001Deadline' => 'standard_iso9001_deadline',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'standardManage' => null,
		'standardGrow' => null,
		'standardGrowIsgreen' => null,
		'standardGrowChange' => null,
		'standardGrowTime' => null,
		'standardGrowComment' => null,
		'standardIsConv' => null,
		'standardIsDuty' => null,
		'standardIsSafecom' => null,
		'standardIsSafesite' => null,
		'standardIsSafecontrol' => null,
		'standardIsSafeacid' => null,
		'standardIsSafeoper' => null,
		'standardIsDutyok' => null,
		'standardIsCard' => null,
		'standardIsFile' => null,
		'standardIsLegalman' => null,
		'standardOther' => null,
		'standardWorker' => null,
		'standardWorkerCount' => null,
		'standardWorkerCost' => null,
		'standardIso4001' => null,
		'standardIso4001Organ' => null,
		'standardIso4001Time' => null,
		'standardIso4001Deadline' => null,
		'standardIso9001' => null,
		'standardIso9001Organ' => null,
		'standardIso9001Time' => null,
		'standardIso9001Deadline' => null,
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