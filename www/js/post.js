var writesomething = $('#msgContent').children().first();
var freshSearch = false;

$(function() {
writesomething = $('#msgContent').children().first().html();
console.log(writesomething);

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
				if (editor.getContent({format: 'text'}).trim() == writesomething)
						editor.setContent('');
			});
			editor.on('blur', function(e) {
				console.log('deactivate event', e);
				toggle($('.fa-paper-plane-o'));
				if (editor.getContent({format: 'text'}).trim() == '')
					editor.setContent('<span class="text-muted"'+writesomething+'</span>');
			});
		}
	});
	/*	$('.bticon').click( function() {
		toggle(this);
		}
	);
*/
	$('.fa-paper-plane-o').click(sendMsg);

	$('#corkboard').bind('scroll', function()
		{
			var scrollh = $(this)[0].scrollHeight;
			if($(this).scrollTop() + $(this).innerHeight()>=scrollh)
			{
				fetchPosts();
			}
		});


		fetchPosts(0);
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
		{op: 1, ppost: 1, at: getCookie('at'), msg:encodeURI(html)},
		function(data, stat, jqr) {
			var stat = $.parseJSON(data).errcode;
			if (stat == "200") {
				console.log(stat);
				tinymce.activeEditor.setContent('<span class="text-muted">'+writesomething+'</span>');
//				$('#corkboard').html('<i class="fa fa-spinner fa-spin "></i>');
				$('#corkboard').html('');
				setTimeout(fetchPosts, 1000)	
			}
		}
	);
	
}

function fetchPosts(stime) {
	var lastpubtime =0;
	freshSearch=false;
	if (stime == null) {
		if ($('#corkboard').length > 0){
			lastpubtime = $('.post').last().find('.post-time').text();
		}
	}
	else { 
		lastpubtime = stime;
		if (stime==0)
			freshSearch=true;
	}


	$.post(
			"handles/rest_post.php",
			{op:0,
				pubtime:lastpubtime, 
				hashtag:$('#inputHash').val(), 
				user:$('#inputAt').val() },
			spreadPosts
		  );
}

function spreadPosts(data, stat, jqr) {
	var datajs = $.parseJSON(data);
	
	if (freshSearch)
		$('#corkboard').html('');


	for (i=0; i < datajs.length; i++){
		var jobj = datajs[i];
		var nodepost = $('#post-template').clone();
		nodepost.attr("id", "");
		nodepost.removeClass("hidden");
		$(nodepost).find('.post-par').html(decodeURI(jobj.description));
		$(nodepost).find('.post-time').html(jobj.publishedin);
		$(nodepost).find('.post-name').html(jobj.user.name);
		$(nodepost).find('.post-id').html('@'+jobj.user.login);
		var photo = (jobj.user.photo != null && jobj.user.photo.trim() != '') ? 'res/pub/'+jobj.user.photo : 'res/img/logo.png';
		$(nodepost).find('.circular').attr('src',photo);
		$(nodepost).find('img').each(function(){
			if (!$(this).hasClass('img'))
				$(this).addClass('img');
				$(this).addClass('img-responsive');
		});

		$('#corkboard').append(nodepost);
	}

/*
	$('#corkboard').on("scrollstop",function(){
		  alert("Stopped scrolling!");
	});
*/
/*	if (!$('#corkboard').hasClass('.mCustomScrollbar')){
		$("#corkboard").mCustomScrollbar({
			theme:'minimal-dark',
			callbacks:{
				onTotalScroll:function(){
					fetchPosts();
				}
			},
			advanced: {
				updateOnContentResize: true
			}
		}
		);
	}
*/
}
