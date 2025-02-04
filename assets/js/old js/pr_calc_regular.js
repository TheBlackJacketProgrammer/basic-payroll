	// Payroll Calculator for Regular Employees Javascript File
	// Created by: Marvin V. Bergado
	// Date Created: January 3, 2020 (Version 2.0 - PAYROLL ACTS)
	
	// Global Variables	

	var advbudget 		= 0;
	var ssscontribution = 0;
	var sssloan 		= 0;
	var philhealth 		= 0;
	var pagibig  		= 0;
	var pagibigloan  	= 0;
	var valecoor  		= 0;
	var valegcash	 	= 0;
	var loan 			= 0;
	var uniform			= 0;
	var deduction 		= 0;
	var contribution 	= 0;
	var tdeduction 		= 0; 
	var tgsalary		= 0;
	var netpay			= 0;
	var request 		= false;

	// Active when Payroll Calculator is showed
	$( "#calc_regular" ).change(function () 
	{
		//console.log('Payroll Calculator: Regular');
		//console.log('pr_calc_regular.js loaded');

		trate = $('#l_tgsalary').text();
		//console.log('trate = ' + trate);
		
		if (trate == '')
		{
			trate = 0;
		}
		$('#p_tgsalary').text(String(trate));
		tgsalary = trate;
		get_total_netpay();
		
		//console.log('tgsalary = ' + tgsalary);
		//console.log('Payroll Calculator Regular - NEW TABLE');
	})
	.change();
	
	function get_total_netpay()
	{
		// GET TOTAL DEDUCTION
		tdeduction = parseFloat(advbudget) + parseFloat(ssscontribution) + parseFloat(sssloan) + parseFloat(philhealth) + parseFloat(pagibig) + parseFloat(pagibigloan) + parseFloat(valecoor) + parseFloat(valegcash) + parseFloat(loan) + parseFloat(uniform) + parseFloat(deduction) + parseFloat(contribution);		
		$('#p_tdeduction').text(String(tdeduction.toFixed(2)));

		// GET TOTAL NETPAY
		netpay = parseFloat(tgsalary) - parseFloat(tdeduction);
		//netpay = parseInt(tgsalary) - parseInt(tdeduction);
		$('#p_netpay').text(String(netpay.toFixed(2)));
	}

	$('#p_advbudget').on('input',function(e)
	{
		advbudget = $('#p_advbudget').val();
		if(/^[a-z]*$/.test(advbudget) == true) 
		{
			console.log('LETTERS & SPECIAL TEXT: ' + advbudget);
			advbudget = 0;
		}
		else
		{
			console.log('NUMBER: ' + advbudget);
		}
		
		if(advbudget == '')
		{
			advbudget = 0;
			console.log('SSS Contribution (EMPTY): ' + advbudget);
		}
		console.log('Advanced Budget: ' + advbudget);
		get_total_netpay();
	});
	
	$('#p_ssscontribution').on('input',function(e)
	{
		ssscontribution = $('#p_ssscontribution').val();
		if(/^[a-z]*$/.test(ssscontribution) == true) 
		{
			console.log('LETTERS & SPECIAL TEXT: ' + ssscontribution);
			ssscontribution = 0;
		}
		else
		{
			console.log('NUMBER: ' + ssscontribution);
		}
		
		if(ssscontribution == '')
		{
			ssscontribution = 0;
			console.log('SSS Contribution (EMPTY): ' + ssscontribution);
		}
		console.log('SSS Contribution: ' + ssscontribution);
		get_total_netpay();
	});
	
	$('#p_sssloan').on('input',function(e)
	{
		sssloan = $('#p_sssloan').val();
		if(/^[a-z]*$/.test(sssloan) == true) 
		{
			console.log('Letters & Special Number : ' + sssloan);
			sssloan = 0;
		}
		else
		{
			console.log('Number : ' + sssloan);
		}
		
		if(sssloan == '')
		{
			sssloan = 0;
			console.log('SSS Loan (EMPTY): ' + sssloan);
		}
		console.log('SSS Loan: ' + sssloan);
		get_total_netpay();
	});
	
	$('#p_philhealth').on('input',function(e)
	{
		philhealth = $('#p_philhealth').val();
		if(/^[a-z]*$/.test(philhealth) == true) 
		{
			console.log('Letters & Special Number : ' + philhealth);
			philhealth = 0;
		}
		else
		{
			console.log('Number : ' + philhealth);
		}
		
		if(philhealth == '')
		{
			philhealth = 0;
			console.log('(EMPTY): ' + philhealth);
		}
		console.log('Philhealth: ' + philhealth);
		get_total_netpay();
	});
	
	$('#p_pagibig').on('input',function(e)
	{
		pagibig = $('#p_pagibig').val();
		if(/^[a-z]*$/.test(pagibig) == true) 
		{
			console.log('Letters & Special Number : ' + pagibig);
			pagibig = 0;
		}
		else
		{
			console.log('Number : ' + pagibig);
		}
		
		if(pagibig == '')
		{
			pagibig = 0;
			console.log('(EMPTY): ' + pagibig);
		}
		console.log('PAGIBIG: ' + pagibig);
		get_total_netpay();
	});
	
	$('#p_pagibigloan').on('input',function(e)
	{
		pagibigloan = $('#p_pagibigloan').val();
		if(/^[a-z]*$/.test(pagibigloan) == true) 
		{
			console.log('Letters & Special Number : ' + pagibigloan);
			pagibigloan = 0;
		}
		else
		{
			console.log('Number : ' + pagibigloan);
		}
		
		if(pagibigloan == '')
		{
			pagibigloan = 0;
			console.log('(EMPTY): ' + pagibigloan);
		}
		console.log('PAGIBIG LOAN: ' + pagibigloan);
		get_total_netpay();
	});
	
	$('#p_valecoor').on('input',function(e)
	{
		valecoor = $('#p_valecoor').val();
		if(/^[a-z]*$/.test(valecoor) == true) 
		{
			console.log('Letters & Special Number : ' + valecoor);
			valecoor = 0;
		}
		else
		{
			console.log('Number : ' + valecoor);
		}
		
		if(valecoor == '')
		{
			valecoor = 0;
			console.log('(EMPTY): ' + valecoor);
		}
		console.log('VALECOOR: ' + valecoor);
		get_total_netpay();
	});
	
	$('#p_valegcash').on('input',function(e)
	{
		valegcash = $('#p_valegcash').val();
		if(/^[a-z]*$/.test(valegcash) == true) 
		{
			console.log('Letters & Special Number : ' + valegcash);
			valegcash = 0;
		}
		else
		{
			console.log('Number : ' + valegcash);
		}
		
		if(valegcash == '')
		{
			valegcash = 0;
			console.log('(EMPTY): ' + valegcash);
		}
		get_total_netpay();
	});
	
	$('#p_loan').on('input',function(e)
	{
		loan = $('#p_loan').val();
		if(/^[a-z]*$/.test(loan) == true) 
		{
			console.log('Letters & Special Number : ' + loan);
			loan = 0;
		}
		else
		{
			console.log('Number : ' + loan);
		}
		
		if(loan == '')
		{
			loan = 0;
			console.log('(EMPTY): ' + loan);
		}
		get_total_netpay();
	});
	
	$('#p_uniform').on('input',function(e)
	{
		uniform = $('#p_uniform').val();
		if(/^[a-z]*$/.test(uniform) == true) 
		{
			console.log('Letters & Special Number : ' + uniform);
			uniform = 0;
		}
		else
		{
			console.log('Number : ' + uniform);
		}
		
		if(uniform == '')
		{
			uniform = 0;
			console.log('(EMPTY): ' + uniform);
		}
		get_total_netpay();
	});
	
	$('#p_deduction').on('input',function(e)
	{
		deduction = $('#p_deduction').val();
		if(/^[a-z]*$/.test(deduction) == true) 
		{
			console.log('Letters & Special Number : ' + deduction);
			deduction = 0;
		}
		else
		{
			console.log('Number : ' + deduction);
		}
		
		if(deduction == '')
		{
			deduction = 0;
			console.log('(EMPTY): ' + deduction);
		}
		get_total_netpay();
	});
	
	$('#p_contribution').on('input',function(e)
	{
		contribution = $('#p_contribution').val();
		if(/^[a-z]*$/.test(contribution) == true) 
		{
			console.log('Letters & Special Number : ' + contribution);
			contribution = 0;
		}
		else
		{
			console.log('Number : ' + contribution);
		}
		
		if(contribution == '')
		{
			contribution = 0;
			console.log('(EMPTY): ' + contribution);
		}
		get_total_netpay();
	});

	$('#reg_date').on('input',function(e)
	{
		//console.log('Input Detected:' + $('#reg_date').val());
		var i_date = new Date($('#reg_date').val());
		
		var day = new Array(7);
		
		day[0] = "Sunday";
		day[1] = "Monday";
		day[2] = "Tuesday";
		day[3] = "Wednesday";
		day[4] = "Thursday";
		day[5] = "Friday";
		day[6] = "Saturday";

		var o_day = day[i_date.getDay()];
		$('#reg_day').val(o_day);
	});
	
	$('#btn_save_payroll_reg').click(function() 
	{
		console.log('Request Send: ' + request);
		$("html").addClass("loading");
		if(!request) 
		{
			request = true;
			console.log('Request Send: ' + request);
			
			var dns_No 	= $('#dns_num_reg').val();
			var e_num 		= $('#p_enum').text();
			
			// Get Date Today
			var dt = new Date();
			var month = dt.getMonth()+1;
			var day = dt.getDate();
			var p_datecreated = dt.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
		
			// Passing parameters from HTML to JS
			var p_eid 				= $('#p_eid').text();
			var p_startdate 		= $('#date_start').text();
			var p_enddate 			= $('#date_end').text();
			var p_code 				= 'PRS' + dns_No + 'E' + p_eid;
			var p_ssscontribution 	= $('#p_ssscontribution').val();
			var p_sssloan 			= $('#p_sssloan').val();
			var p_philhealth 		= $('#p_philhealth').val();
			var p_pagibig 			= $('#p_pagibig').val();
			var p_pagibigloan 		= $('#p_pagibigloan').val();
			var p_loan 				= $('#p_loan').val();
			var p_valecoor 			= $('#p_valecoor').val();
			var p_valegcash 		= $('#p_valegcash').val();
			var p_uniform 			= $('#p_uniform').val();
			var p_deduction 		= $('#p_deduction').val();
			var p_contribution 		= $('#p_contribution').val();
			var p_tgsalary 			= $('#p_tgsalary').text();
			var p_tdeduction 		= $('#p_tdeduction').text();
			var p_netpay 			= $('#p_netpay').text();
		
			var form_data = 
			{
				p_eid 				: p_eid,
				p_code 				: p_code,
				p_datecreated 		: p_datecreated,
				p_startdate 		: p_startdate,
				p_enddate 			: p_enddate,
				p_ssscontribution 	: p_ssscontribution,
				p_sssloan 			: p_sssloan,
				p_philhealth 		: p_philhealth,
				p_pagibig 			: p_pagibig,
				p_pagibigloan 		: p_pagibigloan,
				p_loan 				: p_loan,
				p_valecoor 			: p_valecoor,
				p_valegcash 		: p_valegcash,
				p_uniform 			: p_uniform,
				p_deduction 		: p_deduction,
				p_contribution 		: p_contribution,
				p_tgsalary 			: p_tgsalary,
				p_tdeduction 		: p_tdeduction,
				p_netpay 			: p_netpay,
				dns_No				: dns_No,
				e_num				: e_num
			};
			
			$.ajax({
				type: 'POST',
				data: form_data,
				url: window.location.protocol + '//' + window.location.host + '/payroll/main/pr_save_computation_reg',
				dataType: 'JSON',
				success: function (result)
				{
					//console.log('SUCCESS: ' + result['success']);
					if (result['success'] == true)
					{
						alert('Payroll Computation Save');
						
						$('#p_calculator').empty();
						$('#p_calculator').html(result['calculator']);
						
						$('#p_payroll_records').empty();
						$('#p_payroll_records').html(result['table']);
						
						$("html").removeClass("loading");
						request = false;
					}
					else
					{
						alert('Payroll Computation Already Exist');
						$("html").removeClass("loading");
					}
				},
				complete : function()
				{
					console.log('AJAX Query Complete');
					$("html").removeClass("loading");
					request = false;
				}
			});
		}
	});
		
	// ADD WAGE 
	$('#btn_add_wage').click(function()
	{
		
		$("html").addClass("loading");
		var r_eid 	= $('#p_eid').text();
		var r_date 	= $('#reg_date').val();
		var r_day 	= $('#reg_day').val();
		var r_rate 	= $('#reg_rate').val();
		
		if (r_date == "" || r_day == "" || r_rate == "")
		{
			alert("Check Requirements");  
			$("html").removeClass("loading");
		}
		else
		{
			var form_data = 
			{
				r_eid	: r_eid,
				r_date	: r_date,
				r_day	: r_day,
				r_rate 	: r_rate
			};
			if (!request)
			{
				request = true;
				$.ajax({
					type:'POST',
					data:form_data,
					url: window.location.protocol + '//' + window.location.host + '/payroll/main/save_wage',
					dataType: 'JSON',
					success:function(result)
					{
						if (result['success']  == true)
						{
							$('#tbl_wage').empty();
							$('#tbl_wage').html(result['table']);
							$("html").removeClass("loading");
							request = false;
						}
						else
						{
							alert('Failed Adding Daily Wage');
						}
					}
				});
			}
			else
			{
				request = false;
			}
		}
	});