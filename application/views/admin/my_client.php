
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
  			<td><?php echo $row->dealer; ?></td>
  			<td><?php echo $row->contact; ?></td>
  			<td><?php echo $row->email; ?></td>
  		</tr>
  		<?php endforeach; ?>
	</table>	
</div>
<?php foreach ($clients as $row) { ?>
	<?php $today=date('Y-m-d'); ?>
	<?php if($row->domain_status!=1): ?>
		<?php if(strcmp(strtotime($today),strtotime($row->domain_expire))>0): ?>
			<?php $config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.gmail.com',
			  'smtp_user' => 'slimshady320@gmail.com',
			  'smtp_pass' => 'lastlife',
			  'smtp_port' => 465,
			  'crlf' => "\r\n",
			  'newline' => "\r\n",
			  'mailtype' => "html"
			);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from("pinesofts.com");
			$this->email->to($row->email);
			$this->email->subject("Domain expiry");
			$this->email->set_newline("\r\n");
			$this->email->message("Please renew your account"); 
			if($this->email->send()){
				$data=array(
					'domain_status'=>'1'
					);
				$this->db->update("client",$data);
			} 
			else{
				echo $this->email->print_debugger();
			}
			?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if($row->hosting_status!=1): ?>
		<?php if(strcmp(strtotime($today),strtotime($row->hosting_expire))<0): ?>
			<?php $config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.gmail.com',
			  'smtp_user' => 'slimshady320@gmail.com',
			  'smtp_pass' => 'lastlife',
			  'smtp_port' => 465,
			  'crlf' => "\r\n",
			  'newline' => "\r\n",
			  'mailtype' => "html"
			);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from("pinesofts.com");
			$this->email->to($row->email);
			$this->email->subject("Hosting expiry");
			$this->email->set_newline("\r\n");
			$this->email->message("Your hosting has been expired!!Please renew your account!!"); 
			if($this->email->send()){
				$data=array(
					'hosting_status'=>'1'
					);
				$this->db->update("client",$data);
			} 
			else{
				echo $this->email->print_debugger();
			}
			?>
		<?php endif; ?>
	<?php endif; ?>
<?php } ?>