<?php
class Model_Employees extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // Get Employees
    public function get_all_employees() {
        $query = $this->db->select('e_id, e_num, e_lastname, e_firstname, e_middlename, e_fullname, 
                                  e_alias, e_birthdate, e_gender, e_civilstatus, e_address, e_tin, 
                                  e_sss, e_philhealth, e_pagibig, e_designation, e_employmentdate, 
                                  e_type, e_status')
                         ->from('tbl_employee')
                         ->where('e_status', "Active")
                         ->order_by('e_lastname', 'ASC')
                         ->get();
        
        return $query->result();
    }

    public function get_employee_image($employee_id) {
        return $this->db->select('img_employee')
                       ->from('tbl_image')
                       ->where('img_eid', $employee_id)
                       ->get()
                       ->row();
    }

    public function update_employee($employee_data, $image_data) {
        $this->db->trans_start();
        
        // Prepare employee data (remove any fields that shouldn't be in tbl_employee)
        $employee_update_data = array(
            'e_num' => $employee_data['e_num'],
            'e_lastname' => $employee_data['e_lastname'],
            'e_firstname' => $employee_data['e_firstname'],
            'e_middlename' => $employee_data['e_middlename'],
            'e_fullname' => $employee_data['e_fullname'],
            'e_alias' => $employee_data['e_alias'],
            'e_birthdate' => $employee_data['e_birthdate'],
            'e_gender' => $employee_data['e_gender'],
            'e_civilstatus' => $employee_data['e_civilstatus'],
            'e_address' => $employee_data['e_address'],
            'e_tin' => $employee_data['e_tin'],
            'e_sss' => $employee_data['e_sss'],
            'e_philhealth' => $employee_data['e_philhealth'],
            'e_pagibig' => $employee_data['e_pagibig'],
            'e_designation' => $employee_data['e_designation'],
            'e_employmentdate' => $employee_data['e_employmentdate'],
            'e_type' => $employee_data['e_type'],
            'e_status' => $employee_data['e_status']
        );

        // Update employee data
        $this->db->where('e_id', $employee_data['e_id'])
                 ->update('tbl_employee', $employee_update_data);
        
        // Handle image update if image data is provided
        if ($image_data && isset($image_data['img_employee'])) {
            // Check if image record exists
            $exists = $this->db->where('img_eid', $employee_data['e_id'])
                              ->count_all_results('tbl_image') > 0;
            
            if ($exists) {
                // Update existing image
                $this->db->where('img_eid', $employee_data['e_id'])
                         ->update('tbl_image', array(
                             'img_employee' => $image_data['img_employee']
                         ));
            } else {
                // Insert new image
                $this->db->insert('tbl_image', array(
                    'img_eid' => $employee_data['e_id'],
                    'img_employee' => $image_data['img_employee']
                ));
            }
        }
        
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    public function add_employee($data) {
        try {
            // Prepare employee data
            $employee_data = [
                'e_num' => $data['e_num'],
                'e_lastname' => $data['e_lastname'],
                'e_firstname' => $data['e_firstname'],
                'e_middlename' => $data['e_middlename'],
                'e_fullname' => $data['e_fullname'],
                'e_alias' => $data['e_alias'],
                'e_birthdate' => $data['e_birthdate'],
                'e_gender' => $data['e_gender'],
                'e_civilstatus' => $data['e_civilstatus'],
                'e_address' => $data['e_address'],
                'e_tin' => $data['e_tin'],
                'e_sss' => $data['e_sss'],
                'e_philhealth' => $data['e_philhealth'],
                'e_pagibig' => $data['e_pagibig'],
                'e_designation' => $data['e_designation'],
                'e_employmentdate' => $data['e_employmentdate'],
                'e_type' => $data['e_type'],
                'e_status' => $data['e_status']
            ];
            
            // Debug log
            log_message('debug', 'Inserting Employee Data: ' . print_r($employee_data, true));
            
            // Insert employee data
            $insert_result = $this->db->insert('tbl_employee', $employee_data);
            
            if (!$insert_result) {
                log_message('error', 'Insert Error: ' . print_r($this->db->error(), true));
                return false;
            }
            
            // Get the inserted ID
            $e_id = $this->db->insert_id();
            
            if (!$e_id) {
                log_message('error', 'No insert ID returned');
                return false;
            }
            
            // Return the employee data with the new ID
            return array_merge(['e_id' => $e_id], $employee_data);
            
        } catch (Exception $e) {
            log_message('error', 'Add Employee Model Error: ' . $e->getMessage());
            return false;
        }
    }

    public function get_latest_id() {
        $this->db->select_max('e_id');
        $query = $this->db->get('tbl_employee');
        $result = $query->row();
        return $result->e_id ?? 0;
    }

    public function save_employee_image($employee_id, $image_data) {
        try {
            // Prepare image data
            $image_data = [
                'img_eid' => $employee_id,
                'img_employee' => $image_data  // No need to decode as it's longtext
            ];
            
            // Check if image already exists
            $this->db->where('img_eid', $employee_id);
            $exists = $this->db->get('tbl_image')->num_rows() > 0;
            
            if ($exists) {
                // Update existing image
                $this->db->where('img_eid', $employee_id);
                return $this->db->update('tbl_image', $image_data);
            } else {
                // Insert new image
                return $this->db->insert('tbl_image', $image_data);
            }
        } catch (Exception $e) {
            log_message('error', 'Save Employee Image Error: ' . $e->getMessage());
            return false;
        }
    }
}
?>