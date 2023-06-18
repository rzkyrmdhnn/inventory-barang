<?php
include "../../../config/koneksi.php";

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan2'])){
	
	//ambil data dari formulir
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$akses = $_POST['akses'];
	
	// buat query update
	$sql = "UPDATE tb_login SET username = '$username',password = '$password',akses = '$akses' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);

	// apakah query update berhasil?
	if( $query ){
	// kalau berhasil alihkan ke halaman index.php
		header('location:../../../admin/admin.php?page=status');
	}
	 
	else{
		header('location:../../../admin/admin.php?page=status');
	}

}
else{

	// kalau gagal tampilkan pesan
	die("Gagal menyimpan perubahan...");
	 
	die("Akses dilarang...");
}

?>