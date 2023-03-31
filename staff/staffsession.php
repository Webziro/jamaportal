<?php
    include_once "../dashboard/includes/conn.php";
        if(isset($_SESSION['userid'])){
            $sid = $_SESSION['userid'];
            $query = mysqli_query($conn, "SELECT * FROM sys_users WHERE id = '$sid' && roles = 'staff'"); 
            //die(mysqli_error($conn));
            if(mysqli_num_rows($query)>0){
                  $user_data = mysqli_fetch_array($query);
            }else{
                header("location: index.php ");
            }
          
        }else{
            echo "Not set";
                header("location: login.php ");
            
        }
        
    
?>