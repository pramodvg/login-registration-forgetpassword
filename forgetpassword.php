<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <form action="/quiz/forgetpassword.php" method="post">
        <div class="container">
            <div class="myinputfilds"><input name="userid" type="text" placeholder="Email or Phone" name="userid" required></div>
            <div class="myinputfilds"><input name="birthdate" type="date" id="birthday" required></div>
            <button type="submit">Send Password</button>
            <a href="/quiz/form.php">Login</a>
        </div>
    </form>
</body>

</html>

<?php
include('dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userid = $_POST['userid'];
    $birthdate = $_POST['birthdate'];

    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $userid)) {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Enter Valid Email..!!")';
        echo '</script>';
    } else {
        $sql = "SELECT password FROM users WHERE userid = '$userid' and dob = '$birthdate'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $msg = "Your Password Is: " . $row["password"];

                $subject = "Your LinkedIn Password";

                if (mail($userid, $subject, $msg)) {
                    echo "Email successfully sent to $userid...";
                } else {
                    echo "Email sending failed...";
                }
            }
        } else {
            echo '<script type ="text/JavaScript">';
            echo 'alert("email does not exist..!!")';
            echo '</script>';
        }
    }
}
?>