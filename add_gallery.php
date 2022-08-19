<?php include_once("header.php"); ?>
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">ADD GALLERY</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Add gallery</li>
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
             <form class="row contact_form" id="contactForm" enctype="multipart/form-data" method="post"  >
                <div class="col-md- mx-auto">
                  <div class="form-group">
                      <input type="text" class="form-control"   name="title" placeholder="enter title of image">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" type="file"  name="image" placeholder="Image">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" value="submit" class="btn button_hover" name="submit">Submit</button>
                </div>
             </form>
    </div>
</div>
<br>
<!-- </section> -->
<?php
    if(isset($_REQUEST["submit"])){
        $title=$_REQUEST["title"];
        $filename=$_FILES["image"]["name"];
        $filetmpname=$_FILES["image"]["tmp_name"];
        $newname=rand().$filename;
          move_uploaded_file($filetmpname,"gallery/".$newname);
        include("configlearn.php");
        $q="INSERT INTO `gallery`(`title`,`image`) VALUE ('$title','$newname')";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('add_gallery.php?msg=Record Inserted')</script>";
        }
        else{
            echo"eroor";
            echo "<script>window.location.assign('add_gallery.php?msg=Try Again')</script>";
        }

    }
?>
<?php require_once("footer.php"); ?>