<?php
require_once 'util.inc';

$con = connectDb();

$salt = $_REQUEST['salt'];

function fix(&$item, $key) { $item = strip_tags($item); }
array_walk($_REQUEST, 'fix');

$stmt = $con->prepare("UPDATE user SET name=:name, login=:login, password=:password, email=:email, photo=:photo, phone1=:phone1, phone2=:phone2, skype=:skype WHERE sal=:salt;");
//$stmt = $con->prepare("UPDATE user SET name=:name, login=:login, password=:password, email=:email, photo=:photo, phone1=:phone1, phone2=:phone2, skype=:skype WHERE sal=:salt;");

$passwordSave = md5($_REQUEST['password'].strrev($_REQUEST['login']));

$bind = array(":name"=>$_REQUEST['name'], ":login"=>$_REQUEST['login'], ":password"=>$passwordSave, ":salt"=>$salt, ":email"=>$_REQUEST['email'], ":photo"=>$_REQUEST['photo'], ":phone1"=>$_REQUEST['phone1'], "phone2"=>$_REQUEST['phone2'], ":skype"=>$_REQUEST['skype']);

$stmt->execute($bind);
$affRows = $stmt->rowCount();

if ($affRows == 0) {
	$errCode = 401;
} else {
	$errCode = 200; 

	$pathres = RESDIR.$salt;
	if (!file_exists($pathres)) {
		$res = mkdir($pathres, 0777, true);
		if ($res) {
			mkdir($pathres."/photos", 0777, true);
		}
	}
} 

$arResult = array("errcode"=> $errCode);

echo json_encode($arResult);	
?>
