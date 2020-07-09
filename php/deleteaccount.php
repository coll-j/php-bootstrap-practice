<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
if(isset($_GET['username']))
{
    $username = $_GET['username'];
    $nextloc = 'location:home.php';
}
else
{
    $username = $_SESSION['username'];
    $nextloc = 'location:index.php';
}

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
    header($nextloc);
}
else {
    echo "error" . $conn->error;
}

?>