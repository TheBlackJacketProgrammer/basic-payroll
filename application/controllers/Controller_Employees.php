<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Employees extends CI_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // Get Employees
    public function get_employees()
    {
        if (!$this->session->userdata('is_logged')) {
            echo json_encode(['success' => false, 'message' => 'Not authorized']);
            return;
        }

        $employees = $this->Model_Employees->get_all_employees();
        
        echo json_encode([
            'success' => true,
            'employees' => $employees
        ]);
    }

    public function get_employee_image($employee_id) {
        if (!$this->session->userdata('is_logged')) {
            echo json_encode(['success' => false, 'message' => 'Not authorized']);
            return;
        }

        $image = $this->Model_Employees->get_employee_image($employee_id);
        
        echo json_encode([
            'success' => true,
            'image' => $image ? $image->img_employee : null
        ]);
    }

    public function update_employee() {
        if (!$this->session->userdata('is_logged')) {
            echo json_encode(['success' => false, 'message' => 'Not authorized']);
            return;
        }

        $post_data = json_decode(file_get_contents('php://input'), true);
        $employee_data = $post_data['employee'];
        $image_data = $post_data['image'];

        $result = $this->Model_Employees->update_employee($employee_data, $image_data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? 'Employee updated successfully' : 'Failed to update employee'
        ]);
    }

    public function get_latest_id() {
        // $this->load->model('model_employees');
        $latest_id = $this->Model_Employees->get_latest_id();
        
        echo json_encode([
            'success' => true,
            'latest_id' => $latest_id
        ]);
    }

    public function add_employee() {
        $this->load->model('model_employees');
        
        // Get POST data and decode it properly
        $post_data = json_decode(file_get_contents('php://input'), true);
        $employee_data = $post_data['employee'];
        $image_data = $post_data['image'] ?? null;
        
        // Start transaction
        $this->db->trans_start();
        
        try {
            // Debug log
            log_message('debug', 'Employee Data: ' . print_r($employee_data, true));
            
            // Format dates properly
            if (!empty($employee_data['e_birthdate'])) {
                $employee_data['e_birthdate'] = date('Y-m-d', strtotime($employee_data['e_birthdate']));
            }
            if (!empty($employee_data['e_employmentdate'])) {
                $employee_data['e_employmentdate'] = date('Y-m-d', strtotime($employee_data['e_employmentdate']));
            }
            
            // Add employee
            $result = $this->model_employees->add_employee($employee_data);
            
            if (!$result) {
                throw new Exception('Failed to insert employee record');
            }
            
            // If image data exists, save it
            if (!empty($image_data['img_employee'])) {
                $this->model_employees->save_employee_image($result['e_id'], $image_data['img_employee']);
            }
            
            // Complete transaction
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Transaction failed');
            }
            
            echo json_encode([
                'success' => true,
                'message' => 'Employee added successfully',
                'employee_id' => $result['e_id'],
                'debug_data' => $result  // Temporary debug data
            ]);
            
        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', 'Add Employee Error: ' . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Error adding employee: ' . $e->getMessage(),
                'debug_data' => $this->db->error() // Temporary debug data
            ]);
        }
    }
}
?>