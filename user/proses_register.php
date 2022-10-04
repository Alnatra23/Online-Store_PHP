<?php
if($_POST){
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $username=$_POST['username'];
    $password= $_POST['password'];

    include "koneksi.php";
    global $koneksi;
    $insert=mysqli_query($koneksi,"insert into pelanggan (nama, alamat, telp, username, password) value ('".$nama."','".$alamat."','".$telp."','".$username."','".md5($password)."')") or die(mysqli_error($koneksi));
    if($insert){
        echo "<script>alert('Sukses Menambahkan Akun');location.href='login.php';</script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Akun');location.href='register.php';</script>";
    }
}
?>