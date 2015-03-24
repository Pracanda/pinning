<div>
	<?php echo form_open_multipart('Home/creating_user', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Choose username :</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="Enter username" name="username" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Email :</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" placeholder="Email" name="email" required>
			</div>
		</div>
		<div class="submit">
			<button type="submit" class="btn btn-default btn-raised">Submit</button>
		</div>
	<?php echo form_close(); ?>
</div>