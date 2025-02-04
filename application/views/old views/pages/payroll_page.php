<input type="hidden" id="dns_num" name="dns_num" value="<?php echo $CURR_DNSNUM; ?>">
<input type="hidden" id="dns_num_reg" name="dns_num_reg" value="<?php echo $CURR_DNSNUM_REG; ?>">
<input type="hidden" id="p_enum" name="p_enum">

<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-1 shadow-lg my-3">
			<div class="card-body p-1 div-border">
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ab378e;">
							<a class="navbar-brand">Payroll System</a>
						</nav>
						<div class="row">
							<div class="col-lg-6">
								<div class="border-1 shadow-lg my-3">
									<div class="card shadow mb-4">
										<nav class="navbar navbar-expand-md navbar-light" style="background-color: #58cc6b;">
											<a class="navbar-brand">Employees List</a>
										</nav>
										<div class="card-body">
											<div class="table-responsive text-dark">
												<div id="payroll_table_employee_list">
													<table id="tbl_payroll_employee_list" class="table-sm table-bordered" style="width:100%">
														<thead class="text-center text-dark" style="background-image: linear-gradient(#50e667, #deffe3);">
															<tr>
																<th>EMPLOYEE ID</th>
																<th>FULLNAME</th>
															</tr>
														</thead>
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
																		. '<td class="text-center" id="tdp_eid"><a href="#">'.$columns->ENUM.'</a></td>'
																		. '<td class="text-center" id="tdp_fullname">'.$columns->ALIAS.'</td>'
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
							<div class="col-lg-6">
								<div class="border-1 shadow-lg my-3">
									<div class="card shadow mb-4">
										<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #58cc6b;">
											<a class="navbar-brand">Payroll Calculator</a>
										</nav>
										<div class="card-body text-dark">
											<div id="p_calculator">
												
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="border-1 shadow-lg my-1">
											<div class="card shadow mb-4">
												<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #58cc6b;">
													<a class="navbar-brand">Employee Payroll Records</a>
												</nav>
												<div class="card-body">
													<div id="p_payroll_records">
														
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
			</div>
        </div>
    </div>
</div>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/payroll-js-functions.js"></script>

