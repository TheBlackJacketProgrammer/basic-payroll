 <?php
 
class Dns_model extends CI_Model
{	
	// IMPORT DNS DATA INTO DATABASE
	public function import_dh($data)
	{	
		$this->db->insert_batch('tbl_dns', $data);
		// $recieveData['success'] = true;
        // return $recieveData;
	}
	
	// IMPORT DNS DATA INTO DATABASE
	public function import_reg($data)
	{	
		$this->db->insert_batch('tbl_dns_reg', $data);
		// $recieveData['success'] = true;
        // return $recieveData;
	}
	
	// LOAD SAVED DNS RECORD
	public function load_dns_dh($data)
	{	
		$dns_No = $data;
		$query = $this->db->query("SELECT * FROM tbl_dns WHERE dns_control_id = '".$dns_No."' ORDER BY dns_id ASC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
		// LOAD SAVED DNS RECORD
	public function load_dns_reg($data)
	{	
		$dns_No = $data;
		$query = $this->db->query("SELECT * FROM tbl_dns_reg WHERE dr_control_id = '".$dns_No."' ORDER BY dr_id ASC;");  
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
	}
	
	// GET NEW CONTROL NUM
	public function get_new_ctrlNo_dh()
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT(dns_control_id))+1 AS 'CTRL_NO' FROM tbl_dns;");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['CTRL_NO'] = $row->CTRL_NO;
            }
			return $recieveData;
        }
        else 
        {
           return false;
        }
	}
	
	// GET NEW CONTROL NUM
	public function get_new_ctrlNo_reg()
	{
		$query = $this->db->query("SELECT COUNT(DISTINCT(dr_control_id))+1 AS 'CTRL_NO' FROM tbl_dns_reg;");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['CTRL_NO'] = $row->CTRL_NO;
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
		$driver = $data['ALIAS'];
		$dns_No = $data['dns_No'];
		$query = $this->db->query("SELECT SUM(dns_vale) AS 'VALE' FROM tbl_dns WHERE dns_driver = '".$driver."' AND dns_control_id = '".$dns_No."';");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['VALE'] = $row->VALE;
            }
			return $recieveData;
        }
        else 
        {
           return false;
        }
	}
	
	public function load_dnsnum()
	{
		$query = $this->db->query("SELECT MAX(dns_control_id) AS 'CURR_DNSNUM' FROM tbl_dns;");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['CURR_DNSNUM'] = $row->CURR_DNSNUM;
            }
			return $recieveData;
        }
        else 
        {
           return false;
        }
	}
	
	public function load_dnsnum_reg()
	{
		$query = $this->db->query("SELECT MAX(dr_control_id) AS 'CURR_DNSNUM_REG' FROM tbl_dns_reg;");  
        if ($query->num_rows() > 0)
        {
			foreach ($query->result() as $row)
            {
                $recieveData['CURR_DNSNUM_REG'] = $row->CURR_DNSNUM_REG;
            }
			return $recieveData;
        }
        else 
        {
           return false;
        }
	}
}