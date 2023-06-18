<?php
include "../../../config/koneksi.php";

// cek apakah tombol submit sudah diklik atau blum?
if(isset($_POST['simpan'])){
 	// ambil data dari formulir
	$kdbrand = $_POST['kdbrand'];
	$brand = $_POST['brand'];
	$jenis = $_POST['jenis'];

 	$sql = "INSERT INTO tb_brand (kdbrand,brand,jenis) VALUES ('$kdbrand','$brand','$jenis')";
 	$query = mysqli_query($conn, $sql);

 	// apakah query simpan berhasil?
 	if( $query ){
 		header('location:../../../admin/admin.php?page=brand');
 	}
 	else{
 		header('location:../../../admin/admin.php?page=brand');
	}
}
else{
 	die("Akses dilarang...");
}

?>