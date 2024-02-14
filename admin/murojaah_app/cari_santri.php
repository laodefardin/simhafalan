<?php
// Koneksi ke database MySQL
include "../../config/koneksi.php";

if (isset($_POST['idsantri'])) {
    $idsantri = $_POST['idsantri'];

    // Lakukan kueri SQL untuk mengambil data santri berdasarkan id
    $query = "SELECT * FROM tb_santri WHERE id = $idsantri";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        $data = mysqli_fetch_assoc($hasil);

        // Mengirim hasil sebagai respons JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Data tidak ditemukan']);
    }
} else {
    echo json_encode(['error' => 'Parameter idsantri tidak ditemukan']);
}

mysqli_close($koneksi);
?>
