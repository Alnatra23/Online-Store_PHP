<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "koneksi.php";
    global $koneksi;
    $qry_login=mysqli_query($koneksi, "select * from petugas where username = '".$username."' and password ='".md5($password)."' ");
    if(mysqli_num_rows($qry_login)>0){
        echo "<script>alert('login berhasil'); location.href='data_pelanggan.php';</script>";
        $dt_login=mysqli_fetch_array($qry_login);
        session_start();
        $_SESSION["id_petugas"]=$dt_login["id_petugas"];
        $_SESSION["nama_petugas"]=$dt_login["nama_petugas"];
        $_SESSION["username"]=$dt_login['username'];
        $_SESSION["status"]=$dt_login['status'];
        $_SESSION["status_login_admin"]=true;
        header("location: data_pelanggan.php");
    }else{
        echo "<script>alert('username dan password tidak benar'); location.href='index.php';</script>";
    }
    
?>