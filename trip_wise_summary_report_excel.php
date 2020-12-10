<?php
include('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include('helper.php');
session_start();
$from=$_SESSION['trip_from'];
$to=$_SESSION['trip_to'];
$custm_select=$_SESSION['trip_select'];
$oid = $_SESSION['org'];
$con = con();
$fileName = 'trip_wise_summary_report.xlsx';  

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
            ->setCellValue('B2', 'Trip Wise Summary Report')
            ->setCellValue('B3', $date)
            ->setCellValue('B4', $name);

        $sheet->setCellValue('A7', 'SI No.');
        $sheet->setCellValue('B7', 'Customer Name');
        $sheet->setCellValue('C7', 'Order Qty');
        $sheet->setCellValue('D7', 'Delivered Date');        
        $sheet->setCellValue('E7', 'Driver');        
        $rows =8;
        
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(16);
    
        $where='';
        if($custm_select)
        {
            $where="AND d.customer_id=$custm_select";
        }
        $despatch=mysqli_query($con,"SELECT c.cust_name,COUNT(d.order_no) as count,DATE(d.delivery_timestamp) as date,dr.name FROM customer as c,despatch as d,waytrip_items as wi,waytrip as w,driver as dr WHERE c.cust_id=d.customer_id AND d.despatch_id=wi.despatch_id AND wi.waytrip_id=w.waytrip_id AND w.driver_id=dr.id AND COALESCE(d.delivery_timestamp,0) AND dr.org_id=$oid $where AND d.despatch_import_timestamp BETWEEN '$from' AND '$to' GROUP BY c.cust_name,DATE(d.delivery_timestamp) ORDER BY c.cust_name");
        $i=1;
        while($row=mysqli_fetch_assoc($despatch)){

            $sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, $row['cust_name']);
            $sheet->setCellValue('C' . $rows, $row['count']);
            $sheet->setCellValue('D' . $rows, $row['date']);
            $sheet->setCellValue('E' . $rows, $row['name']);
            $rows++;
            $i++;
        } 
        $writer = new Xlsx($spreadsheet);
        $writer->save("downloads/".$fileName);
        // header("Content-Disposition: attachment; filename=downloads/".$fileName);
        // header("Content-Type: application/vnd.ms-excel");
        header("location:downloads/".$fileName);

?>