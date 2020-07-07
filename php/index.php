<!DOCTYPE html>
<head></head>
<body>

<script type="text/javascript">
    var profiles = [];
</script>

<?php

session_start();

include 'config.php';
$result = $conn->query("select * from users");

while($row = mysqli_fetch_array($result))
{
    echo "<script type='text/javascript'> 
        profiles.push('" . $row['username'] . "'); console.log(profiles) </script>";
}
echo "<script type='text/javascript'> 
    localStorage.setItem('profiles', JSON.stringify(profiles));
</script>";

include("../html/userlogin.html");
?>

</body>
</html>
