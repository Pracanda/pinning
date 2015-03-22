<?php 


$data['title'] = $title;
$data['id'] = $id;

$this->load->view('admin/includes/header', $data);
$this->load->view('admin/includes/nav', $data);
?>
<div class="col-md-9 content"><!-- 
	<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo ucfirst($msg); ?>
    </div> -->
	<?php $this->load->view($content); ?>
</div>
<?php 
	$this->load->view('admin/includes/footer');