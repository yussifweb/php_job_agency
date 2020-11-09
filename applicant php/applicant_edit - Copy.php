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

                <!-- <div class="form-group">
                  <label for="industry">Preferred Industry</label>
                  <select class="form-control" name="industry" id="dropdown">
                      <option selected></option>
                      <option>Agriculture</option>
                      <option>Information Technology</option>
                      <option>Bussiness</option>
                      <option>Construction</option>
                      <option>Food</option>
                      <option>Other</option>
                  </select>
              </div> -->
              <div class="form-group">
                    <label for="industry" id="industry-label">Preferred Industry</label>
                    <input type="industry" class="form-control" id="industry" name="industry" value="<?php echo $applicant['industry']; ?>" required>
                </div>

              <div class="form-group">
                <label for="skill-level">Skill Level</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="levelRadios" id="levelRadios1"
                      value="Beginner" <?php if($applicant['levelRadios']=="Beginner"){ echo "checked";}?>>
                  <label class="form-check-label" for="levelRadios1">
                      Beginner
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="levelRadios" id="levelRadios2"
                      value="Intermediate" <?php if($applicant['levelRadios']=="Intermediate"){ echo "checked";}?>>
                  <label class="form-check-label" for="levelRadios2">
                      Intermediate
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="levelRadios" id="levelRadios3"
                      value="Expert" <?php if($applicant['levelRadios']=="Expert"){ echo "checked";}?>>
                  <label class="form-check-label" for="levelRadios3">
                      Expert
                  </label>
              </div>
              </div>

                <!-- <div class="form-group">
                  <label for="region">Region</label>
                  <select class="form-control" id="dropdown" name="region" >
                      <option selected>Select</option>
                      <option>Ashanti</option>
                      <option>Greater Accra</option>
                      <option>Upper West</option>
                      <option>Brong Ahafo</option>
                      <option>Eastern</option>
                  </select>
              </div> -->

              <div class="form-group">
                    <label for="region" id="region-label">Region</label>
                    <input type="region" class="form-control" id="region" name="region" value="<?php echo $applicant['region']; ?>" required>
                </div>


            <!-- <div class="form-group">
              <label for="district">District</label>
              <select class="form-control" id="dropdown" name="district" >
                  <option selected>Select</option>
                  <option>Adum Municipal</option>
                  <option>Bekwai Municipal</option>
                  <option>Oforikrom District</option>
                  <option>Nhyiaeso Municipal</option>
                  <option>Eastern</option>
              </select>
          </div> -->

          <div class="form-group">
                    <label for="district" id="district-label">District</label>
                    <input type="district" class="form-control" id="district" name="district" value="<?php echo $applicant['district']; ?>" required>
        </div>


          <div class="form-group">
                <label for="payment-level">Payment</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="paymentRadios" id="paymentRadios1"
                      value="Pending" <?php if($applicant['paymentRadios']=="Pending"){ echo "checked";}?>>
                  <label class="form-check-label" for="paymentRadios1">
                      Pending
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="paymentRadios" id="paymentRadios2"
                      value="Paid" <?php if($applicant['paymentRadios']=="Paid"){ echo "checked";}?>>
                  <label class="form-check-label" for="paymentRadios2">
                      Paid
                  </label>
              </div>
              </div>

              <div class="form-group">
                <label for="job_title" id="job_title-label">Job Title</label>
                <input type="text" id="job_title" class="form-control" name="job_title" value="<?php echo $applicant['job_title']; ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Post Status</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="statusRadios" id="statusRadios1"
                      value="Pending" <?php if($applicant['statusRadios']=="Pending"){ echo "checked";}?>>
                  <label class="form-check-label" for="statusRadios1">
                      Pending
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="statusRadios" id="statusRadios2"
                      value="Posted" <?php if($applicant['statusRadios']=="Posted"){ echo "checked";}?>>
                  <label class="form-check-label" for="statusRadios2">
                      Posted
                  </label>
              </div>
              </div>

              <div class="form-group">
                <label for="company">Company</label>
                <select class="form-control" id="dropdown" name="company">
                <option selected><?php echo $applicant['company']; ?></option>
                <?php 
                $sql = "SELECT * FROM companies";
                $result = mysqli_query($connect, $sql);

                if (mysqli_num_rows($result) > 0) {
                while($companies = mysqli_fetch_assoc($result)) {
                    $company = $companies['name'] ?>
                <option><?php echo $company; ?></option>
                <?php } } ?> 
                </select>
                </div>

                <div class="card" style="width: 18rem;">
                <span class="img-div">
                <div class="text-center img-placeholder"  onClick="triggerClick()">
                    <h4>Update image</h4>
                </div>
                <img src="applicants/<?php echo $applicant['image']; ?>" onClick="triggerClick()" class="card-img-top" alt="<?php echo $applicant['name']; ?>"  id="imageUpdate">
                </span>
                <input type="file" name="image"  onChange="updatedImage(this)" id="image" class="form-control" style="display: none;">
                <label>Update Image</label>
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

        $error = ('');
        $msg = "";
        $msg_class = "";
        
        if( isset( $_POST['update'] ) ){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age= $_POST['age'];
        $phone= $_POST['phone'];
        $industry= $_POST['industry'];
        $levelRadios= $_POST['levelRadios'];
        $region= $_POST['region'];
        $district= $_POST['district'];
        $paymentRadios = $_POST['paymentRadios'];
        $job_title = $_POST['job_title'];
        $statusRadios= $_POST['statusRadios'];
        $company = $_POST['company'];
        // Get image name
        // imgage preview upload
            $image = $_FILES['image']['name'];
            $tmp_dir = 'applicants/';

        if($image){            
            // For image upload
            $target = "applicants/".basename($image);
            // VALIDATION

            $info = getimagesize($_FILES["image"]["tmp_name"]);
            $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            $width = $info[0];
            $height = $info[1];

            $allowed_extension = array( "png", "PNG", "JPG", "jpg", "jpeg", "JPEG" );

            // validate image size. Size is calculated in Bytes
            if($_FILES['image']['size'] > 300000) {
                $error = 'file size big';
              $msg = "Image size should not be greater than 300Kb";
              $msg_class = "alert-danger";
            }   
            
            if( $width != 720 || $height != 720 ) { 
                $error = 'w & h';              
                $msg = "Image width and height should be 720 Pixels";
                $msg_class = "alert-danger";               
            }

            if (! in_array($extension, $allowed_extension)) {  
                $error ='unsupported extension';
                $msg = "Image should be JPG, jpg, png, PNG, JPEG or jpeg";
                $msg_class = "alert-danger";
             }

            // check if file exists
            if(file_exists($target)) {
              $msg = "File already exists";
              $msg_class = "alert-danger";
            }
            
            if (empty($error)){
                $id = $_GET['id'];
                $sql = "SELECT * FROM applicants WHERE id='$id'";
                $result = mysqli_query($connect, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                while($company = mysqli_fetch_assoc($result)) {
               unlink($tmp_dir.$company['image']); // delete old image from database
                }}                
                move_uploaded_file($_FILES['image']['tmp_name'], $target);    
            }
            } else {
                $id = $_GET['id'];
                $sql = "SELECT * FROM applicants WHERE id='$id'";
                $result = mysqli_query($connect, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                while($applicant = mysqli_fetch_assoc($result)) {
            // if no image selected the old image remain as it is.
                $image = $applicant['image']; // old image from database
                }}
            };


            if (empty($error)) {

                    $sql = "UPDATE applicants SET name='$name', email='$email', age='$age', phone='$phone', industry='$industry', levelRadios='$levelRadios', region='$region',
                    district='$district',  paymentRadios='$paymentRadios', job_title='$job_title', statusRadios='$statusRadios', company='$company', image='$image'  WHERE id='$id'";

                if(mysqli_query($connect, $sql)){
                   header( 'Location: applicants.php' );
                } else {
                    $msg = "Error: " . $sql . "<br>" . mysqli_error($connect);
                    $msg_class = "alert-danger";
                } 
                }
            }
            ?>

         <?php if (!empty($msg)): ?>
         <div class="alert mt-5 <?php echo $msg_class ?>" role="alert">
          <?php echo $msg; ?>
          </div>
          <?php endif; ?>
                

    <?php require 'footer.php'; ?>

    <!-- Optional JavaScript -->
    <script src="./js/script.js"></script>
    <script src="./js/font-awesome.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>