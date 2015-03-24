<?php $projects=$this->db->get('client')->result(); ?>
<div class="heading">
	<h1>Create your log</h1>
</div>
<div style="text-align:center">
	<h2>Select Project</h2>
	<?php echo form_open_multipart('User_login/user_login', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
		<select name="project">
			<?php foreach($projects as $row): ?>
				<option value="<?php echo $row->org; ?>"><?php echo $row->org; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="form-group">
			<button type="submit" class="btn btn-default btn-raised">Submit</button>
		</div>
	<?php echo form_close(); ?>
</div>

<div role="tabpanel">
	<ul class="nav nav-tabs">
		<li role="presentation"><a href="#allLogs" data-toggle="tab">Project</a></li>
		<li role="presentation"><a href="#myLogs" data-toggle="tab">Fund Distribution</a></li>
		<li role="presentation" class="active"><a href="#createLogs" data-toggle="tab">Expenses</a></li>
	</ul>
</div>