 <?php
 
class Payslip_model extends CI_Model
{	
	// LOAD PAYROLL RECORD
	public function ps_load_payroll_record($data)
	{	
		$code = $data['p_code'];
		$query = $this->db->query("SELECT 	*
									FROM 	tbl_payroll 
									WHERE	p_code = '".$code."'");  
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['PCODE'] 		= $row->p_code;
				$recieveData['STARTDATE'] 	= $row->p_startdate;
                $recieveData['ENDDATE'] 	= $row->p_enddate;
                $recieveData['RANGE'] 		= $row->p_payrollrange;
                $recieveData['TRIPS'] 		= $row->p_trips;
				$recieveData['TTRATE'] 		= $row->p_ttriprate;
				$recieveData['TADDBGT'] 	= $row->p_taddbudget;
				$recieveData['TGSALARY'] 	= $row->p_tgsalary;
				$recieveData['TDEDUCTION'] 	= $row->p_tdeduction;
				$recieveData['NETPAY'] 		= $row->p_netpay;
            }
			return $recieveData;
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD TRIP RECORD
	public function ps_load_trip_record($data)
	{
		$p_code 	= $data['p_code'];
		$query = $this->db->query("SELECT 	t_num       			AS 'TRIP_NUM',
											t_date 					AS 'TRIP_DATE',
											t_pickup				AS 'PICKUP_POINT',
											t_delivery				AS 'DELIVERY_POINT',
											t_platenum 				AS 'PLATE_NUM',
											t_rate 					AS 'TRIP_RATE',
											t_additionalbudget  	AS 'ADDITIONAL_BUDGET',
											t_dns_ctrlID			AS 'DNS_CONTROL_ID'
									FROM tbl_trip WHERE t_payrollcode = '".$p_code."'");
		if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD WAGE RECORD
	public function ps_load_wage_record($data)
	{	
		$code = $data['p_code'];
		$query = $this->db->query("SELECT 	*
									FROM 	tbl_regular 
									WHERE	r_payrollcode = '".$code."';");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// LOAD DEDUCTION RECORD
	public function ps_load_deduction_record($data)
	{	
		$code = $data['p_code'];
		$query = $this->db->query("SELECT 	*
									FROM 	tbl_deduction 
									WHERE	d_code = '".$code."';");  
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $recieveData['ADVBUDGET'] 		= $row->d_advbudget;
				$recieveData['SSSCONTRIBUTION'] = $row->d_ssscontribution;
                $recieveData['SSSLOAN'] 		= $row->d_sssloan;
				$recieveData['PHILHEALTH'] 		= $row->d_philhealth;
				$recieveData['PAGIBIG'] 		= $row->d_pagibig;
                $recieveData['PAGIBIGLOAN'] 	= $row->d_pagibigloan;
				$recieveData['VALECOOR'] 		= $row->d_valecoor;
				$recieveData['VALEGCASH'] 		= $row->d_valegcash;
				$recieveData['VALE'] 			= $row->d_vale;
				$recieveData['ABONO'] 			= $row->d_abono;
                $recieveData['LOAN'] 			= $row->d_loan;
				$recieveData['UNIFORM'] 		= $row->d_uniform;
				$recieveData['DEDUCTION'] 		= $row->d_deduction;
                $recieveData['CONTRIBUTION'] 	= $row->d_contribution;
				$recieveData['TDEDUCTION'] 		= $row->d_tdeduction;
            }
			return $recieveData;
        }
        else 
        {
            return false;
        }
	}
	
	// GET TOTAL RATE - REGULAR EMPLOYEE
	public function get_totalwagepay($data)
	{
		$code = $data['p_code'];
		
		// TOTAL RATE
		$query = $this->db->query("	SELECT SUM(r_rate) AS 'TRATE' 
									FROM tbl_regular 
									WHERE r_payrollcode = '".$code."'");    
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
									WHERE r_payrollcode = '".$code."'");    
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
									WHERE r_payrollcode = '".$code."'");    
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
									WHERE r_payrollcode = '".$code."'");    
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
									WHERE r_payrollcode = '".$code."'");    
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
									WHERE r_payrollcode = '".$code."'");    
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
									WHERE r_payrollcode = '".$code."'");    
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
}

