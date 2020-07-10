<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../helpers/config.php';

// menangkap data yang dikirim dari form
$from = $_SESSION['username'];
$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$result = $conn->query("INSERT INTO user_inbox (from_user, to_user, subject, message)
VALUES ('$from', '$to', '$subject', '$message')");

if($result === TRUE)
{
    header('location:../dashboard/home.php');
}
else{
    echo "error " . $conn->error;
}
?>