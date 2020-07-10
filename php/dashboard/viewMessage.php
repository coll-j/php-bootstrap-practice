<?php

include '../helpers/config.php';

$id = $_POST['id'];
$results = $conn->query("select * from user_inbox where id=$id");
$msg = mysqli_fetch_array($results);

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