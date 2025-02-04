// Global Variables	

	var advbudget 		= 0;
	var ssscontribution = 0;
	var sssloan 		= 0;
	var philhealth 		= 0;
	var pagibig  		= 0;
	var pagibigloan  	= 0;
	var vale	 	    = 0;
	var valecoor	 	= 0;
	var valegcash	 	= 0;
	var abono	 	    = 0;
	var loan 			= 0;
	var uniform			= 0;
	var deduction 		= 0;
	var contribution 	= 0;
	var tdeduction 		= 0;
	var tgsalary		= 0;
	var netpay			= 0;
	var request			= false;
	
	
	
	// Active when Payroll Calculator is showed
	$( "#calc_contractual" ).change(function () 
	{
		ssscontribution = $('#p_ssscontribution').val();
		if(/^[a-z]*$/.test(ssscontribution) == true) 
		{
			ssscontribution = 0;
		}
		if(ssscontribution == '')
		{
			ssscontribution = 0;
		}
		console.log('SSS Contribution: ' + ssscontribution);
		
		sssloan = $('#p_sssloan').val();
		if(/^[a-z]*$/.test(sssloan) == true) 
		{
			sssloan = 0;
		}
		if(sssloan == '')
		{
			sssloan = 0;
		}
		console.log('SSS Loan: ' + sssloan);
		
		philhealth = $('#p_philhealth').val();
		if(/^[a-z]*$/.test(philhealth) == true) 
		{
			philhealth = 0;
		}
		if(philhealth == '')
		{
			philhealth = 0;
		}
		console.log('Philhealth: ' + philhealth);
		
		pagibig = $('#p_pagibig').val();
		if(/^[a-z]*$/.test(pagibig) == true) 
		{
			pagibig = 0;
		}
		if(pagibig == '')
		{
			pagibig = 0;
		}
		console.log('Pagibig: ' + pagibig);
		
		pagibigloan = $('#p_pagibigloan').val();
		if(/^[a-z]*$/.test(pagibigloan) == true) 
		{
			pagibigloan = 0;
		}
		if(pagibigloan == '')
		{
			pagibigloan = 0;
		}
		console.log('Pagibig Loan: ' + pagibigloan);
		
		vale = $('#p_vale').val();
		if(/^[a-z]*$/.test(vale) == true) 
		{
			vale = 0;
		}
		if(vale == '')
		{
			vale = 0;
		}
		console.log('Vale: ' + vale);
		
		valecoor = $('#p_valecoor').val();
		if(/^[a-z]*$/.test(valecoor) == true) 
		{
			valecoor = 0;
		}
		if(valecoor == '')
		{
			valecoor = 0;
		}
		console.log('Vale Coor: ' + valecoor);
		
		valegcash = $('#p_valegcash').val();
		if(/^[a-z]*$/.test(valegcash) == true) 
		{
			valegcash = 0;
		}
		if(valegcash == '')
		{
			valegcash = 0;
		}
		console.log('Vale Gcash: ' + valegcash);
		
		abono = $('#p_abono').val();
		if(/^[a-z]*$/.test(abono) == true) 
		{
			abono = 0;
		}
		if(abono == '')
		{
			abono = 0;
		}
		console.log('Reimburse: ' + abono);
		
		loan = $('#p_loan').val();
		if(/^[a-z]*$/.test(loan) == true) 
		{
			loan = 0;
		}
		if(loan == '')
		{
			loan = 0;
		}
		console.log('Loan: ' + loan);
		
		uniform = $('#p_uniform').val();
		if(/^[a-z]*$/.test(uniform) == true) 
		{
			uniform = 0;
		}
		if(uniform == '')
		{
			uniform = 0;
		}
		console.log('Uniform: ' + uniform);
		
		
		deduction = $('#p_deduction').val();
		if(/^[a-z]*$/.test(deduction) == true) 
		{
			deduction = 0;
		}
		if(deduction == '')
		{
			deduction = 0;
		}
		console.log('Deduction: ' + deduction);
		
		contribution = $('#p_contribution').val();
		if(/^[a-z]*$/.test(contribution) == true) 
		{
			contribution = 0;
		}
		if(contribution == '')
		{
			contribution = 0;
		}
		console.log('Contribution: ' + contribution);
		
		get_total_netpay();
	})
	.change();
	
	function get_total_netpay()
	{
		tdeduction = 	parseFloat(ssscontribution) + parseFloat(sssloan) + 
						parseFloat(philhealth) + parseFloat(pagibig) + 
						parseFloat(pagibigloan) + parseFloat(vale) + 
						parseFloat(valegcash)+ parseFloat(valecoor)+ 
						parseFloat(loan) + parseFloat(uniform) + 
						parseFloat(deduction) + parseFloat(contribution);
		$('#p_tdeduction').text(tdeduction.toFixed(2));
		var t_triprate  = $('#p_ttriprate').text();
		if (t_triprate == '')
		{
			t_triprate = 0;
		}
		var t_addbudgt  = $('#p_taddbudget').text();
		if (t_addbudgt == '')
		{
			t_addbudgt = 0;
		}
		var total_gsalary = parseFloat(t_triprate);
		$('#p_tgsalary').text(total_gsalary.toFixed(2));
		if(tdeduction <= 0)
		{
			tdeduction = 0.00;
		}
		netpay = parseFloat(total_gsalary) + parseFloat(abono) - parseFloat(tdeduction);
		$('#l_reimburse').text(abono);
		$('#p_netpay').text(netpay.toFixed(2));
	}
		
	$('#p_ssscontribution').on('input',function(e)
	{
		ssscontribution = $('#p_ssscontribution').val();
		if(/^[a-z]*$/.test(ssscontribution) == true) 
		{
			ssscontribution = 0;
		}
		if(ssscontribution == '')
		{
			ssscontribution = 0;
		}
		console.log('SSS Contribution: ' + ssscontribution);
		get_total_netpay();
	});
	
	$('#p_sssloan').on('input',function(e)
	{
		sssloan = $('#p_sssloan').val();
		if(/^[a-z]*$/.test(sssloan) == true) 
		{
			sssloan = 0;
		}
		if(sssloan == '')
		{
			sssloan = 0;
		}
		console.log('SSS Loan: ' + sssloan);
		get_total_netpay();
	});
	
	$('#p_philhealth').on('input',function(e)
	{
		philhealth = $('#p_philhealth').val();
		if(/^[a-z]*$/.test(philhealth) == true) 
		{
			philhealth = 0;
		}
		if(philhealth == '')
		{
			philhealth = 0;
		}
		console.log('Philhealth: ' + philhealth);
		get_total_netpay();
	});
	
	$('#p_pagibig').on('input',function(e)
	{
		if(/^[a-z]*$/.test(pagibig) == true) 
		{
			pagibig = 0;
		}
		if(pagibig == '')
		{
			pagibig = 0;
		}
		console.log('Pagibig: ' + pagibig);
		get_total_netpay();
	});
	
	$('#p_pagibigloan').on('input',function(e)
	{
		pagibigloan = $('#p_pagibigloan').val();
		if(/^[a-z]*$/.test(pagibigloan) == true) 
		{
			pagibigloan = 0;
		}
		if(pagibigloan == '')
		{
			pagibigloan = 0;
		}
		console.log('Pagibig Loan: ' + pagibigloan);
		get_total_netpay();
	});
	
	$('#p_valecoor').on('input',function(e)
	{
		valecoor = $('#p_valecoor').val();
		if(/^[a-z]*$/.test(valecoor) == true) 
		{
			valecoor = 0;
		}
		if(valecoor == '')
		{
			valecoor = 0;
		}
		console.log('Vale Coor: ' + valecoor);
		get_total_netpay();
	});
	
	$('#p_valegcash').on('input',function(e)
	{
		valegcash = $('#p_valegcash').val();
		if(/^[a-z]*$/.test(valegcash) == true) 
		{
			valegcash = 0;
		}
		if(valegcash == '')
		{
			valegcash = 0;
		}
		console.log('Vale Gcash: ' + valegcash);
		get_total_netpay();
	});
	
	$('#p_vale').on('input',function(e)
	{
		vale = $('#p_vale').val();
		if(/^[a-z]*$/.test(vale) == true) 
		{
			vale = 0;
		}
		if(vale == '')
		{
			vale = 0;
		}
		console.log('Vale: ' + vale);
		get_total_netpay();
	});
	
	$('#p_abono').on('input',function(e)
	{
		abono = $('#p_abono').val();
		if(/^[a-z]*$/.test(abono) == true) 
		{
			abono = 0;
		}
		if(abono == '')
		{
			abono = 0;
		}
		console.log('Reimburse: ' + abono);
		get_total_netpay();
	});
	
	$('#p_loan').on('input',function(e)
	{
		loan = $('#p_loan').val();
		if(/^[a-z]*$/.test(loan) == true) 
		{
			loan = 0;
		}
		if(loan == '')
		{
			loan = 0;
		}
		console.log('Loan: ' + loan);
		get_total_netpay();
	});
	
	$('#p_uniform').on('input',function(e)
	{
		uniform = $('#p_uniform').val();
		if(/^[a-z]*$/.test(uniform) == true) 
		{
			uniform = 0;
		}
		if(uniform == '')
		{
			uniform = 0;
		}
		console.log('Uniform: ' + uniform);
		get_total_netpay();
	});
	
	$('#p_deduction').on('input',function(e)
	{
		deduction = $('#p_deduction').val();
		if(/^[a-z]*$/.test(deduction) == true) 
		{
			deduction = 0;
		}
		if(deduction == '')
		{
			deduction = 0;
		}
		console.log('Deduction: ' + deduction);
		get_total_netpay();
	});
	
	$('#p_contribution').on('input',function(e)
	{
		contribution = $('#p_contribution').val();
		if(/^[a-z]*$/.test(contribution) == true) 
		{
			contribution = 0;
		}
		if(contribution == '')
		{
			contribution = 0;
		}
		console.log('Contribution: ' + contribution);
		get_total_netpay();
	});
	
	$('#btn_save_payroll').unbind('click').click(function()
	{
		$("html").addClass("loading");
		
		var dns_No 		= $('#dns_num').val();
		var e_num 		= $('#p_enum').text();
		
		// Get Date Today
		var dt = new Date();
		var month = dt.getMonth()+1;
		var day = dt.getDate();
		var p_datecreated = dt.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
			
		// Get Date Start
		var dts = $('#date_start').text();
			
		// Get Date End
		var dte = $('#date_end').text();

		// Parameters: JS -> CI -> DB
		var p_eid 				= $('#p_eid').text();
		var p_startdate 		= $('#date_start').text();
		var p_enddate 			= $('#date_end').text();
		var p_code 				= 'PRS' + dns_No + 'E' + p_eid;
		var p_trips 			= $('#p_trips').text();
		var p_ttriprate 		= $('#p_ttriprate').text();
		var p_taddbudget 		= $('#p_taddbudget').text();
		var p_advbudget 		= 0;
		var p_ssscontribution 	= $('#p_ssscontribution').val();
		var p_sssloan 			= $('#p_sssloan').val();
		var p_philhealth 		= $('#p_philhealth').val();
		var p_pagibig 			= $('#p_pagibig').val();
		var p_pagibigloan 		= $('#p_pagibigloan').val();
		var p_valecoor 			= $('#p_valecoor').val();
		var p_valegcash 		= $('#p_valegcash').val();
		var p_abono 			= $('#p_abono').val();
		var p_loan 				= $('#p_loan').val();
		var p_uniform 			= $('#p_uniform').val();
		var p_deduction 		= $('#p_deduction').val();
		var p_contribution 		= $('#p_contribution').val();
		var p_tgsalary 			= $('#p_tgsalary').text();
		var p_tdeduction 		= $('#p_tdeduction').text();
		var p_netpay 			= $('#p_netpay').text();
		var p_vale 				= $('#p_vale').val();
			
		// Parameters stored in Array - Encapsulation
		var form_data = 
		{
			p_eid 				: p_eid,
			p_code 				: p_code,
			p_datecreated 		: p_datecreated,
			p_startdate 		: p_startdate,
			p_enddate 			: p_enddate,
			p_trips 			: p_trips,
			p_ttriprate 		: p_ttriprate,
			p_taddbudget 		: p_taddbudget,
			p_advbudget 		: p_advbudget,
			p_ssscontribution 	: p_ssscontribution,
			p_sssloan 			: p_sssloan,
			p_philhealth 		: p_philhealth,
			p_pagibig 			: p_pagibig,
			p_pagibigloan 		: p_pagibigloan,
			p_valecoor 			: p_valecoor,
			p_valegcash 		: p_valegcash,
			p_abono 			: p_abono,
			p_loan 				: p_loan,
			p_uniform 			: p_uniform,
			p_deduction 		: p_deduction,
			p_contribution 		: p_contribution,
			p_tgsalary 			: p_tgsalary,
			p_tdeduction 		: p_tdeduction,
			p_netpay 			: p_netpay,
			dns_No				: dns_No,
			p_vale				: p_vale,
			e_num				: e_num
		};
				
		if(dts == '' && dte == '')
		{
			alert('Must Set Date Start & End of Payroll');
			$("html").removeClass("loading");
		}
		else
		{
			if(!request)
			{
				request = true;
				$.ajax({
					type: 'POST',
					data: form_data,
					url: window.location.protocol + '//' + window.location.host + '/payroll/main/payroll_save_computation',
					dataType: 'JSON',
					success: function (result)
					{
						if (result['success'] == true)
						{
							alert('Payroll Computation Successfully Saved');
							//console.log('Payroll Computation Save');
								
							// RESET PAYROLL CALCULATOR
							$('#p_calculator').empty();
							$('#p_calculator').html(result['calculator']);
							
							// RESET EMPLOYEE'S PAYROLL RECORD TABLE
							$('#p_payroll_records').empty();
							$('#p_payroll_records').html(result['table']);
							
							$("html").removeClass("loading");
							request = false;
						}
						else
						{
							alert('Payroll Computation Already Exist');
							console.log('Payroll Computation Already Exist');
							$("html").removeClass("loading");
							request = false;
						}
					}
				});	
			}
			else
			{
				$("html").removeClass("loading");
				request = false;
			}
		}
	});
	
	function show_modal_addtrip()
    {
        var span = document.getElementsByClassName("close")[0];
        var modal = document.getElementById('modal_addtrip');
        modal.style.display = "block";
        span.onclick = function() // Works when clicking the 'close' button of the modal.
        {
            $('#modal_addtrip').modal('hide'); 
            $(".modal-backdrop.in").hide();
        };
        $('#modal_addtrip').modal(); // Call the Modal when clicking a cell. 
    }