<!-- BEGIN: Large Modal Content -->
<div id="edit-kelas<?= $data['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="./kelas_app/edit-simpan" method="post">
        <div class="modal-content">
          <!-- BEGIN: Modal Header -->
          <div class="modal-header">
            <h2 class="font-medium text-base mr-auto">Edit Kelas</h2>
          </div> <!-- END: Modal Header -->
          <!-- BEGIN: Modal Body -->
          <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
            <input type="text" name="id" value="<?= $data['id'] ?>" hidden>
            <div class="col-span-12 sm:col-span-6"> <label for="nama_kelas" class="form-label">Nama
                Kelas</label>
              <input id="nama_kelas" name="nama_kelas" type="text" class="form-control" placeholder="contoh: XI"
                required value="<?= $data['nama_kelas'] ?>">
            </div>

            <div class="col-span-12 sm:col-span-6"> <label for="wali_kelas" class="form-label">Nama Wali
                Kelas</label> <input id="wali_kelas" name="wali_kelas" type="text" class="form-control"
                placeholder="Masukkan nama walikelas" required value="<?= $data['wali_kelas'] ?>"> </div>

            <!-- <div class="col-span-12 sm:col-span-12"> <label for="deskripsi_kelas" class="form-label">Deskripsi
                              Kelas</label>
                          <textarea name="deskripsi_kelas" id="deskripsi_kelas" class="form-control" cols="3" rows="2"
                              placeholder="Masukkan Deskripsi Kelas (Boleh dikosongkan) ">{{ isset($row) ? $row->deskripsi_kelas : ''}}</textarea>
                      </div> -->

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