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

    <title>JobCenter | Register</title>
  </head>
  <body>

      <main class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-4 offset-sm-4">
                <div class="card">
                <div class="card-header text-center h3">JobCenter</div>
                <div class="card-body">
                <form avtion="" class="form-signin" method="POST">
                        <!-- <img class="my-auto" src="./images/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                        <h4 class="h5 font-weight-normal text-center">Sign Up</h4>
                        <div class="form-group">
                            <label for="name" id="name-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Please Enter Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact" id="contact-label">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Please Enter Your contact" required>
                        </div>
                        <div class="form-group">
                            <label for="email" id="email-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" id="password-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password" id="password-label">Re-enter Password</label>
                            <input type="password" class="form-control"name="password_2" id="password_2" placeholder="Re-enter Password" required>
                        </div>
                            <!-- <div class="checkbox mb-3">
                          <label>
                            <input type="checkbox" value="remember-me"> Remember me
                          </label> -->
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign Up</button>
                      </form>              
                
                </div>
                <div class="card-footer">
                <a href="dashboard.php" class="btn btn-success btn-lg btn-block" role="button">Dashboard</a>
                </div>
                </div>

                </div>
            </div>
        </main>
    <?php 
    


    if( isset( $_POST['submit'] ) ){
      // receive all input values from the form
      $name = mysqli_real_escape_string($connect, $_POST['name']);
      $contact = mysqli_real_escape_string($connect, $_POST['contact']);
      $email = mysqli_real_escape_string($connect, $_POST['email']);
      $password = mysqli_real_escape_string($connect, $_POST['password']);
      $password_2 = mysqli_real_escape_string($connect, $_POST['password_2']);
      if ($password != $password_2) {
            $error = 'password not match';              
            $msg = "Passwords do not match";
            $msg_class = "alert-danger";
        }
      
        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $sql = "SELECT * FROM users WHERE name='$name' OR email='$email' LIMIT 1";
        $result = mysqli_query($connect, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
          if ($user['name'] === $name) {
            $error = 'name exists';              
            $msg = "Name already exists";
            $msg_class = "alert-danger";
          }
      
          if ($user['email'] === $email) {
            $error = 'email exists';              
            $msg = "Email already exists";
            $msg_class = "alert-danger";
          }
        }
        
        if (empty($error)) {
        // $name = $_POST['name'];
        // $contact = $_POST['contact'];
        // $email = $_POST['email'];
        $password = md5($_POST['password']);
        $level = 50;
        $sql = "INSERT INTO users (name, contact, email, password, level) VALUES ( '$name', $contact, '$email', '$password', '$level' )";
        if (mysqli_query($connect, $sql)) {
          header( 'Location: index.php' );
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
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
    <script src="./js/font-awesome.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>