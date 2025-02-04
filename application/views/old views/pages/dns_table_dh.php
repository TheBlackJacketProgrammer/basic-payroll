<br>
<div class="table-responsive">
	<table id="tbl_dns" class="table table-sm table-bordered" width="100%" cellspacing="0">
		<thead class="text-center text-dark" style="background-image: linear-gradient(#50e667, #deffe3);">
			<tr>
				<th>PICK-UP DATE</th>
				<th>PLATE #</th>
				<th>TYPE</th>
				<th>DRIVER</th>
				<th>HELPER 1</th>
				<th>H1-RATE</th>
				<th>HELPER 2</th>
				<th>H2-RATE</th>
				<th>EXTRA HELPER</th>
				<th>EH-RATE</th>
				<th>CLIENT</th>
				<th>TRIP TYPE</th>
				<th>PICK-UP POINT</th>
				<th>DELIVERY</th>
				<th>DRIVER'S RATE</th>
				<th>BUD CASH</th>
				<th>GCASH</th>
				<th>M.LHUILLIER</th>
				<th>TRANSACTION FEE</th>
				<th>TOTAL BUDGET</th>
				<th>HELPER VALE</th>
				<th>HELPER 2 VALE</th>
				<th>HELPER EXTRA VALE</th>
				<th>MEAL</th>
				<th>T.FEE</th>
				<th>E.FEE/PROVINCIAL STICKER</th>
				<th>P.FEE</th>
				<th>E HELPER NON BILLABLE</th>
				<th>E HELPER BILLABLE</th>
				<th>HULI</th>
				<th>RETURNED</th>
				<th>VALE</th>
				<th>REIMBURSE</th>
				<th>POD</th>
				<th>SHIPMENT/ TRIP TICKET</th>
				<th>BILLING REMARK</th>
			</tr>
		</thead>
		<tfoot class="text-center text-dark" style=" background-image: linear-gradient(#deffe3, #50e667);">
			<tr>
				<th>PICK-UP DATE</th>
				<th>PLATE #</th>
				<th>TYPE</th>
				<th>DRIVER</th>
				<th>HELPER 1</th>
				<th>H1-RATE</th>
				<th>HELPER 2</th>
				<th>H2-RATE</th>
				<th>EXTRA HELPER</th>
				<th>EH-RATE</th>
				<th>CLIENT</th>
				<th>TRIP TYPE</th>
				<th>PICK-UP POINT</th>
				<th>DELIVERY</th>
				<th>DRIVER'S RATE</th>
				<th>BUD CASH</th>
				<th>GCASH</th>
				<th>M.LHUILLIER</th>
				<th>TRANSACTION FEE</th>
				<th>TOTAL BUDGET</th>
				<th>HELPER VALE</th>
				<th>HELPER 2 VALE</th>
				<th>HELPER EXTRA VALE</th>
				<th>MEAL</th>
				<th>T.FEE</th>
				<th>E.FEE/PROVINCIAL STICKER</th>
				<th>P.FEE</th>
				<th>E HELPER NON BILLABLE</th>
				<th>E HELPER BILLABLE</th>
				<th>HULI</th>
				<th>RETURNED</th>
				<th>VALE</th>
				<th>REIMBURSE</th>
				<th>POD</th>
				<th>SHIPMENT/ TRIP TICKET</th>
				<th>BILLING REMARK</th>
			</tr>
		</tfoot>
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
						. '<td class="text-center">'.$columns->dns_pickupdate.'</td>'
						. '<td class="text-center">'.$columns->dns_platenum.'</td>'
						. '<td class="text-center">'.$columns->dns_type.'</td>'
						. '<td class="text-center">'.$columns->dns_driver.'</td>'
						. '<td class="text-center">'.$columns->dns_helper1.'</td>'
						. '<td class="text-center">'.$columns->dns_h1rate.'</td>'
						. '<td class="text-center">'.$columns->dns_helper2.'</td>'
						. '<td class="text-center">'.$columns->dns_h2rate.'</td>'
						. '<td class="text-center">'.$columns->dns_extrahelper.'</td>'
						. '<td class="text-center">'.$columns->dns_ehrate.'</td>'
						. '<td class="text-center">'.$columns->dns_client.'</td>'
						. '<td class="text-center">'.$columns->dns_triptype.'</td>'
						. '<td class="text-center">'.$columns->dns_pickuppoint.'</td>'
						. '<td class="text-center">'.$columns->dns_delivery.'</td>'
						. '<td class="text-center">'.$columns->dns_driverrate.'</td>'
						. '<td class="text-center">'.$columns->dns_budcash.'</td>'
						. '<td class="text-center">'.$columns->dns_gcash.'</td>'
						. '<td class="text-center">'.$columns->dns_mlhuillier.'</td>'
						. '<td class="text-center">'.$columns->dns_transactionfee.'</td>'
						. '<td class="text-center">'.$columns->dns_totalbudget.'</td>'
						. '<td class="text-center">'.$columns->dns_helpervale.'</td>'
						. '<td class="text-center">'.$columns->dns_helper2vale.'</td>'
						. '<td class="text-center">'.$columns->dns_helper3vale.'</td>'
						. '<td class="text-center">'.$columns->dns_meal.'</td>'
						. '<td class="text-center">'.$columns->dns_tfee.'</td>'
						. '<td class="text-center">'.$columns->dns_efee.'</td>'
						. '<td class="text-center">'.$columns->dns_pfee.'</td>'
						. '<td class="text-center">'.$columns->dns_ehelper_nonbillable.'</td>'
						. '<td class="text-center">'.$columns->dns_ehelper_billable.'</td>'
						. '<td class="text-center">'.$columns->dns_huli.'</td>'
						. '<td class="text-center">'.$columns->dns_returned.'</td>'
						. '<td class="text-center">'.$columns->dns_vale.'</td>'
						. '<td class="text-center">'.$columns->dns_abonodriver.'</td>'
						. '<td class="text-center">'.$columns->dns_pod.'</td>'
						. '<td class="text-center">'.$columns->dns_shipping_tripticket.'</td>'
						. '<td class="text-center">'.$columns->dns_billing_remarks.'</td>'
						. '</tr>';
				}				
			}
		?>
		</tbody>
	</table>
</div>


<!-- My Custom scripts -->
