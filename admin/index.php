<?php
$title = 'Dashboard';
include 'layouts/header.php';
include 'layouts/navbar.php';
?>

<!-- BEGIN: Content -->
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6"
                        role="alert">
                        <span class="text-sm font-medium">
                            <h4>Selamat Datang di Sistem Informasi Manajemen (SIM) Hafalan Al-Quran</h4>
                        </span>
                    </div>
                </div>
                <div class="col-span-12 mt-2">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                                class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="users" class="report-box__icon text-primary"></i>
                                    </div>
                                    <?php
                                    $sql = "SELECT count(id) as a FROM tb_santri";
                                    $query = mysqli_query($koneksi, $sql);
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $data['a']; ?></div>
                                    <div class="text-base text-slate-500 mt-1">Total Santri</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                    </div>
                                    <?php
                                    $sql = "SELECT count(id) as a FROM tb_kelas";
                                    $query = mysqli_query($koneksi, $sql);
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $data['a'] ?></div>
                                    <div class="text-base text-slate-500 mt-1">Total Kelas</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="slack" class="report-box__icon text-danger"></i>
                                    </div>
                                    <?php
                                    $sql = "SELECT count(id) as a FROM tb_prestasi";
                                    $query = mysqli_query($koneksi, $sql);
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $data['a'] ?></div>
                                    <div class="text-base text-slate-500 mt-1">Total Prestasi Santri</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="archive" class="report-box__icon text-primary"></i>
                                    </div>
                                    <?php
                                    $sql = "SELECT count(id) as a FROM tb_hafalan_baru";
                                    $query = mysqli_query($koneksi, $sql);
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?= $data['a'] ?></div>
                                    <div class="text-base text-slate-500 mt-1">Total Hafalan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

            </div>
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                    <!-- BEGIN: Important Notes -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto">
                                Tentang Aplikasi
                            </h2>
                            <button data-carousel="important-notes" data-target="prev"
                                class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                            <button data-carousel="important-notes" data-target="next"
                                class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                        </div>
                        <div class="mt-5 intro-x">
                            <div class="box zoom-in">
                                <div class="tiny-slider" id="important-notes">
                                    <div class="p-5">
                                        <div class="text-base font-medium truncate">Sistem Manajemen Hafalan
                                        </div>
                                        <!-- <div class="text-slate-400 mt-1">20 Hours ago</div> -->
                                        <div class="text-slate-500 text-justify mt-1">Sebuah aplikasi atau platform yang dirancang untuk membantu individu atau kelompok dalam mengelola, mengatur, dan melacak hafalan atau materi yang mereka ingin ingat. Sistem ini umumnya digunakan dalam berbagai konteks, termasuk pendidikan, agama, dan bidang lainnya. Tujuan utama dari sistem ini adalah untuk memudahkan pengguna dalam memahami, mengulang, dan memelihara informasi atau hafalan yang penting bagi mereka.</div>
                                        <!-- <div class="font-medium flex mt-5">
                                            <button type="button" class="btn btn-secondary py-1 px-2">View
                                                Notes</button>
                                            <button type="button"
                                                class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                        </div> -->
                                    </div>
                                    <div class="p-5">
                                        <div class="text-base font-medium truncate">Sistem Manajemen Hafalan
                                        </div>
                                        <!-- <div class="text-slate-400 mt-1">20 Hours ago</div> -->
                                        <div class="text-slate-500 text-justify mt-1">dapat digunakan dalam berbagai konteks, termasuk pendidikan di mana siswa dapat menggunakannya untuk mengatur pelajaran, atau dalam konteks agama di mana pengikut dapat mengelola ayat-ayat suci yang ingin mereka hafal. Selain itu, ini juga dapat digunakan dalam situasi profesional seperti pemasaran, di mana tim pemasaran dapat mengatur dan mengelola pesan-pesan atau materi yang akan digunakan dalam kampanye mereka.</div>
                                        <!-- <div class="font-medium flex mt-5">
                                            <button type="button" class="btn btn-secondary py-1 px-2">View
                                                Notes</button>
                                            <button type="button"
                                                class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                        </div> -->
                                    </div>
                                    <div class="p-5">
                                        <div class="text-base font-medium truncate">Inti dari Sistem Manajemen Hafalan 
                                        </div>
                                        <!-- <div class="text-slate-400 mt-1">20 Hours ago</div> -->
                                        <div class="text-slate-500 text-justify mt-1">Adalah membantu individu dalam mengelola dan mengingat informasi yang penting bagi mereka, sehingga mereka dapat dengan efektif memanfaatkannya dalam berbagai situasi</div>
                                        <!-- <div class="font-medium flex mt-5">
                                            <button type="button" class="btn btn-secondary py-1 px-2">View
                                                Notes</button>
                                            <button type="button"
                                                class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->
<?php
include 'layouts/footer.php';
?>