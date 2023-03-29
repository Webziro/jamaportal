<?php
    session_start();
    include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Portal</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <h1>Welcome to school Management portal. Register your account below</h1>
    <div class="account">
        <div class="student-login">
            <form action="process/student-register-proc.php" method="post">
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <h3>Welcome Student Register below</h3>
                <input type="fname" name="fname" placeholder="First Name" size="80"> <br> <br>
                <input type="lname" name="lname" placeholder="Last Name" size="80"> <br> <br>
                <input type="email" name="email" placeholder="Email Address" size="80"> <br> <br>
                <input type="contact" name="contact" placeholder="Contact" size="80"> <br> <br>
                <input type="password" name="password" placeholder="Password" size="80"> <br> <br>
                <input type="conn-password" name="conn_password" placeholder="Confirm Password" size="80"> <br> <br>
                <input type="submit" name="submit" value="submit"> <br> <br>
                <h6>Already have an Account? <a href="index.php">Login</a> </h6>
                <h6>Go back home<a href="index.php">Home</a> </h6>
            </form>
        </div>
    </div>
</body>
</html>

