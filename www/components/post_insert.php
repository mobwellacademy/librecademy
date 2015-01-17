<link rel="stylesheet" href="css/post_insert.css" type="text/css">
<link rel="stylesheet" href="js/cscrollbar/jquery.mCustomScrollbar.css" />
<script src="js/cscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/post.js"></script>

<div id="post-template" class="post col-md-6  col-sm-12 hidden">
	<div class="col-md-2 col-sm-12">
		<img class="img img-responsive circular img-who" style="width:50px; height:auto" src="res/img/logo.png" /><br/>
		<span class="post-id small vcenter"><strong>@dsangui</strong></span>
	</div>
	<div class="col-md-9 post-text">
		<p class="post-par">O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão.</p>
		<div>
			<p class="small "><em>publicado por <span class="post-name">Manuel Ant&oacute;nio</span> em <span class="post-time">0</span></em></p>
		</div>
	</div>
</div>

<div class="row" >
	<div id="msgContent" class="editable insertbody col-md-10 col-md-offset-1">
	<span class="text-muted">Write something about it... don't forget to enter the '#topic' to facilitate the search</span>
	</div>
	<div class="col-md-1">
	<!--	<span class="bticon glyphicon glyphicon-envelope disabled" aria-hidden="true"></span>
		<span class="bticon glyphicon glyphicon-thumbs-up enabled" aria-hidden="true"></span>
		<span class="bticon glyphicon glyphicon-thumbs-down disabled" aria-hidden="true"></span>
	-->	
		<span class="bticon fa fa-paper-plane-o fa-2x disabled"></span>
	</div>
</div>
<div class="clear-fix"></div>
<!-- <div id="corkboard" class="mCustomScrollbar" data-mcs-theme="minimal-darl"></div> Bad compatibility when detecting endscroll-->
<div class="form-inline">
  <div class="form-group form-group-sm">
    <label class="sr-only" for="exampleInputEmail2">Email address</label>
	<div class="input-group">
		<div class="input-group-addon">#</div>
		<input type="text" class="form-control" id="inputHash" placeholder="Search by Topic" onkeyup="fetchPosts(0)">
	</div>
  </div>
  <div class="form-group form-group-sm">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
	<div class="input-group">
		<div class="input-group-addon">@</div>
		<input type="text" class="form-control" id="inputAt" placeholder="Search by User" onkeyup="fetchPosts(0)">
	</div>
  </div>
<!--	<button class="btn btn-default" onclick="fetchPosts(0);" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button> -->
</div>
<div id="corkboard" ></div>
