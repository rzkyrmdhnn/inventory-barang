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

// @$kriteria = @$_POST["tanggal"];
@$kdorder = @$_POST["kdorder"];

$sql = "UPDATE tb_pesan SET kdorder = '$kdorder' WHERE kdorder=''";
$query = mysqli_query($koneksi, $sql);
//@$kriteria2 = @$_POST["kriteria2"];

class PDF extends FPDF
{
// Page header
	function Header()
	{
	    $this->Ln(9);
	    $this->SetFont('Arial','B',20);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(120,0,'Pergudangan',0,0,'C');
	    $this->Ln(9);
	    $this->SetFont('Arial','B',15);
	    $this->Cell(280,0,'Laporan Pemesanan',0,0,'C');
	    // Line break
	    $this->Ln(20);
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

$pdf = new PDF('L','mm','A4');;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(30,6,'Kode order',1,0,'C');
$pdf->Cell(27,6,'Tanggal',1,0,'C');
$pdf->Cell(37,6,'Brand',1,0,'C');
$pdf->Cell(37,6,'Barang',1,0,'C');
$pdf->Cell(37,6,'Supplier',1,0,'C');
$pdf->Cell(13,6,'Qty',1,0,'C');
$pdf->Cell(37,6,'Jenis',1,0,'C');
$pdf->Cell(27,6,'Harga',1,0,'C');
$pdf->Cell(27,6,'Total',1,0,'C');

// $pdf->Cell(37,6,'ID jaminan',1,0,'C');
$pdf->Ln(0);

$no = 0;
//$query = "SELECT * FROM nasabah WHERE $kriteria = '$kriteria2'";
// $jumlah_maret = mysqli_query($conn,"SELECT SUM(total) FROM tb_transaksi_s WHERE dibuat_tgl LIKE '%$maret%'");
$query = "SELECT * FROM tb_pesan WHERE kdorder = '$kdorder'";
$hasil = mysqli_query($koneksi, $query);
$qtabel = mysqli_fetch_assoc($hasil);

$kdbarang = $qtabel['kdbarang'];
$kdsup = $qtabel['kdsup'];
$date= new DateTime($qtabel['tanggal']) ;

$query = "SELECT * FROM tb_gudang WHERE kdbarang = '$kdbarang'";
$hasil = mysqli_query($koneksi, $query);
$qtabel2 = mysqli_fetch_assoc($hasil);

$kdbarang2 = $qtabel2['barang'];
$kdbrand = $qtabel2['kdbrand']; 
$jenis = $qtabel2['jenis'];

$query = "SELECT * FROM tb_supplier WHERE kdsup = '$kdsup'";
$hasil = mysqli_query($koneksi, $query);
$qtabel2 = mysqli_fetch_assoc($hasil);

$kdsup2 = $qtabel2['supplier'];

$query = "SELECT * FROM tb_brand WHERE kdbrand = '$kdbrand'";
$hasil = mysqli_query($koneksi, $query);
$qtabel2 = mysqli_fetch_assoc($hasil);

$brand = $qtabel2['brand'];

// while ($qtabel = mysqli_fetch_assoc($hasil))
{ 
	$no++;
	$pdf->Ln(6);

	$pdf->SetFont('Times','',10);
	$pdf->Cell(8,6,$no.".",1,0,'C');
	$pdf->Cell(30,6,$qtabel['kdorder'],1,0,'C');
	$pdf->Cell(27,6,$date->format('Y-m-d'),1,0,'C');
	$pdf->Cell(37,6,$brand,1,0,'C');
	$pdf->Cell(37,6,$kdbarang2,1,0,'C');
	$pdf->Cell(37,6,$kdsup2,1,0,'C');
	$pdf->Cell(13,6,$qtabel['qty'],1,0,'C');
	$pdf->Cell(37,6,$jenis,1,0,'C');
	$pdf->Cell(27,6,$qtabel['hargab'],1,0,'C');
	$pdf->Cell(27,6,$qtabel['total'],1,0,'C');

}

$pdf->Output();

?>