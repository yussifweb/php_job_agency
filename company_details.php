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
         $sql = "SELECT * FROM companies WHERE id='$id'";
        $result = mysqli_query($connect, $sql);

         if (mysqli_num_rows($result) > 0) {
          while($company = mysqli_fetch_assoc($result)) { ?>
    <title>Jobcenter | <?php echo $company['name']; ?></title>
    <?php } }?>
    
  </head>
  <body>
  <?php require 'nav.php'; ?>
        <!-- main content -->
        <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="card">
                    <div class="card-header">Companies</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="company.php">Add New Company</a></li>
                        <li class="list-group-item"><a href="companies.php">View all companies</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-9">
                <div class="card">
                    <div class="card-header">Company</div>
                    <?php 
                        
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM companies WHERE id='$id'";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($company = mysqli_fetch_assoc($result)) { ?>
                        <img class="details" src="companies/<?php echo $company['image']; ?>" alt="<?php echo $company['name']; ?>">

                    <div class="card-body">
                        <p class="text-center"><strong>Name: </strong> <?php echo $company['name']; ?>
                        <span class="mr-5"></span><strong>Email: </strong><?php echo $company['email']; ?></p>
                        <p class="text-center"><strong>Address: </strong><?php echo $company['address']; ?>
                        <span class="mr-5"></span><strong>Contact: </strong><?php echo $company['phone']; ?>
                        <span class="mr-5"></span><strong>Industry: </strong><?php echo $company['industry']; ?></p>
                        <p class="text-center"><strong>Region: </strong><?php echo $company['region']; ?>
                        <span class="mr-5"></span><strong>District: </strong><?php echo $company['district']; ?></p>
                        <?php 
                        $user_name = $company['user_id'];
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
                    <a href="company_edit.php?id=<?php echo $company['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="company_delete.php?id=<?php echo $company['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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