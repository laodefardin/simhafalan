<form action="prestasi_app/tambah-simpan" method="post">
  <div class="modal-content">
    <!-- BEGIN: Modal Header -->
    <div class="modal-header">
      <h2 class="font-medium text-base mr-auto">Tambah Santri</h2>
    </div> <!-- END: Modal Header -->
    <!-- BEGIN: Modal Body -->
    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
      <div class="col-span-12 sm:col-span-12"> 
        <label for="id_santri" class="form-label text-primary font-medium">Pilih Nama Santri</label>
        <select id="id_santri" name="id_santri" data-search="true" class="form-control tom-select w-full">
        <?php
              $query = "SELECT * FROM tb_santri";
              $hasil = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<option value='".$row['id']."'>".$row['nis']." - ".$row['nama']."</option> ";
              }
              ?>
      </select>
      </div>

      <div class="col-span-12 sm:col-span-6"> <label for="waktu_menghafal" class="form-label">Waktu Menghafal</label>
        <input id="waktu_menghafal" name="waktu_menghafal" type="text" class="form-control" placeholder="" required>
      </div>

      <div class="col-span-12 sm:col-span-6"> <label for="tanggal_khatam" class="form-label">Tanggal Khatam</label>
        <input id="tanggal_khatam" name="tanggal_khatam" type="date" class="form-control" required>
      </div>

    </div> <!-- END: Modal Body -->
    <!-- BEGIN: Modal Footer -->
    <div class="modal-footer">
      <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
      <input class="btn btn-primary w-20" type="submit" value="Simpan">
    </div> <!-- END: Modal Footer -->

  </div> <!-- END: Modal Content -->
</form>