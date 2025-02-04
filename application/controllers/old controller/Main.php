<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	public function index()
	{
		$this->load->view('pages/main_page');
	}
	
	// EMPLOYEE MANAGER MODULE HERE - 
	
	public function employee_management()
	{
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_employee();
		$data['records'] = $row;
		
		$html  = $this->load->view('pages/employee_page',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	public function search_employee()
	{
		$data['fullname'] = $this->input->post('search');
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->search_employee($data);
		$data['records'] = $row;
		
		$html  = $this->load->view('pages/employee_page',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	public function employee_add()
	{
		$html  = $this->load->view('pages/employee_modal','',TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	public function employee_update()
	{
		$firstname = $this->input->post('firstname');
		$result = array();
		$row = array();
		$data = array('eid' 			=> $this->input->post('eid'),
					  'enumber' 		=> $this->input->post('enumber'),
					  'lastname' 		=> $this->input->post('lastname'),
					  'firstname'		=> $this->input->post('firstname'),
					  'middlename'		=> $this->input->post('middlename'),
					  'alias'			=> substr($firstname, 0, 1).". ".$this->input->post('lastname'),
					  'birthdate'		=> $this->input->post('birthdate'),
					  'gender'			=> $this->input->post('gender'),
					  'civilstatus'		=> $this->input->post('civilstatus'),
					  'address'			=> $this->input->post('address'),
					  'designation'		=> $this->input->post('designation'),
					  'type'  			=> $this->input->post('type'),
					  'employmentdate'  => $this->input->post('employmentdate'),
					  'status'  		=> $this->input->post('status'),
					  'sss'  			=> $this->input->post('sss'),
					  'philhealth'  	=> $this->input->post('philhealth'),
					  'tin'  			=> $this->input->post('tin'),
					  'pagibig'  		=> $this->input->post('pagibig'),
					  'img'  			=> $this->input->post('img'));
		$this->load->model('payroll_model');
		$this->payroll_model->update_employee_info($data); // UPDATE EMPLOYEE DATA
		
		// RELOAD THE DATATABLE
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_employee();
		$ds['records'] = $row;
		
		$html  = $this->load->view('pages/employee_page',$ds,TRUE);
		
		$result['html'] =	$html;
		$result['success'] = true;
		echo json_encode($result);	
	}
	
	public function employee_save()
	{
		$result = array();
		$row = array();
		$firstname = $this->input->post('firstname');
		$data = array('enumber' 		=> $this->input->post('enumber'),
					  'lastname' 		=> $this->input->post('lastname'),
					  'firstname'		=> $this->input->post('firstname'),
					  'middlename'		=> $this->input->post('middlename'),
					  'alias'			=> substr($firstname, 0, 1).". ".$this->input->post('lastname'),
					  'birthdate'		=> $this->input->post('birthdate'),
					  'gender'			=> $this->input->post('gender'),
					  'civilstatus'		=> $this->input->post('civilstatus'),
					  'address'			=> $this->input->post('address'),
					  'designation'		=> $this->input->post('designation'),
					  'type'  			=> $this->input->post('type'),
					  'employmentdate'  => $this->input->post('employmentdate'),
					  'status'  		=> $this->input->post('status'),
					  'sss'  			=> $this->input->post('sss'),
					  'philhealth'  	=> $this->input->post('philhealth'),
					  'tin'  			=> $this->input->post('tin'),
					  'pagibig'  		=> $this->input->post('pagibig'),
					  'img'  			=> $this->input->post('img'));
		$this->load->model('payroll_model');
		$this->payroll_model->save_employee_info($data); // SAVE NEW EMPLOYEE DATA
		
		// RELOAD THE DATATABLE
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_employee();
		$ds['records'] = $row;
		
		$html  = $this->load->view('pages/employee_page',$ds,TRUE);
		
		$result['html'] =	$html;
		$result['success'] = true;
		echo json_encode($result);
	}
	
	public function load_employee_info()
	{
		$row = array();
		$recieveData  = array();
		$data = array('eid' => $this->input->post('eid'));
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_employee_info($data);
		
		$result['EID'] 					= $row['EID'];	
		$result['ENUM'] 				= $row['ENUM'];			
        $result['LASTNAME'] 			= $row['LASTNAME'];
        $result['FIRSTNAME'] 			= $row['FIRSTNAME'];		
        $result['MIDDLENAME'] 			= $row['MIDDLENAME'];		
		$result['BIRTHDATE'] 			= $row['BIRTHDATE']; 		
		$result['GENDER'] 				= $row['GENDER']; 	
		$result['CIVIL_STATUS'] 		= $row['CIVIL_STATUS']; 			
		$result['ADDRESS'] 				= $row['ADDRESS']; 		
		$result['DESIGNATION'] 			= $row['DESIGNATION']; 	
		$result['EMPLOYEE_TYPE'] 		= $row['EMPLOYEE_TYPE']; 	
		$result['EMPLOYMENT_DATE'] 		= $row['EMPLOYMENT_DATE'];
		$result['EMPLOYEE_STATUS'] 		= $row['EMPLOYEE_STATUS'];
		$result['SSS'] 					= $row['SSS'];
		$result['PHILHEALTH'] 			= $row['PHILHEALTH'];
		$result['TIN'] 					= $row['TIN'];
		$result['PAGIBIG'] 				= $row['PAGIBIG'];
		if ($row['PICTURE'] == '')
		{
			$result['PICTURE'] = base_url()."/assets/img/employee.png";
		}
		else
		{
			$result['PICTURE'] 	= $row['PICTURE'];
		}
		
		
		$html  = $this->load->view('pages/employee_update_modal',$result,TRUE);

		$result['html'] =	$html;
		echo json_encode($result);
	}
	
	// PAYROLL MODULES HERE
	
	public function payroll()
	{
		$row1 = array();
		$this->load->model('payroll_model');
		$row1  = $this->payroll_model->load_employee();
		$data['records'] = $row1;
		
		$row2 = array();
		$this->load->model('dns_model');
		$row2  = $this->dns_model->load_dnsnum();
		$data['CURR_DNSNUM'] = $row2['CURR_DNSNUM'];
		
		$row3 = array();
		$this->load->model('dns_model');
		$row3  = $this->dns_model->load_dnsnum_reg();
		$data['CURR_DNSNUM_REG'] = $row3['CURR_DNSNUM_REG'];
		
		$html  = $this->load->view('pages/payroll_page',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);
	}
	
	public function payroll_search_employee()
	{
		$data['fullname'] = $this->input->post('search');
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->search_employee($data);
		$data['records'] = $row;
		
		$html  = $this->load->view('pages/payroll_employee_table',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	// SAVE NEW PAYROLL RECORD FOR DRIVERS AND HELPERS
	public function payroll_save_computation()
	{	
		$data = array();
		$temp = array();
		
		$temp['eid'] 				= $this->input->post('p_eid');
		$temp['dns_No'] 			= $this->input->post('dns_No');
		$temp['enum'] 				= $this->input->post('e_num');
		
		$data['p_eid'] 				= $this->input->post('p_eid');
		$data['p_code'] 			= $this->input->post('p_code');
		$data['p_datecreated'] 		= $this->input->post('p_datecreated');
		$data['p_startdate'] 		= $this->input->post('p_startdate');
		$data['p_enddate'] 			= $this->input->post('p_enddate');
		$data['p_trips'] 			= $this->input->post('p_trips');
		$data['p_ttriprate'] 		= $this->input->post('p_ttriprate');
		$data['p_taddbudget'] 		= $this->input->post('p_taddbudget');
		$data['p_advbudget'] 		= $this->input->post('p_advbudget');
		$data['p_ssscontribution'] 	= $this->input->post('p_ssscontribution');
		$data['p_sssloan'] 			= $this->input->post('p_sssloan');
		$data['p_philhealth'] 		= $this->input->post('p_philhealth');
		$data['p_pagibig'] 			= $this->input->post('p_pagibig');
		$data['p_pagibigloan'] 		= $this->input->post('p_pagibigloan');
		$data['p_valecoor'] 		= $this->input->post('p_valecoor');
		$data['p_valegcash'] 		= $this->input->post('p_valegcash');
		$data['p_abono'] 			= $this->input->post('p_abono');
		$data['p_loan'] 			= $this->input->post('p_loan');
		$data['p_uniform'] 			= $this->input->post('p_uniform');
		$data['p_deduction'] 		= $this->input->post('p_deduction');
		$data['p_contribution'] 	= $this->input->post('p_contribution');
		$data['p_tgsalary'] 		= $this->input->post('p_tgsalary');
		$data['p_tdeduction'] 		= $this->input->post('p_tdeduction');
		$data['p_netpay'] 			= $this->input->post('p_netpay');
		$data['dns_No'] 			= $this->input->post('dns_No');
		$data['p_vale'] 			= $this->input->post('p_vale');
		
		// SAVE NEW PAYROLL COMPUTATIONS
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_save_computation($data);
		$result['success'] = $row['success'];
		
		// LOAD PAYROLL PERIOD
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_payrollperiod($temp);
		$temp['START_PERIOD'] 		= $row['START_PERIOD'];
		$temp['END_PERIOD'] 		= $row['END_PERIOD'];
		
		// GET EMPLOYEE BASIC INFO - INSIDE CALCULATOR
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_employee_info($temp);		
		$temp['DESIGNATION'] 	= $row['DESIGNATION'];	
		$temp['FULLNAME'] 		= $row['FULLNAME'];	
		$temp['ALIAS'] 		    = $row['ALIAS'];	
		$temp['eid'] 		    = $row['EID'];
		
		// LOAD TRIP TABLE - INSIDE CALCULATOR
		$row = array();
		$this->load->model('payroll_model');
		$row  			= $this->payroll_model->payroll_trips($temp);
		$temp['TRIPS'] 	= $row;
		
		// COUNT TRIP DATA - INSIDE CALCULATOR
		$row = array();
		$this->load->model('payroll_model');
		$row  				= $this->payroll_model->trip_counter($temp);
		$temp['TNUM'] 		= $row['TNUM'];
		$temp['TRATE'] 		= $row['TRATE'];
		$temp['TADDBGT'] 	= $row['TADDBGT'];
		
		// GET VALE (DNS)
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->get_vale($temp);
		$temp['VALE'] = $row['VALE'];
		$temp['ABONO'] = $row['ABONO'];
		
		// 1. RESET PAYROLL CALCULATOR
		$calculator  			= $this->load->view('pages/pr_calculator_contractual',$temp,TRUE);
		$result['calculator'] 	= $calculator;
		
		// 2. RESET EMPLOYEE'S PAYROLL RECORD TABLE
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_employee_record($temp);
		$temp['records'] = $row;
		
		$table  			= $this->load->view('pages/payroll_records_table',$temp,TRUE);
		$result['table'] 	= $table;
		
		echo json_encode($result);
	}
	
	// SAVE NEW PAYROLL RECORD FOR REGULARS
	public function pr_save_computation_reg()
	{	
		$data = array();
		$temp = array();
		
		$temp['eid'] 				= $this->input->post('p_eid');
		$temp['dns_No_reg'] 		= $this->input->post('dns_No');
		$temp['enum'] 				= $this->input->post('e_num');
		
		$data['eid'] 				= $this->input->post('p_eid');
		$data['p_eid'] 				= $this->input->post('p_eid');
		$data['p_code'] 			= $this->input->post('p_code');
		$data['p_datecreated'] 		= $this->input->post('p_datecreated');
		$data['p_startdate'] 		= $this->input->post('p_startdate');
		$data['p_enddate'] 			= $this->input->post('p_enddate');
		$data['p_ssscontribution'] 	= $this->input->post('p_ssscontribution');
		$data['p_sssloan'] 			= $this->input->post('p_sssloan');
		$data['p_philhealth'] 		= $this->input->post('p_philhealth');
		$data['p_pagibig'] 			= $this->input->post('p_pagibig');
		$data['p_pagibigloan'] 		= $this->input->post('p_pagibigloan');
		$data['p_valecoor'] 		= $this->input->post('p_valecoor');
		$data['p_valegcash'] 		= $this->input->post('p_valegcash');
		$data['p_loan'] 			= $this->input->post('p_loan');
		$data['p_uniform'] 			= $this->input->post('p_uniform');
		$data['p_deduction'] 		= $this->input->post('p_deduction');
		$data['p_contribution'] 	= $this->input->post('p_contribution');
		$data['p_tgsalary'] 		= $this->input->post('p_tgsalary');
		$data['p_tdeduction'] 		= $this->input->post('p_tdeduction');
		$data['p_netpay'] 			= $this->input->post('p_netpay');
		$data['dns_No_reg'] 		= $this->input->post('dns_No');
		

		// SAVE NEW PAYROLL COMPUTATIONS
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->pr_save_computation_reg($data);
		$result['success'] = $row['success'];
		
		// LOAD PAYROLL PERIOD
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_payrollperiod_reg($temp);
		$temp['START_PERIOD'] 		= $row['START_PERIOD'];
		$temp['END_PERIOD'] 		= $row['END_PERIOD'];
		
		// GET EMPLOYEE BASIC INFO - INSIDE CALCULATOR
		$row = array();
		$this->load->model('payroll_model');
		$row = $this->payroll_model->payroll_employee_info($temp);		
		$temp['DESIGNATION'] 	= $row['DESIGNATION'];	
		$temp['FULLNAME'] 		= $row['FULLNAME'];	
		$temp['ALIAS'] 		    = $row['ALIAS'];	
		$temp['eid'] 		    = $row['EID'];	
		
		// LOAD DAILY WAGE TABLE
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_daily_wages($temp);
		$temp['WAGE'] = $row;
		
		// 1. RESET PAYROLL CALCULATOR
		$temp['TRATE'] 		= '0';	 
		$temp['TECOLA'] 	= '0';	 
		$temp['TOT'] 		= '0';	 
		$temp['TNDP'] 		= '0';	 
		$temp['THP'] 		= '0';	 
		$temp['TLATE'] 		= '0';	 
		$temp['TGSALARY'] 	= '0';	 
		
		$calculator  			= $this->load->view('pages/pr_calculator_regular',$temp,TRUE);
		$result['calculator'] 	= $calculator;
		
		// 2. RESET EMPLOYEE'S PAYROLL RECORD TABLE
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_employee_record($data);
		$temp['records'] = $row;
		
		$table  			= $this->load->view('pages/payroll_records_table',$temp,TRUE);
		$result['table'] 	= $table;
		
		echo json_encode($result);
	}
	
	// LOAD CALCULATOR AND EMPLOYEE'S PAYROLL RECORDS
	public function payroll_load_function()
	{
		$data['enum'] 		= $this->input->post('e_num');
		$data['dns_No'] 	= $this->input->post('dns_No_dh');
		$data['dns_No_reg'] = $this->input->post('dns_No_reg');
		
		// GET EMPLOYEE BASIC INFO - INSIDE CALCULATOR
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_employee_info($data);		
		$data['DESIGNATION'] 	= $row['DESIGNATION'];	
		$data['FULLNAME'] 		= $row['FULLNAME'];	
		$data['ALIAS'] 			= $row['ALIAS'];
		$data['eid'] 			= $row['EID'];			
		
		if ($data['DESIGNATION'] == 'Driver' || $data['DESIGNATION'] == 'Helper') // IF JOB DESIGNATION IS DRIVER / HELPER
		{
			// LOAD PAYROLL PERIOD
			$row = array();
			$this->load->model('payroll_model');
			$row  = $this->payroll_model->load_payrollperiod($data);
			$data['START_PERIOD'] 		= $row['START_PERIOD'];
			$data['END_PERIOD'] 		= $row['END_PERIOD'];
			
			// LOAD TRIP TABLE
			$row = array();
			$this->load->model('payroll_model');
			$row  = $this->payroll_model->payroll_trips($data);
			$data['TRIPS'] = $row;
			$result['TRIPS'] = $row;
			
			// COUNT TRIP DATA
			$row = array();
			$this->load->model('payroll_model');
			$row  = $this->payroll_model->trip_counter($data);
			$data['TNUM'] 		= $row['TNUM'];
			$data['TRATE'] 		= round($row['TRATE'],2).PHP_EOL;
			$data['TADDBGT'] 	= round($row['TADDBGT'],2).PHP_EOL;
			
			// GET VALE (DNS)
			$row = array();
			$this->load->model('payroll_model');
			$row  = $this->payroll_model->get_vale($data);
			$data['VALE'] = $row['VALE'];
			$data['ABONO'] = $row['ABONO'];
			
			// CALL CALCULATOR - CONTRACTUAL
			$calculator  = $this->load->view('pages/pr_calculator_contractual',$data,TRUE);
			$result['calculator'] =	$calculator;	
		}
		else //  IF JOB DESIGNATION IS NOT EQUAL TO HELPER / DRIVER
		{
			// LOAD PAYROLL PERIOD
			$row = array();
			$this->load->model('payroll_model');
			$row  = $this->payroll_model->load_payrollperiod_reg($data);
			$data['START_PERIOD'] 		= $row['START_PERIOD'];
			$data['END_PERIOD'] 		= $row['END_PERIOD'];
			
			// LOAD DAILY WAGE TABLE
			$row = array();
			$this->load->model('payroll_model');
			$row  = $this->payroll_model->payroll_daily_wages($data);
			$data['WAGE'] = $row;
			
			// LOAD TOTAL RATE
			$row = array();
			$this->load->model('payroll_model');
			$row  = $this->payroll_model->get_totalwagepay($data);
			$data['TRATE'] 		= round($row['TRATE'],2).PHP_EOL;
			$data['TECOLA'] 	= round($row['TECOLA'],2).PHP_EOL;
			$data['TOT'] 		= round($row['TOT'],2).PHP_EOL;
			$data['TNDP'] 		= round($row['TNDP'],2).PHP_EOL;
			$data['THP'] 		= round($row['THP'],2).PHP_EOL;
			$data['TLATE'] 		= round($row['TLATE'],2).PHP_EOL;
			$data['TGSALARY'] 	= round($row['TGSALARY'],2).PHP_EOL;
			
			// CALL CALCULATOR - REGULAR
			$calculator  = $this->load->view('pages/pr_calculator_regular',$data,TRUE);
			$result['calculator'] =	$calculator;
		}
		
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_employee_record($data);
		$data['records'] = $row;
		
		// TABLE
		$table  = $this->load->view('pages/payroll_records_table',$data,TRUE);
		$result['table'] =	$table;
		echo json_encode($result);	
	}
	
	public function payroll_record_modal()
	{
		$data['payroll_id'] = $this->input->post('payroll_id');
		
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_record_modal($data);
		
		$data['p_eid'] 			= $row['p_eid'];	
		$data['p_rate'] 		= $row['p_rate'];	
		$data['p_hours'] 		= $row['p_hours'];	
		$data['p_days'] 		= $row['p_days'];	
		$data['p_gsalary'] 		= $row['p_gsalary'];	
		$data['p_tax'] 			= $row['p_tax'];	
		$data['p_sss'] 			= $row['p_sss'];	
		$data['p_philhealth'] 	= $row['p_philhealth'];	
		$data['p_pagibig'] 		= $row['p_pagibig'];	
		$data['p_sdeduction'] 	= $row['p_sdeduction'];	
		$data['p_odeduction'] 	= $row['p_odeduction'];	
		$data['p_netpay'] 		= $row['p_netpay'];	
		$data['p_payrolldate'] 	= $row['p_payrolldate'];	
		$data['p_datecreated'] 	= $row['p_datecreated'];	
		$data['p_payrollcode'] 	= $row['p_payrollcode'];	
		
		
		$html  = $this->load->view('pages/payroll_record_modal',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	public function payroll_summary_records()
	{	
		$row1 = array();
		$row2 = array();
		
		$this->load->model('payroll_model');
		$row2  = $this->payroll_model->payroll_date_list();
		$data['records'] = $row2;
		
		$option  = $this->load->view('pages/payroll_dates_option',$data,TRUE);
		$result['option'] =	$option;
		
		$this->load->model('payroll_model');
		$row1  = $this->payroll_model->payroll_summary_records();
		$data['records'] = $row1;
		
		$html  = $this->load->view('pages/payroll_summary_page',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);
	}
	
	public function payroll_date_summary_record()
	{	
		$row = array();
		$data['payrolldate'] = $this->input->post('payrolldate');
		
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_date_summary($data);
		$data['records'] = $row;
		
		$table  = $this->load->view('pages/payroll_date_summary_table',$data,TRUE);
		$result['table'] =	$table;
		echo json_encode($result);
	}
	
	// LOAD TRIP
	public function load_trip()
	{
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_trips();
		$data['records'] = $row;
		
		$table  = $this->load->view('pages/payroll_trips_table',$data,TRUE);
		
		$result['html'] =	$table;
		$result['success'] = true;
		echo json_encode($result);
	}
	
	// ADD TRIP 
	public function add_trip()
	{
		$data['eid'] 			= $this->input->post('eid');
		$data['FULLNAME'] 		= $this->input->post('fullname');
		$data['DESIGNATION'] 	= $this->input->post('designation');
		
		// GET PICKUP AND DELIVERY DATA
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_pickup();
		$data['trip_pickup'] = $row;
		
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_delivery();
		$data['trip_delivery'] = $row;
		
		$html  = $this->load->view('pages/add_trip_modal',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	// SAVE TRIP
	public function save_trip()
	{
		$data['eid'] 			= $this->input->post('eid');
		$data['pickup'] 		= $this->input->post('pickup');
		$data['delivery'] 	    = $this->input->post('delivery');
		$data['rate'] 			= $this->input->post('rate');
		$data['date'] 			= $this->input->post('date');
		$data['addbudget'] 		= $this->input->post('addbudget');
		$data['trip'] 			= $this->input->post('pickup').' - '.$this->input->post('delivery');
		
		$this->load->model('payroll_model');
		$this->payroll_model->save_trip($data);
		
		// RELOAD THE TRIP DATATABLE
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_trips($data);
		$data['records'] = $row;
		
		// COUNT TRIP DATA - INSIDE CALCULATOR
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->trip_counter($data);
		$data['TNUM'] 		= $row['TNUM'];
		$data['TRATE'] 		= $row['TRATE'];
		$data['TADDBGT'] 	= $row['TADDBGT'];
		
		$table  = $this->load->view('pages/payroll_trips_table',$data,TRUE);
		
		$result['table'] =	$table;
		$result['success'] = true;
		echo json_encode($result);
	}
	
	// SAVE WAGE
	public function save_wage()
	{
		$data['eid']  	= $this->input->post('r_eid');
		$data['r_date'] = $this->input->post('r_date');
		$data['r_day'] 	= $this->input->post('r_day');
		$data['r_rate'] = $this->input->post('r_rate');
		
		// SAVE DAILY WAGE
		$this->load->model('payroll_model');
		$this->payroll_model->save_wage($data);
		
		// LOAD DAILY WAGE TABLE
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->payroll_daily_wages($data);
		$temp['WAGE'] = $row;
		
		// LOAD TOTAL RATE
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->get_totalrate($data);
		$temp['TRATE'] = $row['TRATE'];
		
		$table  			= $this->load->view('pages/pr_table_wage',$temp,TRUE);
		$result['table'] 	= $table;
		
		$result['success'] = true;
		echo json_encode($result);
	}
	
	public function exportExcel()
	{
		$data['payrolldate'] = $this->input->post('opt_payroll');
		
		$this->load->model("payroll_model");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("PAYROLL ID", "EMPLOYEE ID", "FULLNAME", "GROSS SALARY", "TOTAL DEDUCTIONS", "NET PAY");

		$columnPos = 1;
		$rowPos = 9;
		
		$bordercount;
		
		// SET CUSTOMIZED STYLES AND FONTS
		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => '#000000'),
				),
			),
		);
		
		$text_centered = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				)
		);
		$color_cell = array(
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'CC99FF') // PALE VIOLET
			)
		);
		
		// INSERT IMAGE - LOGO
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('Logo');
		$objDrawing->setDescription('Logo');
		$logo = $_SERVER['DOCUMENT_ROOT'].'/payroll/assets/img/logo.png'; // Provide path to your logo file
		$objDrawing->setPath($logo);
		$objDrawing->setOffsetX(30);    // setOffsetX works properly
		$objDrawing->setOffsetY(500);  //setOffsetY has no effect
		$objDrawing->setCoordinates('B2');
		$objDrawing->setHeight(80); // logo height
		$objDrawing->setWorksheet($object->getActiveSheet());
		
		// TEXT CENTERED
		$object->getActiveSheet()->getStyle('B9:G9')->applyFromArray($text_centered);
		$object->getActiveSheet()->getCell('C2')->setValue("ALL COUNTS TRANSPORT SERVICES CORP.\n #256 YOUNGER STREET, BALUT, TONDO, MANILA\n TEL #: 02-7239-8184");
		$object->getActiveSheet()->getStyle('C2:G2')->applyFromArray($text_centered); // HEADER TITLE
		$object->getActiveSheet()->getStyle('C2:G2')->getAlignment()->setWrapText(true);
		
		$object->getActiveSheet()->getCell('C5')->setValue("PAYROLL SUMMARY REPORT \n PAYROLL DATE RANGE: ".$data['payrolldate']." \n DATE: ".date('m-d-Y'));
		$object->getActiveSheet()->getStyle('C5:G5')->applyFromArray($text_centered); // HEADER TITLE
		$object->getActiveSheet()->getStyle('C5:G5')->getAlignment()->setWrapText(true);
		
		// MERGE CELLS
		$object->getActiveSheet()->mergeCells('C2:G4');
		$object->getActiveSheet()->mergeCells('C5:G7');
		$object->getActiveSheet()->mergeCells('B2:B7');
		
		// SET AUTOSIZE IN COLUMNS
		$object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

		//$object->getActiveSheet()->setCellValueByColumnAndRow(2, 2, 'ALL COUNTS TRANSPORT SERVICES CORP.\n #256 YOUNGER STREET, BALUT, TONDO, MANILA\n TEL #: 02-7239-8184');
		//$object->getActiveSheet()->setCellValueByColumnAndRow(2, 3, 'PAYROLL DATE RANGE: '.$data['payrolldate']);
		$object->getActiveSheet()->getStyle('B9:G9')->applyFromArray($color_cell);
		$object->getActiveSheet()->getStyle("B9:G9")->getFont()->setBold( true );
		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($columnPos, $rowPos, $field);
			$columnPos++;
		}

		//$employee_data = $this->payroll_model->fetch_data(); // TEST FUNCTION
		$employee_data = $this->payroll_model->payroll_date_summary($data);
		
		$excel_row = 10;

		foreach($employee_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->PAYROLL_ID);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->EMPLOYEE_ID);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->FULLNAME);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->GROSS_SALARY);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->TOTAL_DEDUCTION);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->NETPAY); 
			$excel_row++;
		}
		
		$bordercount = $excel_row-1;
		
		// SET ALL BORDER IN THE CELLS
		$object->getActiveSheet()->getStyle('B9:G12')->applyFromArray($styleArray);
		$object->getActiveSheet()->getStyle('B9:G'.$bordercount)->applyFromArray($styleArray);
		$object->getActiveSheet()->getStyle('B2:G7')->applyFromArray($styleArray);
		
		// Save Excel 2007 file
		#echo date('H:i:s') . " Write to Excel2007 format\n";
		$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		ob_end_clean();
		
		// Output Excel File
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="payroll.xlsx"');
		$objWriter->save('php://output');
	}
}

