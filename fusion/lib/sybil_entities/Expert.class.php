<?php
/**
 * @property int $id
 * @property string $expertName
 * @property int $expertSex
 * @property int $expertAge
 * @property string $expertCompany
 * @property string $expertTitles
 * @property string $expertWork
 * @property string $expertSubject
 * @property string $expertCellphone
 * @property string $expertCellphone2
 * @property string $expertLandhone
 * @property string $expertLandhone2
 * @property string $expertEmail
 * @property string $expertFax
 * @property string $expertAddress
 * @property string $expertIdea
 * @property string $expertTime
 * @property int $mineId
 * @property int $isshenbao
 * @property Mine $mine
 */
class Expert extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'expert',
			'columns' => array(
				'id' => 'id',
				'expertName' => 'expert_name',
				'expertSex' => 'expert_sex',
				'expertAge' => 'expert_age',
				'expertCompany' => 'expert_company',
				'expertTitles' => 'expert_titles',
				'expertWork' => 'expert_work',
				'expertSubject' => 'expert_subject',
				'expertCellphone' => 'expert_cellphone',
				'expertCellphone2' => 'expert_cellphone2',
				'expertLandhone' => 'expert_landhone',
				'expertLandhone2' => 'expert_landhone2',
				'expertEmail' => 'expert_email',
				'expertFax' => 'expert_fax',
				'expertAddress' => 'expert_address',
				'expertIdea' => 'expert_idea',
				'expertTime' => 'expert_time',
				'mineId' => 'mine_id',
				'isshenbao' => 'isshenbao',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'expertName' => null,
		'expertSex' => null,
		'expertAge' => null,
		'expertCompany' => null,
		'expertTitles' => null,
		'expertWork' => null,
		'expertSubject' => null,
		'expertCellphone' => null,
		'expertCellphone2' => null,
		'expertLandhone' => null,
		'expertLandhone2' => null,
		'expertEmail' => null,
		'expertFax' => null,
		'expertAddress' => null,
		'expertIdea' => null,
		'expertTime' => null,
		'mineId' => null,
		'isshenbao' => null,
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