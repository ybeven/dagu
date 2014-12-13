<?php
class Logger {
	protected $pdo;
	protected $name;
	public function __construct($name) {
		global $CFG;
		list($dsn, $user, $pass, $init) = array_values($CFG['Sybil']['LogPDO']);
		$this->pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => $init));
		$this->name = $name;

		$this->createTable();
	}
	protected function createTable() {
		$sql = <<<LOGSQL
CREATE TABLE IF NOT EXISTS `{$this->name}` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(255) NOT NULL
) ENGINE=ARCHIVE DEFAULT CHARSET=utf8;
LOGSQL;
		$this->pdo->exec($sql);
	}
	protected function columns() {
		return "(time, message)";
	}
	public function log($msg) {
		$columns = $this->columns();
		$sql = "INSERT INTO {$this->name} {$columns} VALUES (NULL, :msg)";
		/** @var PDOStatement */
		$ps = $this->pdo->prepare($sql);
		$ps->bindParam(':msg', $msg, PDO::PARAM_STR, 255);
		$ps->execute();
	}
}
?>