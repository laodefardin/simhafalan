<?php
session_start();
include "../../config/koneksi.php";
$currentDate = date('Y-m-d H:i:s');

$username = $_POST['username'];

$kelas = $_POST['kelas'];
$nis_siswa = $_POST['nis_siswa'];
$nama_siswa = $_POST['nama_siswa'];
$nama_ortu = $_POST['nama_ortu'];
$tempatlahir = $_POST['tempatlahir'];
$tanggallahir = $_POST['tanggallahir'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

// Periksa apakah NIS sudah ada di database
$cek_query = "SELECT COUNT(*) as jumlah FROM tb_santri WHERE nis = ?";
$stmt = $koneksi->prepare($cek_query);
$stmt->bind_param("s", $nis_siswa);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($row['jumlah'] > 0) {
  echo "<script>alert('NIS sudah ada di database. Masukkan NIS yang berbeda.');</script>";
  echo "<script> document.location.href='../santri?kelas=$kelas';</script>";

} else {
  
  $tambah = $koneksi->query(
    "INSERT INTO tb_santri (nis, kelas, nama, tempatlahir, tanggallahir, nama_ortu, no_hp, alamat, created_at) VALUES ('$nis_siswa','$kelas','$nama_siswa','$tempatlahir','$tanggallahir','$nama_ortu','$no_hp','$alamat','$currentDate') ");
  
  //generate hashing
  $password_sha1 = md5(sha1(md5($nis_siswa)));
  $addUser = $koneksi->query(
    "INSERT INTO tb_pengguna (username, nama, password, level, foto, tanggal) VALUES ('$username','$nis_siswa','$password_sha1','Orang Tua Santri','','$currentDate')"
  );

  // Setelah berhasil disimpan, Anda dapat memberikan pesan sukses.
  $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
  $_SESSION['status'] = 'success';  
  echo "<script> document.location.href='../santri?kelas=$kelas';</script>";
  die();
}

// Tutup koneksi
$stmt->close();
$koneksi->close();
?>