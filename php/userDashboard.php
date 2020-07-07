<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>


<?php

session_start();

include 'config.php';

$user = $_SESSION['username'];
$data = $conn->query("select * from usersdata where username='$user'");
$result = mysqli_fetch_array($data);

include("../html/dashboard/home.html");

?>
<script type="text/javascript">
    var fn = "<?php echo $result['first_name']; ?>";
    var ln = "<?php echo $result['last_name']; ?>";
    var bp = "<?php echo $result['birth_place']; ?>";
    var bd = "<?php echo $result['birth_date']; ?>";
    var mbti = "<?php echo $result['mbti']; ?>" 

    var profile = {
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

</script>
</body>
</html>
