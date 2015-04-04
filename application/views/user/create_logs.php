<div class="row">
	<div class="col-md-9 col-sm-9">
		<div class="widget widget-nopad">
		  <div class="widget-header"> <i class="icon-list-alt"></i>
		    <h3><?php echo "Work log of ".ucfirst($client->client); ?></h3>
		    <h3><a href="<?php echo base_url('log/income/'.$client->id) ?>">Income Log</a></h3>
		  </div>
		  <!-- /widget-header -->
		  <div class="widget-content">
		    <div class="widget big-stats-container">
		      <div class="widget-content">
		        <div id="big_stats" class="cf">
		        	<?php $this->load->view("user/basic_client_info"); ?>
		        	<hr>
			         <div role="tabpanel">
						<ul class="nav nav-tabs">
							<li role="presentation" class="active"><a href="#myLogs" data-toggle="tab">My Logs</a></li>
							<li role="presentation"><a href="#allLogs" data-toggle="tab">Project Logs</a></li>
							<li role="presentation"><a href="#" data-toggle="modal" data-target="#createlog">Create</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="myLogs">
								<div>
									<?php 
										$id=$this->db->select('id')->get_where('user',array('username'=>$this->session->userdata('user')))->result();
										$id=$id[0]->id;
										$myLog=$this->db->order_by('date','desc')->get_where('project_logs',array('user_id'=>$id,'project_id'=>$client->id))->result();
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
							<div class="tab-pane" id="allLogs">
								<div>
								   <?php $projectLog=$this->db->order_by('date','desc')->get_where('project_logs',array('project_id'=>$client->id))->result(); ?>
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
						</div>
					</div>
		        </div>
		      </div>
		      <!-- /widget-content --> 
		      
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="createlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		        	<?php echo form_open_multipart('User/log_entry', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
		            <div class="modal-header">
		            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <div style="text-align:center;">Create New Log</div>
		            </div>
		            <div class="modal-body">
		                <div class="log">
							<div class="form-group">
								<label class="col-sm-3 control-label">Date :</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" name="date" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Start Time :</label>
								<div class="col-sm-9">
									<input type="time" class="form-control" name="start_time" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">End Time :</label>
								<div class="col-sm-9">
									<input type="time" class="form-control" name="end_time" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Commitment :</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="commitment" placeholder="Your commitment??" required>
								</div>
							</div>
							<input type="hidden" value="<?php echo $client->id; ?>" name="project_id">
						</div>
		            </div>
		            <div class="modal-footer">
		            	<button type="submit" class="btn btn-primary">Create</button>
		            	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
		            </div>
		            <?php echo form_close(); ?>
		        </div>
		    </div>
		</div>
	</div>

	<div class="col-md-3 col-sm-3">
		<?php $this->load->view("user/log_sidebar",array("id"=>$this->uri->segment(3), "heading"=>"Other Projects")) ?>
	</div>

</div>