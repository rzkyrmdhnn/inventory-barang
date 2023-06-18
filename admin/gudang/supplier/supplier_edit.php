<?php
  include "../../../config/koneksi.php";
  $id=$_GET['id'];
  $sql = "SELECT * FROM tb_supplier WHERE id='$id'";
  $query = mysqli_query($conn,$sql);
  while($r = mysqli_fetch_array($query)){
?>

<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">
    <h4 class="modal-title" id="mysuratLabel">Edit Supplier</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    </div>

    <div class="modal-body">
      <form action="../controller/admin/supplier/edit.php" name="surat_popup" enctype="multipart/form-data" method="POST">

          <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="supplier">Supplier</label>
                   <input name="supplier"  class="form-control" placeholder="Title" value="<?php echo $r['supplier']; ?>" required/></input>
                </div>
                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="alamat">Alamat</label>
                   <input name="alamat"  class="form-control" placeholder="Title" value="<?php echo $r['alamat']; ?>" required/></input>
                </div>
                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="kontak">Kontak</label>
                   <input name="kontak"  class="form-control" placeholder="Title" value="<?php echo $r['kontak']; ?>" required/></input>
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
      <?php } ?>
    </div>
</div>
</div>