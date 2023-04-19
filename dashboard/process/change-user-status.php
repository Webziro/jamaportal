<?php
    session_start();
    include_once "../includes/conn.php";
    include_once "../includes/loginsession.php";

    if(isset($_GET['id'])){
    $Id = $_GET['id'];
    $status = $_GET['status'];
    $queryStatus = mysqli_query($conn, "UPDATE sys_users SET _status = '$status' WHERE id = $Id"); 
    
    if($queryStatus){
        $_SESSION['msg']="User Status Updated";
        header("location: ../allusers.php");
    }else{
        $_SESSION['msg']="Network error!";
        header("location: ../allusers.php");
    }
}else{
    header("location: ../allusers.php");
}

?>