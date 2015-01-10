<?php
require_once 'util.inc';
require_once 'db_handler.php';

function giveSalt() {

	$con = connectDb();

	// Inserts a temporary link, just to give a salt
	$query = "INSERT INTO user(name) VALUES ('tmp_usr');";
	// Returns the last ID inserted
	$queryId = "select user.sal from user where id_user=:id;";
	$con->query($query);

	$stmt = $con->prepare($queryId);
	$stmt->execute(array(":id"=>$con->lastInsertId()));
	$ares = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $ares[0]['sal'];
}
// if (array_key_e:xists('show', $_REQUEST)) {
  $arrSalt = array("salt"=>giveSalt());
  echo json_encode($arrSalt);
//}
?>

