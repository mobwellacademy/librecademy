<?php

$fileprop = pathinfo($_SERVER['SCRIPT_NAME']);
// $configpath = substr($_SERVER['DOCUMENT_ROOT'], 0, -1).$fileprop['dirname']."/config.inc";
// $configpath = substr($_SERVER['DOCUMENT_ROOT'], 0, -1)."/librecademy/www/handles/config.inc";
$configpath = $_SERVER['DOCUMENT_ROOT']."/handles/config.inc";
include_once $configpath;

function readTable($table, $where, $orderby=null) {
	$con = connectDb();

	$sel = "SELECT * FROM $table ";
	if ($where != null) {
		$sel .= " WHERE ";
		$count = 0;
		foreach($where as $key=>$val) {
//			if (strpos($val, "\"") !==0)
//				$val = "\"$val\"";
			$sel .= (($count == 0) ? "" : " AND ") . "$key $val";
			$count++;
		}
	}

	if(isSafeDelete($table))
		$sel .= " AND deleted is null OR deleted = 0;";

	if ($orderby != null)
		$sel .= " ORDER BY $orderby";

//   echo $sel;
	//	die($sel);

	$stmt = $con->prepare($sel);
	$stmt->execute();
	$arRes = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $arRes;
}

function insertTable($table, $arvalues) {

	$con = connectDb();

	$sel = "INSERT INTO $table (";
	$secpart = "";
	$count = 0;
	foreach($arvalues as $key=>$val) {
		$sel .=(($count == 0) ? "" : ", ") . $key;
		if (strpos($val, "\"") !==0)
			$val = "\"$val\"";
		$secpart .= (($count == 0) ? "" : ", ") . $val;
		$count++;
	}
	$sel .= ") VALUES ($secpart);";
//	 echo $sel;
	$stmt = $con->prepare($sel);
	$stmt->execute();

	return $con->lastInsertId();
}

function updateTable($table, $arvalues, $where) {
	$con = connectDb();

	$sel = "UPDATE $table SET ";
	$count = 0;
	foreach($arvalues as $key=>$val) {
		if (strpos($val, "\"") !==0)
			$val = "\"$val\"";
		$sel .= (($count == 0) ? "" : ", ") ."$key=$val";
		$count++;
	}

	$sel .= " WHERE ";
	$count = 0;
	foreach($where as $key=>$val) {
		if (strpos($val, "\"") !==0)
			$val = "\"$val\"";
		$sel .= (($count == 0) ? "" : " AND ") . "$key=$val";
		$count++;
	}	

//	echo $sel;
//	die($sel);

	$stmt = $con->prepare($sel);
	return $stmt->execute();
}

function deleteTable($table, $where) {
	$con = connectDb();

	$sel = "DELETE FROM $table";
	$count = 0;

	$sel .= " WHERE ";
	$count = 0;
	foreach($where as $key=>$val) {
		$sel .= (($count == 0) ? "" : " AND ") . "$key=$val";
		$count++;
	}	

//	echo $sel;
	// die($sel);

	$stmt = $con->prepare($sel);
	return $stmt->execute();
}


function safeDeleteTable($table, $where) {
	$con = connectDb();

	if(isSafeDelete($table))
		return updateTable($table, array("deleted"=>"true"), $where);
	else
		return false;
}

function isSafeDelete($table) {
	$con = connectDb();
	$sel = "SELECT COUNT(*) FROM information_schema.COLUMNS where table_schema = '".DBNAME."' and table_name='$table' AND column_name='deleted';"; 

	if($res = $con->query($sel)) {
		return ($res->fetchColumn() > 0);
	} else
		return false; 
}

function getUser($activetoken) {

	$tok = readTable("active_token", array("token"=>"='$activetoken'",
							"active"=>"=true"));

	// $usr = readTable("user", array("id_user"=>"'".$tok[0]['id_user']."'"));
	if ($tok != null) {
		$molduser = readTable("user", array("id_user"=>"=".$tok[0]['id_user']));
		return $molduser[0];
	}
	else
		return null;
}

function connectDb() {
	try {
		$con = new PDO(sprintf('mysql:host=localhost;dbname=%s;charset=utf8',DBNAME), USERDB, PWDDB);
	}
	catch (PDOException $e) {

		echo "An error occurred: ". $e->getMessage();
	}
	return $con;
}
?>
