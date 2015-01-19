<?php
include_once 'db_handler.php';

$user = readTable("user", array("sal"=>"='".$_REQUEST['s']."'"));

echo json_encode($user[0]);

?>
