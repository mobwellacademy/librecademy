<html>
	<head>
		<title>mobWell Academy - Pre-register</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap -->
		<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/candidate.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
		<link rel="stylesheet" href="js/dialCodes/build/css/intlTelInput.css">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
		<script src="js/register.js"></script>

		<!-- HTML5 shim and res/imgpond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: res/imgpond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/res/pond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="container header">
	</div>

	<div class="container">
		<h1>Pre-Registration Form</h1>
		<!-- "Alone we can do so little, together we can do so much.", Helen Keller -->
		<!-- “Tell me and I forget, teach me and I may remember, involve me and I learn.” , Benjamin Franklin -->
		<blockquote>
		<p>"The strength of the team is each individual member. The strength of each member is the team." </p>
		<footer>Phil Jackson, <cite title="Who was">former basketball player and coach</cite></footer>
		</blockquote>
		<p>In order to have the best team, some requirements must be met. After you fulfil this form, you'll be contacted through e-mail in order to schedule an online meeting with the current admin.</p>
		<p>There's only one way to enter mobWell team, and that's through the Academy; and there are requirements to enter the Academy:</p>
		<ul>
			<li>Know very well what are you doing and what you want to achieve;</li>
			<li>Be very anxious to learn with people equally or more experienced than you;</li>
			<li>Open-minded and platform agnostic <em>as long as you use Linux</em> <i class="fa fa-smile-o"></i> </li>
			<li><span class="text-muted">Kidding on the last point, just use whatever suits you best, as long as you don't harm the team or the project. We just happen to <strong>love freedom</strong>.</span></li>
			<li>Keep in mind it's not just about technology: The love for technology is decisive, but your love for the way you use technology for someone's good is more decisive;</li>
	</div>
	<div class="container">
		<hr/ >
		<div id="alrt_success" class="alert alert-success alert-dismissible hidden" role="alert">
			<button type="button" class="close" data-dismiss="success" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Success!</strong> User pre-registred with success
		</div>
		<p><span style="color:red"><strong>*</strong></span><small>Indicates required field</small>
		<form id="prereg"  method="POST" enctype="multipart/form-data">
			<input type="hidden" id="sal" val="" />
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group has-feedback">
					<label for="name">Name<span style="color:red"><strong>*</strong></span>
	</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" ariadescribedby="inputSuccess4Status" onkeyup="requiredFields();">
					<span id="inputSuccess4Status" class="sr-only">(success)</span>
				</div>
				<div class="form-group">
					<label for="login">Login<span style="color:red"><strong>*</strong></span></label>
					<input type="text" class="form-control" id="login" name="login" placeholder="Login" onkeyup="requiredFields()">
				</div>
				<div class="form-group has-feedback">
					<label for="login">Password<span style="color:red"><strong>*</strong></span></label>
					<input type="password" class="form-control" id="pwd" placeholder="Password" onkeyup="requiredFields(); equalPasswords();">
					<span id="helpBlock" class="help-block hidden">Passwords must have 5 or more characters, and they must match.</span>
				</div>
				<div class="form-group has-feedback">
					<label for="repwd">Repeat Password</label>
					<input type="password" class="form-control" id="repwd" placeholder="Repeat Password" aria-describedby="inputSuccess2Status" onkeyup="requiredFields(); equalPasswords();">
					<span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
					<span id="inputSuccess2Status" class="sr-only"></span>
				</div>
				<div class="form-group">
						<label for="phone" class="control-label">Small description</label>
						<textarea class="form-control" id="description" placeholder="Tell us a bit about yourself and why do you want to apply. Don't get lenghty please."></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="fileinput fileinput-new pull-right" data-provides="fileinput">
					<div class="fileinput-new thumbnail " style="width: 200px; height: 150px;">
						<img id="img_contact_photo" data-src="holder.js/100%x100%" alt="">
					</div>
				<div class="clearfix"></div>
					<div class="pull-right">
						<div class="fileinput-preview fileinput-exists thumbnail " style="max-width: 200px; max-height: 150px;"></div>
						<span class="btn btn-default btn-file "><span class="fileinput-new">Upload Picture</span><span class="fileinput-exists">Change</span><input id="photo_upload" type="file" 
	name="myPhoto"></span>
						<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="form-group">
					<label for="email">Email address<span style="color:red"><strong>*</strong></span></label>
					<input type="email" class="form-control" id="email" name="mail" placeholder="Enter email" onkeyup="requiredFields()">
				</div>
				<div class="form-group">
						<label for="phone" class="control-label">Phone</label>
						<div class="clearfix"></div>
						<input type="tel" class="form-control" id="phone" placeholder="Insert your phone number" />
				</div>
				<div class="checkbox">
					  <label>
						<input id="cb_terms" type="checkbox" value="">
						I agree with the <a href="#" data-toggle="modal" data-target="#modalterms"> terms and conditions</a>.
					  </label>
					<span id="noTerms" class="help-block hidden">We appreciate your honesty, but you must accept the terms and conditions to submit.</span>
				</div>
				<div class="clear-fix"></div>
					<button id="btn_submit" type="button" class="btn btn-primary pull-right" onclick="register();">Submit</button>
				</div>
			</div>
		</form>

	</div>

	<div class="modal fade" id="modalterms">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Terms and Conditions</h4>
		  </div>
		  <div class="modal-body">
			<?php include_once 'include/terms.html';?>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script src="js/dialCodes/build/js/intlTelInput.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<script src="js/util.js"></script>
	<script src="js/md5.js"></script>
	<script type="text/javascript">

	var optionsPhone ={
		// automatically format the number according to the selected country
		autoFormat: true,
			// if there is just a dial code in the input: remove it on blur, and re-add it on focus
		autoHideDialCode: true,
			// default country
		defaultCountry: "us",
	// don't insert international dial codes
		nationalMode: false,
		// display only these countries
		onlyCountries: [],
		// the countries at the top of the list. defaults to united states and united kingdom
		preferredCountries: ["pt", "es", "fr","ch", "be","lu", "de", "ao", "us", "uk", "ca"],
		utilsScript:"js/dialCodes/lib/libphonenumber/build/utils.js"
	};
	$("#phone").intlTelInput(optionsPhone);

	</script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js">
	</script>
	</body>
</html>
