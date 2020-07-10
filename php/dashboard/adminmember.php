<!DOCTYPE html>
<head></head>
<body>
<script type="text/javascript">
    var admins = [];
</script>

<?php

include '../helpers/config.php';
session_start();
$results = $conn->query("select * from users where admin_flag = 1");

while($unames = mysqli_fetch_array($results)['username'])
{
    $temp = $conn->query("select * from usersdata where username='$unames'");
    if(mysqli_num_rows($temp)>0)
    {
        $row = mysqli_fetch_array($temp);
        $fname = $row['first_name'];
        $lname = $row['last_name'];
    }
    else
    {
        $fname = $lname = "";
    }
    echo "<script type='text/javascript'> 
        admins.push({
            username: '" . $unames . "',
            first_name: '" . $fname . "',
            last_name: '" . $lname . "',
        }); </script>";
}
echo "<script type='text/javascript'> 
    localStorage.setItem('admins', JSON.stringify(admins));
</script>";

include("../../html/dashboard/adminmember.html");

?>
</body>

</html>