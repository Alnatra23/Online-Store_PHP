<?php
    if ($_POST) {
        $id_pelanggan= $_POST['id_pelanggan'];
        $nama= $_POST['nama'];
        $alamat= $_POST['alamat'];
        $telp= $_POST['telp'];
        $username= $_POST['username'];
        $password= $_POST['password'];

        include "koneksi.php";
        global $koneksi;
        if (empty ($password)) {
            $update= mysqli_query ($koneksi, "update pelanggan set nama='".$nama."', alamat='".$alamat."', telp='".$telp."', username='".$username."' where id_pelanggan='".$id_pelanggan."' ") or die (mysqli_error($koneksi));
            if($update){
                echo "<script> alert ('Sukses update pelanggan'); location.href='data_pelanggan.php' ; </script>";
            }else{
                echo "<script> alert ('Gagal update pelanggan'); location.href='data_pelanggan.php' ; </script>";
            }
        }else {
            $update= mysqli_query ($koneksi, "update siswa set nama_siswa='".$nama."', alamat='".$alamat."', telp='".$telp."', username='".$username."', password='" .md5 ($password)."' where id_pelanggan='".$id_pelanggan."' ") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script> alert ('Sukses update pelanggan'); location.href='data_pelanggan.php' ; </script>";  
            }else{
                echo "<script> alert ('Gagal update pelanggan'); location.href='data_pelanggan.php' ; </script>";
            }
        }
    }
?>