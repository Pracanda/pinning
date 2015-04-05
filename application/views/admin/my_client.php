<div style="text-align: center; margin: 0 0 25px 0;">
    <a href="#" data-toggle="modal" data-target="#add-client" class="btn btn-success" style="background: #00BA8B;"><i class="icon-signin"></i> Add Client</a>

    <div class="modal fade" id="add-client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <?php echo form_open_multipart('home/store_entry', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div style="text-align:center;">Add New Client</div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Client Name :</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Enter name here" name="client" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Organization Name :</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Name of the Organization" name="org" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Website Name :</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="website name" name="website">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Price :</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" placeholder="Dealing Price" name="dealing_price" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Dealed On :</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="date_deal" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Domain Expire On :</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="domain_expire">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hosting Expire On :</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="hosting_expire">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Dealed By :</label>
                      <div class="col-sm-4">
                        <select name="dealer" class="form-control">
                          <?php $dealer=$this->db->get('user')->result(); ?>
                          <?php foreach($dealer as $row): ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->username; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Contact Number:</label>
                      <div class="col-sm-7">
                        <input type="number" class="form-control" placeholder="Enter Contact #" name="contact" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Email Address :</label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
              <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<div id="client">
	<table class="table table-condensed">
    <thead>
  		<tr>
  			<th>Client Name</th>
  			<th>Dealed On</th>
  			<th>Expiry(Domain)</th>
  			<th>Expiry(Hosting)</th>
  			<th>Contact Number</th>
        <th></th>
  		</tr>
    </thead>
  		<?php $today=date('Y-m-d'); ?>
    <tbody>
		<?php foreach($clients as $row): ?>
		<?php $dealer=$this->db->get_where('user', array('id'=>$row->dealer))->result(); ?>
  		<tr>
  			<td><?php echo ucfirst($row->client); ?></td>
  			<!-- <td><?php echo anchor("Home/edit_client/$row->id", $row->org); ?></td> -->
  			<td><?php echo date("d M Y", strtotime($row->date_deal)); ?> <small><?php echo "(".$dealer[0]->username.")" ?></small></td>
  			<td>
  				<?php if(strcmp(strtotime($today),strtotime($row->domain_expire))>0): ?>
  					<div class="expire">
  					  <?php echo $row->domain_expire; ?>
  					</div>
  				<?php else: ?>
  					<div class="active">
  						<?php echo $row->domain_expire; ?>
  					</div>
  				<?php endif; ?>
  			</td>
  			<td>
  				<?php if(strcmp(strtotime($today),strtotime($row->hosting_expire))>0): ?>
  					<div class="expire">
  					  <?php echo $row->hosting_expire; ?>
  					</div>
  				<?php else: ?>
  					<div class="active">
  						<?php echo $row->hosting_expire; ?>
  					</div>
  				<?php endif; ?>
  			</td>
  			<td><?php echo $row->contact; ?></td>
        <td>
          <a href="#" data-toggle="modal" class="btn btn-inverse" data-target="#view-client<?php echo $row->id; ?>"><i class="icon-eye-open"></i></a>
          <a href="<?php echo base_url('Home/edit_client/'.$row->id) ?>" class="btn btn-primary"><i class="icon-edit"></i></a>
        </td>
  		</tr>
  		<?php endforeach; ?>
      </tbody>
	</table>	
</div>

<?php foreach($clients as $row): ?>

    <div class="modal fade" id="view-client<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1><?php echo $row->client ?></h1>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>