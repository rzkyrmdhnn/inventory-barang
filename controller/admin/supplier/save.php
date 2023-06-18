<?php
include "../../../config/koneksi.php";

// cek apakah tombol submit sudah diklik atau blum?
if(isset($_POST['simpan'])){
 	// ambil data dari formulir
 	$kdsup = $_POST['kdsup'];
	$supplier = $_POST['supplier'];
	$alamat = $_POST['alamat'];
	$kontak = $_POST['kontak'];

 	$sql = "INSERT INTO tb_supplier (kdsup,supplier,alamat,kontak) VALUES ('$kdsup','$supplier','$alamat','$kontak')";
 	$query = mysqli_query($conn, $sql);

 	// apakah query simpan berhasil?
 	if( $query ){
 		header('location:../../../admin/admin.php?page=supplier');
 	}
 	else{
 		header('location:../../../admin/admin.php?page=supplier');
	}
}
else{
 	die("Akses dilarang...");
}

?>