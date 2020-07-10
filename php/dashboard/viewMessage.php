<?php

include '../helpers/config.php';
session_start();
$id = $_POST['id'];
if(isset($_GET['admin']))
{
    $results = $conn->query("select * from admin_message where id=$id");
    if(!$results) printf($conn->error);
    $msg = mysqli_fetch_array($results);
    
    $from = ($_GET['admin'] == 1)? $msg['username'] : 'Admin';
    echo "<script type='text/javascript'>
    var from = '" . $from ."';
    var subject = '" . $msg['subject'] ."';
    var msgbody = '" . $msg['message'] ."';
    </script>";

    // $conn->query("UPDATE admin_message SET is_read=1 where id=$id");
    mysqli_query($conn, "UPDATE admin_message SET is_read=1 where id=$id") or die(mysqli_error($conn));
}
else
{
    $results = $conn->query("select * from user_inbox where id=$id");
    if(!$results) printf($conn->error);
    $msg = mysqli_fetch_array($results);
    
    echo "<script type='text/javascript'>
    var from = '" . $msg['from_user'] ."';
    var subject = '" . $msg['subject'] ."';
    var msgbody = '" . $msg['message'] ."';
    </script>";

    mysqli_query($conn, "UPDATE user_inbox SET is_read=1 where id=$id") or die(mysqli_error($conn));
    
}

echo "<script type='text/javascript'>
console.log(" .$id . ");
var from = '" . $msg['from_user'] ."';
console.log(from);
var subject = '" . $msg['subject'] ."';
console.log(subject);
var msgbody = '" . $msg['message'] ."';
console.log(msgbody);
</script>";

include("../../html/dashboard/viewMessage.html");
?>