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
 
<h1><span class="h3 text-gray-800">Status Member</span></h1></br>

<?php 
  // $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  // echo $url; 
?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h6 class="text-grey-600">Data Member</h6>
    </div>
    <!-- <?php if ($direktur == "akses") {
      } else { 
    ?> -->
    <a href="#" class="btn btn-primary btn-sm mt-2" data-target="#ModalAdd" data-toggle="modal" onclick="return autoNumber()">
    <i class="fas fa-fw fa-plus"></i> Tambah</a></h6>
    <?php } ?>
  </div>
  <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped table-hover text-gray-900">
      <thead>
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Status</th>
        <!-- <?php if ($direktur == "akses") {
          } else { 
        ?> -->
        <th>Edit</th>
        <th>Hapus</th>
        <?php } ?>
      </thead>
  <?php 
    //menampilkan data mysqli

    include "../config/koneksi.php";
    $no = 0;
    $sql = "SELECT * FROM tb_login ORDER BY id ASC";
    $query = mysqli_query($conn,$sql);
    while($r = mysqli_fetch_array($query)){
    $no++;       
  ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo  $r['username']; ?></td>
        <td><?php echo  $r['password']; ?></td>
        <td><?php echo  $r['akses']; ?></td>
        <!-- <?php if ($direktur == "akses") {
          } else { 
        ?> -->
        <td>
          <center><img src="../images/icons/edit.png" width="35" height="35" class='open_modal' id='<?php echo  $r['id']; ?>'></center>
        </td>
        <td>
          <!-- <a href="#" class="btn btn-danger" onclick="confirm_modal('../controller/admin/status/delete.php?&id=<?php //echo  $r['id']; ?>');">Delete</a> -->
          <center><img src="../images/icons/delete.png" width="35" height="35" class="hapus" onclick="confirm_modal('../controller/admin/status/delete.php?&id=<?php echo  $r['id']; ?>');"></center>
        </td>
        <?php } ?>
    </tr>
  

  <?php } ?>
  </table>

        </div>
    </div>
</div>


<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title label-success" id="myDistriLabel"><center>Tambah Member</center></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>

        <div class="modal-body">
          <form action="../controller/admin/status/save.php" name="modal_popup" enctype="multipart/form-data" method="POST">

                <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>
                
                
                   <input type="hidden" id="kdsup" name="kdsup"  class="form-control" placeholder="" required/></input>
        
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="username">Username</label>
                   <input name="username"  class="form-control" placeholder="Username" required/></input>
                </div>
                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="password">Password</label>
                   <input name="password"  class="form-control" placeholder="Password" required/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="akses">status</label>
                  <select name="akses" class="form-control" required>
                    <option value="" class="form-control">::status::</option>
                    <option value="admin" class="form-control">admin</option>
                    <option value="user" class="form-control">user</option>
                  </select>
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

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Apa yakin akan di Hapus ?</h4>
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
    			   url: "gudang/status/status_edit.php",
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