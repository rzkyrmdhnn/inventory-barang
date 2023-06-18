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

@$kdtrans = @$_POST["kdtrans"];
@$nik = @$_POST["nik"];
@$nama = @$_POST["nama"];
@$totaltrans = @$_POST["totaltrans"];
$tglnow=date('d-m-Y');

$sql = "SELECT * FROM tb_customer WHERE id = '$nik'";
$query = mysqli_query($koneksi, $sql);
$hasil = mysqli_fetch_assoc($query);
$nik2 = $hasil['nik'];

$sql = "UPDATE tb_gudang,tb_transaksi SET tb_gudang.qty = tb_gudang.qty - tb_transaksi.qty WHERE tb_gudang.kdbarang = tb_transaksi.kdbarang AND tb_transaksi.kdtrans=''";
$query = mysqli_query($koneksi, $sql);

$sql = "UPDATE tb_transaksi SET kdtrans = '$kdtrans',nik = '$nama' WHERE kdtrans=''";
$query = mysqli_query($koneksi, $sql);
//@$kriteria2 = @$_POST["kriteria2"];


// "UPDATE tb_gudang,tb_transaksi SET tb_gudang.qty = tb_gudang.qty + tb_transaksi.qty WHERE tb_gudang.kdbarang = tb_transaksi.kdbarang';


class PDF extends FPDF
{
// Page header
	function Header()
	{
		global $totaltrans,$tglnow,$nama;
	    // Logo
	    //$this->Image('logo.png',10,6,30);
	    $this->Image('pakai.jpg',24,12,12);
	    // Arial bold 15

	    $this->SetFont('Arial','B',35);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(120,0,'Pergudangan',0,0,'C');
	    $this->Ln(9);
	    $this->SetFont('Arial','B',15);
	    $this->Cell(280,0,'Transaksi',0,0,'C');
	    $this->Ln(14);
	    $this->SetFont('Arial','B',13);
	    $this->Cell(280,0,'Cust :'.$nama,0,0,'C');
	    $this->Ln(7);
	    $this->Cell(280,0,'Tgl: '.$tglnow,0,0,'C');
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

$pdf = new PDF('L','mm',array(255.6,314.4));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Cell(20,6,'',0,0,'C');
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(30,6,'Kode Transaksi',1,0,'C');
$pdf->Cell(77,6,'Barang',1,0,'C');
$pdf->Cell(37,6,'Jenis',1,0,'C');
$pdf->Cell(17,6,'Qty',1,0,'C');
$pdf->Cell(37,6,'Harga',1,0,'C');
$pdf->Cell(37,6,'Total',1,0,'C');


// $pdf->Cell(37,6,'ID jaminan',1,0,'C');
$pdf->Ln(0);

$no = 0;
//$query = "SELECT * FROM nasabah WHERE $kriteria = '$kriteria2'";
// $jumlah_maret = mysqli_query($conn,"SELECT SUM(total) FROM tb_transaksi_s WHERE dibuat_tgl LIKE '%$maret%'");
$query = "SELECT * FROM tb_transaksi WHERE kdtrans = '$kdtrans'";
$hasil = mysqli_query($koneksi, $query);
while ($qtabel = mysqli_fetch_assoc($hasil))
{ 
	$no++;
	$kdbarang = $qtabel['kdbarang'];

	$query2 = "SELECT * FROM tb_gudang WHERE kdbarang = '$kdbarang'";
	$hasil2 = mysqli_query($koneksi, $query2);
	$qtabel2 = mysqli_fetch_assoc($hasil2);

	$pdf->Ln(6);

	$pdf->SetFont('Times','',10);
	$pdf->Cell(20,6,'',0,0,'C');
	$pdf->Cell(8,6,$no.".",1,0,'C');
	$pdf->Cell(30,6,$qtabel['kdtrans'],1,0,'C');
	$pdf->Cell(77,6,$qtabel2['barang'],1,0,'C');
	$pdf->Cell(37,6,$qtabel2['jenis'],1,0,'C');
	$pdf->Cell(17,6,$qtabel['qty'],1,0,'C');
	$pdf->Cell(37,6,$qtabel['harga'],1,0,'C');
	$pdf->Cell(37,6,$qtabel['total'],1,0,'C');

}
$kdtrans = $qtabel['kdtrans'];
$pdf->Ln(14);
$pdf->Cell(260,0,'Total Transaksi : Rp.'.$totaltrans.',-',0,0,'R');

$fileName = "nota - ".$kdtrans.".pdf";
$pdf->Output($fileName, 'D');

// $sql = "INSERT INTO tb_transaksi_s SELECT * FROM tb_transaksi";
// $query = mysqli_query($koneksi, $sql);

// $sql = "DELETE FROM tb_transaksi";
// $query = mysqli_query($koneksi, $sql);
?>