<?php include_once("header.php"); ?>
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Registration</h2>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Registration</li>
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
        <form class="row contact_form" id="contactForm" method="post">
            <div class="col-md-4 mx-auto">
                <div class="form-group">
                    <input type="name" class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pwd" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="contact" placeholder="contact">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="address">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="city">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pincode" placeholder="pincode">
                </div>
            </div>
    </div>
    <div class="col-md-12 text-center">
        <button type="submit" value="submit" class="btn button_hover" name="submit">Register</button>
    </div>
    </form>
</div>
</div>
<br>
<?php
if(isset($_REQUEST["submit"]))
{
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $pwd = $_REQUEST["pwd"];
    $contact = $_REQUEST["contact"];
    $address = $_REQUEST["address"];
    $city = $_REQUEST["city"];
    $pincode = $_REQUEST["pincode"];

    include("config.php");
    echo $q = "INSERT INTO `user`(`name`, `email`, `password`, `contact`, `address`, `city`, `pincode`) VALUES ('$name','$email','$pwd','$contact','$address','$city','$pincode')";
    $result = mysqli_query($conn,$q);
    
    if($result>0)
    {
        //url redirect
        echo "<script>window.location.assign('user_login.php')</script>";
    }
    else{
        // url redirect
        echo mysqli_error($conn);
        die();
        echo "<script>window.location.assign('user_register.php?msg=Try Again')</script>";
   }
}
?>
<?php require_once("footer.php"); ?>