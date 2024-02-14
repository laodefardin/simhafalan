<form action="kelas_app/tambah-simpan" method="post">
  <div class="modal-content">
    <!-- BEGIN: Modal Header -->
    <div class="modal-header">
      <h2 class="font-medium text-base mr-auto">Tambah Kelas</h2>
    </div> <!-- END: Modal Header -->
    <!-- BEGIN: Modal Body -->
    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

      <div class="col-span-12 sm:col-span-6"> <label for="nama_kelas" class="form-label">Nama
          Kelas</label>
        <input id="nama_kelas" name="nama_kelas" type="text" class="form-control" placeholder="contoh: XI" required>
      </div>

      <div class="col-span-12 sm:col-span-6"> <label for="wali_kelas" class="form-label">Nama Wali
          Kelas</label> <input id="wali_kelas" name="wali_kelas" type="text" class="form-control"
          placeholder="Masukkan nama walikelas" required> </div>

      <!-- <div class="col-span-12 sm:col-span-12"> <label for="deskripsi_kelas" class="form-label">Deskripsi
                    Kelas</label>
                <textarea name="deskripsi_kelas" id="deskripsi_kelas" class="form-control" cols="3" rows="2"
                    placeholder="Masukkan Deskripsi Kelas (Boleh dikosongkan) "></textarea>
            </div> -->

    </div> <!-- END: Modal Body -->
    <!-- BEGIN: Modal Footer -->
    <div class="modal-footer">
      <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
      <input class="btn btn-primary w-20" type="submit" value="Simpan">
    </div> <!-- END: Modal Footer -->

  </div> <!-- END: Modal Content -->
</form>