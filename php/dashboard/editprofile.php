<!DOCTYPE html>
<?php

include '../helpers/config.php';
session_start();

if(isset($_GET['username']))
{
    $user = $_GET['username'];
    $data = $conn->query("select * from usersdata where username='$user'");
    $result = mysqli_fetch_array($data);
    if(mysqli_num_rows($data) > 0)
    {
        $first_name = $result['first_name'];
        $last_name = $result['last_name'];
        $birth_place = $result['birth_place'];
        $birth_date = $result['birth_date'];
        $mbti = $result['mbti'];
    }
    else
    {
        $first_name = '';
        $last_name = '';
        $birth_place = '';
        $birth_date = '';
        $mbti = '';
    }


    echo "<script type='text/javascript'>
        var uname = '$user';
        console.log('punya orang' + '$user' + 'woi');
        console.log('woe');
        var others = {
            first_name: '$first_name',
            last_name: '$last_name',
            birth_place: '$birth_place',
            birth_date: '$birth_date',
            mbti: '$mbti'
        }
    </script>";
}
else
{
    echo "<script type='text/javascript'>
        var uname = '';
        console.log('punya dewe');
    </script>";
}

include("../../html/dashboard/editprofile.html");

?>
</html>