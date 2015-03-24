<h1 class="heading">Fund Distribution</h1>
<?php echo form_open_multipart('home/fund_add', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Taken By :</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" name="taken_by" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Amount :</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="amount" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Date :</label>
	<div class="col-sm-10">
		<input type="date" class="form-control" name="date" required>
	</div>
</div>

<div class="submit">
	<button type="submit" class="btn btn-default btn-raised">Add</button>
</div>

<?php echo form_close(); ?>