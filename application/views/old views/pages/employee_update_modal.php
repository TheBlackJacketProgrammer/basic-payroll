<link href="<?php echo base_url();?>assets/css/img-custom.css" rel="stylesheet">

<div id="modal_update_employee" class="modal hide" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg card o-hidden border-5 shadow-lg my-5">
        <div class="modal-content">
            <div class="modal-header" style="background-image: linear-gradient(to right, #7d039c, #ffffff);">
				<h4>Update Employee Data</h4>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body" style="color: black;">
				<div class="row">
					<div class="col-lg-3 div-border">
						<br>
						<img id="e_img" class="img-fluid rounded mx-auto d-block" src="<?php echo $PICTURE; ?>" alt="Employee" style="width:100% margin-bottom: 10px;">
						<input type="file" id="btn_upload" style="display: none;" />
						<hr>
						<button type="button" class="btn btn-md btn-success btn-block"  onclick="document.getElementById('btn_upload').click();">Upload Image</button>
						<br>
					</div>
					<div class="col-lg-4 div-border">
						<br>
						<h4 class="text-center"><b>Personal Information</b></h4>
						<hr>
						<form name="form_employee_update" method="post" style="display: table;">
							<p style="display: table-row;">
								<label for="eu_id" style="display: none;">EID:</label>
								<input type="text" name="eu_id" id="eu_id" style="display: none;" placeholder="EID" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $EID; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_enum" style="display: table-cell;">EMPLOYEE #:</label>
								<input type="text" name="eu_enum" id="eu_enum" placeholder="EMPLOYEE NUMBER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $ENUM; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_lastname" style="display: table-cell;">LASTNAME:</label>
								<input type="text" name="eu_lastname" id="eu_lastname" placeholder="LASTNAME" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $LASTNAME; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_firstname" style="display: table-cell;">FIRSTNAME:</label>
								<input type="text" name="eu_firstname" id="eu_firstname" placeholder="FIRSTNAME" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $FIRSTNAME; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_middlename" style="display: table-cell;">MIDDLENAME:</label>
								<input type="text" name="eu_middlename" id="eu_middlename" placeholder="MIDDLENAME" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $MIDDLENAME; ?>">
							</p>		
							<p style="display: table-row;">
								<label for="eu_birthdate" style="display: table-cell;">BIRTHDATE:</label>
								<input type="text" name="eu_birthdate" id="eu_birthdate" placeholder="BIRTHDATE" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $BIRTHDATE; ?>">
							</p>		
							<p style="display: table-row;">
								<!--<label for="eu_gender" style="display: table-cell;">GENDER:  </label>
								<input type="text" name="eu_gender" id="eu_gender" placeholder="GENDER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $GENDER; ?>">-->
								<label for="eu_gender" style="display: table-cell; vertical-align: middle;">GENDER: </label>
								<!--<input type="text" name="ea_gender" id="ea_gender" placeholder="GENDER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">-->
								<input type="radio" id="rbtn_male" name="eu_gender" value="Male" style="margin-left: 10px; margin-right: 2px; margin-top: 5px;" <?php echo ($GENDER=='Male')?'checked':'' ?>>
								<label for="male" style="margin-right: 5px;" >Male</label>
								<input type="radio" id="rbtn_female" name="eu_gender" value="Female" style="margin-right: 2px; margin-top: 5px;" <?php echo ($GENDER=='Female')?'checked':'' ?>>
								<label for="female" style="margin-right: 5px;">Female</label>
							</p>
							<p style="display: table-row;">
								<label for="eu_civilstatus" style="display: table-cell;">CIVIL STATUS:  </label>
								<input type="text" name="eu_civilstatus" id="eu_civilstatus" placeholder="CIVIL STATUS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $CIVIL_STATUS; ?>">
							</p>
							<p style="display: table-row;">
								<!--<label for="eu_address" style="display: table-cell;">ADDRESS:  </label>
								<input type="text" name="eu_address" id="eu_address" placeholder="ADDRESS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" >-->
								<label for="eu_address" style="display: table-cell; vertical-align: top;">ADDRESS:  </label>
								<!--<input type="text" name="ea_address" id="ea_address" placeholder="ADDRESS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;">-->
								<textarea name="eu_address" id="eu_address" placeholder="ADDRESS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 10px;" rows="3" cols="30"><?php echo $ADDRESS; ?></textarea>
							</p>
					</div>	
					<div class="col-lg-5 div-border">
						<br>
						<h4 class="text-center"><b>Job Information</b></h4>
						<hr>
							<p style="display: table-row;">
								<label for="eu_designation" style="display: table-cell;">DESIGNATION:</label>
								<input type="text" name="eu_designation" id="eu_designation" placeholder="DESIGNATION" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $DESIGNATION; ?>">
							</p>		
							<p style="display: table-row;">
								<label for="eu_type" style="display: table-cell; ">EMPLOYEE TYPE:</label>
								<input type="text" name="eu_type" id="eu_type" placeholder="EMPLOYEE TYPE" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $EMPLOYEE_TYPE; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_date" style="display: table-cell; ">EMPLOYMENT DATE:</label>
								<input type="text" name="eu_date" id="eu_date" placeholder="EMPLOYMENT DATE" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $EMPLOYMENT_DATE; ?>">
							</p>						
							<p style="display: table-row;">
								<label for="eu_status" style="display: table-cell;">EMPLOYMENT STATUS:</label>
								<input type="text" name="eu_status" id="eu_status" placeholder="EMPLOYMENT STATUS" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $EMPLOYEE_STATUS; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_sss" style="display: table-cell;">SSS NUMBER:</label>
								<input type="text" name="eu_sss" id="eu_sss" placeholder="SSS NUMBER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $SSS; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_tin" style="display: table-cell;">TIN NUMBER:</label>
								<input type="text" name="eu_tin" id="eu_tin" placeholder="TIN NUMBER" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $PHILHEALTH; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_philhealth" style="display: table-cell;">PHILHEALTH:</label>
								<input type="text" name="eu_philhealth" id="eu_philhealth" placeholder="PHILHEALTH" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $TIN; ?>">
							</p>
							<p style="display: table-row;">
								<label for="eu_pagibig" style="display: table-cell;">PAGIBIG:</label>
								<input type="text" name="eu_pagibig" id="eu_pagibig" placeholder="PAGIBIG" autocomplete="off" style="width: 240px; margin-left: 10px; margin-bottom: 5px;" value="<?php echo $PAGIBIG; ?>">
							</p>
						</form>
						<button type="button" class="btn btn-md btn-primary" style="float: right; margin-top: 10px; margin-bottom: 10px;" id="btn_update">Update Employee Data</button>
					</div>
				</div>
            </div>
            <!--<div class="modal-footer"  style="background-color: #e0dcda;"></div>-->
        </div>
    </div>
</div>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/modal-js-functions.js"></script>