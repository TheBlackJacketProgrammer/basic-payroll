<div class="row justify-content-center">
    <div class="col-xl-11 col-lg-12 col-md-9">
        <div class="card o-hidden border-1 shadow-lg my-5">
			<div class="card-body p-1">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ab378e;">
							<a class="navbar-brand">Payroll Summary</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPayroll" aria-controls="navbarPayroll" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarPayroll">
								<div class="navbar-collapse collapse justify-content-between">
									<ul class="navbar-nav mr-auto">
										<!--<a class="nav-item nav-link" id="a_pdf">Convert To PDF</a>-->
									</ul>
									<form method="post" action="<?php echo base_url(); ?>main/exportExcel">
									<!--<form method="post">-->
									<ul class="navbar-nav">
										<div id="opt_payrolldates">
										
										</div>
									</ul>
									<br>
									<input type="submit" name="export" class="btn btn-success btn-block" value="Download As Excel File" />
									</form>
									<!--<button type="button" class="btn btn-success btn-block" id="btn_excel">Download As Excel File</button>-->
								</div>
							</div>
						</nav>
						<!-- DataTales Example -->
						<div class="card shadow mb-4">
							<div class="card-header py-1">
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<div id="tbl_prsummary">
										<table id="tbl_summary" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead class="text-center" style="background-color: #f0e1cc;">
												<tr>
													<th>PAYROLL ID</th>
													<th>EMPLOYEE ID</th>
													<th>FULLNAME</th>
													<th>GROSS SALARY</th>
													<th>TOTAL DEDUCTION</th>
													<th>NET PAY</th>
												</tr>
											</thead>
											<tfoot class="text-center" style="background-color: #f0e1cc;">
												<tr>
													<th>PAYROLL ID</th>
													<th>EMPLOYEE ID</th>
													<th>FULLNAME</th>
													<th>GROSS SALARY</th>
													<th>TOTAL DEDUCTION</th>
													<th>NET PAY</th>
												</tr>
											</tfoot>
											<tbody>
												<?php
												$arrChck = is_array($records)? 'OK':'NO';
												if($arrChck == 'NO') 
												{
												//array contains only empty values
												}
												else
												{
													foreach($records as $columns)
													{
														echo  '<tr role="row">'
															. '<td class="text-center">'.$columns->PAYROLL_ID.'</td>'
															. '<td class="text-center">'.$columns->EMPLOYEE_ID.'</td>'
															. '<td class="text-center">'.$columns->FULLNAME.'</td>'
															. '<td class="text-center">'.$columns->GROSS_SALARY.'</td>'
															. '<td class="text-center">'.$columns->TOTAL_DEDUCTION.'</td>'
															. '<td class="text-center">'.$columns->NETPAY.'</td>'
															. '</tr>';
													}
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
        </div>
    </div>
</div>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/main-js-functions.js"></script>

