$().ready(function() {
	$('#sess_template').ajaxForm(); 

	$('#sess_template').submit(function( ) {

		$(this).ajaxSubmit({url: "handles/rest_session.php"});

		return false;
	});
});

function save(btn) {
	//	console.log($(btn).first().closest('.panel-body').find('input[type="hidden"]'));

	$(btn).first().closest('form').ajaxSubmit();
}

