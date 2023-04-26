<?php
    session_start();
    include_once "includes/conn.php";
    include_once "includes/loginsession.php";
    include_once "includes/dash-sidebar.php";

    if(isset($_POST['submit'])){           

        $search = mysqli_real_escape_string($conn, $_POST['search']);
        if(empty($search) or strlen($search)<10 or (preg_match('/[^a-z0-9 ]+/i', $search))){
            
        $msg = "<div class='alert alert-danger'>Input a valid value with more than 10 characters!</div>";
        
        }else{ 
            $querysearch = mysqli_query($conn, "SELECT * FROM sys_users WHERE full_name LIKE '%{$search}%' OR department LIKE '%{$search}%' OR user_name LIKE '%{$search}%' OR user_password LIKE '%{$search}%' OR roles LIKE '%{$search}%' OR _status LIKE '%{$search}' ") or die(mysqli_error($conn));    
        }
    }else{
        $msg  = "<div class='alert alert-success'>No result found!</div>";
        
    }
                                
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
    
    date_default_timezone_set("Africa/Lagos");
    $current_date=date('Y-m-d');
    $query =  mysqli_query($conn, "select * from sys_log where user_id = '$id' order by log_id desc");
    $result = mysqli_fetch_array($query);
    $logDate = substr($result['login_time'], 0, 10); 
    if(($logDate==$current_date) && ($result['logout_time']=='')){
        echo "<div class='alert alert-success'>You're  Currently Logged in! </div>";
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table mb_30">

                        <?php
                            if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }

                        if(isset($msg)){
                            echo($msg);
                            unset($msg);
                        }
                    ?>
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Task Title</th>
                                    <th scope="col">Date Started</th>
                                    <th scope="col">Date to Complete </th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Assigned To </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($querysearch)){
                                        
                                    if(mysqli_num_rows($querysearch)>0){
                                    while ($rowSearch = mysqli_fetch_array($querysearch)){
                                ?>
                                <tr>


                                <tr>
                                    <th scope="row"> <a href="#"
                                            class="question_content"><?php echo $rowSearch['task_name'];?> </a>
                                    </th>


                                    <td><?php echo $rowSearch['date_started'];?></td>

                                    <td><?php echo $rowSearch['date_end'];?></td>


                                    <td><a href="#" class="">

                                            <select id="status" name="status">
                                                <option <?php if($rowSearch['task_status']=='P'){ echo 'selected'; } ?>
                                                    value="P"> Pending
                                                </option>
                                                <option <?php if($rowSearch['task_status']=='PR'){ echo 'selected'; } ?>
                                                    value="PR">Processing
                                                </option>
                                                <option <?php if($rowSearch['task_status']=='A'){ echo 'selected'; } ?>
                                                    value="A">Approved</option>
                                            </select>
                                    </td></a>

                                    <td>
                                        <?php echo $rowSearch['assigned_to'];?>
                                    </td>


                                </tr>

                                <?php } } } ?>
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

                <li>
                    <div class="activity_bell"></div>
                    <div class="activity_wrap">
                        <h6>5 min ago</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                        </p>
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
</body>

</html>