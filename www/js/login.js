$().ready(function() {
/*	$('form').on("submit", function(event) {
		event.preventDefault();
		login();
	});
	*/
});

function login() {
	$.ajax({
		url: 'handles/login.php?phs=1&login='+$('#inputLogin').val()+"&src=3"
	}).then( function(data) {
		var sal = $.parseJSON(data).sal;
		var realPwd = md5($('#inputPassword').val() + sal.split("").reverse().join(""));
		$.ajax({
			url: 'handles/login.php?phs=2&login='+$('#inputLogin').val() + "&password=" + realPwd+"&src=3"
		}).then( function(data) {
			console.log(data);
			var errcode = $.parseJSON(data).errcode;

			if (errcode == "200") {
				var at = $.parseJSON(data).activeToken;
				setCookie("at", at, 1);
				location.reload();
			} else {
				alert('Ocorreu um erro ao efectuar o login');
			}
		});
	});
}

function logout() {
	$.ajax({
		url: 'handles/logout.php'
	}).then( function(data) {
		var errcode = $.parseJSON(data).errcode;

		if (errcode == "200"){
			setCookie("at", '', 1);
			location.reload();
		} else
			alert('Upsss, there was an error loging out');
	});

}
