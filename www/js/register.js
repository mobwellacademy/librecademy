$().ready(function() {

	$('#prereg').submit(function() { 
		// submit the form 
		// return false to prevent normal browser submit and page navigation 
		return false; 
	});

	$('#prereg').clearForm();
});

var hasSubmited = false;

function register() {
	hasSubmited = true;

	if (!requiredFields()) {
		alert('All required fields must be filled');
		return;
	}
	if (!sizePassword()) {
		$("#pwd").closest('div').addClass('has-error');
		$("#pwd").next('.help-block').removeClass('hidden');
		return;
	}
	if (!equalPasswords()){
		$("#pwd").closest('div').addClass('has-error');
		$("#pwd").next('.help-block').removeClass('hidden');
		return;
	}
	if (!$('#cb_terms').is(':checked')){
		$("#noTerms").removeClass('hidden');
		return;
	}

	var subOptions = { 
		uploadProgress: function(event, position, total, percentComplete) {
		console.log("Perc.:"+percentComplete);
			var percentVal = percentComplete + '%';
			$('.progress-bar').width(percentVal)
        	$('.sr-only').html(percentVal);
		},
		success: function() {
			var percentVal = '100%';
			$('.progress-bar').width(percentVal)
        	$('.sr-only').html(percentVal);
		},
		success: function(xhr) {
	/*		$('#myModalLabel').html('Sucesso');
			$('#save-result').html('Utilizador gravado com sucesso!');
	*/		var err = $.parseJSON(xhr).errcode;
			if (err==200){
				$('#alrt_success').removeClass('hidden');
				$('#alrt_success').show();
			}else
				alert('An error occurred while saving the user');

		},
		url : 'handles/prereg.php',
		data: {phone: $('#phone').intlTelInput("getCleanNumber"), description:$('#description').val(), password: cryptPwd(), las: $("#sal").val()}
	};

	$.post(
			"handles/req_reg.php")
		.done(
				function(data, textstatus, bla) {
					//                                              console.log(data);
					var sal = $.parseJSON(data).salt;
					$('#sal').val(sal);
					$('#prereg').ajaxSubmit(subOptions); 
				});
}

function requiredFields() {
	var valid = true;
	var fieldsNotNull =["#name","#login","#pwd","#repwd","#email"];
	for (i=0; i < fieldsNotNull.length; i++) {
		if ($(fieldsNotNull[i]).val().trim() == '') {
			if (hasSubmited) {
				$(fieldsNotNull[i]).closest('div').addClass('has-error');
				valid = false;
			}
		} else {
			if ($(fieldsNotNull[i]).closest('div').hasClass('has-error'))
				$(fieldsNotNull[i]).closest('div').removeClass('has-error');
		}
	}

	return valid;
}

function equalPasswords() {
	var equal = ($('#pwd').val() == $('#repwd').val());

	$('#repwd').next('span').removeClass('hidden');

	if (!equal || $('#repwd').val().trim()== '') {
		$('#repwd').next('span').removeClass('glyphicon-ok');
		$('#repwd').next('span').addClass('glyphicon-remove');
	} else {
		$('#repwd').next('span').removeClass('glyphicon-remove');
		$('#repwd').next('span').addClass('glyphicon-ok');
	}
	if (equal)
		$("#pwd").next('.help-block').addClass('hidden');

	return equal;
}

function sizePassword(){
	var equal = true;

	if ($('#repwd').val().length < 5) {
		equal = false;
	}
	else {
		$("#pwd").next('.help-block').addClass('hidden');
	}
	return equal;
}

function cryptPwd() {
	return md5($('#pwd').val()+$('#sal').val().split("").reverse().join(""));
}
