	
	$('#e_manager').click(function() 
	{
		$("html").addClass("loading");
		$.ajax({
			type: 'POST',
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/employee_management',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_content').empty();
				$('#main_content').html(result['html']);
				$('#tbl_employee').DataTable();
				$("html").removeClass("loading");
			}
		});
	});
	
	$('#dns_dh').click(function() 
	{
		$("html").addClass("loading");
		$.ajax({
			type: 'POST',
			url: window.location.protocol + '//' + window.location.host + '/payroll/dns/dns_dh',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_content').empty();
				$('#main_content').html(result['page']);
				$("html").removeClass("loading");
			}
		});
	});
	
	$('#dns_reg').click(function() 
	{
		$("html").addClass("loading");
		$.ajax({
			type: 'POST',
			url: window.location.protocol + '//' + window.location.host + '/payroll/dns/dns_reg',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_content').empty();
				$('#main_content').html(result['page']);
				$("html").removeClass("loading");
			}
		});
	});
	
	
	$('#e_tripmgr').click(function() 
	{
		$("html").addClass("loading");
		$.ajax({
			type: 'POST',
			url: window.location.protocol + '//' + window.location.host + '/payroll/trip/open_trip_manager',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_content').empty();
				$('#main_content').html(result['html']);
				$("html").removeClass("loading");
			}
		});
	});
	
	
	$('#e_payroll').click(function() 
	{
		$("html").addClass("loading");
		$.ajax({
			type: 'POST',
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/payroll',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_content').empty();
				$('#main_content').html(result['html']);
				$('#tbl_payroll_employee_list').DataTable();
				$("html").removeClass("loading");
			}
		});
	});
	
	
	$('#btn_excel').click(function() 
	{
		var payrolldate = $("#opt_payroll option:selected").val();
		var form_data = 
		{
			payrolldate : payrolldate
		};
		return $.ajax({
			type: 'POST',
			data: form_data,
			dataType: 'JSON',
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/exportExcel'
		});
	});
	
	
	$('#e_summary').click(function() 
	{
		$("html").addClass("loading");
		$.ajax({
			type: 'POST',
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/payroll_summary_records',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_content').empty();
				$('#main_content').html(result['html']);
				$('#opt_payrolldates').empty();
				$('#opt_payrolldates').html(result['option']);
				$("html").removeClass("loading");
			}
		});
	});
	
	
	$('#e_add').click(function() 
	{
		$("html").addClass("loading");
		$.ajax({
			type: 'POST',
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/employee_add',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_modal').html(result['html']);
				$("html").removeClass("loading");
				showModal();
			}
		});	
	});
	
	
	$('#btn_search').click(function() 
	{
		$("html").addClass("loading");
		var search = $('#txt_search').val();
		var form_data = 
		{
			search : search
		};
		$.ajax({
			type: 'POST',
			data: form_data,
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/search_employee',
			dataType: 'JSON',
			success: function (result)
			{
				$('#main_content').html(result['html']);
				$("html").removeClass("loading");
			}
		});	
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
	
	
	function load_payroll_summary()
	{
		var payrolldate = $("#opt_payroll option:selected").val();
		$("html").addClass("loading");
		var form_data = 
		{
			payrolldate : payrolldate
		};
		$.ajax({
			type: 'POST',
			data: form_data,
			url: window.location.protocol + '//' + window.location.host + '/payroll/main/payroll_date_summary_record',
			dataType: 'JSON',
			success: function (result)
			{
				$('#tbl_prsummary').empty();
				$('#tbl_prsummary').html(result['table']);
				$("html").removeClass("loading");
			}
		});
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
	