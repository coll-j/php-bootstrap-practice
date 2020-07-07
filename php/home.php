<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php

session_start();

include 'config.php';

$user = $_SESSION['username'];
$data = $conn->query("select * from usersdata where username='$user'");
$filled = mysqli_num_rows($data);
$result = mysqli_fetch_array($data);

include("../html/dashboard/home.html");

?>
<script type="text/javascript">
    var filled = "<?php echo $filled; ?>";
    var fn = "<?php echo $result['first_name']; ?>";
    var ln = "<?php echo $result['last_name']; ?>";
    var bp = "<?php echo $result['birth_place']; ?>";
    var bd = "<?php echo $result['birth_date']; ?>";
    var mbti = "<?php echo $result['mbti']; ?>" 

    var profile = {
        "filled": filled,
        "first_name": fn,
        "last_name": ln,
        "birth_place": bp,
        "birth_date": bd,
        "mbti": mbti
    };

    localStorage.setItem('profile_info', JSON.stringify(profile));

    document.getElementById("fn").innerHTML = "First name: " + fn;
    document.getElementById("ln").innerHTML = "Last name: " + ln;
    document.getElementById("bp").innerHTML = "Birth place: " + bp;
    document.getElementById("bd").innerHTML = "Birth date: " + bd;
    document.getElementById("mbti").innerHTML = "MBTI: " + mbti;

    if(filled < 1)
    {
        document.getElementById("unfilled").style.display = "inline";
    }

</script>
</body>
</html>
