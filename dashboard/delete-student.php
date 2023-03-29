<?php
session_start();
include("../includes/section.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query ($conn, "DELETE FROM student_user WHERE Id = '$id'") or die(mysqli_error($conn));
    if(mysqli_affected_rows($conn)>0){
        $_SESSION['msg'] ="Successfully deleted user";
        header("location:totalstudents.php");
        
    }else{
        $_SESSION['msg'] = "Could not delete user";
        header("location:totalreusers.php");
    }
}