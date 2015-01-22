<?php
	include_once 'include/header.inc';
?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="js/dialCodes/build/css/intlTelInput.css">
<script src="js/update_user.js"></script>

<div class="container">
	<h1>Edit profile</h1>
	<p> Use this form to edit your profile informations. In the end, just click update</p>
		<div id="alrt_success" class="alert alert-success alert-dismissible hidden" role="alert">
			<button type="button" class="close" data-dismiss="success" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Success!</strong> User edited with success
		</div>
		<p><span style="color:red"><strong>*</strong></span><small>Indicates required field</small>
		<form id="upuser"  method="POST" enctype="multipart/form-data">
		<input type="hidden" id="sal" value="<?php echo strrev($_REQUEST['s']);?>" />
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group has-feedback">
					<label for="name">Name<span style="color:red"><strong>*</strong></span>
	</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" ariadescribedby="inputSuccess4Status" onkeyup="requiredFields();" required>
					<span id="inputSuccess4Status" class="sr-only">(success)</span>
				</div>
				<div class="form-group">
					<label for="login">Login<span style="color:red"><strong>*</strong></span></label>
					<input type="text" class="form-control" id="login" name="login" placeholder="Login" onkeyup="requiredFields()" maxlength="7" required>
					<span id="helpBlock" class="help-block ">Please, insert 7 characters maximum</span>
				</div>
				<div class="form-group has-feedback">
					<label for="login">Password<span style="color:red"><strong>*</strong></span></label>
					<input type="password" class="form-control" id="pwd" placeholder="Password" onkeyup="requiredFields(); equalPasswords();" required>
					<span id="helpBlock" class="help-block hidden">Passwords must have 5 or more characters, and they must match.</span>
				</div>
				<div class="form-group has-feedback">
					<label for="repwd">Repeat Password</label>
					<input type="password" class="form-control" id="repwd" placeholder="Repeat Password" aria-describedby="inputSuccess2Status" onkeyup="requiredFields(); equalPasswords();" required>
					<span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
					<span id="inputSuccess2Status" class="sr-only"></span>
				</div>
				<div class="form-group">
						<label for="phone" class="control-label">Small description</label>
						<textarea class="form-control" id="description" placeholder="Tell us a bit about yourself and why do you want to apply. Don't get lenghty please."></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<?php include_once 'components/avatarpic/avatarpic.php'; ?>

				<div class="clearfix"></div>
				<div class="form-group">
					<label for="email">Email address<span style="color:red"><strong>*</strong></span></label>
					<input type="email" class="form-control" id="email" name="mail" placeholder="Enter email" onkeyup="requiredFields()" required>
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
					<button id="btn_submit" type="button" class="btn btn-primary pull-right" onclick="update();">Update</button>
				</div>
			</div>
		</form>
</div>
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
<?php
	include_once 'include/footer.inc';
?>


