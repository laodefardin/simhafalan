// const flashData = $('.flash-data').data('flashdata');
// // console.log(flashData);

// if (flashData) {
//     Swal.fire(
//         'Selamat Data...',
//         'Berhasil di ' + flashData,
//         'success'
//     );
// }

// const flashData1 = $('.flash-dataa').data('flashdata');
// if (flashData1) {
//     Swal.fire(
//         ' ' + flashData1,
//         'success'
//     );
// }

const flashData = document.getElementById("flash-data");
    if(flashData) {

      const notifType = flashData.getAttribute('data-type');
      const notifMsg = flashData.getAttribute('data-message');

      Swal.fire({
        title: notifType,
        text: notifMsg,
        icon: notifType,
      });
    }

// tombol-hapus
$('.tombol-hapus').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });

    // tombol-batalkan
$('.tombol-batalkan').on('click',
function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "data akan dibatalkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, batalkan!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

// tombol-validasi
$('.tombol-validasi').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin sudah cek berkas?',
            text: "data akan verifikasi dan lulus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });

    // tombol-validasi
$('.tombol-unvalidasi').on('click',
function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin sudah cek berkas?',
        text: "Verifikasi data akan dibatalkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

    // tombol-validasi
    $('.tombol-tidaklulus').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
    
        Swal.fire({
            title: 'Apakah anda yakin sudah cek berkas?',
            text: "Kelulusan Siswa Tidak Lulus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });

// tombol-hapus
$('.tombol-kembali').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Anda yakin?',
            text: "Apakah benar Tools ini sudah dikembalikan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, sudah dikembalikan!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });

$('.tombol-perpanjang').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Anda yakin?',
            text: "Apakah batas waktu peminjaman akan diperpanjang?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, perpanjang!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });

$('.tombol-hilang').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Anda yakin?',
            text: "Apakah benar buku telah hilang?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hilang!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });