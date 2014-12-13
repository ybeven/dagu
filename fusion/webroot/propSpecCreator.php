<?php
$tableName=$_GET['t'];
ini_set('display_errors', 'on');
error_reporting(E_ERROR|E_WARNING);
header('Content-Type:text/plain');
if(empty($masterTableName)) $masterTableName = $tableName;
$db = 'greenmine';
$slaveTables = explode(',', '');

$className = f2p($masterTableName, 0);

$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname={$db}", 'root', 'abc', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8;'));
$sql = "SHOW COLUMNS FROM `{$masterTableName}`";
$r = $pdo->query($sql);
$master = $r->fetchAll(PDO::FETCH_ASSOC);
$slaves = array();
foreach($slaveTables as $slaveTable) {
	if($slaveTable == '') continue;
	$sql = "SHOW COLUMNS FROM `{$slaveTable}`";
	$r = $pdo->query($sql);
	$slaves[$slaveTable] = $r->fetchAll(PDO::FETCH_ASSOC);
}

function f2p($f, $start) {
	$a = explode('_', $f);
	$aCount = count($a);
	for($i=$start; $i < $aCount; $i++) {
		$a[$i][0] = strtoupper($a[$i][0]);
	}
	$f = implode($a);
	return $f;
}
function propertyCommentLine($f) {
	$p = f2p($f['Field'], 1);
	$type = strtolower($f['Type']);
	if(strpos($type, 'char') !== false || strpos($type, 'text') !== false || strpos($type, 'date') !== false) {
		$datatype = 'string';
	} else if(strpos($type, 'int') !== false) {
		$datatype = 'int';
	} else if(strpos($type, 'float') !== false) {
		$datatype = 'float';
	} else {
		$datatype = 'mixed';
	}
	echo " * @property {$datatype} \${$p}\n";
}

echo "<?php\n";
echo "/**\n";
$entityGetter = array();
foreach($master as $f) {
	if($f['Field'] == 'deleted') continue;
	if(preg_match('/^([a-z_]+)_id$/', $f['Field'], $matches))
		array_push($entityGetter, $matches[1]);
	propertyCommentLine($f);
}
foreach($slaves as $sT=>$sF) {
	foreach($sT as $f) {
		if(preg_match('/^([a-z_]+)_id$/', $f['Field'], $matches))
			array_push($entityGetter, $matches[1]);
		propertyCommentLine($f);
	}
}
foreach($entityGetter as $getter) {
	echo " * @property ".f2p($getter, 0).' $'.f2p($getter, 1)."\n";
}
echo " */\n";
?>
class <?=$className?> extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => '<?=$masterTableName?>',
			'columns' => array(
<?php
foreach($master as $f) {
	if($f['Field'] == 'deleted') continue;
	$p = f2p($f['Field'], 1);
	echo "\t\t\t\t'{$p}' => '{$f['Field']}',\n";
}
?>
			)
		),
<?php
if(count($slaves)>0) {
?>
		'slave' => array(
<?php
	foreach($slaves as $sT=>$sF) {
		echo "\t\t\t'{$sT}' => array(\n";
		echo "\t\t\t\t'tableName' => '{$sT}',\n";
		echo "\t\t\t\t'columns' => array(\n";
		foreach($sF as $f) {
			if($f['Field'] == id) continue;
			$p = f2p($f['Field'], 1);
			echo "\t\t\t\t\t'{$p}' => '{$f['Field']}',\n";
		}
		echo "\t\t\t\t)\n";
		echo "\t\t\t),\n";
	}
?>
		),
<?=isset($_GET['sv'])?"\t\t'searchView' => '{$_GET['sv']}'\n":''?>
<?php
}
?>
	);
	protected $properties = array(
<?php
foreach($master as $f) {
	if($f['Field'] == 'deleted') continue;
	$p = f2p($f['Field'], 1);
	if($f['Field'] == 'id') $f['Default'] = '0';
	if(is_null($f['Default'])) {
		$type = strtolower(substr($f['Type'], 0, 4));
		if(($type == 'char' || $type == 'varc' || $type == 'text') && $f['Null']=='NO') {
			$f['Default'] = '\'\'';
		} else {
			$f['Default'] = 'null';
		}
	} else if($f['Default'] == '') $f['Default'] = '\'\'';
	else if(ctype_digit($f['Default'])) $f['Default'] = intval($f['Default']);
	else $f['Default'] = '\''.$f['Default'].'\'';
	echo "\t\t'{$p}' => {$f['Default']},\n";
}
foreach($slaves as $sT) {
	foreach($sT as $f) {
		$p = f2p($f['Field'], 1);
		if($f['Field'] == 'id') continue;
		if(is_null($f['Default'])) {
			if(($type == 'char' || $type == 'varc' || $type == 'text') && $f['Null']=='NO') {
				$f['Default'] = '\'\'';
			} else {
				$f['Default'] = 'null';
			}
		} else if($f['Default'] == '') $f['Default'] = '\'\'';
		else if(ctype_digit($f['Default'])) $f['Default'] = intval($f['Default']);
		else $f['Default'] = '\''.$f['Default'].'\'';
		echo "\t\t'{$p}' => {$f['Default']},\n";
	}
}
?>
	);
<?php
foreach($entityGetter as $getter) {
	$getterName = f2p($getter,1);
	$getterCName = f2p($getter,0);
	if($getterCName == 'Owner')
		$getterCName = 'User';
	echo "\tprotected function __get_{$getterName}() {\n";
	echo "\t\tif(!\$this->properties['{$getterName}'] instanceof {$getterCName}) {\n";
	echo "\t\t\t\${$getterName} = new {$getterCName};\n";
	echo "\t\t\t\${$getterName}->getById(\$this->properties['{$getterName}Id']);\n";
	echo "\t\t\tif(\${$getterName}->id>0) \$this->properties['{$getterName}'] = &\${$getterName};\n";
	echo "\t\t}\n";
	echo "\t\treturn \$this->properties['{$getterName}'];\n";
	echo "\t}\n";
}
?>
}
?>