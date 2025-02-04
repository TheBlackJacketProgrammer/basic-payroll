	// Payroll Table Wage for Regular Employees Javascript File
	// Created by: Marvin V. Bergado
	// Date Created: January 9, 2020 (Version 2.0 - PAYROLL ACTS)
	
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
	var status 			= 0;

	// Active when Payroll Calculator is showed
	$( "#calc_regular" ).change(function () 
	{
		console.log('Payroll Calculator: Regular');
		console.log('pr_tbl_wage.js loaded');
		
		trate = $('#t_rate').val();
				
		// GET DEDUCTION VALUES
		advbudget = $('#p_advbudget').val();
		if(/^[0-9]*$/.test(advbudget) == false) 
		{
			advbudget = 0;
		}
		if (advbudget == '')
		{
			advbudget = 0;
		}
		ssscontribution = $('#p_ssscontribution').val();
		if(/^[0-9]*$/.test(advbudget) == false) 
		{
			ssscontribution = 0;
		}
		if (ssscontribution == '')
		{
			ssscontribution = 0;
		}
		sssloan = $('#p_sssloan').val();
		if(/^[0-9]*$/.test(sssloan) == false) 
		{
			sssloan = 0;
		}
		if (sssloan == '')
		{
			sssloan = 0;
		}
		philhealth = $('#p_philhealth').val();
		if(/^[0-9]*$/.test(philhealth) == false) 
		{
			philhealth = 0;
		}
		if (philhealth == '')
		{
			philhealth = 0;
		}
		pagibig = $('#p_pagibig').val();
		if(/^[0-9]*$/.test(pagibig) == false) 
		{
			pagibig = 0;
		}
		if (pagibig == '')
		{
			pagibig = 0;
		}
		pagibigloan = $('#p_pagibigloan').val();
		if(/^[0-9]*$/.test(pagibigloan) == false) 
		{
			pagibigloan = 0;
		}
		if (pagibigloan == '')
		{
			pagibigloan = 0;
		}
		valecoor = $('#p_valecoor').val();
		if(/^[0-9]*$/.test(valecoor) == false) 
		{
			valecoor = 0;
		}
		if (valecoor == '')
		{
			valecoor = 0;
		}
		valegcash = $('#p_valegcash').val();
		if(/^[0-9]*$/.test(valegcash) == false) 
		{
			valegcash = 0;
		}
		if (valegcash == '')
		{
			valegcash = 0;
		}
		loan = $('#p_loan').val();
		if(/^[0-9]*$/.test(loan) == false) 
		{
			loan = 0;
		}
		if (loan == '')
		{
			loan = 0;
		}
		uniform = $('#p_uniform').val();
		if(/^[0-9]*$/.test(uniform) == false) 
		{
			uniform = 0;
		}
		if (uniform == '')
		{
			uniform = 0;
		}
		deduction = $('#p_deduction').val();
		if(/^[0-9]*$/.test(deduction) == false) 
		{
			deduction = 0;
		}
		if (deduction == '')
		{
			deduction = 0;
		}
		contribution = $('#p_contribution').val();
		if(/^[0-9]*$/.test(contribution) == false) 
		{
			contribution = 0;
		}
		if (contribution == '')
		{
			contribution = 0;
		}
		console.log(trate);
		if (trate == '')
		{
			trate = 0;
		}
		$('#p_tgsalary').text(String(trate));
		tgsalary = trate;
		get_total_netpay();
		
		console.log('Payroll Calculator Regular - REFRESH TABLE');
	})
	.change();


	$('#p_advbudget').on('input',function(e)
	{
		advbudget = $('#p_advbudget').val();
		if(/^[0-9]*$/.test(advbudget) == false) 
		{
			advbudget = 0;
		}
		if (advbudget == '')
		{
			advbudget = 0;
		}
		get_total_netpay();
	});
	
	$('#p_ssscontribution').on('input',function(e)
	{
		ssscontribution = $('#p_ssscontribution').val();
		if(/^[0-9]*$/.test(advbudget) == false) 
		{
			ssscontribution = 0;
		}
		if (ssscontribution == '')
		{
			ssscontribution = 0;
		}
		get_total_netpay();
	});
	
	$('#p_sssloan').on('input',function(e)
	{
		sssloan = $('#p_sssloan').val();
		if(/^[0-9]*$/.test(sssloan) == false) 
		{
			sssloan = 0;
		}
		if (sssloan == '')
		{
			sssloan = 0;
		}
		get_total_netpay();
	});
	
	$('#p_philhealth').on('input',function(e)
	{
		philhealth = $('#p_philhealth').val();
		if(/^[0-9]*$/.test(philhealth) == false) 
		{
			philhealth = 0;
		}
		if (philhealth == '')
		{
			philhealth = 0;
		}
		get_total_netpay();
	});
	
	$('#p_pagibig').on('input',function(e)
	{
		pagibig = $('#p_pagibig').val();
		if(/^[0-9]*$/.test(pagibig) == false) 
		{
			pagibig = 0;
		}
		if (pagibig == '')
		{
			pagibig = 0;
		}
		get_total_netpay();
	});
	
	$('#p_pagibigloan').on('input',function(e)
	{
		pagibigloan = $('#p_pagibigloan').val();
		if(/^[0-9]*$/.test(pagibigloan) == false) 
		{
			pagibigloan = 0;
		}
		if (pagibigloan == '')
		{
			pagibigloan = 0;
		}
		get_total_netpay();
	});
	
	$('#p_valecoor').on('input',function(e)
	{
		valecoor = $('#p_valecoor').val();
		if(/^[0-9]*$/.test(valecoor) == false) 
		{
			valecoor = 0;
		}
		if (valecoor == '')
		{
			valecoor = 0;
		}
		get_total_netpay();
	});
	
	$('#p_valegcash').on('input',function(e)
	{
		valegcash = $('#p_valegcash').val();
		if(/^[0-9]*$/.test(valegcash) == false) 
		{
			valegcash = 0;
		}
		if (valegcash == '')
		{
			valegcash = 0;
		}
		get_total_netpay();
	});
	
	$('#p_loan').on('input',function(e)
	{
		loan = $('#p_loan').val();
		if(/^[0-9]*$/.test(loan) == false) 
		{
			loan = 0;
		}
		if (loan == '')
		{
			loan = 0;
		}
		get_total_netpay();
	});
	
	$('#p_uniform').on('input',function(e)
	{
		uniform = $('#p_uniform').val();
		if(/^[0-9]*$/.test(uniform) == false) 
		{
			uniform = 0;
		}
		if (uniform == '')
		{
			uniform = 0;
		}
		get_total_netpay();
	});
	
	$('#p_deduction').on('input',function(e)
	{
		deduction = $('#p_deduction').val();
		if(/^[0-9]*$/.test(deduction) == false) 
		{
			deduction = 0;
		}
		if (deduction == '')
		{
			deduction = 0;
		}
		get_total_netpay();
	});
	
	$('#p_contribution').on('input',function(e)
	{
		contribution = $('#p_contribution').val();
		if(/^[0-9]*$/.test(contribution) == false) 
		{
			contribution = 0;
		}
		if (contribution == '')
		{
			contribution = 0;
		}
		get_total_netpay();
	});
	
	function get_total_netpay()
	{
		// GET TOTAL DEDUCTION
		tdeduction = parseInt(advbudget) + parseInt(ssscontribution) + parseInt(sssloan) + parseInt(philhealth) + parseInt(pagibig) + parseInt(pagibigloan) + parseInt(valecoor) + parseInt(valegcash) + parseInt(loan) + parseInt(uniform) + parseInt(deduction) + parseInt(contribution);		
		$('#p_tdeduction').text(String(tdeduction));

		// GET TOTAL NETPAY
		netpay = parseInt(tgsalary) - parseInt(tdeduction);
		$('#p_netpay').text(String(netpay));
	}


	
	