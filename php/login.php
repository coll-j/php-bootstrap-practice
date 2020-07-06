<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
// menyeleksi data admin dengan username dan password yang sesuai
$data = $conn->query("select * from users where username='$username'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $user = $data->fetch_assoc();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $user["pass"];
    $_SESSION['status'] = $user["admin_flag"];
    header("location:pass.php");
}else{
	header("location:index.php?pesan=gagal&user=$username");
}
?>