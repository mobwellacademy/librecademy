<?php session_start();

if (isset($loginreq) && $loginreq && !isset($_SESSION['user'])) {
	header("Location: login_please.php");
exit();
}

?>
<html>
	<head>
		<title>Librecademy</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="bower_components/jquery/dist/jquery.min.js"></script>

		<script src="js/util.js"></script>

		<!-- Bootstrap -->
		<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/callout.css" rel="stylesheet">

		<!-- HTML5 shim and res/imgpond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: res/imgpond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/res/pond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="body_main">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a class="navbar-brand" href="index.php"><img class="img img-responsive img-rounded pull-left" src="<?php if($_SESSION['user'] != null) echo 'res/pub/'.$_SESSION['user']['photo']; else echo 'res/img/logo.png'; ?>" style="height: auto; width:30px; margin-right: 10px;">Librecademy</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="prereg.php">Pre-Register</a></li>
            <li><a href="#about">About</a></li>
<!--            <li><a href="manage_session.php">Manage Sessions</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="<?php echo $sioness; ?>"><a href="session.php"><img class"iconsfunc" src="res/img/func_session.png" />&nbsp;Session</a></li>
            <li class="<?php echo $codeyard; ?>"><a href="codeyard.php"><img class"iconsfunc" src="res/img/func_code.png" />&nbsp;CodeYard</a></li>
            <li class="<?php echo $resources; ?>"><a href="resources.php"><img class"iconsfunc" src="res/img/func_res.png" />&nbsp;Drive</a></li>
            <li class="<?php echo $draw; ?>"><a href="drawing.php"><img class"iconsfunc" src="res/img/func_draw.png" />&nbsp;Drawing</a></li>
            <li class="<?php echo $forum; ?>"><a href="forum.php"><img class"iconsfunc" src="res/img/func_forum.png" />&nbsp;Wall</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<!--						<ul class="nav nav-tabs pull-right">
							  <li role="presentation" class="active"><a href="#">Session</a></li>
							  <li role="presentation"><a href="#">Code Yard</a></li>
							  <li role="presentation"><a href="#">resources</a></li>
						</ul>
						-->
					<div></div>
			</div>
		</div>
		<div style="margin-bottom:45px"></div>
