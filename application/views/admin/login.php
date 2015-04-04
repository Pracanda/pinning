<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/pages/signin.css') ?>">
</head>
<body>

<div class="account-container">

	<div class="content clearfix">

		<?php echo form_open_multipart('Admin_login/user_login', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
			<div class="login-fields">

				<h1>Login Below</h1>

				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" placeholder="Username" class="form-control username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" placeholder="Password" class="form-control password-field"/>
				</div> <!-- /password -->

			</div>

			<div class="login-actions">
				
				<span class="login-checkbox">
					<input type="submit" class="button btn btn-success btn-large" value="Sign In">
				</span>
				
			</div>
		<?php echo form_close(); ?>

	</div>

</div>

	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/validator.min.js' ?>"></script>

</body>
</html>