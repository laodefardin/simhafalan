<?php
$title = 'Kelas';

include 'layouts/header.php';
include 'layouts/navbar.php';
?>
<!-- BEGIN: Content -->
<div class="content content--top-nav">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto"><?= $title ?></h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <!-- <a style="text-align: right;" class='btn btn-primary shadow-md mr-2' href='#tambahkelas' class='btn btn-primary shadow-md mr-2' id='custId' data-toggle='modal'
          data-id="#tambahkelas"><i class='fa fa-plus'></i>+ Tambah Kelas</a> -->

            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#tambah-kelas"
                class="btn btn-primary shadow-md mr-2">+ Tambah Kelas</a>

            <!-- <a href="javascript:;" class="btn btn-primary shadow-md mr-2 tombol-tambahkelas">+ Tambah Kelas</a>  -->
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">

        <?php
$query = $koneksi->query("SELECT * FROM tb_kelas");
foreach ($query as $data) :
?>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">

            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-lucide="user" class="report-box__icon text-success"></i>
                        <div class="ml-auto">
                            <?php
                        $sql = "SELECT count(kelas) as a FROM tb_santri WHERE kelas = '$data[nama_kelas]' ";
                        $query = mysqli_query($koneksi, $sql);
                        $hasil = mysqli_fetch_assoc($query);
                        ?>
                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                title="Jumlah Siswa <?= $hasil['a']; ?>"><?= $hasil['a']; ?><i data-lucide="chevron-up"
                                    class="w-4 h-4 ml-0.5"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="text-3xl font-medium leading-8 mt-6"><a
                                href="santri?kelas=<?= $data['nama_kelas'] ?>">Kelas <?= $data['nama_kelas'] ?></a>
                        </div>
                        <div class="ml-auto">
                            <a href="javascript:;" data-tw-toggle="modal"
                                data-tw-target="#delete-modal-preview<?=$data['id']?>"
                                class="btn btn-danger btn-sm mr-1 mb-2"><i data-lucide="trash" class="w-5 h-5"></i></a>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="text-base text-slate-500 mt-1">Wali : <?= $data['wali_kelas']?></div>
                        <div class="ml-auto">

                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit-kelas<?=$data['id']?>"
                                class="btn btn-warning btn-sm mr-1 mb-2"><i data-lucide="edit" class="w-5 h-5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'kelas_app/edit.php'; ?>

            <div id="delete-modal-preview<?=$data['id']?>" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Apakah anda yakin?</div>
                                <div class="text-slate-500 mt-2">
                                    Apakah anda benar-benar ingin menghapus data ini? <br>
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                <a href="kelas_app/hapus?id=<?= $data['id']?>&kelas=<?= $data['nama_kelas'] ?>"
                                    class="btn btn-danger w-24">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- BEGIN: Large Modal Content -->
<div id="tambah-kelas" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php include 'kelas_app/tambah.php'; ?>
        </div>
    </div>
</div>
<!-- END: Large Modal Content -->

<?php
include 'layouts/footer.php';
?>