<?php

include 'config.php';

session_start();
if(isset($_SESSION["password"]) && $_SESSION["password"] != "")
{
    $sql = "INSERT INTO users (username, pass, admin_flag) VALUE ('".$_SESSION['username']."', '".$_SESSION['password']."', '".$_SESSION['status']."') ";
    $query = $conn->query($sql);

    if( $query ) {
        header("location:../dashboard/home.php");
    }
    else{
        die("something went wrong." . $conn->error);
    }
}
?>