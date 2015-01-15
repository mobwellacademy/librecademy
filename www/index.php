<?php
	include_once 'include/header.inc';
?>
<div class="container">
	<aside class="col-md-3 col-md-offset-9">
		<section login>
			<div class="form-signin">
				<h2 class="form-signin-heading">Please sign in</h2>
				<label for="inputLogin" class="sr-only">Login</label>
				<input type="text" id="inputLogin" class="form-control" placeholder="Username" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<button class="btn btn-primary btn-block" onclick="login()">Sign in</button>
			</div>
		</section>
	</aside>
</div>
<script type="text/javascript" src="js/md5.js" ></script>
<script type="text/javascript" src="js/login.js" /></script>

<?php
	include_once 'include/footer.inc';
?>


