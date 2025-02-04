<table id="tbl_payroll_employee_list" class="table-sm table-bordered" width="100%">
	<thead class="text-center" style="background-image: linear-gradient(#50e667, #deffe3);">
		<tr>
			<th>EMPLOYEE ID</th>
			<th>FULLNAME</th>
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
					. '<td class="text-center" id="tdp_eid"><a href="#">'.$columns->ENUM.'</a></td>'
					. '<td class="text-center" id="tdp_fullname">'.$columns->ALIAS.'</td>'
					. '</tr>';
			}
		}
	?>
	</tbody>
</table>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/payroll-js-functions.js"></script>

