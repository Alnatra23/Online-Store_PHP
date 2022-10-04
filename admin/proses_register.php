<?php
if($_POST){
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $level= $_POST['level'];

    include "koneksi.php";
    global $koneksi;
    $insert=mysqli_query($koneksi,"insert into petugas (nama_petugas, username, password, level) value ('".$nama_petugas."', '".$username."','".md5($password)."', '".$level."')") or die(mysqli_error($koneksi));
    if($insert){
        echo "<script>alert('Sukses Menambahkan Petugas');location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Petugas');location.href='register.php';</script>";
    }
}
?>