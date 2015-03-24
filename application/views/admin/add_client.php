<h1 class="heading">Entry form</h1>

<?php echo form_open_multipart('home/store_entry', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
<div class="form-group">
	<label class="col-sm-2 control-label">Client Name :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" placeholder="Enter name here" name="client" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Organization Name :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" placeholder="Name of the Organization" name="org" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Website Name :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" placeholder="website name" name="website" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Dealed On :</label>
	<div class="col-sm-10">
		<input type="date" class="form-control" name="date_deal" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Domain Expire On :</label>
	<div class="col-sm-10">
		<input type="date" class="form-control" name="domain_expire" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Hosting Expire On :</label>
	<div class="col-sm-10">
		<input type="date" class="form-control" name="hosting_expire" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Dealed By :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" placeholder="Enter dealer" name="dealer" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Contact Number:</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" placeholder="Enter Contact #" name="contact" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Email Address :</label>
	<div class="col-sm-10">
		<input type="email" class="form-control" placeholder="Enter email" name="email" required>
	</div>
</div>

<div class="submit">
	<button type="submit" class="btn btn-default btn-raised">Submit</button>
</div>

<?php echo form_close(); ?>