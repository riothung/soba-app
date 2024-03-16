<?php

include "library/fpdf.php";

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->setFont('Times', 'B', 12); //set font
$pdf->Cell(200, 10, 'LAPORAN PENGARAH TEKNIK', 0, 1, 'C'); //set lebar, tinggi, judul, border, align, position

$pdf->Cell(10, 10, '', 0, 1); 
$pdf->setFont('Times', 'B', 10); //set font

$pdf->Cell(10, 7, 'NO.', 1, 0, 'C');
$pdf->Cell(50, 7, 'NAMA LENGKAP', 1, 0, 'C');
$pdf->Cell(55, 7, 'ALAMAT', 1, 0, 'C');
$pdf->Cell(75, 7, 'NOMOR TELEPON', 1, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->setFont('Times', '', 10);

$nomor = 1;
$koneksi = mysqli_connect("localhost", "root", "", "tvri");
$data = mysqli_query($koneksi, "SELECT * FROM data_pekerja");
while($d = mysqli_fetch_array($data)){
    $pdf->Cell(10, 7, $nomor++, 1, 0, 'C');
    $pdf->Cell(50, 7, $d['nama_lengkap'], 1, 0, 'C');
    $pdf->Cell(55, 7, $d['alamat'], 1, 0, 'C');
    $pdf->Cell(75, 7, $d['telepon_hp'], 1, 1, 'C');
    // $pdf->Cell(45, 7, $d['keterangan_kerja'], 1, 0, 'C');
    // $pdf->Cell(35, 7, $d['kerabat_kerja'], 1, 0, 'C');
    // $pdf->Cell(50, 7, $d['keterangan_kehadiran'], 1, 1, 'C');
}

$pdf->Output();

?>