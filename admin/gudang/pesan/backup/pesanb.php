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
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<meta content="Aguzrybudy" name="author"/>
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

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
    // var qty = eval(document.getElementById("qty").value);
    // var hargab = eval(document.getElementById("hargab").value);
    // var total = document.getElementById("total");

    // var kali = qty * hargab;

    // total.value= kali;
    a=eval(modal_popup.qty.value); 
    b=eval(modal_popup.hargab.value); 
    c=a*b 
    modal_popup.total.value = c; 
  // id_jaminan.value= acak3;
  } 

</script>

</head>
<body>
 
<h1><center><span class="label label-default">Pemesanan barang</span></center></h1></br>
<center><a href="#" class="btn btn-info" data-target="#ModalAdd" data-toggle="modal" onclick="return autoNumber()">Add New</a></center> 

<br>
<br>

<table id="example" class="table table-bordered">
    <thead bgcolor="grey">
      <th width="30">No</th>
      <th width="180">Kode order</th>
      <th width="500">Tanggal</th>
      <th width="500">Barang</th>
      <th width="500">Supplier</th>
      <th width="500">Jumlah</th>
      <th width="500">Jenis</th>
      <th width="500">Harga beli</th>
      <th width="500">Total</th>
      <th width="80">Edit</th>
      <th width="80">Hapus</th>
    </thead>
<?php 
  //menampilkan data mysqli

  include "../config/koneksi.php";
  $no = 0;
  $sql = "SELECT DISTINCT tb_pesan.*,tb_supplier.supplier,tb_supplier.kdsup,tb_gudang.kdbarang,tb_gudang.barang FROM tb_pesan,tb_supplier,tb_gudang WHERE tb_pesan.kdbarang = tb_gudang.kdbarang AND tb_pesan.kdsup = tb_supplier.kdsup";
  // $sql = "SELECT * FROM tb_pesan ORDER BY id ASC";
  $query = mysqli_query($conn,$sql);
  while($r = mysqli_fetch_array($query)){
  $no++;       
  $id_edit = $r['id'];
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['kdorder']; ?></td>
      <td><?php echo  $r['tanggal']; ?></td>
      <td><?php echo  $r['barang']; ?></td>
      <td><?php echo  $r['supplier']; ?></td>
      <td><?php echo  $r['qty']; ?></td>
      <td><?php echo  $r['jenis']; ?></td>
      <td><?php echo  $r['hargab']; ?></td>
      <td><?php echo  $r['total']; ?></td>
      <td>
         <a href="#" class='open_modal btn btn-warning' id='<?php echo  $r['id']; ?>'>Edit</a>
         <!-- <center><a href="#" class="btn btn-info" data-target="#ModalEdit" data-toggle="modal" onclick="return autoNumber()">Edit</a></center>  -->
      </td>
      <td>
         <a href="#" class="btn btn-danger" onclick="confirm_modal('../controller/adm_pesan/delete.php?&id=<?php echo  $r['id']; ?>');">Delete</a>
      </td>
  </tr>
 

<?php } ?>
</table>

<?php 
  
  $sql = mysqli_query($conn,"SELECT SUM(total) FROM tb_pesan");
  $r = mysqli_fetch_array($sql);
  echo '<h3>Total transaksi : Rp.'.$r['SUM(total)'].',00 </h3>'; 
?>, 

<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
      
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title label-success" id="myModalLabel"><center>Tambah Order</center></h4>
        </div>

        <div class="modal-body">
          <form action="../controller/admin/pesan/save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        
                <input name="id"  type="hidden" class="form-control" placeholder="id" value="<?php echo $r['id']; ?>" required/></input>

                <input type="hidden" name="kdorder" id="kdorder"  class="form-control" placeholder="Kode Order" required/></input>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="barang">Barang</label>
                  <select name="kdbarang" id="kdbarang" class="form-control" required onchange="showJenis(this.value);showQty(this.value);">
                  <option value="" class="form-control">::Barang::</option>
                      <?php

                        include "../config/koneksi.php";

                          $query = "SELECT * FROM tb_gudang ORDER BY id ASC";
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
                  <label for="qty">Qty</label>
                  <div id="txtQty"><h4></h4></div>
                   <input name="qty"  class="form-control" placeholder="Qty" required onkeyup="perkalian()" onkeypress="return isnumberkey(event)"/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                   <!-- <input name="jenis"  class="form-control" placeholder="Title" required/></input> -->
                   <div id="txtJenis"></div>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargab">Harga Beli</label>
                   <input name="hargab"  class="form-control" placeholder="Harga" required onkeypress="return isnumberkey(event)" onkeyup="perkalian()" /></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="total">Total</label>
                   <input name="total" readonly="true" class="form-control" placeholder="Title"/></input>
                </div>

             

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit" name="simpan">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>

<!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
      
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title label-success" id="myModalLabel"><center>Edit Order</center></h4>
        </div>

        <div class="modal-body">
          <form action="../controller/admin/pesan/save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        
                <input name="id"  type="hidden" class="form-control" placeholder="id" value="<?php echo $r['id']; ?>" required/></input>

                <input type="hidden" name="kdorder" id="kdorder"  class="form-control" placeholder="Kode Order" required/></input>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="barang">Barang</label>
                  <select name="kdbarang" id="kdbarang" class="form-control" required onchange="showJenis2(this.value);showQty2(this.value);">
                  <option value="" class="form-control">::Barang::</option>
                      <?php

                        include "../config/koneksi.php";

                          $query = "SELECT * FROM tb_gudang ORDER BY id ASC";
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
                  <label for="qty">Qty</label>
                  <div id="txtQty2"><h4></h4></div>
                   <input name="qty"  class="form-control" placeholder="Qty" required onkeyup="perkalian()" onkeypress="return isnumberkey(event)"/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                   <!-- <input name="jenis"  class="form-control" placeholder="Title" required/></input> -->
                   <div id="txtJenis2"></div>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargab">Harga Beli</label>
                   <input name="hargab"  class="form-control" placeholder="Harga" required onkeypress="return isnumberkey(event)" onkeyup="perkalian()" /></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="total">Total</label>
                   <input name="total" readonly="true" class="form-control" placeholder="Title"/></input>
                </div>

             

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit" name="simpan">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Apa yakin akan di Hapus ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
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
<link rel="stylesheet" href="../asset/js/bootstrap-datepicker3.min.css"/>

<script>  $('#idTourDateDetails').datepicker({
language: "id"
 });</script>

 <script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable();
} );</script>

</body>
</html>