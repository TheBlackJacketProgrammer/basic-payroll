<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trip extends CI_Controller 
{
	// LOAD TRIP MASTER
	public function open_trip_manager()
	{
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_trip_mstr();
		$data['records'] = $row;
		
		$html  = $this->load->view('pages/trip_mstr_page',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	// LOAD TRIP MASTER MODAL - ADD
	public function trip_add()
	{
		$html  = $this->load->view('pages/trip_mstr_modal','',TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	// SAVE NEW TRIP DATA
	public function trip_save()
	{
		$result = array();
		$row 	= array();
		$data 	= array('pickup' 	=> $this->input->post('pickup'),
						'delivery' 	=> $this->input->post('delivery'),
						'drate'		=> $this->input->post('drate'),
						'hrate'		=> $this->input->post('hrate'),
						'duo'		=> $this->input->post('duo'));
		$this->load->model('payroll_model');
		$this->payroll_model->save_trip_data($data);
		
		// RELOAD THE TRIP MASTER LIST
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_trip_mstr();
		$tm['records'] = $row;
		
		$html  = $this->load->view('pages/trip_mstr_page',$tm,TRUE);
		
		$result['html'] =	$html;
		$result['success'] = true;
		echo json_encode($result);
	}
	
	// LOAD TRIP DATA TO UPDATE MODAL
	public function load_trip_data()
	{
		$row 		  = array();
		$recieveData  = array();
		
		$data = array('tm_id' => $this->input->post('tm_id'));
		
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_trip_data($data);
		
		$result['TMID'] 		= $row['TMID'];	
		$result['PICKUP'] 		= $row['PICKUP'];			
        $result['DELIVERY'] 	= $row['DELIVERY'];
        $result['DRATE'] 		= $row['DRATE'];		
        $result['HRATE'] 		= $row['HRATE'];		
		$result['DUO'] 			= $row['DUO'];
 		
		// LOAD UPDATE MODAL
		$html  = $this->load->view('pages/trip_mstr_modal_updt',$result,TRUE);

		$result['html'] =	$html;
		echo json_encode($result);
	}
	
	// UPDATE TRIP DATA
	public function trip_update()
	{
		$result = array();
		$row = array();
		$data 	= array('pickup' 	=> $this->input->post('pickup'),
						'delivery' 	=> $this->input->post('delivery'),
						'drate'		=> $this->input->post('drate'),
						'hrate'		=> $this->input->post('hrate'),
						'duo'		=> $this->input->post('duo'),
						'tmid'		=> $this->input->post('tmid'));
		$this->load->model('payroll_model');
		$this->payroll_model->update_trip_data($data); // UPDATE EMPLOYEE DATA
		
		// RELOAD THE TRIP MASTER LIST
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->load_trip_mstr();
		$tm['records'] = $row;
		
		$html  = $this->load->view('pages/trip_mstr_page',$tm,TRUE);
		
		$result['html'] =	$html;
		$result['success'] = true;
		echo json_encode($result);	
	}
	
	// SEARCH TRIP DATA
	public function search_tripdata()
	{
		$data['search_key'] = $this->input->post('search');
		$row = array();
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->search_tripdata($data);
		$data['records'] = $row;
		
		$html  = $this->load->view('pages/trip_mstr_page',$data,TRUE);
		$result['html'] =	$html;
		echo json_encode($result);	
	}
	
	// GET TRIP RATE
	public function get_triprate()
	{
		$row = array();
		$data['pickup']   = $this->input->post('pickup');
		$data['delivery'] = $this->input->post('delivery');
		$data['jobtype']  = $this->input->post('jobtype');
		
		$this->load->model('payroll_model');
		$row  = $this->payroll_model->get_triprate($data);
		$result['RATE'] = $row['RATE'];
		
		echo json_encode($result);	
	}
}

