<?php
//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);
date_default_timezone_set("Asia/Dubai");
$date = date('Y-m-d H:i:s', time());
$date2 = date('Y-m-d', time());
$date3 = date('YmdHis', time());
require 'spreadsheet/vendor/autoload.php';

//include the classes needed to create and write .xlsx file
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//object of the Spreadsheet class to create the excel data
$a=$_GET['sn'];
$b=$_GET['sid'];
$c=$_GET['dt'];
$d=$_GET['usr'];
rep2($a,$b,$c,$d);
function rep2($sname,$sid,$dt,$user){
    date_default_timezone_set("Asia/Dubai");
$date = date('Y-m-d H:i:s', time());
$date2 = date('Y-m-d', time());
$date3 = date('YmdHis', time());
$date4 = date('d-m-Y H:i:s', time());
$spreadsheet = new Spreadsheet();
$spreadsheet->getActiveSheet()->mergeCells('A1:F1');
//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1', $sname);
 $spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A2', 'Report')
 ->setCellValue('A3', 'Generated')
 ->setCellValue('A4', 'User')

 ->setCellValue('A5', 'Date');
 $spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('B2', 'Present Absent Report')
 ->setCellValue('B3', $date4)
 ->setCellValue('B4', $user)

 ->setCellValue('B5', $dt);
//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A7', 'Route')
 ->setCellValue('B7', 'Trip')
 ->setCellValue('C7', 'Bus #')
 ->setCellValue('D7', 'Present')
 ->setCellValue('E7', 'Absent')
 ->setCellValue('F7', 'Total');
 $servername = "trackzen-instance-1.c4xk3bj6eqqm.us-west-2.rds.amazonaws.com";
  $username = "xidiva";
  $password = "X1d1va99";
  $dbname = "trackzen_giis";
  $con = new mysqli($servername, $username, $password, $dbname);

  $resary=array();
  $gettrips=mysqli_query($con,"SELECT DISTINCT d.`trip_id`,t.tripname FROM `tripdata` d,trip t WHERE t.tripcode=d.`trip_id` and t.school_id=$sid and d.date='$dt'");
  $reprows=mysqli_num_rows($gettrips);  
  while($row=mysqli_fetch_assoc($gettrips)){
        $tcode=$row['trip_id'];
        $tname=$row['tripname'];
        $getdata=mysqli_query($con,"SELECT r.`routename`,v.vehicle_name,t.`total_students`,t.`boarded`,t.`absent` from tripdata t, route r,routeassignment ra,vehicle v where r.routecode=t.route_id and `trip_id`=$tcode and date='$dt' and ra.routeid=t.`route_id` and v.vehicle_id=ra.vehicleid order by t.`route_id`");
    while($row1=mysqli_fetch_assoc($getdata)){
        
        $rname=$row1['routename'];
        $vname=$row1['vehicle_name'];
        $tot=$row1['total_students'];
        $pre=$row1['boarded'];
        $abs=$row1['absent'];
        
        $resary[]=[$rname,$tname,$vname,$pre,$abs,$tot];
    }
    }
    //print_r($resary);
    $spreadsheet->getActiveSheet()
    ->fromArray(
        $resary,  // The data to set
        NULL,        // Array values with this value will not be set
        'A8'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    );
// $spreadsheet->setActiveSheetIndex(0)
//  ->setCellValue('A2', 'CoursesWeb.net')
//  ->setCellValue('B2', 'Web Development')
//  ->setCellValue('C2', '4000');

// $spreadsheet->setActiveSheetIndex(0)
//  ->setCellValue('A3', 'MarPlo.net')
//  ->setCellValue('B3', 'Courses & Games')
//  ->setCellValue('C3', '15000');

//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A7:F7')->applyFromArray($cell_st);
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
   $cell_st0 =[
    'font' =>['bold' => true],
    'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
    'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM],'top' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM],'left' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM],'right' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
   ];
   $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($cell_st0);
   $spreadsheet->getActiveSheet()->getStyle("A1:F1")->getFont()->setSize(24);
   $spreadsheet->getActiveSheet()->getStyle('A2')->applyFromArray($cell_st1);
  $spreadsheet->getActiveSheet()->getStyle('A3')->applyFromArray($cell_st1);
  $spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($cell_st1);
  $spreadsheet->getActiveSheet()->getStyle('A5')->applyFromArray($cell_st1);
  $spreadsheet->getActiveSheet()->getStyle('B2')->applyFromArray($cell_st11);
  $spreadsheet->getActiveSheet()->getStyle('B3')->applyFromArray($cell_st11);
  $spreadsheet->getActiveSheet()->getStyle('B4')->applyFromArray($cell_st11);
  $spreadsheet->getActiveSheet()->getStyle('B5')->applyFromArray($cell_st11);
//set columns width
$spreadsheet->getActiveSheet()->getStyle('A8:C'.(7+$reprows))->applyFromArray($cell_st11);
$spreadsheet->getActiveSheet()->getStyle('D8:F'.(7+$reprows))->applyFromArray($cell_st12);
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);

$spreadsheet->getActiveSheet()->setTitle('Present Absent Report'); //set a title for Worksheet
if($reprows>0){
//make object of the Xlsx class to save the excel file
$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="present_abent_report_'.$date3.'.xlsx"');
$writer->save('php://output');
}

?>