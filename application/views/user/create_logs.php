<?php if(isset($project_id) && !empty($project_id)): ?>
	<?php $project=$this->db->get_where('client',array('id'=>$project_id))->result(); ?>
	<?php $project=$project[0]->org; ?>
<?php else: ?>
	<?php $project_id=$this->uri->segment(2); ?>
	<?php $project=$this->db->get_where('client',array('id'=>$project_id))->result(); ?>
	<?php if(!empty($project)): ?>
		<?php $project=$project[0]->org; ?>
	<?php else: ?>
		<?php show_404(); ?>
	<?php endif; ?>
<?php endif; ?>
<div style="text-align:center;">
	<h1><?php echo $project; ?></h1>
</div>
<div role="tabpanel">
	<ul class="nav nav-tabs">
		<li role="presentation"><a href="#allLogs" data-toggle="tab">Project Logs</a></li>
		<li role="presentation"><a href="#myLogs" data-toggle="tab">My Logs</a></li>
		<li role="presentation" class="active"><a href="#createLogs" data-toggle="tab">Create</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane" id="allLogs">
			<div>
			   <?php $projectLog=$this->db->order_by('date','desc')->get_where('project_logs',array('project_id'=>$project_id))->result(); ?>
			   <table class="table table-condensed">
			  		<tr>
			  			<th>S.N.</th>
			  			<th>Date</th>
			  			<th>Start Time</th>
			  			<th>End Time</th>
			  			<th>Commitment</th>
			  			<th>Contributed By</th>
			  		</tr>
					<?php $i=1; foreach($projectLog as $row): ?>
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
			</div>
		</div>
		<div class="tab-pane" id="myLogs">
			<div>
				<?php 
					$id=$this->db->select('id')->get_where('user',array('username'=>$this->session->userdata('user')))->result();
					$id=$id[0]->id;
					$myLog=$this->db->order_by('date','desc')->get_where('project_logs',array('user_id'=>$id,'project_id'=>$project_id))->result();
				 ?>
				 <table class="table table-condensed">
			  		<tr>
			  			<th>S.N.</th>
			  			<th>Date</th>
			  			<th>Start Time</th>
			  			<th>End Time</th>
			  			<th>My Contribution</th>
			  		</tr>
					<?php $i=1; foreach($myLog as $row): ?>
			  		<tr>
			  			<td><?php echo $i++; ?></td>
			  			<td><?php echo $row->date; ?></td>
			  			<td><?php echo $row->start_time; ?></td>
			  			<td><?php echo $row->end_time; ?></td>
			  			<td><?php echo $row->commitment; ?></td>
			  		</tr>
			  		<?php endforeach; ?>
				</table>
			</div>
		</div>
		<div class="tab-pane active" id="createLogs">
			<div class="log">
				<?php echo form_open_multipart('User/log_entry', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
					<div class="form-group">
						<label class="col-sm-2 control-label">Date :</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="date" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Start Time :</label>
						<div class="col-sm-10">
							<input type="time" class="form-control" name="start_time" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">End Time :</label>
						<div class="col-sm-10">
							<input type="time" class="form-control" name="end_time" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Commitment :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="commitment" placeholder="Your commitment??" required>
						</div>
					</div>
					<div class="submit">
						<input type="hidden" value="<?php echo $project_id; ?>" name="project_id">
						<button type="submit" class="btn btn-default btn-raised">create</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>