<?php
    if ($_POST) {
        $id_petugas= $_POST['id_petugas'];
        $nama_petugas= $_POST['nama_petugas'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $level= $_POST['level'];

        include "koneksi.php";
        global $koneksi;
        if (empty ($password)) {
            $update= mysqli_query ($koneksi, "update petugas set nama_petugas='".$nama_petugas."', username='".$username."', level='".$level."' where id_petugas='".$id_petugas."' ") or die (mysqli_error($koneksi));
            if($update){
                echo "<script> alert ('Sukses update profil'); location.href='profil.php' ; </script>";
            }else{
                echo "<script> alert ('Gagal update profil'); location.href='profil.php' ; </script>";
            }
        }else {
            $update= mysqli_query ($koneksi, "update petugas set nama_petugas='".$nama_petugas."', username='".$username."', password='" .md5 ($password)."', level='".$level."' where id_petugas='".$id_petugas."' ") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script> alert ('Sukses update profil'); location.href='profil.php' ; </script>";  
            }else{
                echo "<script> alert ('Gagal update profil'); location.href='profil.php' ; </script>";
            }
        }
    }
?>