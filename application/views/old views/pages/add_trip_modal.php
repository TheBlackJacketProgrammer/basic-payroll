<div id="modal_addtrip" class="modal hide" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg card o-hidden border-5 shadow-lg my-5">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #58cc6b;">
				<h4>Add New Trip Information</h4>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body" style="color: black;">
				<form>
					<div class="form-row">
						<div class="form-group-sm col-md-3">
							<label class="m-0 font-weight-bold text-primary">EMPLOYEE ID: </label>
							<br>
							<label id="ta_eid"><?php echo $eid; ?></label>
						</div>
						<div class="form-group-sm col-md-5">
							<label class="m-0 font-weight-bold text-primary">NAME: </label>
							<br>
							<label id="ta_ename"><?php echo $FULLNAME; ?></label>
						</div>
						<div class="form-group-sm col-md-4">
							<label class="m-0 font-weight-bold text-primary">DESIGNATION: </label>
							<br>
							<label id="ta_edesignation"><?php echo $DESIGNATION; ?></label>
						</div>
					</div>
					<hr>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="ta_pickup">PICK-UP POINT</label>
							<!--<input type="text" class="form-control" id="ta_pickup" placeholder="PICK-UP POINT">-->
							<select id="opt_pickup" class="form-control">
								<option value="PPT">- SELECT PICK-UP POINT -</option> 
								<?php
									$arrChck = is_array($trip_pickup)? 'OK':'NO';
									if($arrChck == 'NO') 
									{
										//array contains only empty values
									}
									else
									{
										foreach($trip_pickup as $columns)
										{
											echo  '<option value="'.$columns->PICKUP.'">'.$columns->PICKUP.'</option> ';
										}
									}
								?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="ta_destination">DESTINATION POINT</label>
							<!--<input type="text" class="form-control" id="ta_destination" placeholder="DESTINATION POINT">-->
							<select id="opt_delivery" class="form-control">
								<option value="DPT">- SELECT DELIVERY POINT -</option> 
								<?php
									$arrChck = is_array($trip_delivery)? 'OK':'NO';
									if($arrChck == 'NO') 
									{
										//array contains only empty values
									}
									else
									{
										foreach($trip_delivery as $columns)
										{
											echo  '<option value="'.$columns->DELIVERY.'">'.$columns->DELIVERY.'</option> ';
										}
									}
								?>
							</select>
						</div>
					</div>
					<hr>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="ta_triprate">TRIP RATE</label>
							<input type="text" class="form-control" id="ta_triprate" placeholder="TRIP RATE" value="0">
						</div>
						<div class="form-group col-md-4">
							<label for="ta_tripdate">TRIP DATE</label>
							<input class="form-control" type="date" value="YYYY-MM-DD" id="ta_tripdate">
							<!--<input type="text" class="form-control" id="ta_tripdate" placeholder="TRIP DATE" value="0">-->
						</div>
						<div class="form-group col-md-4">
							<label for="ta_addbudget">ADDITIONAL BUDGET</label>
							<input type="text" class="form-control" id="ta_addbudget" placeholder="ADDITIONAL BUDGET" value="0">
						</div>
					</div>
					<hr>
					<div class="form-group col-md-12">
						<button type="button" class="btn-lg btn-primary text-center float-right" id="btn_save_trip">Save Trip</button>
					</div>
				</form>
            </div>
            <div class="modal-footer"  style="background-color: #e0dcda;"></div> 
        </div>
    </div>
	<!-- My Custom scripts -->
	<script src="<?php echo base_url();?>assets/js/add-trip-modal.js"></script>
</div>