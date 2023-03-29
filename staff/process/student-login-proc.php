<?php
include "../conn.php";
session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = mysqli_query($conn, "SELECT * FROM student_user WHERE email = '$email' && _password = '$password' ") or die(mysqli_error($conn));
    if(mysqli_num_rows($query)>0){
        $result = mysqli_fetch_array($query); 
        $_SESSION ['userid'] = $result['Id'];
        header("location:../student-dashboard/index-dash.php");
    }else{
        $_SESSION ['msg'] = "<div style = 'background-color: white; color: red; padding: 12px'>Incorrect password!</div>";
        header("location:../index.php");
    }
}else{
    echo "G";
}
?>