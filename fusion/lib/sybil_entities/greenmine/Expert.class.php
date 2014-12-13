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
	);
}
?>