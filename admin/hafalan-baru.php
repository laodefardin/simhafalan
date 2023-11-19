<?php
$title = 'Hafalan Baru';

include 'layouts/header.php';
include 'layouts/navbar.php';
?>

<!-- BEGIN: Content -->
<div class="content content--top-nav">

  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto"><?= $title ?> </h2>
    <!-- <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href="kelas" class="btn btn-outline-secondary shadow-md mr-2">Kembali</a>
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#tambah-santri"
        class="btn btn-primary shadow-md mr-2">+ Tambah Santri</a>
    </div> -->
  </div>

  <div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 md:col-span-5 2xl:col-span-4 flex lg:block flex-col-reverse">

      <div class="intro-y box mt-5">
        <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
          <div class="mt-3 mb-3">
            <label for="idsantri" class="form-label flex items-center text-primary font-medium">Cari Nama
              Santri</label>
            <select id="idsantri" name="idsantri" data-search="true" class="tom-select w-full">
              <?php
              $query = "SELECT * FROM tb_santri";
              $hasil = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<option value='".$row['id']."'>".$row['nama']."</option> ";
              }
              ?>
            </select>
          </div>
        </div>

        <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400 flex">
          <div class="mt-2 xl:mt-0">
            <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16"
              onclick="cariSantri()">Cari</button>
            <a href="hafalan-baru" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</a>
          </div>
        </div>
      </div>

    </div>
    <!-- END: Profile Menu -->


    <div class="col-span-12 lg:col-span-8 md:col-span-5 2xl:col-span-8">
      <!-- BEGIN: Personal Information -->
      <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
          <h2 class="font-medium text-base mr-auto">
            Informasi Santri
          </h2>
        </div>
        <div class="p-5">
          <div class="grid grid-cols-12 gap-x-5">
            <div class="col-span-12 xl:col-span-6">
              <div>
                <label for="nis" class="form-label">NIS</label>
                <input id="nis" name="nis" type="text" class="form-control" value="" disabled>
              </div>
              <div class="mt-3">
                <label for="nama_santri" class="form-label">Nama Santri</label>
                <input id="nama" name="nama" type="text" class="form-control" value="" disabled>
              </div>
            </div>
            <div class="col-span-12 xl:col-span-6">
              <div class="mt-3 xl:mt-0">
                <label for="kelas_santri" class="form-label">Kelas</label>
                <input id="kelas" name="kelas" type="text" class="form-control" value="" disabled>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END: Personal Information -->

      <!-- BEGIN: Personal Information -->
      <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
          <h2 class="font-medium text-base mr-auto">
            Input Data Hafalan Baru
          </h2>
        </div>
        <div class="p-5">
          <form action="hafalanbaru_app/tambah" method="post">
            <div class="grid grid-cols-12 gap-x-5">
              <input id="id" name="id" type="text" class="form-control" value="" hidden>
              <div class="col-span-12 xl:col-span-6">
                <div>
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input id="tanggal" name="tanggal" type="date" class="form-control" placeholder="Input text" value="" required>
                </div>
                <div class="mt-3">
                  <label for="juz" class="form-label">Juz Dalam Al-Quran</label>
                  <select id="juz" name="juz" class="form-select" required>
                    <?php
                  for ($i = 1; $i <= 30; $i++) {
                  echo "<option value='Juz $i'>Juz $i</option>";
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="col-span-12 xl:col-span-6">
                <div class="mt-3 xl:mt-0">
                  <label for="surat" class="form-label">Surat</label>
                  <select id="surat" name="surat" data-search="true" class="tom-select w-full" required>
                    <option value="Al-Fatihah">1. Al-Fatihah (Pembuka)</option>
                    <option value="Al-Baqarah">2. Al-Baqarah (Sapi Betina)</option>
                    <option value="Ali-Imran">3. Ali-Imran (Keluarga Imran)</option>
                    <option value="An-Nisa'">4. An-Nisa' (Wanita)</option>
                    <option value="Al-Ma'idah">5. Al-Ma'idah (Meja)</option>
                    <option value="Al-An'am">6. Al-An'am (Binatang Ternak)</option>
                    <option value="Al-A'raf">7. Al-A'raf (Puncak-Puncak)</option>
                    <option value="Al-Anfal">8. Al-Anfal (Harta Rampasan Perang)</option>
                    <option value="At-Tawbah">9. At-Tawbah (Pengampunan)</option>
                    <option value="Yunus">10. Yunus (Nabi Yunus)</option>
                    <option value="Hud">11. Hud (Nabi Hud)</option>
                    <option value="Yusuf">12. Yusuf (Nabi Yusuf)</option>
                    <option value="Ar-Ra'd">13. Ar-Ra'd (Guruh)</option>
                    <option value="Ibrahim">14. Ibrahim (Nabi Ibrahim)</option>
                    <option value="Al-Hijr">15. Al-Hijr (Bukit-Hijr)</option>
                    <option value="An-Nahl">16. An-Nahl (Lebah)</option>
                    <option value="Al-Isra'">17. Al-Isra' (Malam Isra')</option>
                    <option value="Al-Kahf">18. Al-Kahf (Gua)</option>
                    <option value="Maryam">19. Maryam (Maryam)</option>
                    <option value="Ta-Ha">20. Ta-Ha (Ta-Ha)</option>
                    <option value="Al-Anbiya'">21. Al-Anbiya' (Para Nabi)</option>
                    <option value="Al-Hajj">22. Al-Hajj (Haji)</option>
                    <option value="Al-Mu'minun">23. Al-Mu'minun (Orang-Orang Mukmin)</option>
                    <option value="An-Nur">24. An-Nur (Cahaya)</option>
                    <option value="Al-Furqan">25. Al-Furqan (Pembeda)</option>
                    <option value="Asy-Syu'ara'">26. Asy-Syu'ara' (Penyair)</option>
                    <option value="An-Naml">27. An-Naml (Semut)</option>
                    <option value="Al-Qasas">28. Al-Qasas (Cerita)</option>
                    <option value="Al-Ankabut">29. Al-Ankabut (Labah-Labah)</option>
                    <option value="Ar-Rum">30. Ar-Rum (Romawi)</option>
                    <option value="Luqman">31. Luqman (Luqman)</option>
                    <option value="As-Sajda">32. As-Sajda (Sujud)</option>
                    <option value="Al-Ahzab">33. Al-Ahzab (Kumpulan-Kumpulan)</option>
                    <option value="Saba'">34. Saba' (Saba')</option>
                    <option value="Fatir">35. Fatir (Pencipta)</option>
                    <option value="Ya-Sin">36. Ya-Sin (Ya-Sin)</option>
                    <option value="As-Saffat">37. As-Saffat (Orang-Orang Yang Bersaf-Saf)</option>
                    <option value="Sad">38. Sad (Shaad)</option>
                    <option value="Az-Zumar">39. Az-Zumar (Orang-Orang Yang Berkumpul)</option>
                    <option value="Ghafir">40. Ghafir (Maha Pengampun)</option>
                    <option value="Fussilat">41. Fussilat (Yang Dijelaskan)</option>
                    <option value="Ash-Shura">42. Ash-Shura (Musyawarah)</option>
                    <option value="Az-Zukhruf">43. Az-Zukhruf (Perhiasan)</option>
                    <option value="Ad-Dukhan">44. Ad-Dukhan (Kabut)</option>
                    <option value="Al-Jathiya">45. Al-Jathiya (Berlutut)</option>
                    <option value="Al-Ahqaf">46. Al-Ahqaf (Bukit Pasir)</option>
                    <option value="Muhammad">47. Muhammad (Nabi Muhammad)</option>
                    <option value="Al-Fath">48. Al-Fath (Kemenangan)</option>
                    <option value="Al-Hujuraat">49. Al-Hujuraat (Kamar-Kamar)</option>
                    <option value="Qaaf">50. Qaaf (Qaaf)</option>
                    <option value="Adh-Dhariyat">51. Adh-Dhariyat (Angin Yang Menerbangkan)</option>
                    <option value="At-Tur">52. At-Tur (Bukit Tur)</option>
                    <option value="An-Najm">53. An-Najm (Bintang)</option>
                    <option value="Al-Qamar">54. Al-Qamar (Bulan)</option>
                    <option value="Ar-Rahman">55. Ar-Rahman (Maha Pengasih)</option>
                    <option value="Al-Waqi'ah">56. Al-Waqi'ah (Hari Kiamat)</option>
                    <option value="Al-Hadid">57. Al-Hadid (Besi)</option>
                    <option value="Al-Mujadila">58. Al-Mujadila (Wanita Yang Mengadu)</option>
                    <option value="Al-Hashr">59. Al-Hashr (Pengusiran)</option>
                    <option value="Al-Mumtahanah">60. Al-Mumtahanah (Yang Diuji)</option>
                    <option value="Ash-shaf">61. Ash-shaf (Barisan)</option>
                    <option value="Al-Jumu'ah">62. Al-Jumu'ah (Jum'ah)</option>
                    <option value="Al-Munafiqun">63. Al-Munafiqun (Orang-Orang Munafik)</option>
                    <option value="At-Taghabun">64. At-Taghabun (Tuntutan Membuktikan)</option>
                    <option value="At-Talaq">65. At-Talaq (Perceraian)</option>
                    <option value="At-Tahrim">66. At-Tahrim (Mengharamkan)</option>
                    <option value="Al-Mulk">67. Al-Mulk (Kerajaan)</option>
                    <option value="Al-Qalam">68. Al-Qalam (Pena)</option>
                    <option value="Al-Haaqqa">69. Al-Haaqqa (Kenyataan Yang Tak Terhindarkan)</option>
                    <option value="Al-Ma'arij">70. Al-Ma'arij (Tempat-Tempat Naik)</option>
                    <option value="Nuh">71. Nuh (Nabi Nuh)</option>
                    <option value="Al-Jinn">72. Al-Jinn (Jin)</option>
                    <option value="Al-Muzzammil">73. Al-Muzzammil (Orang Yang Berselimut)</option>
                    <option value="Al-Muddaththir">74. Al-Muddaththir (Orang Yang Berkemul)</option>
                    <option value="Al-Qiyama">75. Al-Qiyama (Hari Kebangkitan)</option>
                    <option value="Al-Insan">76. Al-Insan (Manusia)</option>
                    <option value="Al-Mursalat">77. Al-Mursalat (Malaikat-Malaikat Yang Diutus)</option>
                    <option value="An-Naba'">78. An-Naba' (Berita Besar)</option>
                    <option value="An-Nazi'at">79. An-Nazi'at (Malaikat-Malaikat Yang Mencabut)</option>
                    <option value="Abasa">80. Abasa (Ia Bermuka Masam)</option>
                    <option value="At-Takwir">81. At-Takwir (Bintang-Bintang Yang Jatuh)</option>
                    <option value="Al-Infitar">82. Al-Infitar (Terbelah)</option>
                    <option value="Al-Mutaffifin">83. Al-Mutaffifin (Orang-Orang Yang Curang)</option>
                    <option value="Al-Inshiqaq">84. Al-Inshiqaq (Terbelah)</option>
                    <option value="Al-Buruj">85. Al-Buruj (Bintang-Bintang Yang Bersinar)</option>
                    <option value="At-Tariq">86. At-Tariq (Yang Datang Di Malam Hari)</option>
                    <option value="Al-A'la">87. Al-A'la (Yang Paling Tinggi)</option>
                    <option value="Al-Ghashiyah">88. Al-Ghashiyah (Hari Pembalasan)</option>
                    <option value="Al-Fajr">89. Al-Fajr (Fajar)</option>
                    <option value="Al-Balad">90. Al-Balad (Negeri)</option>
                    <option value="Ash-Shams">91. Ash-Shams (Matahari)</option>
                    <option value="Al-Layl">92. Al-Layl (Malam)</option>
                    <option value="Adh-Dhuha">93. Adh-Dhuha (Duha)</option>
                    <option value="Ash-Sharh">94. Ash-Sharh (Melepaskan)</option>
                    <option value="At-Tin">95. At-Tin (Buah Tin)</option>
                    <option value="Al-Alaq">96. Al-Alaq (Segumpal Darah)</option>
                    <option value="Al-Qadr">97. Al-Qadr (Kemuliaan)</option>
                    <option value="Al-Bayyina">98. Al-Bayyina (Bukti Yang Nyata)</option>
                    <option value="Az-Zalzalah">99. Az-Zalzalah (Kegoncangan)</option>
                    <option value="Al-Adiyat">100. Al-Adiyat (Kuda Perang Yang Berlari Kencang)</option>
                    <option value="Al-Qari'ah">101. Al-Qari'ah (Hari Pembalasan)</option>
                    <option value="At-Takathur">102. At-Takathur (Bermegah-Megah)</option>
                    <option value="Al-Asr">103. Al-Asr (Masa)</option>
                    <option value="Al-Humazah">104. Al-Humazah (Pengumpat)</option>
                    <option value="Al-Fil">105. Al-Fil (Gajah)</option>
                    <option value="Quraish">106. Quraish (Suku Quraish)</option>
                    <option value="Al-Ma'un">107. Al-Ma'un (Barang Yang Berguna)</option>
                    <option value="Al-Kawthar">108. Al-Kawthar (Nikmat Yang Berlimpah)</option>
                    <option value="Al-Kafirun">109. Al-Kafirun (Orang-Orang Kafir)</option>
                    <option value="An-Nasr">110. An-Nasr (Pertolongan)</option>
                    <option value="Al-Masad">111. Al-Masad (Bambu Api)</option>
                    <option value="Al-Ikhlas">112. Al-Ikhlas (Kesucian)</option>
                    <option value="Al-Falaq">113. Al-Falaq (Waktu Subuh)</option>
                    <option value="An-Nas">114. An-Nas (Manusia)</option>
                  </select>
                </div>

                <div class="mt-3">
                  <label for="ayat" class="form-label">Ayat dalam Al-quran</label>
                  <input id="ayat" type="text" name="ayat" class="form-control" placeholder="Masukkan Ayat" required>
                </div>
              </div>
            </div>
            <div class="flex justify-end mt-4">
              <button type="submit" class="btn btn-primary w-20 mr-auto">Simpan</button>
              <!-- <a href="" class="text-danger flex items-center"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
              Account </a> -->
            </div>
          </form>
        </div>
      </div>
      <!-- END: Personal Information -->
    </div>

    <div class="col-span-12 lg:col-span-12 md:col-span-5 2xl:col-span-12">
      <!-- BEGIN: Personal Information -->



      <div class="intro-y box mt-5">
        <div class="overflow-x-auto">
          <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
              Daftar Santri Hafalan Baru
            </h2>
          </div>
          <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
              <div class="col-span-12 xl:col-span-12">
                <table id="example" class="display">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tanggal</th>
                      <th>Nis</th>
                      <th>Nama Santri</th>
                      <th>Kelas</th>
                      <th>Juz</th>
                      <th>Surat</th>
                      <th>Ayat</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                $nomor_urut = 1;
                $query = "SELECT h.*, s.nis, s.kelas, s.nama FROM tb_hafalan_baru h INNER JOIN tb_santri s ON h.id_santri = s.id ORDER BY h.updated_at DESC";
                $hasil = mysqli_query($koneksi, $query);
                foreach ($hasil as $data) : ?>
                    <tr>
                      <td><?= $nomor_urut ?></td>
                      <td> <?= date('d F Y', strtotime($data['tanggal'])) ?></td>
                      <td><?= $data['nis'] ?></td>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['kelas'] ?></td>
                      <td><?= $data['juz'] ?></td>
                      <td><?= $data['surat'] ?></td>
                      <td><?= $data['ayat'] ?></td>
                      <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                          <a href="javascript:;" data-tw-toggle="modal"
                            data-tw-target="#edit-hafalanbaru<?=$data['id']?>"
                            class="btn btn-warning btn-sm mr-1 mb-2"><i data-lucide="edit" class="w-5 h-5"></i>
                            Edit</a>

                          <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modal-preview<?= $data['id']?>"
                            class="btn btn-danger btn-sm mr-1 mb-2"><i data-lucide="trash" class="w-5 h-5"></i>
                            Hapus</a>
                        </div>
                      </td>
                    </tr>
                    <?php include 'hafalanbaru_app/edit.php'; ?>

                    <div id="delete-modal-preview<?= $data['id']?>" class="modal" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body p-0">
                            <div class="p-5 text-center">
                              <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                              <div class="text-3xl mt-5">Apakah anda yakin?</div>
                              <div class="text-slate-500 mt-2">
                                Apakah anda benar-benar ingin menghapus data ini?
                              </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                              <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                              <a href="hafalanbaru_app/hapus?id=<?= $data['id']?>"
                                class="btn btn-danger w-24">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php $nomor_urut++; endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Personal Information -->

  </div>
</div>

<script>
  function cariSantri() {
    var idsantri = document.getElementById("idsantri").value;

    // Buat permintaan Ajax ke server untuk mengambil data berdasarkan idsantri
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "hafalanbaru_app/cari_santri.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);

        // Tampilkan hasil pencarian dalam input elemen yang sesuai
        document.getElementById("id").value = response.id;
        document.getElementById("nis").value = response.nis;
        document.getElementById("nama").value = response.nama;
        document.getElementById("kelas").value = response.kelas;
      }
    };

    // Kirim idsantri ke server
    var params = "idsantri=" + idsantri;
    xhr.send(params);
  }
</script>

<?php
include 'layouts/footer.php';
?>