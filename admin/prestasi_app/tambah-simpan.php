<?php
session_start();
include "../../config/koneksi.php";
$currentDate = date('Y-m-d H:i:s');

$id_santri = $_POST['id_santri'];
$waktu_menghafal = $_POST['waktu_menghafal'];
$tanggal_khatam = $_POST['tanggal_khatam'];

$tambah = $koneksi->query(
  "INSERT INTO tb_prestasi (id_santri, waktu_menghafal, tanggal_khatam, created_at, updated_at) VALUES ('$id_santri','$waktu_menghafal','$tanggal_khatam','$currentDate','$currentDate') ");

  $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
  $_SESSION['status'] = 'success';
  echo "<script> document.location.href='../prestasi';</script>";
  die();
?>