<?php
/**
 * EntityArray class
 * EntityArray provides an approch to visit the TCached entities as an array.
 * @ver 0.1 07/10/2009
 * @version 0.2 07/22/2009 fixed EntityManager::getArray durty read problem
 * @author GuangXiN <rek@rek.me>
 */
class EntityArray implements ArrayAccess, Iterator, Countable {
	private $cache       = null;
	private $index       = null;
	private $head    = 0;
	private $end   = 0;
	private $maxLength   = 0;
	private $keyPrefix   = '';
	public  $iteratorMode= EntityArray::IT_DEL;

	const   IT_KEP   = 0x0;
	const   IT_DEL   = 0x1;

	/**
	 * constructor of EntityArray
	 * @param string $name   The name of entity array
	 * @param int    $mode   Can be EntityArray::IT_KEP or EntityArray::IT_DEL
	 * @param int    $maxLength The max length of the entity array. when overflow, oldder element will be dropped. 0 means no limit
	 */
	public function __construct($name, $mode=EntityArray::IT_DEL, $maxLength=0) {
		$this->cache = new TCache;
		$this->index = new EntityArrayIndex($name);
		$this->iteratorMode = $mode;
		$this->maxLength = $maxLength;
		$this->head = $this->index->firstIndex;
		$this->end = $this->index->lastIndex;
		$this->keyPrefix = 'EntityArray::'.$name.'::';
	}
	/**
	 * Insert the given element at the head of the queue
	 * @param DataEntity $value
	 */
	public function enqueue($value) {
		$this->cache->set('EntityArray::'.$this->index->name.'::'.$this->index->lastIndex, $value, $this->timeout);
		$this->index->lastIndex++;
		if($this->maxLength != 0 && $this->count() >= $this->maxLength) {
			$key = 'EntityArray::'.$this->index->name.'::'.$this->index->firstIndex++;
			$this->cache->del($key);
		}
	}
	/**
	 * Shift the element at the end of the queue and increase the firstIndex pointer.
	 * When working in IT_KEP mode, head pointer will be used instead.
	 */
	public function dequeue() {
		$key = $this->keyPrefix;
		if($this->iteratorMode == self::IT_DEL) {
			if($this->index->firstIndex >= $this->index->lastIndex) return false;
			$key .= $this->index->firstIndex++;
			$value = $this->cache->get($key);
			$this->cache->del($key);
			$this->head = $this->index->firstIndex;
		} else if($this->iteratorMode == self::IT_KEP) {
			if($this->head >= $this->end) return false;
			$key .= $this->head++;
			$value = $this->cache->get($key);
		}
		return $value;
	}
	/**
	 * Alias of enqueue
	 */
	public function push($value) {
		$this->enqueue($value);
	}
	/**
	 * Alias for seekQueue
	 * @param int $offset
	 */
	public function seek($offset) {
		$this->seekQueue($offset);
	}
	/**
	 * Seek the cursor to specified offset
	 * @param int $offset
	 */
	public function seekQueue($offset) {
		$this->head = $this->index->firstIndex + $offset;
	}
	/**
	 * Seek the cursor to specified offset
	 * @param int $offset
	 */
	public function seekStack($offset) {
		$this->end = $this->index->firstIndex + $offset;
	}
	/**
	 * Pop the element at the top of the stack and decrease the lastIndex pointer.
	 * When working in IT_KEP mode, end pointer will be used instead.
	 */
	public function pop() {
		$key = $this->keyPrefix;
		if($this->iteratorMode == self::IT_DEL) {
			if($this->index->lastIndex <= $this->index->firstIndex) return false;
			$key .= --$this->index->lastIndex;
			$value = $this->cache->get($key);
			$this->cache->del($key);
			$this->end = $this->index->lastIndex;
		} else if($this->iteratorMode == self::IT_KEP) {
			if($this->end <= $this->head) return false;
			$key .= --$this->end;
			$value = $this->cache->get($key);
		}
		return $value;
	}
	/**
	 * Destroy the whole queue from Tokyo Server and remove the ArrayIndex from DB.
	 */
	public function destroy() {
		for($i = $this->index->firstIndex; $i < $this->index->lastIndex; $i++) {
			$this->cache->del($this->keyPrefix.$i);
		}
		$this->index->reinit();
	}

	///Methods in Iterator
	/**
	 * Returns the current element.
	 */
	public function current() {
		return $this->cache->get($this->keyPrefix.$this->head);
	}
	/**
	 * Returns the key of the current element.
	 */
	public function key() {
		return $this->head - $this->index->firstIndex;
	}
	/**
	 * Moves the current position to the next element.
	 * Note: This method is called after each foreach loop.
	 */
	public function next() {
		$this->head++;
	}
	/**
	 * Rewinds back to the first element of the Iterator.
	 * Note: This is the first method called when starting a foreach loop.
	 * It will not be executed after foreach loops.
	 */
	public function rewind() {
		$this->head = $this->index->firstIndex;
		$this->end = $this->index->lastIndex;
	}
	/**
	 * Checks if current position is valid
	 * Note: This method is called after Iterator::rewind and Iterator::next to check if the current position is valid.
	 */
	public function valid() {
		return $this->head >= $this->index->firstIndex && $this->head < $this->index->lastIndex;
	}

	///Methods in Countable
	/**
	 * This method executed when using the count() function on a object implementing Countable.
	 */
	public function count() {
		return ($this->index->lastIndex - $this->index->firstIndex);
	}

	///Methods in ArrayAccess
	/**
	 * Whether or not an offset exists.
	 * This method is executed when using isset() or empty() on objects implementing ArrayAccess.
	 * Note: When using empty() ArrayAccess::offsetGet() will be called and checked if empty only if ArrayAccess::offsetExists() returns TRUE.
	 */
	public function offsetExists($offset){
		$idx = $offset + $this->index->firstIndex;
		return $idx >= $this->index->firstIndex && $idx < $this->index->lastIndex;
	}
	/**
	 * Returns the value at specified offset.
	 * This method is executed when checking if offset is empty().
	 */
	public function offsetGet($offset) {
		$idx = $offset + $this->index->firstIndex;
		if($idx >= $this->index->firstIndex && $idx < $this->index->lastIndex) {
			return $this->cache->get($this->keyPrefix.$idx);
		}
	}
	/**
	 * Assigns a value to the specified offset.
	 */
	public function offsetSet($offset, $value) {
		$idx = $offset + $this->index->firstIndex;
		if($idx >= $this->index->firstIndex && $idx <= $this->index->lastIndex) {
			$this->cache->set($this->keyPrefix.$idx, $value);
			if($idx == $this->index->lastIndex) {
				$this->index->lastIndex++;
			}
		} else {
			throw new OutOfBoundsException();
		}
	}
	/**
	 * Unsets an offset.
	 * Note: This method will not be called when type-casting to (unset)
	 */
	public function offsetUnset($offset) {
		throw new NotImplementException('Cannot unset EntityArray randomly');
	}
}
?>