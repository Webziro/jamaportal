<?php
    session_start();
    include_once "../dashboard/includes/conn.php";
    include_once "staffsession.php";
    include_once "staff-side.php";

 
  if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    //print_r($_POST) or die();
  if(empty($title) or empty($comment)){
        $msg = "<div class='alert alert-success'>Fill all fields please </div>";
        
  }else{
      $queryReport = mysqli_query($conn, "INSERT INTO sys_task (assigned_to, task_name, date_started, date_end) 
      VALUES ('$taskassignto', '$taskcontent', '$startdate', '$enddate')");
      if($queryTask){
      $msg = "<div style= 'alert alert-success'>Successfully Posted</div>";

      }else{
      $msg = "<div class='alert alert-success'>Couldn't post at the moment. Try again! </div>";   
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
                                    <h5 class="modal-title">Report a Task</h5>
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
                                            Date
                                            <input type="date" class="form-control" name="date-start" min="">

                                        </div>

                                        <div class="mb-3">
                                            Title
                                            <input type="text" class="form-control" name="title">
                                        </div>

                                        Enter Comment<textarea name="comment" id="" cols="30" rows="10"
                                            class="form-control" class="mb-3" placeholder=""> </textarea>

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

    <!-- Mirrored from demo.dashboardpack.com/hospital-html/resister.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Mar 2023 11:46:17 GMT -->

    </html>