<?php
session_start();
include "../../config/koneksi.php";

$currentDate = date('Y-m-d H:i:s');

$id_santri = $_POST['id'];

$tanggal = $_POST['tanggal'];
$juz = $_POST['juz'];
$surat = $_POST['surat'];
$ayat = $_POST['ayat'];

// $tambah = $koneksi->query(
//   "INSERT INTO tb_hafalan_baru (id_santri, tanggal, juz, surat, ayat, created_at, updated_at) VALUES ('$id_santri','$tanggal','$juz','$surat','$ayat','$currentDate','$currentDate') ");

  $stmt = $koneksi->prepare("INSERT INTO tb_hafalan_baru (id_santri, tanggal, juz, surat, ayat, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)");

  // Membinding parameter
  $stmt->bind_param("sssssss", $id_santri, $tanggal, $juz, $surat, $ayat, $currentDate, $currentDate);

  // Menjalankan pernyataan
$stmt->execute();
// Menutup pernyataan
$stmt->close();

  $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
  $_SESSION['status'] = 'success';
  echo "<script> document.location.href='../hafalan-baru';</script>";
  die();
?>