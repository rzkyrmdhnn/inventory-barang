<?php
   	include('reportfunctions.php');
   	include('fpdf.php');
// example minimal view

$no = 0;
$host = "localhost";
$user = "root";
$password = "";
$database = "pergudangan";
$connect = mysqli_connect($host,$user,$password,$database);
$koneksi = $connect;

@$kriteria = @$_POST["tanggal"];
//@$kriteria2 = @$_POST["kriteria2"];

class PDF extends FPDF
{
// Page header
	function Header()
	{
		global $kriteria;
	    // Logo
	    //$this->Image('logo.png',10,6,30);
	    // Arial bold 15
	    $this->Ln(9);
	    $this->SetFont('Arial','B',20);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(120,0,'Pergudangan',0,0,'C');
	    $this->Ln(9);
	    $this->SetFont('Arial','B',15);
	    $this->Cell(280,0,'Laporan supplier',0,0,'C');
	    $this->Ln(14);
	    // $this->Cell(280,0,'Periode '.$kriteria,0,0,'C');
	    $this->Ln(14);
	    $this->SetFont('Arial','B',13);	
	    // Line break
	    $this->Ln(10);
	}

	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

// Instanciation of inherited class

$pdf = new PDF('L','mm',array(255.6,314.4));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Cell(20,6,'',0,0,'C');
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(30,6,'Kode supplier',1,0,'C');
$pdf->Cell(47,6,'Nama',1,0,'C');
$pdf->Cell(107,6,'Alamat',1,0,'C');
$pdf->Cell(47,6,'Kontak',1,0,'C');


// $pdf->Cell(37,6,'ID jaminan',1,0,'C');
$pdf->Ln(0);

$no = 0;
//$query = "SELECT * FROM nasabah WHERE $kriteria = '$kriteria2'";
// $jumlah_maret = mysqli_query($conn,"SELECT SUM(total) FROM tb_transaksi_s WHERE dibuat_tgl LIKE '%$maret%'");
$query = "SELECT * FROM tb_supplier";
$hasil = mysqli_query($koneksi, $query);
while ($qtabel = mysqli_fetch_assoc($hasil))
{ 
	$no++;
	$pdf->Ln(6);

	$pdf->SetFont('Times','',10);
	$pdf->Cell(20,6,'',0,0,'C');
	$pdf->Cell(8,6,$no.".",1,0,'C');
	$pdf->Cell(30,6,$qtabel['kdsup'],1,0,'C');
	$pdf->Cell(47,6,$qtabel['supplier'],1,0,'C');
	$pdf->Cell(107,6,$qtabel['alamat'],1,0,'C');
	$pdf->Cell(47,6,$qtabel['kontak'],1,0,'C');
}

$pdf->Output();

?>