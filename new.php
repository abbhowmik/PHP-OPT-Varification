 <?php

function sendOTP($email, $otp){
    require('class.phpmailer.php');
     require('class.smtp.php');
     
     $messege_body = "One time password for PHP authontication system is: <br><br>".$otp;
     
     $mail = new PHPMailer();
     $mail->AddReplyTo('asubiswas970@gmail.com', 'Asu Biswas');
     $mail->SetFrom('ashisbhowmikisp@gmail.com', 'Ashis Bhowmik');
     $mail->AddAddress($email);
     $mail->Subject= "OTP for Login in Php auth system";
     $mail->msgHTML($messege_body);
     $result = $mail->Send(); // this is return boolean type and 0 and 1

     if(!$result){
         echo "Mailer Error: ". $mail->ErrorInfo;
     }
     else{
         return $result;
     }
} 
?>