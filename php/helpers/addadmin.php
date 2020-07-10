<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_GET['admin'];

// menyeleksi data admin dengan username dan password yang sesuai
$result = $conn->query("UPDATE users SET admin_flag = 1 where username='$username'");
if($result === TRUE)
{
    header("location:../dashboard/otheruser.php?username=" . $username);
}
else {
    echo "error" . $conn->error;
}

?>