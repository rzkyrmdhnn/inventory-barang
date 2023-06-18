  <script>
  function showJenis(str) {
      if (str == "") {
          document.getElementById("txtJenis").innerHTML = "";
          // document.getElementById("txtQty").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtJenis").innerHTML = this.responseText;
                  // document.getElementById("txtQty").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","gudang/pesan/getjenis.php?q="+str,true);
          xmlhttp.send();
      }
  }

  function showQty(str) {
      if (str == "") {
          document.getElementById("txtQty").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtQty").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","gudang/pesan/getqty.php?q="+str,true);
          xmlhttp.send();
      }
  }
  </script>
<?php
  include "../../../config/koneksi.php";
  $id=$_GET['id'];
  //$sql = "SELECT DISTINCT tb_pesan.*,tb_supplier.supplier,tb_supplier.kdsup,tb_gudang.kdbarang,tb_gudang.barang FROM tb_pesan,tb_supplier,tb_gudang WHERE tb_pesan.kdbarang = tb_gudang.kdbarang AND tb_pesan.kdsup = tb_supplier.kdsup WHERE tb_pesan.id='$id'";
  $sql = "SELECT * FROM tb_pesan WHERE id='$id'";
  $query = mysqli_query($conn,$sql);
  $r = mysqli_fetch_array($query);
?>

<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <h4 class="modal-title label-warning" id="mysuratLabel"><center>Edit pesan</center></h4>
    </div>

    <div class="modal-body">
      <form action="../controller/admin/pesan/edit.php" name="surat_popup" enctype="multipart/form-data" method="POST">

          <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>


                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="barang">Barang</label>
                  <select name="kdbarang" id="kdbarang" class="form-control" required onchange="showJenis(this.value);showQty(this.value);">
                      <?php

                        include "../config/koneksi.php";
                          $kdbarang = $r['kdbarang'];
                          $query = "SELECT * FROM tb_gudang WHERE kdbarang = '$kdbarang'";
                          $hasil = mysqli_query($conn, $query);
                          while ($qtabel = mysqli_fetch_assoc($hasil))
                          { 
                            echo '<option value="'.$qtabel['id'].'">'.$qtabel['barang']." (".$qtabel['jenis'].")".'</option> ';    
                          }

                          $query = "SELECT * FROM tb_gudang ORDER BY id ASC";
                          $hasil = mysqli_query($conn, $query);
                          while ($qtabel = mysqli_fetch_assoc($hasil))
                          { 
                            echo '<option value="'.$qtabel['id'].'">'.$qtabel['barang']." (".$qtabel['jenis'].")".'</option> ';    
                          }
                      ?>
                  </select>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="kdsup">Supplier</label>
                  <select name="kdsup" id="kdsup" class="form-control" required>
                     <!-- <option value="" class="form-control">::Supplier::</option> -->
                      <?php
                          $kdsup = $r['kdsup'];
                          $query = "SELECT * FROM tb_supplier WHERE kdsup = '$kdsup'";
                          $hasil = mysqli_query($conn, $query);
                          while ($qtabel = mysqli_fetch_assoc($hasil))
                          { 
                            echo '<option value="'.$qtabel['kdsup'].'">'.$qtabel['supplier'].'</option> ';    
                          }

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
                   <input name="qty"  class="form-control" placeholder="Title" value="<?php echo $r['qty']; ?>" required/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                   <div id="txtJenis"></div>
                   <div id="txtQty"></div>
                   <!-- <input name="jenis"  class="form-control" placeholder="Title" value="<?php //echo $r['jenis']; ?>" required/></input> -->
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargab">Harga Beli</label>
                   <input name="hargab"  class="form-control" placeholder="Title" value="<?php echo $r['hargab']; ?>"  required/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="total">Total</label>
                   <input name="total"  class="form-control" placeholder="Title" value="<?php echo $r['total']; ?>"  required/></input>
                </div>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit" name="simpan2">
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