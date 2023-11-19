<?php
include "../../config/koneksi.php";
// mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start(); 
    
    $currentDate = date('Y-m-d H:i:s');

    $id = $_POST['id'];
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];

    $update = "UPDATE tb_kelas SET nama_kelas ='$nama_kelas', wali_kelas = '$wali_kelas', updated_at = '$currentDate' WHERE id = '".$id."' ";

    $sql = mysqli_query($koneksi, $update);

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='../kelas';</script>";
        die();  
    ?>