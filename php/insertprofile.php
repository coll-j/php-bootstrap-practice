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
$result = $conn->query("INSERT INTO usersdata (username, first_name, last_name, birth_place, birth_date, mbti) VALUES
('$username', '$fn', '$ln', '$bp', '$bd', '$mbti' )");

header('location:home.php');
?>