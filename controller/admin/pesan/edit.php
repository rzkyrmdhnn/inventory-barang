<?php
include "../../../config/koneksi.php";

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan2'])){
	
	//ambil data dari formulir
	$id = $_POST['id'];
	// $nota = $_POST['nota'];
	// $tanggal = $_POST['tanggal'];
	// $barang = $_POST['barang'];

	$kdbarang = $_POST['kdbarang'];
	$qbarang = mysqli_query($conn,"SELECT kdbarang FROM tb_gudang WHERE id = '$kdbarang'");
	$r = mysqli_fetch_array($qbarang);
	$kdbarang2 = $r['kdbarang'];

	$kdsup = $_POST['kdsup'];
	$qty = $_POST['qty'];
	$jenis = $_POST['jenis'];
	$hargab = $_POST['hargab'];
	$total = $_POST['total'];
	
	// buat query update
	$sql = "UPDATE tb_pesan SET kdbarang = '$kdbarang2',kdsup = '$kdsup',qty = '$qty',jenis = '$jenis',hargab = '$hargab',total = '$total' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);

	// apakah query update berhasil?
	if( $query ){
	// kalau berhasil alihkan ke halaman index.php
		header('location:../../../admin/admin.php?page=pesan');
	}
	 
	else{
		header('location:../../../admin/admin.php?page=pesan');
	}

}
else{

	// kalau gagal tampilkan pesan
	die("Gagal menyimpan perubahan...");
	 
	die("Akses dilarang...");
}

?>