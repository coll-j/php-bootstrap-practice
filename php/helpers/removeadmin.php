<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_GET['admin'];
if(isset($_GET['from']))
{
    $nextloc = "location:../dashboard/otheruser.php?username=" . $username;
}
else
{
    $nextloc = "location:../dashboard/adminmember.php";
}

// menyeleksi data admin dengan username dan password yang sesuai
$result = $conn->query("UPDATE users SET admin_flag = 0 where username='$username'");
if($result === TRUE)
{
    header($nextloc);
}
else {
    echo "error" . $conn->error;
}

?>