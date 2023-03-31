<?php
session_start();
include "../../dashboard/includes/conn.php";

if(isset($_POST['submit'])){
    //print_r($_POST); die();
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    $query = mysqli_query($conn, "SELECT * FROM sys_users WHERE user_name = '$username' && user_password = '$password' ");
    
    //  die(mysqli_error($conn));
    if(mysqli_num_rows($query)>0){
            $result = mysqli_fetch_array($query);
            $_SESSION ['userid'] = $result['id'];
            if($result['roles'] == "admin"){
                header("location:../../dashboard/index.php ");
            }else{     
                header("location:../index.php");
            }
        
    }else{
        $_SESSION ['msg'] = "<div style = 'background-color: white; color: red; padding: 12px;'>Incorrect Username/password!</div>";
        header("location:../login.php");
    }
}else{
    $_SESSION['msg']  = "<div style = 'background-color: white; color: red; padding: 12px'>Something not working!</div>";
        header("location:../login.php");

}
?>