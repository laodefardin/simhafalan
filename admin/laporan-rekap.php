<?php
$title = 'Laporan Rekap';

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
    <h2 class="text-lg font-medium mr-auto">Pencarian Data</h2>
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start align-center">
      <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" method="GET" action="">
        <div class="sm:flex items-center sm:mr-4">
          <label class="w-12 flex-none xl:w-auto mr-5">Cari Kelas</label>
          <select id="idsantri" name="cari" data-search="true" class="tom-select w-full">
            <option> Pilih Nama Kelas Disini</option>
            <?php
              $query = "SELECT s.id AS id_santri, s.kelas, COUNT(h.ID) AS JumlahData
              FROM tb_santri s
              LEFT JOIN tb_hafalan_baru h ON s.id = h.ID_Santri
              GROUP BY s.id,s.kelas";
              $hasil = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<option value='".$row['kelas']."'>".$row['kelas']."</option> ";
              }
              ?>
          </select>
        </div>
        <div class="mt-2 xl:mt-0">
          <button id="tabulator-html-filter-go" type="submit" class="btn btn-primary w-full sm:w-16">Go</button>
          <a href="laporan-rekap" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</a>
        </div>
      </form>
    </div>
    <?php
    if (isset($_GET['cari'])){
      $cari = $_GET['cari'];
      echo "<br><b>Hasil Pencarian : Kelas ".$cari."</b>";
    }
    ?>
    <br>
    <div class="card">
      <br>
      <div class="overflow-x-auto">
        <?php
        if (isset($_GET['cari'])){
          $cari = $_GET['cari'];
          $query = $koneksi->query("SELECT s.id AS id_santri, s.nis, s.nama, s.kelas, COUNT(h.ID) AS JumlahData
          FROM tb_santri s
          LEFT JOIN tb_hafalan_baru h ON s.id = h.ID_Santri
          WHERE kelas = '$cari'
          GROUP BY s.id, s.nis, s.nama, s.kelas");
          }else{
            $query = $koneksi->query("SELECT s.id AS id_santri, s.nis, s.nama, s.kelas, COUNT(h.ID) AS JumlahData
            FROM tb_santri s
            LEFT JOIN tb_hafalan_baru h ON s.id = h.ID_Santri
            GROUP BY s.id, s.nis, s.nama, s.kelas");          
          }
          ?>

        <table id="example" class="table table-sm">
          <thead class="table-light">
            <tr>
              <th class="whitespace-nowrap" rowspan="2" style="width: 3%">NOMOR</th>
              <th rowspan="2" style="width: 6%">NIS</th>
              <th rowspan="2" style="width: 8%">Nama</th>
              <th rowspan="2" style="width: 5%">Kelas</th>
              <th rowspan="2" style="width: 5%">Total Juz</th>
              <th rowspan="2" style="width: 5%">Total Surat</th>
            </tr>
          </thead>
          <tbody>
            <tr class="intro-x">
              <?php
            $nomor_urut = 1; 
            foreach ($query as $data) :
              $id = $data['id_santri'];
            ?>
              <td>
                <?= $nomor_urut ?>
              </td>
              <td class="w-40"><?= $data['nis'] ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['kelas'] ?></td>
              <td>
                <?php
              $sql = "SELECT COUNT(*) AS JumlahData
              FROM (
                SELECT Juz, COUNT(*) AS Jumlah
                FROM tb_hafalan_baru
                WHERE ID_Santri = $id
                GROUP BY Juz
              ) AS Subquery
              ";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                <?= $data['JumlahData']; ?> Juz
              </td>
              <td>
                <?php
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
              ?>
                <?= $data['JumlahData']; ?> Surat
              </td>
            </tr>
            <?php $nomor_urut++;  ?>
            <?php endforeach;?>
          </tbody>
        </table>

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
          <h2 class="text-lg font-medium mr-auto"> </h2>
          <!-- <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="kelas" class="btn btn-outline-secondary shadow-md mr-2">Kembali</a>
        </div> -->
          <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

            <form action="laporan/export_excel_rekap.php" target="_blank" method="POST">
              <input type="hidden" name="export_excel" value="1">
              <input type="hidden" name="cari" value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>" >

              <button type="submit" class="btn btn-primary shadow-md mr-2"><i data-lucide="file-text"
                  class="w-4 h-4 mr-2"></i> Ekspor ke Excel</button>
            </form>

            <form action="laporan/export_pdf_rekap.php" target="_blank" method="POST">
              <input type="hidden" name="export_pdf" value="1">
              <input type="hidden" name="cari" value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>" >

              <button type="submit" class="btn btn-primary shadow-md mr-2"><i data-lucide="file-text"
                  class="w-4 h-4 mr-2"></i> Ekspor ke PDF</button>
            </form>

          </div>
        </div>
      </div>
      <!-- /.card-body -->

    </div>
  </div>
  <!-- END: HTML Table Data -->


</div>


<?php
include 'layouts/footer.php';
?>