<?php 


$data['title'] = $title;
$data['id'] = $id;

$this->load->view('user/includes/header', $data);
$this->load->view('user/includes/nav', $data);
?>
<div class="col-md-12 content">
		<?php $success = $this->session->flashdata('success'); if(!empty($success)): ?>
			<div class="alert alert-danger success">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <?php echo ucfirst($success); ?>
		    </div>
		<?php endif; ?>
		<?php $error = $this->session->flashdata('error'); if(!empty($error)): ?>
			<div class="alert alert-danger error">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <?php echo ucfirst($error); ?>
		    </div>
		<?php endif; ?>
	<?php $this->load->view($content); ?>
</div>
<?php 
	$this->load->view('user/includes/footer');