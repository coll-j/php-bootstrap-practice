<?php

include '../helpers/config.php';
session_start();
$id = $_POST['id'];
if(isset($_GET['admin']))
{
    $results = $conn->query("select * from admin_message where id=$id");
    if($results === TRUE)
    {

    }
    else{
        echo"select * from admin_message where id=".$id;
        die(mysqli_error($conn));
    }
    $msg = mysqli_fetch_array($results);
    
    echo "<script type='text/javascript'>
    var from = '" . $msg['username'] ."';
    var subject = '" . $msg['subject'] ."';
    var msgbody = '" . $msg['message'] ."';
    </script>";

    // $conn->query("UPDATE admin_message SET is_read=1 where id=$id");
    mysqli_query($conn, "UPDATE admin_message SET is_read=1 where id=$id") or die(mysqli_error($conn));
}
else
{
    $results = $conn->query("select * from user_inbox where id=$id");
    if($results === TRUE)
    {
    }
    else{
        echo"select * from user_inbox where id=".$id;
        die(mysqli_error($conn));
    }
    $msg = mysqli_fetch_array($results);
    
    echo "<script type='text/javascript'>
    var from = '" . $msg['from_user'] ."';
    var subject = '" . $msg['subject'] ."';
    var msgbody = '" . $msg['message'] ."';
    </script>";

    mysqli_query($conn, "UPDATE user_inbox SET is_read=1 where id=$id") or die(mysqli_error($conn));
    
}

// $user = $_SESSION['username'];
// $results = $conn->query("select * from user_inbox where to_user='$user' and is_read = 0");
// if($results === TRUE)
// {
//     $unread = mysqli_num_rows($results);
// }
// else
// {
//     die(mysqli_error($conn));
// }
// $results = $conn->query("select * from admin_message where username='$user' and in_out = 0 and is_read = 0");
// if($results === TRUE)
// {
//     $unread += mysqli_num_rows($results);
// }
// else
// {
//     die(mysqli_error($conn));
// }
// $_SESSION['unread'] = $unread;

include("../../html/dashboard/viewMessage.html");
?>