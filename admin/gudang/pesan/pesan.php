<?php 
  //menampilkan data mysqli
  $curdate = date("Y-m-");
  $curdate2 = date("Ymd"); 
  $curdate3 = date("Y-m-d");
  include "../config/koneksi.php";
  $sql = "SELECT * FROM tb_pesan WHERE tanggal like '%$curdate%' ORDER BY id ASC";
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
    var kdorder = document.getElementById("kdorder");

    // var acak = '<?php echo rand(111, 999999); ?>';
    var acak = '<?php echo $curdate2.$urut ?>'
    var acak2 = "ORD - "+acak;

    kdorder.value= acak2;
  // id_jaminan.value= acak3;
  } 

  function perkalian(){    

    a=eval(modal_popup.qty.value); 
    b=eval(modal_popup.hargab.value); 
    c=a*b 
    modal_popup.total.value = c; 

  } 

  function perkalian2(){    

    a=eval(edit_popup.qty.value); 
    b=eval(edit_popup.hargab.value); 
    c=a*b 
    edit_popup.total.value = c; 

  } 

</script>

</head>
<body>
 
<h1><span class="text-gray-800">Pemesanan barang</span></h1>
<center>
<?php    
  include "../config/koneksi.php";
  $sql = mysqli_query($conn,"SELECT SUM(total) FROM tb_pesan WHERE kdorder=''");
  $r = mysqli_fetch_array($sql);
  echo '<h3>Total : <b>Rp.'.$r['SUM(total)'].',00 </b></h3>'; 
?>
</center>
<br>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h6 class="text-grey-600">Data Pemesanan Barang</h6>
        <form action="../report/lappesan.php" class="d-none d-sm-inline-block btn-primary shadow-sm" name="surat_popup" enctype="multipart/form-data" method="POST">
          <!-- <form action="" name="surat_popup" enctype="multipart/form-data" method="POST"> -->
          <input type="hidden" name="kdorder" id="kdorder"  class="form-control" placeholder="Kode Order" required/></input> 
            <button class="btn btn-sm" type="submit" name="btn_lanjut" id="btn_lanjut" onclick="return autoNumber()">
              <i class="fas fa-print text-white"> Cetak</i>
            </button>
        </form>
    </div>
    <h6><a href="#" class="btn btn-primary btn-sm mt-2" data-target="#ModalAdd" data-toggle="modal" onclick="return autoNumber()">
    <i class="fas fa-fw fa-plus"></i> Tambah</a></h6>
</div>
<div class="card-body">
    <div class="table-responsive">
      <table id="example" class="table table-bordered table-striped table-hover text-gray-900">
    <thead>
      <th>No</th>
      <!-- <th width="180">Kode order</th> -->
      <th>Tanggal</th>
      <th>Brand</th>
      <th>Barang</th>
      <th>Supplier</th>
      <th>Jumlah</th>
      <th>Jenis</th>
      <th>Harga beli</th>
      <th>Total</th>
      <th>Edit</th>
      <th>Hapus</th>
    </thead>
<?php 
  //menampilkan data mysqli

  
  $no = 0;
  $sql = "SELECT DISTINCT tb_pesan.*,tb_supplier.supplier,tb_supplier.kdsup,tb_gudang.kdbarang,tb_gudang.barang,tb_gudang.kdbrand,tb_brand.kdbrand,tb_brand.brand, tb_brand.jenis FROM tb_pesan,tb_supplier,tb_gudang,tb_brand WHERE tb_pesan.kdbarang = tb_gudang.kdbarang AND tb_pesan.kdsup = tb_supplier.kdsup AND tb_gudang.kdbrand = tb_brand.kdbrand AND tb_pesan.kdorder=''";
  // $sql = "SELECT * FROM tb_pesan ORDER BY id ASC";
  $query = mysqli_query($conn,$sql);
  while($r = mysqli_fetch_array($query)){
  $no++;       
  $id_edit = $r['id'];
?>
  <tr>
      <td><?php echo $no; ?></td>
      <!-- <td><?php //echo  $r['kdorder']; ?></td> -->
      <td><?php echo  $r['tanggal']; ?></td>
      <td><?php echo  $r['brand']; ?></td>
      <td><?php echo  $r['barang']; ?></td>
      <td><?php echo  $r['supplier']; ?></td>
      <td><?php echo  $r['qty']; ?></td>
      <td><?php echo  $r['jenis']; ?></td>
      <td><?php echo  $r['hargab']; ?></td>
      <td><?php echo  $r['total']; ?></td>
      <td>
      <center><img src="../images/icons/edit.png" width="35" height="35" class='open_modal' id='<?php echo  $r['id']; ?>'></center>
         <!-- <a href="#" class='open_modal btn btn-warning' id='<?php echo  $r['id']; ?>'>Edit</a> -->
         <!-- <center><a href="#" class="btn btn-info" data-target="#ModalEdit" data-toggle="modal" onclick="return autoNumber()">Edit</a></center>  -->
      </td>
      <td>
      <center><img src="../images/icons/delete.png" width="35" height="35" class="hapus" onclick="confirm_modal('../controller/admin/pesan/delete.php?&id=<?php echo  $r['id']; ?>');"></center>
         <!-- <a href="#" class="btn btn-danger" onclick="confirm_modal('../controller/admin/pesan/delete.php?&id=<?php echo  $r['id']; ?>');">Delete</a> -->
      </td>
  </tr>
 

<?php } ?>
</table>



<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title label-success" id="myModalLabel">Tambah Order</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>

        <div class="modal-body">
          <form action="../controller/admin/pesan/save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        
                <input name="id"  type="hidden" class="form-control" placeholder="id" value="<?php echo $r['id']; ?>" required/></input>

                
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="barang">Barang</label>
                  <select name="kdbarang" id="kdbarang" class="form-control" required onchange="showJenis(this.value);showQty(this.value);showHarga(this.value);">
                  <option value="" class="form-control">::Barang::</option>
                      <?php

                        include "../config/koneksi.php";

                          $query = "SELECT * FROM tb_gudang ORDER BY barang ASC";
                          $hasil = mysqli_query($conn, $query);
                          while ($qtabel = mysqli_fetch_assoc($hasil))
                          { 
                            echo '<option value="'.$qtabel['id'].'">'.$qtabel['barang']." (".$qtabel['jenis'].")".'</option> ';    
                          }
                      ?>
                  </select>
                  
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="kdsup">Supplier</label>
                  <select name="kdsup" id="kdsup" class="form-control" required>
                     <option value="" class="form-control">::Supplier::</option>
                      <?php
                          $query = "SELECT * FROM tb_supplier ORDER BY supplier ASC";
                          $hasil = mysqli_query($conn, $query);
                          while ($qtabel = mysqli_fetch_assoc($hasil))
                          { 
                            echo '<option value="'.$qtabel['kdsup'].'">'.$qtabel['supplier'].'</option> ';    
                          }
                      ?>
                  </select>                
                  </div>
                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="qty">Qty</label>
                  <div id="txtQty"><h4></h4></div>
                   <input name="qty"  class="form-control" placeholder="Qty" required onkeyup="perkalian()" onkeypress="return isnumberkey(event)"/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                   <div id="txtJenis"></div>
                   <!-- <input name="jenis"  class="form-control" placeholder="Title" required/></input> -->
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargab">Harga Beli</label>
                  <div id="txtHarga"></div>
                   <input name="hargab"  class="form-control" placeholder="Harga" required onkeypress="return isnumberkey(event)" onkeyup="perkalian()" /></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="total">Total</label>
                   <input name="total" readonly="true" class="form-control" placeholder="Title"/></input>
                </div>

             

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

<!--  Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "gudang/pesan/pesan_edit.php",
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
 $(document).ready(function() {
    $('#example').DataTable();
} );</script>

</body>
</html>