<div class="table-responsive">
	<table id="tbl_payroll_records" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead class="text-center" style="background-color: #f0e1cc;">
			<tr>
				<th>PAYROLL CODE</th>
				<th>START DATE</th>
				<th>END DATE</th>
				<th>NET PAY</th>
			</tr>
		</thead>
		<tfoot class="text-center" style="background-color: #f0e1cc;">
			<tr>
				<th>PAYROLL CODE</th>
				<th>START DATE</th>
				<th>END DATE</th>
				<th>NET PAY</th>
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
						. '<td class="text-center">
							<form method="post" action="'.base_url().'payslip/generate_slip">
								<input type="hidden" id="excel_jobtype" name="excel_jobtype" value="'.$DESIGNATION.'">
								<input type="hidden" id="excel_fullname" name="excel_fullname" value="'.$FULLNAME.'">
								<input type="hidden" id="excel_pid" name="excel_pid" value="'.$columns->PAYROLL_ID.'">
								<input type="hidden" id="excel_pcode" name="excel_pcode" value="'.$columns->PAYROLL_CODE.'">
								<input type="hidden" id="excel_alias" name="excel_alias" value="'.$ALIAS.'">
								<input type="submit" class="btn btn-success btn-block" value="'.$columns->PAYROLL_CODE.'" />
						    </form>
						  </td>'
						. '<td class="text-center">'.$columns->START_DATE.'</td>'
						. '<td class="text-center">'.$columns->END_DATE.'</td>'
						. '<td class="text-center">'.$columns->NETPAY.'</td>'
						. '</tr>';
				}
			}
		?>
		</tbody>
	</table>
</div>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/payroll-record-js-functions.js"></script>