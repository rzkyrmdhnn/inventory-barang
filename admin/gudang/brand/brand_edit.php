<body>
<?php
  include "../../../config/koneksi.php";
  $id=$_GET['id'];
  $sql = "SELECT * FROM tb_brand WHERE id='$id'";
  $query = mysqli_query($conn,$sql);
  $r = mysqli_fetch_array($query);
  

?>

<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="editgudang"><center>Edit Brand</center></h5>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    </div>

    <div class="modal-body">
      <form action="../controller/admin/brand/edit.php" name="surat_popup" enctype="multipart/form-data" method="POST">

          <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>


                   <input type="hidden" name="kdbrand"  class="form-control" placeholder="Kode brand" value="<?php echo $r['kdbrand']; ?>"  required/></input>

                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="brand">Brand</label>
                   <input name="brand"  class="form-control" placeholder="brand" value="<?php echo $r['brand']; ?>" required/></input>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                   <input name="jenis"  class="form-control" placeholder="jenis" value="<?php echo $r['jenis']; ?>" required/></input>
                </div>

               
                <!-- <div class="form-group" style="padding-bottom: 20px;">
                 <label for="jenis">Jenis</label>
                  <select name="jenis" id="jenis2" class="form-control" required>
                    <option value="<?php echo $r['jenis']; ?>" class="form-control"><?php echo $r['jenis']; ?></option>
                    <option value="Motherboard" class="form-control">Motherboard</option>
                    <option value="RAM" class="form-control">RAM</option>
                    <option value="Power Supply" class="form-control">Power Supply</option>
                    <option value="Harddisk" class="form-control">Harddisk</option>
                    <option value="DVD-R" class="form-control">DVD-ROM</option>
                    <option value="CPU Casing" class="form-control">CPU Casing</option>
                    <option value="VGA" class="form-control">VGA</option>
                    <option value="Kabel (VGA)" class="form-control">Kabel (VGA)</option>
                    <option value="Kabel (UTP)" class="form-control">Kabel (UTP)</option>
                    <option value="CCTV" class="form-control">CCTV</option>
                    <option value="Processor" class="form-control">Processor</option>
                    <option value="Printer (Inkjet)" class="form-control">Printer (Inkjet)</option>
                    <option value="Printer (Dot Matrix)" class="form-control">Printer (Dot Matrix)</option>
                  </select>
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
<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
  $(document).ready(function() {
    var opt = $("#jenis2 option").sort(function(a,b){return a.value.toUpperCase().localeCompare(b.value.toUpperCase())});
    $("#jenis2").append(opt);
  });
</script>
</body>
