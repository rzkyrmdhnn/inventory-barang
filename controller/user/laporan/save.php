<?php
include "../../../config/koneksi.php";

// cek apakah tombol submit sudah diklik atau blum?
if(isset($_POST['simpan'])){
 	// ambil data dari formulir
	$nik = $_POST['nik'];
	$alamat = $_POST['alamat'];
	$nama = $_POST['nama'];
	$tgl = $_POST['tanggal'];
	$jk = $_POST['jk'];

 	$sql = "INSERT INTO tb_customer (nik,alamat,nama,tgl_lhr,jk) VALUES ('$nik','$alamat','$nama','$tgl','$jk')";
 	$query = mysqli_query($conn, $sql);

 	// apakah query simpan berhasil?
 	if( $query ){
 		header('location:../../../admin/kasir.php?page=customer');
 	}
 	else{
 		header('location:../../../admin/kasir.php?page=customer');
	}
}
else{
 	die("Akses dilarang...");
}

?>