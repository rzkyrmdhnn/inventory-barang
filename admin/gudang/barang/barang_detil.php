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
            <h4 class="modal-title btn btn-success" id="myModalLabel"><center>Lihat detil</center></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>

        <div class="modal-body">
          <input name="id"  type="hidden" class="form-control" placeholder="Team name" value="<?php echo $r['id']; ?>" required/></input>
          <table class="table table-bordered">
	          <tr>
          		<td><label for="brand">Kode barang</label></td>
          		
                <td><?php echo $r['kdbarang']; ?></td>
	          </tr>
	          <tr>
                <td><label for="brand">Tanggal input  </label></td>
                
                <td><?php echo $r['tanggal']; ?></td>
              </tr>
              <tr>
                <td><label for="brand">Brand</label></td>
                
                <td><?php echo $r['brand']; ?></td>
              </tr>
              <tr>
	            <td><label for="barang">Barang</label></td>
	            
	            <td><?php echo $r['barang']; ?></td>
              </tr>
              <tr> 
                <td><label for="kdsup">Supplier</label></td>
                
                <td><?php echo $r['supplier']; ?></td>
              </tr>
              <tr> 
                <td><label for="qty">Qty</label></td>
                
                <td><?php echo $r['qty']; ?></td>
              </tr>
              <tr>
                <td><label for="jenis">Jenis</label></td>
                
                <td><?php echo $r["jenis"]; ?></td>
              </tr>                  
              <tr>
                 <td><label for="hargab">Harga Beli (satuan)</label></td>
                 
                 <td><?php echo $r['hargab']; ?></td>
              </tr>
              <tr>
                <!-- <td><label for="hargaj">Harga Jual</label></td>
                	
                <td><?php echo $r['hargaj']; ?></td> -->
              </tr>
        </div>
    </div>
</div>