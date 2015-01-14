<?php
include_once 'db_handler.php';

$op = $_REQUEST['op'];

switch($op) {
case 0: {
	readPosts();
	break;
}
case 1 : {
	insert_new(); break;
}
}

function readPosts() {
	$posts = readTable("post", array("publishedin"=> ">".$_REQUEST['pubtime']), "publishedin DESC");

	echo json_encode($posts);
}

function insert_new() {
	$id_parent 	= $_REQUEST['ppost'];
	$at			= $_REQUEST['at'];
	$msg		= $_REQUEST['msg'];
	$id_user = 1;

	$res = insertTable("post", array(
		"id_parent"	=>$id_parent,
		"id_user"	=>$id_user,
		"description"	=>$msg));

	if ($res)
		echo json_encode(array("errcode"=>200));
	else
		echo json_encode(array("errcode"=>400));
}

?>
