    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="#">JobCenter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="applicants.php">Applicants</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="companies.php" tabindex="-1" aria-disabled="true">Companies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="jobs.php" tabindex="-1" aria-disabled="true">Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
            </li>
          </ul>
          <div class="my-2 my-lg-0">
            <!-- Button trigger modal -->
            <a class="btn btn-primary" href="index.php" role="button">Login</a>
            <?php 
             $level = $_SESSION['email'];
              $sql = "SELECT * FROM users WHERE email='$level'";
                 $result = mysqli_query($connect, $sql);
                  if (mysqli_num_rows($result) > 0) {
                  while($user = mysqli_fetch_assoc($result)) {
                      $level = $user['level'];
                    if ($level == 100) {
                      echo '<a class="btn btn-primary" href="register.php" role="button">Register</a>';
                   ?>          
                  <?php
                   } } }
                  ?>
                  <a class="btn btn-danger" href="logout.php" role="button">Log Out</a>
                   <img class="rounded" src="images/user" alt="User">

          </div>
        </div>
      </nav>