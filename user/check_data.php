<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link  rel="stylesheet" href="../admin/css/stylesheet_keranjang.css">
    <link  rel="stylesheet" href="../admin/css/stylesheet_navbar.css">
    <link rel="icon" type="image/png" href="../admin/images/Asset%202.png" />
    <!-- Kit Font Awesome -->
    <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "koneksi.php";
global $koneksi;

?>
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h1>Pembelian</h1>
            <br><br>

            <h4>Alamat Pengiriman :</h4>
            <p><?=$_SESSION['alamat']?></p>
            <iframe src="<?=$_SESSION['link_alamat']?>" ></iframe>

            <br>

        </div>
        <div class="card-body">
            <?php
            if (@$_SESSION['cart'] == null) {
                echo "Keranjang kosong";
            }
            else {
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $grandtotal=array();
                    foreach (@$_SESSION['cart'] as $key => $value) :

                        $grandtotal[]=$value["harga"]*$value['qty'];
                        include 'koneksi.php';
                        $foto = mysqli_query($koneksi, 'SELECT * FROM produk WHERE id_produk = "'.$value['id_produk'].'" ');
                        $dt_foto = mysqli_fetch_array($foto);
                        ?>
                        <tr>
                            <td><?=($key+1)?></td>
                            <td><img src="../admin/foto/<?=$dt_foto['foto_produk']?>" class="img-fluid rounded-start" width="150px" height="150px" alt="..." ></td>
                            <td><?=$value['nama_produk']?></td>
                            <td> <?php echo $value["harga"]; ?></td>
                            <td><?=$value['qty']?></td>
                            <td> <?php echo number_format($value["qty"] * $value["harga"], 2);?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <br>
                <div class="d-flex flex-row-reverse">
                <?php
                $ongkir = 8000;
                echo "Total : ". number_format(array_sum($grandtotal));
                echo "<br>";
                echo "Ongkos Kirim ". number_format($ongkir);
                echo "<br>";
                $totalBarang = array_sum($grandtotal);
                $totalBarang += $ongkir;
                echo "Total Keseluruhan : ". number_format($totalBarang);
                ?>
                <?php if(isset($_SESSION['status_login'])):?>
                    <a href="checkout.php" ><button class="btn3 mx-2 my-2" ">Buy</button></a>
                <?php else: ?>
                    <a href="login.php"><button class="btn1">Checkout</button></a>
                <?php endif ?>
                    </div>
            <?php } ?>


        </div>
    </div>
</div>
</body>
</html>