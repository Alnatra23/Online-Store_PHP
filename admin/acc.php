<?php
if ($_GET['id_transaksi']) {
    include "koneksi.php";
    global $koneksi;
    $id = $_GET['id_transaksi'];
    $cek = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = '".$id."'");
    $data = mysqli_fetch_array($cek);
    if ($data['status'] == "New") {
        $newstatus = 'Confirm';
        $warnanew='';
    } elseif ($data['status'] == "Confirm") {
        $newstatus = 'Process';
    } elseif ($data['status'] == "Process") {
        $newstatus = 'Done';
    } else {
        echo "<script>alert('Hooh Tenan');</script>";
    }

    $acc= mysqli_query ($koneksi, "UPDATE transaksi set status='".$newstatus."' where id_transaksi = '".$id."'") or die (mysqli_error($koneksi));

    if ($acc) {
        echo "<script>alert('Pengiriman Produk Berhasil');location.href='tampil_pembelian.php';</script>";
    }
    else{
        echo "<script>alert('Pengiriman Produk Gagal');location.href='tampil_pembelian.php';</script>";
    }
}
?>