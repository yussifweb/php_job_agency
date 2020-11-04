<?php require '../config/connect.php';?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

     <!-- Custom CSS -->
     <link rel="stylesheet" href="../css/style.css">

    <title>JobCenter | Register</title>
  </head>
  <body>

      <main class="container">
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
                            <label for="email" id="email-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="name" id="name-label">Password</label>
                            <input type="text" id="name" class="form-control"name="password" placeholder="Password" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="text" id="email-label">Re-enter Password</label>
                            <input type="email" class="form-control" id="email" placeholder="Re-enter Password" required>
                        </div>
                            <div class="checkbox mb-3">
                          <label>
                            <input type="checkbox" value="remember-me"> Remember me
                          </label>
                        </div> -->
                        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign Up</button>
                      </form>              
                <!-- 
                </div>
                <div class="card-footer"></div>
                </div> -->

                </div>
            </div>
        </main>
    <?php 
    
    if( isset( $_POST['submit'] ) ){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO users (name, email, password) VALUES ( '$name', '$email', '$password' )";

        if (mysqli_query($connect, $sql)) {
          header( 'Location: ../index.php' );
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }
    
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>