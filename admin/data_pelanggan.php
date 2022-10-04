<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesheet_tampil.css">
    <link rel="icon" type="image/png" href="../admin/images/Asset%202.png" />
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <div class="container my-3">
        <div class="card">
            <div class="card-header">
               <h3 class="text-center mt-2 mb-3">Data Pelanggan<h3>    
                <form action="data_pelanggan.php" method="post">
                    <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                </form> 
            </div>
            <div class="card-body">
                <table class="table table-bordered fs-5 fw-light text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No.Telp</th>
                            <th scope="col">Username</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            global $koneksi;
                            if (isset($_POST["cari"])) {
                                // jika ada keyword pencarian 
                                $cari=$_POST['cari'];
                                $query_pelanggan= mysqli_query($koneksi,"select * from pelanggan where id_pelanggan like '%$cari%' or nama like '%$cari%' or username like '%$cari%'");
                            }else{
                                //jika tidak ada keyword pencarian
                                $query_pelanggan= mysqli_query($koneksi,"select * from pelanggan");
                            }
                            $no=0;
                            while($data_pelanggan= mysqli_fetch_array($query_pelanggan)) {
                                $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data_pelanggan["nama"]; ?></td>
                                    <td><?php echo $data_pelanggan["alamat"]; ?></td>
                                    <td><?php echo $data_pelanggan["telp"]; ?></td>
                                    <td><?php echo $data_pelanggan["username"]; ?></td>
                                    <td> <a href="hapus_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
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