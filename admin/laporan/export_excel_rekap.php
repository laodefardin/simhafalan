<?php
require_once __DIR__ . '/vendor/autoload.php'; // Sesuaikan dengan lokasi autoloader mpdf
require 'vendor/autoload.php'; // Sesuaikan dengan lokasi autoloader PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export_excel'])) {
        // Koneksi ke database
        include "../../config/koneksi.php";
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
        session_start();
        if ($koneksi->connect_error) {
            die("Connection failed: " . $koneksi->connect_error);
        }

    // Query SQL (seperti yang Anda lakukan sebelumnya)
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

    // Membuat objek Spreadsheet
    $spreadsheet = new Spreadsheet();

    // Membuat lembar kerja aktif
    $sheet = $spreadsheet->getActiveSheet();

   // Menambahkan judul utama
   if (isset($cari) && !empty($cari)) {
    $judul = "Laporan Rekap Data Hafalan Santri Kelas $cari";
} else {
    $judul = "Laporan Rekap Data Hafalan Santri";
}
   $sheet->setCellValue('A1', $judul)->mergeCells('A1:F1');
   $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

       // Menambahkan baris kosong
       $sheet->getRowDimension(2)->setRowHeight(10);


    // Menambahkan judul kolom
    $sheet->setCellValue('A3', 'Nomor')->getStyle('A3')->getFont()->setBold(true);
    $sheet->setCellValue('B3', 'NIS')->getStyle('B3')->getFont()->setBold(true);
    $sheet->setCellValue('C3', 'Nama')->getStyle('C3')->getFont()->setBold(true);
    $sheet->setCellValue('D3', 'Kelas')->getStyle('D3')->getFont()->setBold(true);
    $sheet->setCellValue('E3', 'Total Juz')->getStyle('E3')->getFont()->setBold(true);
    $sheet->setCellValue('F3', 'Total Surat')->getStyle('F3')->getFont()->setBold(true);



    // Menampilkan data dari database
        $nomor_urut = 1;
        $row = 4; // Dimulai dari baris ke-4
    foreach ($result as $data) :
    $id = $data['id_santri'];

        $sheet->setCellValue('A' . $row, $nomor_urut);
        $sheet->setCellValue('B' . $row, $data['nis']);
        $sheet->setCellValue('C' . $row, $data['nama']);
        $sheet->setCellValue('D' . $row, $data['kelas']);

        $sql = "SELECT COUNT(*) AS JumlahData
        FROM (
          SELECT Juz, COUNT(*) AS Jumlah
          FROM tb_hafalan_baru
          WHERE ID_Santri = $id
          GROUP BY Juz
        ) AS Subquery
        ";
        $quer1 = mysqli_query($koneksi, $sql);
        $data2 = mysqli_fetch_assoc($quer1);
        $sheet->setCellValue('E' . $row, $data2['JumlahData']);

        $sql = "SELECT COUNT(*) AS JumlahData
        FROM (
          SELECT surat, COUNT(*) AS Jumlah
          FROM tb_hafalan_baru
          WHERE ID_Santri = $id
          GROUP BY surat
        ) AS Subquery
        ";
        $query = mysqli_query($koneksi, $sql);
        $data1 = mysqli_fetch_assoc($query);
        $sheet->setCellValue('F' . $row, $data1['JumlahData']);
        
        $nomor_urut ++;
        $row++;
    endforeach;

    // Menambahkan gaya ke seluruh tabel
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();
    $sheet->getStyle('A3:' . $highestColumn . $highestRow)->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);

    // Menyimpan ke file Excel
    $excelFileName = 'rekap_hafalan_santri.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($excelFileName);

    // Mengatur header untuk mengunduh file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    ob_end_clean();
    header('Content-Disposition: attachment;filename="' . $excelFileName . '"');
    header('Cache-Control: max-age=0');
    

    // Mengirimkan file ke browser
    $writer->save('php://output');

    // Tutup koneksi
    mysqli_close($koneksi);
    exit;
}
?>