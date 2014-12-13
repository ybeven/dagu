<?php
include_once('TypeValidator.class.php');
include_once('ArrayValidator.class.php');
include_once('NumberValidator.class.php');
include_once('FloatValidator.class.php');
include_once('IntegerValidator.class.php');
include_once('StringValidator.class.php');
include_once('ValidatorNotDefinedException.class.php');
include_once('ParseFailedException.class.php');

$postDef = <<<POSTDEF
key:string(/^\w+\d\d$/i), p:float(in (.61, .62, .66, .6)), entities:string,
superone:array (a:integer, b:integer, c:float), f:integer(in (2, 10, 18))
POSTDEF;

$a = new ArrayValidator;
$d = array(
	'key' => 'wlekj00',
	'p' => "0.6",
	'f' => '18',
	'entities' => '15, 6, 7',
	'superone' => array(
		'a' => 5,
		'b' => '15',
		'c' => '9.5'
	)
);
var_dump($a->validate($d, $postDef));

?>