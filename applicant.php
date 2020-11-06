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


    <title>JobCenter | New Client</title>
  </head>
  <body>
  <?php require 'nav.php'; ?>
      <main class="container">
        <div class="row">
        <div class="col-md-6 offset-md-3" id="main">
        <div class="card">
        <div class="card-header">Add New Applicant</div>
        <div class="card-body">
        <form id="survey-form" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" id="name-label">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Please Enter Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email" id="email-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Email" required>
                </div>
                <div class="form-group">
                    <label for="age">Age(Optional)</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Age">
                </div>

                <div class="form-group">
                    <label for="number" id="number-label">Contact</label>
                    <input type="tel" class="form-control" id="phone" min="10" name="phone" placeholder="Your Contact Here...">
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
          <?php 
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
            while($user = mysqli_fetch_assoc($result)) {
                $user_id = $user['id']
             ?>
             
            <?php
             } }
            ?> 

            <div class="form-group">
                <label for="payment-level">Payment</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="paymentRadios" id="paymentRadios1"
                      value="Pending" checked>
                  <label class="form-check-label" for="paymentRadios1">
                      Pending
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="paymentRadios" id="paymentRadios2"
                      value="Paid">
                  <label class="form-check-label" for="paymentRadios2">
                      Paid
                  </label>
              </div>
              </div>

              <div class="form-group">
                <label for="job_title" id="job_title-label">Job Title</label>
                <input type="text" id="job_title" class="form-control" name="job_title" placeholder="Please Enter Job Title" required>
            </div>

            <div class="form-group">
                <label for="status">Post Status</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="statusRadios" id="statusRadios1"
                      value="Pending" checked>
                  <label class="form-check-label" for="statusRadios1">
                      Pending
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="statusRadios" id="statusRadios2"
                      value="Posted">
                  <label class="form-check-label" for="statusRadios2">
                      Posted
                  </label>
              </div>
              </div>

              <div class="form-group">
                <label for="company">Company</label>
                <select class="form-control" id="dropdown" name="company">
                <option selected>Select</option>
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
                    <h4>Upload image</h4>
                </div>
                <img src="images/avatar.jpg" onClick="triggerClick()" class="card-img-top" alt=""  id="imageUpdate">
                </span>
                <input type="file" name="image" onChange="updatedImage(this)" id="image" class="form-control" style="display: none;">
                <label>Upload Image</label>
                </div>
            <button id="submit" class="btn-block btn btn-success" type="submit" name="submit">Submit</button>
        </form>
        </div>
        </div>
    </div>
    </main>

    <?php 
      
      $error = ('');
      $msg = "";
      $msg_class = "";
            
    if( isset( $_POST['submit'] ) ){
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
        $user_id = $user_id;
        // Get image name
        // imgage preview upload
            $image = $_FILES['image']['name'];
            // For image upload
            $target = "applicants/".basename($image);
            // VALIDATION
            $info = getimagesize($_FILES["image"]["tmp_name"]);
            $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            $width = $info[0];
            $height = $info[1];

            $allowed_extension = array( "png", "jpg", "jpeg" );

            // validate image size. Size is calculated in Bytes
            if($_FILES['image']['size'] > 300000) {
                $error = 'file size big';
              $msg = "Image size should not be greater than 300Kb";
              $msg_class = "alert-danger";
            //   return false;
            }
            
            if($width > 720 || $height > 720) { 
                $error = 'w & h';              
                $msg = "Image width and height should 720 Pixels";
                $msg_class = "alert-danger";
               
            }

            
            if (! in_array($extension, $allowed_extension)) {  
                $error ='unsupported extension';
                $msg = "Image should be jpg, png or jpeg";
                $msg_class = "alert-danger";
                // return false;
             }

            // check if file exists
            if(file_exists($target)) {
              $error = 'file exists';
              $msg = "File already exists";
              $msg_class = "alert-danger";
            }

            if (empty($error)) {
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
                    $sql = "INSERT INTO applicants (name, email, age, phone, industry, levelRadios, region, district, paymentRadios, job_title, statusRadios, company, user_id, image) 
                    VALUES ( '$name', '$email', '$age', '$phone', '$industry', '$levelRadios', '$region', '$district', '$paymentRadios', '$job_title', '$statusRadios', $company, '$user_id', '$image' )";
                    if(mysqli_query($connect, $sql)){
                        header( 'Location: applicants.php' );
                  } else {
                    $msg = "Error: " . $sql . "<br>" . mysqli_error($connect);
                    $msg_class = "alert-danger";
                  }
                } else {
                  $msg = "There was an error uploading the file";
                  $msg = "alert-danger";
                }
              }
            }
            ?>

        <?php if (!empty($msg)): ?>
        <div class="alert <?php echo $msg_class ?>" role="alert">
        <?php echo $msg; ?>
        </div>
        <?php endif; ?>


<?php require 'footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./script.js"></script>
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
<?php ob_end_flush(); ?>