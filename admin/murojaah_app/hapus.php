<?php
// Mengatur zona waktu sesuai dengan lokasi Anda

include "../../config/koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$hapus = "DELETE FROM tb_murojaah WHERE id  = '$id'";

$koneksi->query($hapus);

$_SESSION['pesan'] = 'Data Berhasil Di Hapus';
$_SESSION['status'] = 'success';
echo "<script> document.location.href='../murojaah';</script>";
die();