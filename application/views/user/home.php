<?php $projects=$this->db->get('client')->result(); ?>
<div class="heading">
	<h1>Create log</h1>
</div>
<div style="text-align:center">
	<h2>Select Project</h2>
	<?php echo form_open_multipart('log', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
		<select name="project">
			<?php foreach($projects as $row): ?>
				<option value="<?php echo $row->id; ?>"><?php echo $row->org; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="form-group">
			<button type="submit" class="btn btn-default btn-raised">View</button>
		</div>
	<?php echo form_close(); ?>
</div>
<div>
	<?php $date=strtotime(date('Y-m-d')); ?>
	<?php $due= strtotime("2015-04-8"); ?>
	<?php echo $due-$date; ?>
</div>