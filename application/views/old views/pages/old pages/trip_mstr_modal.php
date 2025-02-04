<link href="<?php echo base_url();?>assets/css/img-custom.css" rel="stylesheet">

<div id="modal_tripmstr" class="modal hide" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog card o-hidden border-5 shadow-lg my-5">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #58cc6b;">
				<h4>Add New Trip Data</h4>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body" style="color: black;">
				<div class="row">
					<div class="col-lg-12">
						<br>
						<form name="form_employee" method="post" style="display: table;">
						<p style="display: table-row;">
							<label for="txt_pickup" style="display: table-cell;">PICK-UP POINT:</label>
							<input type="text" name="txt_pickup" id="txt_pickup" placeholder="PICK-UP POINT" autocomplete="off" style="width: 300px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="txt_delivery" style="display: table-cell;">DELIVERY POINT:</label>
							<input type="text" name="txt_delivery" id="txt_delivery" placeholder="DELIVERY POINT" autocomplete="off" style="width: 300px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="txt_drate" style="display: table-cell;">DRIVER RATE:</label>
							<input type="text" name="txt_drate" id="txt_drate" placeholder="DRIVER RATE" autocomplete="off" style="width: 300px; margin-left: 10px; margin-bottom: 5px;">
						</p>
						<p style="display: table-row;">
							<label for="txt_hrate" style="display: table-cell;">HELPER RATE:</label>
							<input type="text" name="txt_hrate" id="txt_hrate" placeholder="HELPER RATE" autocomplete="off" style="width: 300px; margin-left: 10px; margin-bottom: 5px;">
						</p>		
						<p style="display: table-row;">
							<label for="txt_duo" style="display: table-cell;">DUO RATE:</label>
							<input type="text" name="txt_duo" id="txt_duo" placeholder="DUO RATE" autocomplete="off" style="width: 300px; margin-left: 10px; margin-bottom: 5px;">
						</p>		
						</form>
						<hr>
						<button type="button" class="btn btn-lg btn-dark btn-block" id="btn_save_trpdata">Save Trip Data</button>
					</div>
				</div>
            </div>
            <div class="modal-footer"  style="background-color: #e0dcda;"></div> 
        </div>
    </div>
</div>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/trip_mstr_modal.js"></script>