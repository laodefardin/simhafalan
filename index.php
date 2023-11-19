<?php
ob_start();
include("config/koneksi.php");

if(isset($_POST["submit"])) {
$username = htmlentities(strip_tags(trim($_POST["username"])));
$password = htmlentities(strip_tags(trim($_POST["password"])));

session_start();
$username = $koneksi->escape_string($username);
$password = $koneksi->escape_string($password);

$password_sha1 = md5(sha1(md5($password)));

$query = "SELECT * FROM tb_pengguna WHERE username = '$username' AND password = '$password_sha1'";
$result = $koneksi->query($query);
$row = $result->num_rows;
$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE username = '$username'");
$akun = $sql->fetch_assoc();

if ($row > 0 ){
    $akun = $result->fetch_assoc();
    mysqli_free_result($result);
    
    mysqli_close($koneksi);
    $_SESSION["username"] = $akun["username"];
    $_SESSION["nama"] = $akun["nama"];
    $_SESSION["level"] = $akun["level"];
    $_SESSION["id"] = $akun['id'];
    $_SESSION['foto'] = $akun['foto'];

    $level = $akun["level"];
    if($level === 'Orang Tua Santri'){
        echo "<script> document.location.href='user/index'; </script>";
    }else{
        echo "<script> document.location.href='admin/index'; </script>";
    }
}else{
    $_SESSION['pesan'] = '
    <div class="alert alert-dismissible show box bg-danger text-white flex items-center mb-6" role="alert">
    <span>Username dan Password Tidak ditemukan</span>
    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button></div> ';
}
}
else{
  $username = "";
  $password = "";
}
?>
<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="assets/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Login - Sistem Informasi Manajemen (SIM) Hafalan Al-Quran</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="assets/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="assets/dist/images/logo.svg">
                    <span class="text-white text-lg ml-3"> Sistem Informasi Manajemen (SIM) Hafalan Al-Quran</span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16 mr-10"
                        src="assets/dist/images/Muslim_people_read_quran_1-ai.svg" style="width: 450px;">
                    <div class="-intro-x text-white font-sm text-4xl leading-tight mt-10">
                    Sistem Informasi Manajemen (SIM) 
                        <br>
                        Hafalan Al-Quran
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">"Memudahkan
                        Pengorganisasian dan Pemantauan Progress Hafalan"</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Silahkan Login
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Sistem Informasi Hafalan</div>
                    <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    
                    echo $pesan = $_SESSION['pesan'];
                }
                //mengatur session pesan menjadi kosong
                $_SESSION['pesan'] = '';
                ?>
                    <form action="" method="post">
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block" name="username"
                                value="<?php echo $username ?>" placeholder="Username" required>
                            <input type="password" name="password" value="<?php echo $password ?>"
                                class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password (Nis Santri)"
                                required>
                        </div>
                        <!-- <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href="">Forgot Password?</a> 
                        </div> -->
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button name="submit" type="submit"
                                class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                            <!-- <button
                                class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</button> -->
                        </div>
                        <!-- <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"> By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a> </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/dist/js/app.js"></script>
</body>
</html>