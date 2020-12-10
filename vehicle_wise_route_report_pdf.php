<?php
include('fpdf/fpdf.php');
include('helper.php');
session_start();
$from=$_SESSION['vehicle_from'];
$drive_select=$_SESSION['vehicle_drive'];
$oid = $_SESSION['org'];
$con = con();

$pdf= new FPDF();
$pdf->AddPage();
// $pdf->Image('http://cygnus.gredenza.com/support/pdflogo.png',175,6,25);
$pdf->SetFont('Arial','B',24);

$name=$_SESSION['name'];
$customername= "Trackstork Mobile";
date_default_timezone_set('Asia/Dubai');
$date4 = date('d-m-Y H:i:s');
//set font for the entire document
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);

$pdf->Cell(160,6,$customername,0,1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(135,6,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Report',0,0);
$pdf->Cell(3,6,':',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(35,6,'Vehicle Wise Route Report',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Generated',0,0);
$pdf->Cell(3,6,':',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(35,6,$date4,0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'User',0,0);
$pdf->Cell(3,6,':',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(35,6,$name,0,1);

$pdf->Ln(5);
$header = array(' SI No.', ' Customer Number', ' Customer Number');
$Array = [];
$where='';
if($drive_select)
  {
    $where="AND r.driver_id=$drive_select";
  }
$despatch=mysqli_query($con,"SELECT c.cust_num,c.cust_name FROM route as r,customer as c, route_items as ri WHERE r.route_id=ri.route_id AND ri.customer_id=c.cust_id $where AND Date(r.time_stamp)='$from'");
  if($despatch)
  {
    $i=1;
    while($row=mysqli_fetch_assoc($despatch))
    {
        $Array[]=array($i,$row['cust_num'],$row['cust_name']);
        $i++;
    }
  } 
 
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(15,19,67);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(15,19,67);
$pdf->SetLineWidth(.3);
$pdf->FancyTable1($header,$Array); 

//Output the document
$pdf->Output('despatch_summary_report.pdf','I');
?>