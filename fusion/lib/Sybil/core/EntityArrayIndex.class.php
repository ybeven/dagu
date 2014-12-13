<?php
/**
 * @property int $id
 * @property string $name
 * @property int $firstIndex
 * @property int $lastIndex
 */
class EntityArrayIndex extends DataEntity {
	private $sem;
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'entity_array_index',
			'columns' => array(
				'id' => 'id',
				'name' => 'name',
				'firstIndex' => 'first_index',
				'lastIndex' => 'last_index',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'name' => '',
		'firstIndex' => 0,
		'lastIndex' => 0,
	);
	protected static $access = array(
		'id' => DataEntity::PROP_READ,
		'name' => DataEntity::PROP_READ,
		'__DEFAULT__' => DataEntity::PROP_BOTH
	);
	public function __destruct() {
		$this->update();
		$mc = new MCache;
		$mc->set('EntityArrayIndex-'.$this->name, $this, 300);
		if($this->sem instanceof Semaphore)
			$this->sem->release();
	}
	public function reinit() {
		$this->firstIndex = 0;
		$this->lastIndex  = 0;
	}
	public function __sleep() {
		return array('properties','debugMode');
	}
	public function __construct($name) {
		parent::__construct();
		$mc = new MCache();
		$this->sem = new Semaphore('EntityArrayIndex-'.$name);
		$this->sem->acquire();
		/*@var EntityArrayIndex*/
		$idx = $mc->get('EntityArrayIndex-'.$name);
		if($idx) {
			$this->properties['id'] = $idx->id;
			$this->properties['name'] = $idx->name;
			$this->firstIndex = $idx->firstIndex;
			$this->lastIndex = $idx->lastIndex;
		} else {
			$r = $this->exec("SELECT * FROM `entity_array_index` WHERE `name`='{$name}';", true);
			if(!empty($r[0])) {
				$this->createFromSqlResult($r[0]);
			} else {
				$this->properties['name'] = $name;
				$this->firstIndex = 0;
				$this->lastIndex = 0;
				$this->add();
			}
		}
	}
}
?>