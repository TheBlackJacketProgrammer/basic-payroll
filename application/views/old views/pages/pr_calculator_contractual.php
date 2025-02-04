<div id="calc_contractual">
	<div class="form-row">
		<div class="form-group-sm col-md-3">
			<label class="m-0 font-weight-bold text-primary">EMPLOYEE ID: </label>
			<br>
			<label id="p_eid"><?php echo $eid; ?></label>
		</div>
		<div class="form-group-sm col-md-5">
			<label class="m-0 font-weight-bold text-primary">NAME: </label>
			<br>
			<label id="p_ename"><?php echo $FULLNAME; ?></label>
		</div>
		<div class="form-group-sm col-md-4">
			<label class="m-0 font-weight-bold text-primary">DESIGNATION: </label>
			<br>
			<label id="p_edesignation"><?php echo $DESIGNATION; ?></label>
		</div>
	</div>
	<hr>
	<div class="form-row">
		<div class="form-group-sm col-md-6">
			<label for="date_start" class="m-0 font-weight-bold text-primary">Date Start: </label>
				<label id="date_start" ><?php echo $START_PERIOD; ?></label>
		</div>
		<div class="form-group-sm col-md-6">
			<label for="date_end" class="m-0 font-weight-bold text-primary">Date End: </label>
			<label id="date_end"><?php echo $END_PERIOD; ?></label>
		</div>
	</div>
	<hr>
	<div class="card-header py-2">
		<h5 class="m-0 font-weight-bold text-success text-center">GROSS SALARY</h5>
	</div>
	<nav class="navbar navbar-expand-md navbar-light" style="background-color: #7ecfaf;">
		<a class="navbar-brand text-light">Trips</a>
		<div id="navbarEmployee">
			<div class="justify-content-between">
				<ul class="navbar-nav"></ul>
			</div>
		</div>
	</nav>
	<br>
	<div id="tbl_trip">
		<div class="table-responsive">
			<table id="tbl_payroll_trip" class="table-sm table-bordered" width="100%" cellspacing="0">
				<thead class="text-center" style="background-image: linear-gradient(#e3c274, #faefd2);">
					<tr>
						<th>#</th>
						<th>DATE</th>
						<!--<th>PICK-UP PT</th>
						<th>DELIVERY PT</th>-->
						<th>ROLE</th>
						<th>TRIP</th>
						<th>RATE</th>
						<th>PLATE #</th>
						<th>ADDTL BUDGET</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$arrChck = is_array($TRIPS)? 'OK':'NO';
					if($arrChck == 'NO') 
					{
						//array contains only empty values
					}
					else
					{
						foreach($TRIPS as $columns)
						{
							echo  '<tr role="row">'
								. '<td class="text-center">'.$columns->TRIP_NUM.'</td>'
								. '<td class="text-center">'.$columns->TRIP_DATE.'</td>'
								. '<td class="text-center">'.$columns->DESIGNATION.'</td>'
								. '<td class="text-center">'.$columns->PICKUP_POINT.' - '.$columns->DELIVERY_POINT.'</td>'
								. '<td class="text-center">'.$columns->TRIP_RATE.'</td>'
								. '<td class="text-center">'.$columns->PLATE_NUM.'</td>'
								. '<td class="text-center">'.$columns->ADDITIONAL_BUDGET.'</td>'
								. '</tr>';
						}
					}
				?>
				</tbody>
			</table>
		</div>
		<hr>
		<div class="form-row">
			<div class="form-group-sm col-md-4">
				<label class="m-0 font-weight-bold text-primary">NUMBER OF TRIPS</label>
				<br>
				<label id="p_trips"><?php if($TNUM == ''){$TNUM = 0;} echo $TNUM; ?></label>
			</div>
			<div class="form-group-sm col-md-4">
				<label class="m-0 font-weight-bold text-primary">TOTAL TRIP RATE</label>
				<br>
				<label id="p_ttriprate"><?php if($TRATE == ''){$TRATE = 0;} echo $TRATE; ?></label>
			</div>
			<div class="form-group-sm col-md-4">
				<label class="m-0 font-weight-bold text-primary">TOTAL ADDITIONAL BUDGET</label>
				<br>
				<label id="p_taddbudget"><?php if($TADDBGT == ''){$TADDBGT = 0;} echo $TADDBGT; ?></label>
			</div>
		</div>
	</div>
	<hr>
	<div class="card-header py-1">
		<h5 class="m-0 font-weight-bold text-success text-center">DEDUCTIONS</h5>
	</div>
	<div class="form-row">
		<div class="form-group-sm col-md-3">
			<label for="p_ssscontribution">SSS Contribution</label>
			<input type="text"  class="form-control" id="p_ssscontribution" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-2">
			<label for="p_sssloan">SSS Loan</label>
			<input type="text"  class="form-control" id="p_sssloan" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-2">
			<label for="p_philhealth">Philhealth</label>
			<input type="text"  class="form-control" id="p_philhealth" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-2">
			<label for="p_pagibig">PAGIBIG</label>
			<input type="text"  class="form-control" id="p_pagibig" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-3">
			<label for="p_pagibigloan">PAGIBIG Loan</label>
			<input type="text"  class="form-control" id="p_pagibigloan" placeholder="0" value="">
		</div>
	</div>
	<hr>
	<div class="form-row">
		<div class="form-group-sm col-md-3">
			<label for="p_loan">Loan</label>
			<input type="text"  class="form-control" id="p_loan" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-3">
			<label for="p_uniform">Uniform</label>
			<input type="text"  class="form-control" id="p_uniform" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-3">
			<label for="p_deduction">Deduction</label>
			<input type="text"  class="form-control" id="p_deduction" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-3">
			<label for="p_contribution">Contribution</label>
			<input type="text"  class="form-control" id="p_contribution" placeholder="0" value="">
		</div>
	</div>
	<hr>
	<div class="form-row">
		<div class="form-group-sm col-md-3">
			<label for="p_vale">Total Vale (DNS)</label>
			<input type="text"  class="form-control" id="p_vale" placeholder="0" value="<?php if($VALE == ''){$VALE = '';} echo $VALE; ?>">
		</div>
		<div class="form-group-sm col-md-3">
			<label for="p_valecoor">Vale Coordinator</label>
			<input type="text"  class="form-control" id="p_valecoor" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-3">
			<label for="p_valegcash">Vale G-Cash</label>
			<input type="text"  class="form-control" id="p_valegcash" placeholder="0" value="">
		</div>
		<?php
			if($DESIGNATION == 'Driver')
			{
				echo '<div class="form-group-sm col-md-3">'
					.	'<label for="p_valegcash">Reimburse</label>'
					.	'<input type="text"  class="form-control" id="p_abono" placeholder="0" value="'.$ABONO.'">'
					.'</div>';
			}
		?>
		
	</div>
	<hr>
	<div class="form-row">
		<div class="form-group-sm col-md-3">
			<label class="m-0 font-weight-bold text-primary">TOTAL GROSS SALARY: </label>
			<br>
			<label id="p_tgsalary">0</label>
		</div>
		<div class="form-group-sm col-md-3">
			<label class="m-0 font-weight-bold text-primary">TOTAL DEDUCTION: </label>
			<br>
			<label id="p_tdeduction">0</label>
		</div>
		<div class="form-group-sm col-md-3">
			<label class="m-0 font-weight-bold text-primary">REIMBURSE: </label>
			<br>
			<label id="l_reimburse">0</label>
		</div>
		<div class="form-group-sm col-md-3">
			<label class="m-0 font-weight-bold text-primary">NET PAY: </label>
			<br>
			<label id="p_netpay">0</label>
		</div>
	</div>
	<hr>
	<div class="form-group col-md-12">
		<button type="button" class="btn-lg btn-block btn-primary text-center" id="btn_save_payroll">Save Payroll</button>
	</div>
</form>

	<!-- My Custom scripts -->
	<script src="<?php echo base_url();?>assets/js/payroll-calculator-js-functions.js"></script>
</div>