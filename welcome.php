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
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Welcome Page</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">welcome</li>
                    </ol>
                </div>
            </div>
        </section>
  <section class="contact_area section_gap">
    <div>
        <p>this is para</p>
    </div>
</section> 
<?php
    require_once("footer.php");
?>