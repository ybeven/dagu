<?php
/**
 * @property int $pici
 * @property string $renyuanpici
 * @property string $jigou
 * @property int $examcardnum
 * @property string $roomsite
 * @property string $name
 * @property string $sexual
 * @property string $course
 * @property string $idcard
 * @property string $examchangci
 * @property string $examroom
 * @property float $examscore
 * @property float $leitong
 * @property float $latestscore
 * @property int $kaodian
 * @property float $alterexamscore
 * @property float $alterlatestscore
 * @property int $tag
 */
class ShanxijiansheTemp extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'shanxijianshe_temp',
			'columns' => array(
				'pici' => 'pici',
				'renyuanpici' => 'renyuanpici',
				'jigou' => 'jigou',
				'examcardnum' => 'examcardnum',
				'roomsite' => 'roomsite',
				'name' => 'name',
				'sexual' => 'sexual',
				'course' => 'course',
				'idcard' => 'idcard',
				'examchangci' => 'examchangci',
				'examroom' => 'examroom',
				'examscore' => 'examscore',
				'leitong' => 'leitong',
				'latestscore' => 'latestscore',
				'kaodian' => 'kaodian',
				'alterexamscore' => 'alterexamscore',
				'alterlatestscore' => 'alterlatestscore',
				'tag' => 'tag',
			)
		),
	);
	protected $properties = array(
		'pici' => null,
		'renyuanpici' => '',
		'jigou' => '',
		'examcardnum' => null,
		'roomsite' => '',
		'name' => '',
		'sexual' => '',
		'course' => '',
		'idcard' => '',
		'examchangci' => '',
		'examroom' => '',
		'examscore' => null,
		'leitong' => null,
		'latestscore' => null,
		'kaodian' => null,
		'alterexamscore' => 0,
		'alterlatestscore' => 0,
		'tag' => 0,
	);
}
?>