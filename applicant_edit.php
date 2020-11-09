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

     <?php                         
        $id = $_GET['id'];
         $sql = "SELECT * FROM applicants WHERE id='$id'";
        $result = mysqli_query($connect, $sql);

         if (mysqli_num_rows($result) > 0) {
          while($applicant = mysqli_fetch_assoc($result)) { ?>
    <title>Jobcenter | <?php echo $applicant['f_name']; ?></title>
    <?php } }?>

  </head>
  <body>
  <?php require 'nav.php'; ?>
  <main class="container">
        <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1" id="main">
        <div class="card pb-3">
        <div class="card-header">Edit Client</div>
        <div class="card-body">
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM applicants WHERE id='$id'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
            while($applicant = mysqli_fetch_assoc($result)) { ?>

        <form id="survey-form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
             <div class="md-form col-12 col-sm-6">
                <input type="text" id="f_name" class="form-control" name="f_name" value="<?php echo $applicant['f_name']; ?>" required>
            </div>
    
              <div class="md-form col-12 col-sm-6">
                <input type="text" id="l_name" class="form-control" name="l_name" value="<?php echo $applicant['l_name']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="md-form col-12 col-sm-7">
                <!-- <label for="dob">Date of Birth</label> -->
                <input type="text" class="form-control"  id="dob" name="dob" value="<?php echo $applicant['dob']; ?>" required>
              </div>
              <div class="md-form col-12 col-sm-5">
                <input type="text" class="form-control" id="age" name="age" value="<?php echo $applicant['age']; ?>">
            </div>
            </div>

            <div class="form-row">
            <div class="md-form col-12 col-sm-6">
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $applicant['email']; ?>" required>
            </div>

            <div class="md-form col-12 col-sm-6">
                <input type="tel" id="phone" class="form-control" name="phone" value="<?php echo $applicant['phone']; ?>" required>
            </div>
            </div>

            <div class="form-row">
            <div class="md-form col-12 col-sm-6">
                <input type="text" id="country" class="form-control" name="country" value="<?php echo $applicant['country']; ?>" required>
            </div>

            <div class="md-form col-12 col-sm-6">
                <input type="text" id="dialect" class="form-control" name="dialect" value="<?php echo $applicant['dialect']; ?>">
            </div>
            </div>

            <div class="form-row">
            <div class="col-12 col-sm-8">
            <!-- Default inline 1-->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline1" name="id_typeRadios" value="Passport" <?php if($applicant['id_typeRadios']=="Passport"){ echo "checked";}?>>
                <label class="custom-control-label" for="defaultInline1">Passport</label>
            </div>
            <!-- Default inline -->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline2" name="id_typeRadios" value="Drivers Licence" <?php if($applicant['id_typeRadios']=="Drivers Licence"){ echo "checked";}?>>
                <label class="custom-control-label" for="defaultInline2">Drivers License</label>
            </div>
             <!-- Default inline 1-->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline3" name="id_typeRadios" value="Voters ID" <?php if($applicant['id_typeRadios']=="Voters ID"){ echo "checked";}?>>
                <label class="custom-control-label" for="defaultInline3">Voters ID</label>
            </div>
            <!-- Default inline -->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline4" name="id_typeRadios" value="National ID" <?php if($applicant['id_typeRadios']=="National ID"){ echo "checked";}?>>
                <label class="custom-control-label" for="defaultInline4">National ID</label>
            </div>
            </div>

            <div class="col-12 col-sm-4">
                <span class="img-div">
                <div class="text-center idImg-placeholder"  onClick="triggerClickId()">
                    <h4>Upload image</h4>
                </div>
                <img src="applicants/ids/<?php echo $applicant['id_image']; ?>" onClick="triggerClickId()" class="card-img-top" alt=""  id="idImageUpdate">
                </span>
                <input type="file" name="id_image" onChange="updatedImageId(this)" id="id_image" style="display: none;">
                <label class="ml-5 pl-2">Upload Image</label>
            </div>
            </div>

            <div class="form-row">
                <div class="col-12 col-sm-4">
                <!-- Default inline 1-->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genderInline1" name="genderRadios" value="Male" <?php if($applicant['genderRadios']=="Male"){ echo "checked";}?>>
                    <label class="custom-control-label" for="genderInline1">Male</label>
                </div>
                <!-- gender inline -->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genderInline2" name="genderRadios" value="Female" <?php if($applicant['genderRadios']=="Female"){ echo "checked";}?>>
                    <label class="custom-control-label" for="genderInline2">Female</label>
                </div>
                </div>

                <div class="col-12 col-sm-8">
                    <!-- Default inline 1-->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="marstatInline1" name="mar_statRadios" value="Single" <?php if($applicant['mar_statRadios']=="Single"){ echo "checked";}?>>
                        <label class="custom-control-label" for="marstatInline1">Single</label>
                    </div>
                    <!-- marstat inline -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="marstatInline2" name="mar_statRadios" value="Married" <?php if($applicant['mar_statRadios']=="Married"){ echo "checked";}?>>
                        <label class="custom-control-label" for="marstatInline2">Married</label>
                    </div>
                     <!-- marstat inline 1-->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="marstatInline3" name="mar_statRadios" value="Divorced" <?php if($applicant['mar_statRadios']=="Divorced"){ echo "checked";}?>>
                        <label class="custom-control-label" for="marstatInline1">Divorced</label>
                    </div>
                    <!-- marstat inline -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="marstatInline4" name="mar_statRadios" value="Widowed" <?php if($applicant['mar_statRadios']=="Widowed"){ echo "checked";}?>>
                        <label class="custom-control-label" for="marstatInline2">Widowed</label>
                    </div>
                    </div>    
               </div>

            <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="spouse" class="form-control" name="spouse" placeholder="Spouse" value="<?php echo $applicant['spouse']; ?>">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="religion" class="form-control" name="religion" placeholder="Religion" value="<?php echo $applicant['religion']; ?>" required>
                 </div>
               </div>
   
               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="residence" class="form-control" name="residence" placeholder="Residence"  value="<?php echo $applicant['residence']; ?>" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="box_addr" class="form-control" name="box_addr" placeholder="Address" value="<?php echo $applicant['box_addr']; ?>" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="landmark" class="form-control" name="landmark" placeholder="Landmark" value="<?php echo $applicant['landmark']; ?>" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="street_nm" class="form-control" name="street_nm" placeholder="Street Name" value="<?php echo $applicant['street_nm']; ?>" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-4">
                   <input type="text" id="suburb" class="form-control" name="suburb" placeholder="Suburb" value="<?php echo $applicant['suburb']; ?>" required>
               </div>
       
                 <div class="md-form col-12 col-sm-4">
                   <input type="text" id="hse_no" class="form-control" name="hse_no" placeholder="House Number" value="<?php echo $applicant['hse_no']; ?>" required>
                 </div>
                 <div class="md-form col-12 col-sm-4">
                    <input type="text" id="city_town" class="form-control" name="city_town" placeholder="City/Town" value="<?php echo $applicant['city_town']; ?>" required>
                  </div>
 
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="area_of_int_1" class="form-control" name="area_of_int_1" placeholder="Area of Interest 1" value="<?php echo $applicant['area_of_int_1']; ?>" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="area_of_int_2" class="form-control" name="area_of_int_2" placeholder="Area of Interest 2" value="<?php echo $applicant['area_of_int_2']; ?>" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="area_of_int_3" class="form-control" name="area_of_int_3" placeholder="Area of Interest 3" value="<?php echo $applicant['area_of_int_3']; ?>">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="area_of_int_4" class="form-control" name="area_of_int_4" placeholder="Area of Interest 4" value="<?php echo $applicant['area_of_int_4']; ?>">
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="jhs_nm" class="form-control" name="jhs_nm" placeholder="Name of Junior High School" value="<?php echo $applicant['jhs_nm']; ?>" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="jhs_awd" class="form-control" name="jhs_awd" placeholder="Awards Recieved" value="<?php echo $applicant['jhs_awd']; ?>">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                    <label for="jhs_start">From</label>
                   <input type="text" id="jhs_start" class="form-control" name="jhs_start" placeholder="MM / YY" value="<?php echo $applicant['jhs_start']; ?>" required>
               </div>
               
                 <div class="col-12 col-sm-6">
                    <label for="jhs_end">To</label>
                   <input type="text" id="jhs_end" class="form-control" placeholder="MM / YY" name="jhs_end" value="<?php echo $applicant['jhs_end']; ?>" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="shs_nm" class="form-control" name="shs_nm" placeholder="Name of Senior High School" value="<?php echo $applicant['shs_nm']; ?>" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="shs_course" class="form-control" name="shs_course" placeholder="Course Offered" value="<?php echo $applicant['shs_course']; ?>">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                    <label for="shs_start">From</label>
                   <input type="text" id="shs_start" class="form-control" placeholder="MM / YY" name="shs_start" value="<?php echo $applicant['shs_start']; ?>" required>
               </div>
       
                 <div class="col-12 col-sm-6">
                    <label for="shs_end">To</label>
                   <input type="text" id="shs_end" class="form-control"  placeholder="MM / YY" name="shs_end" value="<?php echo $applicant['shs_end']; ?>" required>
                 </div>
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="tet_nm" class="form-control" name="tet_nm" placeholder="Name of Tetiary" value="<?php echo $applicant['tet_nm']; ?>" required>
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="tet_course" class="form-control" name="tet_course" placeholder="Course Offered" value="<?php echo $applicant['tet_course']; ?>">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                    <label for="tet_start">From</label>
                   <input type="text" id="tet_start" class="form-control" placeholder="MM / YY" name="tet_start" value="<?php echo $applicant['tet_start']; ?>" required>
               </div>
       
                 <div class="col-12 col-sm-6">
                    <label for="tet_end">To</label>
                   <input type="text" id="tet_end" class="form-control" placeholder="MM / YY" name="tet_end" required value="<?php echo $applicant['tet_end']; ?>">
                 </div>
               </div>



               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="prev_wkplc" class="form-control" name="prev_wkplc" placeholder="Previous Workplace" value="<?php echo $applicant['prev_wkplc']; ?>">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="prev_wkplc_addr" class="form-control" name="prev_wkplc_addr" placeholder="Address" value="<?php echo $applicant['prev_wkplc_addr']; ?>">
                 </div>
               </div>
               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="tel" id="prev_wkplc_cont" class="form-control" name="prev_wkplc_cont" placeholder="Contact of Previous Workplace" value="<?php echo $applicant['prev_wkplc_cont']; ?>">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="text" id="position" class="form-control" name="position" placeholder="Position Held" value="<?php echo $applicant['position']; ?>">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                    <label for="prev_wkplc_start">From</label>
                   <input type="text" id="prev_wkplc_start" class="form-control" placeholder="MM / YY" name="prev_wkplc_start" value="<?php echo $applicant['prev_wkplc_start']; ?>">
               </div>
       
                 <div class="col-12 col-sm-6">
                    <label for="prev_wkplc_end">To</label>
                   <input type="text" id="prev_wkplc_end" class="form-control" placeholder="MM / YY" name="prev_wkplc_end" value="<?php echo $applicant['prev_wkplc_end']; ?>">
                 </div>
               </div>

                <div class="form-row">
                <div class="col-12 col-sm-12">
                <div class="md-form">
                  <textarea type="text" id="form8" name="reason" class="md-textarea mt-4" cols="100"><?php echo $applicant['reason']; ?></textarea>
                 <label for="form8">Reasons for leaving previos workplace</label>
                  </div>
                </div>
                </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="ref_nm" class="form-control" name="ref_nm" placeholder="Refree Name" value="<?php echo $applicant['ref_nm']; ?>">
               </div>
       
                 <div class="md-form col-12 col-sm-6">
                   <input type="tel" id="ref_cont" class="form-control" name="ref_cont" placeholder="Refree Contact" value="<?php echo $applicant['ref_cont']; ?>">
                 </div>
               </div>

               <div class="form-row">
                <div class="col-12 col-sm-6">
                <!-- Default inline 1-->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="paymentInline1" name="paymentRadios" value="Paid" <?php if($applicant['paymentRadios']=="Paid"){ echo "checked";}?> required>
                    <label class="custom-control-label" for="paymentInline1">Paid</label>
                </div>
                <!-- payment inline -->
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="paymentInline2" name="paymentRadios" value="Pending" <?php if($applicant['paymentRadios']=="Pending"){ echo "checked";}?> required>
                    <label class="custom-control-label" for="paymentInline2">Pending</label>
                </div>
                </div>

                <div class="col-12 col-sm-6">
                    <!-- Default inline 1-->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="statusInline1" name="statusRadios" value="Posted" <?php if($applicant['statusRadios']=="Posted"){ echo "checked";}?> required>
                        <label class="custom-control-label" for="statusInline1">Posted</label>
                    </div>
                    <!-- status inline -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="statusInline2" name="statusRadios" value="Pending" <?php if($applicant['statusRadios']=="Pending"){ echo "checked";}?> required>
                        <label class="custom-control-label" for="statusInline2">Pending</label>
                    </div>
                    </div>    
               </div>

               <div class="form-row">
                <div class="md-form col-12 col-sm-6">
                   <input type="text" id="job_title" class="form-control" name="job_title" placeholder="Job Title" value="<?php echo $applicant['job_title']; ?>" required>
               </div>
       
                <div class="form-group md-form col-12 col-sm-6">
                <select class="form-control" id="dropdown" name="company">
                <option selected><?php echo $applicant['company']; ?></option>
                <option>--Select--</option>
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
         
                <div class="form-row">
                    <div class="col-12 col-sm-4">
                    <span class="img-div">
                <div class="text-center img-placeholder"  onClick="triggerClick()">
                    <h4>Upload image</h4>
                </div>
                <img src="applicants/<?php echo $applicant['image']; ?>" onClick="triggerClick()" class="card-img-top" alt=""  id="imageUpdate">
                </span>
                <input type="file" name="image" onChange="updatedImage(this)" id="image" style="display: none;">
                <label>Upload Image</label>
                </div>
            <button id="update" class="btn-block btn btn-success mt-5" type="submit" name="update">Submit</button>
             <?php  }
               } else {
                echo "0 results";
             }
             ?>
        </form>
         </div>
        </div>
            
        <div class="mt-3">
        <a href="applicants.php" class="btn btn-sm btn-warning btn-block">Back</a>
        </div>
    </div>   
    </div>
    </main>

    <?php

        $error = ('');
        $msg = "";
        $msg_class = "";
        
    if(isset($_POST['update'] ) ){
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $dob = $_POST['dob'];
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
            $statusRadios = $_POST['statusRadios'];
            $job_title = $_POST['job_title'];
            $company = $_POST['company'];

            // $id_image = $_POST['id_image'];
            // $image = $_POST['image'];
        // Get image name
        $id_image = $_FILES['id_image']['name'];
        // $idtmp_dir = "applicants/ids/";
        // $idtmp_dir = 'applicants/ids/';
        if($id_image){ 
            // $id = $_GET['id'];
            //     $sql = "SELECT * FROM applicants WHERE id='$id'";
            //     $result = mysqli_query($connect, $sql);               
            //     if (mysqli_num_rows($result) > 0) {
            //     while($applicant = mysqli_fetch_assoc($result)) {
            //      unlink($idtmp_dir.$applicant["id_image"]); // delete old image from database
            //     }}

            // For image upload
            // $id_target = "applicants/ids/".basename($id_image);
            // VALIDATION
            // $id_target = "applicants/ids/";
            $id_target = "applicants/ids/".basename($id_image);

            $id_info = getimagesize($_FILES["id_image"]["tmp_name"]);
            $extension = pathinfo($_FILES["id_image"]["name"], PATHINFO_EXTENSION);
    
            $id_width = $id_info[0];
            $id_height = $id_info[1];
    
            $allowed_extension = array( "png", "PNG", "JPG", "jpg", "jpeg", "JPEG" );
    
            // validate image size. Size is calculated in Bytes
            if($_FILES['id_image']['size'] > 300000) {
            $error = 'file size big';
              $msg = "Image size should not be greater than 300Kb";
              $msg_class = "alert-danger";
            }   
            
            if( $id_width > 640 || $id_height > 480 ) { 
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
            // $id = $_GET['id'];
            // $sql = "SELECT * FROM applicants WHERE id='$id'";
            // $result = mysqli_query($connect, $sql);
            // $idtmp_dir = "applicants/ids/";
            // if (mysqli_num_rows($result) > 0) {
            // while($applicant = mysqli_fetch_assoc($result)) {
            //     if(file_exists($idtmp_dir.$applicant['id_image'])) {
            //         $error = 'file exists';
            //          $msg = " Id File already exists";
            //          $msg_class = "alert-danger";
            //        }       
            // }}
            
            if (empty($error)){
            //     $id = $_GET['id'];
            //     $sql = "SELECT * FROM applicants WHERE id='$id'";
            //     $result = mysqli_query($connect, $sql);
            //     $idtmp_dir = "applicants/ids/";
            //     if (mysqli_num_rows($result) > 0) {
            //     while($applicant = mysqli_fetch_assoc($result)) {
            //    unlink($idtmp_dir.$applicant['id_image']); // delete old image from database
            //     }                
                // move_uploaded_file($_FILES['id_image']['tmp_name'], $id_target);
                // $idtemp = explode(".", $_FILES["id_image"]["name"]);
                // $id_target = $f_name.$age.'id'. '.' . end($idtemp);               
                move_uploaded_file($_FILES['id_image']['tmp_name'], $id_target);
                       
            } else {
                $id = $_GET['id'];
                $sql = "SELECT * FROM applicants WHERE id='$id'";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($applicant = mysqli_fetch_assoc($result)) {
            // if no image selected the old image remain as it is.
                $id_image = $applicant['id_image']; // old image from database
                }}}
        }


        // PERSON IMAGE

        $image = $_FILES['image']['name'];
        // $tmp_dir = 'applicants/';

    if($image){   
    //     $id = $_GET['id'];
    //     $sql = "SELECT * FROM applicants WHERE id='$id'";
    //     $result = mysqli_query($connect, $sql);
    //         $tmp_dir = 'applicants/';
    //     if (mysqli_num_rows($result) > 0) {
    //     while($applicant = mysqli_fetch_assoc($result)) {
    //    unlink($tmp_dir.$applicant['image']); // delete old image from database
    //     }}
     
        // For image upload
        // $target = "applicants/".basename($image);
        // VALIDATION
        $target = "applicants/".basename($image);
        $info = getimagesize($_FILES["image"]["tmp_name"]);
        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        $width = $info[0];
        $height = $info[1];

        $allowed_extension = array( "png", "PNG", "JPG", "jpg", "jpeg", "JPEG" );

        // validate image size. Size is calculated in Bytes
        if($_FILES['image']['size'] > 300000) {
            $error = 'file size big';
          $msg = "Image size should not be greater than 300Kb";
          $msg_class = "alert-danger";
        }   
        
        if( $width > 720 || $height > 720 ) { 
            $error = 'w & h';              
            $msg = "Image width and height should be 720 Pixels";
            $msg_class = "alert-danger";               
        }

        if (! in_array($extension, $allowed_extension)) {  
            $error ='unsupported extension';
            $msg = "Image should be JPG, jpg, png, PNG, JPEG or jpeg";
            $msg_class = "alert-danger";
         }

        //  $id = $_GET['id'];
        //  $sql = "SELECT * FROM applicants WHERE id='$id'";
        //  $result = mysqli_query($connect, $sql);
            //  $tmp_dir = 'applicants/';
        //  if (mysqli_num_rows($result) > 0) {
        //  while($applicant = mysqli_fetch_assoc($result)) {
        // check if file exists
        // if(file_exists($target.$applicant['image'])) {
        //     $error = 'file exists';
        //   $msg = "File already exists";
        //   $msg_class = "alert-danger";
        // }
        //  }}
 
        // // check if file exists
        // if(file_exists($target)) {
        //     $error = 'file exists';
        //   $msg = "File already exists";
        //   $msg_class = "alert-danger";
        // }
        
        if (empty($error)){
        //     $id = $_GET['id'];
        //     $sql = "SELECT * FROM applicants WHERE id='$id'";
        //     $result = mysqli_query($connect, $sql);
        //         $tmp_dir = 'applicants/';
        //     if (mysqli_num_rows($result) > 0) {
        //     while($applicant = mysqli_fetch_assoc($result)) {
        //    unlink($tmp_dir.$applicant['image']); // delete old image from database
        //     }}
            // move_uploaded_file($_FILES['image']['tmp_name'], $target);
            // $temp = explode(".", $_FILES["image"]["name"]);
            // $target = $f_name.$age.'img'. '.' . end($temp);               
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            // $image = $target;
        } else {
            $id = $_GET['id'];
            $sql = "SELECT * FROM applicants WHERE id='$id'";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($applicant = mysqli_fetch_assoc($result)) {
        // if no image selected the old image remain as it is.
            $image = $applicant['image']; // old image from database
            }}}
    }
    
            if (empty($error)) {
                    $sql = "UPDATE applicants SET f_name='$f_name', l_name='$l_name', dob='$dob', age='$age', email='$email', phone='$phone', country='$country', dialect='$dialect', id_typeRadios='$id_typeRadios', id_image='$id_image', genderRadios='$genderRadios', mar_statRadios='$mar_statRadios', spouse='$spouse', religion='$religion', residence='$residence', box_addr='$box_addr', landmark='$landmark', street_nm='$street_nm', suburb='$suburb', hse_no='$hse_no', city_town='$city_town', area_of_int_1='$area_of_int_1', area_of_int_2='$area_of_int_2', area_of_int_3='$area_of_int_3', area_of_int_4='$area_of_int_4', jhs_nm='$jhs_nm', jhs_awd='$jhs_awd', jhs_start='$jhs_start', jhs_end='$jhs_end', shs_nm='$shs_nm', shs_course='$shs_course', shs_start='$shs_start', shs_end='$shs_end', tet_nm='$tet_nm', tet_course='$tet_course', tet_start='$tet_start', tet_end='$tet_end', prev_wkplc='$prev_wkplc', prev_wkplc_addr='$prev_wkplc_addr', prev_wkplc_cont='$prev_wkplc_cont', position='$position', prev_wkplc_start='$prev_wkplc_start', prev_wkplc_end='$prev_wkplc_end', reason='$reason', ref_nm='$ref_nm', ref_cont='$ref_cont', paymentRadios='$paymentRadios', statusRadios='$statusRadios', job_title='$job_title', company='$company', image='$image' WHERE id='$id'";
                if(mysqli_query($connect, $sql)){
                   header( 'Location: applicants.php' );
                } else {
                    $msg = "Error: " . $sql . "<br>" . mysqli_error($connect);
                    $msg_class = "alert-danger";
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

    <!-- Optional JavaScript -->
    <script src="./js/font-awesome.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<?php ob_end_flush(); ?>