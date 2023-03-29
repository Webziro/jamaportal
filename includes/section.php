<?php
session_start();
include_once "../conn.php";
if(isset($_SESSION ['userid'])){
    $id = $_SESSION ['userid'];
    $query = mysqli_query($conn, "SELECT * FROM student_user WHERE Id = '$id' ");
    $data = mysqli_fetch_array($query);
}else {
    header("location: login.php");
}
?>