<h1 class="heading">Edit Client</h1>

<?php echo form_open_multipart('home/client_edited', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
<div class="form-group">
	<label class="col-sm-2 control-label">Client Name :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" value="<?php echo $info[0]->client ?>" name="client" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Organization Name :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" value="<?php echo $info[0]->org; ?>" name="org" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Website Name :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" value="<?php echo $info[0]->website; ?>" name="website" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Dealed On :</label>
	<div class="col-sm-10">
		<input type="date" class="form-control" value="<?php echo $info[0]->date_deal; ?>" name="date_deal" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Domain Expire On :</label>
	<div class="col-sm-10">
		<input type="date" class="form-control" value="<?php echo $info[0]->domain_expire; ?>" name="domain_expire" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Hosting Expire On :</label>
	<div class="col-sm-10">
		<input type="date" class="form-control" value="<?php echo $info[0]->hosting_expire; ?>" name="hosting_expire" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Dealed By :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" value="<?php echo $info[0]->dealer; ?>" name="dealer" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Contact Number:</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" value="<?php echo $info[0]->contact; ?>" name="contact" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Email Address :</label>
	<div class="col-sm-10">
		<input type="email" class="form-control" value="<?php echo $info[0]->email; ?>" name="email" required>
	</div>
</div>

<div class="submit">
	<input type="hidden" value="<?php echo $info[0]->id; ?>" name="cid">
	<button type="submit" class="btn btn-default btn-raised">Update</button>
</div>

<?php echo form_close(); ?>