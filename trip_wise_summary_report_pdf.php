<?php
include('fpdf/fpdf.php');
include('helper.php');
session_start();
$from=$_SESSION['trip_from'];
$to=$_SESSION['trip_to'];
$custm_select=$_SESSION['trip_select'];
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
$pdf->Cell(35,6,'Trip Wise Summary Report',0,1);
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
$header = array('SI No.', ' Customer Name', 'Order Qty', 'Delivered Date','Driver');
$Array = [];
$where='';
if($custm_select)
  {
    $where="AND d.customer_id=$custm_select";
  }
$despatch=mysqli_query($con,"SELECT c.cust_name,COUNT(d.order_no) as count,DATE(d.delivery_timestamp) as date,dr.name FROM customer as c,despatch as d,waytrip_items as wi,waytrip as w,driver as dr WHERE c.cust_id=d.customer_id AND d.despatch_id=wi.despatch_id AND wi.waytrip_id=w.waytrip_id AND w.driver_id=dr.id AND COALESCE(d.delivery_timestamp,0) AND dr.org_id=$oid $where AND d.despatch_import_timestamp BETWEEN '$from' AND '$to' GROUP BY c.cust_name,DATE(d.delivery_timestamp) ORDER BY c.cust_name");
  if($despatch)
  {
    $i=1;
    while($row=mysqli_fetch_assoc($despatch))
    {
        $Array[]=array($i,$row['cust_name'],$row['count'],$row['date'],$row['name']);
        $i++;
    }
  } 
 
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(15,19,67);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(15,19,67);
$pdf->SetLineWidth(.3);
$pdf->FancyTable($header,$Array); 

//Output the document
$pdf->Output('despatch_summary_report.pdf','I');
?>