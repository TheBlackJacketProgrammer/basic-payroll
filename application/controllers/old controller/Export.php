<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller 
{
 
	function index()
	{
		$this->load->model("payroll_model");
		$data["employee_data"] = $this->payroll_model->fetch_data();
		$this->load->view("pages/export", $data);
	}

	function action()
	{
		$this->load->model("payroll_model");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("EID", "FULLNAME", "GENDER", "BIRTHDATE", "ADDRESS");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$employee_data = $this->payroll_model->fetch_data();

		$excel_row = 2;

		foreach($employee_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->e_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->e_fullname);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->e_gender);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->e_birthdate);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->e_address);
			$excel_row++;
		}

	
		
				// Save Excel 2007 file
		#echo date('H:i:s') . " Write to Excel2007 format\n";
		$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		ob_end_clean();
		// We'll be outputting an excel file
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="payroll.xlsx"');
		$objWriter->save('php://output');
	}

 
 
}