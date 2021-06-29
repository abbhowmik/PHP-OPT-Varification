<?php

    require 'send_otp.php';
    include 'dbconnect.php';
?>

<?php
    
  $ismatched = false;
  $success = "";
  
 if(isset($_POST['submit_email']))
  {
      $email = $_POST['email'];
      $sql = "SELECT * FROM `registered_users` WHERE email='$email'";
      $result = mysqli_query($conn, $sql);
      $conut = mysqli_num_rows($result);
      if($conut > 0)
      {
        // if the email matched from the database email 
        $ismatched = true;
        // then we will generate otp
        $otp = rand(100000, 9999999);

        // then send the otp into the same email address
        
        $email_status = sendOTP($email, $otp);
        if($email_status == 1)
        {
          $sql = "INSERT INTO `otp_send` (`otp`, `is_expired`, `date`) VALUES ('".$otp."', '0', current_timestamp())";
          $result = mysqli_query($conn, $sql);
          $current_id = mysqli_insert_id($conn);
          if(!empty($current_id))
          {
            $success = 1;
          }
        }
        // else{
        //   $error_message = "Email Id does not exists!";
        // }  
      }
    }
    
    if(!empty($_POST['submit_otp']))
    {
        $otp = $_POST['otp'];
        $sql = "SELECT * FROM otp_send WHERE otp='".$otp."' AND is_expired!=1 AND NOW()<= DATE_AND(date,INTERVAL 15 MINUTE)";
        $result = mysqli_query($conn, $sql);
        $conut = mysqli_num_rows($result);
        if(!empty($count))
        {
            $sql = "UPDATE otp_send SET is_expired = 1 WHERE otp ='.$otp.' ";
            $result = mysqli_query($conn, $sql);
            $success = 2;
        }
        else{
            $success = 1;
            $error_message = "Invalid OTP";
        }
    }

    




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <title>Email Varification Process</title>
</head>

<body>
    <?php

        if(!empty($success == 1))
        {
            echo $error_message;
        }

    ?>

    <div class="container my-5">
        <form action="/OTP_Varification/index.php" method="post">
            <?php
        if(!empty($success == 1))
        {
          echo '
          <div class="container my-5"> 
          <div class="mb-3">
            <h4 style="color: #31ab00;" >Check your email for the otp</h4>
            <label for="otp" class="form-label">Enter OTP</label>
            <input type="number" class="form-control" id="otp" name="otp">
          </div>
          <button type="submit" class="btn btn-primary" name="send_otp">Submit OTP</button>
          </div>';
        }

        else if($success == 2)
        {
          echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your OTP has been varified, You are now logged in!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

        else{
          echo '<h3>Enter your Login Details</h3>
          <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="enter your email id"
                  aria-describedby="emailHelp" />
          </div>
          <button type="submit" name="submit_email" class="btn btn-success">
              Send OTP
          </button>';
        }
        // if($ismatched = false)
        //   {
        //     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        //     <strong>Alert!</strong> Sorry, Your Email id is not valid
        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //   </div>';
        //   }


    ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>