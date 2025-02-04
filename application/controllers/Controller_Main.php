<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Main extends CI_Controller 
{
    // Load Session Library
	public function __construct() {
		parent::__construct();
	}
	
    // Load Main Page
	public function index()
	{
		$view = $this->session->userdata('is_logged') ? 'pages/main.html' : 'pages/login.html';
		$this->load->view($view);
	}

    // Login Authentication
    public function auth_login()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $user = $this->Model_Main->auth_login($data);
        
        $response = ['success' => false, 'message' => 'Invalid username or password'];
        
        if ($user) {
            $this->session->set_userdata([
                'id' => $user[0]->id,
                'username' => $user[0]->username,
                'usertype' => $user[0]->usertype,
                'is_logged' => 1
            ]);
            $response['success'] = true;
            unset($response['message']);
        }
        
        echo json_encode($response);
    }

    // Logout
    public function logout()
    {
        $this->session->sess_destroy();
        $response = ['success' => true];
        echo json_encode($response);
    }

    public function load_page($page)
    {
        if ($this->session->userdata('is_logged')) {
            $response = $this->load->view("modules/" . $page . ".html", "", true);
            echo $response;
        } else {
            redirect('login');
        }
    }
	
}

