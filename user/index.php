<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../admin/css/stylesheet_home.css">
    <link rel="icon" type="image/png" href="../admin/images/Asset%202.png" />
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <section class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="./images/banner-1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/banner-2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/banner-3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/banner-4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/banner-5.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="new-arrival my-2">
        <div class="container">
            <h3 class="text-center">New Arrivals</h3>
            <div class="album py-3">
                <div class="row slider">
                    <?php
                    include "koneksi.php";
                    global $koneksi;
                    $query_produk = mysqli_query($koneksi, "select * from produk order by id_produk desc limit 10");
                    while($data_produk = mysqli_fetch_array($query_produk)){
                    ?>
                    <div class="col mb-3 slide-produk">
                        <div class="card shadow-sm">
                            <img src="../admin/foto/<?=$data_produk['foto_produk']?>" class="card-img-top" width="251px" height="259px" ><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"/></img>
                            <div class="card-body">
                                <p class="card-text judul-produk"><b><?=$data_produk['nama_produk']?></b></p>
                                <p class="card-text harga-produk">Rp. <?=$data_produk['harga']?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="beli_produk.php?id_produk=<?=$data_produk['id_produk']?>"><button type="submit" class="btn1">Beli</button></a>
                                    </div>
                                    <small class="text-muted"><?=$data_produk['merek']?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="banner2 my-2">
        <div class="container d-flex justify-content-center">
            <div class="top-left">
                <h3 class="jordan">New Jordan Apparel</h3>
                <a href="produk_jordan.php"><button type="button" class="btn-banner2 text-center" style="margin-left:-200px ">Shop Now</button></a>
            </div>
            <img src="./images/banner2-1.jpg" alt="image"/>
        </div>
    </section>
    <section class="hot-items my-2">
        <div class="container">
            <h3 class="text-center">Hot Item's</h3>
            <div class="album py-3">
                <div class="row slider">
                    <?php
                    include "koneksi.php";
                    $query_produk = mysqli_query($koneksi, "select * from produk order by rand() limit 10");
                    while($data_produk = mysqli_fetch_array($query_produk)){
                    ?>
                    <div class="col mb-3 slide-produk">
                        <div class="card shadow-sm">
                            <img src="../admin/foto/<?=$data_produk['foto_produk']?>" class="card-img-top" width="231px" height="259px" ><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"/></img>
                            <div class="card-body">
                                <p class="card-text judul-produk"><b><?=$data_produk['nama_produk']?></b></p>
                                <p class="card-text harga-produk">Rp. <?=$data_produk['harga']?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="beli_produk.php?id_produk=<?=$data_produk['id_produk']?>"><button type="submit" class="btn1">Beli</button></a>
                                    </div>
                                    <small class="text-muted"><?=$data_produk['merek']?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="banner3 my-2">
        <div class="container d-flex justify-content-center">
            <div class="top-left">
                <h3 class="adidas">New Adidas Shoes Collections</h3>
                <a href="produk_adidas.php"><button type="button" class="btn-banner2 text-center" style="margin-left: -250px">Shop Now</button></a>
            </div>
            <img src="./images/banner3-1.jpg" alt="image"/>
        </div>
    </section>
    <section class="shop-age my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="bottom-center">
                        <a href="produk_men.php"><button type="button" class=" btn-age text-center mx-4">Men</button></a>
                    </div>
                    <img src="./images/home-men.jpg" alt="image" width="100%"/>
                </div>
                <div class="col">
                    <div class="bottom-center">
                        <a href="produk_women.php"><button type="button" class=" btn-age text-center mx-4">Women</button></a>
                    </div>
                    <img src="./images/home-women.jpg" alt="image" width="100%"/>
                </div>
                <div class="col">
                    <div class="bottom-center">
                        <a href="produk_kids.php"><button type="button" class=" btn-age text-center mx-4">Kids</button></a>
                    </div>
                    <img src="./images/home-kids.jpg" alt="image" width="100%"/>
                </div>
            </div>
        </div>
    </section>
    <?php
        include "footer.php";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
        });
				
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>