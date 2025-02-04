<table id="tbl_summary" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead class="text-center" style="background-color: #f0e1cc;">
		<tr>
			<th>PAYROLL ID</th>
			<th>EMPLOYEE ID</th>
			<th>FULLNAME</th>
			<th>GROSS SALARY</th>
			<th>TOTAL DEDUCTION</th>
			<th>NET PAY</th>
		</tr>
	</thead>
	<tfoot class="text-center" style="background-color: #f0e1cc;">
		<tr>
			<th>PAYROLL ID</th>
			<th>EMPLOYEE ID</th>
			<th>FULLNAME</th>
			<th>GROSS SALARY</th>
			<th>TOTAL DEDUCTION</th>
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
					. '<td class="text-center">'.$columns->PAYROLL_ID.'</td>'
					. '<td class="text-center">'.$columns->EMPLOYEE_ID.'</td>'
					. '<td class="text-center">'.$columns->FULLNAME.'</td>'
					. '<td class="text-center">'.$columns->GROSS_SALARY.'</td>'
					. '<td class="text-center">'.$columns->TOTAL_DEDUCTION.'</td>'
					. '<td class="text-center">'.$columns->NETPAY.'</td>'
					. '</tr>';
			}
		}
	?>
	</tbody>
</table>

