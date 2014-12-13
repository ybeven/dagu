<?php
class Event {
	protected $sender;
	public function __construct(&$sender) {
		$this->sender = $sender;
	}
	public function getSender() {
		return $this->sender;
	}
	public function __toString() {
		return get_class($this);
	}
}
?>