<?php
    session_start();
    include_once "../dashboard/includes/conn.php";
    include_once "staffsession.php";
    include_once "staff-side.php";
    if(isset($_GET['editId'])){
    $editId = $_GET['editId'];
    $editQuery = mysqli_query($conn, "SELECT * FROM comments  WHERE taskid = '$editId'"); 
    if(mysqli_num_rows($editQuery)>0){
        $editResult = mysqli_fetch_assoc($editQuery);
    }else{
        header("location: view-task.php");
    }
}else{
    header("location: view-task.php");
}



 if(isset($_POST['update'])){
    $comment = mysqli_real_escape_string($conn, $_POST['comment']); 
    //print_r($_POST['update']) or die();
        $query = mysqli_query($conn, "UPDATE comments set comment = '$comment' where taskid = '$editId' ");
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
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Task Table</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">

                                    <form Active="#" action="" method="POST">
                                        <div class="search_field">
                                            <input type="text" name="search" placeholder="Search content here...">
                                        </div>
                                        <button type="submit" name="submit"> <i class="ti-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Add
                                    New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Task Title</th>
                                    <th scope="col">Date Started</th>
                                    <th scope="col">Date to Complete </th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col"> Add Comments</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                            
                                    $queryTable = mysqli_query($conn, "SELECT * FROM sys_task where assigned_to = '$sid'");
                                    while($rowTable = mysqli_fetch_array($queryTable)){
                                ?>
                                <tr>


                                <tr>
                                    <th scope="row"> <a href="#"
                                            class="question_content"><?php echo $rowTable['task_name'];?> </a>
                                    </th>


                                    <td><?php echo $rowTable['date_started'];?></td>

                                    <td><?php echo $rowTable['date_end'];?></td>


                                    <td><a href="#" class="">

                                            <select id="status" name="status">
                                                <option <?php if($rowTable['task_status']=='P'){ echo 'selected'; } ?>
                                                    value="P"> Pending
                                                </option>
                                                <option <?php if($rowTable['task_status']=='PR'){ echo 'selected'; } ?>
                                                    value="PR">Processing
                                                </option>
                                                <option <?php if($rowTable['task_status']=='A'){ echo 'selected'; } ?>
                                                    value="A">Approved</option>
                                            </select>
                                    </td></a>

                                    <td>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <style>
                                        .checked {
                                            color: red;
                                        }
                                        </style>
                                    </td>

                                    <td>
                                        <!-- Button to Open the Modal -->

                                        <form action="addcomment.php" method="POST">
                                            <!-- <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#myModal"> -->
                                            <button type="button" class="btn btn-info"
                                                onclick="commentModal(<?= $rowTable['task_id'] ?>)">
                                                Add comment
                                            </button>

                                            <!-- The Modal -->
                                            <div class="modal" id="myModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-body">
                                                            <input type="number" hidden id="taskid" name="taskid">
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <h6 class="modal-title">Message</h6>
                                                            <textarea name="comments" id="" cols="60" rows="6"
                                                                placeholder="Enter text"></textarea>

                                                            <input type="submit" name="update">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <td>
                                        <?php
                                        $no = 1;
                                        $i=$rowTable['task_id']; 
                                        $c=mysqli_query($conn, "SELECT * FROM comments where taskid = '$i'");
                                        while($row=mysqli_fetch_assoc($c)){
                                            print $no.'. '.$row['comment'].'<br>';
                                            $no=$no+1;
                                        } ?>
                                    </td>

                                    <td class="row">
                                        <div class="col-5">
                                            <a href="process/editcomment.php"><button type="button"
                                                    class="btn btn-primary btn-sm ">Edit</button></a>
                                        </div>

                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </td>
                                </tr>

                                <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Table ends here!-->




<div class="col-xl-12   ">
    <div class="white_box card_height_100">
        <div class="box_header border_bottom_1px  ">
            <div class="main-title">
                Today is <h3 class="mb_25"> <?= date("D-M-d");?> You have the following Recent Task</h3>
            </div>
        </div>
        <div class="Activity_timeline">
            <ul>

                <?php
								
							$recentQuery = mysqli_query($conn, "SELECT * FROM sys_tasK WHERE assigned_to = '$sid'");
							// if (!$recentQuery) {
							// 	echo ('Error'. mysqli_error($conn));
							// 	exit();
							// }
							while ($rowrecent = mysqli_fetch_array($recentQuery)) {
			

							?>
                <li>
                    <div class="activity_bell"></div>
                    <div class="activity_wrap">
                        <h6><?php echo substr( $rowrecent['date_started'], 0, 16 );?></h6>

                        <p><?php echo $rowrecent['task_name']; ?>
                        </p>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>




<div class="footer_part">
    <div class="container">
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



<script src="js/jquery1-3.4.1.min.js"></script>

<script src="js/popper1.min.js"></script>

<script src="js/bootstrap1.min.js"></script>

<script src="js/metisMenu.js"></script>

<script src="vendors/count_up/jquery.waypoints.min.js"></script>

<script src="vendors/chartlist/Chart.min.js"></script>

<script src="vendors/count_up/jquery.counterup.min.js"></script>

<script src="vendors/swiper_slider/js/swiper.min.js"></script>

<script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="vendors/gijgo/gijgo.min.js"></script>

<script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatable/js/buttons.flash.min.js"></script>
<script src="vendors/datatable/js/jszip.min.js"></script>
<script src="vendors/datatable/js/pdfmake.min.js"></script>
<script src="vendors/datatable/js/vfs_fonts.js"></script>
<script src="vendors/datatable/js/buttons.html5.min.js"></script>
<script src="vendors/datatable/js/buttons.print.min.js"></script>
<script src="js/chart.min.js"></script>

<script src="vendors/progressbar/jquery.barfiller.js"></script>

<script src="vendors/tagsinput/tagsinput.js"></script>

<script src="vendors/text_editor/summernote-bs4.js"></script>
<script src="vendors/apex_chart/apexcharts.js"></script>

<script src="js/custom.js"></script>
<script src="vendors/apex_chart/bar_active_1.js"></script>
<script src="vendors/apex_chart/apex_chart_list.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
function commentModal(id) {
    $("#taskid").val(id);
    $("#myModal").modal("show");
}
</script>
</body>

</html>