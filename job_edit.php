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
         $sql = "SELECT * FROM jobs WHERE id='$id'";
        $result = mysqli_query($connect, $sql);

         if (mysqli_num_rows($result) > 0) {
          while($job = mysqli_fetch_assoc($result)) { ?>
    <title>Jobcenter | <?php echo $job['name']; ?></title>
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
            $sql = "SELECT * FROM jobs WHERE id='$id'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
            while($job = mysqli_fetch_assoc($result)) { ?>

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
                    <input type="text" id="name" class="form-control" name="title" value="<?php echo $job['title']; ?>" required>
                </div>

                <!-- get company names -->
                <div class="form-group">
                <label for="company">Company</label>
                <select class="form-control" id="dropdown" name="company">
                <option selected><?php echo $job['company']; ?></option>
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
                      <option selected><?php echo $job['industry']; ?></option>
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
                    <textarea class="form-control" id="jobFormControlTextarea" rows="3" name="body" required><?php echo $job['body']; ?></textarea>
                </div>
                
            <div class="form-group">
              <input type="text" class="form-control input-sm" name="location" required value="<?php echo $job['location']; ?>">
            </div>

          <div class="form-group">
              <input type="file" class="form-control input-sm" name="image" placeholder="Upload Image">
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
      <a href="jobs.php" class="btn btn-sm btn-warning btn-block">Back</a>
      </div>
    </div>
    </main>

    <?php
    
    if( isset( $_POST['update'] ) ){
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


        $sql = "UPDATE jobs SET user_id='$user_id', title='$title', industry='$industry', company='$company', body='$body', location='$location', image='$image'  WHERE id='$id'";

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && mysqli_query($connect, $sql)) {
            header('Location: jobs.php');
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