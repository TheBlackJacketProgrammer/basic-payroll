<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
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
	<body id="page-top" class="text-white" style="background-image: linear-gradient(#ffffff, #07a30d);">
	
		<!-- Main Nav Bar -->
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url();?>assets/img/logo.png" alt="Logo" style="width:40px;">
			</a>
			<!--<a class="navbar-brand">ACTS Web-Based Payroll System</a>-->
			<a class="navbar-brand text-light"><b>ACTS Web-Based HRIS</b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link btn-style" id="e_manager">Employee Manager System</a>
					<!--<a class="nav-item nav-link" id="e_tripmgr">Trip Manager</a>-->
					<li class="nav-item dropdown">
						<a class="nav-item nav-link dropdown-toggle btn-style" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Payroll System
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-image: linear-gradient(#d67ec2, #ffffff);">
							<a class="dropdown-item" href="#" id="e_payroll">Payroll Calculator</a>
							<a class="dropdown-item" href="#" id="e_summary">Payroll Summary</a>
							<!--<div class="dropdown-divider"></div>-->
							<!--<a class="dropdown-item" href="#">Something else here</a>-->
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-item nav-link dropdown-toggle btn-style" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							DNS 
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-image: linear-gradient(#d67ec2, #ffffff);">
							<a class="dropdown-item" href="#" id="dns_reg">DNS for Regulars</a>
							<a class="dropdown-item" href="#" id="dns_dh">DNS for Drivers/Helpers</a>
						</div>
					</li>
					<!--<a class="nav-item nav-link btn-style" id="e_dns">DNS</a>-->
					<a class="nav-item nav-link btn-style" href="<?php echo base_url();?>">Logout</a>
				</div>
			</div>
		</nav>
		<!-- End Main Nav Bar -->
		
		<div id="main_content">
			
		</div>
		
		<div id="main_modal">
		
		</div>
	
	<!-- ======= Footer ======= -->
	<!--<footer class="sticky-footer text-light" style="background-color: #ab378e;">
        <div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>Copyright &copy; Web-Based Payroll System - Demo Version 2020</span>
			</div>
        </div>
    </footer>-->
	
	<!-- End Footer -->
	
	
	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?php echo base_url();?>assets/js/demo/datatables-demo.js"></script>
	<!-- <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>-->

	<!-- Page level custom scripts -->
	<!-- <script src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>-->
	<!-- <script src="<?php echo base_url();?>assets/js/demo/chart-pie-demo.js"></script>-->

		
	<!-- My Custom scripts -->
	<script src="<?php echo base_url();?>assets/js/main-js-functions.js"></script>
	</body>
</html>