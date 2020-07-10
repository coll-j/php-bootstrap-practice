<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php

session_start();

include '../helpers/config.php';

$user = $_GET['username'];
$data = $conn->query("select * from usersdata where username='$user'");
$result = mysqli_fetch_array($data);
$data2 = $conn->query("select * from users where username='$user'"); //in case user belom ngisi profile
$result2 = mysqli_fetch_array($data2);
echo '<img style="display: none;" id="imgblob" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';

include("../../html/dashboard/otheruser.html");

?>
<script type="text/javascript">
    var uname = "<?php echo $result2['username']; ?>";
    var af = "<?php echo $result2['admin_flag']; ?>";
    var fn = "<?php echo $result['first_name']; ?>";
    var ln = "<?php echo $result['last_name']; ?>";
    var bp = "<?php echo $result['birth_place']; ?>";
    var bd = "<?php echo $result['birth_date']; ?>";
    var mbti = "<?php echo $result['mbti']; ?>" 

    document.getElementById("myHeader").innerHTML = uname + "'s Profile";
    document.getElementById("fn").innerHTML = "First name: " + fn;
    document.getElementById("ln").innerHTML = "Last name: " + ln;
    document.getElementById("bp").innerHTML = "Birth place: " + bp;
    document.getElementById("bd").innerHTML = "Birth date: " + bd;
    document.getElementById("mbti").innerHTML = "MBTI: " + mbti;
    if(document.getElementById("imgblob").src.length > 23)
    {
        document.getElementById("profileImage").src = document.getElementById("imgblob").src;
    }

    if(af == 1)
    {
        changeAddAdminBtn();
    }
</script>
</body>
</html>
