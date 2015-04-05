<h1 class="heading">Update Income</h1>
<?php echo form_open_multipart('Home/income_updated', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Received amount :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" value="<?php echo $income[0]->received_amount; ?>" name="received_amount" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Remarks :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" value="<?php echo $income[0]->remarks; ?>" name="remarks">
	</div>
</div>

<div class="submit">
	<input type="hidden" value="<?php echo $income[0]->id; ?>" name="hid">
	<button type="submit" class="btn btn-default btn-raised">Update</button>
</div>

<?php echo form_close(); ?>