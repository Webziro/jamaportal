<?php
    session_start();
    include_once "includes/conn.php";
    include_once "includes/loginsession.php";

    date_default_timezone_set("Africa/Lagos");
    $current_time = date('Y-m-d H:i:s');
    $query =  mysqli_query($conn, "INSERT INTO sys_log (user_id, login_time) VALUES ('$id', '$current_time') ") or die(mysqli_error($conn));
        if(mysqli_affected_rows($conn)>0){
            $_SESSION['msg'] =  "<div class='alert alert-success'>Checked in Successfully! </div>";
            header("location:viewtask.php ");
        }else{
             $_SESSION['msg'] =  "<div class='alert alert-success'>Not working! </div>";
             header("location:viewtask.php ");

        }
    
    
?>