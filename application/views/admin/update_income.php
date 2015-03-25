<h1 class="heading">Update Income</h1>
<?php echo form_open_multipart('Home/income_updated', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Dealed Price :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" value="<?php echo $income[0]->dealed_price; ?>" name="dealed_price" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Advance amount :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" value="<?php echo $income[0]->advance_amount; ?>" name="advance_amount" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Received By :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" value="<?php echo $income[0]->received_by; ?>" name="received_by" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Due Amount :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" value="<?php echo $income[0]->due_amount; ?>" name="due_amount" required>
	</div>
</div>

<div class="submit">
	<input type="hidden" value="<?php echo $income[0]->id; ?>" name="hid">
	<button type="submit" class="btn btn-default btn-raised">Update</button>
</div>

<?php echo form_close(); ?>