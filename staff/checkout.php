<?php
    session_start();
    include_once "../dashboard/includes/conn.php";
    include_once "staffsession.php";

    date_default_timezone_set("Africa/Lagos");
    $current_time = date('Y-m-d H:i:s');
    $current_date=date('Y-m-d');
    $query =  mysqli_query($conn, "select * from sys_log where user_id = '$id' order by log_id desc");
    $result = mysqli_fetch_array($query);
    $logDate = substr($result['login_time'], 0, 10); 
    $logid=$result['log_id'];
    if(($logDate==$current_date) && ($result['logout_time']=='')){
        $query =  mysqli_query($conn, "update sys_log set logout_time = '$current_time' where log_id=$logid");
        if($query){
            $_SESSION['msg'] =  "<div class='alert alert-success'>Logged out Successfully! </div>";
             header("location:viewtask.php ");
        }else{
            $_SESSION['msg'] =  "<div class='alert alert-danger'>Error! </div>";
             header("location:viewtask.php ");
        }
    }else{
        $_SESSION['msg'] =  "<div class='alert alert-warning'>You're not logged in yet! </div>";
             header("location:viewtask.php ");
    }
    
?>