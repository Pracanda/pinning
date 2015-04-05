<h1 class="heading">Add Income</h1>
<?php $client=$this->db->get("client")->result();?>
<?php $receiver=$this->db->get('user')->result(); ?>
<?php echo form_open_multipart('Home/income_add', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
<div class="form-group">
	<label class="col-sm-2 control-label">Client Name :</label>
	<div class="col-sm-10">
		<select name="client">
			<?php foreach($client as $row): ?>
				<option value="<?php echo $row->id; ?>"><?php echo $row->org; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Received On :</label>
	<div class="col-sm-10">
		<input type="date" class="form-control" name="received_date" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Advance amount :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="received_amount" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Received By :</label>
	<div class="col-sm-10">
		<select name="received_by">
			<?php foreach($receiver as $row): ?>
				<option value="<?php echo $row->id; ?>"><?php echo $row->username; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Remarks :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" name="remarks">
	</div>
</div>

<div class="submit">
	<button type="submit" class="btn btn-default btn-raised">Add</button>
</div>

<?php echo form_close(); ?>