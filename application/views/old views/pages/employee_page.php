<div class="row justify-content-center">
    <div class="col-xl-11 col-lg-12 col-md-9">
        <div class="card o-hidden border-1 shadow-lg my-5">
			<div class="card-body p-1">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ab378e;">
							<a class="navbar-brand"><b>Employee Manager</b></a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEmployee" aria-controls="navbarEmployee" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarEmployee">
								<div class="navbar-collapse collapse justify-content-between">
									<ul class="navbar-nav mr-auto">
										<a class="nav-item nav-link btn-style" id="e_add">Add New Employee Data</a>
									</ul>
								</div>
							</div>
						</nav>
						<div class="card shadow mb-4">
							<div class="card-body div-border">
								<div class="table-responsive text-dark">
									<table id="tbl_employee" class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead class="text-center text-dark" style="background-image: linear-gradient(#50e667, #deffe3);">
											<tr>
												<th>#</th>
												<th>EMPLOYEE ID</th>
												<th>LASTNAME</th>
												<th>FIRSTNAME</th>
												<th>MIDDLENAME</th>
												<th>JOB POSITION</th>
												<th>EMPLOYEE TYPE</th>
												<th>EMPLOYEE STATUS</th>
											</tr>
										</thead>
										<tfoot class="text-center text-dark" style=" background-image: linear-gradient(#deffe3, #50e667);">
											<tr>
												<th>#</th>
												<th>EMPLOYEE ID</th>
												<th>LASTNAME</th>
												<th>FIRSTNAME</th>
												<th>MIDDLENAME</th>
												<th>JOB POSITION</th>
												<th>EMPLOYEE TYPE</th>
												<th>EMPLOYEE STATUS</th>
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
														. '<td class="text-center" id="e_id"><a href="#">'.$columns->EID.'</a></td>'
														. '<td class="text-center" id="e_num">'.$columns->ENUM.'</td>'
														. '<td class="text-center" id="e_lastname">'.$columns->LASTNAME.'</td>'
														. '<td class="text-center" id="e_firstname">'.$columns->FIRSTNAME.'</td>'
														. '<td class="text-center" id="e_middlename">'.$columns->MIDDLENAME.'</td>'
														. '<td class="text-center" id="e_designation">'.$columns->DESIGNATION.'</td>'
														. '<td class="text-center" id="e_type">'.$columns->ETYPE.'</td>'
														. '<td class="text-center" id="e_status">'.$columns->STATUS.'</td>'
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

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/main-js-functions.js"></script>

