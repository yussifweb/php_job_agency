<?php ob_start(); ?>
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

     <?php 
                        
        $id = $_GET['id'];
         $sql = "SELECT * FROM applicants WHERE id='$id'";
        $result = mysqli_query($connect, $sql);

         if (mysqli_num_rows($result) > 0) {
          while($applicant = mysqli_fetch_assoc($result)) { ?>
    <title>Jobcenter | <?php echo $applicant['name']; ?></title>
    <?php } }?>

  </head>
  <body>
  <?php require 'nav.php'; ?>
  <main class="container">
        <div class="row">
        <div class="col-12 col-sm-6 offset-sm-3" id="main">
        <div class="card">
        <div class="card-header">Edit Client</div>
        <div class="card-body">
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM applicants WHERE id='$id'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
            while($applicant = mysqli_fetch_assoc($result)) { ?>

        <form id="survey-form" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" id="name-label">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $applicant['name']; ?>" placeholder="Please Enter Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email" id="email-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $applicant['email']; ?>" placeholder="Please Enter Your Email" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age" value="<?php echo $applicant['age']; ?>" placeholder="Age" required>
                </div>

                <div class="form-group">
                    <label for="number" id="number-label">Contact</label>
                    <input type="tel" class="form-control" id="phone" min="10" name="phone" value="<?php echo $applicant['phone']; ?>" placeholder="Your Contact Here...">
                </div>

                <div class="form-group">
                  <label for="industry">Preferred Industry</label>
                  <select class="form-control" name="industry" value="<?php echo $applicant['industry']; ?>" id="dropdown">
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
                <label for="skill-level">Skill Level</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="levelRadios" id="levelRadios1"
                      value="Beginner" checked>
                  <label class="form-check-label" for="levelRadios1">
                      Beginner
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="levelRadios" id="levelRadios2"
                      value="Intermediate">
                  <label class="form-check-label" for="levelRadios2">
                      Intermediate
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="levelRadios" id="levelRadios3"
                      value="Expert">
                  <label class="form-check-label" for="levelRadios3">
                      Expert
                  </label>
              </div>
              </div>

                <div class="form-group">
                  <label for="region">Region</label>
                  <select class="form-control" id="dropdown" name="region" value="<?php echo $applicant['region']; ?>">
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
              <select class="form-control" id="dropdown" name="district" value="<?php echo $applicant['district']; ?>">
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
            <button id="submit" class="btn-block btn btn-success" type="submit" name="update">Submit</button>
             <?php    }
               } else {
                echo "0 results";
             }
             ?>
        </form>
        </div>
        </div>    
        <div class="mt-5">
      <a href="applicants.php" class="btn btn-sm btn-warning btn-block">Back</a>
      </div>
    </div>
    </main>

    <?php
    
    if( isset( $_POST['update'] ) ){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age= $_POST['age'];
        $phone= $_POST['phone'];
        $industry= $_POST['industry'];
        $levelRadios= $_POST['levelRadios'];
        $region= $_POST['region'];
        $district= $_POST['district'];
        // Get image name
        $image = $_FILES['image']['name'];
        // image file directory
  	    $target = "applicants/".basename($image);


        $sql = "UPDATE applicants SET name='$name', email='$email', age='$age', phone='$phone', industry='$industry', levelRadios='$levelRadios', region='$region', district='$district', image='$image'  WHERE id='$id'";

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && mysqli_query($connect, $sql)) {
            header('Location: applicants.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

    <?php require 'footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>