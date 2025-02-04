<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>ACTS Web-Based Payroll System</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  
	<!-- Custom styles for this template-->
	<link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/loading.css" rel="stylesheet">
	
	<!-- Custom styles for this page -->
    <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
    <!-- Outer Row -->
    <div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-md-12">
							<div class="p-5">
								<div class="text-center">
									<img src="<?php echo base_url();?>assets/img/logo.png" alt="LOGO" width="100" height="100">
									<br>
									<br>
									<h1 class="h4 text-gray-900 mb-4">ACTS Web-Based Payroll System</h1>
								</div>
								<form class="user" method="post" id="frmLogin">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="txt_username" placeholder="Enter Username">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="txt_password" placeholder="Enter Password">
									</div>
									<button type="button" class="btn btn-primary btn-block" id="btn_login">Login</button>
									<hr>
									<div class="text-center">
										<!--<a class="small" id="forgotPass">Forgot Password?</a>-->
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>
		
	<!-- My Custom scripts -->
	<script src="<?php echo base_url();?>assets/js/login-js-functions.js"></script>
</body>
</html>