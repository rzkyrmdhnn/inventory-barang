<?php
session_start();
if(empty($_SESSION['username'])){
  ?>
  <script>alert("Silahkan login terlebih dahulu!");document.location.href="../index.php"</script>
  <?php
}else{
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Barang</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../asset/css/bootstrap/bootstrap-theme.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <script src="../asset/js/jquery.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>

    <?php include "retrieveit.php"?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <?php 
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
                $dashusr = "http://localhost/pergudangan/admin/dash_it.php?page=dashusr";
                $baranggud = "http://localhost/pergudangan/admin/kepala_it.php?page=baranggud";
                // include "../config/koneksi.php";
            ?>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <!-- <div class="sidebar-brand-icon mt-4">
                <img src="../images/inven.png"  width="70" height="70">
                </div> -->
                <div class="mt-3 font-weight-bold">Inventory Barang</div>
            </a>            

            <div class="mt-4"></div>
            <!-- Divider -->
            <hr class="sidebar-divider  my-0 mt-2">


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active mt-4">
                <?php if($url==$dashusr) : ?>
                    <a class="nav-link" href="?page=dashusr">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dasboard</span></a>
                <?php else : ?>
                    <a class="nav-link" href="?page=dashusr">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dasboard</span></a>
                <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider  my-0">
            
            <!-- <li class="nav-item">
                <?php if($url==$customer) : ?>
                    <a class="nav-link" href="?page=customer">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Customer</span></a>
                <?php else : ?>
                    <a class="nav-link" href="?page=customer">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Customer</span></a>
                <?php endif; ?>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item mt-2">
                <?php if($url==$baranggud) : ?>
                    <a class="nav-link" href="?page=baranggud">
                        <i class="fas fa-fw fa-cubes"></i>
                        <span>Barang Gudang</span></a>
                <?php else : ?>
                    <a class="nav-link" href="?page=baranggud">
                        <i class="fas fa-fw fa-cubes"></i>
                        <span>Barang Gudang</span></a>
                <?php endif; ?>
            </li>
                
            <!-- Divider -->
            <hr class="sidebar-divider my-0 mt-2">

            <!-- Nav Item - Barang Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cart-plus"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                            <?php if($url==$transaksi) : ?>
                                <a class="collapse-item" href="?page=transaksi">Input Transaksi</a>
                            <?php else : ?>
                                <a class="collapse-item" href="?page=transaksi">Input Transaksi</a>
                            <?php endif; ?>

                            <?php if($url==$transaksic) : ?>
                                <a class="collapse-item" href="?page=transaksic">Laporan</a>
                            <?php else : ?>
                                <a class="collapse-item" href="?page=transaksic">Laporan</a>
                            <?php endif; ?>
                    </div>
                </div>
            </li> -->

            <li class="nav-item mt-2">
                <a class="nav-link" href="logout.php" onclick="return confirm('yakin ingin logout?');">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline ">
                    <button class="border-0 font-weight-bold" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="font-weight-bold text-gray-600 text-primary"><?php echo $_SESSION['username']; ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section>
                    <?php include 'pages.php'; ?>
                    </section>               

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Inventory barang 2023 <a href="">all rights reserved</a> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa yakin mau Keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>    

     <!-- Bootstrap core JavaScript-->
     <script>"../vendor/jquery/jquery.min.js"</script>
     <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/chart-area-demo.js"></script>
    <script src="../asset/js/demo/chart-pie-demo.js"></script>

</body>

</html>
