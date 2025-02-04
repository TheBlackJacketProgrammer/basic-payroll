<div class="row justify-content-center">
    <div class="col-xl-11 col-lg-12 col-md-9">
        <div class="card o-hidden border-1 shadow-lg my-5">
			<div class="card-body p-1">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ab378e;">
							<a class="navbar-brand">DNS For Regular Employees</a>
							<div class="navbar-collapse collapse justify-content-between">
								<ul class="navbar-nav mr-auto">
									<a class="nav-item nav-link" id="e_add"></a>
								</ul>
								<ul class="navbar-nav">
									<form class="navbar-nav" method="post" id="import_form" enctype="multipart/form-data">
										<br>
										<p id="filename" style="padding-right: 10px; padding-top: 10px;"></p>
										<input type="file" id="file" name="excel_file" style="display: none;" required accept=".xls, .xlsx"/>
										<button type="button" class="btn btn-dark" style="padding-right: 10px;" onclick="document.getElementById('file').click();">Upload Excel File</button>
										<input type="submit" name="import" id="Import" class="btn btn-secondary" style="display: none;" style="padding-right: 10px;" value="Save DNS Record">
									</form>
								</ul>
							</div>
						</nav>
						<!-- Codes Here -->
						<div class="container">
							<!-- Display table from Excel File -->
							<div id="panel_dns" class="text-dark">

							</div>
						</div>
					</div>	
				</div>
			</div>
        </div>
    </div>
</div>

<!-- My Custom scripts -->
<script>
$(document).ready(function()
{
	var excel_file;
	var request = false;
	
	$('#import_form').on('submit', function(event)
	{
		if(!request)
		{
			request = true;
			$("html").addClass("loading");
			event.preventDefault();
			$.ajax(
			{
				url: window.location.protocol + '//' + window.location.host + '/payroll/dns/import_reg',
				method:"POST",
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType: 'JSON',
				success:function(result)
				{
					$('#file').val('');
					$('#panel_dns').html(result['html']);
					$('#tbl_dns').DataTable();
					alert('DNS Record successful transferred to the database.');
				},
				complete: function()
				{
					request = false;
					$("html").removeClass("loading");
				}
			})
		}
	});
	
	$('#file').change(function()
	{
		readFileData(this);
    });
	
	function readFileData(input) 
	{
		if (input.files && input.files[0]) 
		{
			var fileName = input.files[0].name;
			$('#filename').text("Filename: " + fileName);
			document.getElementById('Import').click(); // TRIGGER THE SUBMIT BUTTON
		}
	}
	
});
</script>

