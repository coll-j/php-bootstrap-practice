<!DOCTYPE html>
<head></head>
<body>
<script type="text/javascript">
    var messages = [];
</script>

<?php

session_start();
include '../helpers/config.php';

$user = $_SESSION['username'];
$results = $conn->query("select * from user_inbox where to_user='$user'");

while($msg = mysqli_fetch_array($results))
{
    echo "<script type='text/javascript'> 
        messages.push({
            id: '" . $msg['id'] . "',
            username: '" . $msg['from_user'] . "',
            subject: '" . $msg['subject'] . "',
            body: '" . $msg['message'] . "',
        }); </script>";
}
echo "<script type='text/javascript'> 
    localStorage.setItem('messages', JSON.stringify(messages));
</script>";

include("../../html/dashboard/inboxlist.html");

?>
</body>

</html>