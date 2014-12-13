<?php
class CachedEntity {
	/** @var DataEntity */
	private $entity;
	/** @var KeyValueCache */
	private $cache;

	/**
	 * @param DataEntity $entity
	 * @param KeyValueCache $keyValueCache
	 */
	public function __construct($entity, $keyValueCache=null) {
		if(!$entity instanceof DataEntity) {
			throw new ArgumentException('$entity must be an instance of DataEntity');
		}
		$this->entity = $entity;
		if($keyValueCache instanceof KeyValueCache) {
			$this->cache = $keyValueCache;
		} else {
			$this->cache = new NoCache;
		}
	}
	public function add() {
		$this->entity->add();
		$this->cache->set(get_class($this->entity).'-'.$this->entity->id, $this->entity);
		return $this->entity;
	}
	public function update() {
		$this->entity->update();
		$this->cache->set($this->entity->__toString(), $this->entity);
		return $this->entity;
	}
	public function getById($id) {
		return $this->cache->get(
			get_class($this->entity).'-'.$id,
			array(
				$this->entity,
				'getById'
			),
			$id
		);
	}
	public function getArray($arg) {
		if(is_string($arg)) {
			$sql = $arg;
		} else if($arg instanceof DataFilter){
			$sql = $arg->getSQL();
		}
		return $this->cache->get(
			get_class($this->entity).'|'.hash('md4', $sql),
			array(
				$entity,
				'getArray'
			),
			$arg
		);
	}
	public function count($arg) {
		if(is_string($arg)) {
			$sql = $arg;
		} else if($arg instanceof DataFilter){
			$sql = $arg->getSQL();
		}
		return $this->cache->get(
			get_class($this->entity).'|COUNT'.hash('md4', $sql),
			array(
				$entity,
				'count'
			),
			$arg
		);
	}
	public function remove($id, $justMark=true) {
		$this->entity->remove($id, $justMark);
		$this->cache->del(get_class($this->entity).'-'.$id);
	}
}
?>