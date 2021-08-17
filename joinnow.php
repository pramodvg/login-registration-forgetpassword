<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <form action="/quiz/joinnow.php" method="post">
        <div class="container">
            <div class="myinputfilds"><input name="userid" type="text" placeholder="Email or Phone" name="userid" required></div>
            <div class="myinputfilds"><input name="birthdate" type="date" id="birthday" required></div>
            <div class="myinputfilds"><input id="show" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters" placeholder="Password" name="password" required> <span id="showbtn" onclick="hideShowPassword()">Show</span></div>
            <div class="myinputfilds"><input id="showconfirm" name="confirmPassword" type="password" placeholder="Confirm Password" name="password" required> <span id="showconfirmbtn" onclick="hideShowConfirmPassword()">Show</span></div>
            <button type="submit">Register</button>
            <a href="/quiz/form.php">Login</a>
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
    $birthday =  $_POST['birthdate'];
    $confirmPassword =  $_POST['confirmPassword'];

    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $userid)) {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Enter Valid Email..!!")';
        echo '</script>';
    } else if ($password != $confirmPassword) {

        echo '<script type ="text/JavaScript">';
        echo 'alert("password does not match")';
        echo '</script>';
    } else {
        $sql = "INSERT INTO users (userid,dob, password) VALUES ('$userid','$birthday' ,'$password')";

        if ($conn->query($sql) === TRUE) {
            echo '<script type ="text/JavaScript">';
            echo 'alert("Registration Success")';
            echo '</script>';
        }
    }
}
?>