<!-- <section class="contact_area section_gap"> -->
    <?php include_once("header.php"); ?>
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">USER</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">User Registration</li>
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
                      <input type="text" class="form-control"   name="user_name" placeholder="Name">
                    </div>
                </div>
                 <div class="col-md-6" >
                    <div class="form-group">
                      <input type="email" class="form-control"   name="user_email" placeholder="Email">
                    
                    </div>
                
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                      <input type="password" class="form-control"   name="pwd" placeholder="Password">
                  
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="contact" placeholder="Contact">
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
                        <input type="text" class="form-control"  name="pincode"  placeholder="Pin Code">
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
<br><br><br>
<?php
    if(isset($_REQUEST["submit"])){
       $user_name=$_REQUEST["user_name"];
    //    $description=$_REQUEST["description"];
       $user_email=$_REQUEST["user_email"];
       $pwd=$_REQUEST["pwd"];
       $contact=$_REQUEST["contact"];
       $address=$_REQUEST["address"];
       $city=$_REQUEST["city"];
       $pincode=$_REQUEST["pincode"];


        include("config.php");
        $q="INSERT INTO `user`(`user_name`,`user_email`,`password`,`contact`,`address`,`city`,`pincode`) VALUE ('$user_name','$user_email','$pwd','$contact','$address','$city','$pincode')";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('user.php?msg=Record Inserted')</script>";
        }
        else{
            // echo"eroor";
            echo "<script>window.location.assign('user.php?msg=Try Again')</script>";
        }

    }
?>
<?php require_once("footer.php"); ?>