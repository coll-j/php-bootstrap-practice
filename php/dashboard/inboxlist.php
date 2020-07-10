<!DOCTYPE html>
<html translate="no">
<head>
<meta name="google" content="notranslate">
</head>
<body>
<script type="text/javascript">
    var messages = [];
</script>

<?php

session_start();
include '../helpers/config.php';

$user = $_SESSION['username'];
if(isset($_GET['admin']))
{
    echo "<script type='text/javascript'> 
        var is_admin = 1;
    </script>";
    $results = $conn->query("select * from admin_message where in_out=1");
    while($msg = mysqli_fetch_array($results))
    {
        echo "<script type='text/javascript'> 
            messages.push({
                id: '" . $msg['id'] . "',
                username: '" . $msg['username'] . "',
                subject: '" . $msg['subject'] . "',
                date: '" . $msg['time'] . "',
                read: " . $msg['is_read'] . "
            }); 
            </script>";
    }
}
else
{
    echo "<script type='text/javascript'> 
        var is_admin = 0;
    </script>";
    $results = $conn->query("select * from user_inbox where to_user='$user'");
    while($msg = mysqli_fetch_array($results))
    {
        echo "<script type='text/javascript'> 
            messages.push({
                id: '" . $msg['id'] . "',
                username: '" . $msg['from_user'] . "',
                subject: '" . $msg['subject'] . "',
                date: '" . $msg['time'] . "',
                read: " . $msg['is_read'] . "
            }); 
            </script>";
    }
    $results = $conn->query("select * from admin_message where username='$user' and in_out=0");
    while($msg = mysqli_fetch_array($results))
    {
        echo "<script type='text/javascript'> 
            messages.push({
                id: '" . $msg['id'] . "',
                username: 'Admin',
                subject: '" . $msg['subject'] . "',
                date: '" . $msg['time'] . "',
                read: " . $msg['is_read'] . "
            }); 
            </script>";
    }
    echo "<script type='text/javascript'> 
        // localStorage.setItem('messages', JSON.stringify(messages));
    </script>";
}

echo "<script type='text/javascript'>
    messages.sort(function(a, b) {
        var keyA = new Date(a.date),
        keyB = new Date(b.date);
        // Compare the 2 dates
        if (keyA < keyB) return 1;
        if (keyA > keyB) return -1;
        return 0;
    }); 
    </script>";
include("../../html/dashboard/inboxlist.html");

?>
</body>

</html>