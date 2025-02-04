<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct()
	{
	   parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('pages/login_page');
	}
	
	public function user_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($username == 'admin' && $password == '-')
		{
			$result['success'] = true;
		}
		else
		{
			$result['success'] = false;
		}
		echo json_encode($result);
	}
}
