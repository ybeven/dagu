<?php
class CategoryLogger extends Logger {
	private $syslog = null;
	public function __construct($name) {
		parent::__construct($name);
		$this->syslog = new Logger('log_all');
	}
	public function log($msg) {
		parent::log($msg);
		$this->syslog->log($msg);
	}
}