<?php
include('fpdf/fpdf.php');
include('helper.php');
session_start();
$from=$_SESSION['route_from'];
$to=$_SESSION['route_to'];
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
$pdf->Cell(35,6,'Route Report',0,1);
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
$header = array('Date', ' Driver', 'Route');
$Array = [];
$report=mysqli_query($con,"SELECT Date(r.time_stamp) as date,name,r.route_id FROM route as r,driver as d WHERE r.driver_id=d.id AND d.org_id=$oid AND r.time_stamp BETWEEN '$from' AND '$to'");
  if($report)
  {
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
        $Array[]=array($row['date'],$row['name'],$names);
        $i++;
    }
  } 
 
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(15,19,67);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(15,19,67);
$pdf->SetLineWidth(.3);
$pdf->FancyTable5($header,$Array); 

//Output the document
$pdf->Output('route_report.pdf','I');
?>