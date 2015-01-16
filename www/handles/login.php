<?php
session_start();
require_once 'util.inc';
require_once 'db_handler.php';

/*
if (!array_key_exists('phs', $_REQUEST))
	$_REQUEST[''];

if (!array_key_exists('login', $_REQUEST))
	die('Must provide login');

if (strcmp($_REQUEST['phs'], "2")== 0) {
	if (!array_key_exists('password', $_REQUEST)) {
		die('Must provide password');
	}
}
 */

function cleanSymlinks($active_token) {
	$con = connectDb();
	$tokens = readTable("active_token", array("token"=>$active_token));
	$tok = $tokens[0];

	$createdin	= $tok['createdin'];
	$notes 		= $tok['notes'];
	$stmt = $con->prepare("select * from active_token WHERE createdin < (SELECT createdin FROM active_token WHERE token='$active_token') AND notes='$notes';");
//	$stmt->execute(array(":token"=>$active_token, ":nots"=>$notes));
	$stmt->execute();
	$res =  $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach (
		$res as $oldtok) {
		unlink(PUBRES.$oldtok['token']);
	}
}

function login($phase, $login, $password, $src="1") {
	$con = connectDb();

	$stmt = $con->prepare("SELECT * FROM user WHERE login=:login");
	$stmt->execute(array(":login"=>$login));
	$arResult =  $stmt->fetchAll(PDO::FETCH_ASSOC);
	$sal = "null";

	if (empty($arResult)){
		$arOut = array("sal"=>"false", "errcode"=>"404");
	}
	else {
		$sal = $arResult[0]['sal'];
		$arOut = array("errcode"=>"200", "sal"=>$sal);
		if (strcmp($phase, "2")==0) {
			$passwd = $arResult[0]['password'];
			$id_user = $arResult[0]['id_user'];
			$passRec = md5($_REQUEST['password'].strrev($login));
//			echo $_REQUEST['password']."\n";;
//			echo $login."\n";
			$passwordSave = md5($_REQUEST['password'].strrev($login));
//			echo $passwordSave."\n";;
//			echo "$login<br/>$passwd<br/>$passRec";
			if (strcmp($passwd,$passRec)==0) {
				// Last Login
				$lastLogin = date("Y-m-d H:i:s", time());
				$avtoken = md5($sal . $login . time());
				$arbind = array(":llogin"=>$lastLogin, ":login"=>$login);

				$stmt = $con->prepare("UPDATE user SET lastLogin = :llogin WHERE login=:login");
				$stmt->execute($arbind);
				$affRows = $stmt->rowCount();

				$res = insertTable("active_token", array("token"=>$avtoken, "id_user"=>$id_user, "notes"=>$src));
				symlink(RESDIR.$sal,PUBRES.$avtoken);
				cleanSymlinks($avtoken);
				$tblUser =readTable("user", array("login"=>$login));

				$user = getUser($avtoken);
				$_SESSION['user'] = $tblUser[0];
				$_SESSION['at']	= $avtoken;
				$_SESSION['user']	= $user;
				$arOut = array("activeToken"=>"$avtoken", 
					"errcode"=>"200", 
					"user"=>$user
				);
			}	
			else {
				$arOut = array("activeToken"=>"null", "errcode"=>"401");
			}	
		}
	}
	return $arOut;
}

$arOut=array(); if (array_key_exists('phs', $_REQUEST) && $_REQUEST['phs'] == 1)
	echo json_encode(login(1, $_REQUEST['login'], null, $_REQUEST['src']));
else
	echo json_encode(login(2, $_REQUEST['login'], $_REQUEST['password'], $_REQUEST['src']));

//if (array_key_exists('show', $_REQUEST)
//	echo json_encode$arOut;

?>
