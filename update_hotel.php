<?php
   include_once("header.php");
   //session check
   if($_SESSION["email"])
   {
    //store
    $email = $_SESSION["email"];
   }
   else{
    echo "<script>window.location.assign('login.php?msg=Unauthorised user')</script>";
   }
?>
<?php
$id=$_REQUEST['id'];
include("config.php");
$quer="select * from hotel where id='$id'";
 $res=mysqli_query($conn,$quer);
if($data=mysqli_fetch_array($res)){
  $hotel_name= $data['hotel_name'];
  $description= $data['description'];
   $email=$data['email'];
   $pwd=$data['pwd'];
   $image=$data['image'];
   $location=$data['location'];
   $address=$data['address'];
   $city=$data['city'];
   $contact=$data['contact'];
}
?>
 <section class="breadcrumb_area">
         <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">UPDATE HOTEL</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Update Hotel</li>
                    </ol>
                </div>
         </div>
</section>
<br>
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
                <input type="hidden" name="id" value="<?php echo $id;?>">
                 <input type="hidden" name="oldimage" value="<?php echo $image;?>">
                 <input type="hidden" name="oldhotel_name" value="<?php echo $hotel_name;?>">
                 <input type="hidden" name="oldescription" value="<?php echo $description;?>">
                 <input type="hidden" name="oldemail" value="<?php echo $email;?>">
                 <input type="hidden" name="oldpassword" value="<?php echo $pwd;?>">
                 <input type="hidden" name="oldlocation" value="<?php echo $location;?>">
                 <input type="hidden" name="oldaddress" value="<?php echo $address;?>">
                 <input type="hidden" name="oldcity" value="<?php echo $city;?>">
                 <input type="hidden" name="oldcontact" value="<?php echo $contact;?>">
               <!-- </div>  -->
             <!-- <form class="row contact_form" enctype="multipart/form-data" method="post" id="contactForm" > -->
                <div class="col-md-6" >
                  <div class="form-group ">
                      <input type="text" class="form-control"   name="hotel_name" placeholder="Hotel name" value="<?php echo $hotel_name; ?>">
                    </div>
                      <div class="form-group">
                        <input type="email" class="form-control"  name="email" id="email" placeholder="Email" value="<?php echo $email;?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  name="pwdd" id="password" placeholder="Password" value="<?php echo $pwd;?>">
                    </div>

                </div>
                 <div class="col-md-6" >
                    <div class="form-group">
                      <textarea class="form-control" name="description" rows="1" placeholder="Description"><?php echo $description;?> </textarea>
                    </div>
                
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" class="form-control"  name="image" placeholder="Image" value="<?php echo $image;?>">
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="location" placeholder="Location" value="<?php echo $location;?>">
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control"  name="address" placeholder="Address"value="<?php echo $address;?>">
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="city" placeholder="City"value="<?php echo $city;?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="contact"  placeholder="Contact"value="<?php echo $contact;?>">
                    </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" value="submit" class="btn btn_hover" name="submit">Update</button>
                </div>
             </form>
    </div>
</div>
    </div>
</div>
<br>
<!-- </section> -->
<?php
    if(isset($_REQUEST["submit"])){
          if($_REQUEST['hotel_name']){
            $hotel_name=$_REQUEST["hotel_name"];
        }
       else{
        $hotel_name=$_REQUEST["oldhotel_name"];
       }
        if($_REQUEST['description']){
            $description=$_REQUEST["description"];
        }
       else{
        $description=$_REQUEST["olddescription"];
       }   
      if($_REQUEST['email']){
            $email=$_REQUEST["email"];
        }
       else{
        $email=$_REQUEST["oldemail"];
       }    
       if($_REQUEST['password']){
            $pwd=$_REQUEST["pwd"];
        }
       else{
        $pwd=$_REQUEST["oldpassword"];
       }
       
     
    //    $description=$_REQUEST["description"];
    //    $email=$_REQUEST["email"];
    //    $password=$_REQUEST["password"];
         $id=$_REQUEST["id"];
        if($_FILES['image']['name'])
        {
        $filename=$_FILES["image"]["name"];
        $filetmpname=$_FILES["image"]["tmp_name"];
        $newname=rand().$filename;
        move_uploaded_file($filetmpname,"gallery/".$newname);
        }
        else{
            $newname=$_REQUEST['oldimage'];
        }
         if($_REQUEST['location']){
            $location=$_REQUEST["location"];
        }
       else{
        $location=$_REQUEST["oldlocation"];
       }
        if($_REQUEST['address']){
            $address=$_REQUEST["address"];
        }
       else{
        $address=$_REQUEST["oldaddress"];
       }
        if($_REQUEST['city']){
            $city=$_REQUEST["city"];
        }
       else{
        $city=$_REQUEST["oldcity"];
       }
        if($_REQUEST['contact']){
            $contact=$_REQUEST["contact"];
        }
       else{
        $contact=$_REQUEST["oldcontact"];
       }
    //    $location=$_REQUEST["location"];
    //    $address=$_REQUEST["address"];
    //    $city=$_REQUEST["city"];
    //    $contact=$_REQUEST["contact"];

        include("config.php");
        $q="UPDATE `hotel` set `hotel_name`='$hotel_name',`description`='$description',`image`='$newname', `email`='$email', `password`='$pwd',`location`='$location',`address`='$address',`city`='$city',`contact`='$contact' where id='$id'";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('manage_hotel.php?msg=Record Inserted')</script>";
        }
        else{
            echo"eroor";
            echo "<script>window.location.assign('manage_hotel.php?msg=Try Again')</script>";
        }

    }
?>
<?php
    // if(isset($_REQUEST["submit"])){

    //     if($_REQUEST['title']){
    //        $title=$_REQUEST["title"];
    //     }
    //    else{
    //     $title=$_REQUEST['oldtitle'];
    //    }
    //     $id=$_REQUEST["id"];
    //     if($_FILES['image']['name'])
    //     {
    //     $filename=$_FILES["image"]["name"];
    //     $filetmpname=$_FILES["image"]["tmp_name"];
    //     $newname=rand().$filename;
    //     move_uploaded_file($filetmpname,"gallery/".$newname);
    //     }
    //     else{
    //         $newname=$_REQUEST['oldimage'];
    //     }
    //     include("configlearn.php");
    //     $q="UPDATE `gallery` set `title`='$title', `image`='$newname' where id='$id'";
    //     $result=mysqli_query($conn,$q);
    //     if($result>0){
    //         echo "<script>window.location.assign('manage_gallery.php?msg=Record Updated')</script>";
    //     }
    //     else{
    //         echo"eroor";
    //         echo "<script>window.location.assign('manage_gallery.php?msg=Try Again')</script>";
    //     }

    // }
?>
<?php require_once("footer.php"); ?>