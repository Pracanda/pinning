<?php echo "hello profile"; ?>
<div>
	<h2>Change password</h2>
	<?php echo form_open("User/change_password", array('data-toggle' => 'validator')); ?>
		
		<div class="form-group">
			<input type="password" class="form-control" name="current_password" placeholder="Current Password" required>
			<div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group">
			<input type="password" class="form-control" data-minlength="6" name="new_password" placeholder="New Password" required>
			<div class="help-block">Minimum 6 characters</div>
		</div>

		<div class="submit">
			<button type="submit" class="btn btn-default">Update</button>
		</div>

	<?php echo form_close(); ?>
</div>