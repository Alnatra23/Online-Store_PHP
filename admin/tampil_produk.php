<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
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
    <div class="container my-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center mt-2 mb-3">Data Produk<h3>
                <form action="tampil_produk.php" method="post">
                    <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered fs-5 fw-light text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Foto</th>
                            <th scope="col" width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            global $koneksi;
                            if (isset($_POST["cari"])) {
                                // jika ada keyword pencarian 
                                $cari=$_POST['cari'];
                                $query_produk= mysqli_query($koneksi,"select * from produk where id_produk like '%$cari%' or nama_produk like '%$cari%'");
                            }else{
                                //jika tidak ada keyword pencarian
                                $query_produk= mysqli_query($koneksi,"select * from produk");
                            }
                            while($data_produk= mysqli_fetch_array($query_produk)) { ?>
                                <tr>
                                    <td><?php echo $data_produk["id_produk"]; ?></td>
                                    <td><?php echo $data_produk["nama_produk"]; ?></td>
                                    <td><?php echo $data_produk["deskripsi"]; ?></td>
                                    <td><?php echo $data_produk["kategori"]; ?></td>
                                    <td><?php echo $data_produk["gender"]; ?></td>
                                    <td><?php echo $data_produk["merek"]; ?></td>
                                    <td><?php echo $data_produk["harga"]; ?></td>
                                    <td><img src="<?php echo "foto/".$data_produk['foto_produk']; ?>" width='150' height='150'></td>
                                    <td> <a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk']?>" class="fa-regular fa-pen-to-square text-dark"></a> | <a href="hapus_produk.php?id_produk=<?=$data_produk['id_produk']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="fa-solid fa-trash text-dark my-5"></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
                <a href="tambah_produk.php"><button class="btn1">Tambah Produk</button></a>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>