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
			<p>Request admin to make this event<span class="error">* required</span></p>

			<!-- Request form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('event_store');?>" method="post" class="form-horizontal">

				<!--Event type-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Event type:
					</label>
					<div class="col-sm-10">
						<select class="form-control" name="type">
							<option value="Open day">Open day</option>
							<option value="Public lecture">Public lecture</option>
							<option value="Public lecture">Talk</option>
							<option value="Concert">Concert</option>
							<option value="Workshop">Workshop</option>
							<option value="Sample course">Sample course</option>
							<option value="Careers event">Careers event</option>
							<option value="Careers fair">Careers fair</option>
						</select>
				  	</div>
				</div>

				<!--Event title-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Event title: <span class="error">*</span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="title">
					</div>
				</div>

				<!--Event description-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Event description: <span class="error">*</span>
					</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="4" id=description type="text" name="description"></textarea>
					</div>
				</div>


				<!--Event image url-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Image url: <span class="error">*</span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="image_url">
					</div>
				</div>

				<!--date of event-->
		        <div class="form-group">
		          	<label class="col-sm-2 control-label">
		          		Date of event: <span class="error">*<?php echo $dobErr?></span>
			        </label>
		    	    <div class="col-sm-10">
		                <input type="text" class="datepicker form-control" name = "date" placeholder="DD/MM/YYY">
	                    <script>
	                        var d = new Date();
	                        $('.datepicker').datepicker({
							  autoclose: true,
	                          format:"d M yyyy",
	                          defaultViewDate: {
	                              year: d.getFullYear(),
	                              month: d.getMonth(),
	                              day: d.getDate(),
	                          }
	                        });
	                    </script>
		          	</div>
		        </div>

				<!--time-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Start time:
					</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="start_time" placeholder="HH:MM">
					</div>
				</div>

				<!--end time-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						End time:
					</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="end_time" placeholder="HH:MM">
					</div>
				</div>

				<!--building-->
				<div class="form-group">
				  	<label class="col-sm-2 control-label">
						Building:
					</label>
					<div class="col-sm-10">
						<select class="form-control" name="building_id">
							<?php foreach($buildings as $building) : ?>
							<option value="<?php echo $building->id?>"><?php echo $building->name; ?></option>
							<?php endforeach; ?>
					   	</select>
					</div>
				</div>

				<!--room-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Room:
				  	</label>
					<div class="col-sm-10">
						<select class="form-control" name="room_id">
							<?php foreach($rooms as $room) : ?>
							<option value="<?php echo $room->id?>"><?php echo $room->room_name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<!--submit form-->
				<input class="col-sm-offset-2 btn btn-primary" type="submit">
			</form><!-- end of event form -->
			</div><!-- page end -->
		</div>
	</div>
	</div>
</div>
</body>
</html>
