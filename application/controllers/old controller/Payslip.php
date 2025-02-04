<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payslip extends CI_Controller 
{
	public function generate_slip()
	{
		$data['p_id']     = $this->input->post('excel_pid');
		$data['p_code']   = $this->input->post('excel_pcode');
		$data['fullname'] = $this->input->post('excel_fullname');
		$data['jobtype']  = $this->input->post('excel_jobtype');
		$data['alias']    = $this->input->post('excel_alias');
		
		$payroll 	= array();
		$trip 		= array();
		$wage 		= array();
		$wagePays 	= array();
		$deduction 	= array();
		$rowcount;
		$d_rowcount;
		
		// CHECK IF WAGE OR TRIP BY JOB TYPE
		if ($data['jobtype'] == 'Driver' || $data['jobtype'] == 'Helper')
		{
			// 1. PAYROLL RECORD
			$row_pr = array();
			$this->load->model('payslip_model');
			$row_pr  = $this->payslip_model->ps_load_payroll_record($data);
			$payroll['PCODE'] 		= $row_pr['PCODE'];
			$payroll['STARTDATE'] 	= $row_pr['STARTDATE'];
            $payroll['ENDDATE'] 	= $row_pr['ENDDATE'];
            $payroll['RANGE'] 		= $row_pr['RANGE'];
            $payroll['TRIPS'] 		= $row_pr['TRIPS'];
			$payroll['TTRATE'] 		= $row_pr['TTRATE'];
			$payroll['TADDBGT'] 	= $row_pr['TADDBGT'];
			$payroll['TGSALARY'] 	= $row_pr['TGSALARY'];
			$payroll['TDEDUCTION'] 	= $row_pr['TDEDUCTION'];
			$payroll['NETPAY'] 		= $row_pr['NETPAY'];
			
			$data['PCODE'] = $payroll['PCODE'];
			
			// 2. TRIP RECORD
			$this->load->model('payslip_model');
			$trip = $this->payslip_model->ps_load_trip_record($data);
		
			// 3. DEDUCTION RECORD
			$row_dr = array();
			$this->load->model('payslip_model');
			$row_dr  = $this->payslip_model->ps_load_deduction_record($data);
			$deduction['ADVBUDGET'] 		= $row_dr['ADVBUDGET'];
			$deduction['SSSCONTRIBUTION'] 	= $row_dr['SSSCONTRIBUTION'];
			$deduction['SSSLOAN'] 			= $row_dr['SSSLOAN'];
			$deduction['PHILHEALTH'] 		= $row_dr['PHILHEALTH'];
			$deduction['PAGIBIG'] 			= $row_dr['PAGIBIG'];
			$deduction['PAGIBIGLOAN']		= $row_dr['PAGIBIGLOAN'];
			$deduction['VALE'] 				= $row_dr['VALE'];
			$deduction['VALECOOR'] 			= $row_dr['VALECOOR'];
			$deduction['VALEGCASH'] 		= $row_dr['VALEGCASH'];
			$deduction['ABONO'] 			= $row_dr['ABONO'];
			$deduction['LOAN'] 				= $row_dr['LOAN'];
			$deduction['UNIFORM'] 			= $row_dr['UNIFORM'];
			$deduction['DEDUCTION'] 		= $row_dr['DEDUCTION'];
			$deduction['CONTRIBUTION'] 		= $row_dr['CONTRIBUTION'];
			$deduction['TDEDUCTION'] 		= $row_dr['TDEDUCTION'];
		}
		else // REGULAR EMPLOYEE
		{
			// 1. PAYROLL RECORD
			$row_pr = array();
			$this->load->model('payslip_model');
			$row_pr  = $this->payslip_model->ps_load_payroll_record($data);
			$payroll['PCODE'] 		= $row_pr['PCODE'];
			$payroll['STARTDATE'] 	= $row_pr['STARTDATE'];
            $payroll['ENDDATE'] 	= $row_pr['ENDDATE'];
            $payroll['RANGE'] 		= $row_pr['RANGE'];
            $payroll['TRIPS'] 		= $row_pr['TRIPS'];
			$payroll['TTRATE'] 		= $row_pr['TTRATE'] ;
			$payroll['TADDBGT'] 	= $row_pr['TADDBGT'];
			$payroll['TGSALARY'] 	= $row_pr['TGSALARY'] ;
			$payroll['TDEDUCTION'] 	= $row_pr['TDEDUCTION'];
			$payroll['NETPAY'] 		= $row_pr['NETPAY'];
			
			$data['PCODE'] = $payroll['PCODE'];
			
			// 2. WAGE RECORD
			$this->load->model('payslip_model');
			$wage = $this->payslip_model->ps_load_wage_record($data);
			
			// 3. TOTAL WAGE PAYS
			$this->load->model('payslip_model');
			$wagePays = $this->payslip_model->get_totalwagepay($data);
			$wagePays['TECOLA'] = $wagePays['TECOLA'];
			$wagePays['TNDP'] 	= $wagePays['TNDP'];
            $wagePays['THP'] 	= $wagePays['THP'];
            $wagePays['TOT'] 	= $wagePays['TOT'];
            $wagePays['TLATE'] 	= $wagePays['TLATE'];
			$wagePays['TRATE'] 	= $wagePays['TRATE'] ;
			
			// 4. DEDUCTION RECORD
			$row_dr = array();
			$this->load->model('payslip_model');
			$row_dr  = $this->payslip_model->ps_load_deduction_record($data);
			$deduction['ADVBUDGET'] 		= $row_dr['ADVBUDGET'];
			$deduction['SSSCONTRIBUTION'] 	= $row_dr['SSSCONTRIBUTION'];
			$deduction['SSSLOAN'] 			= $row_dr['SSSLOAN'];
			$deduction['PHILHEALTH'] 		= $row_dr['PHILHEALTH'];
			$deduction['PAGIBIG'] 			= $row_dr['PAGIBIG'];
			$deduction['PAGIBIGLOAN'] 		= $row_dr['PAGIBIGLOAN'];
			$deduction['VALE'] 				= $row_dr['VALE'];
			$deduction['VALECOOR'] 			= $row_dr['VALECOOR'];
			$deduction['VALEGCASH'] 		= $row_dr['VALEGCASH'];
			$deduction['ABONO'] 			= $row_dr['ABONO'];
			$deduction['LOAN'] 				= $row_dr['LOAN'];
			$deduction['UNIFORM'] 			= $row_dr['UNIFORM'];
			$deduction['DEDUCTION'] 		= $row_dr['DEDUCTION'];
			$deduction['CONTRIBUTION'] 		= $row_dr['CONTRIBUTION'];
			$deduction['TDEDUCTION'] 		= $row_dr['TDEDUCTION'];
		}
		
		// LOAD PHPExcel Library
		$this->load->library("excel");
		$object = new PHPExcel();
		$object->setActiveSheetIndex(0);
		
		if ($data['jobtype'] == 'Driver' || $data['jobtype'] == 'Helper')
		{
			$table_columns = array("DATE", "TRIP", "PLATE #" ,"RATE");
			
			$excel_row = 14;
			
			foreach($trip as $row)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->TRIP_DATE);
				$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, ($row->PICKUP_POINT . ' - ' . $row->DELIVERY_POINT));
				$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->PLATE_NUM);
				$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->TRIP_RATE);
				$excel_row++;
			}
			$rowcount = $excel_row;
			
		}
		else
		{
			$table_columns = array("DATE", "DAY", "RATE");	

			$excel_row = 14;

			foreach($wage as $row)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->r_date);
				$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->r_day);
				$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->r_rate);
				$excel_row++;
			}
			$rowcount = $excel_row;
		}
		
		$columnPos = 1;
		$rowPos = 13;
		
		// HEADERS
		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($columnPos, $rowPos, $field);
			$columnPos++;
		}
		

		// SET CUSTOMIZED STYLES AND FONTS
		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => '#000000'),
				),
			),
		);
		
		$text_centered = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				)
		);
		$color_cell = array(
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'CC99FF') // PALE VIOLET
			)
		);
		
		$color_cell2 = array(
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => '00FF00') // LIME
			)
		);
		
		$color_cell3 = array(
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'ADD8E6') // LIGHT BLUE
			)
		);
		
		$color_cell4 = array(
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'F2E48A') // LIGHT BLUE
			)
		);
		
		// INSERT IMAGE - LOGO
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('Logo');
		$objDrawing->setDescription('Logo');
		$logo = $_SERVER['DOCUMENT_ROOT'].'/payroll/assets/img/logo.png'; // Provide path to your logo file
		$objDrawing->setPath($logo);
		$objDrawing->setOffsetX(50);    // setOffsetX works properly
		$objDrawing->setOffsetY(300);  //setOffsetY has no effect
		$objDrawing->setCoordinates('B2');
		$objDrawing->setHeight(80); // logo height
		$objDrawing->setWorksheet($object->getActiveSheet());
		
		// TEXT CENTERED
		$object->getActiveSheet()->getStyle('B7:H7')->applyFromArray($text_centered);
		$object->getActiveSheet()->getCell('C2')->setValue("ALL COUNTS TRANSPORT SERVICES CORP.\n #256 YOUNGER STREET, BALUT, TONDO, MANILA\n TEL #: 02-7239-8184");
		$object->getActiveSheet()->getStyle('C2:H2')->applyFromArray($text_centered); // HEADER TITLE
		$object->getActiveSheet()->getStyle('C2:H2')->getAlignment()->setWrapText(true);
		
		$object->getActiveSheet()->getCell('C5')->setValue("PAYSLIP \n PAYSLIP DATE RANGE: ".$payroll['RANGE']." \n DATE: ".date('m-d-Y'));
		$object->getActiveSheet()->getStyle('C5:H5')->applyFromArray($text_centered); // HEADER TITLE
		$object->getActiveSheet()->getStyle('C5:H5')->getAlignment()->setWrapText(true);
		
		// FULLLNAME
		$object->getActiveSheet()->getCell('B9')->setValue("FULLNAME: ");
		$object->getActiveSheet()->getCell('C9')->setValue($data['fullname']);
		// JOB TYPE
		$object->getActiveSheet()->getCell('B10')->setValue("DESIGNATION: ");
		$object->getActiveSheet()->getCell('C10')->setValue($data['jobtype']);
		
		// MERGE CELLS
		$object->getActiveSheet()->mergeCells('C2:H4');
		$object->getActiveSheet()->mergeCells('C5:H7');
		$object->getActiveSheet()->mergeCells('B2:B7');
		$object->getActiveSheet()->mergeCells('C9:H9');
		$object->getActiveSheet()->mergeCells('C10:H10');
		
		
		// SET AUTOSIZE IN COLUMNS
		$object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$object->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		
		// REMOVE EXCESS ROW WITH BORDER
		$rowcount = $rowcount - 1;
		$d_rowcount = 26;
		
		// SET ALL BORDER IN THE CELLS
		$object->getActiveSheet()->getStyle('G13:H'.$d_rowcount.'')->applyFromArray($styleArray); // DEDUCTION
		$object->getActiveSheet()->getStyle('B2:H7')->applyFromArray($styleArray);
		$object->getActiveSheet()->getStyle('B9:H9')->applyFromArray($styleArray);
		$object->getActiveSheet()->getStyle('B10:H10')->applyFromArray($styleArray);
		
		// HEADER 1 DESIGN - DEDUCTION
		$object->getActiveSheet()->mergeCells('G12:H12');
		$object->getActiveSheet()->getStyle('G12:H12')->applyFromArray($styleArray); // ALL BORDER
		$object->getActiveSheet()->getStyle('G12:H12')->applyFromArray($color_cell2); // CELL COLOR
		$object->getActiveSheet()->getStyle('G12:H12')->getFont()->setBold( true );	// BOLD FONT
		$object->getActiveSheet()->getCell('G12')->setValue('DEDUCTIONS');
		$object->getActiveSheet()->getStyle('G12:H12')->applyFromArray($text_centered); // HEADER TITLE
		$object->getActiveSheet()->getStyle('G12:H12')->getAlignment()->setWrapText(true);
			
		// INSERT DATA - DEDUCTIONS
		$object->getActiveSheet()->getCell('G13')->setValue('SSS CONTRIBUTION');
		$object->getActiveSheet()->getCell('G14')->setValue('SSS LOAN');
		$object->getActiveSheet()->getCell('G15')->setValue('PHILHEALTH');
		$object->getActiveSheet()->getCell('G16')->setValue('PAGIBIG');
		$object->getActiveSheet()->getCell('G17')->setValue('PAGIBIG LOAN');
		$object->getActiveSheet()->getCell('G18')->setValue('TOTAL VALE (DNS)');
		$object->getActiveSheet()->getCell('G19')->setValue('VALE COORDINATOR');
		$object->getActiveSheet()->getCell('G20')->setValue('VALE GCASH');
		$object->getActiveSheet()->getCell('G21')->setValue('LOAN');
		$object->getActiveSheet()->getCell('G22')->setValue('UNIFORM');
		$object->getActiveSheet()->getCell('G23')->setValue('DEDUCTIONS');
		$object->getActiveSheet()->getCell('G24')->setValue('CONTRIBUTION');
		
		
		// ABONO
		if($data['jobtype'] == 'Driver')
		{
			$object->getActiveSheet()->getCell('G25')->setValue('ABONO');
			$object->getActiveSheet()->getStyle('G25')->applyFromArray($color_cell4); // CELL COLOR
			$object->getActiveSheet()->getStyle("G25:H25")->getFont()->setBold( true );	// BOLD FONT	
			$object->getActiveSheet()->getCell('H25')->setValue($deduction['ABONO']);
		}
		
			
		// TOTAL DEDUCTION
		$object->getActiveSheet()->getCell('G26')->setValue('TOTAL DEDUCTIONS');
		$object->getActiveSheet()->getStyle('G26')->applyFromArray($color_cell3); // CELL COLOR
		$object->getActiveSheet()->getStyle("G26:H26")->getFont()->setBold( true );	// BOLD FONT	
		$object->getActiveSheet()->getCell('H26')->setValue($deduction['TDEDUCTION']);
		
		$object->getActiveSheet()->getCell('H13')->setValue($deduction['SSSCONTRIBUTION']);
		$object->getActiveSheet()->getCell('H14')->setValue($deduction['SSSLOAN']);
		$object->getActiveSheet()->getCell('H15')->setValue($deduction['PHILHEALTH']);
		$object->getActiveSheet()->getCell('H16')->setValue($deduction['PAGIBIG']);
		$object->getActiveSheet()->getCell('H17')->setValue($deduction['PAGIBIGLOAN']);
		$object->getActiveSheet()->getCell('H18')->setValue($deduction['VALE']);
		$object->getActiveSheet()->getCell('H19')->setValue($deduction['VALECOOR']);
		$object->getActiveSheet()->getCell('H20')->setValue($deduction['VALEGCASH']);
		$object->getActiveSheet()->getCell('H21')->setValue($deduction['LOAN']);
		$object->getActiveSheet()->getCell('H22')->setValue($deduction['UNIFORM']);
		$object->getActiveSheet()->getCell('H23')->setValue($deduction['DEDUCTION']);
		$object->getActiveSheet()->getCell('H24')->setValue($deduction['CONTRIBUTION']);
		
		if ($data['jobtype'] == 'Driver' || $data['jobtype'] == 'Helper')
		{
			// SET ALL BORDER IN THE CELLS
			$object->getActiveSheet()->getStyle('B13:E'.$rowcount.'')->applyFromArray($styleArray); // TABLE TRIP
		
			// HEADER 1 DESIGN - GROSS SALARY
			$object->getActiveSheet()->mergeCells('B12:E12');
			$object->getActiveSheet()->getStyle('B12:E12')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B12:E12')->applyFromArray($color_cell2); // CELL COLOR
			$object->getActiveSheet()->getStyle("B12:E12")->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getCell('B12')->setValue('GROSS SALARY');
			$object->getActiveSheet()->getStyle('B12:E12')->applyFromArray($text_centered); // HEADER TITLE
			$object->getActiveSheet()->getStyle('B12:E12')->getAlignment()->setWrapText(true);
			
			// HEADER 2 DESIGN - TABLE HEADER
			$object->getActiveSheet()->getStyle('B13:E13')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B13:E13')->applyFromArray($color_cell); // CELL COLOR
			$object->getActiveSheet()->getStyle("B13:E13")->getFont()->setBold( true );	// BOLD FONT
			
			$rowcount = $rowcount + 2;
			
			// NUMBER OF TRIPS
			$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('NO OF TRIPS');
			$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
			$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($payroll['TRIPS']);
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
			
			$rowcount = $rowcount + 1;
			
		}
		else // REGULARS
		{
			// SET ALL BORDER IN THE CELLS
			$object->getActiveSheet()->getStyle('B13:D'.$rowcount.'')->applyFromArray($styleArray); // TABLE WAGE
			
			// HEADER 1 DESIGN - GROSS SALARY
			$object->getActiveSheet()->mergeCells('B12:D12');
			$object->getActiveSheet()->getStyle('B12:D12')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B12:D12')->applyFromArray($color_cell2); // CELL COLOR
			$object->getActiveSheet()->getStyle("B12:D12")->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getCell('B12')->setValue('GROSS SALARY');
			$object->getActiveSheet()->getStyle('B12:D12')->applyFromArray($text_centered); // HEADER TITLE
			$object->getActiveSheet()->getStyle('B12:D12')->getAlignment()->setWrapText(true);
		
			// HEADER 2 DESIGN - TABLE HEADER
			$object->getActiveSheet()->getStyle('B13:D13')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B13:D13')->applyFromArray($color_cell); // CELL COLOR
			$object->getActiveSheet()->getStyle("B13:D13")->getFont()->setBold( true );	// BOLD FONT
		
			$rowcount = $rowcount + 2;
			
			// TOTAL ECOLA
			$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('TOTAL ECOLA');
			$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
			$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($wagePays['TECOLA']);
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
				
			$rowcount = $rowcount + 1;
			
			// TOTAL LATE
			$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('TOTAL LATE');
			$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
			$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($wagePays['TLATE']);
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
				
			$rowcount = $rowcount + 1;
			
			// TOTAL OT
			$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('TOTAL OVERTIME PAY');
			$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
			$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($wagePays['TOT']);
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
				
			$rowcount = $rowcount + 1;
			
			// TOTAL NDP
			$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('TOTAL NIGHT DIFF. PAY');
			$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
			$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($wagePays['TNDP']);
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
				
			$rowcount = $rowcount + 1;
			
			// TOTAL HOLIDAY PAY
			$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('TOTAL HOLIDAY PAY');
			$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
			$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($wagePays['THP']);
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
				
			$rowcount = $rowcount + 1;
			
			// TOTAL RATE
			$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('TOTAL RATE');
			$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
			$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($wagePays['TRATE']);
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
			$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
				
			$rowcount = $rowcount + 1;
			
		}
		
		// TOTAL GROSS SALARY
		$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('TOTAL GROSS SALARY');
		$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
		$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($payroll['TGSALARY']);
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
			
		$rowcount = $rowcount + 1;
			
		// NET PAY
		$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('NET PAY');
		$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
		$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue($payroll['NETPAY']);
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
		
		$rowcount = $rowcount + 1;
				
		// REMARKS
		$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('REMARKS');
		$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
		
		$rowcount = $rowcount + 1;
		
		// RECEIVED BY
		$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('RECEIVED BY');
		$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED
		
		$rowcount = $rowcount + 1;
		
		// DATE RECEIVED
		$object->getActiveSheet()->getCell('B'.$rowcount.'')->setValue('DATE RECEIVED');
		$object->getActiveSheet()->getStyle('B'.$rowcount.'')->applyFromArray($color_cell3); // CELL COLOR
		$object->getActiveSheet()->getCell('C'.$rowcount.'')->setValue(date('m-d-Y'));
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($styleArray); // ALL BORDER
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->getFont()->setBold( true );	// BOLD FONT
		$object->getActiveSheet()->getStyle('B'.$rowcount.':C'.$rowcount.'')->applyFromArray($text_centered); // TEXT CENTERED

		// Save Excel 2007 file
		#echo date('H:i:s') . " Write to Excel2007 format\n";
		$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		ob_end_clean();
		
		// Output Excel File
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Payroll-'.$data['fullname'].'.xlsx"');
		$objWriter->save('php://output');
	}
}

