<h1 class="heading">Add Income</h1>
<?php $client=$this->db->get("client")->result();?>
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
	<label class="col-sm-2 control-label">Dealed Price :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="dealed_price" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Advance amount :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="advance_amount" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Received By :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" name="received_by" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Due Amount :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="due_amount" required>
	</div>
</div>

<div class="submit">
	<button type="submit" class="btn btn-default btn-raised">Add</button>
</div>

<?php echo form_close(); ?>