<div class="table-responsive">
	<table id="tbl_payroll_trip" class="table-sm table-bordered" cellspacing="0">
		<thead class="text-center" style="background-image: linear-gradient(#e3c274, #faefd2);">
			<tr>
				<th>TRIP #</th>
				<th>TRIP</th>
				<th>DATE</th>
				<th>TRIP RATE</th>
				<th>ADDTIONAL BUDGET</th>
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
						. '<td class="text-center"><a href="#">'.$columns->TRIP_NUM.'</a></td>'
						. '<td class="text-center">'.$columns->TRIP.'</td>'
						. '<td class="text-center">'.$columns->TRIP_DATE.'</td>'
						. '<td class="text-center">'.$columns->TRIP_RATE.'</td>'
						. '<td class="text-center">'.$columns->ADDITIONAL_BUDGET.'</td>'
						. '</tr>';
				}
			}
		?>
		</tbody>
	</table>
</div>
<div class="form-row">
	<div class="form-group-sm col-md-4">
		<label class="m-0 font-weight-bold text-primary">NUMBER OF TRIPS</label>
		<br>
		<label id="p_numtrips"><?php if($TNUM == ''){$TNUM = 0;} echo $TNUM; ?></label>
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

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/payroll-record-js-functions.js"></script>
<script src="<?php echo base_url();?>assets/js/payroll-calculator-js-functions.js"></script>