<?php
include "../../../config/koneksi.php";

// cek apakah tombol submit sudah diklik atau blum?
if(isset($_POST['simpan'])){
 	// ambil data dari formulir
	$kdbarang = $_POST['kdbarang'];
	$kdbrand = $_POST['kdbrand'];
	$tanggal = $_POST['tanggal'];
	$barang = $_POST['barang'];
	$kdsup = $_POST['kdsup'];
	$qty = $_POST['qty'];
	$jenis = ucfirst($_POST['jenis']);
	$hargab = $_POST['hargab'];
	$hargaj = $_POST['hargaj'];

 	$sql = "INSERT INTO tb_gudang (kdbarang,kdbrand,tanggal,barang,kdsup,qty,jenis,hargab,hargaj) VALUES ('$kdbarang','$kdbrand','$tanggal','$barang','$kdsup','$qty','$jenis','$hargab','$hargaj')";
 	$query = mysqli_query($conn, $sql);

 	// apakah query simpan berhasil?
 	if( $query ){
 		header('location:../../../admin/admin.php?page=barang');
 	}
 	else{
 		header('location:../../../admin/admin.php?page=barang');
	}
}
else{
 	die("Akses dilarang...");
}

?>