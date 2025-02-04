<div id="calc_regular">
<form>
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
	<div class="card-header py-1">
		<h5 class="m-0 font-weight-bold text-success text-center">GROSS SALARY</h5>
		<hr>
		<div id="tbl_wage">
			<input type="hidden" id="t_rate" name="t_rate" value="<?php echo $TRATE; ?>">
			<table id="tbl_payroll_regular" class="table-sm table-bordered" width="100%" cellspacing="0">
				<thead class="text-center" style="background-image: linear-gradient(#e3c274, #faefd2);">
					<tr>
						<th>DATE</th>
						<th>DAY</th>
						<th>RATE</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$arrChck = is_array($WAGE)? 'OK':'NO';
					if($arrChck == 'NO') 
					{
						//array contains only empty values
					}
					else
					{
						foreach($WAGE as $columns)
						{
							echo  '<tr role="row">'
								. '<td class="text-center">'.$columns->DATE.'</td>'
								. '<td class="text-center">'.$columns->DAY.'</td>'
								. '<td class="text-center">'.$columns->RATE.'</td>'
								. '</tr>';
						}
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<hr>
		<div class="form-row">
			<div class="form-group-sm col-md-4">
				<label class="m-0 font-weight-bold text-primary">TOTAL RATE</label>
				<br>
				<label id="l_trate"><?php if($TRATE == ''){$TRATE = 0;} echo $TRATE; ?></label>
			</div>
			<div class="form-group-sm col-md-4">
				<label class="m-0 font-weight-bold text-primary">TOTAL ECOLA</label>
				<br>
				<label id="l_tecola"><?php if($TECOLA == ''){$TECOLA = 0;} echo $TECOLA; ?></label>
			</div>
			<div class="form-group-sm col-md-4">
				<label class="m-0 font-weight-bold text-primary">TOTAL LATE</label>
				<br>
				<label id="l_tlate"><?php if($TLATE == ''){$TLATE = 0;} echo $TLATE; ?></label>
			</div>
		</div>
		<div class="form-row">
			
			<div class="form-group-sm col-md-3">
				<label class="m-0 font-weight-bold text-primary">TOTAL OVERTIME PAY</label>
				<br>
				<label id="l_tot"><?php if($TOT == ''){$TOT = 0;} echo $TOT; ?></label>
			</div>
			<div class="form-group-sm col-md-3">
				<label class="m-0 font-weight-bold text-primary">TOTAL NIGHT DIFFERENTIAL PAY</label>
				<br>
				<label id="l_tndp"><?php if($TNDP == ''){$TNDP = 0;} echo $TNDP; ?></label>
			</div>
			<div class="form-group-sm col-md-3">
				<label class="m-0 font-weight-bold text-primary">TOTAL HOLIDAY PAY</label>
				<br>
				<label id="l_hp"><?php if($THP == ''){$THP = 0;} echo $THP; ?></label>
			</div>
			<div class="form-group-sm col-md-3">
				<label class="m-0 font-weight-bold text-primary">TOTAL GROSS SALARY</label>
				<br>
				<label id="l_tgsalary"><?php if($TGSALARY == ''){$TGSALARY = 0;} echo $TGSALARY; ?></label>
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
		<div class="form-group-sm col-md-6">
			<label for="p_valecoor">Vale Coordinator</label>
			<input type="text"  class="form-control" id="p_valecoor" placeholder="0" value="">
		</div>
		<div class="form-group-sm col-md-6">
			<label for="p_valegcash">Vale G-Cash</label>
			<input type="text"  class="form-control" id="p_valegcash" placeholder="0" value="">
		</div>
	</div>
	<hr>
	<div class="form-row">
		<div class="form-group-sm col-md-4">
			<label class="m-0 font-weight-bold text-primary">TOTAL GROSS SALARY: </label>
			<br>
			<label id="p_tgsalary">0</label>
		</div>
		<div class="form-group-sm col-md-4">
			<label class="m-0 font-weight-bold text-primary">TOTAL DEDUCTION: </label>
			<br>
			<label id="p_tdeduction">0</label>
		</div>
		<div class="form-group-sm col-md-4">
			<label class="m-0 font-weight-bold text-primary">NET PAY: </label>
			<br>
			<label id="p_netpay">0</label>
		</div>
	</div>
	<hr>
	<div class="form-group col-md-12">
		<button type="button" class="btn-lg btn-block btn-primary text-center" id="btn_save_payroll_reg">Save Payroll</button>
	</div>
</form>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/pr_calc_regular.js"></script>
</div>