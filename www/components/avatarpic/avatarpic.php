<style>
</style>
<link rel="stylesheet" href="components/avatarpic/avatarpic.css">
<script src="components/cropbox/jquery/cropbox.js"></script>
<script src="components/avatarpic/avatarpic.js"></script>
<script type="text/javascript" src="components/bootstrap-filestyle.min.js"> </script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Choose Your Pic</h4>
      </div>
      <div class="modal-body text-centered">
		<div class="imageBox">
			<div class="thumbBox"></div>
			<div class="spinner" style="display: none">Loading...</div>
		</div>
      </div>
	  <div class="modal-footer">
			<div class="pull-right">
				<input type="button" class="btn btn-default" id="btnZoomIn" value="+">
				<input type="button" class="btn btn-default" id="btnZoomOut" value="-">
				<input type="button" class="btn btn-primary" id="btnCrop" value="Crop" data-dismiss="modal">
			</div>
			<input type="file" id="file" />
	  </div>
    </div>
  </div>
</div>

<div class="cropped" data-toggle="modal" data-target="#myModal">
	<img id="img_avatar" src="res/img/logo.png" class="img img-responsive img-thumbnail pull-right" />
<span id="helpBlock" class="help-block">Click to upload your photo.</span>
</div>

<script type="text/javascript">
$(window).load(function() {
	$(":file").filestyle(
		{iconName: "glyphicon-picture",
		input:false,
		badge: false}
	);

	var options =
		{
			thumbBox: '.thumbBox',
				spinner: '.spinner',
				imgSrc: 'avatar.png'
		}
	var cropper;
	$('#file').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(e) {
			options.imgSrc = e.target.result;
			cropper = $('.imageBox').cropbox(options);
		}
		reader.readAsDataURL(this.files[0]);
		this.files = [];
	})
		$('#btnCrop').on('click', function(){
			var img = cropper.getDataURL()
				$('#img_avatar').attr('src', img);
		})
			$('#btnZoomIn').on('click', function(){
				cropper.zoomIn();
			})
				$('#btnZoomOut').on('click', function(){
					cropper.zoomOut();
				})
});
</script>
