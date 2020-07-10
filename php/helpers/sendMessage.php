<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../helpers/config.php';

// menangkap data yang dikirim dari form
$from = $_SESSION['username'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(isset($_GET['admin']))
{
    $result = $conn->query("INSERT INTO admin_message (username, subject, message, in_out)
    VALUES ('$from', '$subject', '$message', 1)");
}
else
{
    $to = $_POST['to'];
    $result = $conn->query("INSERT INTO user_inbox (from_user, to_user, subject, message)
    VALUES ('$from', '$to', '$subject', '$message')");
}


if($result === TRUE)
{
    header('location:../dashboard/home.php');
}
else{
    echo "error " . $conn->error;
}
?>