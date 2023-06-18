<?php
include "../../../config/koneksi.php";

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan2'])){
	
	//ambil data dari formulir
	$id = $_POST['id'];
	$nik = $_POST['nik'];
	$alamat = $_POST['alamat'];
	$nama = $_POST['nama'];
	$tgl_lhr = $_POST['tgl_lhr'];
	$jk = $_POST['jk'];
	
	// buat query update
	$sql = "UPDATE tb_customer SET nik = '$nik',alamat = '$alamat',nama = '$nama',tgl_lhr = '$tgl_lhr',jk = '$jk' WHERE id = '$id'";
	// $sql = "UPDATE customer SET nik = '$nik',nama = '$nama',tgl_lhr = '$tgl_lhr' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);

	// apakah query update berhasil?
	if( $query ){
	// kalau berhasil alihkan ke halaman index.php
		header('location:../../../admin/kasir.php?page=customer');
	}
	 
	else{
		header('location:../../../admin/kasir.php?page=customer');
	}

}
else{

	// kalau gagal tampilkan pesan
	die("Gagal menyimpan perubahan...");
	 
	die("Akses dilarang...");
}

?>