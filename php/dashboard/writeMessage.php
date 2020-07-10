<!DOCTYPE html>
<?php

include '../helpers/config.php';

session_start();
include("../../html/dashboard/writeMessage.html");
if(isset($_GET['user']))
{
    echo "<script type='text/javascript'>
        document.getElementById('to').value = '" . $_GET['user'] . "'; 
    </script>";
}
if(isset($_GET['admin']))
{
    echo "<script type='text/javascript'>
    is_admin = 1;
    </script>";
}
?>
</html>