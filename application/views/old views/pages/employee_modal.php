<link href="<?php echo base_url();?>assets/css/img-custom.css" rel="stylesheet">

<div id="modal_employee" class="modal hide" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg card o-hidden border-5 shadow-lg my-5">
        <div class="modal-content">
            <div class="modal-header" style="background-image: linear-gradient(to right, #7d039c, #ffffff);">
				<h5><b>New Employee Data</b></h5>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body div-border" style="color: black;">
				<div class="row">
					<div class="col-lg-3 div-border">
						<br>
						<img id="e_img" class="img-fluid rounded mx-auto d-block" src="<?=base_url()?>assets/img/employee.png" alt="Employee" style="width:100% margin-bottom: 10px;">
						<input type="file" id="btn_upload" style="display: none;" />
						<hr>
						<button type="button" class="btn btn-md btn-success btn-block"  onclick="document.getElementById('btn_upload').click();">Upload Image</button>
						<br>
					</div>
					<div class="col-lg-4 div-border">
					<br>
					<h4 class="text-center"><b>Personal Information</b></h4>
					<hr>
					<form name="form_employee" method="post" style="display: table;">
						<p style="display: table-row;">
							<label for="ea_enum" style="display: table-cell; vertical-align: middle;">EMPLOYEE #:</label>
							<input type="text" name="ea_enum" id="ea_enum" placeholder="EMPLOYEE NUMBER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_lastname" style="display: table-cell; vertical-align: middle;">LASTNAME:</label>
							<input type="text" name="ea_lastname" id="ea_lastname" placeholder="LASTNAME" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_firstname" style="display: table-cell; vertical-align: middle;">FIRSTNAME:</label>
							<input type="text" name="ea_firstname" id="ea_firstname" placeholder="FIRSTNAME" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_middlename" style="display: table-cell; vertical-align: middle;">MIDDLENAME:</label>
							<input type="text" name="ea_middlename" id="ea_middlename" placeholder="MIDDLENAME" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>		
						<p style="display: table-row;">
							<label for="ea_birthdate" style="display: table-cell; vertical-align: middle;">BIRTHDATE:</label>
							<!--<input class="form-control" type="date" name="ea_birthdate" id="ea_birthdate" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">-->
							<input type="text" name="ea_birthdate" id="ea_birthdate" placeholder="BIRTHDATE" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>		
						<p style="display: table-row;">
							<label for="ea_gender" style="display: table-cell; vertical-align: middle;">GENDER: </label>
							<!--<input type="text" name="ea_gender" id="ea_gender" placeholder="GENDER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">-->
							<input type="radio" id="rbtn_male" name="ea_gender" value="Male" style="margin-left: 10px; margin-right: 2px; margin-top: 5px;">
							<label for="male" style="margin-right: 5px;">Male</label>
							<input type="radio" id="rbtn_female" name="ea_gender" value="Female" style="margin-right: 2px; margin-top: 5px;">
							<label for="female" style="margin-right: 5px;">Female</label>
						</p>
						<p style="display: table-row;">
							<label for="ea_civilstatus" style="display: table-cell; vertical-align: middle;">CIVIL STATUS: </label>
							<input type="text" name="ea_civilstatus" id="ea_civilstatus" placeholder="CIVIL STATUS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_address" style="display: table-cell; vertical-align: top;">ADDRESS:  </label>
							<!--<input type="text" name="ea_address" id="ea_address" placeholder="ADDRESS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">-->
							<textarea name="ea_address" id="ea_address" placeholder="ADDRESS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 10px;" rows="3" cols="30"></textarea>
						</p>
					</div>
					<div class="col-lg-5 div-border">
						<br>
						<h4 class="text-center"><b>Job Information</b></h4>
						<hr>
						<p style="display: table-row;">
							<label for="ea_designation" style="display: table-cell; vertical-align: middle;">DESIGNATION:</label>
							<input type="text" name="ea_designation" id="ea_designation" placeholder="DESIGNATION" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>		
						<p style="display: table-row;">
							<label for="ea_type" style="display: table-cell; vertical-align: middle;">EMPLOYEE TYPE:</label>
							<input type="text" name="ea_type" id="ea_type" placeholder="EMPLOYEE TYPE" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_date" style="display: table-cell; vertical-align: middle;">EMPLOYMENT DATE:</label>
							<input type="text" name="ea_date" id="ea_date" placeholder="EMPLOYMENT DATE" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>						
						<p style="display: table-row;">
							<label for="ea_status" style="display: table-cell; vertical-align: middle;">EMPLOYMENT STATUS:</label>
							<input type="text" name="ea_status" id="ea_status" placeholder="EMPLOYMENT STATUS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_sss" style="display: table-cell; vertical-align: middle;">SSS NUMBER:</label>
							<input type="text" name="ea_sss" id="ea_sss" placeholder="SSS NUMBER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_tin" style="display: table-cell; vertical-align: middle;">TIN NUMBER:</label>
							<input type="text" name="ea_tin" id="ea_tin" placeholder="TIN NUMBER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_philhealth" style="display: table-cell; vertical-align: middle;">PHILHEALTH:</label>
							<input type="text" name="ea_philhealth" id="ea_philhealth" placeholder="PHILHEALTH" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="ea_pagibig" style="display: table-cell; vertical-align: middle;">PAGIBIG:</label>
							<input type="text" name="ea_pagibig" id="ea_pagibig" placeholder="PAGIBIG" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<button type="button" style="float: right; margin-top: 10px; margin-bottom: 10px;" class="btn btn-md btn-primary" id="btn_save">Save New Employee Data</button>
					
					</div>
					</form>
				</div>
            </div>
            <!--<div class="modal-footer"  style="background-color: #e0dcda;"></div>-->
        </div>
    </div>
</div>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/modal-js-functions.js"></script>