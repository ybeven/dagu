<?php
/**
 * @property int $id
 * @property string $mineName
 * @property string $enterpriseName
 * @property string $enterpriseproperty
 * @property string $minescale
 * @property int $minescaleNum
 * @property string $address
 * @property string $mailcode
 * @property string $auditopinion1
 * @property string $auditopinion2
 * @property string $auditopinion3
 * @property string $audittime1
 * @property string $audittime2
 * @property string $audittime3
 * @property string $environmentrecovery
 * @property string $landreclamation
 * @property int $audittype
 */
class Mine extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'mine',
			'columns' => array(
				'id' => 'id',
				'mineName' => 'mine_name',
				'enterpriseName' => 'enterprise_name',
				'enterpriseproperty' => 'enterpriseproperty',
				'minescale' => 'minescale',
				'minescaleNum' => 'minescale_num',
				'address' => 'address',
				'mailcode' => 'mailcode',
				'auditopinion1' => 'auditopinion1',
				'auditopinion2' => 'auditopinion2',
				'auditopinion3' => 'auditopinion3',
				'audittime1' => 'audittime1',
				'audittime2' => 'audittime2',
				'audittime3' => 'audittime3',
				'environmentrecovery' => 'environmentrecovery',
				'landreclamation' => 'landreclamation',
				'audittype' => 'audittype',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineName' => null,
		'enterpriseName' => null,
		'enterpriseproperty' => null,
		'minescale' => null,
		'minescaleNum' => null,
		'address' => null,
		'mailcode' => null,
		'auditopinion1' => null,
		'auditopinion2' => null,
		'auditopinion3' => null,
		'audittime1' => null,
		'audittime2' => null,
		'audittime3' => null,
		'environmentrecovery' => null,
		'landreclamation' => null,
		'audittype' => null,
	);
}
?>