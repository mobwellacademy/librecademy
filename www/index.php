<?php
	session_start();
	include_once 'include/header.inc';
?>
<div class="container">
	<aside id="user_form" class="col-md-3 col-md-offset-9">
		<?php
			if ($_SESSION['user'] != null) {
?>
		<section class="grayd">
			<div class="col-sm-6">
				<img class="img img-responsive circular vcenter" style="width:100px; height:100px"  src="res/pub/<?php echo $_SESSION['user']['photo']; ?>" />
			</div>
			<div class="col-sm-6">
				<h5>Hi <strong><?php echo $_SESSION['user']['name'];?></strong></h5>
				<p class="small text-muted">It's finally today that we're going to learn something!</p>
			</div>
				<button class="btn btn-sm btn-default" onclick="logout();" >Logout</button>
		</section>
<?php } else { ?>
		<section>
			<div class="form-signin">
				<h2 class="form-signin-heading">Please sign in</h2>
				<label for="inputLogin" class="sr-only">Login</label>
				<input type="text" id="inputLogin" class="form-control" placeholder="Username" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<button class="btn btn-primary btn-block" onclick="login()">Sign in</button>
			</div>
		</section>
<?php }; ?>
	</aside>
</div>
<script type="text/javascript" src="js/md5.js" ></script>
<script type="text/javascript" src="js/login.js" /></script>

<?php
	include_once 'include/footer.inc';
?>


