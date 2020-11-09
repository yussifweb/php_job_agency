<?php 
require 'connect.php'; 
session_start();
?>

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

    <title>JobCenter | Login</title>
  </head>
  <body>

      <main class="container">
            <div class="row">
                <div class="col-12 col-sm-4 offset-sm-4 mt-5">
                <div class="card">
                <div class="card-header h5 text-center">JobCenter</div>
                <div class="card-body">
                <form action="" class="form-signin" method="POST">
                        <h4 class="h3 mb-3 font-weight-normal text-center">Please Sign In</h4>
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>    
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>    
                        </div>
                        <!-- <div class="checkbox mb-3">
                          <label>
                            <input type="checkbox" value="remember-me"> Remember me
                          </label>
                        </div> -->
                        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
                      </form>
                      <p><a href="reset.php">Forgot your password?</a></p>
                </div>
                <div class="foot card-footer text-center">
                    <p class="text-muted">&copy; 2020. Jobcenter <br/> All Rights Reserved</p>
                  </div>
                </div>                      
                </div>
            </div>
    </main>

    <?php 
    
    if( isset( $_POST['login'] ) ){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($user = mysqli_fetch_assoc($result)) { 
                if( $email == $user['email'] && $password == $user['password'] ){
                    $_SESSION['email'] = $email;
                    header('Location: dashboard.php');
                }else{
                    echo '<script>alert("Error username or password incorrect!");</script>';
                }
            }
        } else {
            echo "No User Found";
        }

    }
    
    ?>



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./js/font-awesome.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="./jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>