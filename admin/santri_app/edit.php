<!-- BEGIN: Large Modal Content -->
<div id="edit-santri<?=$data['id']?>" class="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form action="santri_app/edit-simpan" method="post">
  <div class="modal-content">
    <!-- BEGIN: Modal Header -->
    <div class="modal-header">
      <h2 class="font-medium text-base mr-auto">Edit Santri</h2>
    </div> <!-- END: Modal Header -->
    <!-- BEGIN: Modal Body -->
    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
      <input type="text" name="id" value="<?= $data['id'] ?>" hidden>
      <input type="text" name="kelas" value="<?= $_GET['kelas']?>" hidden>
      
      <div class="col-span-12 sm:col-span-6"> <label for="nis_siswa" class="form-label">NIS Siswa<span class="text-danger">*</span></label>
        <input id="nis_siswa" name="nis_siswa" type="text" class="form-control" placeholder="Masukkan NIS Siswa"
          required value="<?= $data['nis'] ?>" disabled>
          <input id="nis_siswa" name="nis_siswa" type="text" class="form-control" placeholder="Masukkan NIS Siswa"
          required value="<?= $data['nis'] ?>" hidden>
      </div>

      <div class="col-span-12 sm:col-span-6"> <label for="username" class="form-label">Username Siswa<span class="text-danger">*</span></label>
        <input id="username" name="username" value="<?= $data['username'] ?>" type="text" class="form-control" placeholder="Masukkan Username untuk login"
          required>
      </div>

      <div class="col-span-12 sm:col-span-6"> <label for="nama_siswa" class="form-label">Nama Siswa</label>
        <input id="nama_siswa" name="nama_siswa" type="text" class="form-control" placeholder="Masukkan Nama Siswa"
          required value="<?= $data['nama'] ?>">
      </div>

      <div class="col-span-12 sm:col-span-6"> <label for="nama_ortu" class="form-label">Nama Orang Tua</label> <input
          id="nama_ortu" name="nama_ortu" type="text" class="form-control" placeholder="Masukkan nama orang tua"
          required value="<?= $data['nama_ortu'] ?>"> </div>

      <div class="col-span-12 sm:col-span-6"> <label for="tempatlahir" class="form-label">Tempat Lahir</label> <input
          id="tempatlahir" name="tempatlahir" type="text" class="form-control" placeholder="Masukkan tempat lahir"
          required value="<?= $data['tempatlahir'] ?>"> </div>

      <div class="col-span-12 sm:col-span-6"> <label for="tanggallahir" class="form-label">Tanggal Lahir</label> <input
          id="tanggallahir" name="tanggallahir" type="date" class="form-control" placeholder="Masukkan Tanggal Lahir"
          required value="<?= $data['tanggallahir'] ?>"></div>

      <div class="col-span-12 sm:col-span-6"> <label for="no_hp" class="form-label">No HandPhone</label> <input
          id="no_hp" name="no_hp" type="number" class="form-control" placeholder="Masukkan nomor HP yang aktif" required value="<?= $data['no_hp'] ?>">
      </div>

      <div class="col-span-12 sm:col-span-6"> <label for="alamat" class="form-label">Alamat Tempat Tinggal</label>
        <textarea name="alamat" id="alamat" class="form-control" cols="3" rows="2"
          placeholder="Masukkan Alamat tempat tinggal "><?= $data['alamat'] ?></textarea>
      </div>

    </div> <!-- END: Modal Body -->
    <!-- BEGIN: Modal Footer -->
    <div class="modal-footer">
      <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
      <input class="btn btn-primary w-20" type="submit" value="Simpan">
    </div> <!-- END: Modal Footer -->

  </div> <!-- END: Modal Content -->
</form>
    </div>
  </div>
</div>
<!-- END: Large Modal Content -->