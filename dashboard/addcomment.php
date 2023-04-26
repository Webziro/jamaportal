<?php
    session_start();
    include_once "includes/conn.php";
    include_once "includes/loginsession.php";
    if(isset($_POST['submit'])){
        $taskid = mysqli_real_escape_string($conn, $_POST['taskid']);
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);
        //print_r($_POST) or die();
        if(empty($taskid) or empty($comments)){
            $_SESSION['msg'] = "<script>
                                Swal.fire(
                                    'Empty!',
                                    'Fill all fields please !',
                                    'error')
                            </script>";
            header("location:viewtask.php");
        }else{
        $queryComments = mysqli_query($conn, "INSERT INTO comments(taskid, comment) VALUES('$taskid', '$comments')");
        //die (mysqli_error($conn));
        if($queryComments){
            $_SESSION['msg'] = "<script>
                                    Swal.fire(
                                        'Great!',
                                        'Comments Posted !',
                                        'success')
                                 </script>"; 
                                 
            header("location:viewtask.php");

        }else{
        $_SESSION['msg'] = "<script>
                                Swal.fire(
                                    'Failed!',
                                    'Couldn't post at the moment. Try again !',
                                    'error')
                            </script>"; 
                               
            header("location:viewtask.php");
        }
        
        }
    }