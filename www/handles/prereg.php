<?php
	include_once 'db_handler.php';

	function saveImage($base64img){
		if (trim($base64img) == "")
			return;
		$uploads_dir = RESDIR."pub/";
		$name = md5(time() . $_FILES["myPhoto"]["tmp_name"]) . ".png";
		define('UPLOAD_DIR', $uploads_dir);
		$base64img = str_replace('data:image/png;base64,', '', $base64img);
		$data = base64_decode($base64img);
//		$file = UPLOAD_DIR . '123123123.jpg';
		$file = "$uploads_dir/$name";
		file_put_contents($file, $data);
		$_REQUEST['photo'] = $name;
	}

	$sal = $_REQUEST['las'];
	unset($_REQUEST['las']);

	/*
	if (count($_FILES) > 0) {
		$uploads_dir = RESDIR."pub/";
		$ext = pathinfo($_FILES['myPhoto']['name'], PATHINFO_EXTENSION);
		$tmp_name = $_FILES["myPhoto"]["tmp_name"];
		$name = md5(time() . $_FILES["myPhoto"]["tmp_name"]) . ".$ext";
		move_uploaded_file($tmp_name, "$uploads_dir/$name");
		$_REQUEST['photo'] = $name;
	}
	 */
// 	var_dump($_REQUEST);
//	echo $_REQUEST['password']."\n";
//	echo $_REQUEST['login']."\n";
	$passwordSave = md5($_REQUEST['password'].strrev($_REQUEST['login']));
//	echo $passwordSave."\n";

	$_REQUEST['password'] = $passwordSave;
	saveImage($_REQUEST['img']);
	unset($_REQUEST['img']);
	unset($_REQUEST['myPhoto']);

	$suc = updateTable("user", $_REQUEST, array("sal"=>$sal));

	if ($suc)
	   echo json_encode(array("errcode"=>200));
	else
	   echo json_encode(array("errcode"=>400));

?>
