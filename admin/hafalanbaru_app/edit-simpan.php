<?php
include "../../config/koneksi.php";
// mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start(); 
    
    $currentDate = date('Y-m-d H:i:s');

    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $juz = $_POST['juz'];
    $surat = $_POST['surat'];
    $ayat = $_POST['ayat'];

    $stmt = $koneksi->prepare("UPDATE tb_hafalan_baru SET tanggal = ?, juz = ?, surat = ?, ayat = ?, updated_at = ? WHERE id = ?");

    // $update = "UPDATE tb_hafalan_baru SET tanggal ='$tanggal', juz = '$juz', surat= '$surat', ayat= '$ayat',updated_at = '$currentDate' WHERE id = '".$id."' ";

    // Membinding parameter
$stmt->bind_param("ssssss", $tanggal, $juz, $surat, $ayat, $currentDate, $id);

// Menjalankan pernyataan
$stmt->execute();

// Menutup pernyataan
$stmt->close();

    // $sql = mysqli_query($koneksi, $update);

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='../hafalan-baru';</script>";
        die();  
    ?>