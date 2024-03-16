<?php
if(isset($_GET['id'])){

    include "library/fpdf.php";
    $nomor = 1;
    $koneksi = mysqli_connect("localhost", "root", "", "tvri");
    $data = mysqli_query($koneksi, "SELECT * FROM acara JOIN kegiatan ON kegiatan.id_acara = acara.id_acara WHERE kegiatan.id_acara = '$_GET[id]'");
    $d = mysqli_fetch_array($data);

    
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->setFont('Times', 'B', 12); //set font
$pdf->Cell(200, 10, "NAMA ACARA : ".$d['nama_acara'], 0, 1, 'L'); //set lebar, tinggi, judul, border, align, position

$pdf->Cell(10, 10, '', 0, 1); 
$pdf->setFont('Times', 'B', 10); //set font

$pdf->Cell(10, 7, 'NO.', 1, 0, 'C');
$pdf->Cell(60, 7, 'NAMA KEGIATAN', 1, 0, 'C');
$pdf->Cell(20, 7, 'HARI', 1, 0, 'C');
$pdf->Cell(25, 7, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(35, 7, 'JAM MULAI', 1, 0, 'C');
$pdf->Cell(35, 7, 'JAM SELESAI', 1, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->setFont('Times', '', 10);

while($d = mysqli_fetch_array($data)){
    $pdf->Cell(10, 7, $nomor++, 1, 0, 'C');
    $pdf->Cell(60, 7, $d['nama_kegiatan'], 1, 0, 'C');
    $pdf->Cell(20, 7, $d['hari'], 1, 0, 'C');
    $pdf->Cell(25, 7, $d['tanggal'], 1, 0, 'C');
    $pdf->Cell(35, 7, $d['jam_mulai'], 1, 0, 'C');
    $pdf->Cell(35, 7, $d['jam_selesai'], 1, 1, 'C');
}

$pdf->Output();

}
?>