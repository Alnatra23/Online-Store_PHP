<?php
    session_start();
?>
<link rel="stylesheet" href="css/stylesheet_navbar.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/stylesheet_navbar.css">
<nav class="navbar navbar-expand-lg">
  <?php
      include "koneksi.php";
      global $koneksi;
  ?> 
  <div class="container">
    <a class="navbar-brand mt-2" href="#"><img src="./images/logo-01.png" alt="" width="190px" height="35px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="data_pelanggan.php">Data Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampil_produk.php">Data Produk</a>
        </li>
          <li class="nav-item">
              <a class="nav-link" href="tampil_pembelian.php">Data Pembelian</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="tambah_admin.php">Tambah Admin Baru</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link d-flex justify-center align-items-center mx-2"><i class="far fa-user-circle mx-2"></i><?= $_SESSION['username'] ?></a>
          </li>
        <li class="nav-item mt-1">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>