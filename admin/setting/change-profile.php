<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 

include "../../config/koneksi.php";
        if ($koneksi->connect_error) {
            die("Connection failed: " . $koneksi->connect_error);
        }
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    // $email = $_POST['email'];

    // $img = $_FILES['foto']['name'];
    // $gambar_baru = date('dYHiS').$img;

        $update = "UPDATE tb_pengguna SET username = '$username', nama ='$full_name' WHERE id = '".$id."' ";

        $sql = mysqli_query($koneksi, $update);

        $_SESSION['pesana'] = '
        <div class="alert alert-primary show mb-2" role="alert">Password Berhasil Diubah</div>';
    echo "<script> document.location.href='../ubah-profile';</script>";
        die();  

    ?>