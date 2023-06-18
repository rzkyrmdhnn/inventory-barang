<?php
include "../../../config/koneksi.php";

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan2'])){
	
	//ambil data dari formulir
	$id = $_POST['id'];
	$kdbrand = $_POST['kdbrand'];
	$brand = $_POST['brand'];
	$jenis = $_POST['jenis'];
	
	// buat query update
	$sql = "UPDATE tb_brand SET kdbrand = '$kdbrand',brand = '$brand',jenis = '$jenis' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);

	// apakah query update berhasil?
	if( $query ){
	// kalau berhasil alihkan ke halaman index.php
		header('location:../../../admin/admin.php?page=brand');
	}
	 
	else{
		header('location:../../../admin/admin.php?page=brand');
	}

}
else{

	// kalau gagal tampilkan pesan
	die("Gagal menyimpan perubahan...");
	 
	die("Akses dilarang...");
}

?>