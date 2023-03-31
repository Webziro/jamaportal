<?php
    include_once "../dashboard/includes/conn.php";
    include_once "staffsession.php";
?>


<!DOCTYPE html>
<html lang="zxx">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Jama Task</title>
        <link rel="icon" href="img/logo.png" type="image/png">

        <link rel="stylesheet" href="../assets/dash-css/bootstrap1.min.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/themefy_icon/themify-icons.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/swiper_slider/css/swiper.min.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/select2/css/select2.min.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/niceselect/css/nice-select.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/owl_carousel/css/owl.carousel.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/gijgo/gijgo.min.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/font_awesome/css/all.min.css" />
        <link rel="stylesheet" href="../assets/dash-vendors/tagsinput/tagsinput.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/datatable/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="../assets/dash-vendors/datatable/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="../assets/dash-vendors/datatable/css/buttons.dataTables.min.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/text_editor/summernote-bs4.css" />

        <link rel="stylesheet" href="../assets/dash-vendors/morris/morris.css">

        <link rel="stylesheet" href="../assets/dash-vendors/material_icon/material-icons.css" />

        <link rel="stylesheet" href="../assets/dash-css/metisMenu.css">

        <link rel="stylesheet" href="../assets/dash-css/style1.css" />
        <link rel="stylesheet" href="../assets/dash-css/colors/default.css" id="colorSkinCSS">
    </head>

    <body class="crm_body_bg">


        <nav class="sidebar">
            <div class="logo d-flex justify-content-between">
                <a href="index.php"><img src="../assets/dash-img/logo.jpeg" height="60px" alt=""></a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>
            </div>
            <ul id="sidebar_menu">
                <li class="side_menu_title">
                    <span>Dashboard</span>
                </li>
                <li class="mm-active">
                    <a class="has-arrow" href="index.php" aria-expanded="false">

                        <img src="../assets/dash-img/menu-icon/1.svg" alt="">
                        <span>Dashboard</span>
                    </a>


                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <img src="../assets/dash-img/menu-icon/3.svg" alt="">
                        <span>Task</span>
                    </a>
                    <ul>
                        <li><a href="addtask.php">Add Task</a></li>
                        <li><a href="viewtask.php">View Task</a></li>

                        <br><br><br><br><br><br><br><br><br><br>

                        <button style="padding-right:40px; 
                            padding-left:20px;
                            border-radius:none;
                            color: #fff;
                            border:none;
                            border-radius:10px;
                            background-color:#90EE99;
                             " id="show" value="show">
                            <li><a href="checkin.php">Check-in</a></li>
                        </button>

                        <button style="padding-right:40px; 
                            padding-left:20px;
                            margin-top:12px;
                            border-radius:none;
                            color: white !important;
                            border:none;
                            border-radius:10px;
                            background-color:red; 
                       " id="hide" value="hide">
                            <li><a href="checkout.php?cId=<?php ?>">CheckOut</a></li>

                        </button>



                    </ul>
                </li>
            </ul>
        </nav>


        <!-- Person Image!-->
        <section class="main_content dashboard_part">
            <div class="container-fluid no-gutters">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div class="header_iner d-flex justify-content-between align-items-center">
                            <div class="sidebar_icon d-lg-none">
                                <i class="ti-menu"></i>
                            </div>
                            <div class="serach_field-area">
                                <div class="search_inner">

                                </div>
                            </div>

                            <div class="header_right d-flex justify-content-between align-items-center">
                                <div class="header_notification_warp d-flex align-items-center">
                                    <li>
                                        <a href="#"> <img src="img/icon/bell.svg" alt=""> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <img src="img/icon/msg.svg" alt=""> </a>
                                    </li>
                                </div>


                                <div class="profile_info">
                                    <img src="../assets/dash-img/client_img.png" alt="#">
                                    <div class="profile_info_iner">
                                        <p><?php echo $user_data['department']; ?></p>


                                        <?php        
                                            $time = date("H");
                                            $time_zone = date("e");
                                            if ($time < 12) {
                                            echo "Good Morning";
                                            }elseif($time >= 12 && $time < 16){
                                            echo  "Good Afternoon";
                                            }elseif($time >= 16 or $time < 19 ){
                                            echo "Good Evening";
                                            }else{
                                            echo "Good Night";
                                            }
                                        ?>

                                        <h5><?php echo $user_data['user_name']; ?></h5>
                                        <div class="profile_info_details">
                                            <a href="#">My Profile <i class="ti-user"></i></a>

                                            <a href="#">Settings <i class="ti-settings"></i></a>
                                            <a href="logout.php">Log Out <i class="ti-shift-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <script src="../assets/vendor/jquery1-3.4.1.min.js"></script>

            <script src="../assets/dash-js/popper1.min.js"></script>

            <script src="../assets/dash-js/bootstrap1.min.js"></script>

            <script src="../assets/dash-js/metisMenu.js"></script>

            <script src="../assets/vendors/count_up/jquery.waypoints.min.js"></script>

            <script src="../assets/dash-vendors/chartlist/Chart.min.js"></script>

            <script src="../assets/dash-vendors/count_up/jquery.counterup.min.js"></script>

            <script src="../assets/dash-vendors/swiper_slider/js/swiper.min.js"></script>

            <script src="../assets/dash-vendors/niceselect/js/jquery.nice-select.min.js"></script>

            <script src="../assets/dash-vendors/owl_carousel/js/owl.carousel.min.js"></script>

            <script src="../assets/dash-vendors/gijgo/gijgo.min.js"></script>

            <script src="../assets/js/datatable/js/jquery.dataTables.min.js"></script>

            <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>

            <script src="assets/dash-js/chart.min.js"></script>

            <script src="assets/dash-vendors/tagsinput/tagsinput.js"></script>


            <script src="assets/dash-js/custom.js"></script>
    </body>

</html>