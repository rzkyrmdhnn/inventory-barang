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
<h1 class="text-gray-800">Barang Gudang</h1>

<br>
<?php 

?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-grey-600">Data Barang</h6>
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
          <th>Detail</th>
        </thead>
    <?php 
      //menampilkan data mysqli

      include "../config/koneksi.php";
      $no = 0;
      $sql = "SELECT tb_gudang.*,tb_supplier.supplier,tb_brand.kdbrand,tb_brand.brand FROM tb_gudang,tb_supplier,tb_brand WHERE tb_gudang.kdsup = tb_supplier.kdsup AND tb_gudang.kdbrand = tb_brand.kdbrand";

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
          <td>
            <!-- <a href="#" class='detil_modal btn btn-success' id='<?php //echo  $r['id']; ?>'>Detil</a> -->
            <center><img src="../images/icons/detil.png" width="40" height="40" class='detil_modal' id='<?php echo  $r['id']; ?>'></center>
          </td>
      </tr>
    

    <?php } ?>
    </table>

    </div>
  </div>
</div>


<div id="ModalDetil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>


<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".detil_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "gudang/barang/barang_detil.php",
             type: "GET",
             data : {id: m,},
             success: function (ajaxData){
               $("#ModalDetil").html(ajaxData);
               $("#ModalDetil").modal('show',{backdrop: 'true'});
             }
           });
        });
      });

</script>


<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable();
} );</script>

</body>
</html>
