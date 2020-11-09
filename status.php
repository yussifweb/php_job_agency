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

    <title>Jobcenter | Report</title>
  </head>
  <body>
  <?php require 'nav.php'; ?>

<div class="container mt-5">
    <div class="row mb-5">
    <div class="col-12 col-sm-10 offset-sm-1 mb-5">
    <div class="mt-5 pb-5">
    <div class="head text-center h2">PENDING APPLICANTS</div>
    <?php
    $sql = "SELECT * FROM applicants WHERE statusRadios='Pending'";
    $result = mysqli_query( $connect, $sql );
    ?>
    <table class="table table-striped">
    <thead class="thead-dark">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">NAME</th>
      <th scope="col">CONTACT</th>
      <th scope="col">STATUS</th>
      <th scope="col">COMPANY</th>
    </tr>
  </thead>

    <?php
    if (mysqli_num_rows($result) > 0) {
    
    while ($applicant = mysqli_fetch_assoc($result)) {
    ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $applicant['id']; ?></th>
      <td><?php echo $applicant['name']; ?></td>
      <td><?php echo $applicant['phone']; ?></td>
      <td><?php echo $applicant['statusRadios']; ?></td>
      <td><?php echo $applicant['company']; ?></td>
    </tr>
  </tbody>


  <?php
      }
  } else {
      echo '0 Results';
  }
  ?>
</table>
</div>


<div class="mt-5">
<div class="head text-center h2">POSTED APPLICANTS</div>
<?php
$sql = "SELECT * FROM applicants WHERE statusRadios='Posted'";
$result = mysqli_query( $connect, $sql );
?>
<table class="table table-striped">
<thead class="thead-dark">
<tr>
  <th scope="col">S/N</th>
  <th scope="col">NAME</th>
  <th scope="col">CONTACT</th>
  <th scope="col">STATUS</th>
  <th scope="col">COMPANY</th>
</tr>
</thead>

<?php
if (mysqli_num_rows($result) > 0) {

while ($applicant = mysqli_fetch_assoc($result)) {
?>
<tbody>
<tr>
  <th scope="row"><?php echo $applicant['id']; ?></th>
  <td><?php echo $applicant['name']; ?></td>
  <td><?php echo $applicant['phone']; ?></td>
  <td><?php echo $applicant['statusRadios']; ?></td>
  <td><?php echo $applicant['company']; ?></td>
</tr>
</tbody>


<?php
  }
} else {
  echo '0 Results';
}
?>
</table>
</div>

  <!-- get number of applicants -->
<?php
$sql="SELECT COUNT('name') FROM applicants";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);
mysqli_close($connect);
?>
<div class="m-auto pt-5">
    <button class="btn btn-secondary btn-lg text-center"><strong>TOTAL APPLICANT(S) IS <?php echo $row[0]; ?> </strong></button>
</div>
<!-- get number of applicants -->
  
</div>
</div>

<div class="row">
<div class="col-12 col-sm-4 offset-sm-4">
<a href="applicant.php" class="btn btn-success btn-lg btn-block" role="button">Add New</a>
</div>
</div>
</div>

<?php require 'footer.php'; ?>
    
    <!-- Optional JavaScript -->
    <script src="./js/font-awesome.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>