<?php 
session_start();
include_once "../conn.php";

if(isset($_SESSION ['userid'])){
    $id = $_SESSION ['userid'];
    $query = mysqli_query($conn, "SELECT * FROM admin_user WHERE Id = '$id' ") or die(mysqli_error($conn));
    $data = mysqli_fetch_array($query);
    if(!is_array($data)){
        header("location: ../index.php");
    }
}else {
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Yesterday Reg Users | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../student-dashboard/dash.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/nav-bar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/side-bar.php');?>
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">
                    <?php
                            $time = date("H");
                            $time_zone = date("e");
                            if ($time < 12) {
                                echo "Good Morning, Welcome Back";
                            }elseif($time >= 12 && $time < 16){
                                echo "Good Afternoon, Welcome Back";
                            }elseif($time >= 16 or $time < 19 ){
                                echo "Good Evening, Welcome Back";
                            }else{
                                echo "Good Night, Welcome Back";
                            }
                    ?>
                        
                        <h3 class="mt-4"> <?php echo $data['username']; ?></h3> 
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                        <th>Sno.</th>
                                        <th>First Name</th>
                                        <th> Last Name</th>
                                        <th> Email Id</th>
                                        <th>Contact no.</th>
                                        <th>Reg. Date</th>
                                    </tr>
                                
                                  </thead>

                                  <tbody>
                                        <?php
                                            $date = date("Y-m-d H:i:s");
                                            $enddate = date('Y-m-d H:i:s', strtotime($date .' -1 hour'));    
                                            $result = mysqli_query($conn, "SELECT * FROM student_user WHERE posting_date >='$enddate'");
                                            $count = 1;
                                            while($row = mysqli_fetch_array($result)){
                                        ?>
                                <tr>
                                    <td> <?php echo $count;?></td>
                                    <td><?php echo $row['fname'];?></td>
                                    <td><?php echo $row['lname'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['contact'];?></td>
                                    <td><?php echo $row['posting_date'];?></td>
                                </tr>
                                    <?php $count = $count + 1; }?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
    
          <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>

