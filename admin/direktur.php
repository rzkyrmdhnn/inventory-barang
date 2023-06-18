<?php
session_start();
if(empty($_SESSION['username'])){
  ?>
  <script>alert("Silahkan login terlebih dahulu!");document.location.href="../index.php"</script>
  <?php
}else{
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>K1 - Direktur</title>
  <link href="../images/icon.png" rel="shortcut icon" type="image/x-icon"/ >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../asset/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../asset/css/bootstrap/bootstrap-theme.min.css">
  <script src="../asset/js/jquery.min.js"></script>
  <script src="../asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../asset/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../asset/datatables/dataTables.bootstrap.min.js"></script>
  
   <script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
  </script>

  <?php include 'retrievedir.php'; ?>

  <style>
  
    /* Add a gray background color and some padding to the footer */
    footer {
     background-color: #F3F8F4;

    }
    
    header {
    /*background:url('images/header.jpg');
    height: 300px;*/
    /*background:url('../images/header.jpg') repeat-x;*/

  }

  img{
    width: 100%;
    height: auto;
  }
    
    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      min-height: 200px;
    }


    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
  </style>

</head>
<body>
<header>
  <!-- <img src="../images/header.jpg" width="auto" height="auto"> -->
</header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      </div>
    <div class="collapse navbar-collapse dropdown" id="myNavbar">
      <ul class="nav navbar-nav ">
      <?php 
          $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
          $distributor = "http://localhost/sanggarkrida/admin/admin.php?page=distributor";
          $pesan = "http://localhost/sanggarkrida/admin/admin.php?page=pesan";
          $pesanr = "http://localhost/sanggarkrida/admin/admin.php?page=pesanr";
          $barang = "http://localhost/sanggarkrida/admin/admin.php?page=barang";
          $barangc = "http://localhost/sanggarkrida/admin/admin.php?page=barangc";
          $grafik = "http://localhost/sanggarkrida/admin/admin.php?page=grafik";
          $transaksi = "http://localhost/sanggarkrida/admin/kasir.php?page=transaksi";
          $transaksic = "http://localhost/sanggarkrida/admin/kasir.php?page=transaksic";

          // include "../config/koneksi.php";
      ?>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Barang<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php if($url==$barang) : ?>
                  <li class="active"><a href="?page=barangksr">Barang Gudang</a></li> 
                <?php else : ?>
                  <li><a href="?page=barangksr">Barang Gudang</a></li> 
                <?php endif; ?>     

                <?php if($url==$barangc) : ?>
                  <li class="active"><a href="?page=barangc">Laporan</a></li> 
                <?php else : ?>
                  <li><a href="?page=barangc">Laporan</a></li> 
                <?php endif; ?>                          
            </ul>
        </li>

        <?php if($url==$distributor) : ?>
          <li class="active"><a href="?page=distributor">Distributor</a></li> 
        <?php else : ?>
          <li><a href="?page=distributor">Distributor</a></li> 
        <?php endif; ?>

        <?php if($url==$transaksi) : ?>
          <li class="active"><a href="?page=transaksic">Rekap transaksi</a></li>
        <?php else : ?>
          <li><a href="?page=transaksic">Rekap transaksi</a></li>
        <?php endif; ?>

        <?php if($url==$pesan) : ?>
          <li class="active"><a href="?page=pesanr">Rekap pesan</a></li>
        <?php else : ?>
          <li><a href="?page=pesanr">Rekap pesan</a></li>
        <?php endif; ?>

        <?php if($url==$grafik) : ?>
          <li class="active"><a href="?page=grafik">Grafik</a></li>
        <?php else : ?>
          <li><a href="?page=grafik">Grafik</a></li>
        <?php endif; ?>
 
 

        </ul>

              <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout </a></li></ul>
    </div>
  </div>
</nav>

</div>

<?php
  
?>

<section>

<?php include 'pages.php'; ?>
</section>



<footer>
<pre><center>Mustagfirin Prasanta 2018 <a href="">all rights reserved </a></center></pre>
<!-- Welcome <?php 
// include 'pengguna.php';
// echo $_SESSION['namauser']
?> -->
</footer>
</body>
