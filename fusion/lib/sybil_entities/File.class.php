<?php
/**
 * @property int $id
 * @property int $mineId
 * @property string $fileData
 * @property string $fileType
 * @property string $fileName
 * @property string $fileSize
 * @property string $type
 * @property Mine $mine
 */
class File extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'file',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'fileData' => 'file_data',
				'fileType' => 'file_type',
				'fileName' => 'file_name',
				'fileSize' => 'file_size',
				'type' => 'type',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'fileData' => '',
		'fileType' => '',
		'fileName' => '',
		'fileSize' => '',
		'type' => '',
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