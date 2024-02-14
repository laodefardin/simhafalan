<?php
include "../../config/koneksi.php";
// mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start(); 
$currentDate = date('Y-m-d H:i:s');


    $id = $_POST['id'];
    $username = $_POST['username']; 
    $nis_siswa = $_POST['nis_siswa'];
    $kelas = $_POST['kelas'];
    $nama_siswa = $_POST['nama_siswa'];
    $nama_ortu = $_POST['nama_ortu'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $update = "UPDATE tb_santri SET nis='$nis_siswa', nama ='$nama_siswa', nama_ortu = '$nama_ortu', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', no_hp = '$no_hp', alamat = '$alamat', updated_at = '$currentDate' WHERE id = '".$id."' ";
    $sql = mysqli_query($koneksi, $update);

    $koneksi->query(
        "UPDATE tb_pengguna SET username='$username' WHERE nama = '$nis_siswa' "
      );

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='../santri?kelas=$kelas';</script>";
        die();  
    ?>