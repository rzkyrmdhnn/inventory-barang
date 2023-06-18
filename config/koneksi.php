<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "pergudangan";

	$conn = mysqli_connect($host, $user, $pass, $db);
	// $koneksi = mysqli_connect("localhost","root","","pergudangan");
	
	if( !$conn){
	die ("Gagal terhubung dengan database: " .
		 mysqli_connect_error ());		
	}
?>