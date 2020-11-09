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
    <link rel="stylesheet" href="./css/mdb.lite.min.css">

     <!-- Custom CSS -->
     <link rel="stylesheet" href="./css/style.css">

     <script src="./js/jquery-3.3.1.slim.min.js"></script>
     <script src="./js/script.js"></script>

    <title>JobCenter | New Client</title>
  </head>
  <body>
  <?php require 'nav.php'; ?>
      <main class="container">
        <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1" id="main">
        <div class="card">
        <div class="card-header">Add New Applicant</div>
        <div class="card-body">

        <form id="survey-form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
             <div class="md-form col-12 col-sm-6">
                <input type="text" id="f_name" class="form-control" name="f_name" placeholder="First Name" required>
            </div>
    
              <div class="md-form col-12 col-sm-6">
                <input type="text" id="l_name" class="form-control" name="l_name" placeholder="Last Name" required>
              </div>
            </div>

            <div class="form-row">
              <div class="md-form col-12 col-sm-7">
                <!-- <label for="dob">Date of Birth</label> -->
                <input type="text" class="form-control"  id="dob" name="dob" placeholder="DD / MM / YYYY" required>
              </div>
              <div class="md-form col-12 col-sm-5">
                <input type="text" class="form-control" id="age" name="age" placeholder="Age">
            </div>
            </div>

            <div class="form-row">
            <div class="md-form col-12 col-sm-6">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="md-form col-12 col-sm-6">
                <input type="tel" id="phone" class="form-control" name="phone" placeholder="Contact Number" required>
            </div>
            </div>

            <div class="form-row">
            <div class="md-form col-12 col-sm-6">
                <input type="text" id="country" class="form-control" name="country" placeholder="Nationality" required>
            </div>

            <div class="md-form col-12 col-sm-6">
                <input type="text" id="dialect" class="form-control" name="dialect" placeholder="Language">
            </div>
            </div>

            <div class="form-row">
            <div class="col-12 col-sm-8">
            <!-- Default inline 1-->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline1" name="id_typeRadios" value="Passport">
                <label class="custom-control-label" for="defaultInline1">Passport</label>
            </div>
            <!-- Default inline -->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline2" name="id_typeRadios" value="Drivers Licence">
                <label class="custom-control-label" for="defaultInline2">Drivers License</label>
            </div>
             <!-- Default inline 1-->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline3" name="id_typeRadios" value="Voters ID">
                <label class="custom-control-label" for="defaultInline3">Voters ID</label>
            </div>
            <!-- Default inline -->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline4" name="id_typeRadios" value="National ID">
                <label class="custom-control-label" for="defaultInline4">National ID</label>
            </div>
            </div>

            <div class="col-12 col-sm-4">
                <span class="img-div">
                <div class="text-center idImg-placeholder"  onClick="triggerClickId()">
                    <h4>Upload image</h4>
                </div>
                <img src="images/id.png" onClick="triggerClickId()" class="card-img-top" alt=""  id="idImageUpdate">
                </span>
                <input type="file" name="id_image" onChange="updatedImageId(this)" id="id_image" class="form-control" style="display: none;" required>
                <label class="ml-5 pl-2">Upload Image</label>
            </div>
            </div>

            <div class="form-row">
                <div class="col-12 col-sm-4">
                <!-- Default inline 1-->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genderInline1" name="genderRadios" value="Male">
                    <label class="custom-control-label" for="genderInline1">Male</label>
                </div>
                <!-- gender inline -->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genderInline2" name="genderRadios" value="Female">
                    <label class="custom-control-label" for="genderInline2">Female</label>
                </div>
                </div>

                <div class="col-12 col-sm-8">
                    <!-- Default inline 1-->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="marstatInline1" name="mar_statRadios" value="Single">
                        <label class="custom-control-label" for="marstatInline1">Single</label>
                    </div>
                    <!-- marstat inline -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="marstatInline2" name="mar_statRadios" value="Married">
                        <label class="custom-control-label" for="marstatInline2">Married</label>
                    </div>
                     <!-- marstat inline 1-->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="marstatInline3" name="mar_statRadios" value="Divorced">
                        <label class="custom-control-label" for="marstatInline1">Divorced</label>
                    </div>
                    <!-- marstat inline -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="marstatInline4" name="mar_statRadios" value="Widowed">
                        <label class="custom-control-label" for="marstatInline2">Widowed</label>
                    </div>

                    </div>    
               </div>

            <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="spouse" class="form-control" name="spouse" placeholder="Spouse">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="religion" class="form-control" name="religion" placeholder="Religion" required>
                 </div>
               </div>
   
               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="residence" class="form-control" name="residence" placeholder="Residence" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="box_addr" class="form-control" name="box_addr" placeholder="Address" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="landmark" class="form-control" name="landmark" placeholder="Landmark" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="street_nm" class="form-control" name="street_nm" placeholder="Street Name" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-4">
                   <input type="text" id="suburb" class="form-control" name="suburb" placeholder="Suburb" required>
               </div>
       
                 <div class="md-form col-12 col-sm-4">
                   <input type="text" id="hse_no" class="form-control" name="hse_no" placeholder="House Number" required>
                 </div>
                 <div class="md-form col-12 col-sm-4">
                    <input type="text" id="city_town" class="form-control" name="city_town" placeholder="City/Town" required>
                  </div>
 
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="area_of_int_1" class="form-control" name="area_of_int_1" placeholder="Area of Interest 1" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="area_of_int_2" class="form-control" name="area_of_int_2" placeholder="Area of Interest 2" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="area_of_int_3" class="form-control" name="area_of_int_3" placeholder="Area of Interest 3">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="area_of_int_4" class="form-control" name="area_of_int_4" placeholder="Area of Interest 4">
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="jhs_nm" class="form-control" name="jhs_nm" placeholder="Name of Junior High School" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="jhs_awd" class="form-control" name="jhs_awd" placeholder="Awards Recieved">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                    <label for="jhs_start">From</label>
                   <input type="text" id="jhs_start" class="form-control" name="jhs_start" placeholder="MM / YY" required>
               </div>
               
                 <div class="col-12 col-sm-6">
                    <label for="jhs_end">To</label>
                   <input type="text" id="jhs_end" class="form-control" placeholder="MM / YY" name="jhs_end" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="shs_nm" class="form-control" name="shs_nm" placeholder="Name of Senior High School" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="shs_course" class="form-control" name="shs_course" placeholder="Course Offered">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                    <label for="shs_start">From</label>
                   <input type="text" id="shs_start" class="form-control" placeholder="MM / YY" name="shs_start" required>
               </div>
       
                 <div class="col-12 col-sm-6">
                    <label for="shs_end">To</label>
                   <input type="text" id="shs_end" class="form-control"  placeholder="MM / YY" name="shs_end" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="tet_nm" class="form-control" name="tet_nm" placeholder="Name of Tetiary " required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="tet_course" class="form-control" name="tet_course" placeholder="Course Offered">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                    <label for="tet_start">From</label>
                   <input type="text" id="tet_start" class="form-control" placeholder="MM / YY" name="tet_start" required>
               </div>
       
                 <div class="col-12 col-sm-6">
                    <label for="tet_end">To</label>
                   <input type="text" id="tet_end" class="form-control" placeholder="MM / YY" name="tet_end" required>
                 </div>
               </div>



               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="prev_wkplc" class="form-control" name="prev_wkplc" placeholder="Previous Workplace">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="prev_wkplc_addr" class="form-control" name="prev_wkplc_addr" placeholder="Address">
                 </div>
               </div>
               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="tel" id="prev_wkplc_cont" class="form-control" name="prev_wkplc_cont" placeholder="Contact of Previous Workplace">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="position" class="form-control" name="position" placeholder="Position Held">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                    <label for="prev_wkplc_start">From</label>
                   <input type="text" id="prev_wkplc_start" class="form-control" placeholder="MM / YY" name="prev_wkplc_start">
               </div>
       
                 <div class="col-12 col-sm-6">
                    <label for="prev_wkplc_end">To</label>
                   <input type="text" id="prev_wkplc_end" class="form-control" placeholder="MM / YY" name="prev_wkplc_end">
                 </div>
               </div>

                <div class="form-row">
                <div class="col-12 col-sm-12">
                <div class="md-form">
                  <textarea type="text" id="form8" name="reason" class="md-textarea mt-4" cols="100"></textarea>
                 <label for="form8">Reasons for leaving previos workplace</label>
                  </div>
                </div>
                </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="ref_nm" class="form-control" name="ref_nm" placeholder="Refree Name">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="tel" id="ref_cont" class="form-control" name="ref_cont" placeholder="Refree Contact">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                <!-- Default inline 1-->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="paymentInline1" name="paymentRadios" value="Paid">
                    <label class="custom-control-label" for="paymentInline1">Paid</label>
                </div>
                <!-- payment inline -->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="paymentInline2" name="paymentRadios" value="Pending">
                    <label class="custom-control-label" for="paymentInline2">Pending</label>
                </div>
                </div>

                <div class="col-12 col-sm-6">
                    <!-- Default inline 1-->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="statusInline1" name="statusRadios" value="Posted">
                        <label class="custom-control-label" for="statusInline1">Posted</label>
                    </div>
                    <!-- status inline -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="statusInline2" name="statusRadios" value="Pending">
                        <label class="custom-control-label" for="statusInline2">Pending</label>
                    </div>
                    </div>    
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="job_title" class="form-control" name="job_title" placeholder="Job Title" required>
               </div>
       
                <div class="form-group md-form col-12 col-sm-6">
                <select class="form-control" id="dropdown" name="company">
                <option selected>Company</option>
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
               </div>
         
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
                <div class="form-row">
                    <div class="col-12 col-sm-4">
                    <span class="img-div">
                <div class="text-center img-placeholder"  onClick="triggerClick()">
                    <h4>Upload image</h4>
                </div>
                <img src="images/avatar.png" onClick="triggerClick()" class="card-img-top" alt=""  id="imageUpdate">
                </span>
                <input type="file" name="image" onChange="updatedImage(this)" id="image" class="form-control" style="display: none;">
                <label>Upload Image</label>
                </div>
            <button id="submit" class="btn-block btn btn-success mt-5" type="submit" name="submit">Submit</button>
        </form>

        </div>
        </div>
    </div>
    </main>

    <?php 
      
      $error = ('');
      $msg = "";
      $msg_class = "";
            
    if(isset( $_POST['submit'])){
        $id_image = $_FILES['id_image']['name'];
        $image = $_FILES['image']['name'];
        if (empty($image) || empty($id_image)) {
            $error = 'no image';
            $msg = "Please upload an image";
            $msg_class = "alert-danger";
        }
        else{
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $dob= $_POST['dob'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $country = $_POST['country'];
            $dialect = $_POST['dialect'];
            $id_typeRadios = $_POST['id_typeRadios'];
            $genderRadios = $_POST['genderRadios'];
            $mar_statRadios = $_POST['mar_statRadios'];
            $spouse = $_POST['spouse'];
            $religion = $_POST['religion'];
            $residence = $_POST['residence'];

            $box_addr = $_POST['box_addr'];
            $landmark = $_POST['landmark'];
            $street_nm = $_POST['street_nm'];
            $suburb = $_POST['suburb'];
            $hse_no = $_POST['hse_no'];
            $city_town = $_POST['city_town'];

            $area_of_int_1 = $_POST['area_of_int_1'];
            $area_of_int_2 = $_POST['area_of_int_2'];
            $area_of_int_3 = $_POST['area_of_int_3'];
            $area_of_int_4 = $_POST['area_of_int_4'];

            $jhs_nm = $_POST['jhs_nm'];
            $jhs_awd = $_POST['jhs_awd'];
            $jhs_start = $_POST['jhs_start'];
            $jhs_end = $_POST['jhs_end'];

            $shs_nm = $_POST['shs_nm'];
            $shs_course = $_POST['shs_course'];
            $shs_start = $_POST['shs_start'];
            $shs_end = $_POST['shs_end'];

            $tet_nm = $_POST['tet_nm'];
            $tet_course = $_POST['tet_course'];
            $tet_start = $_POST['tet_start'];
            $tet_end = $_POST['tet_end'];

            $prev_wkplc = $_POST['prev_wkplc'];
            $prev_wkplc_addr = $_POST['prev_wkplc_addr'];
            $prev_wkplc_cont = $_POST['prev_wkplc_cont'];
            $position = $_POST['position'];
            $prev_wkplc_start = $_POST['prev_wkplc_start'];
            $prev_wkplc_end = $_POST['prev_wkplc_end'];
            $reason = $_POST['reason'];
            $ref_nm = $_POST['ref_nm'];
            $ref_cont = $_POST['ref_cont'];
            $paymentRadios = $_POST['paymentRadios'];
            $job_title = $_POST['job_title'];
            $statusRadios = $_POST['statusRadios'];
            $company = $_POST['company'];
            $user_id = $user_id;
            // Get image name
            // imgage preview upload
                // $image = $_FILES['image']['name'];
                // For image upload
                $id_target = "applicants/ids/".basename($id_image);
                $idtemp = explode(".", $_FILES["id_image"]["name"]);
                $id_target = $f_name.$age. '.' . end($idtemp);
                // move_uploaded_file($_FILES["file"]["tmp_name"], "applicants/ids/" . $id_target);

                // VALIDATION
                $id_info = getimagesize($_FILES["id_image"]["tmp_name"]);

                $extension = pathinfo($_FILES["id_image"]["name"], PATHINFO_EXTENSION);
                
                $id_width = $id_info[0];
                $id_height = $id_info[1];

                $allowed_extension = array( "png", "PNG", "JPG", "jpg", "jpeg", "JPEG" );

                // validate id image size. Size is calculated in Bytes
                if($_FILES['id_image']['size'] > 300000) {
                  $error = 'file size big';
                  $msg = "Image size should not be greater than 300Kb";
                  $msg_class = "alert-danger";
                }
                
                if($id_width > 640 || $id_height > 480 ) { 
                    $error = 'w & h';              
                    $msg = "Image width and height should be 640 x 480 Pixels";
                    $msg_class = "alert-danger";                   
                }    
                
                if (! in_array($extension, $allowed_extension)) {  
                    $error ='unsupported extension';
                    $msg = "Image should be JPG, jpg, png, PNG, JPEG or jpeg";
                    $msg_class = "alert-danger";
                 }
    
                // check if file exists
                if(file_exists($id_target)) {
                  $error = 'file exists';
                  $msg = "File already exists";
                  $msg_class = "alert-danger";
                }   

                $target = "applicants/".basename($image);
                $temp = explode(".", $_FILES["image"]["name"]);
                $target = $f_name.$age. '.' . end($temp);
                // move_uploaded_file($_FILES["file"]["tmp_name"], "applicants/" . $target);
      

                $info = getimagesize($_FILES["image"]["tmp_name"]);
                $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

                $width = $info[0];
                $height = $info[1];

                // validate image size. Size is calculated in Bytes
                if($_FILES['image']['size'] > 300000) {
                  $error = 'file size big';
                  $msg = "Image size should not be greater than 300Kb";
                  $msg_class = "alert-danger";
                }
                
                if($width > 720 || $height > 720) { 
                    $error = 'w & h';              
                    $msg = "Image width and height should be 720 Pixels";
                    $msg_class = "alert-danger";
                }
    
                
                if (! in_array($extension, $allowed_extension)) {  
                    $error ='unsupported extension';
                    $msg = "Image should be JPG, jpg, png, PNG, JPEG or jpeg";
                    $msg_class = "alert-danger";
                 }
    
                // check if file exists
                if(file_exists($target)) {
                  $error = 'file exists';
                  $msg = "File already exists";
                  $msg_class = "alert-danger";
                }  
            }

            if (empty($error)) {
                if(move_uploaded_file($_FILES["id_image"]["tmp_name"], "applicants/ids/" .$id_target) && move_uploaded_file($_FILES["image"]["tmp_name"], "applicants/" .$target)){ 
                  $id_image = $id_target;
                  $image = $target;           
                    $sql = "INSERT INTO applicants (f_name, l_name, dob,  age, email, phone, country, dialect, id_typeRadios, id_image, genderRadios, mar_statRadios, spouse, religion, residence, box_addr, landmark, street_nm, suburb, hse_no, city_town, area_of_int_1, area_of_int_2, area_of_int_3, area_of_int_4, jhs_nm, jhs_awd, jhs_start, jhs_end, shs_nm, shs_course, shs_start, shs_end, tet_nm, tet_course, tet_start, tet_end, prev_wkplc, prev_wkplc_addr, prev_wkplc_cont, position, prev_wkplc_start, prev_wkplc_end, reason, ref_nm, ref_cont, paymentRadios, statusRadios, job_title, company, user_id, image) 
                    VALUES ('$f_name', '$l_name', '$dob', '$age', '$email', '$phone', '$country', '$dialect', '$id_typeRadios', '$id_image', '$genderRadios', '$mar_statRadios', '$spouse', '$religion', '$residence', '$box_addr', '$landmark', '$street_nm', '$suburb', '$hse_no', '$city_town', '$area_of_int_1', '$area_of_int_2', '$area_of_int_3', '$area_of_int_4', '$jhs_nm', '$jhs_awd', '$jhs_start', '$jhs_end', '$shs_nm', '$shs_course', '$shs_start', '$shs_end', '$tet_nm', '$tet_course', '$tet_start', '$tet_end', '$prev_wkplc', '$prev_wkplc_addr', '$prev_wkplc_cont', '$position', '$prev_wkplc_start', '$prev_wkplc_end', '$reason', '$ref_nm', '$ref_cont', '$paymentRadios', '$statusRadios', '$job_title', '$company', '$user_id', '$image')";
                    if(mysqli_query($connect, $sql)){
                        header( 'Location: applicants.php' );
                    }
                   else {
                    $msg = "Error: " . $sql . "<br>" . mysqli_error($connect);
                    $msg_class = "alert-danger";
                  }
                
                } else {
                  $msg = "There was an error uploading the file";
                  $msg = "alert-danger";
                }
            }
        }
            ?>

        <?php if (!empty($msg)): ?>
        <div class="alert mt-5 <?php echo $msg_class ?>" role="alert">
        <?php echo $msg; ?>
        </div>
        <?php endif; ?>


<?php require 'footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- <script src="./js/script.js"></script> -->
    <script src="./js/font-awesome.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="./js/jquery-3.3.1.slim.min.js"></script> -->
    <script src="./js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    -->
  </body>
</html>
<?php ob_end_flush(); ?>