<?php $projects=$this->db->get('client')->result(); ?>
<div class="heading">
	<h1>View log</h1>
</div>
<div style="text-align:center">
	<h2>Select Project</h2>
	<?php echo form_open_multipart('Home/view_log', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
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
	<?php if(!empty($log)): ?>
			<?php $project=$this->db->get_where('client',array('id'=>$log[0]->project_id))->result(); ?>
			<div style="text-align:center ;">
				<h3><?php echo $project[0]->org; ?></h3>
			</div>
			<table class="table table-condensed">
			  		<tr>
			  			<th>S.N.</th>
			  			<th>Date</th>
			  			<th>Start Time</th>
			  			<th>End Time</th>
			  			<th>Commitment</th>
			  			<th>Contributed By</th>
			  		</tr>
					<?php $i=1; foreach($log as $row): ?>
					<?php $user=$this->db->get_where('user',array('id'=>$row->user_id))->result(); ?>
			   		<?php $username=$user[0]->username; ?>
			  		<tr>
			  			<td><?php echo $i++; ?></td>
			  			<td><?php echo $row->date; ?></td>
			  			<td><?php echo $row->start_time; ?></td>
			  			<td><?php echo $row->end_time; ?></td>
			  			<td><?php echo $row->commitment; ?></td>
			  			<td><?php echo $username; ?></td>
			  		</tr>
			  		<?php endforeach; ?>
				</table>
	<?php endif; ?>
</div>
