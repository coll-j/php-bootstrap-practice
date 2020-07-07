<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php

session_start();

include 'config.php';

$user = $_GET['username'];
$data = $conn->query("select * from usersdata where username='$user'");
$result = mysqli_fetch_array($data);
$data2 = $conn->query("select * from users where username='$user'");
$result2 = mysqli_fetch_array($data2);

include("../html/dashboard/otheruser.html");

?>
<script type="text/javascript">
    var uname = "<?php echo $result2['username']; ?>";
    var fn = "<?php echo $result['first_name']; ?>";
    var ln = "<?php echo $result['last_name']; ?>";
    var bp = "<?php echo $result['birth_place']; ?>";
    var bd = "<?php echo $result['birth_date']; ?>";
    var mbti = "<?php echo $result['mbti']; ?>" 

    console.log("<?php echo $user; ?>");
    document.getElementById("myHeader").innerHTML = uname + "'s Profile";
    document.getElementById("fn").innerHTML = "First name: " + fn;
    document.getElementById("ln").innerHTML = "Last name: " + ln;
    document.getElementById("bp").innerHTML = "Birth place: " + bp;
    document.getElementById("bd").innerHTML = "Birth date: " + bd;
    document.getElementById("mbti").innerHTML = "MBTI: " + mbti;

</script>
</body>
</html>
