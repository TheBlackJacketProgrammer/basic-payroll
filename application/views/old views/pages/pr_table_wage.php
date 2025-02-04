<input type="hidden" id="t_rate" name="t_rate" value="<?php echo $TRATE; ?>">
<table id="tbl_payroll_regular" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead class="text-center" style="background-color: #f0e1cc;">
		<tr>
			<th>DATE</th>
			<th>DAY</th>
			<th>RATE</th>
		</tr>
	</thead>
	<tfoot class="text-center" style="background-color: #f0e1cc;">
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</tfoot>
	<tbody>
	<?php
		$arrChck = is_array($WAGE)? 'OK':'NO';
		if($arrChck == 'NO') 
		{
			//array contains only empty values
		}
		else
		{
			foreach($WAGE as $columns)
			{
				echo  '<tr role="row">'
					. '<td class="text-center"><a href="#">'.$columns->DATE.'</a></td>'
					. '<td class="text-center">'.$columns->DAY.'</td>'
					. '<td class="text-center">'.$columns->RATE.'</td>'
					. '</tr>';
			}
		}
	?>
	</tbody>
</table>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/pr_tbl_wage.js"></script>