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

if(isset($_GET['admin']))
{
    $in = $_GET['admin'];
    if($in == 0) $from = $to;
    $result = $conn->query("INSERT INTO admin_message (username, subject, message, in_out, time)
    VALUES ('$from','$subject', '$message', $in, now())");
}
else
{
    $result = $conn->query("INSERT INTO user_inbox (from_user, to_user, subject, message, time)
    VALUES ('$from', '$to', '$subject', '$message', now())");
}

if($result === TRUE)
{
    header('location:../dashboard/home.php');
}
else{
    echo "error " . $conn->error;
}
?>