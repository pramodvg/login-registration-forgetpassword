<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <form action="/quiz/form.php" method="post">
        <div class="container">
            <div class="myinputfilds"><input name="userid" type="text" placeholder="Email or Phone" name="userid" required></div>
            <div class="myinputfilds"><input id="show" name="password" type="password" placeholder="Enter Password" name="password" required> <span id="showbtn" onclick="hideShowPassword()">Show</span></div>
            <button type="submit">Login</button>
            <a href="/quiz/forgetpassword.php">Forgot password? </a> <br><br>
            New to LinkedIn? <a href="/quiz/joinnow.php">Join Now</a>
        </div>
    </form>
    <script type="text/javascript" src="./screept.js"></script>
</body>

</html>
<?php
include('dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userid = $_POST['userid'];
    $password =  $_POST['password'];

    // $sql = "INSERT INTO users (userid, ) VALUES ('$uspassworderid', '$password')";
    $sql = "SELECT id FROM users WHERE userid = '$userid' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo 'alert("Login Success")';
    } else {
        echo 'alert("UserId and Password does not match..!!")';
    }
}
?>