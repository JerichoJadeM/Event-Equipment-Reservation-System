<?php 
    session_start();
    if(isset($_POST['login'])){
            require 'config.php';



            $myUserName = $_POST['UserName'];
            $myPassword = $_POST['Password'];

            if (empty($myUserName) || empty($myPassword)){
                
                header("location: ../about.php?error=emptyfields");
                exit();
             }
            else {
                $sql = "SELECT id FROM admin WHERE UserName = '$myUserName' and Password = '$myPassword';";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $active = $row['active'];
                
                $count = mysqli_num_rows($result);
                
                // If result matched $myusername and $mypassword, table row must be 1 row
                  
                if($count == 1) {
                   header("location: ../index.php");
                }else {
                     echo "<script>alert('UserName or Password is Invalid');</script>";
                  }
             }       
               
    }
    

?>