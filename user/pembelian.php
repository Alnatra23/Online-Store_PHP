<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="../user/css/stylesheet_pembelian.css">
    <link rel="icon" type="image/png" href="../admin/images/Asset%202.png"/>
</head>
<body>
<?php
include "navbar.php";
?>
<br><br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>History Pembelian Produk</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Tanggal Datang</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                global $koneksi;
                $query_pembelian = mysqli_query($koneksi, "SELECT * FROM transaksi 
                    where id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' ORDER BY id_transaksi ASC");
                $no = 0;
                while ($data_pembelian = mysqli_fetch_array($query_pembelian)) {
                    $no++;
                    ?>
                    <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_pembelian['tgl_transaksi'] ?></td>
                    <td><?= $data_pembelian['tgl_datang'] ?></td>
                    <td>
                        <ol>
                            <?php
                            include "koneksi.php";
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d 
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                            while ($data_detail = mysqli_fetch_array($query_detail)) {
                                echo "<li>" . $data_detail['nama_produk'] . "</li>";
                            }
                            ?>
                        </ol>
                    </td>
                    <td>
                        <ul style="list-style: none;">
                            <?php
                            include "koneksi.php";
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                            while ($data_detail = mysqli_fetch_array($query_detail)) {
                                echo "<li>" . $data_detail['qty'] . "<li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul style="list-style: none;">
                            <?php
                            include "koneksi.php";
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                            while ($data_detail = mysqli_fetch_array($query_detail)) {
                                echo "<li>" . ($data_detail['subtotal'] / $data_detail['qty']) . "<li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul style="list-style: none;">
                            <?php
                            include "koneksi.php";
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                            while ($data_detail = mysqli_fetch_array($query_detail)) {
                                echo "<li>" . $data_detail['subtotal'] . "</li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <?php
                        include "koneksi.php";
                        $query_bayar = mysqli_query($koneksi, "SELECT SUM(subtotal) AS total FROM detail_transaksi
                            WHERE id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                        $data_bayar = mysqli_fetch_array($query_bayar);
                        echo "<label class='alert alert-secondary'>Rp. " . $data_bayar['total'] . "</label>";
                        ?>
                    </td>
                    <?php
                    if ($data_pembelian['status'] == "New"):
                        ?>
                        <td class='text-primary' role="alert"><?= $data_pembelian['status'] ?></td>
                    <?php
                    elseif ($data_pembelian['status'] == "Confirm"):
                        ?>
                        <td class='text-info'><?= $data_pembelian['status'] ?></td>
                    <?php
                    elseif ($data_pembelian['status'] == "Process"):
                        ?>
                        <td class='text-warning'><?= $data_pembelian['status'] ?></td>
                    <?php
                    elseif ($data_pembelian['status'] == "Done"):
                        ?>
                        <td class='text-success'><?= $data_pembelian['status'] ?></td>
                    <?php endif; ?>
                        <?php
                        include "koneksi.php";
                        ?>

                        </td>

                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include "footer2.php";
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>
</html>