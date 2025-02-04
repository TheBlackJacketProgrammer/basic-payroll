// Global Variables	
	
	var requestSend = false;

	$('#btn_payroll_search').click(function() 
	{
		$("html").addClass("loading");
		var search = $('#txt_payroll_search').val();
		var form_data = 
		{
			search : search
		};
		$.ajax({
			type: 'POST',
			data: form_data,
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/payroll_search_employee',
			dataType: 'JSON',
			success: function (result)
			{
				$('#p_calculator').empty();
				$('#p_payroll_records').empty();
				$('#payroll_table_employee_list').empty();
				$('#payroll_table_employee_list').html(result['html']);
				$("html").removeClass("loading");
			}
		});	
	});
	
	$('#tbl_payroll_employee_list a').click(function() 
	{
		console.log('Request Send: ' + requestSend);
		if(!requestSend) 
		{
			requestSend = true;
			console.log('Request Send: ' + requestSend);
			$("html").addClass("loading");
			
			var e_num = $(this).text();
			var dns_No_dh = $("#dns_num").val();
			var dns_No_reg = $("#dns_num_reg").val();
			
			$("#p_employee_id").text(e_num);
			$("#p_enum").text(e_num);
			
			var form_data = 
			{
				e_num 		: e_num,
				dns_No_dh 	: dns_No_dh,
				dns_No_reg	: dns_No_reg
			};
			
			$.ajax(
			{
				type: 'POST',
				data: form_data,
				url: window.location.protocol + '//' + window.location.host + '/payroll/main/payroll_load_function',
				dataType: 'JSON',
				success: function (result)
				{
					$('#p_calculator').empty();
					$('#p_payroll_records').empty();
					$('#p_calculator').html(result['calculator']);
					$('#p_payroll_records').html(result['table']);
					$('#tbl_payroll_trip').DataTable();
					$('#tbl_payroll_regular').DataTable();
					$("html").removeClass("loading");
				},
				complete : function()
				{
					requestSend = false;
				}
			});	
		}
	});
	
	$('#tbl_employee a').click(function() 
	{
		$("html").addClass("loading");
		var eid = $(this).text();
		var form_data = 
		{
			eid : eid
		};
		$.ajax({
			type: 'POST',
			data: form_data,
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/load_employee_info',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_modal').html(result['html']);
				$("html").removeClass("loading");
				update_modal();
			}
		});	
	});
				
	function update_modal()
	{
		var span = document.getElementsByClassName("close")[0];
		var modal = document.getElementById('modal_update_employee');
		modal.style.display = "block";
		span.onclick = function() // Works when clicking the 'close' button of the modal.
		{
			$('#modal_update_employee').modal('hide'); 
			$(".modal-backdrop.in").hide();
		};
		$('#modal_update_employee').modal({ backdrop: 'static', keyboard: false}); // Call the Modal when clicking a cell. 
	}
	
	function showModal()
    {
        var span = document.getElementsByClassName("close")[0];
        var modal = document.getElementById('modal_employee');
        modal.style.display = "block";
        span.onclick = function() // Works when clicking the 'close' button of the modal.
        {
            $('#modal_employee').modal('hide'); 
            $(".modal-backdrop.in").hide();

        };
        $('#modal_employee').modal(); // Call the Modal when clicking a cell. 
    }

