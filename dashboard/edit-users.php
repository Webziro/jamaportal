<?php
    session_start();
    include_once "includes/conn.php";
    include_once "includes/loginsession.php";
    include_once "includes/dash-sidebar.php";
    if(isset($_GET['userId'])){
    $userid = $_GET['userId'];
    $userQuery = mysqli_query($conn, "SELECT * FROM sys_users  WHERE id = '$userid'"); 
    if(mysqli_num_rows($userQuery)>0){
        $userResult = mysqli_fetch_assoc($userQuery);
    }else{
        header("location: view-task.php");
    }
}else{
    header("location: view-task.php");
}
if(isset($_POST['update'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']); 
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $department = mysqli_real_escape_string($conn, $_POST['dept']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    //print_r($_POST['update']) or die();
        $query = mysqli_query($conn, "UPDATE sys_users  set full_name = '$name', user_name = '$username', department = '$department', user_password = '$password' where id = '$userid' ");
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
                                    <h5 class="modal-title">Edit User Profile</h5>
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
                                            Name
                                            <input type="text" class="form-control" name="name"
                                                value="<?php echo $userResult['full_name'];?>">
                                        </div>

                                        <div class="mb-3">
                                            User Name
                                            <input type="text" class="form-control" name="username"
                                                value="<?php echo $userResult['user_name'];?>">
                                        </div>

                                        <div class="mb-3">
                                            Department
                                            <input type="text" class="form-control" name="dept"
                                                value="<?php echo $userResult['department'];?>">
                                        </div>

                                        <div class="mb-3">
                                            Password
                                            <input type="text" class="form-control" name="password"
                                                value="<?php echo $userResult['user_password'];?>">
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
                        <p>2020 © Jamasoft<a href="#"> <i class="ti-heart"></i> </a><a href="#">
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