	// Modal Javascript File
	// Created by: Marvin V. Bergado
	// Date Created: December 1, 2020 8:00 PM
	// Date Modified: December 15, 2020 5:05 PM (Version 2.0 - PAYROLL ACTS)
	// Date Modified: February 23, 2021 10:15 AM (Version 3.0 - PAYROLL ACTS)
	
	var base64img;
	var request = false;
	
	$('#btn_save').click(function() 
	{	
		if(!request)
		{
			request = true;
			$("html").addClass("loading");
			var x = $('#ea_enum').val();
			var y = $('#ea_civilstatus').val();
			var a = $('#ea_lastname').val();
			var b = $('#ea_firstname').val();
			var c = $('#ea_middlename').val();
			var d = $('#ea_birthdate').val();
			var e = $('input[name="ea_gender"]:checked').val();
			var f = $('#ea_address').val();
			var g = $('#ea_designation').val();
			var h = $('#ea_type').val();
			var i = $('#ea_date').val();
			var j = $('#ea_status').val();
			var k = $('#ea_sss').val();
			var l = $('#ea_tin').val();
			var m = $('#ea_philhealth').val();
			var n = $('#ea_pagibig').val();
			
			console.log(a +' '+ b +' '+ c +' '+ d +' '+ e +' '+ f +' '+ g +' '+ h +' '+ i +' '+ j +' '+ k +' '+ l +' '+ m +' '+ n +' ');
			if ( a == "" || b == "" || d == "" || e == "" || f == "" || g == "" ||  h == "" || i == "" || j == "" || x == "" || y == "" )
			{
				alert("Add: Check the requirements.");  
				$("html").removeClass("loading");
			}
			else
			{
				var form_data = 
				{
					enumber			: $('#ea_enum').val(),
					lastname 		: $('#ea_lastname').val().replace(/^\s+|\s+$/gm,''),
					firstname 		: $('#ea_firstname').val().replace(/^\s+|\s+$/gm,''),
					middlename 		: $('#ea_middlename').val().replace(/^\s+|\s+$/gm,''),
					birthdate 		: $('#ea_birthdate').val(),
					gender 			: $('input[name="ea_gender"]:checked').val(),
					civilstatus		: $('#ea_civilstatus').val(),
					address 		: $('#ea_address').val(),
					designation 	: $('#ea_designation').val(),
					type 			: $('#ea_type').val(),
					employmentdate 	: $('#ea_date').val(),
					status 			: $('#ea_status').val(),
					sss 			: $('#ea_sss').val(),
					philhealth 		: $('#ea_tin').val(),
					tin 			: $('#ea_philhealth').val(),
					pagibig 		: $('#ea_pagibig').val(),
					img 			: base64img
				};
				$.ajax({
					url: window.location.protocol + '//' + window.location.host + '/payroll/main/employee_save',
					type:'POST',
					data:form_data,
					dataType: 'JSON',
					success:function(result)
					{
						if (result['success']  == true)
						{
							alert('New Employee Data Successfully Added!');
							$('#modal_employee').modal('hide'); 
							$(".modal-backdrop.in").hide();
							$('#main_content').html(result['html']);
							$('#tbl_employee').DataTable();
							$("html").removeClass("loading");
							base64img = '';
							request = false;
						}
						else
						{
							alert('Failed to Add New Employee Data');
						}
					},
					complete: function()
					{
						console.log('AJAX Query Complete');
						$("html").removeClass("loading");
						request = false;
					}
				});
			}
			
		}
		
		
		
		
	});
	
	
	$('#btn_update').click(function() 
	{	
		$("html").addClass("loading");
		var a = $('#eu_lastname').val();
		var b = $('#eu_givenname').val();
		var c = $('#eu_middlename').val();
		var d = $('#eu_birthdate').val();
		var e = $('input[name="eu_gender"]:checked').val();
		var f = $('#eu_address').val();
		var g = $('#eu_position').val();
		var h = $('#eu_type').val();
		var i = $('#eu_date').val();
		var j = $('#eu_status').val();
		var k = $('#eu_sss').val();
		var l = $('#eu_tin').val();
		var m = $('#eu_philhealth').val();
		var n = $('#eu_pagibig').val();
		
		//console.log(a +' '+ b +' '+ c +' '+ d +' '+ e +' '+ f +' '+ g +' '+ h +' '+ i +' '+ j +' '+ k +' '+ l +' '+ m +' '+ n +' ');
		
		if ( a == "" || b == "" || d == "" || e == "" || f == "" || g == "" ||  h == "" || i == "" || j == "" )
		{
			alert("Update: Check the requirements."); 
			$("html").removeClass("loading");			
		}
		else
		{
			var form_data = 
			{
				eid 			: $('#eu_id').val(),
				enumber			: $('#eu_enum').val(),
				lastname 		: $('#eu_lastname').val(),
				firstname 		: $('#eu_firstname').val(),
				middlename 		: $('#eu_middlename').val(),
				birthdate 		: $('#eu_birthdate').val(),
				gender 			: $('#eu_gender').val(),
				civilstatus		: $('#eu_civilstatus').val(),
				address 		: $('#eu_address').val(),
				designation 	: $('#eu_designation').val(),
				type 			: $('#eu_type').val(),
				employmentdate 	: $('#eu_date').val(),
				status 			: $('#eu_status').val(),
				sss 			: $('#eu_sss').val(),
				philhealth 		: $('#eu_tin').val(),
				tin 			: $('#eu_philhealth').val(),
				pagibig 		: $('#eu_pagibig').val(),
				img 			: $('#e_img').attr('src')
			};
			console.log(form_data.img);
			$.ajax({
				url: window.location.protocol + '//' + window.location.host + '/payroll/main/employee_update',
				type:'POST',
				data:form_data,
				dataType: 'JSON',
				success:function(result)
				{
					if (result['success']  == true)
					{
						alert('Employee Data Successfully Updated!');
						$('#modal_update_employee').modal('hide'); 
						$(".modal-backdrop.in").hide();
						$('#main_content').html(result['html']);
						$('#tbl_employee').DataTable();
						$("html").removeClass("loading");
						base64img = '';
					}
					else
					{
						alert('Failed to Update Employee Data');
					}
				}
			});
		}
	});
	
	function readURL(input) 
	{
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();   
			reader.onload = function(e) 
			{
				$('#e_img').attr('src', e.target.result);
				base64img = reader.result;
				//console.log(base64img);
			}
			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}
	
	$("#btn_upload").change(function() 
	{
		readURL(this);
	});
