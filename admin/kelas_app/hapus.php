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

$hapus = "DELETE FROM tb_kelas WHERE id  = '$id'";
$hapusallsantri = "DELETE FROM tb_santri WHERE kelas  = '$kelas'";

$koneksi->query($hapus);
$koneksi->query($hapusallsantri);

$_SESSION['pesan'] = 'Data Berhasil Di Hapus';
$_SESSION['status'] = 'success';
echo "<script> document.location.href='../kelas';</script>";
die();