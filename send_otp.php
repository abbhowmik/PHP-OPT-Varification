<?php

    // function sendOTP($email, $otp)
    // {

    //             require 'PHPMailerAutoload.php';
    //             require 'class.phpmailer.php';
    //             require 'class.smtp.php';
    //             // require 'credentials.php';
                

    //             $mail = new PHPMailer;
    //             // $mail->SMTPDebug = 2;                               // Enable verbose debug output

    //             // $mail->isSMTP();                                      // Set mailer to use SMTP
    //             // $mail->Host = 'localhost';            // Specify main and backup SMTP servers
    //             // $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //             // $mail->Username = 'root';                 // SMTP username
    //             // $mail->Password = "";                           // SMTP password
    //             // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //             // $mail->Port = 25;  
                      
    //             $mail->SMTPDebug = 1;                              // Enable verbose debug output

    //             $mail->isSMTP();  
    //             $mail->Mailer = "smtp";                                   // Set mailer to use SMTP
    //             $mail->Host = "ssl://smtp.gmail.com";                        // Specify main and backup SMTP servers
    //             $mail->SMTPAuth = true;                              // Enable SMTP authentication
    //             $mail->Username = 'ashisbhowmikisp@gmail.com';                            // SMTP username
    //             $mail->Password = '8695879107';                                // SMTP password
    //             $mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted
    //             $mail->Port = 587;                           // TCP port to connect to



    //             $mail->setFrom('ashisbhowmikisp@gmail.com', 'Ashis Bhowmik');
    //             $mail->addAddress($_POST['email']);     // Add a recipient
    //             $mail->addAddress('ellen@example.com');               // Name is optional
    //             $mail->addReplyTo('asubiswas970@gmail.com', 'Asu Biswas');
                
    //             $mail->isHTML(true);                                  // Set email format to HTML

    //             $mail->Subject = 'OTP for Login';
    //             $mail->Body = 'One time password for PHP authontication system is: <br><br>'.$otp;
                
    //             $result = $mail->Send(); // this is return boolean type and 0 and 1

    //             if(!$result){
    //                 echo "Mailer Error: ". $mail->ErrorInfo;
    //             }
    //             else{
    //                 return $result;
    //             }


    // }

?>