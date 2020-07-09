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

if($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png" || $_FILES["image"]["type"] == "image/jpg")
{
    $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $result = $conn->query("INSERT INTO usersdata (username, first_name, last_name, birth_place, birth_date, mbti, image)
    VALUES ('$username', '$fn', '$ln', '$bp', '$bd', '$mbti', '$image' )");
}
else{
    $result = $conn->query("INSERT INTO usersdata (username, first_name, last_name, birth_place, birth_date, mbti)
    VALUES ('$username', '$fn', '$ln', '$bp', '$bd', '$mbti')");
}

if($result === TRUE)
{
    header('location:home.php');
}
else{
    echo "error " . $conn->error;
}
?>