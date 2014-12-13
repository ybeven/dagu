<?php
/**
 * @property int $id
 * @property string $mineId
 * @property string $auditNation
 * @property string $auditNationTime
 * @property string $auditPlace
 * @property string $auditPlaceTime
 * @property string $auditIndustry
 * @property string $auditIndustryTime
 * @property Mine $mine
 */
class Audit extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'audit',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'auditNation' => 'audit_nation',
				'auditNationTime' => 'audit_nation_time',
				'auditPlace' => 'audit_place',
				'auditPlaceTime' => 'audit_place_time',
				'auditIndustry' => 'audit_industry',
				'auditIndustryTime' => 'audit_industry_time',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'auditNation' => null,
		'auditNationTime' => null,
		'auditPlace' => null,
		'auditPlaceTime' => null,
		'auditIndustry' => null,
		'auditIndustryTime' => null,
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