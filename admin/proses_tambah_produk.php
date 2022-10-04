<?php
    if($_POST){
        $nama_produk=$_POST['nama_produk'];
        $deskripsi=$_POST['deskripsi'];
        $kategori=$_POST['kategori'];
        $gender=$_POST['gender'];
        $merek=$_POST['merek'];
        $harga=$_POST['harga'];
        $file_tmp = $_FILES['foto_produk']['tmp_name'];
        $file_name=rand(0,9999).$_FILES['foto_produk']['name'];
        $file_size= $_FILES['foto_produk']['size'];
        $file_type= $_FILES['foto_produk']['type'];

        include "koneksi.php";
        global $koneksi;
        if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png")){
            move_uploaded_file($file_tmp, 'foto/'.$file_name);
            $insert=mysqli_query($koneksi,"insert into produk (nama_produk, deskripsi, kategori, gender, merek, harga, foto_produk) value ('".$nama_produk."', '".$deskripsi."', '".$kategori."', '".$gender."', '".$merek."', '".$harga."', '".$file_name."')") or die(mysqli_error($koneksi));
            if($insert){
                echo "<script>alert('Sukses menambahkan produk');location.href='tampil_produk.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan produk');location.href='tampil_produk.php';</script>";
            } 
        }else{
            echo "<script>alert('file tidak sesuai');location.href='tampil_produk.php';</script>";
        }  
    }
    
?>