<?php
session_start();
include "../../config/koneksi.php";

$currentDate = date('Y-m-d H:i:s');


$nama_kelas = $_POST['nama_kelas'];
$wali_kelas = $_POST['wali_kelas'];

$tambah = $koneksi->query(
  "INSERT INTO tb_kelas (nama_kelas, wali_kelas, created_at) VALUES ('$nama_kelas','$wali_kelas','$currentDate') ");
  
  $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
  $_SESSION['status'] = 'success';
  echo "<script> document.location.href='../kelas';</script>";
  die();
?>  