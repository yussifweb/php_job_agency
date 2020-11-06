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
    <title>Jobcenter | <?php echo $job['name']; ?></title>
    <?php } }?>

  </head>
  <body>
  <?php require 'nav.php'; ?>
        <!-- main content -->
        <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="card">
                    <div class="card-header">Jobs</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="job.php">Add New Job</a></li>
                        <li class="list-group-item"><a href="jobs.php">View all Jobs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-9">
                <div class="card">                    
                    <?php 
                        
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM jobs WHERE id='$id'";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($job = mysqli_fetch_assoc($result)) { ?>
                            <div class="card-header text-center"><?php echo $job['title']; ?></div>
                        <img class="details" src="jobs/<?php echo $job['image']; ?>" alt="<?php echo $job['title']; ?>">

                    <div class="card-body">
                        <p class="text-center"><strong>Title: </strong> <?php echo $job['title']; ?>
                        <span class="mr-5"></span><strong>Location: </strong><?php echo $job['location']; ?></p>
                        <p class="text-center"><strong>Industry: </strong><?php echo $job['industry']; ?>
                        <span class="mr-5"></span><strong>Company: </strong>
                        <?php 
                        $company_id = $job['company'];
                        $sql = "SELECT * FROM companies WHERE name='$company_id'";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        while($company = mysqli_fetch_assoc($result)) {
                            $company_id = $company['id'];
                        ?>
                        <a href="company_details.php?id=<?php echo $company['id']; ?>" class=""><?php echo $job['company']; ?></a>
                        
                        <?php
                        } }
                        ?>
                        </p>
                        <?php 
                        $user_name = $job['user_id'];
                        $sql = "SELECT * FROM users WHERE id='$user_name'";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        while($user = mysqli_fetch_assoc($result)) {
                            $user_name = $user['name'];
                        ?>
                        <p class="text-center"><strong>Created By: </strong><?php echo $user_name; ?></p>
                        
                        <?php
                        } }
                        ?>
                        
                        
                    </div>
                    <div class="card-footer">
                    <a href="job_edit.php?id=<?php echo $job['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="job_delete.php?id=<?php echo $job['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                        <?php    }
                        } else {
                            echo "0 results";
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content -->

    <?php require 'footer.php'; ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>