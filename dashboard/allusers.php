<?php
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

                                    <form Active="#" action="searchusers.php" method="POST">
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
                                    <th scope="col">Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php          
                                
                                    $queryUsers = mysqli_query($conn, "SELECT * FROM sys_users  where roles !='admin'"); 
                                    while($rowUsers = mysqli_fetch_array($queryUsers)){
                                ?>
                                <tr>


                                <tr>
                                    <th scope="row"> <a href="#"
                                            class="question_content"><?php echo $rowUsers['full_name'];?> </a>
                                    </th>

                                    <th scope="row"> <a href="#"
                                            class="question_content"><?php echo $rowUsers['user_name'];?> </a>
                                    </th>

                                    <th scope="row"> <a href="#"
                                            class="question_content"><?php echo $rowUsers['department'];?> </a>
                                    </th>

                                    <th scope="row"> <a href="#"
                                            class="question_content"><?php echo $rowUsers['user_password'];?> </a>
                                    </th>


                                    <td>
                                        <?php echo $rowUsers['_status'];?>
                                    </td>
                                    <td>
                                        <?php if($rowUsers['_status']=='unsuspend'){?>
                                        <a href="process/change-user-status.php?id=<?php echo $rowUsers['id'];?>&&status=suspend"
                                            class="btn btn-danger" style="color:white">Suspend User </a>
                                        <?php }else{ ?>

                                        <a href="process/change-user-status.php?id=<?php echo $rowUsers['id'];?>&&status=unsuspend"
                                            class="btn btn-success " style="color:white">Unsuspend User </a>
                                        <?php } ?>
                                    </td>

                                    <td class="row">
                                        <div class="col-4">
                                            <a href="edit-users.php?userId=<?php echo $rowUsers['id'];?>">
                                                <button type="button" class="btn btn-primary btn-sm ">Edit</button></a>
                                        </div>

                                        <div class="col-5">
                                            <a href="del-users.php?udId=<?php echo $rowUsers['id'];?>">
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
</body>

</html>