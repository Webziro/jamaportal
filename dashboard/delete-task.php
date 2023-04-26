<?php
    session_start();
    include_once "includes/loginsession.php";
    if(isset($_GET['deleteId'])){
        $deleteId = $_GET['deleteId'];
        $queryDelete = mysqli_query($conn, "DELETE FROM sys_task WHERE task_id = '$deleteId' ");
        if($queryDelete){
            $_SESSION['msg'] =   "<script>
                                    Swal.fire(
                                        'Great!',
                                        'Task Successfully deleted ',
                                        'success')
                                </script>";                         
            header("location: viewtask.php");
        }else{
            $_SESSION['msg'] =   "<script>
                                    Swal.fire(
                                        'Error!',
                                        'System error. Try again!  ',
                                        'error')
                                </script>";
                                
            header("location: viewtask.php");
        }
    }

?>