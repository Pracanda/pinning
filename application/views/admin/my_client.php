
<div id="client">
	<table class="table table-condensed">
  		<tr>
  			<th>S.N.</th>
  			<th>Client Name</th>
  			<th>Organization Name</th>
  			<th>Website</th>
  			<th>Dealed On</th>
  			<th>Expiry(Domain)</th>
  			<th>Expiry(Hosting)</th>
  			<th>Dealed By</th>
  			<th>Contact Number</th>
  			<th>Email Address</th>
  		</tr>
  		<?php $today=date('Y-m-d'); ?>
		<?php $i=1; foreach($clients as $row): ?>
		<?php $dealer=$this->db->get_where('user', array('id'=>$row->dealer))->result(); ?>
  		<tr>
  			<td><?php echo $i++; ?></td>
  			<td><?php echo $row->client; ?></td>
  			<td><?php echo anchor("Home/edit_client/$row->id", $row->org); ?></td>
  			<td><?php echo anchor($row->website, $row->website); ?></td>
  			<td><?php echo $row->date_deal; ?></td>
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
  			<td><?php echo $dealer[0]->username; ?></td>
  			<td><?php echo $row->contact; ?></td>
  			<td><?php echo $row->email; ?></td>
  		</tr>
  		<?php endforeach; ?>
	</table>	
</div>