<?php
  include "../../../config/koneksi.php";
  $id=$_GET['id'];
  $sql = "SELECT * FROM tb_login WHERE id='$id'";
  $query = mysqli_query($conn,$sql);
  while($r = mysqli_fetch_array($query)){
?>

<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">
    <h4 class="modal-title" id="mysuratLabel">Edit Member</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    </div>

    <div class="modal-body">
      <form action="../controller/admin/status/edit.php" name="surat_popup" enctype="multipart/form-data" method="POST">

          <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="username">Username</label>
                   <input name="username"  class="form-control" placeholder="Title" value="<?php echo $r['username']; ?>" required/></input>
                </div>
                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="password">Password</label>
                   <input name="password"  class="form-control" placeholder="Title" value="<?php echo $r['password']; ?>" required/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="akses">Status</label>
                  <select name="akses" class="form-control" required>
                    <option value="" class="form-control">::status::</option>
                    <option value="admin" class="form-control">admin</option>
                    <option value="user" class="form-control">user</option>
                  </select>
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