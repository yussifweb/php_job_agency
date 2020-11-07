<?php require 'connect.php';?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

     <!-- Custom CSS -->
     <link rel="stylesheet" href="./css/style.css">

    <title>JobCenter | Reset Password</title>
  </head>
  <body>

      <main class="container">
            <div class="row">
                <div class="col-12 col-sm-4 offset-sm-4 mt-5">
                <div class="card">
                <div class="card-header h5 text-center">JobCenter</div>
                <div class="card-body">
                <form class="login-form" action="" method="POST">
                <h2 class="form-title">Reset password</h2>
                <!-- form validation messages -->
                <!-- <?php include('messages.php'); ?> -->
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>    
                </div>
                <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" name="reset-password" type="submit">Submit</button>
                </div>
            </form>
                </div>
                <div class="foot card-footer text-center">
                    <p class="text-muted">&copy; 2020. Jobcenter <br/> All Rights Reserved</p>
                  </div>
                </div>                      
                </div>
            </div>
    </main>


    <?php 

    /*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    // ensure that the user exists on our system
    $sql = "SELECT email FROM users WHERE email='$email'";
    $results = mysqli_query($connect, $sql);
  
    if (empty($email)) {
        $error = 'No Email';              
        $msg = "Your email is required";
        $msg_class = "alert-danger";
    }else if(mysqli_num_rows($results) <= 0) {
        $error = 'User not found';              
        $msg = "Sorry, no user exists on our system with that email";
        $msg_class = "alert-danger";
    }

    // generate a unique random token of length 100
    // "<a href='www.yourwebsite.com/reset-password.php?key=".$email."&amp;token=".$token."'>Click To Reset password</a>"
    $token = bin2hex(random_bytes(50));
    $link = "<html>
    <head>
      <title>Password Reset</title>
    </head>
    <body>
      <p><strong>Click on the link below to reset your password</strong></p>
      <br/>
      <div style='padding-top: 1rem;'></div>
      <div style='background-color: #33d6b3; border: none; 
      padding: 20px 32px; text-align: center; display: inline-block; border-radius: 15px; margin: 0 auto;'>
      <a style='text-decoration: none; color: rgb(253, 235, 235); font-size: 16px; font-weight: 500;' href='localhost/job2/new_pass.php?token=".$token."'><strong>Reset Password</strong></a></div>      
    </body>
    </html>"
    ;
  
    if (empty($error)) {
      // store token in the password-reset database table against the user's email
      $sql = "INSERT INTO reset(email, token) VALUES ('$email', '$token')";
      $results = mysqli_query($connect, $sql);
  
      // Send email to user with the token in a link they can click on
      $to = $email;
      $subject = "Reset your password on Jobcenter.";
      $message = $link;
      $message = wordwrap($message,70);
      $headers = "From: djiceman.gh@gmail.com";
      $headers .= "MIME-Version: JobCenterGh\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      mail($to, $subject, $message, $headers);
    //   header('location: reset.php?email=' . $email);              
        $msg = "Email sent. Please login into your email account and click on the link we sent to reset your password";
        $msg_class = "alert-success";
    }
  }

  ?>
    <div class="col-12 col-sm-6 offset-sm-3 pt-5">
    <?php if (!empty($msg)): ?>
    <div class="alert <?php echo $msg_class ?>" role="alert">
    <?php echo $msg; ?>
    </div>
    <?php endif; ?>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="./jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>