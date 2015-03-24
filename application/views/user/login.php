<div>
	<?php echo form_open_multipart('log', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Username :</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="Enter username" name="username" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Password :</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" placeholder="Enter password" name="password" required>
			</div>
		</div>
		<div class="submit">
			<button type="submit" class="btn btn-default btn-raised">CREATE</button>
		</div>
	<?php echo form_close(); ?>
</div>