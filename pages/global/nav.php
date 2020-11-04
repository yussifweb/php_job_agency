<?php 

if( !$_SESSION['name'] ){
    header( 'Location: ../../index.php' );
}
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">JobCenter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../clients.php">Client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../companies.php" tabindex="-1" aria-disabled="true">Companies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
              </li>
          </ul>
          <div class="my-2 my-lg-0">
            <!-- Button trigger modal -->
            <a class="btn btn-primary" href="../index.php" role="button">Login</a>
            <a class="btn btn-primary" href="./register.php" role="button">Register</a>
            <img class="rounded" src="images/user" alt="User">
          </div>
        </div>
      </nav>