	// Add Trip Modal Javascript File
	// Created by: Marvin V. Bergado
	// Date Created: December 16, 2020 10:52 AM (Version 2.0 - PAYROLL ACTS)
	
	// GLOBAL VARIABLES
	var pickup;
	var delivery;
	var rate;
	var date;
	var addtbgt;
	var jobtype;
	var request = false;
	
	$('#btn_save_trip').unbind('click').click(function(){
		$("html").addClass("loading");
		if (!request)
		{
				request = true;
				var eid 		= $('#ta_eid').text();
				var pickup 		= $('#opt_pickup').val();
				var delivery    = $('#opt_delivery').val();
				var rate 		= $('#ta_triprate').val();
				var date 		= $('#ta_tripdate').val();
				var addbudget 	= $('#ta_addbudget').val();
				
				
			if ( pickup == "" || delivery == "" || rate == "" || date == "")
			{
				alert("Check Requirements");  
				$("html").removeClass("loading");
				console.log('Check Requirements. Fill Up the data needed');
				request = false;
			}
			else
			{
				var form_data = 
				{
						eid				: eid,
						pickup			: pickup,
						delivery 		: delivery,
						rate 			: rate,
						date 			: date,
						addbudget 		: addbudget
				};
				$.ajax({
					type:'POST',
					data:form_data,
					url: window.location.protocol + '//' + window.location.host + '/payroll/main/save_trip',
					dataType: 'JSON',
					success:function(result)
					{
						if (result['success']  == true)
						{
							//alert('New Trip Added!');
							console.log('New Trip Added!');
							
							// HIDE MODAL
							$('#modal_addtrip').modal('hide'); 
							$(".modal-backdrop.in").hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							
							// CLEAR DIV MODAL
							$('#main_modal').empty(); 
							
							// RESET TRIP TABLE
							$('#tbl_trip').empty();
							$('#tbl_trip').html(result['table']);
							$("html").removeClass("loading");
							request = false;
						}
						else
						{
							alert('Failed To Add New Trip');
							console.log('Failed To Add New Trip');
							request = false;
						}
					}
				});
			}
		}
		else
		{
			$("html").removeClass("loading");
			request = false;
		}
	});

		
		
		
	// GET TRIP RATE WHEN PICKUP POINT SELECTED
	$('#opt_pickup').on('change', function() 
	{
		jobtype 	= $('#ta_edesignation').text();
		pickup 		= $('#opt_pickup').val();
		delivery 	= $('#opt_delivery').val();
		
		console.log('PICKUP POINT:'+ pickup + ' & DELIVERY POINT:' + delivery);
		console.log('JOB TYPE:' + jobtype);
			
		var form_data = 
		{
			pickup		: pickup,
			delivery 	: delivery,
			jobtype		: jobtype
		};
		if(!request)
		{
			request = true;
			$.ajax({
				type:'POST',
				data:form_data,
				url: window.location.protocol + '//' + window.location.host + '/payroll/trip/get_triprate',
				dataType: 'JSON',
				success:function(result)
				{
					$('#ta_triprate').val(result['RATE']); 
					console.log('TRIP RATE:' + result['RATE']);
					request = false;
				}
			});
		}
		else
		{
			request = false;
		}
	});
		
	// GET TRIP RATE WHEN DELIVERY POINT SELECTED
	$('#opt_delivery').on('change', function() 
	{
		jobtype 	= $('#ta_edesignation').text();
		pickup 		= $('#opt_pickup').val();
		delivery 	= $('#opt_delivery').val();
		console.log('PICKUP POINT:'+ pickup + ' & DELIVERY POINT:' + delivery);
		console.log('JOB TYPE:' + jobtype);
			
		var form_data = 
		{
			pickup		: pickup,
			delivery 	: delivery,
			jobtype		: jobtype
		};
		if(!request)	
		{
			request = true;
			$.ajax({
				type:'POST',
				data:form_data,
				url: window.location.protocol + '//' + window.location.host + '/payroll/trip/get_triprate',
				dataType: 'JSON',
				success:function(result)
				{
					$('#ta_triprate').val(result['RATE']); 
					console.log('TRIP RATE:' + result['RATE']);
					request = false;
				}
			});
		}
		else
		{
			request = false;
		}
	});
	
	