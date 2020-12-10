<?php
include('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include('helper.php');
session_start();
$from=$_SESSION['vehicle_from'];
$drive_select=$_SESSION['vehicle_drive'];
$oid = $_SESSION['org'];
$con = con();
$fileName = 'vehicle_wise_route_report.xlsx';  

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
            ->setCellValue('B2', 'Vehicle Wise Route Report')
            ->setCellValue('B3', $date)
            ->setCellValue('B4', $name);

        $sheet->setCellValue('A7', 'SI No.');
        $sheet->setCellValue('B7', 'Customer Number');
        $sheet->setCellValue('C7', 'Customer Name');       
        $rows =8;
        
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(16);
    
        $where='';
        if($drive_select)
        {
            $where="AND r.driver_id=$drive_select";
        }
        $despatch=mysqli_query($con,"SELECT c.cust_num,c.cust_name FROM route as r,customer as c, route_items as ri WHERE r.route_id=ri.route_id AND ri.customer_id=c.cust_id $where AND Date(r.time_stamp)='$from'");
        $i=1;
        while($row=mysqli_fetch_assoc($despatch)){

            $sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, $row['cust_num']);
            $sheet->setCellValue('C' . $rows, $row['cust_name']);
            $rows++;
            $i++;
        } 
        $writer = new Xlsx($spreadsheet);
        $writer->save("downloads/".$fileName);
        // header("Content-Disposition: attachment; filename=downloads/".$fileName);
        // header("Content-Type: application/vnd.ms-excel");
        header("location:downloads/".$fileName);

?>