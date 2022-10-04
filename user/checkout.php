<?php
//session_start();
//include "koneksi.php";
//global $koneksi;
//$cart = @$_SESSION['cart'];
//if (count($cart) > 0) {
//    $tgl_transaksi = date('Y-m-d');
//    $query_transaksi = mysqli_query($koneksi, "INSERT INTO transaksi (id_pelanggan, id_petugas, tgl_transaksi)
//        VALUES ('".$_SESSION['id_pelanggan']."', '3', '".$tgl_transaksi."')");
//
//    if ($query_transaksi) {
//        $id = mysqli_insert_id($koneksi);
//        foreach ($cart as $key => $value) {
//            $qty = $value['qty'];
//            $harga = $value['harga'];
//            $subtotal = $qty*$harga;
//            mysqli_query($koneksi, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, subtotal)
//                VALUES ('".$id."', '".$value['id_produk']."', '".$qty."', '".$subtotal."')");
//        }
//        unset($_SESSION['cart']);
//        echo "<script>alert('Anda Berhasil Membeli Produk');location.href='pembelian.php'</script>";
//    }
//    else{
//        echo "<script>alert('Gagal Membeli Produk');location.href='keranjang.php'</script>";
//    }
//}
//?>
<?php
session_start();
include "koneksi.php";
global $koneksi;
$cart = @$_SESSION['cart'];
if (count($cart) > 0) {
    $tgl_transaksi = date('Y-m-d');
    $lama_pengiriman = 2;
    $tgl_datang = date('Y-m-d', mktime(0,0,0,date('m'),date('d')+$lama_pengiriman,date('Y')));
    $query_transaksi = mysqli_query($koneksi, "INSERT INTO transaksi (id_pelanggan, id_petugas, tgl_transaksi ,tgl_datang)
        VALUES ('".$_SESSION['id_pelanggan']."','1,2 ','".$tgl_transaksi."','".$tgl_datang."')") or die (mysqli_error($koneksi));

    if ($query_transaksi) {

        $id = mysqli_insert_id($koneksi);
        foreach ($cart as $key => $value) {
            $qty = $value['qty'];
            $harga = $value['harga'];
            $subtotal = $qty*$harga;
            mysqli_query($koneksi, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, subtotal)
                VALUES ('".$id."', '".$value['id_produk']."', '".$qty."', '".$subtotal."')");
        }
        unset($_SESSION['cart']);
        echo "<script>alert('Anda Berhasil Membeli Produk');location.href='pembelian.php'</script>";
    }
    else{
        echo "<script>alert('Gagal Membeli Produk');location.href='keranjang.php'</script>";

    }
}
?>
