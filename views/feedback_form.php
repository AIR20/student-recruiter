<!DOCTYPE html>
<html>
	<?php require 'shared/head.php'; ?>
	<body>
	<?php require 'shared/navbar.php'; ?>
	<div class="container">
	<div class="bs-docs-section">
	<div class = "row">
	<div class="main col-md-12">
		<h1 class="page-header"> Event Feedback</h1>
			<?php require 'shared/notice.php'; ?>
		<div class="well col-md-8 col-md-offset-2">
		 	<form action="<?php echo $app->urlFor('teacher_store'); ?>" method="post" class="form-horizontal">

				<!-- Comment Box -->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Comments:
					</label>
					<div class="col-sm-8">
						<textarea class="form-control" rows="3" id="textArea"></textarea>
					</div>
				</div>

				<!-- Event Rating, Radio Buttons -->
				<!-- Problems - need radio buttons to be on single line -->

				<div class="form-group">
					<label class="col-sm-2 contro-label">
						Event Rating	
					</label>
					<div class="col-sm-8">
						<div class="radio">
							<label> 
							<input type="radio" name="optionsRadios" id="optionsRadios1" checked="">
								1
							</label>
						</div>
						<div class="radio">
							<label>
							<input type="radio" name="optionsRadios" id="optionsRadios2" checked="no">
								2
							</label>
						</div>
						<div class="radio">
							<label>
							<input type="radio" name="optionsRadios" id="optionsRadios3" checked="no">
								3
							</label>
						</div>
						<div class="radio">
							<label>
							<input type="radio" name="optionsRadios" id="optionsRadios4" checked="no">
								4
							</label>
						</div>
						<div class="radio">
							<label>
							<input type="radio" name="optionsRadios" id="optionsRadios5" checked="no">
								5
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 contro-label">
					Emoji:	
					</label>
					<div class="col-sm-8">	
						<img class="emoji" src="../../assets/img/emoji/701.png"/>
						<img class="emoji" src="../../assets/img/emoji/702.png"/>
						<img class="emoji" src="../../assets/img/emoji/703.png"/>
						<img class="emoji" src="../../assets/img/emoji/704.png"/>
						<img class="emoji" src="../../assets/img/emoji/705.png"/>
						<img class="emoji" src="../../assets/img/emoji/706.png"/>
						<img class="emoji" src="../../assets/img/emoji/707.png"/>
						<img class="emoji" src="../../assets/img/emoji/711.png"/>
						<img class="emoji" src="../../assets/img/emoji/714.png"/>
						<img class="emoji" src="../../assets/img/emoji/717.png"/>
						<img class="emoji" src="../../assets/img/emoji/719.png"/>
						<img class="emoji" src="../../assets/img/emoji/720.png"/>
						<img class="emoji" src="../../assets/img/emoji/722.png"/>
						<img class="emoji" src="../../assets/img/emoji/738.png"/>
						<img class="emoji" src="../../assets/img/emoji/731.png"/>
						<img class="emoji" src="../../assets/img/emoji/732.png"/>
						<img class="emoji" src="../../assets/img/emoji/733.png"/>
						<img class="emoji" src="../../assets/img/emoji/734.png"/>
					</div>
				</div>

				<!-- Reset and submit buttons -->
				<div class="col-sm-offset-2">
					<a href="<?php echo $app->urlFor('store_feedback', array('id' =>$event->id)); ?>" class="btn btn btn-success"><i class="fa fa-comments fa-lg fa-fw"></i> Sumbit Feedback</a>
				</div>
			</form>
	</div>
	</div>
	</div>
	</div>
	</div>
	<?php require 'shared/footer.php'; ?>
	</body>
</html>
