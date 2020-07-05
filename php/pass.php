<?php

session_start();
if(!isset($_SESSION['username'])) {
    if(isset($_POST['username'])){
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = "";
        $_SESSION['status'] = "0";
    }
    else{
        die("something went wrong.");
    }
}
include("../html/passlogin.html");

?>