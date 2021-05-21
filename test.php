<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  include("includes/config.php");
  if(isset($_POST['submit'])){


    $EmailAdd = $_POST["EmailAddress"];
    $fname = $_POST["FirstName"];

          

          /* Exception class. */
          require 'PHPMailer\src\Exception.php';

          /* The main PHPMailer class. */
          require 'PHPMailer\src\PHPMailer.php';

          /* SMTP class, needed if you want to use SMTP. */
          require 'PHPMailer\src\SMTP.php';

          $mail = new PHPMailer(TRUE);

          try {
            
            $mail->setFrom('no-reply@howcode.org', 'EVENT EQUIPMENT RENTAL RESERVATION');
            $mail->addAddress($_POST['EmailAddress'], $_POST["FirstName"]);
            $mail->Subject = 'RESERVATION CONFIRMED';
            $mail->Body = 'Thank you for trusting us to provide for your event needs, Your reservation has been recorded and will deliver your items 2hrs earlier the date of reservation. For more info, Pls call 09978658119. Thank you.';
            
            /* SMTP parameters. */
            
            /* Tells PHPMailer to use SMTP. */
            $mail->isSMTP();
            
            /* SMTP server address. */
            $mail->Host = 'smtp.gmail.com';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = TRUE;
            
            /* Set the encryption system. */
            $mail->SMTPSecure = 'ssl';
            
            /* SMTP authentication username. */
            $mail->Username = 'stevenskie9090@gmail.com';
            
            /* SMTP authentication password. */
            $mail->Password = 'mcsoingviamkbnel';
            
            /* Set the SMTP port. */
            $mail->Port = 465;
            
            /* Finally send the mail. */
            $mail->send();
          }
          catch (Exception $e)
          {
            echo $e->errorMessage();
          }
          catch (\Exception $e)
          {
            echo $e->getMessage();
          }

}