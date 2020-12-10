<?php
include('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include('helper.php');
session_start();
$from=$_SESSION['route_from'];
$to=$_SESSION['route_to'];
$oid = $_SESSION['org'];
$con = con();
$fileName = 'route_report.xlsx';  

$spreadsheet = new Spreadsheet();

$styleArray = array(
    'font'  => array(
    'bold'  => true,
    'size'  => 15,
    'name'  => 'Verdana',
    ));
    $styleArray2 = array(
    'font'  => array(
    'bold'  => true
    ));
    $cell_st =[
    'font' =>['bold' => true],
    'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
    'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
    ];
    $cell_st1 =[
    'font' =>['bold' => true],
    'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT]
    ];
    $cell_st11 =[
    'font' =>['bold' => false],
    'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT]
    ];
    $cell_st12 =[
    'font' =>['bold' => false],
    'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT]
     ];

        $name=$_SESSION['name'];
        $customername= "Trackstork Mobile";
        date_default_timezone_set('Asia/Dubai');
        $date = date('d-m-Y H:i:s');




        $spreadsheet->getActiveSheet()->getCell('A1')->setValue($customername);
        $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($cell_st);
        $sheet = $spreadsheet->getActiveSheet()->mergeCells('A1:I1');
        $spreadsheet->getActiveSheet()->getStyle("A1:I1")->getFont()->setSize(20);

        $spreadsheet->getActiveSheet()->getCell('A2')->setValue('Report');
        $spreadsheet->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray2);

        $spreadsheet->getActiveSheet()->getCell('A3')->setValue('Generated');
        $spreadsheet->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray2);

        $spreadsheet->getActiveSheet()->getCell('A4')->setValue('User');
        $spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($styleArray2);
        $spreadsheet->getActiveSheet()->getStyle('A7:G7')->applyFromArray($cell_st);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B2', 'Route Report')
            ->setCellValue('B3', $date)
            ->setCellValue('B4', $name);

        $sheet->setCellValue('A7', 'Date');
        $sheet->setCellValue('B7', 'Driver');
        $sheet->setCellValue('C7', 'Route');      
        $rows =8;
        
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(16);
    
        
        $report=mysqli_query($con,"SELECT Date(r.time_stamp) as date,name,r.route_id FROM route as r,driver as d WHERE r.driver_id=d.id AND d.org_id=$oid AND r.time_stamp BETWEEN '$from' AND '$to'");
        $i=1;
        while($row=mysqli_fetch_assoc($report))
        {
            $route_id=$row['route_id'];
            $cusomers=mysqli_query($con,"SELECT c.cust_name FROM route as r,route_items as ri,customer as c WHERE r.route_id=ri.route_id AND ri.customer_id=c.cust_id AND r.route_id=$route_id");
            $names="";
            while($row1=mysqli_fetch_assoc($cusomers))  
            {
            $name=$row1['cust_name'];
            $names.="$name, ";
            }
            $sheet->setCellValue('A' . $rows, $row['date']);
            $sheet->setCellValue('B' . $rows, $row['name']);
            $sheet->setCellValue('C' . $rows, $names);
            $rows++;
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("downloads/".$fileName);
        // header("Content-Disposition: attachment; filename=downloads/".$fileName);
        header("location:downloads/".$fileName);
		// header("Content-Type: application/vnd.ms-excel");

?>