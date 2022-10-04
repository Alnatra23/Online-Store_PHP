<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesheet_tambah_produk.css">
    <link rel="icon" type="image/png" href="../admin/images/Asset%202.png" />
</head>
<body>
    <?php
        include "navbar.php";
    ?>

    <div class="container">
        <div class="content my-3">
            <h3 class=" mb-2 text-center">Tambah Produk</h3>
            <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
                <!-- Nama Produk -->
                <div class="mb-2">
                    <label class="form-label">Nama Produk :</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan Nama Produk" required>
                </div>
                <!-- deskripsi Produk -->
                <div class="mb-2">
                    <label class="form-label">Deskripsi Produk :</label>
                    <textarea name="deskripsi" class="form-control textarea" rows="4" placeholder="Masukkan Deskripsi Produk" required></textarea>
                </div>
                <!-- kategori -->
                <div class="mb-2">
                    <label class="form-label">Kategori Produk :</label>
                    <select name="kategori" class="form-control" required>
                        <option></option>
                        <option>pakaian</option>
                        <option>sepatu</option>
                        <option>aksesoris</option>
                    </select>
                </div>
                <!-- gender -->
                <div class="mb-2">
                    <label for="gender" class="form-label">Gender :</label>
                    <?php
                        $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan','A'=>'Anak-Anak');
                    ?>
                    <select name="gender" class="form-control form" required>
                        <option></option>
                            <?php foreach ($arr_gender as $key_gender => $val_gender):?>
                            <option value="<?=$key_gender?>"><?=$val_gender?></option>
                            <?php endforeach ?>
                    </select>
                </div>
                <!-- merek -->
                <div class="mb-2">
                    <label class="form-label">Merek :</label>
                    <select name="merek" class="form-control" required>
                        <option></option>
                        <option>nike</option>
                        <option>adidas</option>
                        <option>puma</option>
                        <option>underarmour</option>
                    </select>
                </div>
                <!-- Harga Produk -->
                <div class="mb-2">
                    <label class="form-label">Harga Produk :</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga Produk" required>
                </div>
                <!-- Foto Produk -->
                <div class="mb-4">
                    <label for="formFile" class="form-label">Foto Produk :</label>
                    <input class="form-control" type="file" name="foto_produk">
                </div>
                <input type = "submit" name ="simpan" value ="Tambah Produk" class = "btn1 mb-2">
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>