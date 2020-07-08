<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
if(isset($_GET['uname']))
{
    $username = $_GET['uname'];
    if($_SESSION['status'] != 1)
    {
        echo "<script type='text/javascript'>alert('You don't have permission to edit this profile.');</script>";
        header("location:home.php");
    }
    $afterloc = 'location:otheruser.php?username=' . $username;
}
else {
    $username = $_SESSION['username'];
    $afterloc = 'location:home.php';
}
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

header($afterloc);
?>