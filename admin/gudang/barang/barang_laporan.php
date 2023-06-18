<?php 
  //menampilkan data mysqli

  include "../config/koneksi.php";
    
?>


<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>
 
<center><h1 class="h3 mb-0 text-gray-800">Laporan</h1></center>
<div class="modal-dialog">
<div class="modal-content shadow">

    <div class="modal-header"><!-- 
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button> -->
      <h4 class="modal-title label-warning text-gray-800" id="mysuratLabel"><center>Cetak laporan barang</center></h4>
    </div>

    <div class="modal-body">
      <form action="../report/lapbarang.php" name="surat_popup" enctype="multipart/form-data" method="POST">
      <!-- <form action="" name="surat_popup" enctype="multipart/form-data" method="POST"> --> 
          <label for="Modal Name">Tahun/Bulan</label>
          <br>
          <!-- <input required type="text" name="tanggal" id="idTourDateDetails" class="form-control clsDatePicker" data-date-format="yyyy-mm" language="de"> -->
          <input type="text" name="tanggal" id="tanggal" width="100%"></input>
          <h6>Format (yyyy-mm)</h6>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="btn_lanjut" id="btn_lanjut">
            <i class="fas fa-file-pdf"> Cetak</i>
            </button>
          </div>
      </form>

    </div>
</div>
</div>

<br>
<br>
<?php 
  // $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  // echo $url; 
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="text-grey-600">Data Laporan Barang</h6>
  </div>
<div class="card-body">
<div class="table-responsive">
<table id="example" class="table table-bordered table-striped table-hover text-gray-900">
    <thead>
      <th>No</th>
      <th>Kode barang</th>
      <th>Nama barang</th>
      <th>Supplier</th>
      <th>Jumlah</th>
      <th>Jenis</th>
      <th>Brand</th>
      <th>Tanggal</th>
    </thead>
<?php 
  //menampilkan data mysqli

  include "../config/koneksi.php";
  $no = 0;
  $sql = "SELECT tb_gudang.*,tb_supplier.supplier,tb_brand.kdbrand,tb_brand.brand FROM tb_gudang,tb_supplier,tb_brand WHERE tb_gudang.kdsup = tb_supplier.kdsup AND tb_gudang.kdbrand = tb_brand.kdbrand";
  // $sql = "SELECT tb_gudang.*,tb_supplier.supplier FROM tb_gudang INNER JOIN tb_supplier ON tb_gudang.kdsup = tb_supplier.kdsup";
  $query = mysqli_query($conn,$sql);
  while($r = mysqli_fetch_array($query)){
  $no++;     
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['kdbarang']; ?></td>
      <td><?php echo  $r['barang']; ?></td>
      <td><?php echo  $r['supplier']; ?></td>
      <td><?php echo  $r['qty']; ?></td> 
      <td><?php echo  $r['jenis']; ?></td>
      <td><?php echo  $r['brand']; ?></td>
      <td><?php echo  $r['tanggal']; ?></td>
  </tr>
 

<?php } ?>
</table>

      </div>
  </div>
</div>

<script type="text/javascript" src="../asset/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>
<link type="text/javascript" rel="stylesheet" href="../asset/js/bootstrap-datepicker3.min.css"/>

<script type="text/javascript">  $('#idTourDateDetails').datepicker({
language: "id"
 });</script>

 <script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable();
} );</script>

</body>
</html>