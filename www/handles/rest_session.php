<?php
include_once 'db_handler.php';

// $user = readTable("user", array("sal"=>"='".$_REQUEST['s']."'"));
//
$sessid = $_REQUEST['sess_id'];
unset($_REQUEST['sess_id']);

if ($sessid == 0)
	echo insertTable("session", $_REQUEST);
else
	echo updateTable("session", $_REQUEST, array("id_session"=>$sessid));

?>
