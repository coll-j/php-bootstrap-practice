<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_SESSION['username'];
$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$bp = $_POST['birthplace'];
$bd = $_POST['birthdate'];
$mbti = $_POST['mbti'];

// menyeleksi data admin dengan username dan password yang sesuai
$result = $conn->query("UPDATE usersdata SET 
first_name = '$fn',
last_name = '$ln', 
birth_place = '$bp', 
birth_date = '$bd', 
mbti = '$mbti' 
where username='$username'");

// if($result === TRUE)
// {
//     echo "Successfully updated";
// }
// else {
//     echo "error" . $conn->error;
// }
header('location:home.php');
?>