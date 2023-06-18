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
      <h4 class="modal-title label-warning" id="mysuratLabel"><center>Edit pesan</center></h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    </div>

    <div class="modal-body">
      <form action="../controller/admin/pesan/edit.php" name="edit_popup" enctype="multipart/form-data" method="POST">

          <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>


                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="barang">Barang</label>
                  <select name="kdbarang" id="kdbarang" class="form-control" required onchange="showJenis2(this.value);showQty2(this.value);showHarga2(this.value);">
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
                  <div id="txtQty2"></div>
                  <input name="qty" value="<?php echo $r['qty']; ?>"  class="form-control" placeholder="Qty" required onkeyup="perkalian2()" onkeypress="return isnumberkey(event)"/></input>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                   <div id="txtJenis2">
                      <input name='jenis' readonly="true" class='form-control' placeholder='Jenis' value='<?php echo $r["jenis"]; ?>'/>
                      </input>
                    </div>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargab">Harga Beli</label>
                  <div id="txtHarga2"></div>
                   <input name="hargab" value='<?php echo $r["hargab"]; ?>'  class="form-control" placeholder="Harga" required onkeypress="return isnumberkey(event)" onkeyup="perkalian2()" /></input>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="total">Total</label>
                   <input name="total" value='<?php echo $r["total"]; ?>' readonly="true" class="form-control" placeholder="Total"/></input>
                </div>                   

        <div class="modal-footer">
          <button class="btn btn-warning" type="submit" name="simpan2">
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