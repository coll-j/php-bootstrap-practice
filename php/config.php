<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "tugas3";

$conn = mysqli_connect($server, $user, $password, $db);

if( !$conn ){
    die("Connection failed: " . mysqli_connect_error());
}

echo "database connected.\n";

?>