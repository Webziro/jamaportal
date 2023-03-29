<?php
    include_once "conn.php";
        if(isset($_SESSION['userid'])){
            $id = $_SESSION['userid'];
            $query = mysqli_query($conn, "SELECT * FROM sys_users WHERE id = '$id'");
            if(mysqli_num_rows($query)>0){
                  $user_data = mysqli_fetch_array($query);
            }else{
                header("location: ../index.php ");
            }
          
        }else{
            echo "Not set";
            header("location: ../index.php");
        }
        
    
?>