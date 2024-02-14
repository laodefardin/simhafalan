<?php
$title = 'Prestasi';

include 'layouts/header.php';
include 'layouts/navbar.php';
?>

<!-- BEGIN: Content -->
<div class="content content--top-nav">

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto"><?= $title ?> </h2>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        <div class="card">
            <br>
            <div class="overflow-x-auto">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">NIS</th>
                            <th class="whitespace-nowrap">Nama</th>
                            <th class="whitespace-nowrap">Kelas</th>
                            <th class="whitespace-nowrap">Waktu Menghafal</th>
                            <th class="whitespace-nowrap">Tanggal Khatam</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $nomor_urut = 1; 
                        $nis = $_SESSION['nama'];
                        $query = $koneksi->query("SELECT p.*, s.nis, s.kelas, s.nama FROM tb_prestasi p LEFT JOIN tb_santri s ON p.id_santri = s.id 
                        ORDER BY p.updated_at DESC"); 
                        // echo "SELECT p.*, s.nis, s.kelas, s.nama FROM tb_prestasi p LEFT JOIN tb_santri s ON p.id_santri = s.id 
                        // WHERE nis = '$nis'
                        // ORDER BY p.updated_at DESC";
                        $data_santri = $query->fetch_all(MYSQLI_ASSOC);
                        if (empty($data_santri)) {
                            // Tampilkan pesan jika tabel kosong
                            echo "<strong> Data belum ada. </strong>";
                        } else {

                        foreach ($query as $data) : ?>

                        <tr class="intro-x">
                            <td>
                                <?= $nomor_urut ?>
                            </td>
                            <td class="w-40"><?= $data['nis'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['kelas'] ?></td>
                            <td><?= $data['waktu_menghafal'] ?></td>
                            <td><?php
                            $databaseDate = $data['tanggal_khatam'];
                            $date = new DateTime($databaseDate);
                            $formattedDate = $date->format('d F Y'); 
                            echo $formattedDate;   
                            ?></td>
                        </tr>

                        <?php $nomor_urut++; endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- END: HTML Table Data -->
</div>



<?php
include 'layouts/footer.php';
?>