<?php
if ($_GET['id_transaksi']) {
    include "koneksi.php";
    global $koneksi;
    $qry_hapus=mysqli_query($koneksi, "delete from transaksi where id_transaksi='".$_GET['id_transaksi']."'");
    if ($qry_hapus) {
        echo "<script>alert ('Sukses hapus pembelian'); location.href='tampil_pembelian.php';</script>";
    }else {
        echo "<script>alert ('Gagal hapus pembelian'); location.href='tampil_pembelian.php';</script>";
    }
}
?>