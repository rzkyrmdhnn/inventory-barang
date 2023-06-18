
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','pergudangan');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"pergudangan");
$sql="SELECT * FROM tb_gudang WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {

?>
<!-- <input name='harga' readonly="true" class='form-control' placeholder='Jenis' value='<?php //echo $row["harga"]; ?>' required/></input> -->
<label><?php echo "(Harga standard :".$row["hargab"].")"; ?></label>
<?php
}
// echo "</table>";

mysqli_close($con);
?>

</body>
</html> 