<?php
    session_start();
    include_once "../dashboard/includes/conn.php";
    include_once "staffsession.php";
    if(isset($_POST['submit'])){
        $taskid = mysqli_real_escape_string($conn, $_POST['taskid']);
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);
        //print_r($_POST) or die();
        if(empty($taskid) or empty($comments)){
            $_SESSION['msg'] = "<div class='alert alert-success'>Fill all fields please </div>";  
            header("location:viewtask.php");
        }else{
        $queryComments = mysqli_query($conn, "INSERT INTO comments(taskid, comment) VALUES('$taskid', '$comments')");
        //die (mysqli_error($conn));
        if($queryComments){
            $_SESSION['msg'] = "<div class='alert alert-success'>Comments Posted</div>";  
            header("location:viewtask.php");

        }else{
        $_SESSION['msg'] ="<div class='alert alert-success'>Couldn't post at the moment. Try again! </div>";   
            header("location:viewtask.php");
        }
        
        }
    }