<?php
//  $dbhost = 'localhost';  //host untuk database, biasanya localhost
//  $dbuser = 'root';  //username untuk mengakses database, jika dilokal biasanya 'root'
//  $dbpass = '';  //password untuk mengakses databae, jika dilokal biasanya kosong
//  $dbname = 'hafalan';  //nama database yang akan digunakan


//  $koneksi = new mysqli($dbhost,$dbuser,$dbpass,$dbname) ;  //koneksi Database

//  //Check koneksi, berhasil atau tidak
// if( $koneksi->connect_errno ){
// echo "Oops!! Koneksi Gagal!".$koneksi->connect_error;
// }else{
//   echo "koneksi berhasil";
// }

// Inisialisasi objek koneksi
$koneksi = new mysqli("localhost", "root", "root", "hafalan");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>

