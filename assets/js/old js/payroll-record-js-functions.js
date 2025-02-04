
	$('#tbl_payroll_records input:submit').click(function() 
	{
		//alert($(this).val());
		var p_id 	 = $(this).val();
		var eid      = $('#p_eid').text();
		var fullname = $('#p_ename').text();
		var jobtype  = $('#p_edesignation').text();
		var form_data = 
		{
			p_id     : p_id,
			eid      : eid,
			fullname : fullname,
			jobtype  : jobtype
		};
		$.ajax({
			type: 'POST',
			data: form_data,
			dataType: 'JSON',
			url: window.location.protocol + '//' + window.location.host + '/payroll/payslip/generate_slip',
			success: function()
			{
			  window.open('','_blank');
			}
		});	
	});
	
	
	function show_modal()
    {
        var span = document.getElementsByClassName("close")[0];
        var modal = document.getElementById('modal_payroll');
        modal.style.display = "block";
        span.onclick = function() // Works when clicking the 'close' button of the modal.
        {
            $('#modal_payroll').modal('hide'); 
            $(".modal-backdrop.in").hide();
        };
        $('#modal_payroll').modal(); // Call the Modal when clicking a cell. 
    }



	