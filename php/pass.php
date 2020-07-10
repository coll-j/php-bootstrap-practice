<?php

session_start();

include 'helpers/config.php';

if(isset($_POST['username']))
{
    $_SESSION['username'] = $_POST['username'];
    $username = $_SESSION['username'];
    // menyeleksi data admin dengan username dan password yang sesuai
    $data = $conn->query("select * from users where username='$username'");
    
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
    
    if($cek > 0){
        header("location:index.php?pesan=exist&user=$username");
    }
    else
    {
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = "";
        $_SESSION['status'] = "0";
    }
}

// if(!isset($_SESSION['username'])) {
//     if(isset($_POST['username'])){
//     }
//     else{
//         die("something went wrong.");
//     }
// }
include("../html/passlogin.html");

?>