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
	$pubtime = html_entity_decode($_REQUEST['pubtime']);
	date_default_timezone_set("UTC");

	$pubtime = ($pubtime == 0) ? date("Y-m-d H:i:s", time()) : $pubtime; 
	$hash = $_REQUEST['hashtag'];
	$userat = $_REQUEST['user'];
	$where['publishedin'] =  "<'$pubtime'";
	if ($hash != null)
		$where['description'] = "LIKE '%#$hash%'";

	if (isset($userat) && trim($userat) != '') {
		$users = readTable("user", array("login"=>"LIKE '$userat%'"));
		if (count($users) == 1) {
			$where['id_user'] = "=".$users[0]['id_user'];
		}
	}

	$posts = readTable("post",$where, "publishedin DESC LIMIT 10");

	$posts_js = array();
	foreach($posts as $val) {
		$user = readTable("user", array("id_user"=>"=".$val['id_user']));
		$usr['name'] 	= $user[0]['name'];
		$usr['active']	= $user[0]['active'];
		$usr['photo']	= $user[0]['photo'];
		$usr['login']	= $user[0]['login'];
		$val['user']= $usr;
		$posts_js[] = $val;
	}


	echo json_encode($posts_js);
}

function insert_new() {
	$id_parent 	= $_REQUEST['ppost'];
	$at			= $_REQUEST['at'];
	$msg		= $_REQUEST['msg'];
	$user = getUser($at);


	$res = insertTable("post", array(
		"id_parent"	=>$id_parent,
		"id_user"	=>$user['id_user'],
		"description"	=>$msg));

	if ($res)
		echo json_encode(array("errcode"=>200));
	else
		echo json_encode(array("errcode"=>400));
}

?>
