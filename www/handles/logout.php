<?php
session_start();
require_once 'db_handler.php';
$token = $_SESSION['at'];

function logout($token){

	updateTable("active_token", array("active"=>0), array("token"=>$token));
	$sesd = session_destroy();
/*	$con = connectDb();

	$stmt = $con->prepare("UPDATE user SET active_token='' WHERE active_token=:atoken");
	$stmt->execute(array(":atoken"=>$token));
	$affRows = $stmt->rowCount();

	if ($affRows == 1) {
		$errCode = 200;
		unlink(PUBRES.$token);
		session_destroy();
	} else {
		$errCode = 204;
	}
 */
	return 200;
}

$errcode= logout($token);

$success = ($errcode ==200) ? 1 : 0;

echo json_encode(array("errcode"=>$errcode));

?>
