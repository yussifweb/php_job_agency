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


    <title>JobCenter | New Job</title>
  </head>
  <body>
  <?php require 'nav.php'; ?>
      <main class="container">
        <div class="row">
        <div class="col-md-6 offset-md-3" id="main">
        <div class="card">
        <div class="card-header">Add New Job</div>
        <div class="card-body">
        <form id="survey-form" action="" method="POST" enctype="multipart/form-data">
            <!-- get user ID -->
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
                    <label for="name" id="name-label">Title</label>
                    <input type="text" id="name" class="form-control" name="title" placeholder="Please Enter Job Title" required>
                </div>

                <!-- get company names -->
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

                <div class="form-group">
                  <label for="industry">Industry</label>
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
                    <label for="body">Description</label>
                    <textarea class="form-control" id="jobFormControlTextarea" rows="3" name="body" placeholder="Enter Job Description" required></textarea>
                </div>
                
            <div class="form-group">
              <input type="text" class="form-control input-sm" name="location" required placeholder="Job Location">
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
        $user_id = $user_id;
        $title = $_POST['title'];
        $industry= $_POST['industry'];
        $company= $_POST['company'];
        $body= $_POST['body'];
        $location= $_POST['location'];
        // Get image name
        $image = $_FILES['image']['name'];
        // image file directory
  	    $target = "jobs/".basename($image);


        $sql = "INSERT INTO jobs (user_id, title, company, industry,  body, location, image) VALUES ( '$user_id', '$title', '$company', '$industry', '$body', '$location',  '$image' )";

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && mysqli_query($connect, $sql)) {
          header('Location: jobs.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }

    ?>

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