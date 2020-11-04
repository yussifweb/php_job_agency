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

    <title>Jobcenter | <?php echo $company['name']; ?></title>
  </head>
  <body>
        <!-- main content -->
        <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="card">
                    <div class="card-header">Companies</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                        <li class="list-group-item"><a href="dash.php">View all Employees</a></li>
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
                        <img src="../images/companies/<?php echo $company['image']; ?>" alt="">

                    <div class="card-body">
                        <h5><?php echo $company['name']; ?></h5>
                        <p><?php echo $company['email']; ?></p>
                        <p class="text-center"><?php echo $company['address']; ?></p>
                        <p class="text-center"><?php echo $company['phone']; ?></p>
                        <p class="text-center"><?php echo $company['industry']; ?></p>
                        <p class="text-center"><?php echo $company['region']; ?></p>
                        <p class="text-center"><?php echo $company['district']; ?></p>  
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>