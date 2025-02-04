<br>
<div class="table-responsive">
	<table id="tbl_dns" class="table table-sm table-bordered" width="100%" cellspacing="0">
		<thead class="text-center" style="background-color: #a6eda4;">
			<tr>
				<th>DATE</th>
				<th>DAY</th>
				<th>NAME</th>
				<th>DESIGNATION</th>
				<th>RATE</th>
				<th>ECOLA</th>
				<th>OVERTIME PAY</th>
				<th>NIGHT DIFFERENTIAL PAY</th>
				<th>HOLIDAY PAY</th>
				<th>LATE</th>
				<th>GROSS SALARY</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$arrChck = is_array($records)? 'OK':'NO';
			if($arrChck == 'NO') 
			{
				echo "<script> alert('NO RECORDS'); </script>";											//array contains only empty values
			}
			else
			{
				foreach ($records as $columns) 
				{
					echo  '<tr role="row">'
						. '<td class="text-center">'.$columns->dr_date.'</td>'
						. '<td class="text-center">'.$columns->dr_day.'</td>'
						. '<td class="text-center">'.$columns->dr_name.'</td>'
						. '<td class="text-center">'.$columns->dr_designation.'</td>'
						. '<td class="text-center">'.$columns->dr_rate.'</td>'
						. '<td class="text-center">'.$columns->dr_ecola.'</td>'
						. '<td class="text-center">'.$columns->dr_ot.'</td>'
						. '<td class="text-center">'.$columns->dr_ndp.'</td>'
						. '<td class="text-center">'.$columns->dr_hp.'</td>'
						. '<td class="text-center">'.$columns->dr_late.'</td>'
						. '<td class="text-center">'.$columns->dr_gsalary.'</td>'
						. '</tr>';
				}				
			}
		?>
		</tbody>
	</table>
</div>


<!-- My Custom scripts -->
