<?php

session_start();
require_once 'util.inc';
require_once 'db_handler.php';


$molduser = readTable("molduser", array("id_user"=>$_SESSION['user']['id_user']));
$cont = readTable("contacts", array("id_molduser"=>$molduser[0]['id_molduser']));
?>
