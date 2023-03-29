<?php 
session_start();
include_once "../conn.php";

if(isset($_SESSION ['userid'])){
    $id = $_SESSION ['userid'];
    $query = mysqli_query($conn, "SELECT * FROM student_user WHERE Id = '$id' ");
    $data = mysqli_fetch_array($query);
    echo $data['fname'];
}else {
    header("location: login.php");
}


if(isset($_POST['update'])){
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $contact = $_POST['contact']; 

   $userid = $id;
   $msg = mysqli_query($conn, "UPDATE student_user set fname = '$fname', lname = '$lname', email = '$email', contact = '$contact' where Id = '$userid' ");
    if($msg){
        $_SESSION['msg'] = '<div style = "color: green;"> Successfully edited</div>' ;    
    }else{
        $_SESSION['msg'] = '<div style = "color: red;">Unable to edit</div>';
    }
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
        <title>Edits Student's Profile </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="dash.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include '../includes/nav-bar.php'; ?>
        <div id="layoutSidenav">
          <?php include '../includes/side-bar.php'; ?>
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">
                      
                        <h3 class="mt-4"> <?php echo $data['lname']?></h3>
                        <div class="card mb-4">
                     <?php
                        if(isset($_SESSION['msg'])){
                            echo ($_SESSION['msg']);
                            unset($_SESSION['msg']);
                        }
                     ?>
                    <div class="card-body"> 
                        <form action="" method="post">
                            First Name:    <input type="text" name="fname" size="40" value="<?php echo $data['fname']; ?>"readonly> <br><br>
                            Last Name:     <input type="text" name="lname" size="40" value="<?php echo $data['lname']; ?>"> <br><br>
                            Email:         <input type="text" name="email" size="45" value="<?php echo $data['email']; ?>"> <br><br>
                            Contact Number: <input type="text" name="contact" size="35" value="<?php echo $data['contact']; ?>"> <br><br>
                            <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>
                        </form>
                               
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