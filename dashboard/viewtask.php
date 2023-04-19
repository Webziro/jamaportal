<?php
ob_start();
    session_start();
    include_once "includes/conn.php";
    include_once "includes/loginsession.php";
    include_once "includes/dash-sidebar.php";
?>



</div>
</div>
</div>
</div>
</div>
</div>

<!-- End of  Task Loop-->


<!--Table starts here!-->

<?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    date_default_timezone_set("Africa/Lagos");
    $current_date=date('Y-m-d');
    $query =  mysqli_query($conn, "select * from sys_log where user_id = '$id' order by log_id desc");
    $result = mysqli_fetch_array($query);
    $logDate = substr($result['login_time'], 0, 10); 
    if(($logDate==$current_date) && ($result['logout_time']=='')){
        echo "<div class='alert alert-success'>You're  Currently Logged in! </div>";
    }
?>
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Task Table</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">

                                    <form Active="#" action="searchtask.php" method="POST">
                                        <div class="search_field">
                                            <input type="text" name="search" placeholder="Search content here...">
                                        </div>
                                        <button type="search" name="submit"> <i class="ti-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <button data-bs-toggle="modal" data-bs-target="#addcategory" type="search" name="submit"
                                    class="btn_1">Search
                                    Task</button>
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
                                    <th scope="col">Status</th>
                                    <th scope="col">Assigned To </th>
                                    <th scope="col">Task Ratings</th>
                                    <th scope="col">Add Comment</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php          
                                
                                    $queryTable = mysqli_query($conn, "SELECT * FROM sys_task JOIN sys_users ON id=assigned_to ORDER BY date_started desc "); 
                                    while($rowTable = mysqli_fetch_array($queryTable)){
                                ?>


                                <tr>
                                    <td scope="row"> <a href="#"
                                            class="question_content"><?php echo $rowTable['task_name'];?> </a>
                                    </td>


                                    <td><?php echo $rowTable['date_started'];?></td>

                                    <td><?php echo $rowTable['date_end'];?></td>


                                    <td>
                                        <a href="#" class="">

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
                                        </a>
                                    </td>

                                    <td>
                                        <?php echo $rowTable['full_name'];?>
                                    </td>

                                    <td>
                                        <?php 
                                        $rid=$rowTable['task_id']; 
                                        $r=mysqli_query($conn, "SELECT * FROM sys_rating WHERE task=$rid"); 
                                            if(mysqli_num_rows($r)>0){
                                            $rdata = mysqli_fetch_assoc($r);
                                        ?>
                                        <select onchange="rate($(this).val(), <?= $rowTable['task_id'] ?>)"
                                            name="rating" id="">
                                            <option <?php if($rdata['rating_num']==0){ echo 'selected'; } ?> value="0">0
                                                star</option>
                                            <option <?php if($rdata['rating_num']==1){ echo 'selected'; } ?> value="1">1
                                                star</option>
                                            <option <?php if($rdata['rating_num']==2){ echo 'selected'; } ?> value="2">2
                                                star</option>
                                            <option <?php if($rdata['rating_num']==3){ echo 'selected'; } ?> value="3">3
                                                star</option>
                                            <option <?php if($rdata['rating_num']==4){ echo 'selected'; } ?> value="4">4
                                                star</option>
                                            <option <?php if($rdata['rating_num']==5){ echo 'selected'; } ?> value="5">5
                                                star</option>
                                        </select>
                                        <?php 
                                    }else{ 
                                        ?>

                                        <select onchange="rate($(this).val(), <?= $rowTable['task_id'] ?>)"
                                            name="rating" id="">
                                            <option value="0">0 star</option>
                                            <option value="1">1 star</option>
                                            <option value="2">2 star</option>
                                            <option value="3">3 star</option>
                                            <option value="4">4 star</option>
                                            <option value="5">5 star</option>
                                        </select>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <!-- Button to Open the Modal -->
                                        <form action="addcomment.php" method="POST">
                                            <button type="button" class="btn btn-info"
                                                onclick="commentModal(<?= $rowTable['task_id'] ?>)">
                                                Add Comment
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

                                                            <input type="submit" name="submit">
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
                                    </td>

                                    <td class="row">
                                        <?php
                                        $no = 1; 
                                        $i=$rowTable['task_id']; 
                                        $c=mysqli_query($conn, "SELECT * FROM comments where taskid = '$i'");
                                        if(mysqli_num_rows($c)>0){
                                        while($row=mysqli_fetch_assoc($c)){
                                            echo $no. '. '.$row['comment']; 
                                            $no=$no+1; 
                                        } }else{ echo "No comment yet"; } ?>
                                    </td>


                                    <td class="col">
                                        <div class="col-5">
                                            <a href="edit-task.php?editId=<?php echo $rowTable['task_id'];?>">
                                                <button type="button" class="btn btn-primary btn-sm ">Edit</button></a>
                                        </div>

                                        <div class="col-6">
                                            <a href="delete-task.php?deleteId=<?php echo $rowTable['task_id'];?>">
                                                <button type="button" class="btn btn-danger btn-sm">Delete</button> </a>
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
                <h3 class="mb_25">Recent Task</h3>
            </div>
        </div>
        <div class="Activity_timeline">
            <ul>


                <?php
								
							$recentQuery = mysqli_query($conn, "SELECT * FROM sys_tasK ORDER BY date_started DESC ");
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

function rate(id, task) {
    $.ajax({
        url: 'process/rating.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
            id: id,
            task: task
        },
        success: function(resp) {
            if (resp.status === 1) {
                alert("Rating added Successfully");
            } else {
                alert(resp.msg);
            }
        }
    })
}
</script>
</body>

</html>