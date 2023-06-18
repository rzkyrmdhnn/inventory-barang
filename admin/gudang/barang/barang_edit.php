<?php
  include "../../../config/koneksi.php";
  $id=$_GET['id'];
  // $sql = "SELECT tb_gudang.*,tb_supplier.supplier FROM tb_gudang INNER JOIN tb_supplier ON tb_gudang.kdsup = tb_supplier.kdsup WHERE tb_gudang.id='$id'";
  $sql = "SELECT tb_gudang.*,tb_supplier.supplier,tb_brand.kdbrand,tb_brand.brand FROM tb_gudang,tb_supplier,tb_brand WHERE tb_gudang.kdsup = tb_supplier.kdsup AND tb_gudang.kdbrand = tb_brand.kdbrand AND tb_gudang.id='$id'";
  $query = mysqli_query($conn,$sql);
  $r = mysqli_fetch_array($query);
  

?>

<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Gudang</h5>
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">
              <span aria-hidden="true">×</span>
            </button>
    </div>

    <div class="modal-body">
      <form action="../controller/admin/barang/edit.php" name="surat_popup" enctype="multipart/form-data" method="POST">

          <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>


                   <input type="hidden" name="kdbarang"  class="form-control" placeholder="Kode barang" value="<?php echo $r['kdbarang']; ?>"  required/></input>

                   <input type="hidden" name="tanggal"  class="form-control" placeholder="Tanggal" value="<?php echo $r['tanggal']; ?>" required/></input>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="kdbrand">Brand</label>
                  <select name="kdbrand" id="kdbrand" class="form-control" required onchange="showJenis4(this.value);">
                  <!-- <option value="" class="form-control">::Brand::</option> -->
                  <option value="<?php echo $r['kdbrand']; ?>" class="form-control"><?php echo $r['brand']; ?></option>
                      <?php

                          $query = "SELECT * FROM tb_brand ORDER BY brand ASC";
                          $hasil = mysqli_query($conn, $query);
                          while ($qtabel = mysqli_fetch_assoc($hasil))
                          { 
                            echo '<option value="'.$qtabel['kdbrand'].'">'.$qtabel['brand'].'</option> ';    
                          }
                      ?>
                  </select>
                </div>               
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="barang">Nama Barang</label>
                   <input name="barang"  class="form-control" placeholder="Barang" value="<?php echo $r['barang']; ?>" required/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="kdsup">Supplier</label>
                  <select name="kdsup" id="kdsup" class="form-control" required>
                      <option value="<?php echo $r['kdsup']; ?>" class="form-control"><?php echo $r['supplier']; ?></option>
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
                   <input name="qty"  class="form-control" placeholder="Jumlah" value="<?php echo $r['qty']; ?>" required/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                  <div id="txtJenis4">
                    <input name='jenis' readonly="true" class='form-control' placeholder='Jenis' value='<?php echo $r["jenis"]; ?>'/>
                      </input>
                  </div>
                   <!-- <input name="jenis"  class="form-control" placeholder="Jenis" value="<?php //echo $r['jenis']; ?>" required/></input> -->
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargab">Harga Satuan</label>
                   <input name="hargab"  class="form-control" placeholder="Harga beli" value="<?php echo $r['hargab']; ?>"  required/></input>
                </div>
                <!-- <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hargaj">Harga Jual</label>
                   <input name="hargaj"  class="form-control" placeholder="Harga jual" value="<?php echo $r['hargaj']; ?>"  required/></input>
                </div> -->

        <div class="modal-footer">
          <button class="btn btn-warning" type="submit" name="simpan2">
          Confirm
          </button>

          <button type="reset" class="btn btn-secondary"  data-dismiss="modal" aria-hidden="true">
          Cancel
          </button>
        </div>

      </form>
      <?php //} ?>
    </div>
</div>
</div>