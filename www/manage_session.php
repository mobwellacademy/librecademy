<?php
	$session='active';
	$loginreq = true;
	include_once 'include/header.inc';
?>
<link href="components/datetime/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="components/datetime/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/manage_session.js" charset="UTF-8"></script>
<div class="container">
	<h1>Manage Sessions</h1>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				 Session 1 (PT)
				</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
					<form id="sess_template" method="post" >
						<input type="hidden" class="sess_id" value="1" name="sess_id" />
						<div class="col-md-6">
							<div class="form-group col-md-6">
								<label for="startedin pull-left">Started In</label>

								<div class="input-append date form_datetime">
									<div class="input-group">
										<input type="text" class="form-control" id="sarttime" name="startedin" placeholder="Date/Time">
										<div class="input-group-addon glyphicon glyphicon-calendar"></div>
											<span class="add-on"><i class="icon-th"></i></span>
										</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="startedin pull-left">End Time</label>

								<div class="input-append date form_datetime">
									<div class="input-group">
										<input type="text" class="form-control" id="endtime" name="endtime" placeholder="Date/Time">
										<div class="input-group-addon glyphicon glyphicon-calendar"></div>
											<span class="add-on"><i class="icon-th"></i></span>
										</div>
								</div>
							</div>
							<div class="form-group">
								<label for="yt_link">Youtube Link</label>
								<input type="text" class="form-control" name="yt_link" id="yt_link" placeholder="Link for the Youtube Hangout Session">
							</div>
							<div class="form-group">
								<label for="imp_link">Impress.js Link</label>
								<input type="text" class="form-control" id="imp_link" name="imp_link"  placeholder="Relative Link for the Slideshows">
							</div>
							<div class="form-group">
								<label for="drawl_ln">Draw Session ID</label>
								<input type="text" class="form-control" id="draw_id" name="draw_id"  placeholder="Session ID for the Draw App">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="name">Session Title</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Ex.: Session # - (Lang)">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" rows="3" name="description"></textarea>
							</div>
							<button class="btn btn-primary pull-right" onclick="save(this);" >Save</button>
						</div>
					</form>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingTwo">
			<h4 class="panel-title">
				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				Collapsible Group Item #2
				</a>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			<div class="panel-body">
		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!--		<span id="session_title" class="pull-left">Session 1 (PT)</span>
		<div class="pull-right">
			<span id="session_datestart">20th January 2015</span>
		</div>
	</div>
-->
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script type="text/javascript">
	var optionsTime = {
	format: "yyyy-mm-dd hh:ii",
	autoclose: true,
			todayBtn: true,
			pickerPosition: "bottom-left"
	};
	$(".form_datetime").datetimepicker(optionsTime);
</script> 
<?php
	include_once 'include/footer.inc';
?>


