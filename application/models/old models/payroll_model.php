 <?php
 
class Payroll_model extends CI_Model
{	
	// LOAD EMPLOYEE MASTER LIST
	public function load_employee()
	{
		$query = $this->db->query("SELECT 	e_id 				AS 'EID', 
											e_num 				AS 'ENUM', 
											e_lastname 			AS 'LASTNAME', 
											e_firstname 		AS 'FIRSTNAME', 
											e_middlename 		AS 'MIDDLENAME', 
											e_designation 		AS 'DESIGNATION', 
											e_fullname 			AS 'FULLNAME',
											e_alias				AS 'ALIAS',
											e_type 				AS 'ETYPE', 
											e_employmentdate 	AS 'EDATE', 
											e_status 			AS 'STATUS'
									FROM 	tbl_employee 
									ORDER BY e_id DESC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// SAVE NEW EMPLOYEE INFO
	public function save_employee_info($data)
	{		
		// SAVE NEW EMPLOYEE DATA IN THE DATABASE
		$enumber = $data['enumber'];
		$image = $data['img'];
		$record = array('e_num' 				=> $data['enumber'],
						'e_lastname' 			=> $data['lastname'],
						'e_firstname'			=> $data['firstname'],
						'e_middlename'			=> $data['middlename'],
						'e_birthdate'			=> $data['birthdate'],
						'e_fullname'			=> $data['firstname'].' '.$data['middlename'].' '.$data['lastname'] ,
						'e_alias'				=> $data['alias'],
						'e_civilstatus'			=> $data['civilstatus'],
						'e_gender'				=> $data['gender'],
						'e_address'				=> $data['address'],
						'e_designation'			=> $data['designation'],
						'e_type'  				=> $data['type'],
						'e_employmentdate'  	=> $data['employmentdate'],
						'e_status'  			=> $data['status'],
						'e_sss'  				=> $data['sss'],
						'e_philhealth'  		=> $data['philhealth'],
						'e_tin'  				=> $data['tin'],
						'e_pagibig'  			=> $data['pagibig']);
        $this->db->insert('tbl_employee', $record);
		
		// SELECT THE EID OF THE NEW EMPLOYEE
		$query = $this->db->query("SELECT e_id AS 'EID' FROM tbl_employee WHERE	e_num = '".$enumber."' ORDER BY e_id DESC;");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['EID'] = $row->EID;
            }
			// SAVE NEW EMPLOYEE IMAGE INTO THE DATABASE
			$imgdata = array('img_eid' 				=> $recieveData['EID'],
							 'img_employee' 		=> $image);
			$this->db->insert('tbl_image', $imgdata);
        }
        else 
        {
            return false;
        }
	}
	
	// UPDATE EMPLOYEE INFO
	public function update_employee_info($data)
	{		
		// UPDATE EMPLOYEE DATA IN THE DATABASE
		$eid   = $data['eid'];
		$image = $data['img'];
		$record = array('e_id' 					=> $data['eid'],
						'e_num' 				=> $data['enumber'],
						'e_lastname' 			=> $data['lastname'],
						'e_firstname'			=> $data['firstname'],
						'e_middlename'			=> $data['middlename'],
						'e_birthdate'			=> $data['birthdate'],
						'e_fullname'			=> $data['firstname'].' '.$data['middlename'].' '.$data['lastname'] ,
						'e_alias'				=> $data['alias'],
						'e_civilstatus'			=> $data['civilstatus'],
						'e_gender'				=> $data['gender'],
						'e_address'				=> $data['address'],
						'e_designation'			=> $data['designation'],
						'e_type'  				=> $data['type'],
						'e_employmentdate'  	=> $data['employmentdate'],
						'e_status'  			=> $data['status'],
						'e_sss'  				=> $data['sss'],
						'e_philhealth'  		=> $data['philhealth'],
						'e_tin'  				=> $data['tin'],
						'e_pagibig'  			=> $data['pagibig']);
        $this->db->where('e_id', $record['e_id']);
		$this->db->update('tbl_employee', $record); 
		
		// UPDATE EMPLOYEE IMAGE
		$imgdata = array('img_employee' => $image);
        $this->db->where('img_eid', $eid);
		$this->db->update('tbl_image', $imgdata); 
		return true;
	}
	
	// SEARCH EMPLOYEE INFO
	public function search_employee($data)
	{	
		$fullname = $data['fullname'];
		$query = $this->db->query("SELECT 	e_id 				AS 'EID', 
											e_num 				AS 'ENUM', 
											e_fullname			AS 'FULLNAME', 
											e_lastname 			AS 'LASTNAME', 
											e_firstname 		AS 'FIRSTNAME', 
											e_middlename 		AS 'MIDDLENAME', 
											e_designation 		AS 'DESIGNATION', 
											e_fullname 			AS 'FULLNAME',
											e_alias				AS 'ALIAS',											
											e_type 				AS 'ETYPE', 
											e_employmentdate 	AS 'EDATE', 
											e_status 			AS 'STATUS' 
									FROM 	tbl_employee 
									WHERE	e_fullname LIKE '%".$fullname."%'
									ORDER BY e_id DESC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD SEARCHED EMPLOYEE INFO
	public function load_employee_info($data)
	{
		// LOAD SELECTED EMPLOYEE DATA
		$recieveData = array();
		$eid = $data['eid'];
		$query = $this->db->query("SELECT 	e_id 				AS 'EID', 
											e_num 				AS 'ENUM',
											e_lastname 			AS 'LASTNAME', 
											e_firstname 		AS 'FIRSTNAME', 
											e_middlename 		AS 'MIDDLENAME', 
											e_birthdate 		AS 'BIRTHDATE',
											e_gender 			AS 'GENDER', 
											e_civilstatus 		AS 'CIVIL_STATUS',
											e_address 			AS 'ADDRESS', 
											e_designation 		AS 'DESIGNATION', 
											e_type 				AS 'EMPLOYEE_TYPE', 
											e_employmentdate 	AS 'EMPLOYMENT_DATE', 
											e_status 			AS 'EMPLOYEE_STATUS',
											e_sss 				AS 'SSS', 
											e_philhealth 		AS 'PHILHEALTH', 
											e_tin 				AS 'TIN', 
											e_pagibig 			AS 'PAGIBIG'
									FROM 	tbl_employee 
									WHERE	e_id = ".$eid ."
									ORDER BY e_id DESC;");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['EID'] 			= $row->EID;
				$recieveData['ENUM'] 			= $row->ENUM;
                $recieveData['LASTNAME'] 		= $row->LASTNAME;
                $recieveData['FIRSTNAME'] 		= $row->FIRSTNAME;
                $recieveData['MIDDLENAME'] 		= $row->MIDDLENAME;
				$recieveData['BIRTHDATE'] 		= $row->BIRTHDATE;
				$recieveData['GENDER'] 			= $row->GENDER;
				$recieveData['CIVIL_STATUS'] 	= $row->CIVIL_STATUS;
				$recieveData['ADDRESS'] 		= $row->ADDRESS;
				$recieveData['DESIGNATION'] 	= $row->DESIGNATION;
                $recieveData['EMPLOYEE_TYPE'] 	= $row->EMPLOYEE_TYPE;
				$recieveData['EMPLOYMENT_DATE'] = $row->EMPLOYMENT_DATE;
				$recieveData['EMPLOYEE_STATUS'] = $row->EMPLOYEE_STATUS;
				$recieveData['SSS'] 			= $row->SSS;
				$recieveData['PHILHEALTH'] 		= $row->PHILHEALTH;
				$recieveData['TIN'] 			= $row->TIN;
				$recieveData['PAGIBIG'] 		= $row->PAGIBIG;
            }
			
			// LOAD SELECTED EMPLOYEE'S IMAGE
			$imgquery = $this->db->query("SELECT img_employee AS 'PICTURE' FROM tbl_image WHERE img_eid = '".$recieveData['EID'] ."'");
			if ($imgquery->num_rows() > 0)
			{
				foreach ($imgquery->result() as $row)
				{
					$recieveData['PICTURE'] = $row->PICTURE;
				}
			}
			else
			{
				$recieveData['PICTURE'] = "";
			}
            $recieveData['loginID'] = 1;
            return $recieveData;
        }
        else 
        {
            return false;
        }
	}
	
	// SAVE COMPUTED PAYROLL RECORD - DRIVER AND HELPER
	public function payroll_save_computation($data)
	{
		$dns_No = $data['dns_No'];
		$payroll_record = array();
		$deduction_record = array();
		
		$query = $this->db->query("SELECT EXISTS( SELECT p_code FROM tbl_payroll  WHERE	p_code = '".$data['p_code']."') AS 'EXIST'");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['EXIST'] = $row->EXIST;
            }
        }
        else 
        {
           return false;
        }
		
		// CHECK IF PAYROLL CODE EXIST
		if ($recieveData['EXIST'] == 1) // IF EXIST
		{
			$recieveData['success'] = false;
            return $recieveData;
		}
		else
		{
			// PAYROLL RECORD
			$payroll_record = array('p_eid' 			=> $data['p_eid'],
									'p_code'			=> $data['p_code'],
									'p_startdate'		=> $data['p_startdate'],
									'p_enddate'			=> $data['p_enddate'],
									'p_payrollrange'	=> $data['p_startdate']." - ".$data['p_enddate'],
									'p_trips'			=> $data['p_trips'],
									'p_ttriprate'		=> $data['p_ttriprate'],
									'p_taddbudget'		=> $data['p_taddbudget'],
									'p_tgsalary'  		=> $data['p_tgsalary'],
									'p_tdeduction'  	=> $data['p_tdeduction'],
									'p_netpay'  		=> $data['p_netpay'],
									'p_datecreated'		=> $data['p_datecreated']);
			$this->db->insert('tbl_payroll', $payroll_record);
			
			// DEDUCTION RECORD
			$deduction_record = array('d_eid' 				=> $data['p_eid'],
									  'd_code' 				=> $data['p_code'],
									  'd_payrolldate' 		=> $data['p_datecreated'],
									  'd_advbudget'			=> $data['p_advbudget'],
									  'd_ssscontribution'	=> $data['p_ssscontribution'],
									  'd_sssloan'			=> $data['p_sssloan'],
									  'd_philhealth'		=> $data['p_philhealth'],
									  'd_pagibig'			=> $data['p_pagibig'],
									  'd_pagibigloan'		=> $data['p_pagibigloan'],
									  'd_valecoor'  		=> $data['p_valecoor'],
									  'd_valegcash'  		=> $data['p_valegcash'],
									  'd_vale'  			=> $data['p_vale'],
									  'd_abono'  			=> $data['p_abono'],
									  'd_loan'  			=> $data['p_loan'],
									  'd_uniform'			=> $data['p_uniform'],
									  'd_deduction'			=> $data['p_deduction'],
									  'd_contribution'		=> $data['p_contribution'],
									  'd_tdeduction'		=> $data['p_tdeduction']);
			$this->db->insert('tbl_deduction', $deduction_record);
			
			// UPDATE TRIP RECORD
			$trip_record = array('t_payrollcode'  => $data['p_code'],
							     't_status' 	  => 'POSTED');
			$conditions = array('t_eid' => $data['p_eid'], 't_status' => 'PENDING', 't_dns_ctrlID' => $dns_No);
			$this->db->where($conditions);
			$this->db->update('tbl_trip', $trip_record); 
			
			$recieveData['success'] = true;
            return $recieveData;
		}
	}
	
	// SAVE COMPUTED PAYROLL RECORD - REGULAR EMPLOYEE
	public function pr_save_computation_reg($data)
	{
		$payroll_record = array();
		$deduction_record = array();
		
		// CHECKING FOR EXISTING PAYROLL RECORD
		$query = $this->db->query("SELECT EXISTS(SELECT p_code FROM tbl_payroll  WHERE	p_code = '".$data['p_code']."') AS 'EXIST'");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['EXIST'] = $row->EXIST;
            }
        }
        else 
        {
           return false;
        }
		
		// CHECK IF PAYROLL CODE EXIST
		if ($recieveData['EXIST'] == 1) // IF EXIST
		{
			$recieveData['success'] = false;
            return $recieveData;
		}
		else // IF NOT EXIST
		{
			// PAYROLL
			$payroll_record = array('p_eid' 			=> $data['p_eid'],
									'p_code'			=> $data['p_code'],
									'p_startdate'		=> $data['p_startdate'],
									'p_enddate'			=> $data['p_enddate'],
									'p_payrollrange'	=> $data['p_startdate']." - ".$data['p_enddate'],
									'p_trips'			=> 'NA', // REGULAR EMPLOYEE
									'p_ttriprate'		=> 'NA', // REGULAR EMPLOYEE
									'p_taddbudget'		=> 'NA', // REGULAR EMPLOYEE
									'p_tgsalary'  		=> $data['p_tgsalary'],
									'p_tdeduction'  	=> $data['p_tdeduction'],
									'p_netpay'  		=> $data['p_netpay'],
									'p_datecreated'		=> $data['p_datecreated']);
			$this->db->insert('tbl_payroll', $payroll_record);
			
			// DEDUCTION
			$deduction_record = array('d_eid' 				=> $data['p_eid'],
									  'd_code' 				=> $data['p_code'],
									  'd_payrolldate' 		=> $data['p_datecreated'],
									  'd_advbudget'			=> '0',
									  'd_ssscontribution'	=> $data['p_ssscontribution'],
									  'd_sssloan'			=> $data['p_sssloan'],
									  'd_philhealth'		=> $data['p_philhealth'],
									  'd_pagibig'			=> $data['p_pagibig'],
									  'd_pagibigloan'		=> $data['p_pagibigloan'],
									  'd_valecoor'  		=> $data['p_valecoor'],
									  'd_valegcash'  		=> $data['p_valegcash'],
									  'd_loan'  			=> $data['p_loan'],
									  'd_abono'  			=> '0',
									  'd_uniform'			=> $data['p_uniform'],
									  'd_deduction'			=> $data['p_deduction'],
									  'd_contribution'		=> $data['p_contribution'],
									  'd_tdeduction'		=> $data['p_tdeduction']);
			$this->db->insert('tbl_deduction', $deduction_record);
			
			// UPDATING WAGE RECORD
			$wage_record = array('r_payrollcode'  => $data['p_code'],'r_status' => 'POSTED');
			$conditions	= array('r_eid' => $data['p_eid'], 'r_dns_ctrlID' => $data['dns_No_reg']);
			$this->db->where($conditions);
			$this->db->update('tbl_regular', $wage_record); 
			
			$recieveData['success'] = true;
            return $recieveData;
		}
	}
	
	// LOAD EMPLOYEE'S PAYROLL RECORDS
	public function payroll_employee_record($data)
	{	
		$eid = $data['eid'];
		$query = $this->db->query("SELECT 	p_id 				AS 'PAYROLL_ID', 
											p_code 				AS 'PAYROLL_CODE', 
											p_startdate 		AS 'START_DATE', 
											p_enddate 			AS 'END_DATE', 
											p_netpay 			AS 'NETPAY' 
									FROM 	tbl_payroll 
									WHERE	p_eid = ".$eid."
									ORDER BY p_eid DESC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// OPEN PAYROLL RECORD MODAL
	public function payroll_record_modal($data)
	{	
		$payroll_id = $data['payroll_id'];
		$query = $this->db->query("SELECT * FROM tbl_payroll WHERE	p_payrollcode = '".$payroll_id."';");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['p_eid'] 			= $row->p_eid;
                $recieveData['p_rate'] 			= $row->p_rate;
                $recieveData['p_hours'] 		= $row->p_hours;
                $recieveData['p_days'] 			= $row->p_days;
				$recieveData['p_gsalary'] 		= $row->p_gsalary;
				$recieveData['p_tax'] 			= $row->p_tax;
				$recieveData['p_sss'] 			= $row->p_sss;
				$recieveData['p_philhealth'] 	= $row->p_philhealth;
                $recieveData['p_pagibig'] 		= $row->p_pagibig;
				$recieveData['p_sdeduction'] 	= $row->p_sdeduction;
				$recieveData['p_odeduction'] 	= $row->p_odeduction;
				$recieveData['p_netpay'] 		= $row->p_netpay;
				$recieveData['p_payrolldate'] 	= $row->p_payrolldate;
				$recieveData['p_datecreated'] 	= $row->p_datecreated;
				$recieveData['p_payrollcode'] 	= $row->p_payrollcode;
            }
            $recieveData['loginID'] = 1;
            return $recieveData;
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD PAYROLL SUMMARY RECORDS
	public function payroll_summary_records()
	{	
		$query = $this->db->query("SELECT		PAYROLL.p_code			AS 'PAYROLL_ID',
												EMPLOYEE.e_id 			AS 'EMPLOYEE_ID',
												EMPLOYEE.e_fullname 	AS 'FULLNAME',
												PAYROLL.p_tgsalary		AS 'GROSS_SALARY',
												PAYROLL.p_tdeduction	AS 'TOTAL_DEDUCTION',
												PAYROLL.p_netpay		AS 'NETPAY'
									FROM 		tbl_payroll AS PAYROLL
									INNER JOIN 	tbl_employee AS EMPLOYEE
									ON 			PAYROLL.p_eid = EMPLOYEE.e_id 
									ORDER BY 	EMPLOYEE.e_id;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD PAYROLL DATE RECORDS
	public function payroll_date_list()
	{	
		$query = $this->db->query("SELECT DISTINCT(p_payrollrange) AS 'RANGE' FROM tbl_payroll;");    
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD PAYROLL RECORD ON A SPECIFIC DATE
	public function payroll_date_summary($data)
	{	
		$payrolldate = $data['payrolldate'];
		
		if ($payrolldate == 'X')
		{
			$query = $this->db->query("SELECT	PAYROLL.p_code			AS 'PAYROLL_ID',
												EMPLOYEE.e_id 			AS 'EMPLOYEE_ID',
												EMPLOYEE.e_fullname 	AS 'FULLNAME',
												PAYROLL.p_tgsalary		AS 'GROSS_SALARY',
												PAYROLL.p_tdeduction	AS 'TOTAL_DEDUCTION',
												PAYROLL.p_netpay		AS 'NETPAY'
									FROM 		tbl_payroll AS PAYROLL
									INNER JOIN 	tbl_employee AS EMPLOYEE
									ON 			PAYROLL.p_eid = EMPLOYEE.e_id 
									ORDER BY 	EMPLOYEE.e_id;"); 
		}
		else
		{
			$query = $this->db->query("SELECT	PAYROLL.p_code			AS 'PAYROLL_ID',
												EMPLOYEE.e_id 			AS 'EMPLOYEE_ID',
												EMPLOYEE.e_fullname 	AS 'FULLNAME',
												PAYROLL.p_tgsalary		AS 'GROSS_SALARY',
												PAYROLL.p_tdeduction	AS 'TOTAL_DEDUCTION',
												PAYROLL.p_netpay		AS 'NETPAY'
									FROM 		tbl_payroll AS PAYROLL
									INNER JOIN 	tbl_employee AS EMPLOYEE
									ON 			PAYROLL.p_eid = EMPLOYEE.e_id 
									WHERE PAYROLL.p_payrollrange = '".$payrolldate."'
									ORDER BY 	EMPLOYEE.e_id;"); 
		}
		 
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD EMPLOYEE INFO - CALCULATOR	
	public function payroll_employee_info($data)
	{
		$enum = $data['enum'];
		$query = $this->db->query("SELECT 	e_id 				AS 'EID', 
											e_designation 		AS 'DESIGNATION', 
											e_fullname 			AS 'FULLNAME',
											e_alias 			AS 'ALIAS'
								   FROM 	tbl_employee 
								   WHERE	e_num  = '".$enum."';");    
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
				$recieveData['EID'] 		= $row->EID;
                $recieveData['DESIGNATION'] = $row->DESIGNATION;
				$recieveData['FULLNAME']    = $row->FULLNAME;
				$recieveData['ALIAS']    	= $row->ALIAS;
            }
            $recieveData['loginID'] = 1;
            return $recieveData;
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD TRIPS
	public function payroll_trips($data)
	{
		$alias 			= $data['ALIAS'];
		$designation 	= $data['DESIGNATION'];
		$eid 			= $data['eid'];
		$dns_No 		= $data['dns_No'];
		$row_num		= 0;
		
		if ($designation == 'Driver')
		{
			$query = $this->db->query("SELECT 	ROW_NUMBER() OVER (ORDER BY dns_pickupdate)       AS 'TRIP_NUM',
												dns_pickupdate 								      AS 'TRIP_DATE',
												dns_pickuppoint								      AS 'PICKUP_POINT',
												dns_delivery								      AS 'DELIVERY_POINT',
												IF(dns_driverrate = 'NO RATE', 0, dns_driverrate) AS 'TRIP_RATE',
												dns_totalbudget  								  AS 'ADDITIONAL_BUDGET',
												dns_vale										  AS 'VALE',
												dns_helpervale									  AS 'VALEH1',
												dns_helper2vale									  AS 'VALEH2',
												dns_helper3vale									  AS 'VALEH3',
												dns_meal									      AS 'MEAL',
												dns_tfee									      AS 'TFEE',
												dns_efee									      AS 'EFEE',
												dns_pfee									      AS 'PFEE',
												dns_ehelper_nonbillable						      AS 'NONBILLABLE',
												dns_ehelper_billable							  AS 'BILLABLE',
												dns_huli									  	  AS 'HULI',
												dns_returned									  AS 'RETURNED',
												dns_abonodriver									  AS 'REIMBURSE',
												dns_platenum									  AS 'PLATE_NUM',
												dns_control_id									  AS 'DNS_CONTROL_ID'
										FROM 	tbl_dns WHERE dns_driver 	= '".$alias."' 
												AND dns_control_id 			= '".$dns_No."'");
			if ($query->num_rows() > 0)
			{
				$tripData = array();
				$tempData = array();
				foreach ($query->result() as $row)
				{
					$tempData['VALE1']  = empty($row->VALEH1) ? 0 : $row->VALEH1;
					$tempData['VALE2']  = empty($row->VALEH2) ? 0 : $row->VALEH2;
					$tempData['VALE3']  = empty($row->VALEH3) ? 0 : $row->VALEH3;
					$tempData['TOTALBUDGET'] = empty($row->ADDITIONAL_BUDGET) ? 0 : $row->ADDITIONAL_BUDGET;
					
					$tempData['MEAL'] 			= empty($row->MEAL) ? 0 : $row->MEAL;
					$tempData['TFEE'] 			= empty($row->TFEE) ? 0 : $row->TFEE;
					$tempData['EFEE'] 			= empty($row->EFEE) ? 0 : $row->EFEE;
					$tempData['PFEE'] 			= empty($row->PFEE) ? 0 : $row->PFEE;
					$tempData['NONBILLABLE'] 	= empty($row->NONBILLABLE) ? 0 : $row->NONBILLABLE;
					$tempData['BILLABLE'] 		= empty($row->BILLABLE) ? 0 : $row->BILLABLE;
					$tempData['HULI'] 			= empty($row->HULI) ? 0 : $row->HULI;
					$tempData['RETURNED'] 		= empty($row->RETURNED) ? 0 : $row->RETURNED;
					
					$tempData['TOTALEXPENSE'] = $tempData['MEAL'] + $tempData['TFEE'] + $tempData['EFEE'] + $tempData['PFEE'] + $tempData['NONBILLABLE'] + $tempData['BILLABLE'] + $tempData['HULI'] + $tempData['RETURNED'];
									
					$tempData['HELPERVALE'] = $tempData['VALE1'] + $tempData['VALE2'] + $tempData['VALE3'];
					$tempData['DRIVERBUDGET'] = $tempData['TOTALBUDGET'] - $tempData['HELPERVALE'];
					$tempData['DRIVEVALE'] = $tempData['DRIVERBUDGET'] - $tempData['TOTALEXPENSE'];
					
					$tripData['t_eid'] 					= $eid;
					$tripData['t_num'] 					= $row->TRIP_NUM;
					$tripData['t_date'] 				= $row->TRIP_DATE;
					$tripData['t_designation'] 			= 'DRIVER';
					$tripData['t_pickup'] 				= $row->PICKUP_POINT;
					$tripData['t_delivery'] 			= $row->DELIVERY_POINT;
					$tripData['t_rate'] 				= $row->TRIP_RATE;
					$tripData['t_additionalbudget'] 	= $tempData['DRIVERBUDGET'];
					$tripData['t_vale'] 				= $tempData['DRIVEVALE'];
					$tripData['t_abono'] 				= empty($row->REIMBURSE) ? 0 : $row->REIMBURSE;
					$tripData['t_platenum'] 			= $row->PLATE_NUM;
					$tripData['t_dns_ctrlID'] 			= $row->DNS_CONTROL_ID;
					$tripData['t_status'] 				= 'PENDING';
					
					$q1 = $this->db->query("SELECT IF( EXISTS( SELECT * FROM tbl_trip WHERE t_num = '".$tripData['t_num']."' AND t_dns_ctrlID =  '".$tripData['t_dns_ctrlID']."'  AND t_eid = ".$eid." AND t_pickup = '".$tripData['t_pickup']."'AND t_delivery = '".$tripData['t_delivery']."' AND t_date = '".$tripData['t_date']."' AND t_rate = '".$tripData['t_rate']."' AND t_additionalbudget = '".$tripData['t_additionalbudget']."' AND t_vale = '".$tripData['t_vale']."' AND t_abono = '".$tripData['t_abono']."' AND t_platenum = '".$tripData['t_platenum']."'), 1, 0) AS 'EXIST'");
					if ($q1->num_rows() > 0)
					{
						foreach ($q1->result() as $row)
						{
							$exist = $row->EXIST;
						}
						if ($exist == 0)
						{
							$this->db->insert('tbl_trip', $tripData);
						}
					}
					//$this->db->insert('tbl_trip', $tripData);
				}
			}
			else 
			{
				return false;
			}												
		}
		else // HELPER
		{ 
			//Q1 - HELPER 1
			$query = $this->db->query("SELECT 	ROW_NUMBER() OVER (ORDER BY dns_pickupdate)       	AS 'TRIP_NUM',
												dns_pickupdate 								      	AS 'TRIP_DATE',
												dns_pickuppoint								      	AS 'PICKUP_POINT',
												dns_delivery								      	AS 'DELIVERY_POINT',
												IF(dns_h1rate = 'NO RATE', 0, dns_h1rate) 		  	AS 'TRIP_RATE',
												dns_totalbudget  								  	AS 'ADDITIONAL_BUDGET',
												dns_helpervale									  	AS 'VALE',
												dns_platenum									  	AS 'PLATE_NUM',
												dns_control_id									  	AS 'DNS_CONTROL_ID'
										FROM 	tbl_dns 
										WHERE 	dns_helper1 		= '".$alias."'
												AND dns_control_id 	= '".$dns_No."'");	
			if ($query->num_rows() > 0)
			{
				$tripData = array();
				foreach ($query->result() as $row)
				{
					$tripData['t_eid'] 					= $eid;
					$tripData['t_num'] 					= $row->TRIP_NUM;
					$tripData['t_date'] 				= $row->TRIP_DATE;
					$tripData['t_designation'] 			= 'HELPER 1';
					$tripData['t_pickup'] 				= $row->PICKUP_POINT;
					$tripData['t_delivery'] 			= $row->DELIVERY_POINT;
					$tripData['t_rate'] 				= $row->TRIP_RATE;
					$tripData['t_additionalbudget'] 	= $row->VALE;
					$tripData['t_vale'] 				= $row->VALE;
					$tripData['t_abono'] 				= 0;
					$tripData['t_platenum'] 			= $row->PLATE_NUM;
					$tripData['t_dns_ctrlID'] 			= $row->DNS_CONTROL_ID;
					$tripData['t_status'] 				= 'PENDING';
					
					$row_num = $row->TRIP_NUM;
					
					$q1 = $this->db->query("SELECT IF( EXISTS( SELECT * FROM tbl_trip WHERE t_num = '".$tripData['t_num']."' AND t_dns_ctrlID =  '".$tripData['t_dns_ctrlID']."'  AND t_eid = ".$eid." AND t_pickup = '".$tripData['t_pickup']."'AND t_delivery = '".$tripData['t_delivery']."' AND t_date = '".$tripData['t_date']."' AND t_rate = '".$tripData['t_rate']."' AND t_additionalbudget = '".$tripData['t_additionalbudget']."' AND t_vale = '".$tripData['t_vale']."' AND t_abono = '".$tripData['t_abono']."' AND t_platenum = '".$tripData['t_platenum']."'), 1, 0) AS 'EXIST'");
					if ($q1->num_rows() > 0)
					{
						foreach ($q1->result() as $row)
						{
							$exist = $row->EXIST;
						}
						if ($exist == 0)
						{
							$this->db->insert('tbl_trip', $tripData);
						}
					}
				}
			}
			// else 
			// {
				// return false;
			// }
			//Q2 - HELPER 2
			$query = $this->db->query("SELECT 	ROW_NUMBER() OVER (ORDER BY dns_pickupdate)       	AS 'TRIP_NUM',
												dns_pickupdate 								      	AS 'TRIP_DATE',
												dns_pickuppoint								      	AS 'PICKUP_POINT',
												dns_delivery								      	AS 'DELIVERY_POINT',
												IF(dns_h2rate = 'NO RATE', 0, dns_h2rate) 		  	AS 'TRIP_RATE',
												dns_totalbudget  								  	AS 'ADDITIONAL_BUDGET',
												dns_helper2vale									  	AS 'VALE',
												dns_platenum									  	AS 'PLATE_NUM',
												dns_control_id									  	AS 'DNS_CONTROL_ID'
										FROM 	tbl_dns 
										WHERE 	dns_helper2 		= '".$alias."'
												AND dns_control_id 	= '".$dns_No."'");	
			if ($query->num_rows() > 0)
			{
				$tripData = array();
				foreach ($query->result() as $row)
				{
					$tripData['t_eid'] 					= $eid;
					$tripData['t_num'] 					= ($row->TRIP_NUM + $row_num);
					$tripData['t_date'] 				= $row->TRIP_DATE;
					$tripData['t_designation'] 			= 'HELPER 2';
					$tripData['t_pickup'] 				= $row->PICKUP_POINT;
					$tripData['t_delivery'] 			= $row->DELIVERY_POINT;
					$tripData['t_rate'] 				= $row->TRIP_RATE;
					$tripData['t_additionalbudget'] 	= $row->VALE;
					$tripData['t_vale'] 				= $row->VALE;
					$tripData['t_abono'] 				= 0;
					$tripData['t_platenum'] 			= $row->PLATE_NUM;
					$tripData['t_dns_ctrlID'] 			= $row->DNS_CONTROL_ID;
					$tripData['t_status'] 				= 'PENDING';
						
					$q1 = $this->db->query("SELECT IF( EXISTS( SELECT * FROM tbl_trip WHERE t_num = '".$tripData['t_num']."' AND t_dns_ctrlID =  '".$tripData['t_dns_ctrlID']."'  AND t_eid = ".$eid." AND t_pickup = '".$tripData['t_pickup']."'AND t_delivery = '".$tripData['t_delivery']."' AND t_date = '".$tripData['t_date']."' AND t_rate = '".$tripData['t_rate']."' AND t_additionalbudget = '".$tripData['t_additionalbudget']."' AND t_vale = '".$tripData['t_vale']."' AND t_abono = '".$tripData['t_abono']."' AND t_platenum = '".$tripData['t_platenum']."'), 1, 0) AS 'EXIST'");
					if ($q1->num_rows() > 0)
					{
						foreach ($q1->result() as $row)
						{
							$exist = $row->EXIST;
						}
						if ($exist == 0)
						{
							$this->db->insert('tbl_trip', $tripData);
						}
					}
				}
				$row_num = $tripData['t_num'];
			}
			// else 
			// {
				// return false;
			// }
			//Q3 - HELPER 3
			$query = $this->db->query("SELECT 	ROW_NUMBER() OVER (ORDER BY dns_pickupdate)       	AS 'TRIP_NUM',
												dns_pickupdate 								      	AS 'TRIP_DATE',
												dns_pickuppoint								      	AS 'PICKUP_POINT',
												dns_delivery								      	AS 'DELIVERY_POINT',
												IF(dns_ehrate = 'NO RATE', 0, dns_ehrate) 		  	AS 'TRIP_RATE',
												dns_totalbudget  								  	AS 'ADDITIONAL_BUDGET',
												dns_helper3vale									  	AS 'VALE',
												dns_platenum									  	AS 'PLATE_NUM',
												dns_control_id									  	AS 'DNS_CONTROL_ID'
										FROM 	tbl_dns 
										WHERE 	dns_extrahelper		= '".$alias."'
												AND dns_control_id 	= '".$dns_No."'");	
			if ($query->num_rows() > 0)
			{
				$tripData = array();
				foreach ($query->result() as $row)
				{
					$tripData['t_eid'] 					= $eid;
					$tripData['t_num'] 					= ($row_num + 1);
					$tripData['t_date'] 				= $row->TRIP_DATE;
					$tripData['t_designation'] 			= 'EXTRA HELPER';
					$tripData['t_pickup'] 				= $row->PICKUP_POINT;
					$tripData['t_delivery'] 			= $row->DELIVERY_POINT;
					$tripData['t_rate'] 				= $row->TRIP_RATE;
					$tripData['t_additionalbudget'] 	= $row->VALE;
					$tripData['t_vale'] 				= $row->VALE;
					$tripData['t_abono'] 				= 0;
					$tripData['t_platenum'] 			= $row->PLATE_NUM;
					$tripData['t_dns_ctrlID'] 			= $row->DNS_CONTROL_ID;
					$tripData['t_status'] 				= 'PENDING';
					
					$row_num = $row->TRIP_NUM;
					
					$q1 = $this->db->query("SELECT IF( EXISTS( SELECT * FROM tbl_trip WHERE t_num = '".$tripData['t_num']."' AND t_dns_ctrlID =  '".$tripData['t_dns_ctrlID']."'  AND t_eid = ".$eid." AND t_pickup = '".$tripData['t_pickup']."'AND t_delivery = '".$tripData['t_delivery']."' AND t_date = '".$tripData['t_date']."' AND t_rate = '".$tripData['t_rate']."' AND t_additionalbudget = '".$tripData['t_additionalbudget']."' AND t_vale = '".$tripData['t_vale']."' AND t_abono = '".$tripData['t_abono']."' AND t_platenum = '".$tripData['t_platenum']."'), 1, 0) AS 'EXIST'");
					if ($q1->num_rows() > 0)
					{
						foreach ($q1->result() as $row)
						{
							$exist = $row->EXIST;
						}
						if ($exist == 0)
						{
							$this->db->insert('tbl_trip', $tripData);
						}
					}
				}
			}
			// else 
			// {
				// return false;
			// }
		}						
        // LOAD TRIP TABLE
		$q2 = $this->db->query("SELECT 	t_num 				AS 	'TRIP_NUM',
										t_date 				AS 	'TRIP_DATE',
										t_designation 		AS 	'DESIGNATION',
										t_pickup			AS 	'PICKUP_POINT',
										t_delivery			AS 	'DELIVERY_POINT',
										t_platenum			AS	'PLATE_NUM',
										t_rate 				AS 	'TRIP_RATE',
										t_additionalbudget  AS 	'ADDITIONAL_BUDGET'
								FROM tbl_trip WHERE t_eid =".$eid." AND t_status ='PENDING' AND t_dns_ctrlID = '".$dns_No."'");
		if ($q2->num_rows() > 0)
        {
			return $q2->result();
		}
		else 
        {
            return false;
        }
	}
	
	// SAVE TRIPS
	public function save_trip($data)
	{
		// COUNT TRIP 
		$eid = $data['eid'];
		$count;
		$query = $this->db->query("SELECT COUNT(t_num) AS 'TNUM' FROM tbl_trip WHERE t_eid = '".$eid."' AND t_status = 'ACTIVE';");    
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $count = $row->TNUM;
            }
			// SAVE TRIP DATA
			$record = array('t_eid' 				=> $data['eid'],
							't_num' 				=> $count + 1,
							't_trip'				=> $data['trip'],
							't_pickup'				=> $data['pickup'],
							't_destination'			=> $data['delivery'],
							't_date'				=> $data['date'],
							't_rate'				=> $data['rate'],
							't_additionalbudget'	=> $data['addbudget'],
							't_status'				=> 'ACTIVE');
			$this->db->insert('tbl_trip', $record);
        }
        else 
        {
            return false;
        }
	}
	
	// DNS DRIVER & HELPER
	public function load_payrollperiod($data)
	{
		$dns_No = $data['dns_No'];
		
		// GET DATE START
		$query = $this->db->query("SELECT MIN(dns_pickupdate) AS 'START_PERIOD' FROM tbl_dns WHERE dns_control_id = '".$dns_No."'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['START_PERIOD'] = $row->START_PERIOD;
            }
        }
        else 
        {
            return false;
        }
		
		// GET DATE END
		$query = $this->db->query("SELECT MAX(dns_pickupdate) AS 'END_PERIOD' FROM tbl_dns WHERE dns_control_id = '".$dns_No."'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['END_PERIOD'] = $row->END_PERIOD;
            }
        }
        else 
        {
            return false;
        }
		return $recieveData;
	}
	
	// DNS REGULAR
	public function load_payrollperiod_reg($data)
	{
		$dns_No = $data['dns_No_reg'];
		// DATE START
		$query = $this->db->query("SELECT MIN(dr_date) AS 'START_PERIOD' FROM tbl_dns_reg WHERE dr_control_id = '".$dns_No."'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['START_PERIOD'] = $row->START_PERIOD;
            }
        }
        else 
        {
            return false;
        }
		
		// DATE END
		$query = $this->db->query("SELECT MAX(dr_date) AS 'END_PERIOD' FROM tbl_dns_reg WHERE dr_control_id = '".$dns_No."'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['END_PERIOD'] = $row->END_PERIOD;
            }
        }
        else 
        {
            return false;
        }
		return $recieveData;
	}
	
	// TRIP COUNTER
	public function trip_counter($data)
	{
		$alias 	= $data['ALIAS'];
		$eid 	= $data['eid'];
		$dns_No = $data['dns_No'];
		
		// NUMBER OF TRIPS
		//$query = $this->db->query("SELECT COUNT(dns_pickupdate) AS 'TNUM' FROM tbl_dns WHERE dns_driver = '".$alias."'");    
        $query = $this->db->query("SELECT COUNT(t_eid) AS 'TNUM' FROM tbl_trip WHERE t_eid =".$eid." AND t_status = 'PENDING' AND t_dns_ctrlID = '".$dns_No."'");
		if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TNUM'] = $row->TNUM;
            }
        }
        else 
        {
            return false;
        }
		
		// TOTAL TRIP RATE
		//$query = $this->db->query("SELECT SUM(dns_driverrate) AS 'TRATE' FROM tbl_dns WHERE dns_driver = '".$alias."'");    
        $query = $this->db->query("SELECT SUM(t_rate) AS 'TRATE' FROM tbl_trip WHERE t_eid =".$eid." AND t_status = 'PENDING' AND t_dns_ctrlID = '".$dns_No."'");
		if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TRATE'] = $row->TRATE;
            }
        }
        else 
        {
            return false;
        }
		
		// TOTAL ADDITIONAL BUDGET
		//$query = $this->db->query("SELECT SUM(dns_totalbudget) AS 'TADDBGT' FROM tbl_dns WHERE dns_driver = '".$alias."'");    
        $query = $this->db->query("SELECT SUM(t_additionalbudget) AS 'TADDBGT' FROM tbl_trip WHERE t_eid =".$eid." AND t_status = 'PENDING' AND t_dns_ctrlID = '".$dns_No."'");    
		if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TADDBGT'] = $row->TADDBGT;
            }
        }
        else 
        {
            return false;
        }
		
		return $recieveData;
	}
	
	// LOAD DAILY WAGE
	public function payroll_daily_wages($data)
	{
		$alias 			= $data['ALIAS'];
		$designation 	= $data['DESIGNATION'];
		$eid 			= $data['eid'];
		$dns_No 		= $data['dns_No_reg'];
		
		$query = $this->db->query("	SELECT 	dr_date 	AS 'WAGE_DATE',
											dr_day 		AS 'WAGE_DAY',
											dr_rate 	AS 'WAGE_RATE',
											dr_ecola 	AS 'ECOLA',
											dr_ot 		AS 'OT',
											dr_ndp 		AS 'NDP',
											dr_hp 		AS 'HP',
											dr_late 	AS 'LATE',
											dr_gsalary 	AS 'GSALARY'
									FROM tbl_dns_reg
									WHERE dr_name = '".$alias."' AND dr_control_id = '".$dns_No."';");    
        if ($query->num_rows() > 0)
        {
            $wageData = array();
			foreach ($query->result() as $row)
			{
				$wageData['r_eid'] 			= $eid;
				$wageData['r_date']			= $row->WAGE_DATE;
				$wageData['r_day'] 			= $row->WAGE_DAY;
				$wageData['r_rate'] 		= $row->WAGE_RATE;
				$wageData['r_ecola'] 		= $row->ECOLA;
				$wageData['r_ot'] 			= $row->OT;
				$wageData['r_ndp'] 			= $row->NDP;
				$wageData['r_hp'] 			= $row->HP;
				$wageData['r_late'] 		= $row->LATE;
				$wageData['r_gsalary'] 		= $row->GSALARY;
				$wageData['r_status']		= 'PENDING';
				$wageData['r_dns_ctrlID'] 	= $dns_No;
				
				$q1 = $this->db->query("SELECT 
										IF( EXISTS( 
											SELECT * 
											FROM tbl_regular 
											WHERE 	r_eid 		= ".$eid." 
												AND r_date 		= '".$wageData['r_date']."'  
												AND r_day 		= '".$wageData['r_day']."' 
												AND r_rate 		= '".$wageData['r_rate']."'
												AND r_ecola 	= '".$wageData['r_ecola']."' 
												AND r_ot 		= '".$wageData['r_ot']."' 
												AND r_ndp 		= '".$wageData['r_ndp']."' 
												AND r_hp 		= '".$wageData['r_hp']."' 
												AND r_late 		= '".$wageData['r_late']."' 
												AND r_gsalary 	= '".$wageData['r_gsalary']."'), 1, 0) 
										AS 'EXIST'");
				if ($q1->num_rows() > 0)
				{
					foreach ($q1->result() as $row)
					{
						$exist = $row->EXIST;
					}
					if ($exist == 0)
					{
						$this->db->insert('tbl_regular', $wageData);
					}
				}
				//$this->db->insert('tbl_trip', $tripData);
			}
        }
        else 
        {
            return false;
        }
		
		$q2 = $this->db->query("SELECT 	r_date 				AS 	'DATE',
										r_day 				AS 	'DAY',
										r_rate				AS 	'RATE'
								FROM tbl_regular WHERE r_eid =".$eid." AND r_status ='PENDING' AND r_dns_ctrlID = '".$dns_No."'");
		if ($q2->num_rows() > 0)
        {
			return $q2->result();
		}
		else 
        {
            return false;
        }
	}
	
	// SAVE DAILY WAGE
	public function save_wage($data)
	{
		$record = array('r_eid' 	=> $data['eid'],
						'r_date' 	=> $data['r_date'],
						'r_day'		=> $data['r_day'],
						'r_rate'	=> $data['r_rate'],
						'r_status'	=> 'ACTIVE');
		$this->db->insert('tbl_regular', $record);
		return true;
	}
	
	// GET TOTAL RATE - REGULAR EMPLOYEE
	public function get_totalrate($data)
	{
		$eid = $data['eid'];
		$query = $this->db->query("	SELECT SUM(r_rate) AS 'TRATE' 
									FROM tbl_regular 
									WHERE r_eid =".$eid." AND r_status = 'ACTIVE'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TRATE'] = $row->TRATE;
				return $recieveData;
            }
        }
        else 
        {
            return false;
        }
	}
	
	// GET TOTAL RATE - REGULAR EMPLOYEE
	public function get_totalwagepay($data)
	{
		$eid 			= $data['eid'];
		$dns_No 		= $data['dns_No_reg'];
		
		// TOTAL RATE
		$query = $this->db->query("	SELECT SUM(r_rate) AS 'TRATE' 
									FROM tbl_regular 
									WHERE r_eid =".$eid." AND r_dns_ctrlID = '".$dns_No."' AND r_status = 'PENDING'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TRATE'] = $row->TRATE;
            }
        }
        else 
        {
            return false;
        }
		
		// TOTAL ECOLA
		$query = $this->db->query("	SELECT SUM(r_ecola) AS 'TECOLA' 
									FROM tbl_regular 
									WHERE r_eid =".$eid." AND r_dns_ctrlID = '".$dns_No."' AND r_status = 'PENDING'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TECOLA'] = $row->TECOLA;
            }
        }
        else 
        {
            return false;
        }
		
		// TOTAL OT
		$query = $this->db->query("	SELECT SUM(r_ot) AS 'TOT' 
									FROM tbl_regular 
									WHERE r_eid =".$eid." AND r_dns_ctrlID = '".$dns_No."' AND r_status = 'PENDING'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TOT'] = $row->TOT;
            }
        }
        else 
        {
            return false;
        }
		
		// TOTAL NDP
		$query = $this->db->query("	SELECT SUM(r_ndp) AS 'TNDP' 
									FROM tbl_regular 
									WHERE r_eid =".$eid." AND r_dns_ctrlID = '".$dns_No."' AND r_status = 'PENDING'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TNDP'] = $row->TNDP;
            }
        }
        else 
        {
            return false;
        }
		
		// TOTAL HP
		$query = $this->db->query("	SELECT SUM(r_hp) AS 'THP' 
									FROM tbl_regular 
									WHERE r_eid =".$eid." AND r_dns_ctrlID = '".$dns_No."' AND r_status = 'PENDING'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['THP'] = $row->THP;
            }
        }
        else 
        {
            return false;
        }
		
		// TOTAL LATE
		$query = $this->db->query("	SELECT SUM(r_late) AS 'TLATE' 
									FROM tbl_regular 
									WHERE r_eid =".$eid." AND r_dns_ctrlID = '".$dns_No."' AND r_status = 'PENDING'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TLATE'] = $row->TLATE;
            }
        }
        else 
        {
            return false;
        }
		
		// TOTAL GSALARY
		$query = $this->db->query("	SELECT SUM(r_gsalary) AS 'TGSALARY' 
									FROM tbl_regular 
									WHERE r_eid =".$eid." AND r_dns_ctrlID = '".$dns_No."' AND r_status = 'PENDING'");    
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['TGSALARY'] = $row->TGSALARY;
            }
        }
        else 
        {
            return false;
        }
		
		return $recieveData;
	}
	
	// LOAD TRIP MASTER - MASTER LIST
	public function load_trip_mstr()
	{
		$query = $this->db->query("SELECT 	 tm_id 			AS 'TID', 
											 tm_pickup 		AS 'PICKUP', 
											 tm_delivery 	AS 'DELIVERY', 
											 tm_drate 		AS 'DRATE', 
											 tm_hrate 		AS 'HRATE', 
											 tm_duo 		AS 'DUO'
									FROM 	 tbl_trip_mstr 
									ORDER BY tm_id DESC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// SAVE NEW TRIP DATA - TRIP MASTER
	public function save_trip_data($data)
	{		
		$record = array('tm_pickup' 	=> $data['pickup'],
						'tm_delivery' 	=> $data['delivery'],
						'tm_drate'		=> $data['drate'],
						'tm_hrate'		=> $data['hrate'],
						'tm_duo'		=> $data['duo']);
        $this->db->insert('tbl_trip_mstr', $record);
		return true;
	}
	
	// LOAD SELECTED TRIP DATA
	public function load_trip_data($data)
	{
		$recieveData = array();
		$tm_id = $data['tm_id'];
		$query = $this->db->query("SELECT 	tm_id 		AS 'TMID', 
											tm_pickup	AS 'PICKUP',
											tm_delivery AS 'DELIVERY', 
											tm_drate 	AS 'DRATE', 
											tm_hrate 	AS 'HRATE', 
											tm_duo 		AS 'DUO'
									FROM 	tbl_trip_mstr 
									WHERE	tm_id = ".$tm_id ."
									ORDER BY tm_id DESC;");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['TMID'] 		= $row->TMID;
				$recieveData['PICKUP'] 		= $row->PICKUP;
                $recieveData['DELIVERY'] 	= $row->DELIVERY;
                $recieveData['DRATE'] 		= $row->DRATE;
                $recieveData['HRATE'] 		= $row->HRATE;
				$recieveData['DUO'] 		= $row->DUO;
            }
            return $recieveData;
        }
        else 
        {
            return false;
        }
	}
	
	// UPDATE EMPLOYEE INFO
	public function update_trip_data($data)
	{		
		$tmid   = $data['tmid'];
		$record = array('tm_pickup' 	=> $data['pickup'],
						'tm_delivery' 	=> $data['delivery'],
						'tm_drate'		=> $data['drate'],
						'tm_hrate'		=> $data['hrate'],
						'tm_duo'		=> $data['duo']);
        $this->db->where('tm_id', $tmid);
		$this->db->update('tbl_trip_mstr', $record);
		return true;
	}
	
	// SEARCH EMPLOYEE INFO
	public function search_tripdata($data)
	{	
		$search_key = $data['search_key'];
		$query = $this->db->query("SELECT 	tm_id 		AS 'TID', 
											tm_pickup	AS 'PICKUP',
											tm_delivery AS 'DELIVERY', 
											tm_drate 	AS 'DRATE', 
											tm_hrate 	AS 'HRATE', 
											tm_duo 		AS 'DUO'
									FROM 	tbl_trip_mstr 
									WHERE	tm_pickup LIKE '%".$search_key ."%' OR tm_delivery LIKE '%".$search_key ."%'
									ORDER BY tm_id DESC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD PICKUP POINTS
	public function load_pickup()
	{
		$query = $this->db->query("SELECT 	DISTINCT(tm_pickup) AS 'PICKUP'
									FROM 	 tbl_trip_mstr 
									ORDER BY tm_id ASC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD DELIVERY POINTS
	public function load_delivery()
	{
		$query = $this->db->query("SELECT 	DISTINCT(tm_delivery) AS 'DELIVERY'
									FROM 	 tbl_trip_mstr 
									ORDER BY tm_id ASC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// GET TRIP RATE
	public function get_triprate($data)
	{	
		$pickup 	= $data['pickup'];
		$delivery 	= $data['delivery'];
		$jobtype 	= $data['jobtype'];
		
		if ($jobtype == 'Driver')
		{
			$query = $this->db->query("SELECT 	tm_drate 	AS 'RATE'
									FROM 	tbl_trip_mstr 
									WHERE	tm_pickup = '".$pickup ."' AND tm_delivery = '".$delivery ."'
									ORDER BY tm_drate DESC;");  
		}
		else
		{
			$query = $this->db->query("SELECT 	tm_hrate 	AS 'RATE'
									FROM 	tbl_trip_mstr 
									WHERE	tm_pickup = '".$pickup ."' AND tm_delivery = '".$delivery ."'
									ORDER BY tm_hrate DESC;"); 
		}
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['RATE'] = $row->RATE;
            }
            return $recieveData;
        }
        else 
        {
            return false;
        }
	}
	
	// GET VALE
	public function get_vale($data)
	{
		$eid = $data['eid'];
		//$designation = $data['DESIGNATION'];
		$dns_No = $data['dns_No'];

		$query = $this->db->query("SELECT SUM(t_vale) AS 'VALE', SUM(t_abono) AS 'ABONO' FROM tbl_trip WHERE t_eid = ".$eid." AND t_dns_ctrlID = '".$dns_No."' AND t_status = 'PENDING';");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['VALE'] = $row->VALE;
				$recieveData['ABONO'] = $row->ABONO;
            }
			return $recieveData;
        }
        else 
        {
           return false;
        }
	}
	
}