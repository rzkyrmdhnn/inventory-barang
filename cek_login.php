<?php 
$host = "localhost"; 
$user = "root"; //nama user yang digunakan masuk k database
$password = ""; //password yagn digunakan masuk k database
$database = "pergudangan"; //nama database yang digunakkan
$koneksi = mysqli_connect($host, $user, $password, $database);

//cek koneksi ke database
//jika tidak menampilkan apa-apa artinya koneksi berhasil dilakukan
if (mysqli_connect_errno()){
echo "Koneksi gagal : " . mysqli_connect_error();
}

//mengaktifkan session
session_start();

//mengambil data yang dikirim dari form sebelumnya
$username = $_POST['username'];
$password = $_POST['password'];

//mengambil data tb_login di tabel tb_login
$tb_login = mysqli_query($koneksi, "select * from tb_login where username='$username' and password='$password'");
//menghitung jumlah data
$cek = mysqli_num_rows($tb_login);

//jika username dan password lebih besar dari 0 maka tb_login ditemukan
if($cek > 0){
$data = mysqli_fetch_assoc($tb_login);

//jika tb_login adalah admin
if($data['akses'] == 'admin'){
//buat session username dan levelnya
$_SESSION['username'] = $username;
$_SESSION['akses'] = 'admin';

//arahkan tb_login admin ke halaman admin
header('location:admin/admin.php?page=dashboard');

//jika tb_login adalah user
}elseif($data['akses'] == 'user'){
//buat session username dan levelnya
$_SESSION['username'] = $username;
$_SESSION['akses'] = 'user';

//arahkan tb_login admin ke halaman admin
header('location:admin/user.php?page=dashusr');

}else{
//jika tb_login tidak ditemukan
header("location:index.php?pesan=gagal");
}

}?>