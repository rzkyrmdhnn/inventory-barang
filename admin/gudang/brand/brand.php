<?php 
  //menampilkan data mysqli
  $curdate = date("Y-m-");
  $curdate2 = date("Ymd"); 
  $curdate3 = date("Y-m-d");
  include "../config/koneksi.php";
  $sql = "SELECT * FROM tb_brand ORDER BY id ASC";
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
    var kdbrand = document.getElementById("kdbrand");

    // var acak = '<?php echo rand(111, 999999); ?>';
    var acak = '<?php echo $curdate2.$urut ?>'
    var acak2 = "BR - "+acak;

    kdbrand.value= acak2;
  // id_jaminan.value= acak3;
  } 
</script>

</head>
<body>
 
<h1><span class="h3 text-gray-800">Brand</span></h1></br>

<?php 
  // $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  // echo $url; 
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="text-grey-600">Data Brand</h6>
    <h6><a href="#" class="btn btn-primary btn-sm mt-2" data-target="#ModalAdd" data-toggle="modal" onclick="return autoNumber()">
    <i class="fas fa-fw fa-plus"></i> Tambah</a></h6>
  </div>
<div class="card-body">
    <div class="table-responsive">
    <table id="example" class="table table-bordered table-striped table-hover text-gray-900">
        <thead>
          <th>No</th>
          <th>Kode brand</th>
          <th>Brand</th>
          <th>Jenis</th>
          <th>Edit</th>
          <th>Hapus</th>
        </thead>
    <?php 
      //menampilkan data mysqli

      include "../config/koneksi.php";
      $no = 0;
      // $sql = "SELECT tb_gudang.*,tb_supplier.distributor FROM tb_gudang INNER JOIN tb_supplier ON tb_gudang.kddistri = tb_supplier.kddistri";
      $sql = "SELECT * FROM tb_brand";
      $query = mysqli_query($conn,$sql);
      while($r = mysqli_fetch_array($query)){
      $no++;     
    ?>
      <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo  $r['kdbrand']; ?></td>
          <td><?php echo  $r['brand']; ?></td>
          <td><?php echo  $r['jenis']; ?></td>
          <td>
          <center><img src="../images/icons/edit.png" width="35" height="35" class='open_modal' id='<?php echo  $r['id']; ?>'></center>
          </td>
          <td>
          <center><img src="../images/icons/delete.png" width="35" height="35" onclick="confirm_modal('../controller/admin/brand/delete.php?&id=<?php echo  $r['id']; ?>');"></center>
          </td>
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
            <h4 class="modal-title label-success" id="myModalLabel"><center>Tambah Brand</center></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>

        <div class="modal-body">
          <form action="../controller/admin/brand/save.php" name="modal_popup" enctype="multipart/form-data" method="POST">

                <input name="id"  type="hidden" class="form-control" placeholder="" value="<?php echo $r['id']; ?>" required/></input>
                

                  <!-- <label for="kdbrand">Kd brand</label> -->
                   <input type="hidden" name="kdbrand"  class="form-control" placeholder="Kode brand" id="kdbrand" required/></input>



                  <!-- <label for="tanggal">Tanggal</label> -->
                   <!-- <input type="hidden" name="tanggal" id="idTourDateDetails"  value="<?php //echo $curdate3; ?>" class="form-control clsDatePicker" data-date-format="yyyy-mm-dd" language="de"> -->

                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="brand">Brand</label>
                   <input name="brand"  class="form-control" placeholder="Brand" required/></input>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis">Jenis</label>
                  <input name="jenis" class="form-control" placeholder="Jenis" required/></input>
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
    			   url: "gudang/brand/brand_edit.php",
    			   type: "GET",
    			   data : {id: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
  $(document).ready(function() {
    var opt = $("#jenis option").sort(function(a,b){return a.value.toUpperCase().localeCompare(b.value.toUpperCase())});
    $("#jenis").append(opt);
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