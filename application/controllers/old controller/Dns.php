<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dns extends CI_Controller 
{
	function __construct()
	{
	   parent::__construct();
	}
	
	public function dns_dh()
	{
		$page  = $this->load->view('pages/dns_dh','',TRUE);
		$result['page'] =	$page;
		echo json_encode($result);
	}
	
	public function dns_reg()
	{
		$page  = $this->load->view('pages/dns_reg','',TRUE);
		$result['page'] =	$page;
		echo json_encode($result);
	}
		
	public function import_dh()
	{
		$this->load->model('dns_model');
		$row  = $this->dns_model->get_new_ctrlNo_dh();
		$dns_No = 'DNS-DH'.$row['CTRL_NO'];
		
		$this->load->library("excel");
		$object = new PHPExcel();
		
		$result['test'] = $_FILES["excel_file"]["name"];

		if(isset($_FILES["excel_file"]["name"]))
		{
			
			$path = $_FILES["excel_file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				$rownum= $worksheet->getHighestRow();
				for($row=2; $row<=$highestRow; $row++)
				{
					$pickupdate				= ($worksheet->getCellByColumnAndRow(0, $row)->getValue() <> '') ? date('m-d-Y', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCellByColumnAndRow(0, $row)->getValue())) : '';
					$platenum 				= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$type 					= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$driver 				= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$helper1 				= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$h1rate 				= $worksheet->getCellByColumnAndRow(5, $row)->getCalculatedValue();
					$helper2 				= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$h2rate 				= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$extrahelper 			= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$ehrate 				= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$client 				= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$triptype 				= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$pickuppoint 			= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$delivery 				= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$driverrate 			= $worksheet->getCellByColumnAndRow(14, $row)->getCalculatedValue();
					$budcash 				= $worksheet->getCellByColumnAndRow(15, $row)->getCalculatedValue();
					$gcash 					= $worksheet->getCellByColumnAndRow(16, $row)->getCalculatedValue();
					$mlhuillier 			= $worksheet->getCellByColumnAndRow(17, $row)->getCalculatedValue();
					$transactionfee 		= $worksheet->getCellByColumnAndRow(18, $row)->getCalculatedValue();
					$totalbudget 			= $worksheet->getCellByColumnAndRow(19, $row)->getCalculatedValue();
					$helpervale 			= $worksheet->getCellByColumnAndRow(20, $row)->getCalculatedValue();
					$helper2vale 			= $worksheet->getCellByColumnAndRow(21, $row)->getCalculatedValue();
					$helper3vale 			= $worksheet->getCellByColumnAndRow(22, $row)->getCalculatedValue();
					$meal 					= $worksheet->getCellByColumnAndRow(23, $row)->getCalculatedValue();
					$tfee 					= $worksheet->getCellByColumnAndRow(24, $row)->getCalculatedValue();
					$efee 					= $worksheet->getCellByColumnAndRow(25, $row)->getCalculatedValue();
					$pfee 					= $worksheet->getCellByColumnAndRow(26, $row)->getCalculatedValue();
					$ehelper_nonbilliable 	= $worksheet->getCellByColumnAndRow(27, $row)->getValue();
					$ehelper_billiable		= $worksheet->getCellByColumnAndRow(28, $row)->getValue();
					$huli 					= $worksheet->getCellByColumnAndRow(29, $row)->getValue();
					$returned 				= $worksheet->getCellByColumnAndRow(30, $row)->getValue();
					$vale 					= $worksheet->getCellByColumnAndRow(31, $row)->getValue();
					$abonodriver 			= $worksheet->getCellByColumnAndRow(32, $row)->getValue();
					$pod 					= $worksheet->getCellByColumnAndRow(33, $row)->getValue();
					$shipment_tripticket 	= $worksheet->getCellByColumnAndRow(34, $row)->getValue();
					$billing_remark 		= $worksheet->getCellByColumnAndRow(35, $row)->getValue();
					$data[] = array(
						'dns_pickupdate'			=>	$pickupdate,
						'dns_platenum'				=>	$platenum,
						'dns_type'					=>	$type,
						'dns_driver'				=>	$driver,
						'dns_helper1'				=>	$helper1,
						'dns_h1rate'				=>	$h1rate,
						'dns_helper2'				=>	$helper2,
						'dns_h2rate'				=>	empty($h2rate) ? 0 : $h2rate,
						'dns_extrahelper'			=>	empty($extrahelper) ? 'NONE' : $extrahelper,
						'dns_ehrate'				=>	empty($ehrate) ? 0 : $ehrate,
						'dns_client'				=>	$client,
						'dns_triptype'				=>	$triptype,
						'dns_pickuppoint'			=>	$pickuppoint,
						'dns_delivery'				=>	$delivery,
						'dns_driverrate'			=>	$driverrate,
						'dns_budcash'				=>	empty($budcash) ? 0 : $budcash,
						'dns_gcash'					=>	empty($gcash) ? 0 : $gcash,
						'dns_mlhuillier'			=>	empty($mlhuillier) ? 0 : $mlhuillier,
						'dns_transactionfee'		=>	empty($transactionfee) ? 0 : $transactionfee,
						'dns_totalbudget'			=>	$totalbudget,
						'dns_helpervale'			=>	empty($helpervale) ? 0 : $helpervale,
						'dns_helper2vale'			=>	empty($helper2vale) ? 0 : $helper2vale,
						'dns_helper3vale'			=>	empty($helper3vale) ? 0 : $helper3vale,
						'dns_meal'					=>	empty($meal) ? 0 : $meal,
						'dns_tfee'					=>	empty($tfee) ? 0 : $tfee,
						'dns_efee'					=>	empty($efee) ? 0 : $efee,
						'dns_pfee'					=>	empty($pfee) ? 0 : $pfee,
						'dns_ehelper_nonbillable'	=>	empty($ehelper_nonbilliable) ? 0 : $ehelper_nonbilliable,
						'dns_ehelper_billable'		=>	empty($ehelper_billiable) ? 0 : $ehelper_billiable,
						'dns_huli'					=>	empty($huli) ? 0 : $huli,
						'dns_returned'				=>	empty($returned) ? 0 : $returned,
						'dns_vale'					=>	abs($vale),
						'dns_abonodriver'			=>	empty($abonodriver) ? 0 : $abonodriver,
						'dns_pod'					=>	$pod,
						'dns_shipping_tripticket'	=>	$shipment_tripticket,
						'dns_billing_remarks'		=>	$billing_remark,
						'dns_datecreated'			=>	date('m-d-Y'),
						'dns_control_id'			=>	$dns_No
					);
				}
			}	
			
			$this->load->model('dns_model');
			$this->dns_model->import_dh($data); 		// SAVE EXCEL DATA TO DATABASE
			
			$row  = $this->dns_model->load_dns_dh($dns_No);  // LOAD SAVED DNS RECORD
			$dns['records'] = $row;
			$result['records'] = $row;
			
			$table  = $this->load->view('pages/dns_table_dh',$dns,TRUE);
			$result['html'] = $table;
			echo json_encode($result);	
		}	
	}
	
	public function import_reg()
	{
		$this->load->model('dns_model');
		$row  = $this->dns_model->get_new_ctrlNo_reg();
		$dns_No = 'DNS-REG'.$row['CTRL_NO'];
		
		$this->load->library("excel");
		$object = new PHPExcel();
		
		$result['test'] = $_FILES["excel_file"]["name"];

		if(isset($_FILES["excel_file"]["name"]))
		{
			
			$path = $_FILES["excel_file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
						
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				$rownum= $worksheet->getHighestRow();
				for($row=2; $row<=$highestRow; $row++)
				{
					$date			= ($worksheet->getCellByColumnAndRow(0, $row)->getValue() <> '') ? date('m-d-Y', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCellByColumnAndRow(0, $row)->getValue())) : '';
					$day 			= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$name 			= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$designation 	= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$rate 			= $worksheet->getCellByColumnAndRow(4, $row)->getCalculatedValue();
					$ecola 			= $worksheet->getCellByColumnAndRow(5, $row)->getCalculatedValue();
					$ot 			= $worksheet->getCellByColumnAndRow(6, $row)->getCalculatedValue();
					$ndp 			= $worksheet->getCellByColumnAndRow(7, $row)->getCalculatedValue();
					$hp 			= $worksheet->getCellByColumnAndRow(8, $row)->getCalculatedValue();
					$late 			= $worksheet->getCellByColumnAndRow(9, $row)->getCalculatedValue();
					$gsalary 		= $worksheet->getCellByColumnAndRow(10, $row)->getCalculatedValue();
					$data[] = array(
						'dr_date'			=>	$date,
						'dr_day'			=>	$day,
						'dr_name'			=>	$name,
						'dr_designation'	=>	$designation,
						'dr_rate'			=>	round($rate,2).PHP_EOL,
						'dr_ecola'			=>	round($ecola,2).PHP_EOL,
						'dr_ot'				=>	round($ot,2).PHP_EOL,
						'dr_ndp'			=>	round($ndp,2).PHP_EOL,
						'dr_hp'				=>	round($hp,2).PHP_EOL,
						'dr_late'			=>	round($late,2).PHP_EOL,
						'dr_gsalary'		=>	round($gsalary,2).PHP_EOL,
						'dr_datecreated'	=>	date('m-d-Y'),
						'dr_control_id'		=>	$dns_No
					);
				}
			}	
			
			$this->load->model('dns_model');
			$this->dns_model->import_reg($data); 		// SAVE EXCEL DATA TO DATABASE
			
			$row  = $this->dns_model->load_dns_reg($dns_No);  // LOAD SAVED DNS RECORD
			$dns['records'] = $row;
			$result['records'] = $row;
			
			$table  = $this->load->view('pages/dns_table_reg',$dns,TRUE);
			$result['html'] = $table;
			echo json_encode($result);	
		}	
	}
}
