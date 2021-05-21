<?php
  include_once('config.php');

    if(isset($_POST['submit'])){
      
        $Name = $_POST['author'];
        $Email = $_POST['email'];
        $Subject = $_POST['subject'];
        $Message = $_POST['text'];

        $sql = "INSERT INTO testimonials (Name, EmailAdd, Subject, Message) VALUES ('$Name', '$Email', '$Subject', '$Message');";
        $result = mysqli_query($conn, $sql);
       
            header("location: ../contact.php?Comment=success");
    }
?>