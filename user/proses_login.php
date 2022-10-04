<?php
$username = $_POST["username"];
$password = $_POST["password"];

include "koneksi.php";
global $koneksi;

//check cookie
if(isset($_COOKIE['id'])&& isset($_COOKIE['key'])){
    $id= $_COOKIE['id'];
    $key= $_COOKIE['key'];

    //ambil username
    $result= mysqli_query($koneksi,"SELECT username FROM pelanggan WHERE id= $id");
    $row= mysqli_fetch_assoc($result);

    //check cookie username
    if ($key === hash('sha256',$row['username'])){
        $_SESSION['status_login'] = true;
    }
}
if (isset($_SESSION['status_login'])){
    header("location: index.php");
    exit;
}

$qry_login = mysqli_query($koneksi, "select * from pelanggan where username = '" . $username . "' and password ='" . md5($password) . "' ");

if (mysqli_num_rows($qry_login) > 0) {
    echo "<script>alert('Login berhasil'); location.href='index.php';</script>";
    $dt_login = mysqli_fetch_array($qry_login);
    session_start();
    $_SESSION["id_pelanggan"] = $dt_login["id_pelanggan"];
    $_SESSION["nama"] = $dt_login["nama"];
    $_SESSION["alamat"] = $dt_login["alamat"];
    $_SESSION["link_alamat"] = $dt_login["link_alamat"];
    $_SESSION["username"] = $dt_login['username'];
    $_SESSION["status_login"] = true;

} else {
    echo "<script>alert('Username dan Password tidak benar'); location.href='login.php';</script>";
}

if (!empty($_POST["remember"])) {
    //buat cookie
    setcookie("id", $dt_login["id_pelanggan"], time() + (3600 * 365 * 24 * 60 * 60));
    setcookie("key", hash('sha256',$dt_login['username']), time() + (3600 * 365 * 24 * 60 * 60));
} else {
    if (isset($_COOKIE["username"])) {
        setcookie("username", "");
    }
    if (isset($_COOKIE["password"])) {
        setcookie("password", "");
    }
}
//header("location: index.php");

?>