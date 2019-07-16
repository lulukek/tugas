<?php
require('fpdf181/fpdf.php');
class PDF extends FPDF{

  function Header(){
   $this->SetTextColor(0,0,0); // warna tulisan
   $this->SetFont('Arial','B','20'); // font yang digunakan
   // membuat cell dg panjang 19 dan align center 'C'
   $this->Cell(35,1,'DATA TAPE',0,0,'C');
   $this->Ln();
   $this->SetFont('Arial','B','10');
   $this->SetFillColor(192,192,192); 
   $this->SetTextColor(0,0,0); 
   $this->Cell(1,1,'No','TB',0,'C',1); 
   $this->Cell(3,1,'ID Tape','TB',0,'C',1); 
   $this->Cell(2,1,'TLD','TB',0,'C',1); 
   $this->Cell(3,1,'Data Expiration','TB',0,'C',1); 
   $this->Cell(4,1,'Volume Pool','TB',0,'C',1); 
   $this->Cell(4,1,'Location','TB',0,'C',1); 
   $this->Cell(5,1,'Remarks','TB',0,'C',1); 
   $this->Cell(5,1,'Media Status','TB',0,'C',1);
   $this->Cell(5,1,'Date Of Change','TB',0,'C',1); //
   
   $this->Ln();
  }
  
  function Footer(){
   $this->SetY(-2,5);
   $this->Cell(0,1,$this->PageNo(),0,0,'C');
  } 
 }

 $server = "localhost";
 $user = "root";
 $pass = "";
 $data = "pkl";

 $net = new mysqli($server, $user, $pass, $data);

 if($net->connect_error){
  die("Koneksi gagal: ".$net->connect_error);
 }

 $q = "select * from tape_list";
 $h = $net->query($q) or die($net->error);
 $i = 0;
 
 while($d=$h->fetch_array()){
  $cell[$i][0]=$d[0];
  $cell[$i][1]=$d[1];
  $cell[$i][2]=$d[2];
  $cell[$i][3]=$d[3];
  $cell[$i][4]=$d[4];
  $cell[$i][5]=$d[5];
  $cell[$i][6]=$d[6];
  $cell[$i][7]=$d[7];
  $i++;
 }
 // orientasi Potrait
 // ukuran cm
 // kertas A4
 $pdf = new PDF('L','cm','Legal');
 //$pdf->Open();
 $pdf->AliasNbPages();
 $pdf->AddPage();

 $pdf->SetFont('Arial','','10');
 //perulangan untuk membuat tabel
 for($j=0;$j<$i;$j++){
  
  $pdf->Cell(1,1,$j+1,'B',0,'C');
  $pdf->Cell(3,1,$cell[$j][0],'B',0,'L');
  $pdf->Cell(2,1,$cell[$j][1],'B',0,'L');
  $pdf->Cell(3,1,$cell[$j][2],'B',0,'L');
  $pdf->Cell(4,1,$cell[$j][3],'B',0,'L');
  $pdf->Cell(4,1,$cell[$j][4],'B',0,'L');
  $pdf->Cell(5,1,$cell[$j][5],'B',0,'L');
  $pdf->Cell(5,1,$cell[$j][6],'B',0,'L');
  $pdf->Cell(5,1,$cell[$j][7],'B',0,'L');
  
  
  $pdf->Ln();
 }

 $pdf->Output(); // ditampilkan

?>