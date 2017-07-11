<?php
require_once "core/init.php";
global $link;
$query = tmp_murid();

$data = array();
while ($row = mysqli_fetch_assoc($query)){
  array_push($data,$row);
}

$judul = "DATA SISWA";
$header = array(
  array("Label"=>"Nama","length"=>30, "align"=>"L"),
  array("Label"=>"Alamat","length"=>60, "align"=>"L"),
  array("Label"=>"Tmp Lahir","length"=>20, "align"=>"L"),
  array("Label"=>"Tgl Lahir","length"=>15, "align"=>"L"),
  array("Label"=>"Agama","length"=>17, "align"=>"L"),
  array("Label"=>"Kelas","length"=>20, "align"=>"L"));

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139,69,19);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(222,184,135);
foreach ($header as $kolom) {
  $pdf->Cell($kolom['length'],6,$kolom['label'],1,'0',$kolom['align'],true);

}
$pdf->ln();

$pdf->SetFillColor(245,222,179);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
  $i = 0;
  foreach ($baris as $data) {
    $pdf->Cell($header[$i]['length'],5,$cell,1,'0',$kolom['align'],$fill);
    $i++;
  }
  $fill=!$fill;
  $pdf->ln();
}

$pdf->Output();
 ?>
