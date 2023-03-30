<?php
    session_start();
    include_once "includes/loginsession.php";
    if(isset($_GET['deleteId'])){
        $deleteId = $_GET['deleteId'];
        $queryDelete = mysqli_query($conn, "DELETE FROM sys_task WHERE task_id = '$deleteId' ");
        if(mysqli_num_rows($queryDelete)>1){
            $_SESSION['msg'] = "<div class='alert alert-success'>Task Successfully deleted </div>";
            header("location: viewtask.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-success'>System error. Try again! </div>";
            header("location: viewtask.php");
        }
    }

?>