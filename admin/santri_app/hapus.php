<?php
// Mengatur zona waktu sesuai dengan lokasi Anda

include "../../config/koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];
$kelas = $_GET['kelas'];
$nis = $_GET['nis'];

$hapus_santri = "DELETE FROM tb_santri WHERE id  = '$id'";
$hapus_pengguna = "DELETE FROM tb_pengguna WHERE nama  = '$nis'";
$hapus_hafalan = "DELETE FROM tb_hafalan_baru WHERE id_santri  = '$id'";
$hapus_murojaah = "DELETE FROM tb_murojaah WHERE id_santri  = '$id'";
$hapus_prestasi = "DELETE FROM tb_prestasi WHERE id_santri  = '$id'";

$koneksi->query($hapus_santri);
$koneksi->query($hapus_pengguna);
$koneksi->query($hapus_hafalan);
$koneksi->query($hapus_murojaah);
$koneksi->query($hapus_prestasi);

$_SESSION['pesan'] = 'Data Berhasil Di Hapus';
$_SESSION['status'] = 'success';
  echo "<script> document.location.href='../santri?kelas=$kelas';</script>";
//   echo "<script> document.location.href='../kelas';</script>";
die();