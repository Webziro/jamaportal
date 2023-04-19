<?php
    session_start();
    include_once "includes/conn.php";
    include_once "includes/loginsession.php";
    include_once "includes/dash-sidebar.php";

 
  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $department = mysqli_real_escape_string($conn, $_POST['dept']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    //print_r($_POST) or die();
  if(empty($name) or empty($username) or empty($department) or empty($password)){
        $msg = "<div class='alert alert-success'>Fill all fields please </div>";
        
  }else{
      $queryUsers = mysqli_query($conn, "INSERT INTO sys_users (full_name, user_name, department, user_password) 
      VALUES ('$name', '$username', '$department', '$password')");
      if($queryUsers){
      $msg = "<div style= 'alert alert-success'>Successfully Created</div>";

      }else{
      $msg = "<div class='alert alert-success'>Couldn't create at the moment. Try again! </div>";   
  }
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
                                    <h5 class="modal-title">Create New Users</h5>
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
                                            <input type="text" class="form-control" name="name">
                                        </div>

                                        <div class="mb-3">
                                            Username
                                            <input type="text" class="form-control" name="username">
                                        </div>


                                        <div class="mb-3">
                                            Department
                                            <input type="dept" class="form-control" name="dept">
                                        </div>

                                        <div class="mb-3">
                                            Password
                                            <input type="password" class="form-control" name="password">
                                        </div>

                                        <input type="submit" name="submit"
                                            class="btn_1 full_width text-center form-control">
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

    </html>