<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_SESSION['username'];

// menyeleksi data admin dengan username dan password yang sesuai
$result = $conn->query("DELETE from usersdata where username='$username'");
if($result === TRUE)
{
}
else {
    echo "error" . $conn->error;
}
$result = $conn->query("DELETE from users where username='$username'");
if($result === TRUE)
{
    header('location:index.php');
}
else {
    echo "error" . $conn->error;
}

?>