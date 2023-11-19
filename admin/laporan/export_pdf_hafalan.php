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
    $query = "SELECT * FROM tb_santri WHERE id = '$cari' ";
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

  #table,
  #table th,
  #table td {
    border: 1px solid black;
    padding: 8px;
  }

  #table th {
    background-color: #f2f2f2;
  }

  .table,
  .table th,
  .table td {
    padding: 0.65rem;
    vertical-align: top;
    border-bottom: 1px solid #dee2e6;
  }

  .table th {
    text-align: inherit;
    text-align: -webkit-match-parent;
  }
</style>

<?php foreach ($result as $data) : ?>
<h2>Laporan Rekap Data Hafalan Santri</h2>
<br>


<span>Informasi Santri:</span>
<table class="table">
  <tbody>
    <tr>
      <th style="width:30%;">NIS</th>
      <td>: <?= $data['nis'] ?></td>
    </tr>
    <tr>
      <th>Nama</th>
      <td>: <?= $data['nama'] ?></td>
    </tr>
    <tr>
      <th>Kelas</th>
      <td>: <?= $data['kelas'] ?></td>
    </tr>
  </tbody>
</table>


<h4>Rekap Hafalan Baru</h4>
<table id='table'>
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Juz</th>
    <th>Surat</th>
    <th>Ayat</th>
  </tr>
  <?php
        $nomor_urut = 1; 
        $result = $koneksi->query("SELECT * FROM  tb_hafalan_baru WHERE id_santri = '$cari' "); 

        if ($result->num_rows > 0) {
        foreach ($result as $data) :
            echo "<tr>";
            echo "<td>" . $nomor_urut. "</td>";
                          $databaseDate = $data['tanggal'];
                          $date = new DateTime($databaseDate);
                          $formattedDate = $date->format('d F Y'); 
                          echo $formattedDate;                        
            echo "<td>" . $formattedDate . "</td>";
            echo "<td>" . $data['juz'] . "</td>";
            echo "<td>" . $data['surat'] . "</td>";            
            echo "<td>" . $data['ayat'] ."</td>";
            echo "</tr>";
        $nomor_urut++; 
        endforeach;
        } else {
          echo "<tr><td colspan='5'>Belum ada Hafalan Baru</td></tr>";
        }
        ?>
</table>

<h4>Rekap Murojaah</h4>
<table id='table'>
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Juz</th>
    <th>Surat</th>
    <th>Ayat</th>
  </tr>
  <?php
        $nomor_urut = 1; 
        $result = $koneksi->query("SELECT * FROM  tb_murojaah WHERE id_santri = '$cari' "); 

        if ($result->num_rows > 0) {
        foreach ($result as $data) :
            echo "<tr>";
            echo "<td>" . $nomor_urut. "</td>";
                          $databaseDate = $data['tanggal'];
                          $date = new DateTime($databaseDate);
                          $formattedDate = $date->format('d F Y'); 
                          echo $formattedDate;                        
            echo "<td>" . $formattedDate . "</td>";
            echo "<td>" . $data['juz'] . "</td>";
            echo "<td>" . $data['surat'] . "</td>";            
            echo "<td>" . $data['ayat']."</td>";
            echo "</tr>";
        $nomor_urut++; 
        endforeach;
        } else {
          echo "<tr><td colspan='5'>Belum ada data Murojaah</td></tr>";
        }
        ?>
</table>

<?php endforeach;?>

<?php
    $html = ob_get_clean();

    // Buat objek MPDF
    $mpdf = new Mpdf();

    // Tambahkan HTML ke MPDF
    $mpdf->WriteHTML($html);

     // Tentukan nama file PDF
    $pdfFileName = 'rekap_hafalan_baru_santri.pdf';
     
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