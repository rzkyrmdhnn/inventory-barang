<?php
include "../../../config/koneksi.php";

// cek apakah tombol submit sudah diklik atau blum?
if(isset($_POST['simpan'])){
 	// ambil data dari formulir
	$kdorder = $_POST['kdorder'];

	$kdbarang = $_POST['kdbarang'];
	$qbarang = mysqli_query($conn,"SELECT kdbarang FROM tb_gudang WHERE id = '$kdbarang'");
	$r = mysqli_fetch_array($qbarang);
	$kdbarang2 = $r['kdbarang'];

	$kdsup = $_POST['kdsup'];
	$qty = $_POST['qty'];
	$jenis = $_POST['jenis'];
	$hargab = $_POST['hargab'];
	$total = $_POST['total'];

 	$sql = "INSERT INTO tb_pesan (kdorder,kdbarang,kdsup,qty,jenis,hargab,total) VALUES ('$kdorder','$kdbarang2','$kdsup','$qty','$jenis','$hargab','$total')";
 	$query = mysqli_query($conn, $sql);

 	// apakah query simpan berhasil?
 	if( $query ){
 		header('location:../../../admin/admin.php?page=pesan');
 	}
 	else{
 		header('location:../../../admin/admin.php?page=pesan');
	}
}
else{
 	die("Akses dilarang...");
}

?>