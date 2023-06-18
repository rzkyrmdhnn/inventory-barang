<?php
    $page = isset($_GET['page']) ? $_GET['page'] : null;
    
    if($page == 'dashboard'){
        include "dashboard.php";
    }elseif($page == 'dashusr'){
        include "dash_usr.php";
    }elseif($page == 'barang'){
        include "gudang/barang/barang.php";
    } elseif ($page == 'barangc') {
        include "gudang/barang/barang_laporan.php";
    } elseif ($page == 'supplier') {
        include "gudang/supplier/supplier.php";
    } elseif ($page == 'pesan') {
        include "gudang/pesan/pesan.php";
    } elseif ($page == 'pesanr') {
        include "gudang/pesan/pesan_rekap.php";
    } elseif ($page == 'status') {
        include "gudang/status/status.php";
    } elseif ($page == 'brand') {
        include "gudang/brand/brand.php";

    } elseif ($page == 'baranggud') {
        include "user/barang/barang.php";
        //echo '<h2> Halaman tidak ditemukan</h2>';
    }                 
?>