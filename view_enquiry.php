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
                    <h2 class="page-cover-tittle">VIEW ENQUIRY</h2>
                    <!-- <li class="active">Manage Student</li> -->
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">View Enquiry</li>
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
     <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 table-responsive">
          <!-- <h1 class="text-center">TABLE</h1> -->
          <table class="table table-warning table-borderless table-hover table-striped">
            <tr class="thead-dark ">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Message</th>                          
            </tr>
            <?php
            $sno=1;
            include("config.php");

            $q="SELECT * from `enquiry`";
            $result=mysqli_query($conn,$q);

            while($data=mysqli_fetch_array($result)){
                // print_r($data);
            ?>
           <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $data['name'];?></td>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['contact'];?></td>
                <td><?php echo $data['message'];?></td>
            </tr>
            <?php
            $sno++;
            }
            ?>
        </table>
        </div>
      </div>  
     </div>    
    </div>
</div>
<br>
         
 <?php require_once("footer.php"); ?>