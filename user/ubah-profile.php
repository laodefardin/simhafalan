<?php
$title = 'Update Profile';

include 'layouts/header.php';
include 'layouts/navbar.php';
?>

<div class="content content--top-nav">
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Update Profile
    </h2>
  </div>
  <div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <?php include './layouts/menu_setting.php'; ?>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">

      <?php
  if (isset($_SESSION['pesana']) && $_SESSION['pesana'] <> '') {
    $pesan = $_SESSION['pesana']; ?>
      <?= $_SESSION['pesana']; ?>
      <?php }
    $_SESSION['pesana'] = '';
    unset($_SESSION['pesana']);
    ?>

      <!-- BEGIN: Display Information -->
      <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
          <h2 class="font-medium text-base mr-auto">
            Informasi Profile
          </h2>
        </div>
        <div class="p-5">
          <?php 
          $id = $_SESSION['nama'];
          $query = $koneksi->query("SELECT * FROM tb_pengguna INNER JOIN tb_santri ON tb_pengguna.nama = tb_santri.nis WHERE tb_pengguna.nama = '$id' ");
          foreach ($query as $data) : ?>
          <form class="form-horizontal" action="./setting/change-profile.php" method="post">

            <input type="hidden" name="id" readonly value="<?= $_SESSION['id']; ?>" class="form-control">

            <div class="flex flex-col-reverse xl:flex-row flex-col">
              <div class="flex-1 mt-6 xl:mt-0">
                <div class="grid grid-cols-12 gap-x-5">
                  <div class="col-span-12 2xl:col-span-6">
                    <div>
                      <label for="update-profile-form-1" class="form-label">Username</label>
                      <input id="update-profile-form-1" type="text" name="username" class="form-control"
                        placeholder="Input text" value="<?= $data['username']?>">
                    </div>
                    <div class="mt-3">
                      <label for="update-profile-form-4" class="form-label">Level</label>
                      <input id="update-profile-form-4" type="text" disabled class="form-control"
                        placeholder="Input text" value="<?= $data['level']?>">
                    </div>
                  </div>
                  <div class="col-span-12 2xl:col-span-6">
                    <div class="mt-3 2xl:mt-0">
                      <label for="update-profile-form-4" class="form-label">Full Name</label>
                      <input id="update-profile-form-4" type="text" name="full_name" class="form-control"
                        placeholder="Input text" value="<?= $data['nama']?>">
                    </div>
                    <!-- <div class="mt-3">
                    <label for="update-profile-form-4" class="form-label">Phone Number</label>
                    <input id="update-profile-form-4" type="text" class="form-control" placeholder="Input text"
                      value="65570828">
                  </div> -->
                  </div>
                  <!-- <div class="col-span-12">
                  <div class="mt-3">
                    <label for="update-profile-form-5" class="form-label">Address</label>
                    <textarea id="update-profile-form-5" class="form-control"
                      placeholder="Adress">10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore</textarea>
                  </div>
                </div> -->
                </div>
                <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
              </div>
              <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                <!-- <div
                  class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                  <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">

                    <?php
                  $foto = $data['foto'];
                  if ($foto === ''){ ?>
                    <img class="rounded-md"
                      src="../assets/dist/images/profile-8.jpg">
                    <?php }else{?>
                    <img class="rounded-md"
                      src="../assets/img/<?= $data['foto'] ?>">
                    <?php } ?>

                  </div> -->
                <!-- <div class="mx-auto cursor-pointer relative mt-5">
                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                    <input type="file" name="foto" class="w-full h-full top-0 left-0 absolute opacity-0">
                  </div> -->
              </div>
            </div>
        </div>
        <?php endforeach; ?>
        </form>
      </div>
    </div>
    <!-- END: Display Information -->
  </div>
</div>
</div>

<?php
include 'layouts/footer.php';
?>