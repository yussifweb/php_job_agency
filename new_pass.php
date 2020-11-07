<?php require 'connect.php'; ?>

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

    <title>JobCenter | New Password</title>
  </head>
  <body>

      <main class="container">
            <div class="row">
                <div class="col-12 col-sm-4 offset-sm-4 mt-5">
                <div class="card">
                <div class="card-header h5 text-center">JobCenter</div>
                <div class="card-body">
                <form action="" class="form-signin" method="POST">
                        <h4 class="h3 mb-3 font-weight-normal text-center">New Password</h4>
                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" name="new_password" placeholder="Password" required>    
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Confirm Password</label>
                            <input type="password" id="inputPassword" class="form-control" name="new_password2" placeholder="Confirm Password" required>    
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" name="reset" type="submit">Submit</button>
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

    // ENTER A NEW PASSWORD
    if (isset($_POST['reset'])) {
    $new_password = mysqli_real_escape_string($connect, $_POST['new_password']);
    $new_password2 = mysqli_real_escape_string($connect, $_POST['new_password2']);
  
    // Grab to token that came from the email link
    $token = $_GET['token'];
    
    if (empty($new_password) || empty($new_password2)){
        $error = 'No Password';              
        $msg = "Password is required";
        $msg_class = "alert-danger";
        }

    if ($new_password !== $new_password2){
        $error = 'No Password match';              
        $msg = "Passwords do not match";
        $msg_class = "alert-danger";
        }
    if (empty($error)) {
      // select email address of user from the password_reset table 
      $sql = "SELECT email FROM reset WHERE token='$token' LIMIT 1";
      $results = mysqli_query($connect, $sql);
      $email = mysqli_fetch_assoc($results)['email'];
  
      if ($email) {
        $new_password = md5($new_password);
        $sql = "UPDATE users SET password='$new_password' WHERE email='$email'";
        $results = mysqli_query($connect, $sql);
        header('location: index.php');
      }
    }
  }  
?>

    <?php if (!empty($msg)): ?>
    <div class="alert <?php echo $msg_class ?>" role="alert">
    <?php echo $msg; ?>
    </div>
    <?php endif; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="./jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>