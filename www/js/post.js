var writesomething = '<span class="text-muted">Write something about it...</span>';

$(function() {

	tinymce.init({
		selector: "div.editable",
		inline: true,
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste jbimages"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
		relative_urls: false,
		setup: function(editor) {
			editor.on('change', function(e) {
				console.log('change event', e);
				var sendbt = $('.fa-paper-plane-o');
				console.log();
				toggle($('.fa-paper-plane-o'));
			});
			editor.on('focus', function(e) {
				console.log('focus event', e);
				if (editor.getContent({format: 'text'}).trim() == 'Write something about it...')
						editor.setContent('');
			});
			editor.on('blur', function(e) {
				console.log('deactivate event', e);
				toggle($('.fa-paper-plane-o'));
				if (editor.getContent({format: 'text'}).trim() == '')
					editor.setContent(writesomething);
			});
		}
	});
	/*	$('.bticon').click( function() {
		toggle(this);
		}
	);
*/
	$('.fa-paper-plane-o').click(sendMsg);
});


function toggle(obj) {
	if ($(obj).hasClass('.fa-paper-plane-o')) {
		var text = tinymce.get('content id').getContent({format:'text'}).trim();
		if (text == '' || text == writesomething)
			$(obj).removeClass('enabled').addClass('disabled');
		else
			$(obj).removeClass('disabled').addClass('enabled');
	}


	if ($(obj).hasClass('disabled'))
	$(obj).removeClass('disabled').addClass('enabled');
	else
	$(obj).removeClass('enabled').addClass('disabled');
}


function sendMsg() {

	var html = tinymce.activeEditor.getContent({format:'html'});

	$.post(
		"handles/rest_post.php",
		{op: 1, ppost: 1, at: '432876ygjh', msg:encodeURI(html)},
		function(data, stat, jqr) {
			console.log(stat);
			console.log(data);
		}
	);
	
}