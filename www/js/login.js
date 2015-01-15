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
		console.log(data);
		var sal = $.parseJSON(data).sal;
		var realPwd = md5($('#inputPassword').val() + sal.split("").reverse().join(""));
		console.log('handles/login.php?phs=2&login='+$('#inputLogin').val() + "&password=" + realPwd);
		console.log(sal + ":" + $('#inputPassword').val());
		$.ajax({
			url: 'handles/login.php?phs=2&login='+$('#inputLogin').val() + "&password=" + realPwd+"&src=3"
		}).then( function(data) {
			console.log(data);
			var errcode = $.parseJSON(data).errcode;

			if (errcode == "200") {
				alert('Login efectuado com sucesso');
				var at = $.parseJSON(data).activeToken;
				setCookie("at", at, 1);
/*				if ($.parseJSON(data).molduser == "null")
					location.reload(true);
				else
					location.assign("cpanel.php");
*/
			} else {
				alert('Ocorreu um erro ao efectuar o login');
			}
		});
	});
}
