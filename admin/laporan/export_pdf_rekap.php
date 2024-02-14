<?php
require_once __DIR__ . '/vendor/autoload.php'; // Sesuaikan dengan lokasi autoloader mpdf

use \Mpdf\Mpdf;

if (isset($_POST['export_pdf'])) {
    // Koneksi ke database
    include "../../config/koneksi.php";
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
    session_start();
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    $cari = $_POST['cari'];
    if (!empty($cari)) {
    // Query SQL
    $query = "SELECT s.id AS id_santri, s.nis, s.nama, s.kelas, COUNT(h.ID) AS JumlahData
    FROM tb_santri s
    LEFT JOIN tb_hafalan_baru h ON s.id = h.ID_Santri
    WHERE kelas = '$cari'
    GROUP BY s.id, s.nis, s.nama, s.kelas";
    }else{
           // Query SQL
    $query = "SELECT s.id AS id_santri, s.nis, s.nama, s.kelas, COUNT(h.ID) AS JumlahData
    FROM tb_santri s
    LEFT JOIN tb_hafalan_baru h ON s.id = h.ID_Santri
    GROUP BY s.id, s.nis, s.nama, s.kelas";
    }
 

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    // Menghasilkan data HTML untuk tabel
    ob_start();
    ?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<h2><?= isset($cari) && !empty($cari) ? "Laporan Rekap Data Hafalan Santri Kelas $cari" : "Laporan Rekap Data Hafalan Santri";?></h2>

<table>
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Total Juz</th>
        <th>Total Surat</th>
    </tr>

    <?php
        $nomor_urut = 1; 
        foreach ($result as $data) :
        $id = $data['id_santri'];

            echo "<tr>";
            echo "<td>" . $nomor_urut. "</td>";
            echo "<td>" . $data['nis'] . "</td>";
            echo "<td>" . $data['nama'] . "</td>";
            echo "<td>" . $data['kelas'] . "</td>";            
            
            $sql = "SELECT COUNT(*) AS JumlahData
            FROM (
              SELECT Juz, COUNT(*) AS Jumlah
              FROM tb_hafalan_baru
              WHERE ID_Santri = $id
              GROUP BY Juz
            ) AS Subquery
            ";
            $quer1 = mysqli_query($koneksi, $sql);
            $data = mysqli_fetch_assoc($quer1);
            echo "<td>" . $data['JumlahData'] . " Juz"."</td>";
            
            $sql = "SELECT COUNT(*) AS JumlahData
              FROM (
                SELECT surat, COUNT(*) AS Jumlah
                FROM tb_hafalan_baru
                WHERE ID_Santri = $id
                GROUP BY surat
              ) AS Subquery
              ";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
            echo "<td>" . $data['JumlahData'] . " Surat"."</td>";
            echo "</tr>";
        
        $nomor_urut++; 
        endforeach;
        ?>
</table>

<?php
    $html = ob_get_clean();

    // Buat objek MPDF
    $mpdf = new Mpdf();

    // Tambahkan HTML ke MPDF
    $mpdf->WriteHTML($html);

     // Tentukan nama file PDF
    $pdfFileName = 'rekap_hafalan_santri.pdf';
     
    // Outputkan PDF ke browser
    $mpdf->Output('', 'I'); // 'I' berarti tampilkan di browser

    // Tutup koneksi
    mysqli_close($koneksi);
    exit;
} else {
    // Redirect jika tidak ada permintaan untuk ekspor PDF
    header("Location: index.php"); // Ganti "index.php" dengan halaman Anda
    exit;
}
?>