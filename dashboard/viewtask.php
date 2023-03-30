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
                                    <form Active="#">
                                        <div class="search_field">
                                            <input type="text" placeholder="Search content here...">
                                        </div>
                                        <button type="submit"> <i class="ti-search"></i> </button>
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
                                    <th scope="col">Assigned To</th>
                                    <th scope="col">Date Started</th>
                                    <th scope="col">Date to Complete </th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                            
                                    $queryTable = mysqli_query($conn, "SELECT * FROM sys_task where assigned_to = '$id'"); 
                                    while($rowTable = mysqli_fetch_array($queryTable)){
                                ?>
                                <tr>


                                <tr>
                                    <th scope="row"> <a href="#"
                                            class="question_content"><?php echo $rowTable['task_name'];?> </a>
                                    </th>
                                    <td><?php echo $rowTable['assigned_to'];?></td>

                                    <td><?php echo $rowTable['date_started'];?></td>

                                    <td><?php echo $rowTable['date_end'];?></td>


                                    <td><a href="#" class="">

                                            <select id="status" name="status">
                                                <option value=" pending"> <?php echo $rowTable['task_status'];?>
                                                </option>
                                                <option value="processing">
                                                    <?php echo $rowTable['task_status'];?>
                                                </option>
                                                <option value="approval"><?php echo $rowTable['task_status'];?></option>
                                            </select>
                                    </td></a>

                                    <td class="status_btn">

                                        <a href="delete-task.php?deleteId=<?php echo $rowTable['task_id'];?>">
                                            <option value="delete">Delete</option>
                                        </a>
                                        <a href="edit-task.php?editId=<?php echo $rowTable['task_id'];?>">
                                            <option value="edit">Edit</option>
                                        </a>

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

<!-- Mirrored from demo.dashboardpack.com/hospital-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Mar 2023 11:45:05 GMT -->

</html>