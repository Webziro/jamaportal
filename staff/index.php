<?php
    session_start();
    include_once "../dashboard/includes/conn.php";
    include_once "staffsession.php";
    include_once "staff-side.php";
?>



<!-- Start of  Task Loop-->
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-12">
                                <div class="quick_activity_wrap">

                                    <!-- Start of  Total Task Loop-->
                                    <?php
        $queryAllTask = mysqli_query($conn, "SELECT *  from sys_task WHERE assigned_to = '$sid'");
        $allTask = mysqli_num_rows($queryAllTask);
    ?>
                                    <div class="single_quick_activity d-flex">
                                        <div class="icon">
                                            <img src="../assets/dash-img/icon/total.svg" alt="">
                                        </div>
                                        <div class="count_content">
                                            <h3><span class="counter"><?php echo "$allTask"; ?> </span> </h3>
                                            <p>Total Task</p>
                                        </div>
                                    </div>
                                    <!-- End of  Total Task Loop-->



                                    <!-- Start of  Pending Task Loop-->

                                    <?php  
    $pendingTaskQuery = mysqli_query($conn, "SELECT * FROM sys_task WHERE assigned_to = '$sid' && task_status = 'P' ");
    $pendingResult = mysqli_num_rows($pendingTaskQuery);
?>
                                    <div class="single_quick_activity d-flex">
                                        <div class="icon">
                                            <img src="../assets/dash-img/icon/pending.svg" alt="">
                                        </div>
                                        <div class="count_content">
                                            <h3><span class="counter"><?php echo "$pendingResult";?></span> </h3>
                                            <p>Total Pending Task</p>
                                        </div>
                                    </div>
                                    <!-- End of  Pending Task Loop-->



                                    <!-- Start of  Processing Task Loop-->

                                    <?php
    $processingTask = mysqli_query($conn, "SELECT * FROM sys_task WHERE assigned_to = '$sid' && task_status = 'PR' ");
    $procesingResult = mysqli_num_rows($processingTask);
?>
                                    <div class="single_quick_activity d-flex">
                                        <div class="icon">
                                            <img src="../assets/dash-img/icon/processing-task.svg" alt="">
                                        </div>
                                        <div class="count_content">
                                            <h3><span class="counter"><?php echo "$procesingResult" ?></span> </h3>
                                            <p>Total Processing</p>
                                        </div>
                                    </div>
                                    <!-- End of  Processing Task Loop-->



                                    <!-- Start of total approved Loop-->
                                    <?php
    $approvedTask = mysqli_query($conn, "SELECT * FROM sys_task WHERE  assigned_to = '$sid' && task_status = 'A'");
    $approvedResult = mysqli_num_rows($approvedTask);
?>
                                    <div class="single_quick_activity d-flex">
                                        <div class="icon">
                                            <img src="../assets/dash-img/icon/task.svg" alt="">
                                        </div>
                                        <div class="count_content">
                                            <h3><span class="counter"><?php echo "$approvedResult"; ?></span> </h3>
                                            <p>Total Approved Task</p>
                                        </div>
                                    </div>
                                    <!-- End of total approved Task Loop-->



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End of  Task Loop-->




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
                                <p>2020 © Jamasoft Concept <a href="#"> <i class="ti-heart"></i> </a><a href="#">
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

            <!-- Mirrored from demo.dashboardpack.com/hospital-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Mar 2023 11:45:05 GMT -->

            </html>