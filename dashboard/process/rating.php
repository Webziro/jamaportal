<?php
    session_start();
    include_once "../includes/conn.php";
    include_once "../includes/loginsession.php";


    if(isset($_POST['task'])){
        $rating = mysqli_real_escape_string($conn, $_POST['id']);
        $task = mysqli_real_escape_string($conn, $_POST['task']);
        
        $queryRating = mysqli_query($conn, "INSERT INTO sys_rating (rating_num, task) VALUES ('$rating', '$task')");
        if($queryRating){
            print json_encode(['status'=>1]);
        }else{
            print json_encode(['status'=>0, 'msg'=>'Error Inserting Rating']);
        }
        
    }