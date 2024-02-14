<!-- BEGIN: Profile Menu -->
<div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
  <div class="intro-y box mt-5">
    <div class="relative flex items-center p-5">
      <div class="w-12 h-12 image-fit">

        <?php
        $foto = $_SESSION["foto"];
        if ($foto === ''){ ?>
        <img class="rounded-full" src="../assets/dist/images/profile-8.jpg">
        <?php }else{?>
        <img class="rounded-full" src="../assets/img/<?=$_SESSION["foto"] ?>">
        <?php } ?>
      </div>
      <div class="ml-4 mr-auto">
      <?php 
                                $nis = $_SESSION['nama'];
                                $query = $koneksi->query("SELECT * FROM tb_santri WHERE nis = $nis ");
                                $konf = mysqli_fetch_assoc($query);
                                ?>
        <div class="font-medium text-base"><?=$konf["nama"] ?></div>
        <div class="text-slate-500">Santri</div>
      </div>
    </div>
    <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
      <!-- <a class="flex items-center" href=""> <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Personal Information
      </a> -->
      <a class="flex items-center  <?php if($title == 'Update Profile') echo ' text-primary font-medium' ?> mt-5"
        href="ubah-profile"> <i data-lucide="box" class="w-4 h-4 mr-2"></i> Account Settings
      </a>
      <a class="flex items-center <?php if($title == 'Change Password') echo ' text-primary font-medium' ?> mt-5"
        href="ubah-password"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password
      </a>
    </div>
  </div>
</div>
<!-- END: Profile Menu -->