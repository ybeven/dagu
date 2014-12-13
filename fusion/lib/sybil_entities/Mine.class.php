<?php
/**
 * @property int $id
 * @property string $mineName
 * @property string $enterpriseName
 * @property string $enterpriseproperty
 * @property string $minescale
 * @property mixed $minescaleNum
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
 * @property string $audittype
 * @property string $audittypeMX1
 * @property string $audittypeMX2
 * @property string $audittypeMX3
 * @property int $guihua
 * @property string $time
 * @property string $diliweizhi
 * @property string $shijiquhua
 * @property string $xianjiquhua
 * @property mixed $kuangqumianji
 * @property int $zhigongshu
 * @property string $youxiaoqixian
 * @property string $orenametype
 * @property string $orename
 * @property string $fangshi
 * @property mixed $ziyuanchuliang
 * @property string $gongyishebei
 * @property string $zongheliyong
 * @property string $youchangchuzhi
 * @property string $predataTag
 * @property string $minedataTag
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
				'audittypeMX1' => 'audittypeMX1',
				'audittypeMX2' => 'audittypeMX2',
				'audittypeMX3' => 'audittypeMX3',
				'guihua' => 'guihua',
				'time' => 'time',
				'diliweizhi' => 'diliweizhi',
				'shijiquhua' => 'shijiquhua',
				'xianjiquhua' => 'xianjiquhua',
				'kuangqumianji' => 'kuangqumianji',
				'zhigongshu' => 'zhigongshu',
				'youxiaoqixian' => 'youxiaoqixian',
				'orenametype' => 'orenametype',
				'orename' => 'orename',
				'fangshi' => 'fangshi',
				'ziyuanchuliang' => 'ziyuanchuliang',
				'gongyishebei' => 'gongyishebei',
				'zongheliyong' => 'zongheliyong',
				'youchangchuzhi' => 'youchangchuzhi',
				'predataTag' => 'predataTag',
				'minedataTag' => 'minedataTag',
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
		'audittypeMX1' => null,
		'audittypeMX2' => null,
		'audittypeMX3' => null,
		'guihua' => 0,
		'time' => null,
		'diliweizhi' => null,
		'shijiquhua' => '',
		'xianjiquhua' => '',
		'kuangqumianji' => null,
		'zhigongshu' => null,
		'youxiaoqixian' => null,
		'orenametype' => null,
		'orename' => null,
		'fangshi' => null,
		'ziyuanchuliang' => null,
		'gongyishebei' => null,
		'zongheliyong' => null,
		'youchangchuzhi' => null,
		'predataTag' => '寰呭鏍�',
		'minedataTag' => '寰呭鏍�',
	);
}
?>