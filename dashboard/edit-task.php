<?php
    session_start();
    include_once "includes/conn.php";
    include_once "includes/loginsession.php";
    include_once "includes/dash-sidebar.php";
?>

<?php
    if(isset($_GET['editId'])){
    $editId = $_GET['editId'];
    $editQuery = mysqli_query($conn, "SELECT * FROM sys_task  WHERE task_id = '$editId'"); 
    if(mysqli_num_rows($editQuery)>0){
        $editResult = mysqli_fetch_assoc($editQuery);
    }else{
        header("location: view-task.php");
    }
}else{
    header("location: view-task.php");
}



 if(isset($_POST['update'])){
    $assigned = mysqli_real_escape_string($conn, $_POST['assigned_to']); 
    $datestart = mysqli_real_escape_string($conn, $_POST['date-start']);
    $dateend = mysqli_real_escape_string($conn, $_POST['date-end']);
    $taskname = mysqli_real_escape_string($conn, $_POST['task-name']);
    //print_r($_POST['update']) or die();
        $query = mysqli_query($conn, "UPDATE sys_task set assigned_to = '$assigned', date_started = '$datestart', date_end = '$dateend', task_name = '$taskname' where task_id = '$editId' ");
         //die(mysqli_error($conn));
            if($query){
                $msg =  "<div class='alert alert-success'>Task Successfully Edited </div>";
                
            }else{
                $msg =  "<div class='alert alert-success'>System Error, Try again! </div>";
            }
        }

    ?>



<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <div class="modal-content cs_modal">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Task</h5>
                                </div>

                                <?php
                                    if(isset($msg)){
                                        echo($msg);
                                        unset($msg);
                                    }
                                ?>

                                <div class="modal-body">
                                    <form action="" method="POST">


                                        <div class="mb-3">
                                            Task assigned to
                                            <select type="text" class="form-control" name="assigned_to">
                                                <?php
                                                    $queryAssign = mysqli_query($conn, "SELECT * FROM sys_users"); 
                                                    //die(mysqli_error($conn));
                                                    while($rowsAssign = mysqli_fetch_array($queryAssign)){
                                                ?>

                                                <option value="<?php echo $rowsAssign['id'];?>">
                                                    <?php echo $rowsAssign['user_name'];?></option>

                                                <?php } ?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            Start Date
                                            <input type="date" class="form-control" name="date-start"
                                                min="<?php echo date('Y-m-d'); ?>">
                                        </div>

                                        <div class="mb-3">
                                            End Date
                                            <input type="date" class="form-control" name="date-end"
                                                min="<?php echo date('Y-m-d'); ?>">
                                        </div>

                                        <?php
                                                    $queryAssign = mysqli_query($conn, "SELECT * FROM sys_task"); 
                                                    $rowsAssign = mysqli_fetch_array($queryAssign)
                                                ?>
                                        Enter Task<textarea name="task-name" id="" cols="30" rows="10"
                                            class="form-control" class="mb-3"
                                            placeholder=""><?php echo $rowsAssign['task_name'];?> </textarea>


                                        <div class="cs_check_box">
                                            <input type="checkbox" id="check_box" class="common_checkbox">
                                        </div>

                                        <input type="submit" name="update"
                                            class=" btn_1 full_width text-center form-control">
                                        <div class="text-center">


                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#">
                                Dashboard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>



    </body>

    <!-- Mirrored from demo.dashboardpack.com/hospital-html/resister.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Mar 2023 11:46:17 GMT -->

    </html>