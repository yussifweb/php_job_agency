<?php 

require '../config/connect.php';
session_start();


if( !$_SESSION['email'] ){
    header( 'Location: ../index.php' );
}

?>

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

     <title>JobCenter | New Company</title>
  </head>
  <body>
      <main class="container">
        <div class="row">
        <div class="col-12 col-sm-6 offset-sm-3" id="main">
        <div class="card">
        <div class="card-header">Add New Company</div>
        <div class="card-body">
        <form id="survey-form" action="">
                <div class="form-group">
                    <label for="name" id="name-label">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Please Enter Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email" id="email-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="age" name="address" placeholder="Address" required>
                </div>

                <div class="form-group">
                    <label for="number" id="number-label">Contact</label>
                    <input type="tel" class="form-control" id="phone" min="10" name="phone" placeholder="Your Contact Here..." required>
                </div>

                <div class="form-group">
                  <label for="industry">Preferred Industry</label>
                  <select class="form-control" name="industry" id="dropdown">
                      <option selected>Select</option>
                      <option>Agriculture</option>
                      <option>Information Technology</option>
                      <option>Bussiness</option>
                      <option>Construction</option>
                      <option>Food</option>
                      <option>Other</option>
                  </select>
              </div>

                <div class="form-group">
                  <label for="region">Region</label>
                  <select class="form-control" id="dropdown" name="region">
                      <option selected>Select</option>
                      <option>Ashanti</option>
                      <option>Greater Accra</option>
                      <option>Upper West</option>
                      <option>Brong Ahafo</option>
                      <option>Eastern</option>
                  </select>
              </div>

            <div class="form-group">
              <label for="district">District</label>
              <select class="form-control" id="dropdown" name="district">
                  <option selected>Select</option>
                  <option>Adum Municipal</option>
                  <option>Bekwai Municipal</option>
                  <option>Oforikrom District</option>
                  <option>Nhyiaeso Municipal</option>
                  <option>Eastern</option>
              </select>
          </div>

          <div class="form-group">
              <input type="file" class="form-control input-sm" name="image" required placeholder="Upload Image">
          </div>
            <button id="submit" class="btn-block btn btn-success" type="submit" name="submit">Submit</button>
        </form>
        </div>
        </div>
      </div>
    </main>

    <?php 
    
    if( isset( $_POST['submit'] ) ){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address= $_POST['address'];
        $phone= $_POST['phone'];
        $industry= $_POST['industry'];
        $region= $_POST['region'];
        $district= $_POST['district'];
        // Get image name
        $image = $_FILES['image']['name'];
        // image file directory
  	    $target = "companies/".basename($image);

        $sql = "INSERT INTO companies (name, email, address, phone, industry, region, district, image) VALUES ( '$name', '$email', '$address', '$phone', '$industry', '$region', '$district', '$image' )";

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && mysqli_query($connect, $sql)) {
            echo "header('Location: companies.php');";
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    -->
  </body>
</html>