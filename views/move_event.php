<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="bs-docs-section">
	<div class="row">
		<div class="main col-md-12">

			<h1 class="page-header">Move or reschedule event</h1>

			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('store_move_event', array('id' => $event->id));?>" method="post" class="form-horizontal">

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Room:
				  	</label>
					<div class="col-sm-8">
						<select class="form-control" name="room_id">
							<?php foreach($rooms as $room) : ?>
							<option value="<?php echo $room->id?>"><?php echo $room->getBuildingName() . '—' . $room->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

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
						<input class="form-control" type="text" name="start_time" placeholder="HH:MM">
					</div>
					<label class="col-sm-1 control-label">
						to
					</label>
					<div class="col-sm-2">
						<input class="form-control" type="text" name="end_time" placeholder="HH:MM">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Comments:
					</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="4" id=description type="comment" name="description"></textarea>
					</div>
				</div>
				<?php	$approved_by=$user->id; ?>
				<div class="col-sm-offset-2">
					<button class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-arrow-up fa-lg fa-fw"></i> Update</button>
				</div>			

			</form>
			</div>
		</div>
	</div>
	</div>
</div>
</body>
</html>
