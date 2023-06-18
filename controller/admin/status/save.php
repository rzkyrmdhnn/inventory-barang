<?php
include "../../../config/koneksi.php";

// cek apakah tombol submit sudah diklik atau blum?
if(isset($_POST['simpan'])){
 	// ambil data dari formulir
 	$username = $_POST['username'];
	$password = $_POST['password'];
	$akses = $_POST['akses'];

 	$sql = "INSERT INTO tb_login (username,password,akses) VALUES ('$username','$password','$akses')";
 	$query = mysqli_query($conn, $sql);

 	// apakah query simpan berhasil?
 	if( $query ){
 		header('location:../../../admin/admin.php?page=status');
 	}
 	else{
 		header('location:../../../admin/admin.php?page=status');
	}
}
else{
 	die("Akses dilarang...");
}

?>