<?php
include "../../../config/koneksi.php";

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan2'])){
	
	//ambil data dari formulir
	$id = $_POST['id'];
	$kdbarang = $_POST['kdbarang'];
	$kdbrand = $_POST['kdbrand'];
	$tanggal = $_POST['tanggal'];
	$barang = $_POST['barang'];
	$kdsup = $_POST['kdsup'];
	$qty = $_POST['qty'];
	$jenis = ucfirst($_POST['jenis']);
	$hargab = $_POST['hargab'];
	$hargaj = $_POST['hargaj'];
	
	// buat query update
	$sql = "UPDATE tb_gudang SET kdbarang = '$kdbarang',kdbrand = '$kdbrand',tanggal = '$tanggal',barang = '$barang',kdsup = '$kdsup',qty = '$qty',jenis = '$jenis',hargab = '$hargab',hargaj = '$hargaj' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);

	// apakah query update berhasil?
	if( $query ){
	// kalau berhasil alihkan ke halaman index.php
		header('location:../../../admin/admin.php?page=barang');
	}
	 
	else{
		header('location:../../../admin/admin.php?page=barang');
	}

}
else{

	// kalau gagal tampilkan pesan
	die("Gagal menyimpan perubahan...");
	 
	die("Akses dilarang...");
}

?>