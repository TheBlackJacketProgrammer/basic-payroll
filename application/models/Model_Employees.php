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

    public function add_employee($employee_data, $image_data) {
        $this->db->trans_start();
        
        // Prepare employee data
        $employee_insert_data = array(
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
        
        // Insert employee data
        $this->db->insert('tbl_employee', $employee_insert_data);
        $employee_id = $this->db->insert_id();
        
        // Insert image if provided
        if ($image_data && !empty($image_data['img_employee'])) {
            $this->db->insert('tbl_image', array(
                'img_eid' => $employee_id,
                'img_employee' => $image_data['img_employee']
            ));
        }
        
        $this->db->trans_complete();
        
        return $this->db->trans_status() ? $employee_id : false;
    }
}
?>