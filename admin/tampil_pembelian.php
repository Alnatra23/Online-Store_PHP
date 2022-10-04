<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Pembelian</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesheet_tampil.css">
    <link rel="icon" type="image/png" href="../admin/images/Asset%202.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
<?php
include "navbar.php";
?>
<br></br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2 mb-3 text-center">Data Pembelian<h3>
                    <form action="tampil_pembelian.php" method="post">
                        <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                    </form>
        </div>
        <div class='card-body'>
            <table class="table table-bordered fs-5 fw-light text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Foto Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Tanggal Beli</th>
                    <th scope="col">Tanggal Datang</th>
                    <th scope="col">Alamat</th>
                    <th scope="col" width="100px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                global $koneksi;
                if (isset($_POST["cari"])) {
                    // jika ada keyword pencarian
                    $cari=$_POST['cari'];
                    $query_transaksi= mysqli_query($koneksi,"select * from transaksi where id_transaksi like '%$cari%' or id_pelanggan like '%$cari%' or tgl_transaksi like '%$cari%'");
                }else{
                    //jika tidak ada keyword pencarian
                    $query_transaksi= mysqli_query($koneksi,"select * from transaksi join pelanggan on pelanggan.id_pelanggan= transaksi. id_pelanggan join detail_transaksi on detail_transaksi. id_transaksi=transaksi . id_transaksi join produk on produk. id_produk= detail_transaksi. id_produk") or die (mysqli_error($koneksi));
                }
                $no=0;
                while($data_transaksi= mysqli_fetch_array($query_transaksi)) {
                    $no++;?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?php echo $data_transaksi["nama"]; ?></td>
                        <td><img src="../admin/foto/<?=$data_transaksi['foto_produk']?>" class="img-fluid rounded-start" width="150px" height="150px" alt="..." ></td>
                        <td><?php echo $data_transaksi["nama_produk"]; ?></td>
                        <td><?php echo $data_transaksi["tgl_transaksi"]; ?></td>
                        <td><?php echo $data_transaksi["tgl_datang"]; ?></td>
                        <td><?php echo $data_transaksi["alamat"]; ?></td>
<!--                        <td> <a href="acc.php?id_transaksi=--><?//= $data_transaksi["id_transaksi"] ?><!--"--><?//= $data_transaksi['status'] ?><!-- onclick="return confirm ('Apakah anda yakin ingin memperbarui data ?')" class="fa-solid fa-check text-dark my-4" style="text-decoration: none"></a></td>-->
                        <td> <a href="acc.php?id_transaksi=<?=$data_transaksi['id_transaksi']?>"><?=$data_transaksi['status']?></a> | <a href="hapus_penjualan.php?id_transaksi=<?=$data_transaksi['id_transaksi']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" ><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>