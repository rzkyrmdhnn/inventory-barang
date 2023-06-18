<?php
ini_set('display_errors',0);  
include "../config/koneksi.php"; 

$usernya   = $_POST['user'];
$passnya   = $_POST['pass'];

$sql = "SELECT * FROM tb_login WHERE username='$usernya' AND password='$passnya'";
$query = mysqli_query($conn, $sql);

$ketemu = mysqli_num_rows($query);

// Apabila username dan password ditemukan
if ($ketemu > 0){ 
	// echo "user ditemukan : $r[username]";;
  while($r = mysqli_fetch_array($query)){

        session_start();
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password'];
        $akses = $r['akses'];

  	  	if ($akses=='admin'){
	    	header('location:../admin/admin.php?page=barang'); 
		}
		elseif ($akses == 'kasir'){
			header('location:../admin/kasir.php?page=barangksr'); 
		}
		elseif ($akses == 'direktur'){
			header('location:../admin/direktur.php?page=barangksr'); 
		}
	}
}     /*iki arah tujuan nek login berhasil */
else{
?>
	<script>alert("Login gagal!");document.location.href="../index.php"</script>
<?php
    	echo mysqli_error();
    }
?>
