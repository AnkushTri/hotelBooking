<?php include_once("header.php"); ?>        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
             <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">ENQUIRY</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Enquiry</li>
                    </ol>
                </div>
             </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
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
                        <form class="row contact_form"  method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" value="submit" name="submit" class="btn theme_btn button_hover">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
       
 <?php
        if(isset($_REQUEST["submit"])){
            $name=$_REQUEST["name"];
            $email=$_REQUEST["email"];
            $contact=$_REQUEST["contact"];
            $message=$_REQUEST["message"];

            include("config.php");
            $q="INSERT INTO `enquiry` (`name`,`email`,`contact`,`message`) VALUE ('$name','$email','$contact','$message')";
            $result=mysqli_query($conn,$q);
           if($result>0){
            echo "<script>window.location.assign('enquiry.php?msg=Record Inserted')</script>";
         }
         else{
            echo"eroor";
             echo "<script>window.location.assign('enquiry.php?msg=Try Again')</script>";
         }
        }
 ?>
        
       <?php require_once("footer.php"); ?>