<?php
/**
 * @property int $id
 * @property int $pici
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
 */
class Shanxijianshe extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'shanxijianshe',
			'columns' => array(
				'id' => 'id',
				'pici' => 'pici',
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
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'pici' => null,
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
		'kaodian' => 0,
	);
}
?>