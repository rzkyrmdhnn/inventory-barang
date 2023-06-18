<?php
include "../../../config/koneksi.php";

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan2'])){
	
	//ambil data dari formulir
	$id = $_POST['id'];
	$supplier = $_POST['supplier'];
	$alamat = $_POST['alamat'];
	$kontak = $_POST['kontak'];
	
	// buat query update
	$sql = "UPDATE tb_supplier SET supplier = '$supplier',alamat = '$alamat',kontak = '$kontak' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);

	// apakah query update berhasil?
	if( $query ){
	// kalau berhasil alihkan ke halaman index.php
		header('location:../../../admin/admin.php?page=supplier');
	}
	 
	else{
		header('location:../../../admin/admin.php?page=supplier');
	}

}
else{

	// kalau gagal tampilkan pesan
	die("Gagal menyimpan perubahan...");
	 
	die("Akses dilarang...");
}

?>