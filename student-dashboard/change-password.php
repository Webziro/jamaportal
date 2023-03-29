<?php 
include "../includes/section.php";

if(isset($_POST['update'])){
    $oldpassword = mysqli_real_escape_string($conn, $_POST['currentpassword']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    $userpass = $data['_password'];
    
    if($oldpassword == $userpass){
        if($newpassword == $confirmpassword){
            $result = mysqli_query($conn, "UPDATE student_user set _password = '$newpassword' WHERE Id = '$id' ");
            if(mysqli_affected_rows($conn)> 0){
                $_SESSION ['msg'] = '<div style = "color:green;">Password updated successfully! </div>';               
            }else{
                $_SESSION ['msg'] = '<div style= "color: red;">"Password update failed. Try again!" </div>';
            }
        }else{
            $_SESSION['msg'] = '<div style= "color: red;">There was a password mismatch!</div>';
        }
    }else{
        $_SESSION['msg'] = '<div style="color:red;">Your password no match bros!</div>';
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
        <title>Change Password| Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="dash.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('../includes/nav-bar.php');?>
        <div id="layoutSidenav">
          <?php include_once('../includes/side-bar.php');?>
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
      
                 <br><br>
                        <h1 class="mt-4">Change Password</h1>

        <?php 
            if(isset($_SESSION['msg'])){ 
                echo $_SESSION['msg'];
                unset($_SESSION['msg']); 
            }
        ?>
                        <div class="card mb-4"> 
                        <form method="post" name="changepassword" onSubmit="return valid();">                
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                       <th>Current Password</th>
                                       <td><input class="form-control" id="currentpassword" name="currentpassword" type="password" value="" required /></td>
                                   </tr>
                                   <tr>
                                       <th>New Password</th>
                                       <td><input class="form-control" id="newpassword" name="newpassword" type="password" value="" required /></td>
                                   </tr>
                                     <tr>
                                       <th>Confirm Password</th>
                                       <td><input class="form-control" id="confirmpassword" name="confirmpassword" type="password" value="" required /></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Change</button></td>
                                   </tr>
                                    </tbody>
                                </table>
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

