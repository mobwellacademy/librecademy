<?php
	$session='active';
	$loginreq = true;
	include_once 'include/header.inc';
?>
		 <link href="css/session.css" rel="stylesheet" />
<div class="container">
	<h1>Session #1</h1>
	<div class="col-md-8">
		<iframe width="420" height="315" src="http://www.youtube.com/embed/f5oFshSFhpE" frameborder="0" allowfullscreen></iframe>
		<h3>Slides</h3>
		<p>Slides are important too, but this way are much more fun! <i class="fa fa-smile-o fa-2x"></i></p>
		<iframe id="sshow" src="res/docs/session1/sess1.html" ></iframe>
	</div>
	<div class="col-md-4">
	</div>
</div>
<?php
	include_once 'include/footer.inc';
?>


