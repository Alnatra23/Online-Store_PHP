<?php
    if ($_GET['id_pelanggan']) {
        include "koneksi.php";
        global $koneksi;
        $qry_hapus=mysqli_query($koneksi, "delete from pelanggan where id_pelanggan='".$_GET['id_pelanggan']."'");
        if ($qry_hapus) {
            echo "<script>alert ('Sukses hapus pelanggan'); location.href='data_pelanggan.php';</script>";
        }else {
            echo "<script>alert ('Gagal hapus pelanggan'); location.href='data_pelanggan.php';</script>";
        }
    }
?> 