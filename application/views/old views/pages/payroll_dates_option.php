<?php
	$arrChck = is_array($records)? 'OK':'NO';
	if($arrChck == 'NO') 
	{
		//array contains only empty values
	}
	else
	{
		echo  '<select class="form-control" id="opt_payroll" name="opt_payroll" onchange="load_payroll_summary()">';
		echo  '<option value="X">- SELECT PAYROLL DATE HERE -</option>';
		foreach($records as $columns)
		{
			echo  '<option value="'.$columns->RANGE.'">'.$columns->RANGE.'</option>';
		}
		echo  '</select">';
	}
	?>