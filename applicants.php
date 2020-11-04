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
    <link rel="stylesheet" href="./css/bootstrap.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/style.css">

    <title>Jobcenter | Applicants</title>
  </head>
  <body>
  <?php require 'nav.php'; ?>

<div class="container mt-5">
    <div class="row mb-5">
    <?php
    $sql = "SELECT * FROM applicants";
    $result = mysqli_query( $connect, $sql );
    ?>
    
    <?php
    if (mysqli_num_rows($result) > 0) {
    
    while ($applicant = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-12 col-sm-4 mb-5">
  <div class="card" style="width: 18rem;">
  <div class="card-header text-center"><?php echo $applicant['name']; ?></div>
  <img src="applicants/<?php echo $applicant['image']; ?>" class="card-img-top" alt="<?php echo $company['name']; ?>">
    <div class="card-body">
      <h5 class="card-title text-center"><?php echo $applicant['name']; ?></h5>
      <p class="card-text text-center"><?php echo $applicant['email']; ?></p>
    </div>
    <div class="card-footer">
      <a href="applicant_details.php?id=<?php echo $applicant['id']; ?>" class="btn btn-primary btn-sm">Details</a>
      <a href="applicant_edit.php?id=<?php echo $applicant['id']; ?>" class="btn btn-info btn-sm">Update</a>
      <a href="applicant_delete.php?id=<?php echo $applicant['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
    </div>
    </div>
    </div>
   
  <?php
      }
  } else {
      echo '0 Results';
  }
  ?>

  <!-- get number of applicants -->
<?php
$sql="SELECT COUNT('name') FROM applicants";

$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($connect);
?>
<!-- get number of applicants -->

  </div>
<div class="row">
<div class="col-12 col-sm-4 offset-sm-4">
<a href="applicant.php" class="btn btn-success btn-lg btn-block" role="button">Add New</a>
</div>
</div>

</div>
<?php require 'footer.php'; ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>