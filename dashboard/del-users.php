<?php
    session_start();
    include_once "includes/loginsession.php";
    if(isset($_GET['udId'])){
        $deleteUId = $_GET['udId'];
        $queryDel = mysqli_query($conn, "DELETE FROM sys_users  WHERE id = '$deleteUId' ");
        if($queryDel){
            $_SESSION['msg'] = "<div class='alert alert-success'>Task Successfully deleted </div>";
            header("location: allusers.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-success'>System error. Try again! </div>";
            header("location: allusers.php");
        }
    }

?>