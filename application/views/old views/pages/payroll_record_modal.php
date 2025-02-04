<div id="modal_payroll" class="modal hide" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg card o-hidden border-5 shadow-lg my-5">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #db9153;">
				<h4>Employee's Payroll Record</h4>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body" style="color: black;">
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="m-0 font-weight-bold text-primary">PAYROLL ID: </label>
							<label id="pr_payroll_id"><?php echo $payroll_id; ?></label>
						</div>
						<div class="form-group col-md-6">
							<label class="m-0 font-weight-bold text-primary">PAYROLL: </label>
							<label id="pr_payroll_date"><?php echo $p_payrolldate; ?></label>
						</div>
					</div>
					<hr>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="p_gsalary">Gross Salary</label>
							<input type="text" readonly  class="form-control" id="p_gsalary" placeholder="Gross Salary" value="<?php echo $p_gsalary; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_rate">Rate Per Hour</label>
							<input type="text" readonly  class="form-control" id="p_rate" placeholder="Rate Per Hour" value="<?php echo $p_rate; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_hours">Hour Per Day</label>
							<input type="text" readonly  class="form-control" id="p_hours" placeholder="Hour Per Day" value="<?php echo $p_hours; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_days">Number of Working Days</label>
							<input type="text" readonly  class="form-control" id="p_days" placeholder="# of Working Days" value="<?php echo $p_days; ?>">
						</div>
					</div>
					<hr>
					<h5 class="m-0 font-weight-bold text-success text-center">Salary Deductions</h5>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="p_tax">Tax Deduction</label>
							<input type="text" readonly class="form-control" id="p_tax" placeholder="Tax Deduction" value="<?php echo $p_tax; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_philhealth">Philhealth</label>
							<input type="text" readonly class="form-control" id="p_philhealth" placeholder="Philhealth" value="<?php echo $p_philhealth; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_sss">SSS</label>
							<input type="text" readonly class="form-control" id="p_sss" placeholder="SSS" value="<?php echo $p_sss; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_pagibig">PAGIBIG</label>
							<input type="text" readonly class="form-control" id="p_pagibig" placeholder="PAGIBIG" value="<?php echo $p_pagibig; ?>">
						</div>
					</div>
					<hr>
					<h5 class="m-0 font-weight-bold text-success text-center">Results</h5>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="p_tax">Gross Salary</label>
							<input type="text" readonly class="form-control" id="p_tax" placeholder="Tax Deduction" value="<?php echo $p_gsalary; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_philhealth">Salary Deduction</label>
							<input type="text" readonly class="form-control" id="p_philhealth" placeholder="Philhealth" value="<?php echo $p_sdeduction; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_sss">Other Deduction</label>
							<input type="text" readonly class="form-control" id="p_sss" placeholder="SSS" value="<?php echo $p_odeduction; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="p_pagibig">Total Net Pay</label>
							<input type="text" readonly class="form-control" id="p_pagibig" placeholder="PAGIBIG" value="<?php echo $p_netpay; ?>">
						</div>
					</div>
					<hr>
				</form>
            </div>
            <div class="modal-footer"  style="background-color: #e0dcda;"></div> 
        </div>
    </div>
</div>