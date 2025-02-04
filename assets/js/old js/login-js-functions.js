	$('#btn_login').click(function() {
		const formData = {
			username: $('#txt_username').val(),
			password: $('#txt_password').val()
		};
		
		const baseUrl = `${window.location.protocol}//${window.location.host}/payroll`;
		
		$('html').addClass('loading');
		
		$.ajax({
			url: `${baseUrl}/login/user_login`,
			type: 'POST',
			data: formData,
			dataType: 'JSON',
			success: function(result) {
				$('html').removeClass('loading');
				
				if (result.success) {
					alert('Login Success');
					window.location.href = `${baseUrl}/main`;
				} else {
					alert('User does not exist');
				}
			}
		});
	});
	
	
	
//========================================================================================================================
//TEST CODES HERE >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//========================================================================================================================
	
	$('#test1').click(function() 
	{
		//alert("You Clicked Test1 Button");
		$("html").addClass("loading");
		$.ajax({
			url: window.location.protocol + '//' + window.location.host + '/routing/main/test1',
			dataType: 'JSON',
			success: function (result)
			{
				$("html").removeClass("loading");
				$('#contentHolder').html(result['html']);
			}
		});
	});

	