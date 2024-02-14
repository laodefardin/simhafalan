<?php
date_default_timezone_set('Asia/Makassar');
// mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start();
include '../config/koneksi.php';
// include "function.php";
if (!isset($_SESSION["username"])){
    echo "<script> alert('anda tidak memiliki akses untuk halaman ini!, Silahkan Login terlebih dahulu');window.location= '../index';</script>";
}elseif($_SESSION['level'] === 'User'){
  echo "<script> alert('anda tidak memiliki akses untuk halaman ini!');window.location= '../index';</script>";
}

$user = $_SESSION['username'];
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
$id = $_SESSION["id"];
$foto = $_SESSION["foto"];

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

// $query = $koneksi->query("SELECT * FROM tb_siswa WHERE username = '$user'");
// $row = $query->fetch_array();
// //jika akun berlevel peserta mengakses page admin
// if ($level === "Admin"){
//   echo "<script> document.location.href='../user/index'; </script>";
//   // echo "<script> alert('anda tidak memiliki akses untuk halaman ini!');window.location= '../user/index';</script>";
// }elseif($level === "Guru"){
//     echo "<script> document.location.href='../guru/index'; </script>";
// }

// $query = $koneksi->query("SELECT * FROM tb_konfigurasi");
// $konf = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
	<meta charset="utf-8">
	<link href="../assets/img/favicon.png" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
	<meta name="keywords"
		content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="LEFT4CODE">
	<title><?= $title?> - Sistem Informasi Manajemen Hafalan</title>
	<!-- BEGIN: CSS Assets-->
	<link rel="stylesheet" href="../assets/dist/css/app.css" />
	<!-- END: CSS Assets-->

	<!-- DataTables -->
	<link rel="stylesheet" href="../assets/dist/dataTables/jquery.dataTables.min.css" />
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->
</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">