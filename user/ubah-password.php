<?php
$title = 'Change Password';

include 'layouts/header.php';
include 'layouts/navbar.php';
?>

<div class="content content--top-nav">
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      <?= $title ?>
    </h2>
  </div>
  <div class="grid grid-cols-12 gap-6">

    <?php include './layouts/menu_setting.php'; ?>

    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
      <!-- BEGIN: Change Password -->

      <?php
  if (isset($_SESSION['pesana']) && $_SESSION['pesana'] <> '') {
    $pesan = $_SESSION['pesana']; ?>
          <?= $_SESSION['pesana']; ?>
          <?php }
    $_SESSION['pesana'] = '';
    unset($_SESSION['pesana']);
    ?>

      <div class="intro-y box lg:mt-5">

        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
          <h2 class="font-medium text-base mr-auto">
            Change Password
          </h2>
        </div>
        <div class="p-5">

          <form class="form-horizontal" action="./setting/change-password.php" method="post">
            <input type="hidden" name="id" readonly value="<?= $_SESSION['id']; ?>" class="form-control">

            <div>
              <label for="change-password-form-1" class="form-label">Old Password</label>
              <input id="change-password-form-1" type="password" name="oldpassword" class="form-control"
                placeholder="Masukkan Password Lama">
            </div>
            <div class="mt-3">
              <label for="change-password-form-2" class="form-label">New Password</label>
              <input id="change-password-form-2" type="password" name="newpassword" class="form-control"
                placeholder="Masukkan Password Baru">
            </div>
            <div class="mt-3">
              <label for="change-password-form-3" class="form-label">Confirm New Password</label>
              <input id="change-password-form-3" type="password" name="passwordrepeat" class="form-control"
                placeholder="Masukkan kembali password baru">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Change Password</button>
        </div>
        </form>

      </div>
      <!-- END: Change Password -->
    </div>
  </div>
</div>

<?php
include 'layouts/footer.php';
?>