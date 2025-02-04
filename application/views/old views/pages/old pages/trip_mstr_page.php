<div class="row justify-content-center">
    <div class="col-xl-11 col-lg-12 col-md-9">
        <div class="card o-hidden border-1 shadow-lg my-5">
			<div class="card-body p-1">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ab378e;">
							<a class="navbar-brand">Trip Manager</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTrip" aria-controls="navbarTrip" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarTrip">
								<div class="navbar-collapse collapse justify-content-between">
									<ul class="navbar-nav mr-auto">
										<a class="nav-item nav-link" id="btn_addtrip">Add Trip Information</a>
									</ul>
									<ul class="navbar-nav">
										<form class="navbar-nav">
											<input type="text" id="trp_txtsearch" class="form-control" placeholder="Search Trip Data Here">
											<button type="button" id="trp_btnsearch" class="btn btn-secondary">Search</button>
										</form>
									</ul>
								</div>
							</div>
						</nav>
						<!-- DataTales Example -->
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary text-center">Trip Master List</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="tbl_tripmstr" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead class="text-center" style="background-color: #f0e1cc;">
											<tr>
												<th>#</th>
												<th>PICK-UP POINT</th>
												<th>DELIVERY POINT</th>
												<th>DRIVER RATE</th>
												<th>HELPER RATE</th>
												<th>DUO RATE</th>
											</tr>
										</thead>
										<tfoot class="text-center" style="background-color: #f0e1cc;">
											<tr>
												<th>#</th>
												<th>PICK-UP POINT</th>
												<th>DELIVERY POINT</th>
												<th>DRIVER RATE</th>
												<th>HELPER RATE</th>
												<th>DUO RATE</th>
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
														. '<td class="text-center"><a href="#">'.$columns->TID.'</a></td>'
														. '<td class="text-center">'.$columns->PICKUP.'</td>'
														. '<td class="text-center">'.$columns->DELIVERY.'</td>'
														. '<td class="text-center">'.$columns->DRATE.'</td>'
														. '<td class="text-center">'.$columns->HRATE.'</td>'
														. '<td class="text-center">'.$columns->DUO.'</td>'
														. '</tr>';
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
        </div>
    </div>
</div>

<!-- My Custom scripts -->
<script src="<?php echo base_url();?>assets/js/trip_mstr_main.js"></script>

