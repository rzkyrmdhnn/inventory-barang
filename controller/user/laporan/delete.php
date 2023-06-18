<?php
include "../../../config/koneksi.php";
if(isset($_GET['id'])){
 	// ambil id dari query string
	$id = $_GET['id'];
 	// buat query hapus
 	$sql = "DELETE FROM tb_transaksi WHERE id='$id'";
 	$query = mysqli_query($conn, $sql);

 	// apakah query hapus berhasil?
 	if($query){
 		header('location:../../../admin/kasir.php?page=transaksic');
 	}
 	else {
 		die("gagal menghapus...");
 	}
}
else{
 	die("akses dilarang...");
}
?>