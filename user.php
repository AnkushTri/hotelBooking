<!-- <section class="contact_area section_gap"> -->
    <?php include_once("header.php"); ?>
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">USER</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Add Hotel</li>
                    </ol>
                </div>
            </div>
        </section>
        <br>
 <!-- <section class="contact_area section_gap"> -->
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
             <?php
             if(isset($_REQUEST["msg"])){
                echo " <div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                }
             ?>
            </div>
        </div> 
             <form class="row contact_form" enctype="multipart/form-data" method="post" id="contactForm" >
                <div class="col-md-6" >
                  <div class="form-group ">
                      <input type="text" class="form-control"   name="hotel_name" placeholder="Hotel name">
                    </div>
                </div>
                 <div class="col-md-6" >
                    <div class="form-group">
                      <input type="text" class="form-control"   name="hotel_name" placeholder="Hotel name">
                    
                    </div>
                
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control"   name="hotel_name" placeholder="Hotel name">
                  
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="location" placeholder="Location">
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control"  name="address" placeholder="Address">
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="city" placeholder="City">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="contact"  placeholder="Contact">
                    </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" value="submit" class="btn btn_hover" name="submit">Submit</button>
                </div>
             </form>
    </div>
</div>
<br>
<!-- </section> -->
<?php
    if(isset($_REQUEST["submit"])){
       $hotel_name=$_REQUEST["hotel_name"];
       $description=$_REQUEST["description"];
       $email=$_REQUEST["email"];
       $password=$_REQUEST["password"];
       $filename=$_FILES["image"]["name"];
       $filetmpname=$_FILES["image"]["tmp_name"];
       $newname=rand().$filename;
       move_uploaded_file($filetmpname,"gallery/".$newname);
       $location=$_REQUEST["location"];
       $address=$_REQUEST["address"];
       $city=$_REQUEST["city"];
       $contact=$_REQUEST["contact"];

        include("config.php");
        $q="INSERT INTO `hotel`(`hotel_name`,`description`,`email`,`password`,`image`,`location`,`address`,`city`,`contact`) VALUE ('$hotel_name','$description','$email','$password','$newname','$location','$address','$city','$contact')";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('add_hotel.php?msg=Record Inserted')</script>";
        }
        else{
            echo"eroor";
            echo "<script>window.location.assign('add_hotel.php?msg=Try Again')</script>";
        }

    }
?>
<?php require_once("footer.php"); ?>