<?php

include '../helpers/config.php';
session_start();
$id = $_POST['id'];
if(isset($_GET['admin']))
{
    echo "remove from admin ";
    printf("DELETE from admin_message where id=$id");
    $results = $conn->query("DELETE from admin_message where id=$id");
    if(!$results) printf($conn->error);
    if($_GET['admin'] == 1)$nextloc = "location:../dashboard/inboxlist.php?admin=1";
    else $nextloc = "location:../dashboard/inboxlist.php";
}
else
{
    echo "remove from user";

    $results = $conn->query("DELETE from user_inbox where id=$id");
    if(!$results) printf($conn->error);
    $nextloc = "location:../dashboard/inboxlist.php?";
}

$user = $_SESSION['username'];
$results = $conn->query("select * from user_inbox where to_user='$user' and is_read = 0") or die(mysqli_error($conn));
if(!$results)
{
    printf($conn->error);
}
else{
    $unread = mysqli_num_rows($results);
}
$results = $conn->query("select * from admin_message where username='$user' and in_out = 0 and is_read = 0") or die(mysqli_error($conn));
if(!$results)
{
    printf($conn->error);
}
else{
    $unread += mysqli_num_rows($results);
}
$_SESSION['unread'] = $unread;
echo "<script type='text/javascript'>
    console.log(".$unread.");
</script>";

header($nextloc);
?>