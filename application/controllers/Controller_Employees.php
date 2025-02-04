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
}
?>