<?php 
// mengaktifkan session pada php


// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nisn = $_POST['nisn'];
$nis = $_POST['nis'];


// menyeleksi data petugas dengan nisn dan nis yang sesuai
$sql = "SELECT * FROM siswa WHERE nisn='$nisn' AND nis='$nis'";
$query = mysqli_query($koneksi,$sql);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);

// cek apakah nisn dan nis di temukan pada database
if($cek > 0) {
    session_start();
    $data = mysqli_fetch_array($query);
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['nisn'] = $data['nisn'];

    header('location:halaman_siswa.php');
}else {
    echo"<script>alert('Maaf anda gagal login,silahkan ulangi lagi!');
        window.location.assign('loginSiswa.php');
    </script>";
}



?>