<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="bs-docs-section">
	<div class="row">
		<div class="main col-md-12">

			<!-- page start -->
			<h1 class="page-header">Create event</h1>

			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('event_store');?>" method="post" class="form-horizontal" data-toggle="validator">
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Type:
					</label>
					<div class="col-sm-8">
						<select class="form-control" name="type">
							<option value="Open day">Open day</option>
							<option value="Public lecture">Public lecture</option>
							<option value="Talk">Talk</option>
							<option value="Concert">Concert</option>
							<option value="Workshop">Workshop</option>
							<option value="Taster course">Taster course</option>
							<option value="Careers event">Careers event</option>
							<option value="Careers fair">Careers fair</option>
						</select>
				  	</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Event title:
					</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="title" placeholder="eg. Computer Science taster classes" required>
					</div>
				</div>

				<!--Event description-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Event description:
					</label>
					<div class="col-sm-8">
						<textarea class="form-control" rows="4" id=description type="text" name="description" placeholder="Give a detailed description of what this event will involve." required></textarea>
					</div>
				</div>

				<!--Event tags-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Tags:
					</label>
					<div class="col-sm-8">
						<input id="tags-input" class="form-control" type="text" name="tags" placeholder="eg. Science, Music">
					</div>
					<script type="text/javascript">
					$('#tags-input').selectize({
						delimiter: ',',
							persist: false,
							create: function(input) {
								return {
									value: input,
									text: input
								}
							}
					});
					</script>
				</div>


				<!--Event image url-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Image url:
					</label>
					<div class="col-sm-8">
						<input id="image-url" type="hidden" name="image">
						<div id="event-img" class="dropzone"></div>
					</div>
					<script type="text/javascript">
					Dropzone.options.eventImg = {
						url: '<?php echo $app->urlFor('upload') ?>',
						paramName: "file", // The name that will be used to transfer the file
						maxFilesize: 2,
						maxFiles: 1,
						init: function() {
							this.on("success", function(file, response) {
								$('#image-url').val(response.url);
							});
						}
					};
					</script>
				</div>

				<!--date of event-->
		        <div class="form-group">
		          	<label class="col-sm-2 control-label">
		          		Date of event:
			        </label>
		    	    <div class="col-sm-2">
		                <input type="text" class="datepicker form-control" name = "date" placeholder="DD/MM/YYY">
	                    <script>
	                        var d = new Date();
	                        $('.datepicker').datepicker({
							  autoclose: true,
							  orientation: 'top',
							  todayHighlight: true,
	                          format:"d M yyyy",
	                          defaultViewDate: {
	                              year: d.getFullYear(),
	                              month: d.getMonth(),
	                              day: d.getDate(),
	                          }
	                        });
	                    </script>
		          	</div>
					<label class="col-sm-1 control-label">
						From:
					</label>
					<div class="col-sm-2">
						<input class="form-control" type="text" name="start_time" placeholder="HH:MM" pattern="[0-2][0-9]:[0-5][0-9]" required>
					</div>
					<label class="col-sm-1 control-label">
						to
					</label>
					<div class="col-sm-2">
						<input class="form-control" type="text" name="end_time" placeholder="HH:MM" pattern="[0-2][0-9]:[0-5][0-9]" required>
					</div>
				</div>

				<!--room-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Room:
				  	</label>
					<div class="col-sm-8">
						<select id="select-room" class="form-control" name="room_id">
							<?php foreach($rooms as $room) : ?>
							<option value="<?php echo $room->id?>"><?php echo $room->getBuildingName() . '—' . $room->name; ?></option>
							<?php endforeach; ?>
						</select>
						<script type="text/javascript">
							$('#select-room').selectize({
								sortField: 'text'
							});
						</script>
					</div>
				</div>
				<?php $proposed_by=$user->id; ?>
				<!--submit form-->
				<div class="col-sm-offset-2">
					<button type="reset" class="btn btn-default">Reset</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form><!-- end of event form -->
			</div><!-- page end -->
		</div>
	</div>
	</div>
</div>
<?php require('shared/footer.php'); ?>
</body>
</html>
