<?php
$title = 'Laporan Hafalan';

include 'layouts/header.php';
include 'layouts/navbar.php';
?>

<!-- BEGIN: Content -->
<div class="content content--top-nav">

  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto"><?= $title ?> </h2>
    <!-- <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="kelas" class="btn btn-outline-secondary shadow-md mr-2">Kembali</a>
        </div> -->
    <!-- <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <button class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to
        Excel </button>
      <button class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
      </button>
    </div> -->
  </div>
  <!-- BEGIN: HTML Table Data -->
  <div class="intro-y box p-5 mt-5">
    <br>
    <div class="card">
      <div class="overflow-x-auto">
        <?php
          $cari = $_SESSION['nama'];
          $query = $koneksi->query("SELECT * FROM tb_santri WHERE nis = '$cari' "); 
          $nomor_urut = 1; 
          foreach ($query as $data) : ?>

        <table id="example" class="table table-sm col-4">
          <thead class="table-dark">
            <tr>
              <th class="whitespace-nowrap" rowspan="2" style="width: 3%">NOMOR</th>
              <th rowspan="2" style="width: 6%">NIS</th>
              <th rowspan="2" style="width: 8%">Nama</th>
              <th rowspan="2" style="width: 5%">Kelas</th>
            </tr>
          </thead>
          <tbody>
            <tr class="intro-x">
              <td>
                <?= $nomor_urut ?>
              </td>
              <td class="w-40"><?= $data['nis'] ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['kelas'] ?></td>
            </tr>
            <?php $nomor_urut++;  ?>
          </tbody>
        </table>
        <div class="grid grid-cols-12 gap-6">
          <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Basic Table -->
            <div class="intro-y">
              <div class="p-5" id="basic-table">
                <div class="intro-y flex items-center">
                  <h2 class="text-lg font-medium mr-auto">
                    Hafalan Baru
                  </h2>
                </div>
                <div class="preview">
                  <div class="overflow-x-auto">
                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th class="whitespace-nowrap">#</th>
                          <th class="whitespace-nowrap">Tanggal</th>
                          <th class="whitespace-nowrap">Juz</th>
                          <th class="whitespace-nowrap">Surat</th>
                          <th class="whitespace-nowrap">Ayat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                    $nomor_urut = 1;
                    $id_santri = $data['id'];
                    $query = $koneksi->query("SELECT * FROM  tb_hafalan_baru WHERE id_santri = '$id_santri' "); 
                    foreach ($query as $data) : ?>
                        <tr>
                          <td>
                            <?= $nomor_urut ?>
                          </td>
                          <td>
                            <?php 
                          $databaseDate = $data['tanggal'];
                          $date = new DateTime($databaseDate);
                          $formattedDate = $date->format('d F Y'); 
                          echo $formattedDate;
                          ?>
                          </td>
                          <td><?= $data['juz'] ?></td>
                          <td><?= $data['surat'] ?></td>
                          <td><?= $data['ayat'] ?></td>
                        </tr>
                        <?php $nomor_urut++; endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- END: Basic Table -->
          </div>
          <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Table Head Options -->
            <div class="intro-y">
              <div class="p-5" id="head-options-table">
                <div class="intro-y flex items-center">
                  <h2 class="text-lg font-medium mr-auto">
                    Murojaah
                  </h2>
                </div>
                <div class="preview">
                  <div class="overflow-x-auto">

                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th class="whitespace-nowrap">#</th>
                          <th class="whitespace-nowrap">Tanggal</th>
                          <th class="whitespace-nowrap">Juz</th>
                          <th class="whitespace-nowrap">Surat</th>
                          <th class="whitespace-nowrap">Ayat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                    $nomor_urut = 1;
                    $query = $koneksi->query("SELECT * FROM  tb_murojaah WHERE id_santri = '$id_santri' "); 
                    foreach ($query as $data) : ?>
                        <tr>
                          <td>
                            <?= $nomor_urut ?>
                          </td>
                          <td>
                            <?php 
                          $databaseDate = $data['tanggal'];
                          $date = new DateTime($databaseDate);
                          $formattedDate = $date->format('d F Y'); 
                          echo $formattedDate;
                          ?>
                          </td>
                          <td><?= $data['juz'] ?></td>
                          <td><?= $data['surat'] ?></td>
                          <td><?= $data['ayat'] ?></td>
                        </tr>
                        <?php $nomor_urut++; endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- END: Table Head Options -->
          </div>
        </div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
          <h2 class="text-lg font-medium mr-auto"> </h2>
          <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <form action="../admin/laporan/export_pdf_hafalan.php" target="_blank" method="POST">
              <input type="hidden" name="export_pdf" value="1">
              <input type="hidden" name="cari"
                value="<?= $id_santri ?>">

              <button type="submit" class="btn btn-primary shadow-md mr-2"><i data-lucide="file-text"
                  class="w-4 h-4 mr-2"></i> Ekspor ke PDF</button>
            </form>
          </div>
        </div>

        <?php endforeach;?>
        

      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- END: HTML Table Data -->
</div>


<!-- BEGIN: Large Modal Content -->
<div id="tambah-prestasi" class="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?php include 'prestasi_app/tambah.php'; ?>
    </div>
  </div>
</div>
<!-- END: Large Modal Content -->


<?php
include 'layouts/footer.php';
?>