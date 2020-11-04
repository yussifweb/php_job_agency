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
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <title>Jobcenter | Clients</title>
  </head>
  <body>
   
<div class="container mt-5">
    <div class="row">
       <div class="col-12 col-sm-4">

<?php
$sql = "SELECT * FROM image";
$result = mysqli_query( $connect, $sql );
?>
<div class="card" style="width: 18rem;">
<div class="card-header">Clients</div>
<?php
if (mysqli_num_rows($result) > 0) {
    
    while ($company = mysqli_fetch_assoc($result)) {
    ?>
      <img src="../images/clients/<?php echo $company['image']; ?>" class="card-img-top" alt="<?php echo $company['name']; ?>">
  <div class="card-body">
    <h5 class="card-title text-center"><?php echo $client['name']; ?></h5>
    <p class="card-text text-center"><?php echo $client['email']; ?></p>
  </div>
  <div class="card-footer">
    <a href="client_details.php?id=<?php echo $client['id']; ?>" class="btn btn-primary btn-sm">Details</a>
    <a href="client_update.php?id=<?php echo $client['id']; ?>" class="btn btn-info btn-sm">Update</a>
    <a href="client_delete.php?id=<?php echo $client['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
  </div>



<?php
    }
} else {
    echo '0 Results';
}
?>
</div>
<a href="./clients.php" class="btn btn-success btn-lg mt-5">Add New</a>
        </div>
    </div>
</div>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>