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