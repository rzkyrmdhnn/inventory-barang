<?php 
  //menampilkan data mysqli
  $curdate = date("Y-m-");
  $curdate2 = date("Ymd"); 
  $curdate3 = date("Y-m-d");
  include "../config/koneksi.php";
  $sql = "SELECT * FROM tb_gudang WHERE tanggal like '%$curdate%' ORDER BY id ASC";
  $query = mysqli_query($conn,$sql); 
  $urut =  mysqli_num_rows($query); 
    
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
<script type="text/javascript">
  function isnumberkey(evt){
    var charcode = (evt.which) ? evt.which : event.keyCode
    if (charcode > 31 && (charcode < 48 || charcode > 57))
      return false;
    return true;
  }  
  function autoNumber(){    
    var kdbarang = document.getElementById("kdbarang");

    // var acak = '<?php echo rand(111, 999999); ?>';
    var acak = '<?php echo $curdate2.$urut ?>'
    var acak2 = "GUD - "+acak;

    kdbarang.value= acak2;
  // id_jaminan.value= acak3;s
  } 
</script>

</head>
<body>

<h1 class="h3 text-gray-800">Barang</h1>

<br>
<?php 
  // $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  // echo $url; 
?>
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="text-grey-500">Data Barang</h6>
  <h6><a href="#" class="btn btn-primary btn-sm mt-2" data-target="#ModalAdd" data-toggle="modal" onclick="return autoNumber()">
  <i class="fas fa-fw fa-plus"></i> Tambah</a></h6>
</div>
<div class="card-body">
    <div class="table-responsive">
      <table id="example" class="table table-bordered table-striped table-hover text-gray-900">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode barang</th>
          <th>Nama barang</th>
          <th>Supplier</th>
          <th>Jumlah</th>
          <th>Jenis</th>
          <th>Brand</th>
          <th>Tanggal</th>
          <th>Detail</th>
          <th>Edit</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
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
        <td>
        <center><img src="../images/icons/detil.png" width="40" height="40" class='detil_modal' id='<?php echo  $r['id']; ?>'></center>
        </td>
        <td>
        <center><img src="../images/icons/edit.png" width="40" height="40" class='open_modal' id='<?php echo  $r['id']; ?>'></center>
        </td>
        <td>
          <center><img src="../images/icons/delete.png" width="40" height="40" class="hapus" onclick="confirm_modal('../controller/admin/barang/delete.php?&id=<?php echo  $r['id']; ?>');"></center>
        </td>
    </tr>
  

  <?php } ?>
  </tbody>
  </table>

    </div>
  </div>
</div>



<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Tambah Barang</h5>
              <button class="close" type="button" data-dismiss="modal" aria-hidden="true">
                <span aria-hidden="true">×</span>
              </button>
        </div>

        <div class="modal-body">
          <form action="../controller/admin/barang/save.php" name="modal_popup" enctype="multipart/form-data" method="POST">

                <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>
                

                  <!-- <label for="kdbarang">Kd barang</label> -->
                   <input type="hidden" name="kdbarang"  class="form-control" placeholder="Kode barang" id="kdbarang" required/></input>



                  <!-- <label for="tanggal">Tanggal</label> -->
                  <input type="hidden" name="tanggal" id="idTourDateDetails"  value="<?php echo $curdate3; ?>" class="form-control clsDatePicker" data-date-format="yyyy-mm-dd" language="de">
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="kdbrand">Brand</label>
                  <select name="kdbrand" id="kdbrand" class="form-control" required onchange="showJenis3(this.value);">
                  <option value="" class="form-control">::Brand::</option>
                  
                      <?php

                        include "../config/koneksi.php";

                          $query = "SELECT * FROM tb_brand ORDER BY brand ASC";
                          $hasil = mysqli_query($conn, $query);
                          while ($qtabel = mysqli_fetch_assoc($hasil))
                          { 
                            echo '<option value="'.$qtabel['kdbrand'].'">'.$qtabel['brand'].' ('.$qtabel['jenis'].')'.'</option> ';    
                          }
                      ?>
                  </select>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="barang">Nama Barang</label>
                   <input name="barang"  class="form-control" placeholder="Barang" required/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="kdsup">Supplier</label>
                  <select name="kdsup" id="kdsup" class="form-control" required>
                  <option value="" class="form-control">::Supplier::</option>
                      <?php

                        include "../config/koneksi.php";

                          $query = "SELECT * FROM tb_supplier ORDER BY id ASC";
                          $hasil = mysqli_query($conn, $query);
                          while ($qtabel = mysqli_fetch_assoc($hasil))
                          { 
                            echo '<option value="'.$qtabel['kdsup'].'">'.$qtabel['supplier'].'</option> ';    
                          }
                      ?>
                  </select>
                </div>
                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="qty">Jumlah</label>
                   <input name="qty" type="number" min="1" max="999"  class="form-control" placeholder="Jumlah" required onkeypress="return isnumberkey(event)" /></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                  <div id="txtJenis3"></div>
                  <!-- <input name="jenis"  class="form-control" placeholder="Jenis" required/></input> -->
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargab">Harga Beli (satuan)</label>
                   <input name="hargab"  class="form-control" placeholder="Harga beli" required onkeypress="return isnumberkey(event)"/></input>
                </div>
                <!-- <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargaj">Harga Jual</label>
                   <input name="hargaj"  class="form-control" placeholder="Harga beli" required onkeypress="return isnumberkey(event)"/></input>
                </div> -->

             

              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit" name="simpan">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-secondary"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<div id="ModalDetil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
      <h5 class="modal-title" style="text-align:center;">Apa yakin akan di Hapus ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
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

   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "gudang/barang/barang_edit.php",
             type: "GET",
             data : {id: m,},
             success: function (ajaxData){
               $("#ModalEdit").html(ajaxData);
               $("#ModalEdit").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<script type="text/javascript" src="../asset/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>
<link type="text/javascript" rel="stylesheet" href="../asset/js/bootstrap-datepicker3.min.css"/>

<script type="text/javascript">  
$('#idTourDateDetails').datepicker({
language: "id"
 });</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>

</body>
</html>