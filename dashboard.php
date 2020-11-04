<?php
require 'connect.php';
session_start();

if( !$_SESSION['email'] ){
    header( 'Location: index.php' );
}

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

    <title>JobCenter</title>
  </head>
  <body>
  <?php require 'nav.php'; ?>
  
      <main class="container-fluid">
        <div class="main">
          <div class="jumbotron jumbotron-image">
            <div class="jumbotron-info mx-auto text-center">
              <h1 class="welcome">Welcome To Job Center</h1>
              <p class="lead">Get started here......</p>
              <hr class="my-4">
              <a class="btn btn-primary btn-lg" href="#" role="button">Check Status</a>
              <a class="btn btn-primary btn-lg" href="company.php" role="button">Add Company</a>
              <a class="btn btn-primary btn-lg" href="applicant.php" role="button">Add Applicant</a>  
            </div>
          </div>
        </div>
      </main>

    <!-- Footer -->
    <?php require 'footer.php'; ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    -->
  </body>
</html>